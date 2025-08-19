<?php
/**
 * Clients Page Handler
 * クライアント一覧ページのバックエンド処理
 * 
 * @package Numaken_Theme
 * @version 2.0.0
 */

// 直接アクセスを防ぐ
if (!defined('ABSPATH')) {
    exit;
}

class Numaken_Clients_Handler {
    
    private $table_name;
    private $cache_key_prefix = 'numaken_clients_';
    
    public function __construct() {
        global $wpdb;
        $this->table_name = $wpdb->prefix . 'panolabo_contents';
        
        // AJAXエンドポイント登録
        add_action('wp_ajax_get_client_markers', array($this, 'ajax_get_markers'));
        add_action('wp_ajax_nopriv_get_client_markers', array($this, 'ajax_get_markers'));
        
        add_action('wp_ajax_get_client_categories', array($this, 'ajax_get_categories'));
        add_action('wp_ajax_nopriv_get_client_categories', array($this, 'ajax_get_categories'));
    }
    
    /**
     * カテゴリ一覧を安全に取得
     */
    public function get_categories() {
        $cache_key = $this->cache_key_prefix . 'categories';
        $categories = get_transient($cache_key);
        
        if ($categories === false) {
            global $wpdb;
            
            $query = $wpdb->prepare(
                "SELECT DISTINCT main_category FROM {$this->table_name} 
                 WHERE main_category IS NOT NULL 
                 AND main_category != '' 
                 ORDER BY main_category ASC"
            );
            
            $categories = $wpdb->get_col($query);
            
            if ($wpdb->last_error) {
                numaken_log_error('Categories query error: ' . $wpdb->last_error);
                return array();
            }
            
            // 1時間キャッシュ
            set_transient($cache_key, $categories, 3600);
        }
        
        return is_array($categories) ? $categories : array();
    }
    
    /**
     * マーカーデータを安全に取得
     */
    public function get_markers($params = array()) {
        global $wpdb;
        
        // パラメータの検証とデフォルト値
        $validated_params = $this->validate_marker_params($params);
        
        if ($validated_params === false) {
            return array('error' => 'Invalid parameters');
        }
        
        // キャッシュキーの生成
        $cache_key = $this->cache_key_prefix . 'markers_' . md5(serialize($validated_params));
        $results = get_transient($cache_key);
        
        if ($results === false) {
            $results = $this->execute_marker_query($validated_params);
            
            if (!is_array($results)) {
                return array('error' => 'Database query failed');
            }
            
            // 結果のサニタイズ
            $results = array_map(array($this, 'sanitize_marker_data'), $results);
            
            // 5分間キャッシュ
            set_transient($cache_key, $results, 300);
        }
        
        return $results;
    }
    
    /**
     * マーカーパラメータの検証
     */
    private function validate_marker_params($params) {
        $defaults = array(
            'limit' => 100,
            'offset' => 0,
            'category' => '',
            'search' => '',
            'ne_lat' => null,
            'ne_lng' => null,
            'sw_lat' => null,
            'sw_lng' => null
        );
        
        $params = wp_parse_args($params, $defaults);
        
        // 数値パラメータの検証
        $params['limit'] = intval($params['limit']);
        $params['offset'] = intval($params['offset']);
        
        if ($params['limit'] <= 0 || $params['limit'] > 1000) {
            $params['limit'] = 100;
        }
        
        if ($params['offset'] < 0) {
            $params['offset'] = 0;
        }
        
        // 座標の検証
        if (isset($params['ne_lat'], $params['ne_lng'], $params['sw_lat'], $params['sw_lng'])) {
            $coords = array(
                'ne_lat' => floatval($params['ne_lat']),
                'ne_lng' => floatval($params['ne_lng']),
                'sw_lat' => floatval($params['sw_lat']),
                'sw_lng' => floatval($params['sw_lng'])
            );
            
            foreach ($coords as $key => $value) {
                if (strpos($key, 'lat') !== false) {
                    if ($value < -90 || $value > 90) {
                        return false;
                    }
                } else {
                    if ($value < -180 || $value > 180) {
                        return false;
                    }
                }
            }
            
            $params = array_merge($params, $coords);
        }
        
        // テキストパラメータのサニタイズ
        $params['category'] = sanitize_text_field($params['category']);
        $params['search'] = sanitize_text_field($params['search']);
        
        return $params;
    }
    
    /**
     * マーカークエリの実行
     */
    private function execute_marker_query($params) {
        global $wpdb;
        
        $where_conditions = array();
        $query_params = array();
        
        // 地理的範囲フィルター
        if (isset($params['ne_lat'], $params['ne_lng'], $params['sw_lat'], $params['sw_lng'])) {
            $where_conditions[] = "lat BETWEEN %f AND %f AND lng BETWEEN %f AND %f";
            $query_params[] = $params['sw_lat'];
            $query_params[] = $params['ne_lat'];
            $query_params[] = $params['sw_lng'];
            $query_params[] = $params['ne_lng'];
        }
        
        // カテゴリフィルター
        if (!empty($params['category'])) {
            $where_conditions[] = "main_category = %s";
            $query_params[] = $params['category'];
        }
        
        // 検索フィルター
        if (!empty($params['search'])) {
            $where_conditions[] = "(title LIKE %s OR description LIKE %s)";
            $search_term = '%' . $wpdb->esc_like($params['search']) . '%';
            $query_params[] = $search_term;
            $query_params[] = $search_term;
        }
        
        // 基本条件（座標が存在する）
        $where_conditions[] = "lat IS NOT NULL AND lng IS NOT NULL AND lat != 0 AND lng != 0";
        
        // クエリ構築
        $where_clause = !empty($where_conditions) ? 'WHERE ' . implode(' AND ', $where_conditions) : '';
        
        $query = "SELECT id, title, description, lat, lng, main_category, thumb, thumb2x, 
                         authored_index_url, regular_holiday, tel, site_url, 
                         business_hour_from, business_hour_to, address, qr_code
                  FROM {$this->table_name} 
                  {$where_clause}
                  ORDER BY id DESC 
                  LIMIT %d OFFSET %d";
        
        $query_params[] = $params['limit'];
        $query_params[] = $params['offset'];
        
        $prepared_query = $wpdb->prepare($query, $query_params);
        $results = $wpdb->get_results($prepared_query, ARRAY_A);
        
        if ($wpdb->last_error) {
            numaken_log_error('Marker query error: ' . $wpdb->last_error, array(
                'query' => $prepared_query,
                'params' => $params
            ));
            return false;
        }
        
        return $results;
    }
    
    /**
     * マーカーデータのサニタイズ
     */
    private function sanitize_marker_data($data) {
        $sanitized = array();
        
        $sanitized['id'] = intval($data['id']);
        $sanitized['title'] = esc_html($data['title']);
        $sanitized['description'] = esc_html($data['description']);
        $sanitized['lat'] = floatval($data['lat']);
        $sanitized['lng'] = floatval($data['lng']);
        $sanitized['main_category'] = esc_html($data['main_category']);
        $sanitized['thumb'] = esc_url($data['thumb']);
        $sanitized['thumb2x'] = esc_url($data['thumb2x']);
        $sanitized['authored_index_url'] = esc_url($data['authored_index_url']);
        $sanitized['regular_holiday'] = esc_html($data['regular_holiday']);
        $sanitized['tel'] = esc_html($data['tel']);
        $sanitized['site_url'] = esc_url($data['site_url']);
        $sanitized['business_hour_from'] = esc_html($data['business_hour_from']);
        $sanitized['business_hour_to'] = esc_html($data['business_hour_to']);
        $sanitized['address'] = esc_html($data['address']);
        $sanitized['qr_code'] = esc_url($data['qr_code']);
        
        return $sanitized;
    }
    
    /**
     * AJAX: マーカー取得
     */
    public function ajax_get_markers() {
        // Nonce検証
        if (!wp_verify_nonce($_GET['nonce'] ?? '', 'numaken_clients_nonce')) {
            wp_send_json_error('Invalid nonce', 403);
            return;
        }
        
        // レート制限チェック
        if (!$this->check_rate_limit()) {
            wp_send_json_error('Rate limit exceeded', 429);
            return;
        }
        
        $params = array(
            'limit' => $_GET['limit'] ?? 100,
            'offset' => $_GET['offset'] ?? 0,
            'category' => $_GET['category'] ?? '',
            'search' => $_GET['search'] ?? '',
            'ne_lat' => $_GET['ne_lat'] ?? null,
            'ne_lng' => $_GET['ne_lng'] ?? null,
            'sw_lat' => $_GET['sw_lat'] ?? null,
            'sw_lng' => $_GET['sw_lng'] ?? null
        );
        
        $results = $this->get_markers($params);
        
        if (isset($results['error'])) {
            wp_send_json_error($results['error'], 400);
        } else {
            wp_send_json_success($results);
        }
    }
    
    /**
     * AJAX: カテゴリ取得
     */
    public function ajax_get_categories() {
        // Nonce検証
        if (!wp_verify_nonce($_GET['nonce'] ?? '', 'numaken_clients_nonce')) {
            wp_send_json_error('Invalid nonce', 403);
            return;
        }
        
        $categories = $this->get_categories();
        wp_send_json_success($categories);
    }
    
    /**
     * 簡易レート制限
     */
    private function check_rate_limit() {
        $ip = $_SERVER['REMOTE_ADDR'] ?? '';
        $key = 'numaken_rate_limit_' . md5($ip);
        $requests = get_transient($key);
        
        if ($requests === false) {
            set_transient($key, 1, 60); // 1分間
            return true;
        }
        
        if ($requests >= 60) { // 1分間に60リクエスト制限
            return false;
        }
        
        set_transient($key, $requests + 1, 60);
        return true;
    }
    
    /**
     * Google Maps APIキーの取得
     */
    public function get_maps_api_key() {
        $api_key = get_option('numaken_google_maps_api_key', '');
        
        if (empty($api_key) && defined('GOOGLE_MAPS_API_KEY')) {
            $api_key = GOOGLE_MAPS_API_KEY;
        }
        
        // 一時的なフォールバック（テスト用）
        if (empty($api_key)) {
            // 本番環境では適切なAPIキーを設定してください
            $api_key = ''; // 空のまま（マップは表示されませんが、エラーは回避）
        }
        
        return $api_key;
    }
    
    /**
     * デフォルト座標の取得
     */
    public function get_default_coordinates() {
        return array(
            'lat' => 35.3056, // 愛知県一宮市
            'lng' => 136.8006
        );
    }
}

// インスタンス化
global $numaken_clients_handler;
$numaken_clients_handler = new Numaken_Clients_Handler();