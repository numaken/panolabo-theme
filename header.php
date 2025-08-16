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

<!-- Preload critical resources -->
<link rel="preload" as="image" href="<?php echo esc_url( get_theme_file_uri('/assets/img/hero-placeholder.webp') ); ?>">
<link rel="preload" as="style" href="https://cdn.jsdelivr.net/npm/uikit@3.17.12/dist/css/uikit.min.css">

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

<!-- Parallax用の簡易CSS/JS（必要に応じて別ファイル化でもOK） -->
<style>
    .parallax {
        background-attachment: fixed;
        background-size: cover;
        background-position: center;
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
      "telephone": "+81-90-4749-5780",
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
document.addEventListener("scroll", function() {
    let scrolled = window.pageYOffset;
    document.querySelectorAll('.parallax').forEach(function(element) {
        let offset = scrolled * 0.5;
        element.style.backgroundPositionY = offset + "px";
    });
});
</script>

</head>

<body <?php body_class(); // bodyタグにWP標準のクラス付与 ?>>
<div id="loadbox" class="loadbox-active">
    <div class="wrapper">
        <div class="inner uk-padding">
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/logo/logo.png" 
                 alt="panolabo. - 今、見（魅）せることで「思い込みのリセット」を。">
            <span class="uk-text-bold uk-visible@s">
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
            // 500ms後にフェードアウト開始
            setTimeout(function() {
                loadbox.classList.remove('loadbox-active');
                loadbox.classList.add('loadbox-hidden');
                
                // フェードアウト完了後に完全に非表示
                setTimeout(function() {
                    loadbox.style.display = 'none';
                }, 400);
            }, 500);
        }
    });
    
    // 緊急用：5秒後に強制的に非表示（安全装置）
    setTimeout(function() {
        var loadbox = document.getElementById('loadbox');
        if (loadbox && loadbox.style.display !== 'none') {
            loadbox.classList.remove('loadbox-active');
            loadbox.classList.add('loadbox-hidden');
            setTimeout(function() {
                loadbox.style.display = 'none';
            }, 400);
        }
    }, 5000);
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
