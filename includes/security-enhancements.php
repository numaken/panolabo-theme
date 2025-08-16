<?php
/**
 * セキュリティ強化機能
 * XSS防止、CSRF対策、セキュリティヘッダー
 */

/**
 * セキュリティヘッダー設定
 */
function add_security_headers() {
    if (!is_admin()) {
        add_action('send_headers', function() {
            if (!headers_sent()) {
                // XSS Protection
                header('X-XSS-Protection: 1; mode=block');
                
                // Content Type Options
                header('X-Content-Type-Options: nosniff');
                
                // Frame Options
                header('X-Frame-Options: SAMEORIGIN');
                
                // Referrer Policy
                header('Referrer-Policy: strict-origin-when-cross-origin');
                
                // Content Security Policy（本番環境用）
                $csp = [
                    "default-src 'self'",
                    "script-src 'self' 'unsafe-inline' 'unsafe-eval' " .
                        "https://cdn.jsdelivr.net " .
                        "https://ajax.googleapis.com " .
                        "https://www.google-analytics.com " .
                        "https://www.googletagmanager.com " .
                        "https://static.cloudflareinsights.com",
                    "style-src 'self' 'unsafe-inline' " .
                        "https://cdn.jsdelivr.net " .
                        "https://fonts.googleapis.com " .
                        "https://use.fontawesome.com",
                    "font-src 'self' data: " .
                        "https://fonts.gstatic.com " .
                        "https://use.fontawesome.com " .
                        "https://cdn.jsdelivr.net",
                    "img-src 'self' data: blob: " .
                        "https://via.placeholder.com " .
                        "https://s3-ap-northeast-1.amazonaws.com " .
                        "https://api.panolabo.com " .
                        "https://www.google-analytics.com " .
                        "https://secure.gravatar.com " .
                        "https://www.gravatar.com " .
                        "https://0.gravatar.com " .
                        "https://1.gravatar.com " .
                        "https://2.gravatar.com",
                    "frame-src 'self' " .
                        "https://s3-ap-northeast-1.amazonaws.com " .
                        "https://www.youtube.com " .
                        "https://player.vimeo.com",
                    "connect-src 'self' " .
                        "https://api.panolabo.com " .
                        "https://www.google-analytics.com " .
                        "https://analytics.google.com " .
                        "https://stats.g.doubleclick.net",
                    "object-src 'none'",
                    "base-uri 'self'",
                    "form-action 'self'",
                    "media-src 'self' data: blob:"
                ];
                
                // 開発環境ではCSPを緩和または無効化
                if (defined('WP_DEBUG') && WP_DEBUG) {
                    // 開発環境用の緩いCSP
                    header('Content-Security-Policy: default-src * data: blob:; script-src * \'unsafe-inline\' \'unsafe-eval\'; style-src * \'unsafe-inline\'; img-src * data: blob:; font-src * data:; connect-src *; frame-src *;');
                } else {
                    // 本番環境用の厳格なCSP
                    header('Content-Security-Policy: ' . implode('; ', $csp));
                }
                
                // Permissions Policy (Feature Policy)
                $permissions = [
                    "camera=()",
                    "microphone=()",
                    "geolocation=(self)",
                    "fullscreen=*",
                    "payment=()"
                ];
                
                header('Permissions-Policy: ' . implode(', ', $permissions));
                
                // HSTS (HTTPS使用時のみ)
                if (is_ssl()) {
                    header('Strict-Transport-Security: max-age=31536000; includeSubDomains; preload');
                }
            }
        });
    }
}

/**
 * 入力サニタイゼーション強化
 */
function enhanced_input_sanitization() {
    // GET/POSTパラメータの自動サニタイゼーション
    add_action('init', function() {
        if (!is_admin()) {
            $_GET = array_map('sanitize_text_field', $_GET);
            $_POST = array_map_recursive('sanitize_text_field', $_POST);
        }
    });
    
    // コメント投稿のサニタイゼーション強化
    add_filter('pre_comment_content', function($content) {
        // HTMLタグを除去（許可されたタグのみ残す）
        $allowed_tags = [
            'p' => [],
            'br' => [],
            'strong' => [],
            'em' => [],
            'a' => ['href' => [], 'title' => []]
        ];
        
        return wp_kses($content, $allowed_tags);
    });
}

/**
 * 再帰的な配列サニタイゼーション
 */
function array_map_recursive($callback, $array) {
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            $array[$key] = array_map_recursive($callback, $value);
        } else {
            $array[$key] = call_user_func($callback, $value);
        }
    }
    return $array;
}

/**
 * CSRF対策
 */
function csrf_protection() {
    // フォーム送信時のnonce検証を強化
    add_action('init', function() {
        if (!empty($_POST) && !is_admin()) {
            $protected_actions = ['contact_form', 'newsletter_signup', 'comment_post'];
            
            foreach ($protected_actions as $action) {
                if (isset($_POST['action']) && $_POST['action'] === $action) {
                    if (!wp_verify_nonce($_POST['_wpnonce'], $action)) {
                        wp_die('セキュリティエラー: 不正なリクエストです。', 'Security Error', ['response' => 403]);
                    }
                }
            }
        }
    });
}

/**
 * ファイルアップロードセキュリティ
 */
function secure_file_uploads() {
    // 許可するファイル拡張子を制限
    add_filter('upload_mimes', function($mimes) {
        // 危険な拡張子を除去
        unset($mimes['exe']);
        unset($mimes['com']);
        unset($mimes['bat']);
        unset($mimes['cmd']);
        unset($mimes['pif']);
        unset($mimes['scr']);
        unset($mimes['vbs']);
        unset($mimes['php']);
        unset($mimes['php3']);
        unset($mimes['php4']);
        unset($mimes['php5']);
        unset($mimes['phtml']);
        
        return $mimes;
    });
    
    // ファイル内容の検証
    add_filter('wp_handle_upload_prefilter', function($file) {
        // ファイルサイズ制限
        if ($file['size'] > 10 * 1024 * 1024) { // 10MB制限
            $file['error'] = 'ファイルサイズが大きすぎます（最大10MB）。';
            return $file;
        }
        
        // MIMEタイプ検証
        $allowed_types = [
            'image/jpeg', 'image/png', 'image/gif', 'image/webp',
            'application/pdf', 'text/plain', 'text/csv'
        ];
        
        if (!in_array($file['type'], $allowed_types)) {
            $file['error'] = '許可されていないファイル形式です。';
            return $file;
        }
        
        return $file;
    });
}

/**
 * SQLインジェクション防止
 */
function prevent_sql_injection() {
    // カスタムクエリの自動エスケープ
    add_filter('query', function($query) {
        if (!is_admin() && !current_user_can('manage_options')) {
            global $wpdb;
            
            // 危険なSQLキーワードの検出
            $dangerous_patterns = [
                '/union\s+select/i',
                '/drop\s+table/i',
                '/delete\s+from/i',
                '/insert\s+into/i',
                '/update\s+.*set/i',
                '/create\s+table/i',
                '/alter\s+table/i'
            ];
            
            foreach ($dangerous_patterns as $pattern) {
                if (preg_match($pattern, $query)) {
                    // 危険なクエリをログに記録
                    error_log('Potential SQL Injection attempt: ' . $query);
                    
                    // 安全なクエリに置き換え
                    return "SELECT 1 FROM {$wpdb->posts} WHERE 1=0";
                }
            }
        }
        
        return $query;
    });
}

/**
 * ログイン試行回数制限
 */
function limit_login_attempts() {
    add_action('wp_login_failed', function($username) {
        $ip = $_SERVER['REMOTE_ADDR'] ?? '';
        $key = 'login_attempts_' . md5($ip);
        
        $attempts = get_transient($key) ?: 0;
        $attempts++;
        
        set_transient($key, $attempts, HOUR_IN_SECONDS);
        
        // 5回失敗で1時間ロックアウト
        if ($attempts >= 5) {
            set_transient('login_blocked_' . md5($ip), true, HOUR_IN_SECONDS);
        }
    });
    
    add_filter('authenticate', function($user, $username, $password) {
        $ip = $_SERVER['REMOTE_ADDR'] ?? '';
        
        if (get_transient('login_blocked_' . md5($ip))) {
            return new WP_Error('login_blocked', 'ログイン試行回数が上限に達しました。1時間後に再試行してください。');
        }
        
        return $user;
    }, 30, 3);
    
    // ログイン成功時はカウンターをリセット
    add_action('wp_login', function($username, $user) {
        $ip = $_SERVER['REMOTE_ADDR'] ?? '';
        delete_transient('login_attempts_' . md5($ip));
        delete_transient('login_blocked_' . md5($ip));
    }, 10, 2);
}

/**
 * 機密情報の除去
 */
function remove_sensitive_info() {
    // WordPressバージョン情報を除去
    remove_action('wp_head', 'wp_generator');
    
    // メタ情報除去
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'wp_shortlink_wp_head', 10);
    
    // エラー情報の表示を制限
    add_filter('login_errors', function($error) {
        return '認証に失敗しました。';
    });
    
    // ファイル編集機能を無効化
    if (!defined('DISALLOW_FILE_EDIT')) {
        define('DISALLOW_FILE_EDIT', true);
    }
}

/**
 * API エンドポイントセキュリティ
 */
function secure_api_endpoints() {
    // REST API アクセス制限
    add_filter('rest_authentication_errors', function($result) {
        if (!is_user_logged_in() && !current_user_can('read')) {
            // 特定のエンドポイントのみ許可
            $allowed_endpoints = [
                '/wp/v2/posts',
                '/wp/v2/pages',
                '/wp/v2/panolabo-portfolio'
            ];
            
            $current_endpoint = $_SERVER['REQUEST_URI'] ?? '';
            
            $is_allowed = false;
            foreach ($allowed_endpoints as $endpoint) {
                if (strpos($current_endpoint, $endpoint) !== false) {
                    $is_allowed = true;
                    break;
                }
            }
            
            if (!$is_allowed) {
                return new WP_Error('rest_forbidden', 'APIアクセスが制限されています。', ['status' => 403]);
            }
        }
        
        return $result;
    });
    
    // API レート制限
    add_action('rest_api_init', function() {
        $ip = $_SERVER['REMOTE_ADDR'] ?? '';
        $key = 'api_requests_' . md5($ip);
        
        $requests = get_transient($key) ?: 0;
        
        if ($requests > 100) { // 1分間に100リクエスト制限
            wp_die('APIリクエスト制限に達しました。', 'Rate Limited', ['response' => 429]);
        }
        
        set_transient($key, $requests + 1, MINUTE_IN_SECONDS);
    });
}

/**
 * セキュリティ監査ログ
 */
function security_audit_log() {
    // 重要な操作をログに記録
    $important_actions = [
        'wp_login', 'wp_logout', 'wp_login_failed',
        'user_register', 'profile_update', 'delete_user'
    ];
    
    foreach ($important_actions as $action) {
        add_action($action, function() use ($action) {
            $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
            $user_agent = $_SERVER['HTTP_USER_AGENT'] ?? 'unknown';
            $timestamp = current_time('mysql');
            
            error_log(sprintf(
                '[SECURITY] %s - Action: %s, IP: %s, User-Agent: %s',
                $timestamp,
                $action,
                $ip,
                $user_agent
            ));
        });
    }
}

// フック登録
add_action('init', 'add_security_headers');
add_action('init', 'enhanced_input_sanitization');
add_action('init', 'csrf_protection');
add_action('init', 'secure_file_uploads');
add_action('init', 'prevent_sql_injection');
add_action('init', 'limit_login_attempts');
add_action('init', 'remove_sensitive_info');
add_action('init', 'secure_api_endpoints');
add_action('init', 'security_audit_log');

/**
 * 緊急時のセキュリティモード
 */
function emergency_security_mode() {
    if (defined('EMERGENCY_MODE') && EMERGENCY_MODE === true) {
        // 管理者以外のアクセスを制限
        if (!is_admin() && !current_user_can('administrator')) {
            wp_die('サイトメンテナンス中です。しばらくお待ちください。', 'Maintenance Mode');
        }
        
        // すべてのAPI アクセスを無効化
        add_filter('rest_enabled', '__return_false');
        
        // ログイン試行を一時的に制限
        add_filter('authenticate', function($user) {
            if (!current_user_can('administrator')) {
                return new WP_Error('maintenance_mode', 'メンテナンス中のためログインできません。');
            }
            return $user;
        }, 1);
    }
}

add_action('init', 'emergency_security_mode');
?>