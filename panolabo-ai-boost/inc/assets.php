<?php
/**
 * Assets Management for Future Cases
 */

if (!defined('ABSPATH')) {
    exit;
}

class PAB_Assets {
    
    public function __construct() {
        add_action('wp_enqueue_scripts', array($this, 'pab_register_assets'));
        add_action('wp_enqueue_scripts', array($this, 'pab_conditional_assets'), 20);
    }
    
    /**
     * Register assets
     */
    public function pab_register_assets() {
        // Register CSS
        wp_register_style(
            'pab-future-case',
            PAB_ASSETS_URL . 'css/future-case.css',
            array(),
            PAB_VERSION
        );
        
        // Register JS
        wp_register_script(
            'pab-future-case',
            PAB_ASSETS_URL . 'js/future-case.js',
            array('jquery'),
            PAB_VERSION,
            true
        );
        
        // Localize script
        wp_localize_script('pab-future-case', 'pabAjax', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('pab_nonce'),
            'i18n' => array(
                'loadMore' => __('さらに読み込む', 'panolabo-ai-boost'),
                'loading' => __('読み込み中...', 'panolabo-ai-boost'),
                'noMore' => __('これ以上の事例はありません', 'panolabo-ai-boost'),
            ),
        ));
    }
    
    /**
     * Conditionally enqueue assets
     */
    public function pab_conditional_assets() {
        global $post;
        
        $should_enqueue = false;
        
        // Check if we're on a future_case page
        if (is_singular('future_case') || is_post_type_archive('future_case')) {
            $should_enqueue = true;
        }
        
        // Check if shortcode is used in current post
        if (is_singular() && isset($post->post_content) && has_shortcode($post->post_content, 'future_case')) {
            $should_enqueue = true;
        }
        
        // Check if shortcode is used in widgets
        if (is_active_widget(false, false, 'text') && !$should_enqueue) {
            global $wp_registered_widgets;
            foreach ($wp_registered_widgets as $widget) {
                if ($widget['callback'][0]->option_name === 'widget_text') {
                    $widget_options = get_option($widget['callback'][0]->option_name);
                    if ($widget_options) {
                        foreach ($widget_options as $option) {
                            if (isset($option['text']) && has_shortcode($option['text'], 'future_case')) {
                                $should_enqueue = true;
                                break 2;
                            }
                        }
                    }
                }
            }
        }
        
        if ($should_enqueue) {
            wp_enqueue_style('pab-future-case');
            wp_enqueue_script('pab-future-case');
        }
    }
}