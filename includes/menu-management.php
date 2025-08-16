<?php
/**
 * カスタムメニュー管理機能
 * アイコン・順序・表示/非表示の設定
 */

/**
 * 管理画面メニューに追加
 */
function add_custom_menu_management() {
    add_theme_page(
        'メニュー管理',
        'カスタムメニュー',
        'manage_options',
        'custom-menu-management',
        'custom_menu_management_page'
    );
}
add_action('admin_menu', 'add_custom_menu_management');

/**
 * カスタムメニュー管理ページ
 */
function custom_menu_management_page() {
    // 設定保存処理
    if (isset($_POST['save_menu_settings']) && check_admin_referer('custom_menu_settings')) {
        update_option('custom_menu_priority_pages', sanitize_text_field($_POST['priority_pages']));
        update_option('custom_menu_hidden_pages', $_POST['hidden_pages'] ?? []);
        update_option('custom_menu_page_icons', $_POST['page_icons'] ?? []);
        update_option('custom_menu_show_blog', isset($_POST['show_blog']));
        
        echo '<div class="notice notice-success"><p>メニュー設定を保存しました。</p></div>';
    }
    
    // 現在の設定を取得
    $priority_pages = get_option('custom_menu_priority_pages', 'about,services,portfolio-achievements,team,contact');
    $hidden_pages = get_option('custom_menu_hidden_pages', []);
    $page_icons = get_option('custom_menu_page_icons', []);
    $show_blog = get_option('custom_menu_show_blog', true);
    
    // 全固定ページを取得
    $all_pages = get_pages([
        'sort_column' => 'post_title',
        'sort_order' => 'ASC',
        'post_status' => 'publish'
    ]);
    
    // 利用可能アイコンリスト
    $available_icons = [
        'icon: home' => 'ホーム',
        'icon: info' => '情報',
        'icon: thumbnails' => 'サービス',
        'icon: album' => 'ポートフォリオ',
        'icon: users' => 'チーム',
        'icon: mail' => 'メール',
        'icon: file-edit' => 'ブログ',
        'icon: bolt' => 'ニュース',
        'icon: lock' => 'プライバシー',
        'icon: file-text' => 'テキスト',
        'icon: list' => 'リスト',
        'icon: user' => 'プロフィール',
        'icon: history' => '履歴',
        'icon: location' => '場所',
        'icon: plus-circle' => 'プラス',
        'icon: question' => '質問',
        'icon: lifesaver' => 'サポート',
        'icon: file' => 'ファイル',
        'icon: cog' => '設定',
        'icon: star' => '星',
        'icon: heart' => 'ハート'
    ];
    ?>
    
    <div class="wrap">
        <h1>カスタムメニュー管理</h1>
        <p>ナビゲーションメニューの表示順序、アイコン、表示/非表示を設定できます。</p>
        
        <form method="post" action="">
            <?php wp_nonce_field('custom_menu_settings'); ?>
            
            <h2>基本設定</h2>
            <table class="form-table">
                <tr>
                    <th scope="row">優先表示ページ</th>
                    <td>
                        <input type="text" name="priority_pages" value="<?php echo esc_attr($priority_pages); ?>" class="regular-text" />
                        <p class="description">
                            カンマ区切りでページスラッグを入力（例: about,services,contact）<br>
                            ここで指定したページが上部に表示されます。
                        </p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">ブログリンク表示</th>
                    <td>
                        <label>
                            <input type="checkbox" name="show_blog" value="1" <?php checked($show_blog); ?> />
                            メニューにブログリンクを表示する
                        </label>
                    </td>
                </tr>
            </table>
            
            <h2>ページ別設定</h2>
            <div style="max-height: 400px; overflow-y: auto; border: 1px solid #ddd; padding: 10px;">
                <table class="widefat striped">
                    <thead>
                        <tr>
                            <th>ページタイトル</th>
                            <th>スラッグ</th>
                            <th>アイコン</th>
                            <th>表示</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($all_pages as $page): 
                            $page_slug = $page->post_name;
                            $current_icon = $page_icons[$page_slug] ?? get_default_page_icon($page_slug);
                            $is_hidden = in_array($page_slug, $hidden_pages);
                        ?>
                            <tr>
                                <td><strong><?php echo esc_html($page->post_title); ?></strong></td>
                                <td><code><?php echo esc_html($page_slug); ?></code></td>
                                <td>
                                    <select name="page_icons[<?php echo esc_attr($page_slug); ?>]">
                                        <?php foreach ($available_icons as $icon => $label): ?>
                                            <option value="<?php echo esc_attr($icon); ?>" <?php selected($current_icon, $icon); ?>>
                                                <?php echo esc_html($label); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                                <td>
                                    <label>
                                        <input type="checkbox" name="hidden_pages[]" value="<?php echo esc_attr($page_slug); ?>" <?php checked($is_hidden); ?> />
                                        非表示
                                    </label>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            
            <p class="submit">
                <input type="submit" name="save_menu_settings" class="button-primary" value="設定を保存" />
            </p>
        </form>
        
        <h2>プレビュー</h2>
        <div style="background: #f0f0f1; padding: 15px; border-radius: 4px;">
            <h4>現在のメニュー構成:</h4>
            <ul>
                <li><span uk-icon="icon: home"></span> ホーム</li>
                <?php 
                $priority_array = array_map('trim', explode(',', $priority_pages));
                foreach ($priority_array as $slug): 
                    $page = get_page_by_path($slug);
                    if ($page && !in_array($slug, $hidden_pages)):
                        $icon = $page_icons[$slug] ?? get_default_page_icon($slug);
                ?>
                    <li><span uk-icon="<?php echo esc_attr($icon); ?>"></span> <?php echo esc_html($page->post_title); ?></li>
                <?php endif; endforeach; ?>
                
                <?php if (!empty($general_pages_preview = array_filter($all_pages, function($p) use ($priority_array, $hidden_pages) {
                    return !in_array($p->post_name, $priority_array) && !in_array($p->post_name, $hidden_pages);
                }))): ?>
                    <li><em>--- その他のページ ---</em></li>
                    <?php foreach ($general_pages_preview as $page):
                        $icon = $page_icons[$page->post_name] ?? get_default_page_icon($page->post_name);
                    ?>
                        <li><span uk-icon="<?php echo esc_attr($icon); ?>"></span> <?php echo esc_html($page->post_title); ?></li>
                    <?php endforeach; ?>
                <?php endif; ?>
                
                <?php if ($show_blog): ?>
                    <li><span uk-icon="icon: file-edit"></span> ブログ</li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // リアルタイムプレビュー機能（簡易版）
        const priorityInput = document.querySelector('input[name="priority_pages"]');
        const hiddenCheckboxes = document.querySelectorAll('input[name="hidden_pages[]"]');
        
        function updatePreview() {
            // 実装予定: リアルタイムでプレビューを更新
        }
        
        priorityInput.addEventListener('input', updatePreview);
        hiddenCheckboxes.forEach(cb => cb.addEventListener('change', updatePreview));
    });
    </script>
    <?php
}

/**
 * デフォルトアイコン取得
 */
function get_default_page_icon($page_slug) {
    $icon_map = [
        'about' => 'icon: info',
        'services' => 'icon: thumbnails',
        'portfolio-achievements' => 'icon: album',
        'team' => 'icon: users',
        'contact' => 'icon: mail',
        'blog' => 'icon: file-edit',
        'news' => 'icon: bolt',
        'privacy-policy' => 'icon: lock',
        'terms' => 'icon: file-text',
    ];
    
    return $icon_map[$page_slug] ?? 'icon: file';
}

/**
 * 管理画面用のカスタム設定を読み込み
 */
function get_custom_menu_settings() {
    return [
        'priority_pages' => get_option('custom_menu_priority_pages', 'about,services,portfolio-achievements,team,contact'),
        'hidden_pages' => get_option('custom_menu_hidden_pages', []),
        'page_icons' => get_option('custom_menu_page_icons', []),
        'show_blog' => get_option('custom_menu_show_blog', true)
    ];
}
?>