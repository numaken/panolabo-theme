<?php
/**
 * Template Name: App Vending
 * Description: App Vending サービス紹介ページ
 */
get_header();
?>

<!-- Hero Section -->
<section class="uk-section uk-section-muted uk-padding-large"
  style="background: linear-gradient(135deg, #316B3F 0%, #2E86AB 100%); color: white;">
  <div class="uk-container">
    <div class="uk-grid-large" uk-grid>
      <div class="uk-width-2-3@m">
        <span class="uk-label uk-label-success uk-margin-bottom">NEW SERVICE</span>
        <h1 class="uk-heading-medium uk-margin-remove uk-text-white">
          <span uk-icon="mobile" class="uk-margin-small-right"></span>
          App Vending Platform
        </h1>
        <p class="uk-text-lead uk-text-white uk-margin-small">
          アプリストア向けアプリを効率的に量産・販売するプラットフォーム
        </p>
        <p class="uk-text-default uk-text-white">
          テンプレート化されたアプリ開発フローで、短期間でのリリースを実現。<br>
          アプリストア最適化（ASO）から収益化戦略まで、トータルサポートします。
        </p>
        <div class="uk-margin">
          <a class="uk-button uk-button-secondary uk-button-large uk-margin-small-right" 
             href="https://app-vending.panolabollc.com/" target="_blank">
            <span uk-icon="external-link"></span> プラットフォームを見る
          </a>
          <a class="uk-button uk-button-default uk-button-large" href="<?php echo esc_url(home_url('/contact/')); ?>">
            相談する
          </a>
        </div>
      </div>
      <div class="uk-width-1-3@m uk-flex uk-flex-middle uk-flex-center">
        <div class="uk-text-center">
          <span uk-icon="icon: mobile; ratio: 8" class="uk-text-white"></span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- サービス概要 -->
<section class="uk-section uk-section-default">
  <div class="uk-container">
    <h2 class="uk-heading-line"><span>App Vendingとは</span></h2>
    
    <div class="uk-grid-match uk-child-width-1-3@m uk-grid-small" uk-grid>
      <div>
        <div class="uk-card uk-card-default uk-card-hover uk-card-body">
          <span uk-icon="icon: cog; ratio: 2" class="uk-text-primary"></span>
          <h3 class="uk-card-title">テンプレート開発</h3>
          <p>再利用可能なコンポーネントとフローで、開発時間を大幅短縮。同じ品質のアプリを効率的に量産できます。</p>
        </div>
      </div>
      <div>
        <div class="uk-card uk-card-default uk-card-hover uk-card-body">
          <span uk-icon="icon: search; ratio: 2" class="uk-text-primary"></span>
          <h3 class="uk-card-title">ASO最適化</h3>
          <p>App Store Optimization（ASO）により、アプリの発見性を向上。適切なキーワード戦略で検索上位を狙います。</p>
        </div>
      </div>
      <div>
        <div class="uk-card uk-card-default uk-card-hover uk-card-body">
          <span uk-icon="icon: cart; ratio: 2" class="uk-text-primary"></span>
          <h3 class="uk-card-title">収益化サポート</h3>
          <p>適切な収益モデルの設計から、広告配置、課金システムまで。収益最大化のための戦略をサポートします。</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 開発フロー -->
<section class="uk-section uk-section-muted">
  <div class="uk-container">
    <h2 class="uk-heading-line"><span>開発フロー</span></h2>
    
    <div class="uk-grid-medium uk-child-width-1-4@m uk-text-center" uk-grid>
      <div>
        <div class="uk-card uk-card-body">
          <div class="uk-margin-bottom">
            <span uk-icon="icon: file-edit; ratio: 3" class="uk-text-primary"></span>
          </div>
          <h4 class="uk-card-title">1. 企画・設計</h4>
          <p class="uk-text-small">市場調査とコンセプト設計。テンプレートから最適な構成を選択します。</p>
        </div>
      </div>
      <div>
        <div class="uk-card uk-card-body">
          <div class="uk-margin-bottom">
            <span uk-icon="icon: code; ratio: 3" class="uk-text-primary"></span>
          </div>
          <h4 class="uk-card-title">2. 高速開発</h4>
          <p class="uk-text-small">テンプレートベースで効率開発。品質を保ちながら短期間でのリリースを実現。</p>
        </div>
      </div>
      <div>
        <div class="uk-card uk-card-body">
          <div class="uk-margin-bottom">
            <span uk-icon="icon: upload; ratio: 3" class="uk-text-primary"></span>
          </div>
          <h4 class="uk-card-title">3. ストア申請</h4>
          <p class="uk-text-small">App Store・Google Play への申請代行。審査通過のノウハウを活用します。</p>
        </div>
      </div>
      <div>
        <div class="uk-card uk-card-body">
          <div class="uk-margin-bottom">
            <span uk-icon="icon: trending-up; ratio: 3" class="uk-text-primary"></span>
          </div>
          <h4 class="uk-card-title">4. 運用・収益化</h4>
          <p class="uk-text-small">ASO最適化と収益分析。継続的な改善でアプリの価値を向上させます。</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 対象となるアプリ -->
<section class="uk-section uk-section-default">
  <div class="uk-container">
    <h2 class="uk-heading-line"><span>対象アプリカテゴリ</span></h2>
    
    <div class="uk-grid-match uk-child-width-1-2@m uk-grid-small" uk-grid>
      <div>
        <div class="uk-card uk-card-primary uk-card-body uk-light">
          <h3 class="uk-card-title"><span uk-icon="heart"></span> ライフスタイル</h3>
          <ul class="uk-list uk-list-bullet">
            <li>健康管理・フィットネス</li>
            <li>料理・レシピ</li>
            <li>家計簿・支出管理</li>
            <li>習慣管理・目標達成</li>
          </ul>
        </div>
      </div>
      <div>
        <div class="uk-card uk-card-secondary uk-card-body uk-light">
          <h3 class="uk-card-title"><span uk-icon="pencil"></span> 生産性ツール</h3>
          <ul class="uk-list uk-list-bullet">
            <li>タスク管理・TODO</li>
            <li>メモ・ノート</li>
            <li>時間管理・ポモドーロ</li>
            <li>カレンダー・スケジュール</li>
          </ul>
        </div>
      </div>
      <div>
        <div class="uk-card uk-card-default uk-card-body">
          <h3 class="uk-card-title"><span uk-icon="users"></span> コミュニティ</h3>
          <ul class="uk-list uk-list-bullet">
            <li>趣味コミュニティ</li>
            <li>学習グループ</li>
            <li>地域情報共有</li>
            <li>専門分野ネットワーク</li>
          </ul>
        </div>
      </div>
      <div>
        <div class="uk-card uk-card-default uk-card-body">
          <h3 class="uk-card-title"><span uk-icon="database"></span> 情報管理</h3>
          <ul class="uk-list uk-list-bullet">
            <li>データ収集・分析</li>
            <li>在庫管理</li>
            <li>顧客管理（CRM）</li>
            <li>プロジェクト管理</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 価格・プラン -->
<section class="uk-section uk-section-muted">
  <div class="uk-container">
    <h2 class="uk-heading-line"><span>料金プラン</span></h2>
    
    <div class="uk-grid-match uk-child-width-1-3@m uk-grid-small" uk-grid>
      <div>
        <div class="uk-card uk-card-default uk-card-body uk-text-center">
          <h3 class="uk-card-title">ベーシック</h3>
          <div class="uk-margin">
            <div class="uk-text-large uk-text-bold">¥300,000〜</div>
            <div class="uk-text-small uk-text-muted">シンプルなアプリ</div>
          </div>
          <ul class="uk-list uk-text-small">
            <li>テンプレートベース開発</li>
            <li>基本的なASO対策</li>
            <li>ストア申請代行</li>
            <li>3ヶ月サポート</li>
          </ul>
          <a class="uk-button uk-button-primary uk-width-1-1" href="<?php echo esc_url(home_url('/contact/')); ?>">相談する</a>
        </div>
      </div>
      <div>
        <div class="uk-card uk-card-primary uk-card-body uk-text-center uk-light">
          <span class="uk-label uk-label-warning">おすすめ</span>
          <h3 class="uk-card-title">スタンダード</h3>
          <div class="uk-margin">
            <div class="uk-text-large uk-text-bold">¥500,000〜</div>
            <div class="uk-text-small">機能充実アプリ</div>
          </div>
          <ul class="uk-list uk-text-small">
            <li>カスタム機能追加</li>
            <li>高度なASO戦略</li>
            <li>収益化設計</li>
            <li>6ヶ月サポート</li>
          </ul>
          <a class="uk-button uk-button-secondary uk-width-1-1" href="<?php echo esc_url(home_url('/contact/')); ?>">相談する</a>
        </div>
      </div>
      <div>
        <div class="uk-card uk-card-default uk-card-body uk-text-center">
          <h3 class="uk-card-title">プレミアム</h3>
          <div class="uk-margin">
            <div class="uk-text-large uk-text-bold">¥800,000〜</div>
            <div class="uk-text-small uk-text-muted">フル機能アプリ</div>
          </div>
          <ul class="uk-list uk-text-small">
            <li>完全カスタム開発</li>
            <li>マーケティング支援</li>
            <li>継続的な改善</li>
            <li>12ヶ月フルサポート</li>
          </ul>
          <a class="uk-button uk-button-primary uk-width-1-1" href="<?php echo esc_url(home_url('/contact/')); ?>">相談する</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="uk-section uk-light uk-padding-large"
  style="background: linear-gradient(135deg, #2E86AB 0%, #06AFAA 100%); color: white;">
  <div class="uk-container uk-text-center">
    <h2 class="uk-heading-small uk-text-white">アプリビジネスを始めませんか？</h2>
    <p class="uk-text-lead uk-text-white">テンプレート化された開発フローで、効率的にアプリを量産。収益化までサポートします。</p>
    <div class="uk-margin">
      <a class="uk-button uk-button-secondary uk-button-large uk-margin-small-right" 
         href="https://app-vending.panolabollc.com/" target="_blank">
        <span uk-icon="external-link"></span> プラットフォームを見る
      </a>
      <a class="uk-button uk-button-default uk-button-large" href="<?php echo esc_url(home_url('/contact/')); ?>">
        無料相談を申し込む
      </a>
    </div>
  </div>
</section>

<?php get_footer(); ?>