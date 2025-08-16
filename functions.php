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

// UIkit読み込み（正しい順序で）
add_action('wp_enqueue_scripts', function () {
    $ver = wp_get_theme()->get('Version') ?: '1.0.0';
    
    // UIKit CSS（head内で読み込み）
    wp_enqueue_style('uikit', 'https://cdn.jsdelivr.net/npm/uikit@3.17.12/dist/css/uikit.min.css', [], '3.17.12');
    
    // UIKit JS（footer内で読み込み、defer不使用）
    wp_enqueue_script('uikit', 'https://cdn.jsdelivr.net/npm/uikit@3.17.12/dist/js/uikit.min.js', [], '3.17.12', true);
    wp_enqueue_script('uikit-icons', 'https://cdn.jsdelivr.net/npm/uikit@3.17.12/dist/js/uikit-icons.min.js', ['uikit'], '3.17.12', true);
    
    // Theme assets（UIKit読み込み後）
    wp_enqueue_style('theme-style', get_stylesheet_uri(), ['uikit'], $ver);
    wp_enqueue_style('theme-polish', get_template_directory_uri() . '/assets/css/theme-polish.css', ['theme-style'], $ver);
    if (file_exists(get_template_directory() . '/dist/main.bundle.js')) {
        wp_enqueue_script('theme-js', get_template_directory_uri() . '/dist/main.bundle.js', ['uikit-icons'], $ver, true);
    }
    
    // UIKitが確実に読み込まれるようインライン初期化を追加
    wp_add_inline_script('uikit-icons', '
        console.log("UIKit loaded:", typeof UIkit);
        if (typeof UIkit !== "undefined") {
            console.log("UIKit components:", Object.keys(UIkit));
        }
    ');
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
?>