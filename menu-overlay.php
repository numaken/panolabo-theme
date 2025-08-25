<nav class="uk-navbar-container uk-padding-small uk-padding-remove-vertical uk-navbar" uk-navbar role="navigation" aria-label="メインナビゲーション">
  <div class="uk-navbar-left">
    <a class="uk-navbar-item uk-logo" href="<?php echo home_url(); ?>" aria-label="panolaboホームページ">
      <img src="<?php echo get_template_directory_uri(); ?>/images/logo/panolabo-logoBr.svg" alt="panolabo会社ロゴ">
    <div class="uk-text-small uk-text-lowercase uk-visible@s" style="font-family:sans-serif;font-weight:700;" aria-hidden="true">
      シンプルな発想でリアルビジネスに効くサービスを。
    </div>
    </a>
  </div>
  <div class="uk-navbar-right">
    <a class="uk-navbar-toggle" href="#offcanvas-nav" uk-toggle 
       aria-label="メニューを開く" 
       aria-expanded="false" 
       aria-controls="offcanvas-nav">
      <span uk-icon="icon: menu" aria-hidden="true"></span> <span class="uk-visible@s">Menu</span>
    </a>
  </div>
</nav>

<!-- Offcanvas menu -->
<div id="offcanvas-nav" uk-offcanvas="mode: push; overlay: true" role="dialog" aria-label="ナビゲーションメニュー" aria-hidden="true">
    <div class="uk-offcanvas-bar">
        <button class="uk-offcanvas-close" type="button" uk-close aria-label="メニューを閉じる"></button>
        <?php
        // 全固定ページの動的メニュー生成
        function get_page_icon($page_slug) {
            $icon_map = [
                // メインページ
                'about' => 'icon: info',
                'services' => 'icon: thumbnails',
                'portfolio-achievements' => 'icon: album',
                'portfolio' => 'icon: image',
                'team' => 'icon: users',
                'contact' => 'icon: mail',
                
                // サービス関連
                'app' => 'icon: tablet',
                'smartphone-app' => 'icon: phone',
                'website-creation' => 'icon: code',
                'vr-panoramic' => 'icon: camera',
                'ws' => 'icon: world',
                'dpe' => 'icon: settings',
                'aipostpilot-pro' => 'icon: social',
                'chat2doc' => 'icon: comments',
                'products' => 'icon: database',
                'panolabo-ai-boost' => 'icon: future',
                'portal' => 'icon: grid',
                
                // 企業情報
                'about-career' => 'icon: star',
                'about-en' => 'icon: flag',
                'corp' => 'icon: home',
                'partnership' => 'icon: link',
                'subsidies' => 'icon: credit-card',
                
                // ケーススタディ・実績
                'case-study' => 'icon: bookmark',
                'clients' => 'icon: users',
                
                // 法的ページ
                'privacy' => 'icon: lock',
                'term' => 'icon: file-text',
                'tokushoho' => 'icon: warning',
                
                // 連絡・サポート
                'download-page' => 'icon: download',
                
                // 一般的なページ
                'blog' => 'icon: file-edit',
                'news' => 'icon: bolt',
                'sitemap' => 'icon: list',
                'company' => 'icon: home',
                'profile' => 'icon: user',
                'history' => 'icon: history',
                'access' => 'icon: location',
                'recruit' => 'icon: plus-circle',
                'faq' => 'icon: question',
                'support' => 'icon: lifesaver',
                
                // その他
                'default' => 'icon: file'
            ];
            
            return $icon_map[$page_slug] ?? $icon_map['default'];
        }
        
        // 固定ページを優先順位付きで取得
        $priority_pages = ['about', 'services', 'portfolio-achievements', 'team', 'contact'];
        $all_pages = get_pages([
            'sort_column' => 'menu_order, post_title',
            'sort_order' => 'ASC',
            'post_status' => 'publish'
        ]);
        
        // メニューから除外するページのスラッグ
        $excluded_pages = [
            'addon-download', 'addon-purchase', 'cart', 'thanks', 'service-details', 
            'order-confirm', 'order-form', 'order-thanks', 'about-career', 'about-en', 
            'corp', 'subsidies', 'download-page', 'case-study', 'ws', 'portal', 
            'dpe', 'legal-notice', 'recipe-suggestion', 'products-ai-boost'
        ];
        
        // ページカテゴリ定義（シンプル化）
        $page_categories = [
            'services' => [
                'title' => 'サービス',
                'icon' => 'icon: cog',
                'pages' => ['smartphone-app', 'website-creation', 'vr-panoramic']
            ],
            'products' => [
                'title' => 'プロダクト',
                'icon' => 'icon: bolt',
                'pages' => ['aipostpilot-pro', 'chat2doc', 'products', 'panolabo-ai-boost']
            ],
            'company' => [
                'title' => '企業情報',
                'icon' => 'icon: users',
                'pages' => ['partnership', 'clients', 'portfolio']
            ]
        ];
        
        // 優先ページとカテゴリ別ページに分類（階層構造対応）
        $priority_page_objects = [];
        $categorized_pages = [];
        $other_pages = [];
        
        foreach ($all_pages as $page) {
            // 除外対象ページはスキップ
            if (in_array($page->post_name, $excluded_pages)) {
                continue;
            }
            
            if (in_array($page->post_name, $priority_pages)) {
                $priority_page_objects[$page->post_name] = $page;
            } else {
                // カテゴリ分類（シンプル化）
                $categorized = false;
                foreach ($page_categories as $category_key => $category) {
                    if (in_array($page->post_name, $category['pages'])) {
                        if (!isset($categorized_pages[$category_key])) {
                            $categorized_pages[$category_key] = [];
                        }
                        $categorized_pages[$category_key][] = $page;
                        $categorized = true;
                        break;
                    }
                }
                
                if (!$categorized) {
                    $other_pages[] = $page;
                }
            }
        }
        ?>
        
        <ul class="uk-list uk-list-divider uk-margin-xlarge-top" role="menu" aria-label="サイトメニュー">
            <!-- ホームページ -->
            <li role="none"><a href="<?php echo home_url(); ?>" class="uk-text-bold" role="menuitem">
                <span uk-icon="icon: home" class="uk-margin-small-right" aria-hidden="true"></span>
                ホーム
            </a></li>
            
            <!-- 優先ページ（順序指定） -->
            <?php foreach ($priority_pages as $slug): 
                if (isset($priority_page_objects[$slug])): 
                    $page = $priority_page_objects[$slug]; ?>
                    <li role="none"><a href="<?php echo get_permalink($page->ID); ?>" class="uk-text-bold" role="menuitem">
                        <span uk-icon="<?php echo get_page_icon($slug); ?>" class="uk-margin-small-right" aria-hidden="true"></span>
                        <?php echo esc_html($page->post_title); ?>
                    </a></li>
            <?php endif; endforeach; ?>
            
            <?php if (!empty($categorized_pages)): ?>
                <!-- カテゴリ別ページ表示（シンプル化） -->
                <?php foreach ($page_categories as $category_key => $category_info): ?>
                    <?php if (!empty($categorized_pages[$category_key])): ?>
                        <!-- カテゴリ区切り線 -->
                        <li class="uk-margin-small-top uk-margin-small-bottom">
                            <hr class="uk-divider-small">
                            <div class="uk-text-left uk-text-small uk-text-muted">
                                <span uk-icon="<?php echo $category_info['icon']; ?>" class="uk-margin-small-right" aria-hidden="true"></span>
                                <?php echo $category_info['title']; ?>
                            </div>
                        </li>
                        
                        <!-- カテゴリ内ページ -->
                        <?php foreach ($categorized_pages[$category_key] as $page): ?>
                            <li role="none"><a href="<?php echo get_permalink($page->ID); ?>" class="uk-text-bold" role="menuitem">
                                <span uk-icon="<?php echo get_page_icon($page->post_name); ?>" class="uk-margin-small-right" aria-hidden="true"></span>
                                <?php echo esc_html($page->post_title); ?>
                            </a></li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
                
                <!-- その他のページ（カテゴリ未分類） -->
                <?php if (!empty($other_pages)): ?>
                    <li class="uk-margin-small-top uk-margin-small-bottom">
                        <hr class="uk-divider-small">
                        <div class="uk-text-center uk-text-small uk-text-muted">その他</div>
                    </li>
                    
                    <?php foreach ($other_pages as $page): ?>
                        <li role="none"><a href="<?php echo get_permalink($page->ID); ?>" class="uk-text-bold" role="menuitem">
                            <span uk-icon="<?php echo get_page_icon($page->post_name); ?>" class="uk-margin-small-right" aria-hidden="true"></span>
                            <?php echo esc_html($page->post_title); ?>
                        </a></li>
                    <?php endforeach; ?>
                <?php endif; ?>
            <?php endif; ?>
            
            <!-- ブログ/投稿一覧（存在する場合） -->
            <?php if (get_option('show_on_front') !== 'page' || get_option('page_for_posts')): ?>
                <li class="uk-margin-small-top">
                    <hr class="uk-divider-small">
                </li>
                <li role="none"><a href="<?php echo get_permalink(get_option('page_for_posts')) ?: home_url('/blog'); ?>" class="uk-text-bold" role="menuitem">
                    <span uk-icon="icon: file-edit" class="uk-margin-small-right" aria-hidden="true"></span>
                    ブログ
                </a></li>
            <?php endif; ?>
        </ul>
        
        <?php
        // 【注意】新しいダイレクトメニューを使用するため、WordPressの標準メニューを無効化
        // 必要に応じて以下のコメントアウトを解除してください
        /*
        if (has_nav_menu('offcanvas-menu')) {
            echo '<hr class="uk-divider-icon">';
            wp_nav_menu( array(
                'theme_location' => 'offcanvas-menu',
                'menu_class'     => 'uk-list uk-list-divider uk-margin-top',
                'container'      => false,
            ) );
        }
        */
        ?>
    </div>
</div>

