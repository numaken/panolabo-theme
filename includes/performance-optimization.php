<?php
/**
 * パフォーマンス最適化機能
 * 画像遅延読み込み、CSS/JS最適化、キャッシュ制御
 */

/**
 * 画像遅延読み込み強化
 */
function enhanced_lazy_loading() {
    // Intersection Observer用のJavaScript追加
    add_action('wp_footer', function() {
        ?>
        <script>
        // 高性能Intersection Observer
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        const src = img.getAttribute('data-src');
                        const srcset = img.getAttribute('data-srcset');
                        
                        if (src) {
                            img.src = src;
                            img.removeAttribute('data-src');
                        }
                        if (srcset) {
                            img.srcset = srcset;
                            img.removeAttribute('data-srcset');
                        }
                        
                        img.classList.remove('lazy');
                        img.classList.add('lazy-loaded');
                        observer.unobserve(img);
                    }
                });
            }, {
                rootMargin: '50px 0px',
                threshold: 0.1
            });
            
            // 遅延読み込み対象の画像を監視
            document.querySelectorAll('img[data-src], img[data-srcset]').forEach(img => {
                imageObserver.observe(img);
            });
            
            // VR iframe遅延読み込み
            const iframeObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const iframe = entry.target;
                        const src = iframe.getAttribute('data-src');
                        if (src) {
                            iframe.src = src;
                            iframe.removeAttribute('data-src');
                            observer.unobserve(iframe);
                        }
                    }
                });
            }, {
                rootMargin: '100px 0px'
            });
            
            document.querySelectorAll('iframe[data-src]').forEach(iframe => {
                iframeObserver.observe(iframe);
            });
        }
        </script>
        <style>
        .lazy {
            opacity: 0;
            transition: opacity 0.3s;
        }
        .lazy-loaded {
            opacity: 1;
        }
        .lazy-placeholder {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
        }
        @keyframes loading {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }
        </style>
        <?php
    });
}

/**
 * Critical CSS インライン化
 */
function inline_critical_css() {
    if (is_front_page() || is_page()) {
        add_action('wp_head', function() {
            ?>
            <style>
            /* Critical CSS - Above the fold */
            .uk-navbar-container{background:#fff;border-bottom:1px solid #e5e5e5}
            .uk-navbar-item{color:#666}
            .uk-logo img{max-height:50px}
            .hero-section{min-height:70vh;background:linear-gradient(135deg,#1e3a5f 0%,#2c5282 50%,#3182ce 100%);color:#fff;display:flex;align-items:center}
            .uk-container{max-width:1200px;margin:0 auto;padding:0 15px}
            .uk-text-center{text-align:center}
            .uk-section{padding:60px 0}
            .cta-section{background:#1e3a5f;color:#fff}
            .{background:#f8f9fa}
            .uk-h2{font-size:2rem;line-height:1.3;margin-bottom:1rem}
            .uk-text-bold{font-weight:700}
            .{color:#1e87f0}
            .uk-margin-bottom{margin-bottom:20px}
            .uk-button{display:inline-block;padding:12px 24px;text-decoration:none;border-radius:8px;transition:all 0.3s;font-weight:600;min-height:48px;box-shadow:0 2px 8px rgba(0,0,0,0.1)}
            .uk-button-primary{background:linear-gradient(135deg,#69ba64 0%,#5aa659 100%);color:#fff;border:none}
            .uk-button-primary:hover{background:linear-gradient(135deg,#5aa659 0%,#4a9550 100%);transform:translateY(-2px);box-shadow:0 4px 16px rgba(105,186,100,0.3)}
            @media(max-width:768px){
                .uk-section{padding:40px 0}
                .uk-h2{font-size:1.5rem}
                .hero-section{min-height:50vh}
            }
            </style>
            <?php
        }, 1);
    }
}

/**
 * リソースヒント最適化
 */
function add_resource_hints() {
    add_action('wp_head', function() {
        // DNS Prefetch
        echo '<link rel="dns-prefetch" href="//cdn.jsdelivr.net">' . "\n";
        echo '<link rel="dns-prefetch" href="//ajax.googleapis.com">' . "\n";
        echo '<link rel="dns-prefetch" href="//fonts.googleapis.com">' . "\n";
        echo '<link rel="dns-prefetch" href="//use.fontawesome.com">' . "\n";
        echo '<link rel="dns-prefetch" href="//api.panolabo.com">' . "\n";
        echo '<link rel="dns-prefetch" href="//s3-ap-northeast-1.amazonaws.com">' . "\n";
        
        // Preconnect for critical resources
        echo '<link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>' . "\n";
        echo '<link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>' . "\n";
        
        // Preload critical resources
        if (is_front_page()) {
            echo '<link rel="preload" href="' . get_template_directory_uri() . '/images/logo/panolabo-logoBr.svg" as="image" type="image/svg+xml">' . "\n";
            echo '<link rel="preload" href="https://cdn.jsdelivr.net/npm/uikit@3.22.3/dist/css/uikit.min.css" as="style">' . "\n";
        }
    }, 0);
}

/**
 * 画像最適化フィルタ
 */
function optimize_images() {
    // WebP対応検出
    add_filter('wp_get_attachment_image_src', function($image, $attachment_id, $size, $icon) {
        if (!$image) return $image;
        
        // WebP対応ブラウザの場合はWebP版を生成（実装例）
        if (isset($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'image/webp') !== false) {
            $webp_url = str_replace(['.jpg', '.jpeg', '.png'], '.webp', $image[0]);
            // WebPファイルが存在する場合は置き換え
            $webp_path = str_replace(home_url(), ABSPATH, $webp_url);
            if (file_exists($webp_path)) {
                $image[0] = $webp_url;
            }
        }
        
        return $image;
    }, 10, 4);
    
    // レスポンシブ画像のsrcset最適化
    add_filter('wp_calculate_image_srcset', function($sources, $size_array, $image_src, $image_meta, $attachment_id) {
        // 不要なサイズを除去してパフォーマンス向上
        $needed_sizes = ['thumbnail', 'medium', 'large', 'full'];
        return array_filter($sources, function($source) use ($needed_sizes) {
            return in_array($source['descriptor'], $needed_sizes) || 
                   preg_match('/\d+w/', $source['descriptor']);
        });
    }, 10, 5);
}

/**
 * JavaScript非同期読み込み（jQuery除外）
 */
function async_js_loading() {
    add_filter('script_loader_tag', function($tag, $handle, $src) {
        // 非同期読み込み対象のスクリプト（jQueryは除外）
        $async_scripts = ['uikit-js', 'uikit-icons-js'];
        $defer_scripts = ['theme', 'main', 'wow', 'parallax', 'owl-carousel', 'isotope'];
        
        // jQueryは常に同期読み込み（他のスクリプトの依存関係のため）
        if ($handle === 'jquery') {
            return $tag;
        }
        
        if (in_array($handle, $async_scripts)) {
            return str_replace('<script ', '<script async ', $tag);
        }
        
        if (in_array($handle, $defer_scripts)) {
            return str_replace('<script ', '<script defer ', $tag);
        }
        
        return $tag;
    }, 10, 3);
}

/**
 * キャッシュ制御ヘッダー
 */
function enhanced_cache_headers() {
    if (!is_admin()) {
        add_action('send_headers', function() {
            if (!headers_sent()) {
                // 静的リソースの長期キャッシュ
                if (preg_match('/\.(css|js|png|jpg|jpeg|gif|webp|svg|woff|woff2|ttf|eot)$/', $_SERVER['REQUEST_URI'])) {
                    header('Cache-Control: public, max-age=31536000, immutable'); // 1年
                    header('Expires: ' . gmdate('D, d M Y H:i:s', time() + 31536000) . ' GMT');
                } elseif (is_front_page()) {
                    // フロントページは1日キャッシュ
                    header('Cache-Control: public, max-age=86400, s-maxage=86400');
                } elseif (is_page()) {
                    // その他ページは1時間キャッシュ
                    header('Cache-Control: public, max-age=3600, s-maxage=3600');
                }
                
                // ETag生成
                if (is_single() || is_page()) {
                    $etag = md5(get_the_modified_time('U') . get_the_ID());
                    header('ETag: "' . $etag . '"');
                    
                    // 304 Not Modified対応
                    if (isset($_SERVER['HTTP_IF_NONE_MATCH']) && 
                        $_SERVER['HTTP_IF_NONE_MATCH'] === '"' . $etag . '"') {
                        http_response_code(304);
                        exit;
                    }
                }
            }
        });
    }
}

/**
 * データベースクエリ最適化
 */
function optimize_database_queries() {
    // 不要なクエリを削除
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);
    remove_action('wp_head', 'wp_shortlink_wp_head', 10);
    
    // メニューキャッシュ
    add_filter('pre_wp_nav_menu', function($nav_menu, $args) {
        if (!is_admin()) {
            $cache_key = 'nav_menu_' . md5(serialize($args));
            $cached_menu = get_transient($cache_key);
            
            if ($cached_menu !== false) {
                return $cached_menu;
            }
        }
        return $nav_menu;
    }, 10, 2);
    
    // メニュー出力後のキャッシュ保存
    add_filter('wp_nav_menu', function($nav_menu, $args) {
        if (!is_admin() && !empty($nav_menu)) {
            $cache_key = 'nav_menu_' . md5(serialize($args));
            set_transient($cache_key, $nav_menu, HOUR_IN_SECONDS);
        }
        return $nav_menu;
    }, 10, 2);
}

// フック登録
add_action('init', 'enhanced_lazy_loading');
add_action('init', 'inline_critical_css');
add_action('init', 'add_resource_hints');
add_action('init', 'optimize_images');
add_action('init', 'async_js_loading');
add_action('init', 'enhanced_cache_headers');
add_action('init', 'optimize_database_queries');

/**
 * プリロード最適化
 */
function smart_preloading() {
    add_action('wp_head', function() {
        // ページ別重要リソースのプリロード
        if (is_page('portfolio-achievements')) {
            echo '<link rel="preload" href="' . home_url() . '/wp-json/wp/v2/panolabo-portfolio" as="fetch" crossorigin="anonymous">' . "\n";
        }
        
        // 次に訪問される可能性の高いページをプリフェッチ
        if (is_front_page()) {
            echo '<link rel="prefetch" href="' . home_url('/about') . '">' . "\n";
            echo '<link rel="prefetch" href="' . home_url('/services') . '">' . "\n";
        }
    }, 2);
}

add_action('init', 'smart_preloading');

/**
 * CSS/JS ミニファイと結合
 */
function optimize_static_assets() {
    if (is_admin()) return;
    
    add_action('wp_enqueue_scripts', function() {
        // 開発環境では元ファイルを使用
        if (defined('WP_DEBUG') && WP_DEBUG) return;
        
        // プロダクション環境でのみミニファイ版を使用
        $theme_uri = get_template_directory_uri();
        $theme_path = get_template_directory();
        
        // CSSファイルの結合・ミニファイ
        $css_files = [
            '/css/main.css',
            '/css/numa.custom.warm.css', 
            '/css/numa.theme.emo.css',
            '/css/responsive-enhancements.css'
        ];
        
        $combined_css_file = '/css/combined.min.css';
        $combined_css_path = $theme_path . $combined_css_file;
        
        // CSSファイルが変更されているかチェック
        if (should_regenerate_combined_file($css_files, $combined_css_path, $theme_path)) {
            combine_and_minify_css($css_files, $combined_css_path, $theme_path);
        }
        
        // 結合されたCSSファイルがある場合は使用
        if (file_exists($combined_css_path)) {
            // 個別CSSファイルを削除
            wp_dequeue_style('main-css');
            wp_dequeue_style('numa-custom-warm-css');
            wp_dequeue_style('numa-emo-theme');
            wp_dequeue_style('responsive-enhancements');
            
            // 結合されたファイルを追加
            wp_enqueue_style('combined-styles', $theme_uri . $combined_css_file, [], filemtime($combined_css_path));
        }
        
        // JavaScriptファイルの結合・ミニファイ
        $js_files = [
            '/js/theme.js',
            '/js/main.js'
        ];
        
        $combined_js_file = '/js/combined.min.js';
        $combined_js_path = $theme_path . $combined_js_file;
        
        if (should_regenerate_combined_file($js_files, $combined_js_path, $theme_path)) {
            combine_and_minify_js($js_files, $combined_js_path, $theme_path);
        }
        
        if (file_exists($combined_js_path)) {
            wp_dequeue_script('theme');
            wp_dequeue_script('main');
            
            wp_enqueue_script('combined-scripts', $theme_uri . $combined_js_file, ['jquery'], filemtime($combined_js_path), true);
        }
    }, 999);
}

/**
 * ファイルの再生成が必要かチェック
 */
function should_regenerate_combined_file($source_files, $combined_path, $theme_path) {
    if (!file_exists($combined_path)) return true;
    
    $combined_time = filemtime($combined_path);
    
    foreach ($source_files as $file) {
        $source_path = $theme_path . $file;
        if (file_exists($source_path) && filemtime($source_path) > $combined_time) {
            return true;
        }
    }
    
    return false;
}

/**
 * CSSファイルの結合・ミニファイ
 */
function combine_and_minify_css($files, $output_path, $theme_path) {
    $combined_content = '';
    
    foreach ($files as $file) {
        $file_path = $theme_path . $file;
        if (file_exists($file_path)) {
            $content = file_get_contents($file_path);
            $combined_content .= "/* " . basename($file) . " */\n" . $content . "\n\n";
        }
    }
    
    // 簡単なミニファイ処理
    $minified = minify_css($combined_content);
    
    // ディレクトリが存在しない場合は作成
    $output_dir = dirname($output_path);
    if (!file_exists($output_dir)) {
        wp_mkdir_p($output_dir);
    }
    
    file_put_contents($output_path, $minified);
}

/**
 * JavaScriptファイルの結合・ミニファイ
 */
function combine_and_minify_js($files, $output_path, $theme_path) {
    $combined_content = '';
    
    foreach ($files as $file) {
        $file_path = $theme_path . $file;
        if (file_exists($file_path)) {
            $content = file_get_contents($file_path);
            $combined_content .= "/* " . basename($file) . " */\n" . $content . "\n\n";
        }
    }
    
    // 簡単なミニファイ処理
    $minified = minify_js($combined_content);
    
    $output_dir = dirname($output_path);
    if (!file_exists($output_dir)) {
        wp_mkdir_p($output_dir);
    }
    
    file_put_contents($output_path, $minified);
}

/**
 * CSS ミニファイ処理
 */
function minify_css($css) {
    // コメント削除
    $css = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css);
    
    // 不要な空白削除
    $css = preg_replace('/\s+/', ' ', $css);
    $css = preg_replace('/\s*([{}:;,>+~])\s*/', '$1', $css);
    
    // 行末の空白削除
    $css = trim($css);
    
    return $css;
}

/**
 * JavaScript ミニファイ処理（基本的な処理のみ）
 */
function minify_js($js) {
    // 単行コメント削除（文字列内は除く）
    $js = preg_replace('/(?<![\'"\\\\])\/\/.*$/m', '', $js);
    
    // 複数行コメント削除
    $js = preg_replace('/\/\*[\s\S]*?\*\//', '', $js);
    
    // 複数の空白を1つに
    $js = preg_replace('/\s+/', ' ', $js);
    
    // セミコロンの前後の空白削除
    $js = preg_replace('/\s*;\s*/', ';', $js);
    
    // 波括弧の前後の空白削除
    $js = preg_replace('/\s*{\s*/', '{', $js);
    $js = preg_replace('/\s*}\s*/', '}', $js);
    
    return trim($js);
}

/**
 * Gzip圧縮の有効化
 */
function enable_gzip_compression() {
    add_action('init', function() {
        if (!is_admin() && !headers_sent()) {
            if (function_exists('gzencode') && !ob_get_level()) {
                ob_start(function($output) {
                    // HTML/CSS/JS のみGzip圧縮
                    $content_type = '';
                    foreach (headers_list() as $header) {
                        if (stripos($header, 'content-type:') === 0) {
                            $content_type = strtolower($header);
                            break;
                        }
                    }
                    
                    $compressible_types = ['text/html', 'text/css', 'application/javascript', 'text/javascript'];
                    $should_compress = false;
                    
                    foreach ($compressible_types as $type) {
                        if (strpos($content_type, $type) !== false) {
                            $should_compress = true;
                            break;
                        }
                    }
                    
                    if ($should_compress && isset($_SERVER['HTTP_ACCEPT_ENCODING']) && 
                        strpos($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip') !== false) {
                        header('Content-Encoding: gzip');
                        return gzencode($output, 6);
                    }
                    
                    return $output;
                });
            }
        }
    });
}

/**
 * CSS/JS バージョニングによるキャッシュバスティング
 */
function implement_cache_busting() {
    add_filter('style_loader_src', 'add_cache_busting', 10, 2);
    add_filter('script_loader_src', 'add_cache_busting', 10, 2);
}

function add_cache_busting($src, $handle) {
    // テーマディレクトリのファイルのみ対象
    $theme_uri = get_template_directory_uri();
    
    if (strpos($src, $theme_uri) !== false) {
        $file_path = str_replace($theme_uri, get_template_directory(), $src);
        
        // URLパラメータを除去
        $file_path = preg_replace('/\?.*/', '', $file_path);
        
        if (file_exists($file_path)) {
            $version = filemtime($file_path);
            $separator = (strpos($src, '?') === false) ? '?' : '&';
            return $src . $separator . 'v=' . $version;
        }
    }
    
    return $src;
}

// 本番環境でのみ最適化を有効化
if (!defined('WP_DEBUG') || !WP_DEBUG) {
    add_action('init', 'optimize_static_assets');
    add_action('init', 'enable_gzip_compression');
}

// 常にキャッシュバスティングは有効
add_action('init', 'implement_cache_busting');
?>