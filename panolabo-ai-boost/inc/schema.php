<?php
/**
 * Schema.org JSON-LD for Future Cases
 */

if (!defined('ABSPATH')) {
    exit;
}

class PAB_Schema {
    
    public function __construct() {
        add_action('wp_head', array($this, 'pab_output_schema'));
    }
    
    /**
     * Output schema JSON-LD
     */
    public function pab_output_schema() {
        if (is_singular('future_case')) {
            $this->pab_output_single_schema();
        } elseif (is_post_type_archive('future_case')) {
            $this->pab_output_archive_schema();
        }
    }
    
    /**
     * Output schema for single future case
     */
    private function pab_output_single_schema() {
        global $post;
        
        $meta = $this->pab_get_meta_data($post->ID);
        
        $schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'CreativeWork',
            'name' => get_the_title($post->ID),
            'description' => $this->pab_get_description($post, $meta),
            'url' => get_permalink($post->ID),
            'datePublished' => get_the_date('c', $post->ID),
            'dateModified' => get_the_modified_date('c', $post->ID),
            'creator' => array(
                '@type' => 'Organization',
                'name' => 'Panolabo LLC',
                'url' => 'https://panolabollc.com/',
            ),
            'publisher' => array(
                '@type' => 'Organization',
                'name' => 'Panolabo LLC',
                'url' => 'https://panolabollc.com/',
            ),
        );
        
        // Add about information
        if ($meta['industry']) {
            $schema['about'] = array(
                '@type' => 'Thing',
                'name' => $meta['industry'],
            );
        }
        
        // Add client information
        if ($meta['client_name']) {
            $schema['mentions'] = array(
                '@type' => 'Organization',
                'name' => $meta['client_name'],
            );
            
            if ($meta['region']) {
                $schema['mentions']['address'] = array(
                    '@type' => 'PostalAddress',
                    'addressLocality' => $meta['region'],
                );
            }
        }
        
        // Add isBasedOn for legacy actions
        if ($meta['legacy_actions']) {
            $schema['isBasedOn'] = array(
                '@type' => 'CreativeWork',
                'description' => wp_strip_all_tags($meta['legacy_actions']),
            );
        }
        
        // Add application category
        if (!empty($meta['ai_plugins'])) {
            $schema['applicationCategory'] = 'AIPlugin';
            $schema['applicationSubCategory'] = implode(', ', $meta['ai_plugins']);
        }
        
        // Add images
        if ($meta['img_after_id']) {
            $img_url = wp_get_attachment_image_url($meta['img_after_id'], 'large');
            if ($img_url) {
                $schema['image'] = $img_url;
            }
        }
        
        // Add HowTo schema for implementation steps
        $how_to_schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'HowTo',
            'name' => sprintf(__('%sにAIプラグインを導入する方法', 'panolabo-ai-boost'), $meta['industry']),
            'description' => __('既存WordPressにAIプラグインを追加して効果を向上させる手順', 'panolabo-ai-boost'),
            'step' => array(
                array(
                    '@type' => 'HowToStep',
                    'name' => __('プラグイン導入', 'panolabo-ai-boost'),
                    'text' => __('WordPressにAIプラグインをインストール・有効化', 'panolabo-ai-boost'),
                ),
                array(
                    '@type' => 'HowToStep',
                    'name' => __('設定・カスタマイズ', 'panolabo-ai-boost'),
                    'text' => __('業種や用途に合わせてプラグインを設定', 'panolabo-ai-boost'),
                ),
                array(
                    '@type' => 'HowToStep',
                    'name' => __('自動運用開始', 'panolabo-ai-boost'),
                    'text' => __('AIによる自動化機能で運用効率を向上', 'panolabo-ai-boost'),
                ),
            ),
            'totalTime' => 'PT30M',
            'supply' => array(
                array(
                    '@type' => 'HowToSupply',
                    'name' => 'WordPress',
                ),
                array(
                    '@type' => 'HowToSupply',
                    'name' => 'AIプラグイン',
                ),
            ),
        );
        
        $this->pab_output_json_ld($schema);
        $this->pab_output_json_ld($how_to_schema);
    }
    
    /**
     * Output schema for archive page
     */
    private function pab_output_archive_schema() {
        $schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'CollectionPage',
            'name' => __('AI活用提案型事例集', 'panolabo-ai-boost'),
            'description' => __('WordPressにAIプラグインを追加した際の効果を業種別に紹介する事例集', 'panolabo-ai-boost'),
            'url' => get_post_type_archive_link('future_case'),
            'publisher' => array(
                '@type' => 'Organization',
                'name' => 'Panolabo LLC',
                'url' => 'https://panolabollc.com/',
            ),
        );
        
        $this->pab_output_json_ld($schema);
    }
    
    /**
     * Get meta data
     */
    private function pab_get_meta_data($post_id) {
        return array(
            'client_name' => get_post_meta($post_id, 'fc_client_name', true),
            'industry' => get_post_meta($post_id, 'fc_industry', true),
            'region' => get_post_meta($post_id, 'fc_region', true),
            'legacy_actions' => get_post_meta($post_id, 'fc_legacy_actions', true),
            'future_with_ai' => get_post_meta($post_id, 'fc_future_with_ai', true),
            'kpis' => get_post_meta($post_id, 'fc_kpis', true) ?: array(),
            'ai_plugins' => get_post_meta($post_id, 'fc_ai_plugins', true) ?: array(),
            'ai_plugins_other' => get_post_meta($post_id, 'fc_ai_plugins_other', true),
            'img_before_id' => get_post_meta($post_id, 'fc_img_before_id', true),
            'img_after_id' => get_post_meta($post_id, 'fc_img_after_id', true),
        );
    }
    
    /**
     * Get description
     */
    private function pab_get_description($post, $meta) {
        if ($post->post_excerpt) {
            return $post->post_excerpt;
        }
        
        if ($meta['future_with_ai']) {
            return wp_trim_words(wp_strip_all_tags($meta['future_with_ai']), 30);
        }
        
        return sprintf(__('%sの事例にAIプラグインを追加した効果を紹介', 'panolabo-ai-boost'), $meta['industry']);
    }
    
    /**
     * Output JSON-LD
     */
    private function pab_output_json_ld($schema) {
        echo '<script type="application/ld+json">' . "\n";
        echo wp_json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        echo "\n" . '</script>' . "\n";
    }
}