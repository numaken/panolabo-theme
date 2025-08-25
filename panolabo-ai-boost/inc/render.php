<?php
/**
 * Render Future Cases (Shortcode and Templates)
 */

if (!defined('ABSPATH')) {
    exit;
}

class PAB_Render {
    
    public function __construct() {
        add_shortcode('future_case', array($this, 'pab_shortcode_handler'));
        add_action('pre_get_posts', array($this, 'pab_modify_archive_query'));
    }
    
    /**
     * Shortcode handler
     */
    public function pab_shortcode_handler($atts) {
        $atts = shortcode_atts(array(
            'id' => 0,
            'layout' => 'full'
        ), $atts, 'future_case');
        
        $post_id = intval($atts['id']);
        $layout = sanitize_text_field($atts['layout']);
        
        if (!$post_id) {
            return '<p>' . __('事例IDが指定されていません。', 'panolabo-ai-boost') . '</p>';
        }
        
        $post = get_post($post_id);
        if (!$post || $post->post_type !== 'future_case' || $post->post_status !== 'publish') {
            return '<p>' . __('指定された事例が見つかりません。', 'panolabo-ai-boost') . '</p>';
        }
        
        // Enqueue assets for this shortcode
        $this->pab_enqueue_shortcode_assets();
        
        if ($layout === 'card') {
            return $this->pab_render_card($post);
        } else {
            return $this->pab_render_full($post);
        }
    }
    
    /**
     * Render full layout
     */
    private function pab_render_full($post) {
        $meta = $this->pab_get_post_meta($post->ID);
        
        ob_start();
        ?>
        <div class="pab-future-case pab-layout-full" data-case-id="<?php echo esc_attr($post->ID); ?>">
            
            <!-- Hero Section -->
            <div class="pab-hero">
                <h2 class="pab-hero-title"><?php echo esc_html($post->post_title); ?></h2>
                <?php if ($meta['industry'] && $meta['ai_plugins_display']): ?>
                    <p class="pab-hero-subtitle">
                        <?php printf(__('%s × %s → 運用は変えずに、成果は前へ', 'panolabo-ai-boost'), 
                            esc_html($meta['industry']), 
                            esc_html($meta['ai_plugins_display'])
                        ); ?>
                    </p>
                <?php endif; ?>
                
                <?php if ($meta['client_name'] || $meta['region']): ?>
                    <div class="pab-meta-info">
                        <?php if ($meta['client_name']): ?>
                            <span class="pab-client"><?php echo esc_html($meta['client_name']); ?></span>
                        <?php endif; ?>
                        <?php if ($meta['region']): ?>
                            <span class="pab-region"><?php echo esc_html($meta['region']); ?></span>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- Before/After Content -->
            <div class="pab-before-after">
                
                <?php if ($meta['legacy_actions']): ?>
                    <div class="pab-before">
                        <h3 class="pab-section-title"><?php _e('Before: 従来の取組', 'panolabo-ai-boost'); ?></h3>
                        <div class="pab-content">
                            <?php echo wp_kses_post(wpautop($meta['legacy_actions'])); ?>
                        </div>
                    </div>
                <?php endif; ?>
                
                <?php if ($meta['future_with_ai']): ?>
                    <div class="pab-after">
                        <h3 class="pab-section-title pab-featured"><?php _e('After: AI追加後の未来像', 'panolabo-ai-boost'); ?></h3>
                        <div class="pab-content pab-featured-content">
                            <?php echo wp_kses_post(wpautop($meta['future_with_ai'])); ?>
                        </div>
                    </div>
                <?php endif; ?>
                
            </div>
            
            <!-- KPIs -->
            <?php if (!empty($meta['kpis'])): ?>
                <div class="pab-kpis">
                    <h3 class="pab-section-title"><?php _e('期待される成果（KPI）', 'panolabo-ai-boost'); ?></h3>
                    <div class="pab-kpi-grid">
                        <?php foreach ($meta['kpis'] as $kpi): ?>
                            <div class="pab-kpi-item">
                                <div class="pab-kpi-name"><?php echo esc_html($kpi['name']); ?></div>
                                <div class="pab-kpi-value"><?php echo esc_html($kpi['value']); ?></div>
                                <?php if ($kpi['note']): ?>
                                    <div class="pab-kpi-note"><?php echo esc_html($kpi['note']); ?></div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
            
            <!-- AI Plugins -->
            <?php if (!empty($meta['ai_plugins'])): ?>
                <div class="pab-ai-plugins">
                    <h3 class="pab-section-title"><?php _e('使用するAIプラグイン', 'panolabo-ai-boost'); ?></h3>
                    <div class="pab-plugin-badges">
                        <?php foreach ($meta['ai_plugins'] as $plugin): ?>
                            <span class="pab-plugin-badge pab-plugin-<?php echo esc_attr($plugin); ?>">
                                <?php echo esc_html($this->pab_get_plugin_label($plugin)); ?>
                            </span>
                        <?php endforeach; ?>
                        <?php if ($meta['ai_plugins_other']): ?>
                            <span class="pab-plugin-badge pab-plugin-other">
                                <?php echo esc_html($meta['ai_plugins_other']); ?>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
            
            <!-- Before/After Images -->
            <?php if ($meta['img_before_id'] || $meta['img_after_id']): ?>
                <div class="pab-images">
                    <h3 class="pab-section-title"><?php _e('Before / After', 'panolabo-ai-boost'); ?></h3>
                    <div class="pab-image-comparison">
                        <?php if ($meta['img_before_id']): ?>
                            <figure class="pab-image-before">
                                <img src="<?php echo wp_get_attachment_image_url($meta['img_before_id'], 'large'); ?>" 
                                     alt="<?php _e('Before画像', 'panolabo-ai-boost'); ?>" />
                                <figcaption><?php _e('Before', 'panolabo-ai-boost'); ?></figcaption>
                            </figure>
                        <?php endif; ?>
                        
                        <?php if ($meta['img_after_id']): ?>
                            <figure class="pab-image-after">
                                <img src="<?php echo wp_get_attachment_image_url($meta['img_after_id'], 'large'); ?>" 
                                     alt="<?php _e('After画像', 'panolabo-ai-boost'); ?>" />
                                <figcaption><?php _e('After', 'panolabo-ai-boost'); ?></figcaption>
                            </figure>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
            
            <!-- CTA -->
            <div class="pab-cta">
                <h3 class="pab-cta-title"><?php _e('あなたのWordPressにも"足すだけ"でOK', 'panolabo-ai-boost'); ?></h3>
                <p class="pab-cta-text"><?php _e('今のWordPressに"足すだけ"で、集客と運用が進化します。乗り換え不要のAIブースト。', 'panolabo-ai-boost'); ?></p>
                <div class="pab-cta-buttons">
                    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="pab-btn pab-btn-primary">
                        <?php _e('プラグイン導入相談', 'panolabo-ai-boost'); ?>
                    </a>
                    <a href="<?php echo esc_url(home_url('/services')); ?>" class="pab-btn pab-btn-secondary">
                        <?php _e('OEMご相談', 'panolabo-ai-boost'); ?>
                    </a>
                </div>
            </div>
            
        </div>
        <?php
        
        return ob_get_clean();
    }
    
    /**
     * Render card layout
     */
    private function pab_render_card($post) {
        $meta = $this->pab_get_post_meta($post->ID);
        
        ob_start();
        ?>
        <div class="pab-future-case pab-layout-card" data-case-id="<?php echo esc_attr($post->ID); ?>">
            <div class="pab-card">
                
                <?php if ($meta['img_after_id']): ?>
                    <div class="pab-card-image">
                        <img src="<?php echo wp_get_attachment_image_url($meta['img_after_id'], 'medium'); ?>" 
                             alt="<?php echo esc_attr($post->post_title); ?>" />
                    </div>
                <?php endif; ?>
                
                <div class="pab-card-content">
                    <h3 class="pab-card-title">
                        <a href="<?php echo get_permalink($post->ID); ?>"><?php echo esc_html($post->post_title); ?></a>
                    </h3>
                    
                    <?php if ($meta['industry']): ?>
                        <div class="pab-card-meta">
                            <span class="pab-industry"><?php echo esc_html($meta['industry']); ?></span>
                            <?php if ($meta['region']): ?>
                                <span class="pab-region"><?php echo esc_html($meta['region']); ?></span>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($post->post_excerpt): ?>
                        <p class="pab-card-excerpt"><?php echo esc_html($post->post_excerpt); ?></p>
                    <?php endif; ?>
                    
                    <?php if (!empty($meta['ai_plugins'])): ?>
                        <div class="pab-card-plugins">
                            <?php foreach (array_slice($meta['ai_plugins'], 0, 3) as $plugin): ?>
                                <span class="pab-plugin-badge pab-plugin-<?php echo esc_attr($plugin); ?>">
                                    <?php echo esc_html($this->pab_get_plugin_label($plugin)); ?>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    
                    <a href="<?php echo get_permalink($post->ID); ?>" class="pab-card-link">
                        <?php _e('詳細を見る', 'panolabo-ai-boost'); ?>
                    </a>
                </div>
                
            </div>
        </div>
        <?php
        
        return ob_get_clean();
    }
    
    /**
     * Get post meta data
     */
    private function pab_get_post_meta($post_id) {
        $meta = array(
            'client_name' => get_post_meta($post_id, 'fc_client_name', true),
            'industry' => get_post_meta($post_id, 'fc_industry', true),
            'region' => get_post_meta($post_id, 'fc_region', true),
            'legacy_actions' => get_post_meta($post_id, 'fc_legacy_actions', true),
            'future_with_ai' => get_post_meta($post_id, 'fc_future_with_ai', true),
            'kpis' => get_post_meta($post_id, 'fc_kpis', true),
            'ai_plugins' => get_post_meta($post_id, 'fc_ai_plugins', true),
            'ai_plugins_other' => get_post_meta($post_id, 'fc_ai_plugins_other', true),
            'img_before_id' => get_post_meta($post_id, 'fc_img_before_id', true),
            'img_after_id' => get_post_meta($post_id, 'fc_img_after_id', true),
        );
        
        // Default values
        if (!is_array($meta['kpis'])) $meta['kpis'] = array();
        if (!is_array($meta['ai_plugins'])) $meta['ai_plugins'] = array();
        
        // Generate AI plugins display text
        $plugin_labels = array();
        foreach ($meta['ai_plugins'] as $plugin) {
            $plugin_labels[] = $this->pab_get_plugin_label($plugin);
        }
        if ($meta['ai_plugins_other']) {
            $plugin_labels[] = $meta['ai_plugins_other'];
        }
        $meta['ai_plugins_display'] = implode(' + ', $plugin_labels);
        
        return $meta;
    }
    
    /**
     * Get plugin label
     */
    private function pab_get_plugin_label($plugin) {
        $labels = array(
            'ai_writer' => __('AI加筆', 'panolabo-ai-boost'),
            'sns_auto' => __('SNS自動投稿', 'panolabo-ai-boost'),
            'chat2doc' => __('Chat2Doc', 'panolabo-ai-boost'),
            'other' => __('その他', 'panolabo-ai-boost'),
        );
        
        return isset($labels[$plugin]) ? $labels[$plugin] : $plugin;
    }
    
    /**
     * Enqueue shortcode assets
     */
    private function pab_enqueue_shortcode_assets() {
        if (!wp_style_is('pab-future-case', 'enqueued')) {
            wp_enqueue_style('pab-future-case', PAB_ASSETS_URL . 'css/future-case.css', array(), PAB_VERSION);
        }
        
        if (!wp_script_is('pab-future-case', 'enqueued')) {
            wp_enqueue_script('pab-future-case', PAB_ASSETS_URL . 'js/future-case.js', array('jquery'), PAB_VERSION, true);
        }
    }
    
    /**
     * Modify archive query for filtering
     */
    public function pab_modify_archive_query($query) {
        if (!is_admin() && $query->is_main_query() && is_post_type_archive('future_case')) {
            
            // Filter by AI plugin
            if (isset($_GET['ai']) && !empty($_GET['ai'])) {
                $ai_plugin = sanitize_text_field($_GET['ai']);
                $query->set('meta_query', array(
                    array(
                        'key' => 'fc_ai_plugins',
                        'value' => $ai_plugin,
                        'compare' => 'LIKE',
                    ),
                ));
            }
            
            // Set posts per page
            $query->set('posts_per_page', 12);
        }
    }
}