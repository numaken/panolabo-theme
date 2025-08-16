<?php
/**
 * アナリティクス・トラッキング設定
 * Google Analytics, ヒートマップ, ユーザー行動分析
 */

/**
 * Google Analytics 4 (GA4) 設定
 */
function setup_google_analytics() {
    // GA4測定IDを設定（実際のIDに置き換えてください）
    $ga4_measurement_id = get_option('panolabo_ga4_id', 'G-XXXXXXXXXX');
    
    if (!empty($ga4_measurement_id) && $ga4_measurement_id !== 'G-XXXXXXXXXX') {
        add_action('wp_head', function() use ($ga4_measurement_id) {
            if (!is_admin() && !current_user_can('administrator')) {
                ?>
                <!-- Google Analytics 4 -->
                <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo esc_attr($ga4_measurement_id); ?>"></script>
                <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());
                gtag('config', '<?php echo esc_js($ga4_measurement_id); ?>', {
                    'anonymize_ip': true,
                    'respect_dnt': true,
                    'allow_google_signals': false
                });
                
                // カスタムイベント設定
                <?php if (is_page('portfolio-achievements')): ?>
                gtag('event', 'page_view', {
                    'page_title': 'Portfolio Achievements',
                    'page_location': window.location.href,
                    'content_group1': 'Portfolio'
                });
                <?php endif; ?>
                
                <?php if (is_page('services')): ?>
                gtag('event', 'page_view', {
                    'page_title': 'Services',
                    'page_location': window.location.href,
                    'content_group1': 'Services'
                });
                <?php endif; ?>
                </script>
                <?php
            }
        }, 1);
    }
}

/**
 * カスタムイベントトラッキング
 */
function setup_custom_events() {
    add_action('wp_footer', function() {
        if (!is_admin()) {
            ?>
            <script>
            document.addEventListener('DOMContentLoaded', function() {
                // VRコンテンツ再生追跡
                document.querySelectorAll('.portfolio-gallery iframe').forEach(function(iframe) {
                    iframe.addEventListener('load', function() {
                        if (typeof gtag !== 'undefined') {
                            gtag('event', 'vr_content_view', {
                                'event_category': 'VR Content',
                                'event_label': iframe.getAttribute('title') || 'VR Content',
                                'value': 1
                            });
                        }
                    });
                });
                
                // 外部リンククリック追跡
                document.querySelectorAll('a[href^="http"]').forEach(function(link) {
                    if (!link.href.includes(window.location.hostname)) {
                        link.addEventListener('click', function() {
                            if (typeof gtag !== 'undefined') {
                                gtag('event', 'click', {
                                    'event_category': 'External Link',
                                    'event_label': link.href,
                                    'transport_type': 'beacon'
                                });
                            }
                        });
                    }
                });
                
                // スクロール深度追跡
                let maxScroll = 0;
                const scrollThresholds = [25, 50, 75, 90];
                
                window.addEventListener('scroll', throttle(function() {
                    const scrollPercent = Math.round(
                        (window.scrollY / (document.body.scrollHeight - window.innerHeight)) * 100
                    );
                    
                    if (scrollPercent > maxScroll) {
                        maxScroll = scrollPercent;
                        
                        scrollThresholds.forEach(function(threshold) {
                            if (scrollPercent >= threshold && maxScroll < threshold + 5) {
                                if (typeof gtag !== 'undefined') {
                                    gtag('event', 'scroll', {
                                        'event_category': 'Scroll Depth',
                                        'event_label': threshold + '%',
                                        'value': threshold
                                    });
                                }
                            }
                        });
                    }
                }, 1000));
                
                // フォーム送信追跡
                document.querySelectorAll('form').forEach(function(form) {
                    form.addEventListener('submit', function() {
                        if (typeof gtag !== 'undefined') {
                            gtag('event', 'form_submit', {
                                'event_category': 'Form',
                                'event_label': form.id || form.className || 'Unknown Form'
                            });
                        }
                    });
                });
                
                // ボタンクリック追跡
                document.querySelectorAll('.uk-button').forEach(function(button) {
                    button.addEventListener('click', function() {
                        if (typeof gtag !== 'undefined') {
                            gtag('event', 'click', {
                                'event_category': 'Button',
                                'event_label': button.textContent.trim() || button.className
                            });
                        }
                    });
                });
            });
            
            // スロットル関数
            function throttle(func, limit) {
                let inThrottle;
                return function() {
                    const args = arguments;
                    const context = this;
                    if (!inThrottle) {
                        func.apply(context, args);
                        inThrottle = true;
                        setTimeout(() => inThrottle = false, limit);
                    }
                }
            }
            </script>
            <?php
        }
    });
}

/**
 * パフォーマンス測定
 */
function setup_performance_tracking() {
    add_action('wp_footer', function() {
        ?>
        <script>
        window.addEventListener('load', function() {
            // Web Vitals測定
            if ('performance' in window) {
                setTimeout(function() {
                    const navigation = performance.getEntriesByType('navigation')[0];
                    
                    if (navigation && typeof gtag !== 'undefined') {
                        // ページ読み込み時間
                        const loadTime = Math.round(navigation.loadEventEnd - navigation.fetchStart);
                        
                        gtag('event', 'timing_complete', {
                            'name': 'page_load',
                            'value': loadTime
                        });
                        
                        // First Contentful Paint (近似値)
                        const fcp = Math.round(navigation.domContentLoadedEventEnd - navigation.fetchStart);
                        
                        gtag('event', 'web_vitals', {
                            'event_category': 'Performance',
                            'event_label': 'FCP',
                            'value': fcp
                        });
                    }
                }, 1000);
            }
            
            // ユーザーエージェント分析
            if (typeof gtag !== 'undefined') {
                const isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
                const isTablet = /iPad|Android(?!.*Mobile)|Tablet/i.test(navigator.userAgent);
                
                let deviceType = 'desktop';
                if (isMobile) deviceType = 'mobile';
                else if (isTablet) deviceType = 'tablet';
                
                gtag('event', 'device_info', {
                    'event_category': 'Device',
                    'event_label': deviceType,
                    'custom_map': {'custom_device_type': deviceType}
                });
            }
        });
        </script>
        <?php
    });
}

/**
 * コンバージョントラッキング
 */
function setup_conversion_tracking() {
    // お問い合わせページビュー
    if (is_page('contact')) {
        add_action('wp_footer', function() {
            ?>
            <script>
            if (typeof gtag !== 'undefined') {
                gtag('event', 'page_view', {
                    'page_title': 'Contact Page',
                    'content_group1': 'Contact',
                    'custom_map': {'contact_page_view': true}
                });
            }
            </script>
            <?php
        });
    }
    
    // サービスページのCTA追跡
    if (is_page('services')) {
        add_action('wp_footer', function() {
            ?>
            <script>
            document.addEventListener('DOMContentLoaded', function() {
                // サービス問い合わせボタンクリック追跡
                document.querySelectorAll('a[href*="contact"]').forEach(function(link) {
                    link.addEventListener('click', function() {
                        if (typeof gtag !== 'undefined') {
                            gtag('event', 'conversion', {
                                'event_category': 'CTA',
                                'event_label': 'Service to Contact',
                                'value': 1
                            });
                        }
                    });
                });
            });
            </script>
            <?php
        });
    }
}

/**
 * ヒートマップ設定準備
 */
function prepare_heatmap_tracking() {
    // Hotjar, Clarity, その他ヒートマップツール用の基本設定
    $heatmap_id = get_option('panolabo_heatmap_id', '');
    
    if (!empty($heatmap_id)) {
        add_action('wp_head', function() use ($heatmap_id) {
            ?>
            <!-- ヒートマップトラッキングコード -->
            <script>
            // ヒートマップツール用のカスタム属性追加
            document.addEventListener('DOMContentLoaded', function() {
                // 重要な要素にデータ属性追加
                document.querySelectorAll('.uk-button-primary').forEach(function(btn, index) {
                    btn.setAttribute('data-heatmap-button', 'primary-' + index);
                });
                
                document.querySelectorAll('.portfolio-gallery .uk-card').forEach(function(card, index) {
                    card.setAttribute('data-heatmap-portfolio', 'card-' + index);
                });
                
                document.querySelectorAll('nav a').forEach(function(link, index) {
                    link.setAttribute('data-heatmap-nav', 'nav-' + index);
                });
            });
            </script>
            <?php
        });
    }
}

/**
 * A/Bテスト設定
 */
function setup_ab_testing() {
    add_action('wp_head', function() {
        ?>
        <script>
        // 簡易A/Bテスト機能
        window.panolaboABTest = {
            getVariant: function(testName, variants) {
                const stored = localStorage.getItem('ab_test_' + testName);
                if (stored && variants.includes(stored)) {
                    return stored;
                }
                
                const variant = variants[Math.floor(Math.random() * variants.length)];
                localStorage.setItem('ab_test_' + testName, variant);
                
                if (typeof gtag !== 'undefined') {
                    gtag('event', 'ab_test_assignment', {
                        'event_category': 'A/B Test',
                        'event_label': testName + ':' + variant
                    });
                }
                
                return variant;
            }
        };
        </script>
        <?php
    });
}

/**
 * GDPR対応のプライバシー設定
 */
function setup_privacy_compliance() {
    add_action('wp_footer', function() {
        ?>
        <script>
        // クッキー同意管理
        window.panolaboPrivacy = {
            checkConsent: function() {
                return localStorage.getItem('analytics_consent') === 'granted';
            },
            
            grantConsent: function() {
                localStorage.setItem('analytics_consent', 'granted');
                localStorage.setItem('consent_date', new Date().toISOString());
                
                // 同意後にトラッキングを有効化
                if (typeof gtag !== 'undefined') {
                    gtag('consent', 'update', {
                        'analytics_storage': 'granted',
                        'ad_storage': 'denied',
                        'functionality_storage': 'granted',
                        'personalization_storage': 'denied'
                    });
                }
            },
            
            revokeConsent: function() {
                localStorage.removeItem('analytics_consent');
                localStorage.removeItem('consent_date');
                
                if (typeof gtag !== 'undefined') {
                    gtag('consent', 'update', {
                        'analytics_storage': 'denied',
                        'ad_storage': 'denied'
                    });
                }
            }
        };
        
        // 初期状態では同意なしに設定
        if (typeof gtag !== 'undefined') {
            gtag('consent', 'default', {
                'analytics_storage': 'denied',
                'ad_storage': 'denied',
                'functionality_storage': 'granted',
                'personalization_storage': 'denied'
            });
        }
        </script>
        <?php
    });
}

/**
 * 管理画面でのアナリティクス設定
 */
function add_analytics_admin_menu() {
    add_action('admin_menu', function() {
        add_options_page(
            'アナリティクス設定',
            'Analytics',
            'manage_options',
            'panolabo-analytics',
            'panolabo_analytics_admin_page'
        );
    });
}

function panolabo_analytics_admin_page() {
    if (isset($_POST['submit'])) {
        update_option('panolabo_ga4_id', sanitize_text_field($_POST['ga4_id']));
        update_option('panolabo_heatmap_id', sanitize_text_field($_POST['heatmap_id']));
        echo '<div class="notice notice-success"><p>設定を保存しました。</p></div>';
    }
    
    $ga4_id = get_option('panolabo_ga4_id', '');
    $heatmap_id = get_option('panolabo_heatmap_id', '');
    ?>
    <div class="wrap">
        <h1>panolabo アナリティクス設定</h1>
        
        <form method="post">
            <table class="form-table">
                <tr>
                    <th scope="row">Google Analytics 4 測定ID</th>
                    <td>
                        <input type="text" name="ga4_id" value="<?php echo esc_attr($ga4_id); ?>" 
                               placeholder="G-XXXXXXXXXX" class="regular-text" />
                        <p class="description">GA4の測定IDを入力してください。</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">ヒートマップID</th>
                    <td>
                        <input type="text" name="heatmap_id" value="<?php echo esc_attr($heatmap_id); ?>" 
                               placeholder="ヒートマップツールのID" class="regular-text" />
                        <p class="description">Hotjar、Microsoft Clarityなどのヒートマップツール用ID。</p>
                    </td>
                </tr>
            </table>
            
            <?php submit_button('設定を保存'); ?>
        </form>
        
        <h2>トラッキング状況</h2>
        <p><strong>現在の設定:</strong></p>
        <ul>
            <li>Google Analytics: <?php echo !empty($ga4_id) ? '有効' : '未設定'; ?></li>
            <li>カスタムイベント: 有効</li>
            <li>パフォーマンス測定: 有効</li>
            <li>プライバシー対応: 有効</li>
        </ul>
    </div>
    <?php
}

// フック登録
add_action('init', 'setup_google_analytics');
add_action('init', 'setup_custom_events');
add_action('init', 'setup_performance_tracking');
add_action('init', 'setup_conversion_tracking');
add_action('init', 'prepare_heatmap_tracking');
add_action('init', 'setup_ab_testing');
add_action('init', 'setup_privacy_compliance');
add_action('init', 'add_analytics_admin_menu');
?>