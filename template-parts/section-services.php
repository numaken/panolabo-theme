<?php
/**
 * File: section-services.php
 * Purpose: ３つのサービス（VR・アプリ・Web）を訴求するセクション（強化版）
 */
?>
<section id="services" class="uk-section ">
  <div class="uk-container">

    <!-- 見出し・リード -->
    <div class="uk-text-center uk-margin-large-bottom" uk-scrollspy="cls:uk-animation-slide-bottom-small; delay:200;">
      <div class="uk-heading-line uk-h2">
        <span>
          <img src="<?php bloginfo('template_directory'); ?>/images/logo_panolabo.png" alt="Panolabo LLC ロゴ" style="height:40px;">
          の強み
        </span>
      </div>
      <h2 class="uk-text-bold uk-margin-small-bottom ">
        自社ブランドで販売できる“唯一無二”のサービス群
      </h2>
      <p class="uk-text-lead">
        単発受注ではなく、<strong>継続収益</strong>と<strong>顧客ロイヤルティ</strong>を得る仕組みへ。<br>
        「空間 × モバイル × Web」を融合した、差別化された集客支援パッケージをご提供します。
      </p>
    </div>

    <!-- 1. VR -->
    <div class="uk-grid-large uk-child-width-1-2@m uk-flex-middle uk-grid-match uk-padding" uk-grid uk-scrollspy="target: > div; cls:uk-animation-fade; delay:300;">
      <div>
        <div class="uk-cover-container uk-height-large uk-box-shadow-small uk-border-rounded">
          <iframe
            src="https://s3-ap-northeast-1.amazonaws.com/static.panolabo.com/155/1087/74213012408102/index.html"
            width="100%" height="100%" frameborder="0" allowfullscreen
            style="border-radius: 12px;">
          </iframe>
        </div>
      </div>
      <div>
        <h3 class=" uk-text-bold uk-margin-small-bottom">360°VRによる「空間の可視化」で来店・成約を促進</h3>
        <p>
          飲食店・美容室・不動産・医療など、多業種に導入済み。<br>
          臨場感ある体験を通じて、競合と差をつける「空間マーケティング」が可能に。
        </p>
      </div>
    </div>

    <!-- 2. アプリ -->
    <div class="uk-grid-large uk-child-width-1-2@m uk-flex-middle uk-grid-match uk-padding" uk-grid uk-scrollspy="target: > div; cls:uk-animation-slide-left-small; delay:300;">
      <div class="uk-flex-last@m">
        <div uk-slider="autoplay: true; autoplay-interval: 5000;">
          <ul class="uk-slider-items uk-child-width-1-1">
            <?php
            $slides = [
              'https://s3-ap-northeast-1.amazonaws.com/static.panolabo.com/74/818/34902180207102/index.html',
              'https://www.trattoria-haru-italian.com/recommend-app/',
              'https://www.trattoria-haru-italian.com/blog-app/',
              'https://www.trattoria-haru-italian.com/about-app/'
            ];
            foreach ($slides as $url) : ?>
              <li>
                <div class="uk-position-relative uk-text-center">
                  <img src="<?php bloginfo('template_directory'); ?>/images/iphone.png" alt="アプリスライド" style="width: 50%;">
                  <div class="uk-position-absolute" style="top: 2%; left: 27%; width: 46%; height: 96%; overflow: hidden; border-radius: 15px;">
                    <iframe src="<?php echo esc_url($url); ?>" width="100%" height="100%" frameborder="0" allowfullscreen></iframe>
                  </div>
                </div>
              </li>
            <?php endforeach; ?>
          </ul>
          <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
          <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
        </div>
      </div>
      <div class="uk-flex-first@m">
        <h3 class=" uk-text-bold uk-margin-small-bottom">アプリで“通知・予約・クーポン”を完全自動化</h3>
        <p>
          自社ブランドでのアプリ展開が可能。<br>
          プッシュ通知・スタンプカード・予約など、店舗集客に必須の機能がオールインワン。
        </p>
      </div>
    </div>

    <!-- 3. Web制作 -->
    <div class="uk-grid-large uk-child-width-1-2@m uk-flex-middle uk-grid-match uk-padding" uk-grid uk-scrollspy="target: > div; cls:uk-animation-slide-right-small; delay:300;">
      <div class="uk-position-relative uk-text-center">
        <img src="<?php bloginfo('template_directory'); ?>/images/pc.png" alt="Webサイト制作" style="width: 100%; height: auto;">
        <div class="uk-position-absolute" style="top: 6%; left: 21%; width: 70%; height: 85%; overflow: hidden;">
          <iframe
            src="https://www.torafukudou.com/"
            width="100%" height="100%" frameborder="0" allowfullscreen
            style="transform: scale(0.7); transform-origin: top left; border-radius: 15px;">
          </iframe>
        </div>
      </div>
      <div>
        <h3 class=" uk-text-bold uk-margin-small-bottom">「集客できる」構造で設計されたWeb制作</h3>
        <p>
          テンプレートを超えた柔軟なカスタマイズと、スマホファーストの設計。<br>
          コンバージョンまで考慮した構造で、公開後も成果を生み出します。
        </p>
      </div>
    </div>

    <!-- CTA -->
    <div class="uk-text-center uk-margin-large-top uk-animation-fade">
      <a href="<?php echo esc_url(home_url('/contact')); ?>"
         class="uk-button uk-button-text"
         uk-scrollspy="cls: uk-animation-scale-up; delay: 500;">
         サービスの詳細を相談する
      </a>
      <br><br>
      <a href="<?php echo esc_url(home_url('/clients')); ?>"
         class="uk-button uk-button-text">
         事例をもっと見る
      </a>
    </div>

  </div>
</section>
