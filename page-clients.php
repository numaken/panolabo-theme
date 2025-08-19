<?php
/**
 * Template Name: クライアント一覧
 */

get_header();

// データベースから直接クライアント情報を取得
global $wpdb;
$table_name = $wpdb->prefix . 'panolabo_contents';

// シンプルなクエリでデータ取得
$clients = $wpdb->get_results(
    $wpdb->prepare(
        "SELECT id, title, description, main_category, thumb, thumb2x, 
                address, tel, site_url, business_hour_from, business_hour_to, 
                regular_holiday, authored_index_url
         FROM {$table_name} 
         WHERE lat IS NOT NULL AND lng IS NOT NULL 
         ORDER BY id DESC 
         LIMIT %d",
        100
    ),
    ARRAY_A
);

// カテゴリ一覧を取得
$categories = $wpdb->get_col(
    $wpdb->prepare(
        "SELECT DISTINCT main_category 
         FROM {$table_name} 
         WHERE main_category IS NOT NULL AND main_category != '' 
         ORDER BY main_category ASC"
    )
);
?>

<main class="numaken-clients-page">
    <!-- ヒーローセクション -->
    <section class="uk-section">
        <div class="uk-container">
            <div class="uk-text-center">
                <h1 class="uk-heading-primary uk-margin-remove-bottom">Clients</h1>
                <h2 class="uk-h3 uk-margin-small-top uk-text-muted">導入店ご紹介</h2>
                <div class="uk-width-1-2@s uk-align-center">
                    <hr class="uk-divider-icon">
                </div>
            </div>
        </div>
    </section>

    <!-- メインコンテンツ -->
    <section class="uk-section">
        <div class="uk-container">
            
            <!-- 統計情報 -->
            <div id="client-count" class="uk-text-center uk-margin">
                <p>登録クライアント数: <strong><?php echo count($clients); ?></strong>件</p>
            </div>

            <!-- カテゴリフィルター -->
            <?php if (!empty($categories)) : ?>
            <div class="uk-card uk-card-default uk-card-body uk-margin-medium">
                <div class="uk-margin-medium">
                    <label class="uk-form-label uk-text-bold">
                        <span uk-icon="tag" class="uk-margin-small-right"></span>
                        カテゴリで絞り込み
                    </label>
                    <div id="category-filter" class="uk-flex uk-flex-wrap uk-flex-center uk-margin-small-top">
                        <button class="uk-button uk-button-text" 
                                data-category="">
                            すべて
                        </button>
                        <?php foreach ($categories as $category) : ?>
                            <button class="uk-button uk-button-text" 
                                    data-category="<?php echo esc_attr($category); ?>">
                                <?php echo esc_html($category); ?>
                            </button>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <!-- クライアント一覧 -->
            <div id="clients-grid" 
                 class="uk-grid-match uk-child-width-1-1@s uk-child-width-1-2@m uk-child-width-1-3@l uk-grid-small" 
                 uk-grid>
                
                <?php if (!empty($clients)) : ?>
                    <?php foreach ($clients as $client) : ?>
                        <div class="client-item" data-category="<?php echo esc_attr($client['main_category']); ?>">
                            <div class="uk-card uk-card-default uk-margin">
                                <div class="uk-card-body">
                                    
                                    <!-- 画像 -->
                                    <?php if (!empty($client['thumb2x']) || !empty($client['thumb'])) : ?>
                                        <?php $image_url = !empty($client['thumb2x']) ? $client['thumb2x'] : $client['thumb']; ?>
                                        <img src="<?php echo esc_url($image_url); ?>" 
                                             alt="<?php echo esc_attr($client['title']); ?>" 
                                             class="uk-align-left" 
                                             width="120"
                                             loading="lazy">
                                    <?php endif; ?>
                                    
                                    <!-- タイトル -->
                                    <h3 class="uk-h4 uk-margin-small-bottom">
                                        <?php echo esc_html($client['title']); ?>
                                    </h3>
                                    
                                    <!-- 説明 -->
                                    <?php if (!empty($client['description'])) : ?>
                                        <p class="uk-text-small uk-margin-small-bottom">
                                            <?php 
                                            $description = mb_strimwidth(strip_tags($client['description']), 0, 150, '...');
                                            echo esc_html($description); 
                                            ?>
                                        </p>
                                    <?php endif; ?>
                                    
                                    <!-- カテゴリバッジ -->
                                    <?php if (!empty($client['main_category'])) : ?>
                                        <span class="uk-badge uk-badge-secondary uk-margin-small-right">
                                            <?php echo esc_html($client['main_category']); ?>
                                        </span>
                                    <?php endif; ?>
                                    
                                    <!-- 詳細情報ボタン -->
                                    <button class="uk-button uk-button-text" 
                                            onclick="showClientDetail(<?php echo $client['id']; ?>)"
                                            uk-toggle="target: #client-modal-<?php echo $client['id']; ?>">
                                        詳細を見る
                                    </button>
                                    
                                </div>
                            </div>
                        </div>

                        <!-- 詳細モーダル -->
                        <div id="client-modal-<?php echo $client['id']; ?>" class="uk-modal-full" uk-modal>
                            <div class="uk-modal-dialog uk-flex">
                                <button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
                                <div class="uk-modal-body uk-margin-auto-vertical">
                                    
                                    <!-- iframe -->
                                    <?php if (!empty($client['authored_index_url'])) : ?>
                                        <iframe src="<?php echo esc_url($client['authored_index_url']); ?>" 
                                                width="100%" height="400" frameborder="0"
                                                title="<?php echo esc_attr($client['title']); ?>の詳細情報"
                                                loading="lazy"></iframe>
                                    <?php endif; ?>
                                    
                                    <div class="uk-card uk-card-default uk-margin">
                                        <div class="uk-card-body">
                                            
                                            <?php if (!empty($client['thumb'])) : ?>
                                                <img src="<?php echo esc_url($client['thumb']); ?>" 
                                                     alt="<?php echo esc_attr($client['title']); ?>" 
                                                     class="uk-align-left" 
                                                     width="200">
                                            <?php endif; ?>
                                            
                                            <h2 class="uk-h3"><?php echo esc_html($client['title']); ?></h2>
                                            
                                            <?php if (!empty($client['description'])) : ?>
                                                <p class="uk-text-small"><?php echo esc_html($client['description']); ?></p>
                                            <?php endif; ?>
                                            
                                            <table class="uk-table uk-table-divider uk-margin-top">
                                                <tbody>
                                                    <?php if (!empty($client['business_hour_from']) && !empty($client['business_hour_to']) && 
                                                              !($client['business_hour_from'] === '00:00:00' && $client['business_hour_to'] === '00:00:00')) : ?>
                                                        <tr>
                                                            <td><strong>営業時間:</strong></td>
                                                            <td><?php echo substr($client['business_hour_from'], 0, 5) . ' - ' . substr($client['business_hour_to'], 0, 5); ?></td>
                                                        </tr>
                                                    <?php endif; ?>
                                                    
                                                    <?php if (!empty($client['regular_holiday'])) : ?>
                                                        <tr>
                                                            <td><strong>定休日:</strong></td>
                                                            <td><?php echo esc_html($client['regular_holiday']); ?></td>
                                                        </tr>
                                                    <?php endif; ?>
                                                    
                                                    <?php if (!empty($client['address'])) : ?>
                                                        <tr>
                                                            <td><strong>住所:</strong></td>
                                                            <td><?php echo esc_html($client['address']); ?></td>
                                                        </tr>
                                                    <?php endif; ?>
                                                    
                                                    <?php if (!empty($client['tel'])) : ?>
                                                        <tr>
                                                            <td><strong>電話番号:</strong></td>
                                                            <td><a href="tel:<?php echo esc_attr($client['tel']); ?>"><?php echo esc_html($client['tel']); ?></a></td>
                                                        </tr>
                                                    <?php endif; ?>
                                                    
                                                    <?php if (!empty($client['site_url'])) : ?>
                                                        <tr>
                                                            <td><strong>ウェブサイト:</strong></td>
                                                            <td><a href="<?php echo esc_url($client['site_url']); ?>" target="_blank" rel="noopener"><?php echo esc_html($client['site_url']); ?></a></td>
                                                        </tr>
                                                    <?php endif; ?>
                                                </tbody>
                                            </table>
                                            
                                            <p class="uk-text-meta uk-text-small uk-margin-top">
                                                <strong>注意事項:</strong> 表示されている情報は撮影時点のデータに基づいています。
                                                最新の情報については、各店舗や施設に直接ご確認ください。
                                            </p>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="uk-width-1-1">
                        <div class="uk-text-center uk-margin-large">
                            <p class="uk-text-muted">現在、クライアント情報がありません。</p>
                        </div>
                    </div>
                <?php endif; ?>
                
            </div>

        </div>
    </section>
</main>

<script>
// シンプルなカテゴリフィルター
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('#category-filter button');
    const clientItems = document.querySelectorAll('.client-item');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const category = this.getAttribute('data-category');
            
            // ボタンの状態更新
            filterButtons.forEach(btn => {
                btn.classList.remove('uk-button-primary');
                btn.classList.add('uk-button-default');
            });
            this.classList.add('uk-button-primary');
            this.classList.remove('uk-button-default');
            
            // アイテムのフィルタリング
            let visibleCount = 0;
            clientItems.forEach(item => {
                const itemCategory = item.getAttribute('data-category');
                if (category === '' || itemCategory === category) {
                    item.style.display = 'block';
                    visibleCount++;
                } else {
                    item.style.display = 'none';
                }
            });
            
            // カウント更新
            const countElement = document.getElementById('client-count');
            if (countElement) {
                const label = category === '' ? '登録クライアント数' : `「${category}」カテゴリ`;
                countElement.innerHTML = `<p>${label}: <strong>${visibleCount}</strong>件</p>`;
            }
        });
    });
    
    console.log('Simple clients page loaded:', {
        totalClients: clientItems.length,
        categories: filterButtons.length - 1
    });
});

function showClientDetail(clientId) {
    console.log('Show client detail:', clientId);
}
</script>

<?php get_footer(); ?>