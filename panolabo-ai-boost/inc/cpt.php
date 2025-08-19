<?php
/**
 * Custom Post Type for Future Cases
 */

if (!defined('ABSPATH')) {
    exit;
}

class PAB_CPT {
    
    public function __construct() {
        add_action('init', array($this, 'pab_register_cpt'));
        add_filter('template_include', array($this, 'pab_template_include'));
    }
    
    /**
     * Register Future Case CPT
     */
    public function pab_register_cpt() {
        $labels = array(
            'name'                  => __('提案型事例', 'panolabo-ai-boost'),
            'singular_name'         => __('提案型事例', 'panolabo-ai-boost'),
            'menu_name'             => __('提案型事例', 'panolabo-ai-boost'),
            'name_admin_bar'        => __('提案型事例', 'panolabo-ai-boost'),
            'archives'              => __('提案型事例一覧', 'panolabo-ai-boost'),
            'attributes'            => __('事例属性', 'panolabo-ai-boost'),
            'parent_item_colon'     => __('親事例:', 'panolabo-ai-boost'),
            'all_items'             => __('すべての事例', 'panolabo-ai-boost'),
            'add_new_item'          => __('新しい事例を追加', 'panolabo-ai-boost'),
            'add_new'               => __('新規追加', 'panolabo-ai-boost'),
            'new_item'              => __('新しい事例', 'panolabo-ai-boost'),
            'edit_item'             => __('事例を編集', 'panolabo-ai-boost'),
            'update_item'           => __('事例を更新', 'panolabo-ai-boost'),
            'view_item'             => __('事例を表示', 'panolabo-ai-boost'),
            'view_items'            => __('事例を表示', 'panolabo-ai-boost'),
            'search_items'          => __('事例を検索', 'panolabo-ai-boost'),
            'not_found'             => __('事例が見つかりません', 'panolabo-ai-boost'),
            'not_found_in_trash'    => __('ゴミ箱に事例がありません', 'panolabo-ai-boost'),
            'featured_image'        => __('アイキャッチ画像', 'panolabo-ai-boost'),
            'set_featured_image'    => __('アイキャッチ画像を設定', 'panolabo-ai-boost'),
            'remove_featured_image' => __('アイキャッチ画像を削除', 'panolabo-ai-boost'),
            'use_featured_image'    => __('アイキャッチ画像として使用', 'panolabo-ai-boost'),
            'insert_into_item'      => __('事例に挿入', 'panolabo-ai-boost'),
            'uploaded_to_this_item' => __('この事例にアップロード', 'panolabo-ai-boost'),
            'items_list'            => __('事例リスト', 'panolabo-ai-boost'),
            'items_list_navigation' => __('事例リストナビゲーション', 'panolabo-ai-boost'),
            'filter_items_list'     => __('事例リストをフィルター', 'panolabo-ai-boost'),
        );
        
        $args = array(
            'label'                 => __('提案型事例', 'panolabo-ai-boost'),
            'description'           => __('AI系プラグインを追加した際の未来効果を提示する提案型事例', 'panolabo-ai-boost'),
            'labels'                => $labels,
            'supports'              => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'revisions'),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 25,
            'menu_icon'             => 'dashicons-lightbulb',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'post',
            'show_in_rest'          => true,
            'rewrite'               => array(
                'slug'       => 'future-case',
                'with_front' => false,
                'pages'      => true,
                'feeds'      => true,
            ),
        );
        
        register_post_type('future_case', $args);
    }
    
    /**
     * Load custom templates
     */
    public function pab_template_include($template) {
        if (is_singular('future_case')) {
            $custom_template = PAB_TEMPLATES_DIR . 'single-future_case.php';
            if (file_exists($custom_template)) {
                return $custom_template;
            }
        }
        
        if (is_post_type_archive('future_case')) {
            $custom_template = PAB_TEMPLATES_DIR . 'archive-future_case.php';
            if (file_exists($custom_template)) {
                return $custom_template;
            }
        }
        
        return $template;
    }
}