<?php
// WordPressテーマのfunctions.php

// テーマサポートの追加
function panolabo_theme_setup() {
    // HTMLマークアップの改善
    add_theme_support('html5', array(
        'comment-list',
        'comment-form',
        'search-form',
        'gallery',
        'caption',
    ));
    
    // タイトルタグサポート
    add_theme_support('title-tag');
    
    // カスタムロゴサポート
    add_theme_support('custom-logo');
    
    // アイキャッチ画像サポート
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'panolabo_theme_setup');

// 旧スタイルとスクリプトの読み込み（下記の新しいCDN版に統合済み）
// function panolabo_enqueue_scripts() は下記の新しい関数に統合

// メニューの登録
function panolabo_register_menus() {
    register_nav_menus(array(
        'primary-menu' => 'Primary Menu',
        'offcanvas-menu' => 'Offcanvas Menu',
    ));
}
add_action('init', 'panolabo_register_menus');

// ウィジェットエリアの登録
function panolabo_widgets_init() {
    register_sidebar(array(
        'name' => 'Sidebar',
        'id' => 'sidebar-1',
        'description' => 'Main sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'panolabo_widgets_init');

// OGPベース（個別で上書き前提）
add_action('wp_head', function () {
    if (is_admin()) return;
    
    $title = is_front_page() ? 'Panolabo | 1人総合制作代理店（AI×VR×アプリ×Web×OEM）' : wp_get_document_title();
    $description = '小規模でもAIで会社規模を動かす。受託・自社SaaS・OEMで「作って終わり」をやめ、仕組みで成果へ。';
    $url = is_front_page() ? home_url('/') : get_permalink();
    $image = get_theme_file_uri('/assets/img/og-1200x630.jpg');
    
    // Basic OGP
    echo '<meta property="og:type" content="website"/>' . "\n";
    printf('<meta property="og:title" content="%s"/>' . "\n", esc_attr($title));
    printf('<meta property="og:description" content="%s"/>' . "\n", esc_attr($description));
    printf('<meta property="og:url" content="%s"/>' . "\n", esc_url($url));
    printf('<meta property="og:image" content="%s"/>' . "\n", esc_url($image));
    printf('<meta property="og:site_name" content="%s"/>' . "\n", esc_attr(get_bloginfo('name')));
    
    // Twitter Card
    echo '<meta name="twitter:card" content="summary_large_image"/>' . "\n";
    printf('<meta name="twitter:title" content="%s"/>' . "\n", esc_attr($title));
    printf('<meta name="twitter:description" content="%s"/>' . "\n", esc_attr($description));
    printf('<meta name="twitter:image" content="%s"/>' . "\n", esc_url($image));
}, 9);

// テーマアセットの読み込み（UIKitはheader.phpで直接読み込み）
add_action('wp_enqueue_scripts', function () {
    $ver = wp_get_theme()->get('Version') ?: '1.0.0';
    
    // キャッシュバスティング用タイムスタンプ追加 (2025-08-22)
    $cache_buster = '20250822-2330';
    $ver_with_timestamp = $ver . '-' . $cache_buster;
    
    // メインスタイルシートを復活
    wp_enqueue_style('theme-style', get_stylesheet_uri(), [], $ver_with_timestamp);
    
    // 追加でnuma.custom.cssも読み込み（UIKit is loaded directly in header.php）
    wp_enqueue_style('numa-custom', get_template_directory_uri() . '/css/numa.custom.css', ['theme-style'], $ver_with_timestamp);
    
    // Theme JavaScript
    if (file_exists(get_template_directory() . '/dist/main.bundle.js')) {
        wp_enqueue_script('theme-js', get_template_directory_uri() . '/dist/main.bundle.js', [], $ver, true);
    }
}, 20);

// セキュリティ強化
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');

// セキュリティヘッダー追加
add_action('wp_head', function() {
    echo '<meta name="referrer" content="strict-origin-when-cross-origin"/>' . "\n";
}, 1);

// 管理バーの非表示（フロントエンド）
add_filter('show_admin_bar', '__return_false');

// XMLサイトマップ自動生成機能
function panolabo_generate_sitemap() {
    // キャッシュ確認（1日有効）
    $sitemap_cache = get_transient('panolabo_sitemap_xml');
    if ($sitemap_cache && !isset($_GET['force'])) {
        header('Content-Type: application/xml; charset=utf-8');
        echo $sitemap_cache;
        exit;
    }
    
    $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">' . "\n";
    
    // ホームページ（最高優先度）
    $xml .= add_sitemap_url(home_url('/'), '1.0', 'daily', current_time('c'));
    
    // 固定ページ（手動でリストアップして優先度調整）
    $important_pages = array(
        '/services/' => array('priority' => '0.9', 'changefreq' => 'weekly'),
        '/products/' => array('priority' => '0.9', 'changefreq' => 'weekly'),
        '/oem/' => array('priority' => '0.8', 'changefreq' => 'monthly'),
        '/contact/' => array('priority' => '0.8', 'changefreq' => 'monthly'),
        '/about/' => array('priority' => '0.7', 'changefreq' => 'monthly'),
        '/vr-panoramic/' => array('priority' => '0.7', 'changefreq' => 'monthly'),
        '/chat2doc/' => array('priority' => '0.7', 'changefreq' => 'weekly'),
        '/postpilot-pro/' => array('priority' => '0.7', 'changefreq' => 'weekly'),
        '/clients/' => array('priority' => '0.6', 'changefreq' => 'weekly'),
        '/portfolio/' => array('priority' => '0.6', 'changefreq' => 'weekly'),
        '/privacy/' => array('priority' => '0.3', 'changefreq' => 'yearly'),
        '/term/' => array('priority' => '0.3', 'changefreq' => 'yearly'),
        '/tokushoho/' => array('priority' => '0.3', 'changefreq' => 'yearly'),
    );
    
    foreach ($important_pages as $page_path => $settings) {
        $page_url = home_url($page_path);
        $page_id = url_to_postid($page_url);
        $lastmod = $page_id ? get_the_modified_date('c', $page_id) : current_time('c');
        
        $xml .= add_sitemap_url(
            $page_url,
            $settings['priority'],
            $settings['changefreq'],
            $lastmod
        );
    }
    
    // 公開済み投稿（ブログ記事）
    $posts = get_posts(array(
        'numberposts' => 500,
        'post_status' => 'publish',
        'post_type' => 'post'
    ));
    
    foreach ($posts as $post) {
        $xml .= add_sitemap_url(
            get_permalink($post->ID),
            '0.6',
            'monthly',
            get_the_modified_date('c', $post->ID)
        );
    }
    
    // カスタム投稿タイプ（case_study等）
    $case_studies = get_posts(array(
        'numberposts' => 100,
        'post_status' => 'publish',
        'post_type' => 'case_study'
    ));
    
    foreach ($case_studies as $case) {
        $xml .= add_sitemap_url(
            get_permalink($case->ID),
            '0.7',
            'monthly',
            get_the_modified_date('c', $case->ID)
        );
    }
    
    $xml .= '</urlset>';
    
    // キャッシュに保存（24時間）
    set_transient('panolabo_sitemap_xml', $xml, DAY_IN_SECONDS);
    
    header('Content-Type: application/xml; charset=utf-8');
    echo $xml;
    exit;
}

// サイトマップURL追加ヘルパー関数
function add_sitemap_url($url, $priority = '0.5', $changefreq = 'monthly', $lastmod = null) {
    $lastmod = $lastmod ?: current_time('c');
    
    return sprintf(
        "  <url>\n    <loc>%s</loc>\n    <lastmod>%s</lastmod>\n    <changefreq>%s</changefreq>\n    <priority>%s</priority>\n  </url>\n",
        esc_url($url),
        esc_html($lastmod),
        esc_html($changefreq),
        esc_html($priority)
    );
}

// サイトマップのクエリフック
add_action('init', function() {
    if (isset($_GET['sitemap']) && $_GET['sitemap'] === 'xml') {
        panolabo_generate_sitemap();
    }
});

// 投稿更新時にサイトマップキャッシュを削除
add_action('save_post', function() {
    delete_transient('panolabo_sitemap_xml');
});

// robots.txtにサイトマップを追加
add_filter('robots_txt', function($output) {
    $sitemap_url = home_url('/?sitemap=xml');
    $output .= "\nSitemap: " . $sitemap_url . "\n";
    return $output;
});

// SEO最適化のためのメタ情報強化
add_action('wp_head', function() {
    if (is_admin()) return;
    
    // ページごとの構造化データ
    if (is_front_page()) {
        // トップページ用構造化データ（会社情報）
        $schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => 'Panolabo LLC',
            'alternateName' => 'パノラボ',
            'url' => home_url('/'),
            'logo' => home_url('/images/logo/panolabo_logo.png'),
            'description' => 'AI・VR・アプリ・Web・OEMまで全部1人で回す「1人総合制作代理店」。小規模でもAIを活用すれば会社規模のプロジェクトを動かせる。',
            'address' => array(
                '@type' => 'PostalAddress',
                'streetAddress' => '愛知県一宮市三条',
                'addressLocality' => '一宮市',
                'addressRegion' => '愛知県',
                'addressCountry' => 'JP'
            ),
            'contactPoint' => array(
                '@type' => 'ContactPoint',
                // 'telephone' => '', // 電話番号は非公開
                'email' => 'hello@panolabollc.com',
                'contactType' => 'customer service',
                'areaServed' => 'JP',
                'availableLanguage' => array('Japanese', 'English')
            ),
            'sameAs' => array(
                'https://www.instagram.com/sara_oncourt',
                'https://www.youtube.com/@panolabollc'
            ),
            'founder' => array(
                '@type' => 'Person',
                'name' => 'Sara Taniguchi'
            ),
            'foundingDate' => '2015',
            'numberOfEmployees' => '1',
            'industry' => 'Technology',
            'makesOffer' => array(
                array(
                    '@type' => 'Offer',
                    'itemOffered' => array(
                        '@type' => 'Service',
                        'name' => 'VR・アプリ・Web受託開発',
                        'description' => '360°VR、スマホアプリ、WordPressサイトの設計から運用まで一貫対応'
                    )
                ),
                array(
                    '@type' => 'Offer',
                    'itemOffered' => array(
                        '@type' => 'SoftwareApplication',
                        'name' => 'AiPostPilot Pro',
                        'description' => 'ゼロ設定でSNS自動投稿を実現するSaaSツール'
                    )
                ),
                array(
                    '@type' => 'Offer',
                    'itemOffered' => array(
                        '@type' => 'Service',
                        'name' => 'OEM供給・パートナーシップ',
                        'description' => '仕組みを自社ブランドとして販売できる形で提供'
                    )
                )
            )
        );
        
        echo '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
    }
    
    // パンくずリスト構造化データ
    if (!is_front_page()) {
        $breadcrumbs = array(
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => array()
        );
        
        // ホーム
        $breadcrumbs['itemListElement'][] = array(
            '@type' => 'ListItem',
            'position' => 1,
            'name' => 'ホーム',
            'item' => home_url('/')
        );
        
        // 現在のページ
        if (is_single() || is_page()) {
            $breadcrumbs['itemListElement'][] = array(
                '@type' => 'ListItem',
                'position' => 2,
                'name' => get_the_title(),
                'item' => get_permalink()
            );
        }
        
        echo '<script type="application/ld+json">' . json_encode($breadcrumbs, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
    }
    
    // SEOメタタグの最適化
    $canonical_url = is_front_page() ? home_url('/') : get_permalink();
    echo '<link rel="canonical" href="' . esc_url($canonical_url) . '"/>' . "\n";
    
    // 言語・地域設定
    echo '<meta name="geo.region" content="JP-23"/>' . "\n";
    echo '<meta name="geo.placename" content="一宮市, 愛知県, Japan"/>' . "\n";
    echo '<meta name="geo.position" content="35.3056;136.8006"/>' . "\n";
    echo '<meta name="ICBM" content="35.3056, 136.8006"/>' . "\n";
    
}, 15);

// Google Search Console用認証タグ（必要に応じて設定）
add_action('wp_head', function() {
    // Google Search Console認証（管理画面で設定可能にする場合）
    $gsc_verification = get_option('panolabo_gsc_verification');
    if ($gsc_verification) {
        echo '<meta name="google-site-verification" content="' . esc_attr($gsc_verification) . '"/>' . "\n";
    }
}, 5);

// Panolabo AI Boostページの自動作成（一度だけ実行）
function create_panolabo_ai_boost_pages() {
    // AI Boost詳細ページ
    if (!get_page_by_path('panolabo-ai-boost')) {
        $page_data = array(
            'post_title' => 'Panolabo AI Boost',
            'post_content' => '[AI Boost詳細ページ - テンプレートが適用されます]',
            'post_status' => 'publish',
            'post_type' => 'page',
            'post_name' => 'panolabo-ai-boost'
        );
        wp_insert_post($page_data);
    }
    
}
add_action('init', 'create_panolabo_ai_boost_pages');

// お問い合わせフォームハンドラーの読み込み（シンプル版に変更）
if (file_exists(get_template_directory() . '/includes/simple-contact-handler.php')) {
    require_once get_template_directory() . '/includes/simple-contact-handler.php';
}
?>