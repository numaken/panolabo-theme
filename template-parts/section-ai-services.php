<?php
/**
 * File: section-ai-services.php
 * Purpose: AI技術で強化された3つのサービス（VR・アプリ・Web）を訴求するセクション
 */
?>
<section id="ai-services" class="uk-section ">
  <div class="uk-container">

    <!-- 見出し・リード -->
    <div class="uk-text-center uk-margin-large-bottom" uk-scrollspy="cls:uk-animation-slide-bottom-small; delay:200;">
      <div class="uk-heading-line uk-h2">
        <span>
          <img src="<?php bloginfo('template_directory'); ?>/images/logo_panolabo.png" alt="Panolabo LLC ロゴ" style="height:40px;">
          の3つのコアサービス
        </span>
      </div>
      <h2 class="uk-text-bold uk-margin-small-bottom ">
        <span class="uk-text-emphasis">実績ある制作技術</span> × <span class="">AI強化</span>
      </h2>
      <p class="uk-text-lead">
        <strong>VR・アプリ・Web制作</strong>の豊富な実績と経験を基盤に、<br>
        AI技術を統合することで「作って終わり」から<strong>「継続的価値創出」</strong>へ進化
      </p>
    </div>

    <!-- 1. AI-Powered VR/360° -->
    <div class="uk-grid-large uk-child-width-1-2@m uk-flex-middle uk-grid-match uk-padding" uk-grid uk-scrollspy="target: > div; cls:uk-animation-fade; delay:300;">
      <div>
        <div class="uk-cover-container uk-height-large uk-box-shadow-small uk-border-rounded uk-position-relative">
          <iframe
            src="https://s3-ap-northeast-1.amazonaws.com/static.panolabo.com/155/1087/74213012408102/index.html"
            width="100%" height="100%" frameborder="0" allowfullscreen
            style="border-radius: 12px;">
          </iframe>
          <div class="uk-position-top-right uk-margin-small">
            <span class="uk-label ">AI Powered</span>
          </div>
        </div>
      </div>
      <div>
        <h3 class=" uk-text-bold uk-margin-small-bottom">
          <span uk-icon="icon: world" class="uk-margin-small-right"></span>
          360°VR制作・撮影サービス
        </h3>
        <div class="uk-margin-bottom">
          <span class="uk-label  uk-margin-small-right">基本サービス</span>
          <span class="uk-label ">+ AI強化</span>
        </div>
        <p class="uk-margin-bottom">
          <strong>飲食店・美容室・不動産・医療</strong>など多業種での豊富な制作実績。<br>
          さらにAI技術を統合し、単なる空間表示から「売上に直結する体験設計」へ進化。
        </p>
        
        <div class="uk-margin-bottom">
          <h4 class="uk-text-bold uk-text-small uk-margin-small-bottom">✓ 基本制作サービス</h4>
          <ul class="uk-list uk-list-bullet uk-text-small">
            <li>360°パノラマ撮影・制作</li>
            <li>VRツアー構築</li>
            <li>ホットスポット設定</li>
            <li>マルチデバイス対応</li>
          </ul>
        </div>
        
        <div class="uk-margin-bottom">
          <h4 class="uk-text-bold uk-text-small uk-margin-small-bottom ">⚡ AI強化機能</h4>
          <ul class="uk-list uk-list-bullet uk-text-small">
            <li><strong>AI視線解析：</strong>ユーザーの注目ポイント自動検出</li>
            <li><strong>動的コンテンツ：</strong>訪問者属性に応じた表示最適化</li>
            <li><strong>成果予測：</strong>コンバージョン率向上のAI提案</li>
            <li><strong>自動レポート：</strong>ROI分析と改善案の定期配信</li>
          </ul>
        </div>
        
        <div class="uk-margin-top">
          <span class="uk-label ">継続収益モデル対応</span>
        </div>
      </div>
    </div>

    <!-- 2. AI-Native アプリ開発 -->
    <div class="uk-grid-large uk-child-width-1-2@m uk-flex-middle uk-grid-match uk-padding" uk-grid uk-scrollspy="target: > div; cls:uk-animation-slide-left-small; delay:300;">
      <div class="uk-flex-last@m">
        <div uk-slider="autoplay: true; autoplay-interval: 5000;" class="uk-position-relative">
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
                  <img src="<?php bloginfo('template_directory'); ?>/images/iphone.png" alt="AI App" style="width: 50%;">
                  <div class="uk-position-absolute" style="top: 2%; left: 27%; width: 46%; height: 96%; overflow: hidden; border-radius: 15px;">
                    <iframe src="<?php echo esc_url($url); ?>" width="100%" height="100%" frameborder="0" allowfullscreen></iframe>
                  </div>
                </div>
              </li>
            <?php endforeach; ?>
          </ul>
          <div class="uk-position-top-right uk-margin-small">
            <span class="uk-label ">AI Native</span>
          </div>
          <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
          <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
        </div>
      </div>
      <div class="uk-flex-first@m">
        <h3 class=" uk-text-bold uk-margin-small-bottom">
          <span uk-icon="icon: tablet" class="uk-margin-small-right"></span>
          スマートフォンアプリ開発
        </h3>
        <div class="uk-margin-bottom">
          <span class="uk-label  uk-margin-small-right">基本サービス</span>
          <span class="uk-label ">+ AI強化</span>
        </div>
        <p class="uk-margin-bottom">
          <strong>iOS・Android</strong>両対応のネイティブアプリ開発実績多数。<br>
          プッシュ通知・スタンプカード・予約機能等を標準装備し、AI技術でさらなる高度化を実現。
        </p>
        
        <div class="uk-margin-bottom">
          <h4 class="uk-text-bold uk-text-small uk-margin-small-bottom">✓ 基本開発サービス</h4>
          <ul class="uk-list uk-list-bullet uk-text-small">
            <li>iOS・Androidアプリ開発</li>
            <li>プッシュ通知システム</li>
            <li>スタンプカード・ポイント機能</li>
            <li>予約・クーポン機能</li>
            <li>管理画面・CMS構築</li>
          </ul>
        </div>
        
        <div class="uk-margin-bottom">
          <h4 class="uk-text-bold uk-text-small uk-margin-small-bottom ">⚡ AI強化機能</h4>
          <ul class="uk-list uk-list-bullet uk-text-small">
            <li><strong>予測プッシュ：</strong>AI分析による最適タイミング通知</li>
            <li><strong>動的UI：</strong>ユーザー行動学習による画面自動調整</li>
            <li><strong>チャーン予防：</strong>離脱リスク早期検出・自動対策</li>
            <li><strong>LTV最大化：</strong>個別最適化されたオファー配信</li>
          </ul>
        </div>
        
        <div class="uk-margin-top">
          <span class="uk-label ">継続収益モデル対応</span>
        </div>
      </div>
    </div>

    <!-- 3. AI-Driven Web開発 -->
    <div class="uk-grid-large uk-child-width-1-2@m uk-flex-middle uk-grid-match uk-padding" uk-grid uk-scrollspy="target: > div; cls:uk-animation-slide-right-small; delay:300;">
      <div class="uk-position-relative uk-text-center">
        <img src="<?php bloginfo('template_directory'); ?>/images/pc.png" alt="AI Web" style="width: 100%; height: auto;">
        <div class="uk-position-absolute" style="top: 6%; left: 21%; width: 70%; height: 85%; overflow: hidden;">
          <iframe
            src="https://www.torafukudou.com/"
            width="100%" height="100%" frameborder="0" allowfullscreen
            style="transform: scale(0.7); transform-origin: top left; border-radius: 15px;">
          </iframe>
        </div>
        <div class="uk-position-top-right uk-margin-small">
          <span class="uk-label ">AI Driven</span>
        </div>
      </div>
      <div>
        <h3 class=" uk-text-bold uk-margin-small-bottom">
          <span uk-icon="icon: desktop" class="uk-margin-small-right"></span>
          Webサイト制作・開発
        </h3>
        <div class="uk-margin-bottom">
          <span class="uk-label  uk-margin-small-right">基本サービス</span>
          <span class="uk-label ">+ AI強化</span>
        </div>
        <p class="uk-margin-bottom">
          <strong>WordPress・カスタム開発</strong>による高品質なWebサイト制作実績。<br>
          スマホファースト設計・SEO対策を標準装備し、AI技術で「成長し続けるWebサイト」へ進化。
        </p>
        
        <div class="uk-margin-bottom">
          <h4 class="uk-text-bold uk-text-small uk-margin-small-bottom">✓ 基本制作サービス</h4>
          <ul class="uk-list uk-list-bullet uk-text-small">
            <li>レスポンシブWebサイト制作</li>
            <li>WordPress構築・カスタマイズ</li>
            <li>EC・予約サイト開発</li>
            <li>SEO対策・高速化</li>
            <li>SSL・セキュリティ対策</li>
          </ul>
        </div>
        
        <div class="uk-margin-bottom">
          <h4 class="uk-text-bold uk-text-small uk-margin-small-bottom ">⚡ AI強化機能</h4>
          <ul class="uk-list uk-list-bullet uk-text-small">
            <li><strong>A/Bテスト自動化：</strong>AIによる継続的コンバージョン改善</li>
            <li><strong>コンテンツ最適化：</strong>SEO・ユーザビリティの自動調整</li>
            <li><strong>パフォーマンス監視：</strong>速度・離脱率の予測改善</li>
            <li><strong>競合分析：</strong>AI市場分析による戦略提案</li>
          </ul>
        </div>
        
        <div class="uk-margin-top">
          <span class="uk-label ">継続収益モデル対応</span>
        </div>
      </div>
    </div>

    <!-- CTA -->
    <div class="uk-text-center uk-margin-large-top uk-animation-fade">
      <h3 class="uk-text-bold uk-margin-bottom">実績あるサービス × AI技術で、さらなる成長を</h3>
      <p class="uk-text-lead uk-margin-bottom">
        まずは従来の制作サービスから、段階的にAI強化への移行も可能です
      </p>
      <div class="uk-button-group uk-flex-center uk-flex-wrap">
        <a href="<?php echo esc_url(home_url('/services')); ?>"
           class="uk-button uk-button-text"
           uk-scrollspy="cls: uk-animation-scale-up; delay: 500;">
           <span uk-icon="icon: thumbnails"></span> 制作サービス詳細
        </a>
        <a href="<?php echo esc_url(home_url('/contact')); ?>"
           class="uk-button uk-button-text"
           uk-scrollspy="cls: uk-animation-scale-up; delay: 700;">
           <span uk-icon="icon: bolt"></span> AI導入の相談
        </a>
      </div>
      <br>
      <a href="#partnership"
         class="uk-button uk-button-text">
         <span uk-icon="icon: users"></span> パートナーシップを検討
      </a>
    </div>

  </div>
</section>