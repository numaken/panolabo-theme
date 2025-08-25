<?php
// テーマのヘッダー開始部分
if ( isset($post) && $post !== null ) {
    $post_id = $post->ID;
} else {
    $post_id = null; // $post が存在しない場合のデフォルト処理
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); // 言語属性を付与 ?>>
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
<meta charset="<?php bloginfo( 'charset' ); ?>">
<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>

<!-- SEO対策: description / keywords -->
<meta name="description" content="<?php echo ( $post_id ) ? esc_attr( get_post_meta( $post_id, 'my_description', true ) ) : esc_attr( get_bloginfo('description') ); ?>" />
<?php
  $keywords = get_post_meta($post_id, 'my_keywords', true);
  if (empty($keywords)) {
    $keywords = '格安アプリ制作,アプリ作成,高収入副業,制作,GMOお店アプリ,ソフト,ヤプリ,アップリンク';
  }
?>
<meta name="keywords" content="<?php echo esc_attr($keywords); ?>" />

<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- UIKit CSS and JS - Local Files -->
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/uikit.min.css">
<script src="<?php echo get_template_directory_uri(); ?>/js/uikit.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/uikit-icons.min.js"></script>
<script>
// 即座にUIKit確認
console.log('Header: UIKit type:', typeof UIkit);
console.log('Header: UIKit object:', UIkit);
if (typeof UIkit !== 'undefined') {
    console.log('Header: UIKit successfully loaded from local files');
    window.UIKitReady = true;
} else {
    console.error('Header: UIKit failed to load from local files');
}
</script>

<!-- Preload critical resources -->
<link rel="preload" as="image" href="<?php echo esc_url( get_theme_file_uri('/assets/img/hero-placeholder.webp') ); ?>">

<!-- Skip to main content link for accessibility -->
<a class="skip-link uk-visible-focus" href="#main" style="position:absolute;left:-9999px;z-index:999;padding:1em;background:#000;color:#fff;text-decoration:none;">メインコンテンツへ移動</a>

<!-- アプリアイコン（オプション: 管理画面で設定可能にしている例） -->
<link rel="apple-touch-icon" href="<?php echo esc_url( get_option('bottom_patch_url') ); ?>">
<link rel="icon" sizes="192x192" href="<?php echo esc_url( get_option('bottom_patch_url') ); ?>">
<meta name="msapplication-tap-highlight" content="no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo esc_url( get_option('logo_icon_url') ); ?>">
<meta name="msapplication-TileImage" content="<?php echo esc_url( get_option('logo_icon_url') ); ?>">
<meta name="msapplication-TileColor" content="#3372DF">

<!-- OGP設定 -->
<meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
<?php if ( $post_id && is_single() ) : ?>
    <meta property="og:url" content="<?php the_permalink(); ?>"/>
    <meta property="og:title" content="<?php the_title(); ?>" />
    <meta property="og:description" content="<?php echo esc_attr( get_post_meta( $post_id, 'my_description', true ) ); ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:image" content="<?php echo esc_url( get_the_post_thumbnail_url($post_id, 'full') ); ?>" />
<?php else : ?>
    <meta property="og:description" content="<?php bloginfo('description'); ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="<?php echo esc_url( get_option('default_og_image') ); ?>" />
<?php endif; ?>

<!-- Twitter Card設定 -->
<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="@hogehoge" />
<meta name="twitter:creator" content="@hogehoge" />
<meta name="twitter:title" content="<?php the_title(); ?>"/>
<meta name="twitter:description" content="<?php echo ( $post_id ) ? esc_attr( get_post_meta($post_id, 'my_description', true) ) : esc_attr( get_bloginfo('description') ); ?>"/>
<meta name="twitter:image" content="<?php echo ( $post_id ) ? esc_url( get_the_post_thumbnail_url($post_id, 'full') ) : esc_url( get_option('default_twitter_image') ); ?>" />

<!-- ファビコン -->
<link rel="shortcut icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/images/logo/logoY.svg">

<!-- RSSフィード -->
<link rel="alternate" type="application/rss+xml" title="RSSフィード" href="<?php bloginfo('rss2_url'); ?>">

<?php
/**
 * ここ以降の CSS / JS は、すべて functions.php の
 * wp_enqueue_scripts フックなどにまとめて記述するのがベストプラクティス
 */
wp_head(); 
?>

<!-- パララックス無効化CSS -->
<style>
    .parallax {
        background-attachment: scroll !important;
        background-size: cover !important;
        background-position: center !important;
        transform: none !important;
        will-change: auto !important;
        overflow: visible !important;
    }
</style>




  <!-- GEO構造化データ（JSON-LD） -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "合同会社 panolabo",
    "url": "https://panolabollc.com",
    "logo": "https://panolabollc.com/img/panolabo_logo.png",
    "contactPoint": {
      "@type": "ContactPoint",
      "email": "hello@panolabollc.com",
      "contactType": "customer service",
      "areaServed": "JP",
      "availableLanguage": ["Japanese", "English"]
    },
    "sameAs": [
      "https://www.instagram.com/sara_oncourt",
      "https://www.youtube.com/@panolabollc"
    ]
  }
  </script>



<script>
// パララックス効果を一旦無効化
// 将来的に再実装する場合のためにコメントアウト
/*
function updateParallax() {
    // パララックス無効
}
*/

// パララックスクラスのtransformをリセット
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.parallax').forEach(function(element) {
        element.style.transform = 'none';
        element.style.willChange = 'auto';
    });
});
</script>

</head>

<body <?php body_class(); // bodyタグにWP標準のクラス付与 ?>>
<style>
@keyframes pikopiko {
    0% { transform: scale(1); opacity: 0.7; }
    50% { transform: scale(1.3); opacity: 1; }
    100% { transform: scale(1); opacity: 0.7; }
}
@keyframes textFade {
    0% { opacity: 0.5; }
    50% { opacity: 1; }
    100% { opacity: 0.5; }
}
.pikopiko-logo {
    animation: pikopiko 0.6s ease-in-out infinite !important;
    transform-origin: center !important;
}
.pikopiko-text {
    animation: textFade 0.8s ease-in-out infinite !important;
}
</style>

<div id="loadbox" class="loadbox-active">
    <div class="wrapper">
        <div class="inner uk-padding">
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/logo/logo.png" 
                 alt="panolabo. - 今、見（魅）せることで「思い込みのリセット」を。"
                 class="pikopiko-logo"
                 style="width: 25% !important;">
            <span class="uk-text-bold uk-visible@s pikopiko-text">
                シンプルな発想でリアルビジネスに効くサービスを。
            </span>
        </div>
    </div>
</div>

<!-- ロードボックス制御スクリプト -->
<script>
(function() {
    // ページロード完了後にロードボックスを非表示
    document.addEventListener('DOMContentLoaded', function() {
        var loadbox = document.getElementById('loadbox');
        if (loadbox) {
            console.log('LoadBox found, starting timer...');
            
            // 2000ms後に強制的に非表示
            setTimeout(function() {
                console.log('Hiding loadbox...');
                loadbox.style.display = 'none';
                loadbox.style.visibility = 'hidden';
                loadbox.style.opacity = '0';
                loadbox.remove(); // DOMから完全に削除
            }, 2000);
        }
    });
})();
</script>

<?php
    // menu-overlay.php でメニューを表示
    include_once get_template_directory() . '/menu-overlay.php';

    // パンくずリストの表示
    if ( function_exists('custom_breadcrumb') ) {
        custom_breadcrumb();
    }
?>

<!-- UIKit初期化とハンバーガーメニュー直接対応 -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOMContentLoaded: UIKit type:', typeof UIkit);
    
    if (typeof UIkit !== 'undefined') {
        console.log('DOMContentLoaded: UIKit available');
        
        // ハンバーガーメニューボタンに直接イベントを設定
        var hamburgerButton = document.querySelector('a[href="#offcanvas-nav"]');
        var offcanvasElement = document.getElementById('offcanvas-nav');
        
        if (hamburgerButton && offcanvasElement) {
            console.log('Setting up hamburger menu...');
            
            hamburgerButton.addEventListener('click', function(e) {
                e.preventDefault();
                console.log('Hamburger clicked');
                
                if (typeof UIkit !== 'undefined' && UIkit.offcanvas) {
                    var offcanvas = UIkit.offcanvas(offcanvasElement);
                    offcanvas.toggle();
                    console.log('Offcanvas toggled');
                } else {
                    console.error('UIKit offcanvas not available');
                }
            });
            
            console.log('Hamburger menu setup complete');
        } else {
            console.error('Hamburger button or offcanvas element not found');
        }
    } else {
        console.error('DOMContentLoaded: UIKit not available');
    }
});
</script>
