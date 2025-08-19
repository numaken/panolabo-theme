<?php
/**
 * Hero Section Template
 * File: section-hero.php
 */
?>

<section class="uk-section  parallax" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/hero-bg.jpg'); background-size: cover; background-position: center;">
  <div class="uk-container">
    <div class="uk-grid uk-child-width-1-2@m uk-padding" uk-grid>

      <!-- Left Column (Text) -->
      <div class="uk-animation-slide-left">
        <h1 class="uk-h2 uk-text-bold uk-text-white">
          <small class="uk-h5 uk-text-white">あなたのブランドで「ストック型収益」を生む新事業を。</small><br />
          初期投資ゼロ、運用サポート付きで安心スタート。
        </h1>
        <h2 class="uk-h3 uk-text-bold uk-text-left uk-text-white">
          「ゼロから始める“自社ブランド事業”。IT知識ゼロでも、月額収益化が可能です。」
        </h2>
        <p class="uk-margin-small-top">
          あなたが主役の“ブランド事業”を今日から。<br />
          提案力 × 継続収益 ＝ 競合に差をつける “あなただけの事業パッケージ”
        </p>
      </div>

      <!-- Right Column (Slideshow) -->
      <div class="uk-animation-slide-right">
        <div class="uk-position-relative uk-visible-toggle " tabindex="-1" uk-slideshow="animation: scale; autoplay: true; autoplay-interval: 5000; max-height: 480;">

          <ul class="uk-slideshow-items" style="max-height: 480px;">
            <li>
              <img
                src="<?php echo get_template_directory_uri(); ?>/images/frontpage/panolabo-card.png"
                alt="Hero Image"
                style="width: 100%; height: 100%; object-fit: cover;"
              />
            </li>
            <li>
              <img
                src="<?php echo get_template_directory_uri(); ?>/images/4192897_l.jpg"
                alt="Hero Image"
                style="width: 100%; height: 100%; object-fit: cover;"
              />
            </li>
            <li>
              <img
                src="<?php echo get_template_directory_uri(); ?>/images/frontpage/panolabo_app.png"
                alt="Hero Image 2"
                style="width: 100%; height: 100%; object-fit: cover;"
              />
            </li>
            <li>
              <img
                src="<?php echo get_template_directory_uri(); ?>/images/frontpage/361-1.png"
                alt="Hero Image 3"
                style="width: 100%; height: 100%; object-fit: cover;"
              />
            </li>
          </ul>

          <!-- Navigation Buttons -->
          <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
          <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>

        </div>
      </div>

    </div>
  </div>
</section>
