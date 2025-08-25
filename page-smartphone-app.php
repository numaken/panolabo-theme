<?php
/*
Template Name: スマートフォンアプリ制作
*/
get_header();
?>

<!-- ヒーローセクション -->
<section class="uk-section  parallax" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/hero-app.jpg'); min-height: 550px;">
  <div class="uk-container">
    <div class="uk-grid uk-flex-middle" uk-grid>
      <div class="uk-width-1-2@m">
        <div class="uk-card uk-card-default uk-padding uk-box-shadow-large uk-animation-slide-left">
          <h1 class=" uk-text-bold">最短翌日。あなたのブランドでアプリをリリース</h1>
          <h2 class="uk-margin-remove">OEMテンプレートで簡単・迅速・低コストなアプリ開発</h2>
          <p class="uk-text-lead uk-margin-small">制作費用：<strong class="">¥100,000〜</strong></p>
          <a href="#contact" class="uk-button uk-button-text">3分で相談してみる</a>
        </div>
      </div>
      <div class="uk-width-1-2@m uk-text-center uk-visible@s">
        <div uk-slider="autoplay: true; autoplay-interval: 5000;">
          <ul class="uk-slider-items uk-child-width-1-1">
            <?php
              $slides = [
                'https://s3-ap-northeast-1.amazonaws.com/static.panolabo.com/74/818/34902180207102/index.html',
                'https://www.trattoria-haru-italian.com/recommend-app/',
                get_template_directory_uri() . '/images/app/tickets.png',
                'https://www.trattoria-haru-italian.com/blog-app/',
                'https://www.trattoria-haru-italian.com/about-app/'
              ];
              foreach ($slides as $src) : ?>
            <li>
              <div class="uk-position-relative uk-text-center uk-margin-large-top">
                <img src="<?php bloginfo('template_directory'); ?>/images/iphone.png" alt="アプリイメージ" class="uk-width-1-1" style="width: 50%; height: auto; position: relative; z-index: 2;" />
                <div class="uk-position-absolute" style="top: 2%; left: 27%; width: 46%; height: 96%; z-index: 1; overflow: hidden;">
                  <?php if (str_ends_with($src, '.png')) : ?>
                    <img src="<?php echo $src; ?>" alt="アプリ画面" style="width: 100%; height: 100%; border-radius: 15px; object-fit: cover;" />
                  <?php else : ?>
                    <iframe src="<?php echo $src; ?>" width="100%" height="100%" frameborder="0" allowfullscreen style="transform: scale(1); transform-origin: top left; border-radius: 15px; overflow: hidden;"></iframe>
                  <?php endif; ?>
                </div>
              </div>
            </li>
            <?php endforeach; ?>
          </ul>
          <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
          <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 問題提起＆ベネフィット -->
<section class="uk-section  uk-padding-large">
  <div class="uk-container">
    <h2 class="uk-text-center  uk-text-bold uk-margin-bottom">スマホアプリは最強のリピーター戦略です</h2>
    <div class="uk-grid-match uk-child-width-1-3@m uk-text-center" uk-grid>
      <div>
        <div class="uk-card uk-card-body ">
          <span uk-icon="icon: bell; ratio: 2"></span>
          <h4 class="uk-text-bold">プッシュ通知で即時アプローチ</h4>
          <p>新メニューや限定クーポンをリアルタイムで配信。お客様の心を逃さず、再来店率を飛躍的にアップさせます。</p>
        </div>
      </div>
      <div>
        <div class="uk-card uk-card-body ">
          <span uk-icon="icon: users; ratio: 2"></span>
          <h4 class="uk-text-bold">顧客データで販促を最適化</h4>
          <p>利用履歴やアクセス状況をもとに、キャンペーン設計や分析が可能に。</p>
        </div>
      </div>
      <div>
        <div class="uk-card uk-card-body ">
          <span uk-icon="icon: heart; ratio: 2"></span>
          <h4 class="uk-text-bold">ブランド価値の向上</h4>
          <p>お店の名前がアイコンに。常にお客様のポケットの中に存在できます。</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="uk-section  uk-padding-large">
  <div class="uk-container">
    <h2 class="uk-heading-line uk-text-center uk-text-bold "><span>アプリ機能一覧</span></h2>
    <div class="uk-grid-match uk-child-width-1-3@m uk-text-center uk-margin-large-top" uk-grid>

      <div>
        <div class="uk-card uk-card-default uk-card-body">
          <img src="<?php echo get_template_directory_uri(); ?>/images/app/icon/phone.png" alt="ワンタッチダイヤル" uk-img>
          <h3 class="uk-text-bold uk-margin-top">ワンタッチダイヤル</h3>
          <p class="uk-text-bold ">アプリの電話マークをタップするだけで、店舗にすぐ発信。予約時もスムーズです。</p>
          <p>アプリ上部の「電話マーク」をタップすると店舗にワンタッチで電話が出来ます。電話帳やネット検索で番号を確認する必要が無いので、急に店舗の予約をしたい際などに便利です。</p>
        </div>
      </div>

      <div>
        <div class="uk-card uk-card-default uk-card-body">
          <img src="<?php echo get_template_directory_uri(); ?>/images/app/icon/sns.png" alt="SNSシェア機能" uk-img>
          <h3 class="uk-text-bold uk-margin-top">SNSシェア機能</h3>
          <p class="uk-text-bold ">店舗情報やアプリリンクを各種SNSで簡単シェア。自然な集客導線を生み出します。</p>
          <p>アプリの「シェア」ボタンをタップすると店舗の所在地やアプリダウンロード先の情報をSNSにシェアすることが出来ます。</p>
        </div>
      </div>

      <div>
        <div class="uk-card uk-card-default uk-card-body">
          <img src="<?php echo get_template_directory_uri(); ?>/images/app/icon/gpsmap.png" alt="GPSマップ経路案内" uk-img>
          <h3 class="uk-text-bold uk-margin-top">GPSマップ経路案内</h3>
          <p class="uk-text-bold ">現在地から店舗まで、カーナビのように案内。迷わず安心してご来店いただけます。</p>
          <p>今いる場所からお店の前までカーナビのようにお客様をご案内する事が出来ます。</p>
        </div>
      </div>

      <div>
        <div class="uk-card uk-card-default uk-card-body">
          <img src="<?php echo get_template_directory_uri(); ?>/images/app/icon/stamp.png" alt="デジタルスタンプカード" uk-img>
          <h3 class="uk-text-bold uk-margin-top">スタンプカード</h3>
          <p class="uk-text-bold ">アプリ内でスタンプを貯めて、自動でクーポン発行。リピーター育成に最適。</p>
          <p>アプリ内で運営可能なスタンプカードシステムです。スタンプが貯まると自動的に専用チケット（クーポン）が発行されます。</p>
        </div>
      </div>

      <div>
        <div class="uk-card uk-card-default uk-card-body">
          <img src="<?php echo get_template_directory_uri(); ?>/images/app/icon/point.png" alt="デジタルポイントカード" uk-img>
          <h3 class="uk-text-bold uk-margin-top">ポイントカード</h3>
          <p class="uk-text-bold ">バーコード読み取りでポイント付与・利用。操作も簡単でスタッフも安心。</p>
          <p>アプリ内で運営可能なポイントカードシステム。店舗側に貸し出している専用のiPadとバーコードリーダーで画面のバーコードを読み取り簡単にポイントの付与や利用が出来るようになっています。</p>
        </div>
      </div>

      <div>
        <div class="uk-card uk-card-default uk-card-body">
          <img src="<?php echo get_template_directory_uri(); ?>/images/app/icon/coupon.png" alt="時限クーポン" uk-img>
          <h3 class="uk-text-bold uk-margin-top">カウントダウンクーポン</h3>
          <p class="uk-text-bold ">期限付きクーポンを配信可能。限定感を演出し、来店促進につながります。</p>
          <p>アプリ会員（ダウンロードユーザー）に対してクーポンを配信することが可能です。クーポンは有効期限に合わせてタイマーが１秒毎にカウントダウンを行います。</p>
        </div>
      </div>

      <div>
        <div class="uk-card uk-card-default uk-card-body">
          <img src="<?php echo get_template_directory_uri(); ?>/images/app/icon/push.png" alt="プッシュ通知機能" uk-img>
          <h3 class="uk-text-bold uk-margin-top">プッシュメッセージ機能</h3>
          <p class="uk-text-bold ">新着情報やキャンペーンを、スマホ画面に直接通知。来店のきっかけを逃しません。</p>
          <p>ホームページはお客様がページを見に来なければ店舗の最新情報に気付いてもらえませんが、アプリの場合はアプリ会員（ダウンロードユーザー）のスマホに直接通知付きのメッセージを送ることが出来ます。</p>
        </div>
      </div>

      <div>
        <div class="uk-card uk-card-default uk-card-body">
          <img src="<?php echo get_template_directory_uri(); ?>/images/app/icon/blog.png" alt="ブログ機能" uk-img>
          <h3 class="uk-text-bold uk-margin-top">ブログ機能</h3>
          <p class="uk-text-bold ">店舗の最新情報を気軽に発信。Webサイトとの連携で効率的な運用が可能です。</p>
          <p>お店の最新情報をブログページに投稿可能です。アプリとホームページのブログ機能を連携させることが出来ます。</p>
        </div>
      </div>

      <div>
        <div class="uk-card uk-card-default uk-card-body">
          <img src="<?php echo get_template_directory_uri(); ?>/images/app/icon/takeout.png" alt="テイクアウト注文" uk-img>
          <h3 class="uk-text-bold uk-margin-top">テイクアウト注文</h3>
          <p class="uk-text-bold ">アプリから料理を事前注文。完成通知で受け取りもスムーズに。</p>
          <p>アプリからテイクアウトやデリバリーメニューの注文が可能です。ホームページサービスにもオーダーシステムはございますが、アプリ機能の場合、料理の出来上がり通知が可能となっております。</p>
        </div>
      </div>

    </div>
    <p class="uk-text-center uk-margin-large-top uk-text-lead">必要な機能だけ選んで組み合わせる、<br class="uk-visible@s">オーダーメイド感覚のアプリ構築が可能です。</p>
    <div class="uk-text-center uk-margin-top">
      <a href="<?php echo home_url('/contact/'); ?>" class="uk-button uk-button-text">無料相談・資料請求はこちら</a>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="uk-section  uk-padding-large">
  <div class="uk-container">
    <h2 class="uk-heading-line uk-text-center uk-text-bold"><span>今なら初期費用¥100,000〜！</span></h2>
    <p class="uk-text-center uk-text-lead">まずは無料相談。どんな業種でも対応可能です。</p>
    <div class="uk-text-center uk-margin-top">
      <a href="<?php echo home_url('/contact/'); ?>" class="uk-button uk-button-text">無料で相談してみる</a>
    </div>
  </div>
</section>

<?php get_footer(); ?>
