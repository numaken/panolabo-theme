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

// スタイルとスクリプトの読み込み
function panolabo_enqueue_scripts() {
    // CSS
    wp_enqueue_style('uikit-css', get_template_directory_uri() . '/css/uikit.css', array(), '3.23.11');
    wp_enqueue_style('main-css', get_template_directory_uri() . '/css/main.css', array('uikit-css'), '1.0.0');
    wp_enqueue_style('numa-custom-css', get_template_directory_uri() . '/css/numa.custom.css', array('main-css'), '1.0.0');
    wp_enqueue_style('theme-style', get_stylesheet_uri(), array('numa-custom-css'), '1.0.0');
    
    // JavaScript
    wp_enqueue_script('jquery');
    wp_enqueue_script('uikit-js', get_template_directory_uri() . '/js/uikit.min.js', array('jquery'), '3.23.11', true);
    wp_enqueue_script('uikit-icons', get_template_directory_uri() . '/js/uikit-icons.min.js', array('uikit-js'), '3.23.11', true);
    wp_enqueue_script('theme-js', get_template_directory_uri() . '/js/theme.js', array('uikit-js'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'panolabo_enqueue_scripts');

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

// セキュリティ強化
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');

// 管理バーの非表示（フロントエンド）
add_filter('show_admin_bar', '__return_false');
?>