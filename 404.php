<?php
/**
 * 404 Error Page Template
 * Description: カスタム404エラーページ - ユーザーフレンドリーなエラー体験
 */
get_header(); ?>

<main class="uk-section " role="main">
  
  <!-- Hero Section: 404エラー -->
  <section class="uk-section uk-background-cover uk-background-center-center uk-background-norepeat">
    <div class="uk-container">
      <div class="uk-text-center" uk-scrollspy="cls: uk-animation-fade; delay: 200;">
        <div class="uk-margin-large-bottom">
          <span uk-icon="icon: search; ratio: 5" class=""></span>
        </div>
        <h1 class="uk-heading-primary uk-text-bold uk-margin-bottom">
          <span class="uk-text-emphasis">404</span><br>
          <span class=" uk-text-large">ページが見つかりません</span>
        </h1>
        <p class="uk-text-lead uk-margin-bottom">
          申し訳ございません。お探しのページは<br>
          <strong>削除</strong>されたか<strong>URL が変更</strong>されている可能性があります
        </p>
      </div>
    </div>
  </section>

  <!-- おすすめページ -->
  <section class="uk-section ">
    <div class="uk-container">
      <div class="uk-text-center uk-margin-large-bottom">
        <h2 class="uk-heading-medium uk-text-bold ">
          おすすめページ
        </h2>
      </div>
      
      <div class="uk-grid-medium uk-child-width-1-2@m" uk-grid>
        <div>
          <div class="uk-card uk-card-default uk-card-body uk-text-center uk-border-rounded uk-height-1-1">
            <h3 class="uk-text-bold uk-margin-bottom">
              <span uk-icon="icon: home; ratio: 2" class=""></span><br>
              トップページ
            </h3>
            <p>panolaboの概要・最新情報をご覧いただけます</p>
            <a href="<?php echo home_url(); ?>" class="uk-button uk-button-primary uk-button-small">
              ホームへ戻る
            </a>
          </div>
        </div>
        
        <div>
          <div class="uk-card uk-card-default uk-card-body uk-text-center uk-border-rounded uk-height-1-1">
            <h3 class="uk-text-bold uk-margin-bottom">
              <span uk-icon="icon: mail; ratio: 2" class=""></span><br>
              お問い合わせ
            </h3>
            <p>技術相談・プロジェクト相談承ります</p>
            <a href="<?php echo home_url('/contact/'); ?>" class="uk-button uk-button-primary uk-button-small">
              お問い合わせ
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // 404エラーのアナリティクス追跡
    if (typeof gtag !== 'undefined') {
        gtag('event', '404_error', {
            'event_category': 'Error',
            'event_label': window.location.pathname,
            'value': 1
        });
    }
});
</script>

<?php get_footer(); ?>