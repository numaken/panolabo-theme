<?php
/**
 * Template Name: Team & Credentials
 * Description: 代表者・チーム詳細紹介ページ
 */
get_header(); ?>

<main class="uk-section ">
  
  <!-- Hero Section: 代表者紹介 -->
  <section class="uk-section uk-background-cover uk-background-center-center uk-background-norepeat" style="background-image: url('<?php bloginfo('template_directory'); ?>/images/hero-team.jpg');">
    <div class="uk-container">
      <div class="uk-text-center" uk-scrollspy="cls: uk-animation-fade; delay: 200;">
        <h1 class="uk-heading-primary uk-text-bold uk-margin-bottom">
          <span class="uk-text-emphasis">代表者・チーム紹介</span><br>
          <span class=" uk-text-large">確かな技術力と豊富な経験で信頼をお届け</span>
        </h1>
        <p class="uk-text-lead uk-margin-bottom">
          9年間で2,986件の制作実績を支える<strong>技術チーム</strong>と<br>
          <strong>代表者の経歴・実績</strong>をご紹介します
        </p>
        <div class="uk-grid-small uk-child-width-auto uk-flex-center uk-margin-top" uk-grid>
          <div><span class="uk-label  uk-text-bold">技術力重視</span></div>
          <div><span class="uk-label  uk-text-bold">豊富な経験</span></div>
          <div><span class="uk-label  uk-text-bold">継続改善</span></div>
        </div>
      </div>
    </div>
  </section>

  <!-- 代表者詳細プロフィール -->
  <section class="uk-section ">
    <div class="uk-container">
      <div class="uk-text-center uk-margin-large-bottom" uk-scrollspy="cls: uk-animation-fade; delay: 200;">
        <h2 class="uk-heading-medium uk-text-bold ">
          <span uk-icon="icon: user; ratio: 1.5" class="uk-margin-small-right"></span>
          代表者プロフィール
        </h2>
        <p class="uk-text-lead">
          技術力と事業戦略の両面から、お客様の成功をサポート
        </p>
      </div>

      <div class="uk-grid-large uk-child-width-1-2@l uk-flex-middle" uk-grid uk-scrollspy="target: > div; cls: uk-animation-slide-left-small; delay: 300;">
        
        <!-- 代表者写真・基本情報 -->
        <div>
          <div class="uk-card uk-card-default uk-card-body uk-text-center uk-box-shadow-large uk-border-rounded">
            <div class="uk-margin-bottom">
              <img src="<?php bloginfo('template_directory'); ?>/images/ceo-profile-large.jpg" 
                   alt="代表社員" 
                   class="uk-border-circle uk-box-shadow-medium" 
                   style="width: 200px; height: 200px; object-fit: cover;">
            </div>
            <h3 class="uk-text-bold uk-margin-small-bottom">代表社員</h3>
            <p class="uk-text-meta uk-margin-small-bottom">合同会社panolabo 代表社員</p>
            <div class="uk-margin-top">
              <div class="uk-grid-small uk-child-width-auto uk-flex-center" uk-grid>
                <div><span class="uk-label ">システムエンジニア</span></div>
                <div><span class="uk-label ">AI統合スペシャリスト</span></div>
              </div>
            </div>
          </div>
        </div>

        <!-- 詳細経歴・実績 -->
        <div>
          <div class="uk-card uk-card-default uk-card-body uk-box-shadow-medium uk-border-rounded">
            <h3 class="uk-text-bold  uk-margin-bottom">
              <span uk-icon="icon: history"></span> 経歴・実績サマリー
            </h3>
            
            <div class="uk-margin-bottom">
              <h4 class="uk-text-bold uk-text-small uk-margin-small-bottom">🚀 事業実績</h4>
              <ul class="uk-list uk-list-bullet uk-text-small">
                <li><strong>2015年</strong> 合同会社panolabo設立・代表社員就任</li>
                <li><strong>累計実績</strong> VR・アプリ・Web制作 2,986案件完了</li>
                <li><strong>継続率</strong> クライアント満足度95%、リピート率85%</li>
                <li><strong>技術革新</strong> AI統合による次世代ソリューション提供開始</li>
              </ul>
            </div>

            <div class="uk-margin-bottom">
              <h4 class="uk-text-bold uk-text-small uk-margin-small-bottom">💼 分野別専門実績</h4>
              <ul class="uk-list uk-list-bullet uk-text-small">
                <li><strong>VR/360°制作</strong> 1,666案件（飲食店・不動産・美容室等）</li>
                <li><strong>アプリ開発</strong> 537案件（iOS・Android両対応）</li>
                <li><strong>Web・HP制作</strong> 783案件（WordPress・カスタム開発）</li>
                <li><strong>AI統合</strong> 機械学習・データ分析による業務改善支援</li>
              </ul>
            </div>

            <div>
              <h4 class="uk-text-bold uk-text-small uk-margin-small-bottom">🎯 特筆すべき成果</h4>
              <div class="uk-grid-small uk-child-width-1-2@s uk-text-small" uk-grid>
                <div>
                  <span class="uk-label ">納期遵守率 99.8%</span>
                </div>
                <div>
                  <span class="uk-label ">セキュリティ事故 0件</span>
                </div>
                <div>
                  <span class="uk-label ">品質満足度 95%</span>
                </div>
                <div>
                  <span class="uk-label ">平均対応 24時間以内</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 技術スタック・専門領域 -->
  <section class="uk-section ">
    <div class="uk-container">
      <div class="uk-text-center uk-margin-large-bottom" uk-scrollspy="cls: uk-animation-fade; delay: 200;">
        <h2 class="uk-heading-medium uk-text-bold ">
          <span uk-icon="icon: code; ratio: 1.5" class="uk-margin-small-right"></span>
          技術スタック・専門領域
        </h2>
        <p class="uk-text-lead">
          2,986件の実績で培った、確かな技術力とノウハウ
        </p>
      </div>

      <div class="uk-grid-large uk-child-width-1-4@l uk-child-width-1-2@m" uk-grid uk-scrollspy="target: > div; cls: uk-animation-slide-bottom-small; delay: 300;">
        
        <!-- フロントエンド -->
        <div>
          <div class="uk-card uk-card-default uk-card-body uk-text-center uk-box-shadow-medium uk-border-rounded uk-height-1-1">
            <div class="uk-margin-bottom">
              <span uk-icon="icon: laptop; ratio: 3" class=""></span>
            </div>
            <h3 class="uk-text-bold uk-margin-bottom">フロントエンド</h3>
            <div class="uk-grid-small uk-child-width-auto uk-flex-center" uk-grid>
              <div><span class="uk-label ">HTML5</span></div>
              <div><span class="uk-label ">CSS3</span></div>
              <div><span class="uk-label ">JavaScript</span></div>
              <div><span class="uk-label ">TypeScript</span></div>
              <div><span class="uk-label ">React</span></div>
              <div><span class="uk-label ">Vue.js</span></div>
              <div><span class="uk-label ">UIKit</span></div>
            </div>
          </div>
        </div>

        <!-- バックエンド -->
        <div>
          <div class="uk-card uk-card-default uk-card-body uk-text-center uk-box-shadow-medium uk-border-rounded uk-height-1-1">
            <div class="uk-margin-bottom">
              <span uk-icon="icon: database; ratio: 3" class=""></span>
            </div>
            <h3 class="uk-text-bold uk-margin-bottom">バックエンド</h3>
            <div class="uk-grid-small uk-child-width-auto uk-flex-center" uk-grid>
              <div><span class="uk-label ">PHP</span></div>
              <div><span class="uk-label ">WordPress</span></div>
              <div><span class="uk-label ">Node.js</span></div>
              <div><span class="uk-label ">Python</span></div>
              <div><span class="uk-label ">MySQL</span></div>
              <div><span class="uk-label ">PostgreSQL</span></div>
              <div><span class="uk-label ">API設計</span></div>
            </div>
          </div>
        </div>

        <!-- モバイル・VR -->
        <div>
          <div class="uk-card uk-card-default uk-card-body uk-text-center uk-box-shadow-medium uk-border-rounded uk-height-1-1">
            <div class="uk-margin-bottom">
              <span uk-icon="icon: tablet; ratio: 3" class=""></span>
            </div>
            <h3 class="uk-text-bold uk-margin-bottom">モバイル・VR</h3>
            <div class="uk-grid-small uk-child-width-auto uk-flex-center" uk-grid>
              <div><span class="uk-label ">Swift</span></div>
              <div><span class="uk-label ">Kotlin</span></div>
              <div><span class="uk-label ">React Native</span></div>
              <div><span class="uk-label ">Unity</span></div>
              <div><span class="uk-label ">360°撮影</span></div>
              <div><span class="uk-label ">VR制作</span></div>
              <div><span class="uk-label ">A-Frame</span></div>
            </div>
          </div>
        </div>

        <!-- AI・最新技術 -->
        <div>
          <div class="uk-card uk-card-default uk-card-body uk-text-center uk-box-shadow-medium uk-border-rounded uk-height-1-1">
            <div class="uk-margin-bottom">
              <span uk-icon="icon: future; ratio: 3" class=""></span>
            </div>
            <h3 class="uk-text-bold uk-margin-bottom">AI・最新技術</h3>
            <div class="uk-grid-small uk-child-width-auto uk-flex-center" uk-grid>
              <div><span class="uk-label ">OpenAI API</span></div>
              <div><span class="uk-label ">TensorFlow</span></div>
              <div><span class="uk-label ">PyTorch</span></div>
              <div><span class="uk-label ">機械学習</span></div>
              <div><span class="uk-label ">自然言語処理</span></div>
              <div><span class="uk-label ">画像認識</span></div>
              <div><span class="uk-label ">データ分析</span></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 開発フィロソフィー・品質方針 -->
  <section class="uk-section ">
    <div class="uk-container">
      <div class="uk-text-center uk-margin-large-bottom" uk-scrollspy="cls: uk-animation-fade; delay: 200;">
        <h2 class="uk-heading-medium uk-text-bold ">
          <span uk-icon="icon: bolt; ratio: 1.5" class="uk-margin-small-right"></span>
          開発フィロソフィー・品質方針
        </h2>
        <p class="uk-text-lead">
          2,986件の実績で確立した、独自の開発・品質管理体制
        </p>
      </div>

      <div class="uk-grid-large uk-child-width-1-3@m" uk-grid uk-scrollspy="target: > div; cls: uk-animation-scale-up; delay: 300;">
        
        <div>
          <div class="uk-card  uk-card-body uk-text-center uk-border-rounded uk-height-1-1">
            <div class="uk-margin-bottom">
              <span uk-icon="icon: check; ratio: 3"></span>
            </div>
            <h3 class="uk-text-bold uk-margin-bottom">品質ファースト</h3>
            <p class="uk-text-small">
              <strong>99.8%の納期遵守率</strong>と<strong>95%の品質満足度</strong>。<br>
              徹底したコードレビュー、セキュリティ対策、<br>
              テスト工程で高品質を保証します。
            </p>
          </div>
        </div>

        <div>
          <div class="uk-card  uk-card-body uk-text-center uk-border-rounded uk-height-1-1">
            <div class="uk-margin-bottom">
              <span uk-icon="icon: users; ratio: 3"></span>
            </div>
            <h3 class="uk-text-bold uk-margin-bottom">パートナーシップ重視</h3>
            <p class="uk-text-small">
              <strong>85%のリピート率</strong>が証明する信頼関係。<br>
              「作って終わり」ではなく、<br>
              長期的な成功を共に築くパートナーとして。
            </p>
          </div>
        </div>

        <div>
          <div class="uk-card uk-card-default uk-card-body uk-text-center uk-border-rounded uk-height-1-1">
            <div class="uk-margin-bottom">
              <span uk-icon="icon: refresh; ratio: 3" class=""></span>
            </div>
            <h3 class="uk-text-bold uk-margin-bottom">継続改善・技術革新</h3>
            <p class="uk-text-small">
              AI技術の統合、最新フレームワークの活用で<br>
              <strong>従来のフロービジネスから</strong><br>
              <strong>ストックビジネスへの変革</strong>を支援。
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- チーム体制・サポート -->
  <section class="uk-section">
    <div class="uk-container">
      <div class="uk-text-center uk-margin-large-bottom" uk-scrollspy="cls: uk-animation-fade; delay: 200;">
        <h2 class="uk-heading-medium uk-text-bold">
          <span uk-icon="icon: cog; ratio: 1.5" class="uk-margin-small-right"></span>
          チーム体制・サポート体制
        </h2>
        <p class="uk-text-lead">
          お客様のプロジェクト成功を支える、専門チームとサポート体制
        </p>
      </div>

      <div class="uk-grid-large uk-child-width-1-2@m" uk-grid uk-scrollspy="target: > div; cls: uk-animation-slide-up-small; delay: 300;">
        
        <div>
          <div class="uk-text-center">
            <span uk-icon="icon: clock; ratio: 4" class=" uk-margin-bottom"></span>
            <h3 class="uk-text-bold uk-margin-bottom">24時間以内の初回対応</h3>
            <p>
              お問い合わせから<strong>24時間以内</strong>の初回対応を徹底。<br>
              迅速なコミュニケーションで、プロジェクトを円滑に進行します。
            </p>
          </div>
        </div>

        <div>
          <div class="uk-text-center">
            <span uk-icon="icon: shield; ratio: 4" class=" uk-margin-bottom"></span>
            <h3 class="uk-text-bold uk-margin-bottom">セキュリティ事故 0件</h3>
            <p>
              9年間で<strong>重大セキュリティ事故 0件</strong>の実績。<br>
              OWASP Top 10対策、多層防御でお客様のデータを守ります。
            </p>
          </div>
        </div>
      </div>

      <!-- 連絡先・相談窓口 -->
      <div class="uk-margin-large-top uk-text-center">
        <h3 class="uk-text-bold uk-margin-bottom">技術相談・プロジェクト相談</h3>
        <p class="uk-text-lead uk-margin-bottom">
          代表自らが技術相談からプロジェクト設計まで対応
        </p>
        
        <div class="uk-button-group uk-flex-center uk-margin-top">
          <a href="<?php echo esc_url(home_url('/contact')); ?>" 
             class="uk-button uk-button-primary uk-button-small">
            <span uk-icon="icon: mail"></span> 技術相談・お問い合わせ
          </a>
          <a href="<?php echo esc_url(home_url('/portfolio-achievements')); ?>" 
             class="uk-button uk-button-primary uk-button-small">
            <span uk-icon="icon: thumbnails"></span> 実績・ポートフォリオ
          </a>
        </div>

        <div class="uk-margin-top">
          <div class="uk-grid-small uk-child-width-auto uk-flex-center" uk-grid>
            <div><span class="uk-label ">初回相談無料</span></div>
            <div><span class="uk-label ">オンライン対応可</span></div>
            <div><span class="uk-label ">秘密保持契約対応</span></div>
            <div><span class="uk-label ">技術選定支援</span></div>
          </div>
        </div>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>