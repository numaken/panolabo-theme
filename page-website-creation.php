<?php
/*
Template Name: ウェブサイト制作
*/
get_header();
?>

<!-- ヒーローセクション -->
<section class="uk-section  parallax" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/frontpage/hero-website.png'); min-height: 520px;">
  <div class="uk-container">
    <div class="uk-grid uk-flex-middle" uk-grid>
      <div class="uk-width-1-2@m">
        <div class="uk-overlay  uk-padding-large">
          <h1 class=" uk-text-bold">想いを、最短ルートでカタチに。</h1>
          <h2 class="uk-margin-remove">スマホ時代に最適化された洗練されたWebサイトを。</h2>
          <p class="uk-text-lead">デザイン、スピード、集客、アプリ展開までワンストップ。<br>成果を出すサイトを、確かな技術でご提供します。</p>
          <div class="uk-margin-large-top uk-animation-fade">
            <a href="<?php echo esc_url(home_url('/contact/')); ?>"
                class="uk-button uk-button-text"
                uk-scrollspy="cls: uk-animation-scale-up; delay: 500;">
                無料相談はこちら
            </a>
          </div>
        </div>
      </div>
      <div class="uk-width-1-2@m uk-text-center">
        <img src="<?php echo get_template_directory_uri(); ?>/images/frontpage/featured-mobil-transparent.png" alt="スマホ対応Webサイト" uk-img>
      </div>
    </div>
  </div>
</section>



<!-- WordPressの強み -->
<section class="uk-section  uk-padding-large">
  <div class="uk-container">
    <h2 class="uk-heading-line uk-text-center uk-text-bold uk-heading-medium">
      <span><span uk-icon="icon: wordpress; ratio: 2"></span> WordPressの魅力</span>
    </h2>
    <div class="uk-grid-small uk-child-width-expand@s uk-grid-match uk-margin-top uk-child-width-1-2@m uk-child-width-1-4@l" uk-grid>

      <!-- 更新しやすさ -->
      <div>
        <div class="uk-card  uk-card-body uk-text-center">
          <span uk-icon="icon: pencil; ratio: 2"></span>
          <h3 class="uk-h4 uk-text-bold">誰でもすぐ更新</h3>
          <p>専門知識がなくてもOK。スタッフがその場で修正・投稿できる更新性。</p>
        </div>
      </div>

      <!-- SEO -->
      <div>
        <div class="uk-card  uk-card-body uk-text-center">
          <span uk-icon="icon: search; ratio: 2"></span>
          <h3 class="uk-h4 uk-text-bold">SEOで集客力UP</h3>
          <p>検索に強い構造で自然流入を加速。アクセス解析・改善もスムーズ。</p>
        </div>
      </div>

      <!-- プラグイン -->
      <div>
        <div class="uk-card  uk-card-body uk-text-center">
          <span uk-icon="icon: nut; ratio: 2"></span>
          <h3 class="uk-h4 uk-text-bold">機能は自由自在</h3>
          <p>予約・問い合わせ・決済なども自在に追加。後からの拡張性が魅力。</p>
        </div>
      </div>

      <!-- スマホ・高速表示 -->
      <div>
        <div class="uk-card  uk-card-body uk-text-center">
          <span uk-icon="icon: phone; ratio: 2"></span>
          <h3 class="uk-h4 uk-text-bold">モバイル最適化</h3>
          <p>どんなデバイスでも美しく高速。Googleの指標もクリア。</p>
        </div>
      </div>

    </div>
  </div>
</section>



<!-- セールスポイント -->
<section class="uk-section  uk-padding-large">
  <div class="uk-container">
    <h2 class="uk-heading-line uk-text-center uk-text-bold uk-heading-medium"><span>セールスポイント</span></h2>
    <div class="uk-grid-small uk-child-width-1-2@m uk-grid-match" uk-grid>
      <div>
      <div class="uk-card  uk-card-body uk-text-center">
          <h3 class="uk-text-bold"><span uk-icon="icon: users; ratio: 2"></span>専門チームによるサポート</h3>
          <p>ディレクター・デザイナー・エンジニアが専任で対応。</p>
        </div>
      </div>
      <div>
      <div class="uk-card  uk-card-body uk-text-center">
          <h3 class="uk-text-bold"><span uk-icon="icon: triangle-up; ratio: 2"></span>独自のマーケティング戦略</h3>
          <p>SEO・SNS・アクセス解析で集客を最大化。</p>
        </div>
      </div>
      <div>
      <div class="uk-card  uk-card-body uk-text-center">
          <h3 class="uk-text-bold"><span uk-icon="icon: phone; ratio: 3"></span>アプリリリースにも対応</h3>
          <p>Webサイトを元にスマホアプリを展開可能。</p>
        </div>
      </div>
      <div>
      <div class="uk-card  uk-card-body uk-text-center">
          <h3 class="uk-text-bold"><span uk-icon="icon: cog; ratio: 3"></span>更新のしやすさ</h3>
          <p>自社で簡単に更新、運用コストも低減。</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- カテゴリー紹介 -->
<section class="uk-section  uk-padding-large">
  <div class="uk-container">
    <h2 class="uk-heading-line uk-text-center uk-text-bold uk-heading-medium"><span>制作カテゴリ例</span></h2>
    <div class="uk-grid-match uk-child-width-1-4@m uk-text-center" uk-grid>
      <?php
        $categories = [
          ['img' => 'shop.png', 'alt' => '店舗ホームページ'],
          ['img' => 'corp.png', 'alt' => '企業ホームページ'],
          ['img' => 'ec.png', 'alt' => 'ECサイト'],
          ['img' => 'reserve.png', 'alt' => '予約専用サイト'],
          ['img' => 'takeout.png', 'alt' => 'テイクアウト注文ページ'],
        ];
        foreach ($categories as $cat) : ?>
        <div>
          <div class="uk-card  uk-card-body">
            <div class="uk-inline uk-margin-small-bottom">
              <img src="<?php bloginfo('template_directory'); ?>/images/web/<?php echo $cat['img']; ?>" alt="<?php echo esc_attr($cat['alt']); ?>" loading="lazy" uk-img>
            </div>
            <h3 class="uk-h4 uk-text-default uk-text-bold"><?php echo $cat['alt']; ?></h3>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- 料金プラン -->
<section class="uk-section  uk-padding-large">
  <div class="uk-container">
    <h2 class="uk-heading-line uk-text-center uk-text-bold uk-heading-medium"><span>料金プラン</span></h2>

    <div class="uk-child-width-1-3@m uk-grid-match" uk-grid>
      <div>
        <div class="uk-card  uk-card-body  uk-card-hover">
          <h3 class="uk-text-bold">ライト</h3>
          <p>5ページ構成の基本Webサイト</p>
          <p><strong>¥300,000</strong></p>
        </div>
      </div>
      <div>
        <div class="uk-card  uk-card-body  uk-card-hover">
          <h3 class="uk-text-bold">スタンダード</h3>
          <p>SEO・SNS連携・CTA設計</p>
          <p><strong>¥500,000</strong></p>
        </div>
      </div>
      <div>
        <div class="uk-card uk-card-danger  uk-card-body  uk-card-hover">
          <h3 class="uk-text-bold">プレミアム</h3>
          <p>完全オリジナル＋アプリ対応</p>
          <p><strong>¥800,000〜</strong></p>
          <span class="uk-label ">人気</span>

        </div>
      </div>
    </div>
  </div>
</section>

<!-- お問い合わせ -->
<section id="contact" class="uk-section   uk-padding-large">
  <div class="uk-container">
    <h3 class="uk-heading-line uk-text-center uk-text-bold uk-heading-medium"><span>お問い合わせ・ご相談</span></h3>
    <p class="uk-text-center">ウェブサイト制作に関するご相談やお見積もりはお気軽にどうぞ。</p>
    <!-- CTA -->
    <div class="uk-text-center uk-margin-large-top uk-animation-fade">
      <a href="<?php echo esc_url(home_url('/contact/')); ?>"
         class="uk-button uk-button-text"
         uk-scrollspy="cls: uk-animation-scale-up; delay: 500;">
         お問い合わせフォームへ
      </a>
    </div>
  </div>
</section>

<?php get_footer(); ?>
