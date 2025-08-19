<?php
/**
 * Panolabo API Portfolio Functions - 高性能版
 * DB保存 + キャッシュ戦略でレスポンス大幅改善
 */

/**
 * DB テーブル作成
 */
function create_portfolio_tables() {
    global $wpdb;
    
    $table_name = $wpdb->prefix . 'panolabo_portfolio';
    
    $charset_collate = $wpdb->get_charset_collate();
    
    $sql = "CREATE TABLE $table_name (
        id int(11) NOT NULL,
        content_data longtext,
        status varchar(20) DEFAULT 'active',
        last_checked datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        created_at datetime DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (id),
        KEY status (status),
        KEY last_checked (last_checked)
    ) $charset_collate;";
    
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

/**
 * 初期化時にテーブル作成
 */
add_action('after_setup_theme', 'create_portfolio_tables');

/**
 * 高速統計取得（DB優先）
 */
function get_panolabo_portfolio_stats() {
    global $wpdb;
    
    // メモリキャッシュチェック
    static $memory_cache = null;
    if ($memory_cache !== null) {
        return $memory_cache;
    }
    
    // WordPress Transient キャッシュチェック（1時間）
    $cache_key = 'panolabo_portfolio_stats_v2';
    $cached = get_transient($cache_key);
    
    if ($cached !== false) {
        $memory_cache = $cached;
        return $cached;
    }
    
    $table_name = $wpdb->prefix . 'panolabo_portfolio';
    
    // DB統計取得（高速）
    $stats_query = $wpdb->get_results("
        SELECT 
            status,
            COUNT(*) as count,
            MAX(last_checked) as last_update
        FROM {$table_name} 
        GROUP BY status
    ", ARRAY_A);
    
    $stats = [
        'total_count' => 0,
        'active_count' => 0,
        'deleted_count' => 0,
        'last_update' => null,
        'needs_refresh' => false
    ];
    
    foreach ($stats_query as $row) {
        $stats['total_count'] += $row['count'];
        if ($row['status'] == 'active') {
            $stats['active_count'] = $row['count'];
        } elseif ($row['status'] == 'deleted') {
            $stats['deleted_count'] = $row['count'];
        }
        if (!$stats['last_update'] || $row['last_update'] > $stats['last_update']) {
            $stats['last_update'] = $row['last_update'];
        }
    }
    
    // データが古い場合は背景更新をスケジュール
    if (!$stats['last_update'] || 
        strtotime($stats['last_update']) < strtotime('-1 day')) {
        $stats['needs_refresh'] = true;
        
        // 背景で更新（非同期）
        if (!wp_next_scheduled('panolabo_portfolio_refresh')) {
            wp_schedule_single_event(time() + 60, 'panolabo_portfolio_refresh');
        }
    }
    
    // 高速：最新・ランダムコンテンツ取得
    $stats['recent_contents'] = get_portfolio_contents('recent', 10);
    $stats['random_contents'] = get_portfolio_contents('random', 10);
    
    // 1時間キャッシュ
    set_transient($cache_key, $stats, HOUR_IN_SECONDS);
    $memory_cache = $stats;
    
    return $stats;
}

/**
 * 高速コンテンツ取得
 */
function get_portfolio_contents($type = 'recent', $limit = 10) {
    global $wpdb;
    
    $cache_key = "panolabo_contents_{$type}_{$limit}";
    $cached = get_transient($cache_key);
    
    if ($cached !== false) {
        return $cached;
    }
    
    $table_name = $wpdb->prefix . 'panolabo_portfolio';
    
    $order_by = ($type == 'recent') ? 'ORDER BY id DESC' : 'ORDER BY RAND()';
    
    $results = $wpdb->get_results($wpdb->prepare("
        SELECT id, content_data 
        FROM {$table_name} 
        WHERE status = 'active' 
        AND content_data IS NOT NULL 
        {$order_by}
        LIMIT %d
    ", $limit), ARRAY_A);
    
    $contents = [];
    foreach ($results as $row) {
        $data = json_decode($row['content_data'], true);
        if ($data) {
            $contents[] = [
                'id' => $row['id'],
                'data' => $data
            ];
        }
    }
    
    // 30分キャッシュ
    set_transient($cache_key, $contents, 30 * MINUTE_IN_SECONDS);
    
    return $contents;
}

/**
 * 背景更新処理（非同期・重い処理）
 */
function refresh_portfolio_data_background() {
    global $wpdb;
    
    // 実行時間延長
    set_time_limit(0);
    ignore_user_abort(true);
    
    $table_name = $wpdb->prefix . 'panolabo_portfolio';
    $max_id = 1666;
    $batch_size = 25; // 小さなバッチサイズ
    
    // 段階的更新（1日あたり500件程度に増量）
    $daily_limit = 500;
    $processed = 0;
    
    // 最後に更新されていない古いデータから優先更新
    $old_records = $wpdb->get_results($wpdb->prepare("
        SELECT id FROM {$table_name} 
        WHERE last_checked < DATE_SUB(NOW(), INTERVAL 7 DAY)
        OR last_checked IS NULL
        ORDER BY last_checked ASC, id ASC 
        LIMIT %d
    ", $daily_limit), ARRAY_A);
    
    $update_ids = array_column($old_records, 'id');
    
    // 新しいIDをもっと積極的に追加（1666件対応）
    for ($i = 1; $i <= min(200, $max_id); $i++) {
        $exists = $wpdb->get_var($wpdb->prepare(
            "SELECT COUNT(*) FROM {$table_name} WHERE id = %d", $i
        ));
        
        if (!$exists) {
            $update_ids[] = $i;
        }
        
        if (count($update_ids) >= $daily_limit) break;
    }
    
    // バッチ処理で更新
    foreach (array_chunk($update_ids, $batch_size) as $batch) {
        foreach ($batch as $id) {
            if ($processed >= $daily_limit) break 2;
            
            $response = wp_remote_get("https://api.panolabo.com/contents/{$id}", [
                'timeout' => 3,
                'sslverify' => false
            ]);
            
            if (!is_wp_error($response)) {
                $code = wp_remote_retrieve_response_code($response);
                
                if ($code == 200) {
                    $body = wp_remote_retrieve_body($response);
                    $data = json_decode($body, true);
                    
                    if ($data && !empty($data)) {
                        // DB更新・挿入
                        $wpdb->replace($table_name, [
                            'id' => $id,
                            'content_data' => json_encode($data),
                            'status' => 'active',
                            'last_checked' => current_time('mysql')
                        ]);
                    }
                } elseif ($code == 404) {
                    // 削除マーク
                    $wpdb->replace($table_name, [
                        'id' => $id,
                        'content_data' => null,
                        'status' => 'deleted',
                        'last_checked' => current_time('mysql')
                    ]);
                }
            }
            
            $processed++;
            
            // CPU負荷軽減
            if ($processed % 10 == 0) {
                usleep(50000); // 0.05秒休憩
            }
        }
    }
    
    // キャッシュクリア
    delete_transient('panolabo_portfolio_stats_v2');
    delete_transient('panolabo_contents_recent_10');
    delete_transient('panolabo_contents_random_10');
    
    // ログ記録
    error_log("Panolabo Portfolio: {$processed} records processed");
}

// 背景更新フック登録
add_action('panolabo_portfolio_refresh', 'refresh_portfolio_data_background');

/**
 * 特定のコンテンツを取得（DB優先）
 * @param int $id コンテンツID
 * @return array|false コンテンツデータまたはfalse
 */
function get_panolabo_content($id) {
    global $wpdb;
    
    // メモリキャッシュ
    static $content_cache = [];
    if (isset($content_cache[$id])) {
        return $content_cache[$id];
    }
    
    // Transientキャッシュ
    $cache_key = 'panolabo_content_' . $id;
    $cached = get_transient($cache_key);
    
    if ($cached !== false) {
        $content_cache[$id] = $cached;
        return $cached;
    }
    
    // DB から取得（高速）
    $table_name = $wpdb->prefix . 'panolabo_portfolio';
    $result = $wpdb->get_row($wpdb->prepare(
        "SELECT content_data, status, last_checked FROM {$table_name} WHERE id = %d",
        $id
    ));
    
    if ($result && $result->status == 'active' && !empty($result->content_data)) {
        $data = json_decode($result->content_data, true);
        
        if ($data) {
            // データが新しい場合はそのまま使用
            if (strtotime($result->last_checked) > strtotime('-1 week')) {
                set_transient($cache_key, $data, WEEK_IN_SECONDS);
                $content_cache[$id] = $data;
                return $data;
            }
        }
    }
    
    // DB にない、または古い場合のみAPI取得
    $response = wp_remote_get("https://api.panolabo.com/contents/{$id}", [
        'timeout' => 5,
        'sslverify' => false
    ]);
    
    if (is_wp_error($response)) {
        return false;
    }
    
    $code = wp_remote_retrieve_response_code($response);
    if ($code != 200) {
        return false;
    }
    
    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body, true);
    
    if (empty($data)) {
        return false;
    }
    
    // DB に保存
    $wpdb->replace($table_name, [
        'id' => $id,
        'content_data' => json_encode($data),
        'status' => 'active',
        'last_checked' => current_time('mysql')
    ]);
    
    // キャッシュ
    set_transient($cache_key, $data, WEEK_IN_SECONDS);
    $content_cache[$id] = $data;
    
    return $data;
}

/**
 * ポートフォリオギャラリー用のHTML生成
 * @param array $contents コンテンツ配列
 * @param string $title タイトル
 * @return string HTML
 */
function generate_portfolio_gallery($contents, $title = '実績ギャラリー') {
    if (empty($contents)) {
        return '';
    }
    
    ob_start();
    ?>
    <div class="portfolio-gallery">
        <h3 class="uk-text-bold uk-text-center uk-margin-bottom"><?php echo esc_html($title); ?></h3>
        <div class="uk-grid-small uk-child-width-1-4@l uk-child-width-1-3@m uk-child-width-1-2@s" uk-grid box>
            <?php foreach ($contents as $content): 
                $id = isset($content['id']) ? $content['id'] : 0;
                $data = isset($content['data']) ? $content['data'] : $content;
                $thumbnail = isset($data['thumb']) ? $data['thumb'] : (isset($data['thumbnail']) ? $data['thumbnail'] : '');
                $thumb2x = isset($data['thumb2x']) ? $data['thumb2x'] : '';
                $title = isset($data['title']) ? $data['title'] : 'Content #' . $id;
                $description = isset($data['description']) ? $data['description'] : '';
                $type = isset($data['type']) ? $data['type'] : 'vr'; // デフォルトはVR
                $url = isset($data['authored_index_url_secure']) ? $data['authored_index_url_secure'] : (isset($data['url']) ? $data['url'] : '');
                
                // 高解像度画像を優先、なければ通常サムネイル
                $display_image = !empty($thumb2x) ? $thumb2x : $thumbnail;
                
                // サムネイルがない場合のデフォルト画像
                if (empty($display_image)) {
                    $display_image = 'https://via.placeholder.com/400x250/667eea/ffffff?text=' . urlencode($title);
                }
            ?>
                <div>
                    <div class="uk-card uk-card-default uk-card-hover uk-height-1-1">
                        <div class="uk-card-media-top uk-position-relative">
                            <?php if ($type == 'vr' && !empty($url)): ?>
                                <div class="uk-cover-container" style="height: 250px; border-radius: 8px; overflow: hidden; position: relative;">
                                    <iframe src="<?php echo esc_url($url); ?>" 
                                            width="100%" 
                                            height="100%" 
                                            frameborder="0" 
                                            allowfullscreen
                                            loading="lazy"
                                            title="<?php echo esc_attr($title . ' - VR/360°コンテンツ'); ?>"
                                            aria-label="<?php echo esc_attr($title . 'の360度バーチャル体験'); ?>"
                                            style="border-radius: 8px; position: absolute; top: 0; left: 0;"></iframe>
                                </div>
                                <div class="uk-position-top-right uk-margin-small">
                                    <span class="uk-label ">VR/360°</span>
                                </div>
                            <?php else: ?>
                                <img src="<?php echo esc_url($display_image); ?>" 
                                     alt="<?php echo esc_attr($title); ?>"
                                     class="uk-width-1-1"
                                     style="height: 200px; object-fit: cover;">
                                <div class="uk-position-top-right uk-margin-small">
                                    <span class="uk-label ">VR/360°</span>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="uk-card-body uk-padding-small uk-flex uk-flex-column">
                            <h4 class="uk-card-title uk-text-small uk-margin-remove"><?php echo esc_html($title); ?></h4>
                            <?php if (!empty($description)): ?>
                                <p class="uk-text-meta uk-margin-remove-top uk-flex-1"><?php echo esc_html(mb_substr($description, 0, 50)) . '...'; ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

/**
 * 実績カウンターウィジェット
 * @return string HTML
 */
function get_portfolio_counter_widget() {
    $stats = get_panolabo_portfolio_stats();
    
    ob_start();
    ?>
    <div class="portfolio-counter-widget">
        <div class="uk-grid-small uk-child-width-1-3@s uk-text-center" uk-grid>
            <div>
                <div class="uk-card  uk-card-body uk-padding-small">
                    <div class="uk-text-bold uk-heading-small" data-counter="<?php echo $stats['total_count']; ?>">0</div>
                    <div class="uk-text-small">総制作実績</div>
                </div>
            </div>
            <div>
                <div class="uk-card  uk-card-body uk-padding-small">
                    <div class="uk-text-bold uk-heading-small" data-counter="<?php echo $stats['active_count']; ?>">0</div>
                    <div class="uk-text-small">公開中案件</div>
                </div>
            </div>
            <div>
                <div class="uk-card uk-card-default uk-card-body uk-padding-small">
                    <div class="uk-text-bold uk-heading-small">
                        <?php echo round(($stats['active_count'] / max($stats['total_count'], 1)) * 100, 1); ?>%
                    </div>
                    <div class="uk-text-small">継続稼働率</div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
    // カウントアップアニメーション
    document.addEventListener('DOMContentLoaded', function() {
        const counters = document.querySelectorAll('[data-counter]');
        
        const animateCounter = (element) => {
            const target = parseInt(element.getAttribute('data-counter'));
            const duration = 2000; // 2秒
            const increment = target / (duration / 16); // 60fps
            let current = 0;
            
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                element.textContent = Math.floor(current);
            }, 16);
        };
        
        // Intersection Observerで表示時にアニメーション開始
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        });
        
        counters.forEach(counter => observer.observe(counter));
    });
    </script>
    <?php
    return ob_get_clean();
}

/**
 * 実際のCSVデータ統計（サーバー用：固定値）
 * ローカル集計結果をサーバーで使用するための関数
 */
function get_local_csv_portfolio_stats() {
    // 実際に集計済みの正確な実数
    return [
        'total_app_count' => 537,    // App-ID実数
        'total_hp_count' => 783,     // HP URL実数
        'total_vr_count' => 1666,    // VR実績（APIエンドポイント数）
        'total_projects' => 2986     // 合計実績
    ];
}

/**
 * 実際のCSVデータに基づく実績統計
 */
function get_store_app_portfolio_stats() {
    return [
        'total_store_apps' => 537,        // App-ID実数
        'total_hp_projects' => 783,       // HP URL実数
        'total_vr_projects' => 1666,      // VR実績（APIエンドポイント数）
        'total_projects' => 2986,         // 合計実績
        'app_conversion_rate' => 18.0     // アプリ率 (537/2986)
    ];
}

/**
 * 実際のCSVデータに基づく総合実績統計
 */
function get_comprehensive_portfolio_stats() {
    $stats = get_store_app_portfolio_stats();
    
    return [
        // 実際の実績数
        'grand_total' => $stats['total_projects'],       // 2,986案件
        'vr_projects' => $stats['total_vr_projects'],    // 1,666案件
        'app_projects' => $stats['total_store_apps'],    // 537案件
        'hp_projects' => $stats['total_hp_projects'],    // 783案件
        
        // カテゴリ別分類
        'by_category' => [
            'VR・360°制作' => $stats['total_vr_projects'],    // 1,666案件
            'アプリ開発' => $stats['total_store_apps'],        // 537案件
            'Web・HP制作' => $stats['total_hp_projects'],      // 783案件
        ],
        
        'app_conversion_rate' => $stats['app_conversion_rate']
    ];
}

/**
 * ショートコード登録
 */
add_shortcode('panolabo_portfolio_stats', function() {
    return get_portfolio_counter_widget();
});

add_shortcode('panolabo_portfolio_gallery', function($atts) {
    $atts = shortcode_atts([
        'type' => 'api', // api, store_apps
        'count' => 10,
        'ids' => '', // カンマ区切りのID
        'title' => '実績ギャラリー'
    ], $atts);
    
    $contents = [];
    
    if ($atts['type'] == 'specific' && !empty($atts['ids'])) {
        $ids = explode(',', $atts['ids']);
        foreach ($ids as $id) {
            $content = get_panolabo_content(trim($id));
            if ($content) {
                $contents[] = ['id' => $id, 'data' => $content];
            }
        }
    } elseif ($atts['type'] == 'store_apps') {
        // 店舗アプリ実績（Google Sheets）
        $store_stats = get_store_app_portfolio_stats();
        foreach (array_slice($store_stats['featured_store_apps'], 0, $atts['count']) as $item) {
            $contents[] = [
                'id' => $item['id'],
                'data' => [
                    'title' => $item['title'],
                    'type' => $item['type'], 
                    'description' => $item['description'],
                    'category' => $item['category'],
                    'date' => $item['date'],
                    'features' => implode(', ', $item['features']),
                    'is_store_app' => true
                ]
            ];
        }
    } else {
        // APIデータ（VR・Web中心）
        $stats = get_panolabo_portfolio_stats();
        if ($atts['type'] == 'recent') {
            $contents = array_slice($stats['recent_contents'], 0, $atts['count']);
        } else if ($atts['type'] == 'random') {
            $contents = array_slice($stats['random_contents'], 0, $atts['count']);
        } else {
            // デフォルトは最新API実績
            $contents = array_slice($stats['recent_contents'], 0, $atts['count']);
        }
    }
    
    return generate_portfolio_gallery($contents, $atts['title']);
});

// 総合実績統計ショートコード
add_shortcode('panolabo_comprehensive_stats', function($atts) {
    $stats = get_comprehensive_portfolio_stats();
    
    ob_start();
    ?>
    <div class="comprehensive-portfolio-stats">
        <h3 class="uk-text-bold uk-text-center uk-margin-bottom">総合実績統計</h3>
        
        <!-- 総合数値 -->
        <div class="uk-text-center uk-margin-bottom">
            <div class="uk-text-bold uk-heading-medium "><?php echo $stats['grand_total']; ?>案件</div>
            <div class="uk-text-lead">総制作実績（2015年〜2025年）</div>
        </div>
        
        <!-- カテゴリ別実績 -->
        <div class="uk-grid-small uk-child-width-1-2@s uk-child-width-1-4@m" uk-grid>
            <?php foreach ($stats['by_category'] as $category => $count): ?>
                <div>
                    <div class="uk-card uk-card-default uk-card-body uk-text-center uk-padding-small">
                        <div class="uk-text-bold uk-heading-small "><?php echo $count; ?></div>
                        <div class="uk-text-small"><?php echo esc_html($category); ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
        <!-- データソース説明 -->
        <div class="uk-margin-top uk-text-center uk-text-small uk-text-muted">
            <div class="uk-grid-small uk-child-width-auto uk-flex-center" uk-grid>
                <div><span class="uk-label ">API実績: <?php echo $stats['api_total']; ?>件</span></div>
                <div><span class="uk-label ">追加実績: <?php echo $stats['additional_projects']; ?>件</span></div>
                <div><span class="uk-label ">店舗アプリ特化: <?php echo $stats['store_apps_total']; ?>件</span></div>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
});

// 実績統計ショートコード
add_shortcode('panolabo_store_app_stats', function($atts) {
    $stats = get_store_app_portfolio_stats();
    
    ob_start();
    ?>
    <div class="store-app-stats">
        <h3 class="uk-text-bold uk-text-center uk-margin-bottom">実績統計</h3>
        
        <div class="uk-grid-small uk-child-width-1-3@m uk-text-center" uk-grid>
            <div>
                <div class="uk-card  uk-card-body uk-padding-small">
                    <div class="uk-text-bold uk-heading-small"><?php echo $stats['total_vr_projects']; ?>件</div>
                    <div class="uk-text-small">VR/360°制作</div>
                </div>
            </div>
            <div>
                <div class="uk-card  uk-card-body uk-padding-small">
                    <div class="uk-text-bold uk-heading-small"><?php echo $stats['total_store_apps']; ?>件</div>
                    <div class="uk-text-small">アプリ開発</div>
                </div>
            </div>
            <div>
                <div class="uk-card uk-card-default uk-card-body uk-padding-small">
                    <div class="uk-text-bold uk-heading-small"><?php echo $stats['total_hp_projects']; ?>件</div>
                    <div class="uk-text-small">Web・HP制作</div>
                </div>
            </div>
        </div>
        
        <div class="uk-margin-top uk-text-center">
            <div class="uk-text-bold uk-text-large "><?php echo $stats['total_projects']; ?>件</div>
            <div class="uk-text-small">総制作実績（2015年〜2025年）</div>
        </div>
    </div>
    <?php
    return ob_get_clean();
});

/**
 * 管理画面：統計情報と手動更新
 */
add_action('admin_notices', function() {
    if (get_current_screen()->id == 'dashboard') {
        $stats = get_panolabo_portfolio_stats();
        $status_class = $stats['needs_refresh'] ? 'notice-warning' : 'notice-info';
        ?>
        <div class="notice <?php echo $status_class; ?>">
            <p><strong>Panolabo API 実績統計:</strong> 
            総数: <?php echo $stats['total_count']; ?>件 | 
            公開中: <?php echo $stats['active_count']; ?>件 | 
            削除済: <?php echo $stats['deleted_count']; ?>件
            <?php if ($stats['last_update']): ?>
                | 最終更新: <?php echo date('Y-m-d H:i', strtotime($stats['last_update'])); ?>
            <?php endif; ?>
            
            <a href="<?php echo admin_url('admin.php?page=panolabo-portfolio'); ?>" 
               class="button button-small" style="margin-left: 10px;">管理</a>
            </p>
        </div>
        <?php
    }
});

/**
 * 管理画面メニュー追加
 */
add_action('admin_menu', function() {
    add_management_page(
        'Panolabo Portfolio',
        'Portfolio API',
        'manage_options',
        'panolabo-portfolio',
        'panolabo_portfolio_admin_page'
    );
});

/**
 * 管理画面ページ
 */
function panolabo_portfolio_admin_page() {
    global $wpdb;
    
    // 手動更新処理
    if (isset($_POST['manual_refresh']) && check_admin_referer('panolabo_refresh')) {
        // 少量データの即座更新
        wp_schedule_single_event(time(), 'panolabo_portfolio_refresh');
        
        // キャッシュクリア
        delete_transient('panolabo_portfolio_stats_v2');
        delete_transient('panolabo_contents_recent_10');
        delete_transient('panolabo_contents_random_10');
        
        echo '<div class="notice notice-success"><p>更新をスケジュールしました。数分後に反映されます。</p></div>';
    }
    
    $stats = get_panolabo_portfolio_stats();
    $table_name = $wpdb->prefix . 'panolabo_portfolio';
    
    // DB統計
    $db_stats = $wpdb->get_row("
        SELECT 
            COUNT(*) as total_records,
            COUNT(CASE WHEN status = 'active' THEN 1 END) as active_records,
            COUNT(CASE WHEN status = 'deleted' THEN 1 END) as deleted_records,
            MIN(last_checked) as oldest_check,
            MAX(last_checked) as newest_check
        FROM {$table_name}
    ");
    
    ?>
    <div class="wrap">
        <h1>Panolabo Portfolio API 管理</h1>
        
        <div class="card" style="max-width: none;">
            <h2>統計情報</h2>
            <table class="widefat">
                <tr><th>総データ数</th><td><?php echo $stats['total_count']; ?>件</td></tr>
                <tr><th>公開中</th><td><?php echo $stats['active_count']; ?>件</td></tr>
                <tr><th>削除済み</th><td><?php echo $stats['deleted_count']; ?>件</td></tr>
                <tr><th>DB保存済み</th><td><?php echo $db_stats->total_records ?? 0; ?>件</td></tr>
                <tr><th>最新チェック</th><td><?php echo $db_stats->newest_check ?? '未実行'; ?></td></tr>
                <tr><th>最古チェック</th><td><?php echo $db_stats->oldest_check ?? '未実行'; ?></td></tr>
                <tr><th>更新スケジュール</th><td><?php echo wp_next_scheduled('panolabo_portfolio_refresh') ? '実行予定あり' : 'なし'; ?></td></tr>
            </table>
        </div>
        
        <div class="card">
            <h2>手動操作</h2>
            <form method="post">
                <?php wp_nonce_field('panolabo_refresh'); ?>
                <p>
                    <input type="submit" name="manual_refresh" class="button button-primary" 
                           value="データ更新スケジュール" />
                    <span class="description">背景でAPIデータを更新します（数分かかります）</span>
                </p>
            </form>
            
            <p>
                <a href="<?php echo admin_url('admin.php?page=panolabo-portfolio&clear_cache=1'); ?>" 
                   class="button">キャッシュクリア</a>
            </p>
        </div>
        
        <div class="card">
            <h2>最新コンテンツ（DB保存済み）</h2>
            <?php
            $recent_db = $wpdb->get_results("
                SELECT id, LEFT(content_data, 100) as preview, last_checked 
                FROM {$table_name} 
                WHERE status = 'active' 
                ORDER BY id DESC 
                LIMIT 10
            ");
            
            if ($recent_db) {
                echo '<table class="widefat">';
                echo '<thead><tr><th>ID</th><th>プレビュー</th><th>最終チェック</th></tr></thead>';
                foreach ($recent_db as $row) {
                    echo '<tr>';
                    echo '<td>' . $row->id . '</td>';
                    echo '<td>' . esc_html($row->preview) . '...</td>';
                    echo '<td>' . $row->last_checked . '</td>';
                    echo '</tr>';
                }
                echo '</table>';
            } else {
                echo '<p>データがありません。初回更新を実行してください。</p>';
            }
            ?>
        </div>
    </div>
    <?php
    
    // キャッシュクリア処理
    if (isset($_GET['clear_cache'])) {
        delete_transient('panolabo_portfolio_stats_v2');
        delete_transient('panolabo_contents_recent_10');
        delete_transient('panolabo_contents_random_10');
        echo '<div class="notice notice-success"><p>キャッシュをクリアしました。</p></div>';
    }
}
?>