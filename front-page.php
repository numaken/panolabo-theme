<?php
/**
 * Template Name: Front Page
 * Description: トップページテンプレート
 */
get_header();
?>

<!-- =========================
     Hero
========================== -->
<section class="uk-section uk-section-muted uk-padding-large parallax"
  style="background-image: linear-gradient(rgba(49, 107, 63, 0.8), rgba(46, 134, 171, 0.8)), url('<?php echo get_template_directory_uri(); ?>/images/panolabo_paralax.jpg'); background-size: cover; background-position: center center; background-attachment: scroll;"
  data-bg-mobile="<?php echo get_template_directory_uri(); ?>/images/panolabo_paralax.jpg">
  <div class="uk-container">
    <div class="uk-grid-large" uk-grid>
      <div class="uk-width-2-3@m">
        <h1 class="uk-heading-medium uk-margin-remove">
          AI・VR・アプリ・Web・OEMまで全部1人で回す、<br class="uk-visible@s" />
          <span class="uk-text-bold">「1人総合制作代理店」</span> Panolabo
        </h1>
        <p class="uk-text-lead uk-margin-small">
          小規模でも、AIを活用すれば<br class="uk-visible@s" />
          <strong>会社規模のプロジェクトを動かせる。</strong>
        </p>
        <p class="uk-text-default">
          Web黎明期から30年。広告大手でNTTドコモ・LVMHなど100社超を担当した実務経験をベースに、<br class="uk-visible@s" />
          「作って終わり」をやめ、<strong>集客と収益を"仕組み化"</strong>します。
        </p>
        <div class="uk-margin">
          <a class="uk-button uk-button uk-button-text uk-button-large" href="<?php echo esc_url(home_url('/contact/')); ?>">
            まずは相談する
          </a>
          <a class="uk-button uk-button uk-button-text uk-button-large uk-margin-small-left" href="<?php echo esc_url(home_url('/oem/')); ?>">
            OEMパートナーを見る
          </a>
        </div>
      </div>
      <div class="uk-width-1-3@m uk-flex uk-flex-middle uk-flex-center">
        <div class="uk-card uk-card-default uk-card-body uk-text-center">
          <!-- ヒーロー画像：Panolaboブランドビジュアル -->
          <div class="plb-hero-thumb" style="aspect-ratio: 4 / 3; width:100%; background: linear-gradient(135deg, #316B3F, #2E86AB); display:flex; align-items:center; justify-content:center; padding: 30px; border-radius: 12px; box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
            <div style="text-align: center;">
              <img src="<?php echo esc_url( get_theme_file_uri('/images/logo/panolabo-logoWr.svg') ); ?>"
                   alt="Panolabo - AI×VR×アプリ×Web総合制作代理店" 
                   style="width: 180px; height: auto; margin-bottom: 15px; filter: drop-shadow(0 2px 4px rgba(0,0,0,0.2));" 
                   loading="eager" />
              <div style="color: white; font-size: 0.85rem; font-weight: 600; text-shadow: 0 1px 2px rgba(0,0,0,0.3);">
                <div style="background: rgba(255,255,255,0.15); padding: 8px 16px; border-radius: 20px; margin-bottom: 8px;">
                  🤖 AI・📱 VR・💻 Web・🔧 OEM
                </div>
                <p style="margin: 0; font-size: 0.9rem; opacity: 0.95;">1人総合制作代理店</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- =========================
     三本柱
========================== -->
<section class="uk-section uk-section-default parallax"
  style="background: linear-gradient(rgba(248, 249, 250, 0.95), rgba(255, 255, 255, 0.9)), url('<?php echo get_template_directory_uri(); ?>/images/bg/features-bg.jpg'); background-size: cover; background-position: center center; background-attachment: scroll;"
  data-bg-mobile="<?php echo get_template_directory_uri(); ?>/images/bg/features-bg.jpg">
  <div class="uk-container">
    <h2 class="uk-heading-line"><span>Panolabo の三本柱</span></h2>

    <div class="uk-grid-match uk-child-width-1-3@m uk-grid-small" uk-grid>
      <!-- 1) 受託開発 -->
      <div>
        <div class="uk-card uk-card-default uk-card-hover uk-card-body">
          <h3 class="uk-card-title">受託開発（VR・アプリ・Web）</h3>
          <p class="uk-margin-remove">360°VR／スマホアプリ／WordPressサイトを、設計〜運用まで一貫対応。</p>
          <ul class="uk-list uk-list-bullet uk-margin-small-top">
            <li><strong>WordPress×AI：</strong>加筆・自動記事投稿・SNS自動シェアをプラグインで実装</li>
            <li><strong>アプリ：</strong>WebView連動で更新を一元化、運用コストを最小化</li>
            <li><strong>VR：</strong>現状低稼働だが資産あり。AI連携で再展開余地</li>
          </ul>
          <a class="uk-button uk-button-text" href="<?php echo esc_url(home_url('/service/')); ?>">サービスを見る</a>
        </div>
      </div>

      <!-- 2) 自社開発 -->
      <div>
        <div class="uk-card uk-card-default uk-card-hover uk-card-body">
          <h3 class="uk-card-title">自社開発（SaaS・WPプラグイン）</h3>
          <p class="uk-margin-remove">AI活用で生産性を飛躍させ、プロダクトを継続リリース。</p>
          <ul class="uk-list uk-list-bullet uk-margin-small-top">
            <li><em>AiPostPilot Pro：</em> ゼロ設定でSNSを自動投稿</li>
            <li><em>Chat2Doc：</em> AI会話の自動ドキュメント化</li>
            <li><strong>WPプラグイン：</strong> 加筆支援・自動記事投稿・SNS連携 等</li>
          </ul>
          <a class="uk-button uk-button-text" href="<?php echo esc_url(home_url('/products/')); ?>">プロダクト一覧</a>
        </div>
      </div>

      <!-- 3) OEM供給 -->
      <div>
        <div class="uk-card uk-card-default uk-card-hover uk-card-body">
          <h3 class="uk-card-title">OEM供給・パートナーシップ</h3>
          <p class="uk-margin-remove">仕組みを<strong>自社ブランド</strong>として販売できる形で提供。営業に強い企業・個人と相性抜群。</p>
          <ul class="uk-list uk-list-bullet uk-margin-small-top">
            <li>タッグで役割分担が明確に。すぐ市場へ参入</li>
            <li>値付けは自由。Panolaboは<strong>パートナーフィー＋制作費のみ</strong></li>
            <li>利益を最大化しつつ、強い商材を即保有</li>
          </ul>
          <a class="uk-button uk-button-text" href="<?php echo esc_url(home_url('/oem/')); ?>">OEMの仕組みを見る</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- =========================
     自社SaaSプラットフォーム
========================== -->
<section class="uk-section uk-section-muted parallax"
  style="background: linear-gradient(rgba(46, 134, 171, 0.9), rgba(49, 107, 63, 0.9)); background-size: cover; background-position: center center; background-attachment: scroll;">
  <div class="uk-container">
    <h2 class="uk-heading-line"><span>自社SaaSプラットフォーム</span></h2>

    <div class="uk-grid-large uk-child-width-1-3@m" uk-grid>
      <div>
        <div class="uk-card uk-card-default uk-card-body">
          <h3 class="uk-card-title">AiPostPilot Pro</h3>
          <p>ゼロ設定でSNS自動投稿。コンテンツ生成〜配信〜ログまで一気通貫で自動化。</p>
          <ul class="uk-list uk-list-bullet">
            <li>日次・週次の自動配信スケジュール</li>
            <li>アカウント別の軽量KPI記録</li>
            <li>WPや外部APIからの連携も拡張可</li>
          </ul>
          <a class="uk-button uk-button uk-button-text" href="<?php echo esc_url(home_url('/products/')); ?>">詳細を見る</a>
        </div>
      </div>
      <div>
        <div class="uk-card uk-card-default uk-card-body">
          <h3 class="uk-card-title">Chat2Doc</h3>
          <p>AIとのやり取りを自動で構造化し、引き継ぎ可能なドキュメントに変換。</p>
          <ul class="uk-list uk-list-bullet">
            <li>会話→章立て → 版管理まで自動化</li>
            <li>議事・要件・仕様書の一次生成</li>
            <li>OEMで自社ブランド化も可能</li>
          </ul>
          <a class="uk-button uk-button uk-button-text" href="<?php echo esc_url(home_url('/products/')); ?>">詳細を見る</a>
        </div>
      </div>
      <div>
        <div class="uk-card uk-card-primary uk-card-body uk-light">
          <h3 class="uk-card-title"><span uk-icon="star"></span> App Vending</h3>
          <p>アプリストア向けアプリを効率的に量産・販売するプラットフォーム。テンプレート化で短期間リリースを実現。</p>
          <ul class="uk-list uk-list-bullet">
            <li>テンプレートベースの高速開発</li>
            <li>アプリストア最適化（ASO）</li>
            <li>収益化戦略サポート</li>
          </ul>
          <a class="uk-button uk-button uk-button-text" href="https://app-vending.panolabollc.com/" target="_blank">
            <span uk-icon="external-link"></span> サービスを見る
          </a>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- =========================
     WordPressプラグイン群
========================== -->
<section class="uk-section uk-section-default">
  <div class="uk-container">
    <h2 class="uk-heading-line"><span>WordPressプラグイン群</span></h2>
    <p class="uk-text-lead uk-text-center">"素人では続かないブログ運用"をAIで支える専用プラグイン</p>
    
    <div class="uk-grid-match uk-child-width-1-3@m uk-grid-small" uk-grid>
      <div>
        <div class="uk-card uk-card-default uk-card-hover uk-card-body">
          <span uk-icon="icon: pencil; ratio: 2" class="uk-text-warning"></span>
          <h3 class="uk-card-title">AI加筆支援</h3>
          <p>下書きの質を自動で底上げ。誤字脱字の修正から文章の改善まで、AIが執筆をサポートします。</p>
          <ul class="uk-list uk-list-bullet uk-text-small">
            <li>文章校正・誤字補正</li>
            <li>読みやすさ改善</li>
            <li>SEO最適化提案</li>
          </ul>
        </div>
      </div>
      <div>
        <div class="uk-card uk-card-default uk-card-hover uk-card-body">
          <span uk-icon="icon: clock; ratio: 2" class="uk-text-success"></span>
          <h3 class="uk-card-title">自動記事投稿</h3>
          <p>指定した頻度とカテゴリで記事を自動投稿。下書きから公開までのフローを完全自動化します。</p>
          <ul class="uk-list uk-list-bullet uk-text-small">
            <li>スケジュール投稿</li>
            <li>カテゴリ別管理</li>
            <li>下書き→公開フロー</li>
          </ul>
        </div>
      </div>
      <div>
        <div class="uk-card uk-card-default uk-card-hover uk-card-body">
          <span uk-icon="icon: social; ratio: 2" class="uk-text-primary"></span>
          <h3 class="uk-card-title">SNS自動シェア</h3>
          <p>記事公開と同時にSNSへ自動投稿。X（Twitter）、Threads、Instagramに対応しています。</p>
          <ul class="uk-list uk-list-bullet uk-text-small">
            <li>X（Twitter）連携</li>
            <li>Threads対応</li>
            <li>Instagram連携*</li>
          </ul>
          <small class="uk-text-muted">*API仕様により要審査・代替フローあり</small>
        </div>
      </div>
    </div>
    
    <div class="uk-text-center uk-margin-large-top">
      <a class="uk-button uk-button uk-button-text uk-button-large" href="<?php echo esc_url(home_url('/products/')); ?>">
        プラグイン詳細を見る
      </a>
    </div>
  </div>
</section>

<!-- =========================
     FAQ（構造化データ対応）
========================== -->
<section class="uk-section uk-section-default parallax"
  style="background: linear-gradient(rgba(255, 255, 255, 0.95), rgba(248, 249, 250, 0.9)); background-size: cover; background-position: center center; background-attachment: scroll;">
  <div class="uk-container">
    <h2 class="uk-heading-line"><span>よくある質問</span></h2>
    <ul uk-accordion>
      <li>
        <a class="uk-accordion-title" href="#">1人で全部回すって、本当に可能？</a>
        <div class="uk-accordion-content">
          <p>可能です。要件定義〜設計〜実装〜運用までの経験を一本化し、AIで反復作業を自動化することで成り立っています。規模に応じて外部協力も柔軟にハンドリングします。</p>
        </div>
      </li>
      <li>
        <a class="uk-accordion-title" href="#">OEMの収益モデルは？</a>
        <div class="uk-accordion-content">
          <p>値付けはパートナーの自由です。Panolaboはパートナーフィーと制作費のみ受領します。パートナー側で利益最大化が可能です。</p>
        </div>
      </li>
      <li>
        <a class="uk-accordion-title" href="#">既存サイトや運用を活かせる？</a>
        <div class="uk-accordion-content">
          <p>はい。WordPressや既存APIを接続し、AIによる加筆・自動投稿・SNS連携で"続けられる運用"に切り替えます。</p>
        </div>
      </li>
    </ul>
  </div>
</section>

<!-- =========================
     最終CTA
========================== -->
<section class="uk-section uk-light uk-padding-large"
  style="background: linear-gradient(135deg, #316B3F 0%, #2E86AB 100%); color: white;">
  <div class="uk-container uk-text-center">
    <h2 class="uk-heading-small uk-text-white">「作って終わり」をやめて、仕組みで成果を。</h2>
    <p class="uk-text-lead uk-text-white">小規模でも、AIを使えば会社規模を動かせる。その設計から一緒に。</p>
    <div class="uk-margin">
      <a class="uk-button uk-button uk-button-text uk-button-large uk-margin-small-right" href="<?php echo esc_url(home_url('/contact/')); ?>">
        相談する
      </a>
      <a class="uk-button uk-button uk-button-text uk-button-large" href="<?php echo esc_url(home_url('/oem/')); ?>">
        OEMを検討する
      </a>
    </div>
  </div>
</section>

<?php get_footer(); ?>