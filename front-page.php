<?php
/**
 * Template Name: Front Page
 * Description: トップページテンプレート
 */
get_header();
?>

<!-- ヒーローセクション -->
<div class="uk-section uk-section-large uk-text-center uk-background-cover uk-background-center-center uk-background-norepeat uk-light" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/frontpage/panolabo-card.png');">
  <div class="uk-background-secondary uk-background-secondary" style="background: rgba(0, 0, 0, 0.5); padding: 80px 0;">
    
    <div class="uk-margin-medium-bottom" uk-scrollspy="cls: uk-animation-scale-up; delay: 200;">
      <span class="uk-label uk-label-warning uk-text-uppercase uk-text-bold">👨‍💼 One-Person Company</span>
    </div>

    <h1 class="uk-heading-large uk-text-bold uk-margin-medium-bottom" uk-scrollspy="cls: uk-animation-slide-bottom; delay: 400;">
      <span class="uk-text-warning">「VRショールーム作って」</span><br class="uk-visible@m">
      <span class="uk-text-warning">「アプリで集客したい」</span><br class="uk-visible@m">
      <strong>その日のうちに提案書</strong>が出る会社
    </h1>
    
    <p class="uk-text-large uk-margin-medium-bottom uk-width-3-4@m uk-margin-auto" uk-scrollspy="cls: uk-animation-fade; delay: 600;">
      営業も企画も開発も運用も、全部1人だから<strong>即断即決</strong>。<br class="uk-visible@m">
      「普通なら2ヶ月」が「2週間」で完成。<br class="uk-visible@m">
      <span class="uk-text-warning">30年の大手経験×AI活用</span>でスピードと品質を両立します。
    </p>
    
    <div class="uk-margin-large-top" uk-scrollspy="cls: uk-animation-slide-bottom; delay: 800;">
      <div class="uk-button-group uk-flex-center uk-flex-wrap">
        <a href="#business-pillars" class="uk-button uk-button-text">
          <span uk-icon="icon: bolt; ratio: 1.2"></span> 事業の三本柱を見る
        </a>
        <a href="#partnership" class="uk-button uk-button-text">
          <span uk-icon="icon: users; ratio: 1.2"></span> パートナーシップ相談
        </a>
      </div>
    </div>

  </div>
</div>

<!-- 1人経営の規模感セクション -->
<div class="uk-section uk-section-muted">
  <div class="uk-container">
    <div class="uk-text-center uk-margin-large-bottom">
      <h2 class="uk-heading-line uk-text-center"><span>🤯 この規模を1人で回してます</span></h2>
      <p class="uk-text-large uk-text-muted">普通の会社なら部署横断プロジェクトレベルの仕事を、1人完結で</p>
    </div>
    
    <div class="uk-grid-match uk-child-width-1-2@m uk-grid-medium" uk-grid>
      <!-- 一般的な会社の場合 -->
      <div>
        <div class="uk-card uk-card-default uk-card-body uk-text-center">
          <h3 class="uk-card-title uk-text-danger">🏢 一般的な会社の場合</h3>
          <div class="uk-margin-medium">
            <div class="uk-grid-small uk-child-width-1-1" uk-grid>
              <div><span class="uk-badge uk-badge-notification">営業部</span> 顧客開拓・契約</div>
              <div><span class="uk-badge uk-badge-notification">企画部</span> 要件定義・設計</div>
              <div><span class="uk-badge uk-badge-notification">開発部</span> AI/アプリ/サイト制作</div>
              <div><span class="uk-badge uk-badge-notification">運用部</span> 更新・保守・サポート</div>
              <div><span class="uk-badge uk-badge-notification">マーケ部</span> 集客施策・広告</div>
            </div>
          </div>
          <p class="uk-text-small uk-text-muted">部署間連携・会議・調整で<br>プロジェクト期間が長期化</p>
        </div>
      </div>
      
      <!-- Panolaboの場合 -->
      <div>
        <div class="uk-card uk-card-primary uk-card-body uk-text-center">
          <h3 class="uk-card-title">👨‍💼 Panolabo（1人）の場合</h3>
          <div class="uk-margin-medium">
            <div class="uk-grid-small uk-child-width-1-1" uk-grid>
              <div><span class="uk-badge uk-badge-success">🎯</span> 営業からクロージングまで</div>
              <div><span class="uk-badge uk-badge-success">📋</span> 戦略設計・要件定義</div>
              <div><span class="uk-badge uk-badge-success">💻</span> AI/VR/アプリ/Web制作</div>
              <div><span class="uk-badge uk-badge-success">🔧</span> 運用・保守・改善</div>
              <div><span class="uk-badge uk-badge-success">📈</span> マーケ・SEO・集客</div>
            </div>
          </div>
          <p class="uk-text-small"><strong>調整なし・即断即決</strong><br>圧倒的スピードで成果創出</p>
        </div>
      </div>
    </div>
    
    <!-- 技術スタック -->
    <div class="uk-text-center uk-margin-large-top">
      <h3 class="uk-text-bold uk-margin-bottom">🛠️ 1人で扱う技術スタック</h3>
      <div class="uk-grid-small uk-child-width-auto uk-flex-center uk-flex-wrap" uk-grid>
        <div><span class="uk-label uk-label-warning">AI開発</span></div>
        <div><span class="uk-label uk-label-warning">VR制作</span></div>
        <div><span class="uk-label uk-label-warning">iOS/Android</span></div>
        <div><span class="uk-label uk-label-warning">WordPress</span></div>
        <div><span class="uk-label uk-label-warning">SEO最適化</span></div>
        <div><span class="uk-label uk-label-warning">SaaS運営</span></div>
        <div><span class="uk-label uk-label-warning">OEM展開</span></div>
      </div>
    </div>
  </div>
</div>

<!-- 事業の三本柱セクション -->
<div id="business-pillars" class="uk-section uk-section-default">
  <div class="uk-container">
    <div class="uk-text-center uk-margin-large-bottom">
      <h2 class="uk-heading-line uk-text-center"><span>🏛️ 事業の三本柱</span></h2>
      <p class="uk-text-large uk-text-muted">1人で回す3つの収益エンジン</p>
    </div>
    
    <div class="uk-grid-match uk-child-width-1-3@m uk-grid-medium" uk-grid>
      <!-- 第1の柱：受託開発 -->
      <div>
        <div class="uk-card uk-card-default uk-card-hover uk-card-body uk-text-center">
          <div class="uk-card-badge uk-label">第1の柱</div>
          <span uk-icon="icon: cog; ratio: 3" class="uk-text-primary uk-margin-bottom"></span>
          <h3 class="uk-card-title uk-text-bold">受託開発</h3>
          <h4 class="uk-text-small uk-text-muted">VR・アプリ・Web</h4>
          <div class="uk-margin-small">
            <p class="uk-text-small">Panolaboの原点は「受託開発」。<br>360°VR、スマホアプリ、WordPressサイトの設計・構築・運用までを一貫して担います。</p>
          </div>
          <hr class="uk-divider-small">
          <p class="uk-text-bold uk-text-primary uk-margin-small">特徴</p>
          <ul class="uk-list uk-list-bullet uk-text-left uk-text-small">
            <li>WordPress: AI活用した独自プラグイン組み込み</li>
            <li>アプリ: WebView連動で運用コスト最小化</li>
            <li>VR: AI×VR連携で再展開視野</li>
          </ul>
          <p class="uk-text-small uk-text-emphasis">"作って終わり"ではなく、運用が続く構造を提供</p>
          <a href="<?php echo home_url('/services'); ?>" class="uk-button uk-button-text">詳細を見る</a>
        </div>
      </div>
      
      <!-- 第2の柱：自社開発 -->
      <div>
        <div class="uk-card uk-card-primary uk-card-hover uk-card-body uk-text-center">
          <div class="uk-card-badge uk-label uk-label-warning">第2の柱</div>
          <span uk-icon="icon: bolt; ratio: 3" class="uk-margin-bottom"></span>
          <h3 class="uk-card-title uk-text-bold">自社開発</h3>
          <h4 class="uk-text-small" style="opacity: 0.9;">SaaS・WPプラグイン</h4>
          <div class="uk-margin-small">
            <p class="uk-text-small">AI活用による生産性向上を武器に、自社プロダクトを次々に生み出すラボとしての顔も持ちます。</p>
          </div>
          <hr class="uk-divider-small" style="border-color: rgba(255,255,255,0.3);">
          <p class="uk-text-bold uk-margin-small">主力SaaS</p>
          <ul class="uk-list uk-text-left uk-text-small">
            <li>AiPostPilot Pro: ゼロ設定でSNSを自動投稿</li>
            <li>Chat2Doc: AIとの会話を自動でドキュメント化</li>
            <li>WordPressプラグイン: "続かないブログ"をAIで支援</li>
          </ul>
          <p class="uk-text-small uk-text-emphasis">小規模でもAIを駆使すれば、大規模開発に負けないスピードと品質でプロダクトを量産</p>
        </div>
      </div>
      
      <!-- 第3の柱：OEM供給 ★NEW -->
      <div>
        <div class="uk-card uk-card-secondary uk-card-hover uk-card-body uk-text-center" style="border: 3px solid var(--uk-card-secondary-color);">
          <div class="uk-card-badge uk-label uk-label-danger">★ 新たな柱</div>
          <span uk-icon="icon: users; ratio: 3" class="uk-margin-bottom"></span>
          <h3 class="uk-card-title uk-text-bold">OEM供給</h3>
          <h4 class="uk-text-small" style="opacity: 0.9;">パートナーシップ</h4>
          <div class="uk-margin-small">
            <p class="uk-text-small">営業力はあるが商材のない企業・個人にとって、Panolaboの仕組みは最適な武器。</p>
          </div>
          <hr class="uk-divider-small" style="border-color: rgba(255,255,255,0.3);">
          <p class="uk-text-bold uk-margin-small">メリット</p>
          <ul class="uk-list uk-text-left uk-text-small">
            <li>自社ブランドで販売可能・値付け自由</li>
            <li>すぐに市場参入・強い商材をすぐに保有</li>
            <li>協業や共同プロジェクトで事業拡張加速</li>
          </ul>
          <p class="uk-text-small uk-text-emphasis">パートナーは利益最大化、Panolaboはフィー+制作費のみ</p>
        </div>
      </div>
    </div>
    
    <!-- 補足説明 -->
    <div class="uk-text-center uk-margin-large-top">
      <div class="uk-card uk-card-default uk-card-body uk-width-3-4@m uk-margin-auto">
        <h3 class="uk-card-title uk-text-primary">📝 Panolaboの三本柱</h3>
        <p class="uk-text-lead uk-margin-small">
          <span class="uk-text-primary uk-text-bold">受託開発で課題解決し</span>、
          <span class="uk-text-warning uk-text-bold">自社開発で仕組みを磨き</span>、<br>
          <span class="uk-text-danger uk-text-bold">OEM供給でスケールさせる</span>。
        </p>
        <p class="uk-text-small uk-text-muted uk-margin-medium">
          そのすべてを<strong>AIを駆使しながら、1人で回す"総合制作代理店＋開発ラボ"</strong>です。<br>
          小規模だからこそ速く、大手経験があるからこそ確か。それがPanolaboのスタイルです。
        </p>
      </div>
    </div>
  </div>
</div>

<!-- サービス一覧セクション -->
<div class="uk-section uk-section-muted">
  <div class="uk-container">
    <div class="uk-text-center uk-margin-large-bottom">
      <h2 class="uk-heading-line uk-text-center"><span>総合サービス</span></h2>
      <p class="uk-text-large uk-text-muted">アプリ開発からWebサイト制作まで幅広くサポート</p>
    </div>
    
    <div class="uk-grid-match uk-child-width-1-3@m uk-grid-medium" uk-grid>
      <div>
        <div class="uk-card uk-card-default uk-card-hover uk-card-body uk-text-center">
          <span uk-icon="icon: tablet; ratio: 3" class="uk-text-primary"></span>
          <h3 class="uk-card-title">アプリ開発</h3>
          <p>モバイルアプリからWebアプリまで、最新技術でビジネス課題を解決します。</p>
          <a href="<?php echo home_url('/services'); ?>" class="uk-button uk-button-text">詳細を見る</a>
        </div>
      </div>
      <div>
        <div class="uk-card uk-card-default uk-card-hover uk-card-body uk-text-center">
          <span uk-icon="icon: world; ratio: 3" class="uk-text-primary"></span>
          <h3 class="uk-card-title">Web制作</h3>
          <p>レスポンシブデザインでSEO最適化されたWebサイトを制作します。</p>
          <a href="<?php echo home_url('/services'); ?>" class="uk-button uk-button-text">詳細を見る</a>
        </div>
      </div>
      <div>
        <div class="uk-card uk-card-default uk-card-hover uk-card-body uk-text-center">
          <span uk-icon="icon: camera; ratio: 3" class="uk-text-primary"></span>
          <h3 class="uk-card-title">VRパノラマ</h3>
          <p>360度パノラマ撮影とVR技術で新しい体験を提供します。</p>
          <a href="<?php echo home_url('/services'); ?>" class="uk-button uk-button-text">詳細を見る</a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- 1人でこの規模の実績セクション -->
<div class="uk-section uk-section-secondary uk-light">
  <div class="uk-container">
    <div class="uk-text-center uk-margin-large-bottom">
      <h2 class="uk-heading-line uk-text-center"><span>😱 1人でこの規模の実績を作ってます</span></h2>
      <p class="uk-text-large">冷静に考えて、めちゃくちゃ凄くない？笑</p>
    </div>
    
    <div class="uk-grid-match uk-child-width-1-3@m uk-grid-medium" uk-grid>
      <!-- 自社SaaS運営 -->
      <div>
        <div class="uk-card uk-card-default uk-card-body uk-text-center">
          <span uk-icon="icon: rocket; ratio: 3" class="uk-text-primary"></span>
          <h3 class="uk-card-title">🚀 自社SaaS 2サービス運営</h3>
          <div class="uk-margin-small">
            <p class="uk-text-bold uk-text-primary">AiPostPilot Pro / Chat2Doc</p>
            <p class="uk-text-small">企画・開発・運用・マーケ・サポート全て1人</p>
          </div>
          <p class="uk-text-small uk-text-muted">月間10,000+ユーザー、継続率85%+</p>
        </div>
      </div>
      
      <!-- 企業支援実績 -->
      <div>
        <div class="uk-card uk-card-default uk-card-body uk-text-center">
          <span uk-icon="icon: trending-up; ratio: 3" class="uk-text-success"></span>
          <h3 class="uk-card-title">📈 企業売上 20-40% 向上</h3>
          <div class="uk-margin-small">
            <p class="uk-text-bold uk-text-success">製造業・小売業で成果創出</p>
            <p class="uk-text-small">AI営業支援・SNS自動化・VRショールーム</p>
          </div>
          <p class="uk-text-small uk-text-muted">営業→設計→開発→運用まで1人完結</p>
        </div>
      </div>
      
      <!-- 技術範囲 -->
      <div>
        <div class="uk-card uk-card-default uk-card-body uk-text-center">
          <span uk-icon="icon: cog; ratio: 3" class="uk-text-warning"></span>
          <h3 class="uk-card-title">🛠️ 7つの技術領域をカバー</h3>
          <div class="uk-margin-small">
            <p class="uk-text-bold uk-text-warning">AI・VR・アプリ・Web・SEO・SaaS・OEM</p>
            <p class="uk-text-small">フルスタック＋ビジネス設計＋営業</p>
          </div>
          <p class="uk-text-small uk-text-muted">普通なら部署横断プロジェクトレベル</p>
        </div>
      </div>
    </div>
    
    <!-- 客観的評価 -->
    <div class="uk-text-center uk-margin-large-top">
      <div class="uk-card uk-card-primary uk-card-body uk-width-3-4@m uk-margin-auto">
        <h3 class="uk-card-title">💭 客観的に見ると...</h3>
        <blockquote class="uk-text-large uk-text-italic">
          「小さな総合制作代理店＋R&Dラボを1人で動かしてる」<br>
          「AIを武器にした、集客と仕組み化に特化したクリエイティブテック企業」<br>
          <strong>の中身が、実は1人経営・完全自走型</strong>
        </blockquote>
        <p class="uk-text-small uk-margin-top">
          普通の会社なら分業でしか回らない規模感のプロジェクトを、<br>
          プロジェクトマネジメント力＋現場実装力＋営業力＋マーケ力で回しているから成立してる。
        </p>
      </div>
    </div>
  </div>
</div>

<!-- パートナーシップセクション -->
<div id="partnership" class="uk-section uk-section-primary uk-light">
  <div class="uk-container">
    <div class="uk-text-center">
      <h2 class="uk-heading-line uk-text-center"><span>パートナーシップ</span></h2>
      <p class="uk-text-large uk-margin-large-bottom">一緒にビジネスを成長させませんか？</p>
      <a href="<?php echo home_url('/contact'); ?>" class="uk-button uk-button-text">
        お問い合わせ
      </a>
    </div>
  </div>
</div>

<?php get_footer(); ?>