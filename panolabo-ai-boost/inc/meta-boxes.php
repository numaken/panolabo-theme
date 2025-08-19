<?php
/**
 * Meta Boxes for Future Cases
 */

if (!defined('ABSPATH')) {
    exit;
}

class PAB_Meta_Boxes {
    
    public function __construct() {
        add_action('add_meta_boxes', array($this, 'pab_add_meta_boxes'));
        add_action('save_post', array($this, 'pab_save_meta_boxes'));
        add_action('admin_enqueue_scripts', array($this, 'pab_admin_scripts'));
    }
    
    /**
     * Add meta boxes
     */
    public function pab_add_meta_boxes() {
        add_meta_box(
            'pab_future_case_details',
            __('事例詳細情報', 'panolabo-ai-boost'),
            array($this, 'pab_meta_box_callback'),
            'future_case',
            'normal',
            'high'
        );
    }
    
    /**
     * Meta box callback
     */
    public function pab_meta_box_callback($post) {
        // Add nonce field
        wp_nonce_field('pab_meta_box_nonce', 'pab_meta_box_nonce');
        
        // Get current values
        $client_name = get_post_meta($post->ID, 'fc_client_name', true);
        $industry = get_post_meta($post->ID, 'fc_industry', true);
        $region = get_post_meta($post->ID, 'fc_region', true);
        $legacy_actions = get_post_meta($post->ID, 'fc_legacy_actions', true);
        $future_with_ai = get_post_meta($post->ID, 'fc_future_with_ai', true);
        $kpis = get_post_meta($post->ID, 'fc_kpis', true);
        $ai_plugins = get_post_meta($post->ID, 'fc_ai_plugins', true);
        $ai_plugins_other = get_post_meta($post->ID, 'fc_ai_plugins_other', true);
        $img_before_id = get_post_meta($post->ID, 'fc_img_before_id', true);
        $img_after_id = get_post_meta($post->ID, 'fc_img_after_id', true);
        
        // Default values
        if (!is_array($kpis)) $kpis = array();
        if (!is_array($ai_plugins)) $ai_plugins = array();
        ?>
        
        <style>
        .pab-meta-box { max-width: 100%; }
        .pab-field { margin-bottom: 20px; }
        .pab-field label { display: block; font-weight: bold; margin-bottom: 5px; }
        .pab-field input[type="text"], .pab-field textarea { width: 100%; max-width: 500px; }
        .pab-field textarea { height: 100px; }
        .pab-kpi-row { background: #f9f9f9; padding: 15px; margin: 10px 0; border: 1px solid #ddd; border-radius: 4px; }
        .pab-kpi-row input { margin: 5px 0; }
        .pab-kpi-remove { background: #dc3545; color: white; border: none; padding: 5px 10px; border-radius: 3px; cursor: pointer; }
        .pab-add-kpi { background: #007cba; color: white; border: none; padding: 10px 15px; border-radius: 3px; cursor: pointer; }
        .pab-image-preview { max-width: 200px; height: auto; margin: 10px 0; display: block; }
        .pab-checkbox-group { display: flex; flex-wrap: wrap; gap: 15px; }
        .pab-checkbox-group label { font-weight: normal; display: flex; align-items: center; }
        .pab-checkbox-group input { margin-right: 8px; }
        </style>
        
        <div class="pab-meta-box">
            
            <div class="pab-field">
                <label for="fc_client_name"><?php _e('クライアント名', 'panolabo-ai-boost'); ?></label>
                <input type="text" id="fc_client_name" name="fc_client_name" value="<?php echo esc_attr($client_name); ?>" placeholder="例: 株式会社○○" />
            </div>
            
            <div class="pab-field">
                <label for="fc_industry"><?php _e('業種', 'panolabo-ai-boost'); ?></label>
                <input type="text" id="fc_industry" name="fc_industry" value="<?php echo esc_attr($industry); ?>" placeholder="例: 飲食店、美容室、製造業" />
            </div>
            
            <div class="pab-field">
                <label for="fc_region"><?php _e('地域', 'panolabo-ai-boost'); ?></label>
                <input type="text" id="fc_region" name="fc_region" value="<?php echo esc_attr($region); ?>" placeholder="例: 東京都渋谷区" />
            </div>
            
            <div class="pab-field">
                <label for="fc_legacy_actions"><?php _e('従来の取組', 'panolabo-ai-boost'); ?></label>
                <textarea id="fc_legacy_actions" name="fc_legacy_actions" placeholder="従来のマーケティングや運用方法について記述してください"><?php echo esc_textarea($legacy_actions); ?></textarea>
            </div>
            
            <div class="pab-field">
                <label for="fc_future_with_ai"><?php _e('AI追加後の未来像（主役）', 'panolabo-ai-boost'); ?></label>
                <textarea id="fc_future_with_ai" name="fc_future_with_ai" placeholder="AIプラグインを追加することで実現される未来の姿を具体的に記述してください"><?php echo esc_textarea($future_with_ai); ?></textarea>
            </div>
            
            <div class="pab-field">
                <label><?php _e('KPI（成果指標）', 'panolabo-ai-boost'); ?></label>
                <div id="pab-kpis-container">
                    <?php if (!empty($kpis)): ?>
                        <?php foreach ($kpis as $index => $kpi): ?>
                            <div class="pab-kpi-row">
                                <input type="text" name="fc_kpis[<?php echo $index; ?>][name]" placeholder="指標名（例: 予約率）" value="<?php echo esc_attr($kpi['name'] ?? ''); ?>" style="width: 30%;" />
                                <input type="text" name="fc_kpis[<?php echo $index; ?>][value]" placeholder="数値（例: +25%）" value="<?php echo esc_attr($kpi['value'] ?? ''); ?>" style="width: 20%;" />
                                <input type="text" name="fc_kpis[<?php echo $index; ?>][note]" placeholder="補足説明" value="<?php echo esc_attr($kpi['note'] ?? ''); ?>" style="width: 35%;" />
                                <button type="button" class="pab-kpi-remove" onclick="this.parentElement.remove()">削除</button>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <button type="button" class="pab-add-kpi" onclick="pabAddKpi()">KPIを追加</button>
            </div>
            
            <div class="pab-field">
                <label><?php _e('使用するAIプラグイン', 'panolabo-ai-boost'); ?></label>
                <div class="pab-checkbox-group">
                    <label>
                        <input type="checkbox" name="fc_ai_plugins[]" value="ai_writer" <?php checked(in_array('ai_writer', $ai_plugins)); ?> />
                        AI加筆
                    </label>
                    <label>
                        <input type="checkbox" name="fc_ai_plugins[]" value="sns_auto" <?php checked(in_array('sns_auto', $ai_plugins)); ?> />
                        SNS自動投稿
                    </label>
                    <label>
                        <input type="checkbox" name="fc_ai_plugins[]" value="chat2doc" <?php checked(in_array('chat2doc', $ai_plugins)); ?> />
                        Chat2Doc
                    </label>
                    <label>
                        <input type="checkbox" name="fc_ai_plugins[]" value="other" <?php checked(in_array('other', $ai_plugins)); ?> />
                        その他
                    </label>
                </div>
                <div class="pab-field" style="margin-top: 10px;">
                    <label for="fc_ai_plugins_other"><?php _e('その他の詳細', 'panolabo-ai-boost'); ?></label>
                    <input type="text" id="fc_ai_plugins_other" name="fc_ai_plugins_other" value="<?php echo esc_attr($ai_plugins_other); ?>" placeholder="その他のAIプラグインがある場合は記入" />
                </div>
            </div>
            
            <div class="pab-field">
                <label><?php _e('Before画像', 'panolabo-ai-boost'); ?></label>
                <input type="hidden" id="fc_img_before_id" name="fc_img_before_id" value="<?php echo esc_attr($img_before_id); ?>" />
                <button type="button" class="button" onclick="pabSelectImage('before')"><?php _e('Before画像を選択', 'panolabo-ai-boost'); ?></button>
                <button type="button" class="button" onclick="pabRemoveImage('before')"><?php _e('削除', 'panolabo-ai-boost'); ?></button>
                <div id="pab-before-preview">
                    <?php if ($img_before_id): ?>
                        <img src="<?php echo wp_get_attachment_image_url($img_before_id, 'medium'); ?>" class="pab-image-preview" />
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="pab-field">
                <label><?php _e('After画像', 'panolabo-ai-boost'); ?></label>
                <input type="hidden" id="fc_img_after_id" name="fc_img_after_id" value="<?php echo esc_attr($img_after_id); ?>" />
                <button type="button" class="button" onclick="pabSelectImage('after')"><?php _e('After画像を選択', 'panolabo-ai-boost'); ?></button>
                <button type="button" class="button" onclick="pabRemoveImage('after')"><?php _e('削除', 'panolabo-ai-boost'); ?></button>
                <div id="pab-after-preview">
                    <?php if ($img_after_id): ?>
                        <img src="<?php echo wp_get_attachment_image_url($img_after_id, 'medium'); ?>" class="pab-image-preview" />
                    <?php endif; ?>
                </div>
            </div>
            
        </div>
        
        <script>
        let pabKpiIndex = <?php echo count($kpis); ?>;
        
        function pabAddKpi() {
            const container = document.getElementById('pab-kpis-container');
            const div = document.createElement('div');
            div.className = 'pab-kpi-row';
            div.innerHTML = `
                <input type="text" name="fc_kpis[${pabKpiIndex}][name]" placeholder="指標名（例: 予約率）" style="width: 30%;" />
                <input type="text" name="fc_kpis[${pabKpiIndex}][value]" placeholder="数値（例: +25%）" style="width: 20%;" />
                <input type="text" name="fc_kpis[${pabKpiIndex}][note]" placeholder="補足説明" style="width: 35%;" />
                <button type="button" class="pab-kpi-remove" onclick="this.parentElement.remove()">削除</button>
            `;
            container.appendChild(div);
            pabKpiIndex++;
        }
        
        function pabSelectImage(type) {
            const frame = wp.media({
                title: 'Select Image',
                button: { text: 'Use this image' },
                multiple: false
            });
            
            frame.on('select', function() {
                const attachment = frame.state().get('selection').first().toJSON();
                document.getElementById('fc_img_' + type + '_id').value = attachment.id;
                document.getElementById('pab-' + type + '-preview').innerHTML = 
                    '<img src="' + attachment.sizes.medium.url + '" class="pab-image-preview" />';
            });
            
            frame.open();
        }
        
        function pabRemoveImage(type) {
            document.getElementById('fc_img_' + type + '_id').value = '';
            document.getElementById('pab-' + type + '-preview').innerHTML = '';
        }
        </script>
        
        <?php
    }
    
    /**
     * Save meta box data
     */
    public function pab_save_meta_boxes($post_id) {
        // Verify nonce
        if (!isset($_POST['pab_meta_box_nonce']) || !wp_verify_nonce($_POST['pab_meta_box_nonce'], 'pab_meta_box_nonce')) {
            return;
        }
        
        // Check autosave
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }
        
        // Check permissions
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }
        
        // Save fields
        $fields = array(
            'fc_client_name' => 'sanitize_text_field',
            'fc_industry' => 'sanitize_text_field',
            'fc_region' => 'sanitize_text_field',
            'fc_legacy_actions' => 'wp_kses_post',
            'fc_future_with_ai' => 'wp_kses_post',
            'fc_ai_plugins_other' => 'sanitize_text_field',
            'fc_img_before_id' => 'absint',
            'fc_img_after_id' => 'absint',
        );
        
        foreach ($fields as $field => $sanitize_function) {
            if (isset($_POST[$field])) {
                update_post_meta($post_id, $field, $sanitize_function($_POST[$field]));
            }
        }
        
        // Save KPIs
        if (isset($_POST['fc_kpis']) && is_array($_POST['fc_kpis'])) {
            $kpis = array();
            foreach ($_POST['fc_kpis'] as $kpi) {
                if (!empty($kpi['name'])) {
                    $kpis[] = array(
                        'name' => sanitize_text_field($kpi['name']),
                        'value' => sanitize_text_field($kpi['value']),
                        'note' => sanitize_text_field($kpi['note']),
                    );
                }
            }
            update_post_meta($post_id, 'fc_kpis', $kpis);
        }
        
        // Save AI plugins
        if (isset($_POST['fc_ai_plugins']) && is_array($_POST['fc_ai_plugins'])) {
            $ai_plugins = array_map('sanitize_text_field', $_POST['fc_ai_plugins']);
            update_post_meta($post_id, 'fc_ai_plugins', $ai_plugins);
        } else {
            update_post_meta($post_id, 'fc_ai_plugins', array());
        }
    }
    
    /**
     * Enqueue admin scripts
     */
    public function pab_admin_scripts($hook) {
        global $post_type;
        
        if ('future_case' === $post_type && ('post.php' === $hook || 'post-new.php' === $hook)) {
            wp_enqueue_media();
        }
    }
}