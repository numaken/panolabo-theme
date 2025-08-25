
<?php
/**
 * Template Name: Services Overview
 * Description: 事業・サービス詳細紹介ページ
 */
get_header(); ?>

<main class="uk-section ">
  
  <!-- Hero Section: サービス概要 -->
  <section class="uk-section uk-section-large parallax" style="background: linear-gradient(rgba(49, 107, 63, 0.9), rgba(46, 134, 171, 0.9)), url('<?php bloginfo('template_directory'); ?>/images/hero-services.jpg'); background-size: cover; background-position: center center; background-attachment: scroll; color: white;">
    <div class="uk-container">
      <div class="uk-text-center" uk-scrollspy="cls: uk-animation-fade; delay: 200;">
        <h1 class="uk-heading-primary uk-text-bold uk-margin-bottom">
          <span class="uk-text-emphasis">Panolaboのサービス</span><br>
          <span class="uk-text-large">実績×AI技術で、ビジネスを次の次元へ</span>
        </h1>
        <p class="uk-text-lead uk-margin-bottom">
          <strong>VR・アプリ・Web制作</strong>の9年間の実績に、<br>
          AI技術を統合して「継続成長するビジネス」を実現
        </p>
        <div class="uk-grid-small uk-child-width-auto uk-flex-center uk-margin-top" uk-grid>
          <div><span class="uk-label uk-label-success uk-text-bold">基本制作</span></div>
          <div><span class="uk-label uk-label-warning uk-text-bold">+ AI強化</span></div>
          <div><span class="uk-label uk-label-primary uk-text-bold">= 継続収益</span></div>
        </div>
      </div>
    </div>
  </section>

  <!-- サービス目次ナビゲーション -->
  <section class="uk-section uk-section-muted">
    <div class="uk-container">
      <div class="uk-text-center uk-margin-large">
        <h2 class="uk-heading-small uk-text-bold uk-margin-bottom">サービス一覧</h2>
        <nav class="uk-flex uk-flex-center uk-flex-wrap uk-margin-top uk-grid-small" uk-grid>
          <div><a href="#vr-service" class="uk-button uk-button-default uk-border-rounded" uk-scroll>
            <span uk-icon="icon: world" class="uk-margin-small-right"></span>VR/360°制作
          </a></div>
          <div><a href="#app-service" class="uk-button uk-button-default uk-border-rounded" uk-scroll>
            <span uk-icon="icon: tablet" class="uk-margin-small-right"></span>アプリ開発
          </a></div>
          <div><a href="#web-service" class="uk-button uk-button-default uk-border-rounded" uk-scroll>
            <span uk-icon="icon: desktop" class="uk-margin-small-right"></span>Web制作
          </a></div>
          <div><a href="#saas-service" class="uk-button uk-button-primary uk-border-rounded" uk-scroll>
            <span uk-icon="icon: cloud" class="uk-margin-small-right"></span>SaaSサービス
          </a></div>
          <div><a href="#ai-service" class="uk-button uk-button-secondary uk-border-rounded" uk-scroll>
            <span uk-icon="icon: future" class="uk-margin-small-right"></span>AI統合
          </a></div>
          <div><a href="#plugin-service" class="uk-button uk-button-default uk-border-rounded" uk-scroll>
            <span uk-icon="icon: wordpress" class="uk-margin-small-right"></span>プラグイン
          </a></div>
        </nav>
      </div>
    </div>
  </section>

  <!-- 1. VR/360°制作サービス -->
  <section id="vr-service" class="uk-section uk-section-default">
    <div class="uk-container">
      <div class="uk-grid-large uk-child-width-1-2@m uk-flex-middle" uk-grid>
            <div>
              <h2 class="uk-heading-small uk-text-bold  uk-margin-bottom">
                <span uk-icon="icon: world" class="uk-margin-small-right"></span>
                VR/360°制作サービス
              </h2>
              
              <div class="uk-margin-bottom">
                <span class="uk-label  uk-margin-small-right">基本制作</span>
                <span class="uk-label ">+ AI分析</span>
                <span class="uk-label ">= ROI向上</span>
              </div>

              <p class="uk-text-lead uk-margin-bottom">
                豊富な実績を持つ360°撮影・制作技術に、AI視線解析・行動予測を統合。
                単なる空間表示から「売上に直結する体験設計」へ進化。
              </p>

              <div class="uk-margin-bottom">
                <h3 class="uk-text-bold uk-text-small uk-margin-small-bottom">✓ 基本制作サービス</h3>
                <div class="uk-grid-small uk-child-width-1-2@s" uk-grid>
                  <div>
                    <ul class="uk-list uk-list-bullet uk-text-small">
                      <li>360°パノラマ撮影</li>
                      <li>VRツアー構築</li>
                      <li>ホットスポット設定</li>
                      <li>マルチデバイス対応</li>
                    </ul>
                  </div>
                  <div>
                    <ul class="uk-list uk-list-bullet uk-text-small">
                      <li>埋め込みコード提供</li>
                      <li>SNS連携</li>
                      <li>アクセス解析</li>
                      <li>保守・更新対応</li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="uk-margin-bottom">
                <h3 class="uk-text-bold uk-text-small uk-margin-small-bottom ">⚡ AI強化機能</h3>
                <ul class="uk-list uk-list-bullet uk-text-small">
                  <li><strong>AI視線解析：</strong>ユーザーの注目ポイント自動検出・ヒートマップ生成</li>
                  <li><strong>動的コンテンツ：</strong>訪問者属性に応じた表示最適化</li>
                  <li><strong>成果予測：</strong>コンバージョン率向上のAI提案</li>
                  <li><strong>自動レポート：</strong>ROI分析と改善案の定期配信</li>
                </ul>
              </div>

              <div class="uk-margin-top">
                <h3 class="uk-text-bold uk-text-small uk-margin-small-bottom">適用業界・事例</h3>
                <div class="uk-grid-small uk-child-width-auto" uk-grid>
                  <div><span class="uk-label ">不動産</span></div>
                  <div><span class="uk-label ">飲食店</span></div>
                  <div><span class="uk-label ">美容室</span></div>
                  <div><span class="uk-label ">医療機関</span></div>
                  <div><span class="uk-label ">観光</span></div>
                  <div><span class="uk-label ">教育</span></div>
                </div>
              </div>
            </div>
            
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
              
              <div class="uk-margin-top uk-text-center">
                <p class="uk-text-small uk-text-muted">
                  <strong>実績例：</strong>飲食店内360°ツアー（AI視線解析でメニュー注目度を可視化）
                </p>
              </div>
            </div>
          </div>
        </div>
    </div>
  </section>

  <!-- 2. アプリ開発サービス -->
  <section id="app-service" class="uk-section ">
    <div class="uk-container">
      <div class="uk-grid-large uk-child-width-1-2@m uk-flex-middle" uk-grid>
            <div class="uk-flex-last@m">
              <div class="uk-position-relative uk-text-center">
                <div uk-slider="autoplay: true; autoplay-interval: 5000;">
                  <ul class="uk-slider-items uk-child-width-1-1">
                    <?php
                    $app_slides = [
                      'https://s3-ap-northeast-1.amazonaws.com/static.panolabo.com/74/818/34902180207102/index.html',
                      'https://www.trattoria-haru-italian.com/recommend-app/',
                      'https://www.trattoria-haru-italian.com/blog-app/',
                      'https://www.trattoria-haru-italian.com/about-app/'
                    ];
                    foreach ($app_slides as $url) : ?>
                      <li>
                        <div class="uk-position-relative uk-text-center">
                          <img src="<?php bloginfo('template_directory'); ?>/images/iphone.png" alt="AI App" style="width: 60%;">
                          <div class="uk-position-absolute" style="top: 2%; left: 25%; width: 50%; height: 96%; overflow: hidden; border-radius: 15px;">
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
                
                <div class="uk-margin-top uk-text-center">
                  <p class="uk-text-small uk-text-muted">
                    <strong>実績例：</strong>飲食店アプリ（AI予測プッシュ通知でリピート率35%向上）
                  </p>
                </div>
              </div>
            </div>
            
            <div class="uk-flex-first@m">
              <h2 class="uk-heading-small uk-text-bold  uk-margin-bottom">
                <span uk-icon="icon: tablet" class="uk-margin-small-right"></span>
                アプリ開発サービス
              </h2>
              
              <div class="uk-margin-bottom">
                <span class="uk-label  uk-margin-small-right">iOS・Android</span>
                <span class="uk-label ">+ AI予測</span>
                <span class="uk-label ">= LTV最大化</span>
              </div>

              <p class="uk-text-lead uk-margin-bottom">
                iOS・Android両対応のネイティブアプリ開発に、AI技術を統合。
                プッシュ通知・スタンプカード・予約システムが、ユーザー行動学習により自動最適化。
              </p>

              <div class="uk-margin-bottom">
                <h3 class="uk-text-bold uk-text-small uk-margin-small-bottom">✓ 基本開発サービス</h3>
                <div class="uk-grid-small uk-child-width-1-2@s" uk-grid>
                  <div>
                    <ul class="uk-list uk-list-bullet uk-text-small">
                      <li>iOS・Androidアプリ開発</li>
                      <li>プッシュ通知システム</li>
                      <li>スタンプカード・ポイント</li>
                      <li>予約・クーポン機能</li>
                    </ul>
                  </div>
                  <div>
                    <ul class="uk-list uk-list-bullet uk-text-small">
                      <li>管理画面・CMS構築</li>
                      <li>決済システム連携</li>
                      <li>SNS連携</li>
                      <li>アプリストア申請代行</li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="uk-margin-bottom">
                <h3 class="uk-text-bold uk-text-small uk-margin-small-bottom ">⚡ AI強化機能</h3>
                <ul class="uk-list uk-list-bullet uk-text-small">
                  <li><strong>予測プッシュ：</strong>AI分析による最適タイミング通知（開封率2倍改善）</li>
                  <li><strong>動的UI：</strong>ユーザー行動学習による画面自動調整</li>
                  <li><strong>チャーン予防：</strong>離脱リスク早期検出・自動対策メッセージ</li>
                  <li><strong>LTV最大化：</strong>個別最適化されたオファー・クーポン配信</li>
                </ul>
              </div>

              <div class="uk-margin-top">
                <h3 class="uk-text-bold uk-text-small uk-margin-small-bottom">導入効果実績</h3>
                <div class="uk-grid-small uk-child-width-1-3@s" uk-grid>
                  <div class="uk-text-center">
                    <div class="uk-text-bold uk-text-large ">+35%</div>
                    <div class="uk-text-small">リピート率改善</div>
                  </div>
                  <div class="uk-text-center">
                    <div class="uk-text-bold uk-text-large ">+200%</div>
                    <div class="uk-text-small">プッシュ開封率</div>
                  </div>
                  <div class="uk-text-center">
                    <div class="uk-text-bold uk-text-large ">+45%</div>
                    <div class="uk-text-small">顧客LTV向上</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </section>

  <!-- 3. Web制作サービス -->
  <section id="web-service" class="uk-section ">
    <div class="uk-container">
      <div class="uk-grid-large uk-child-width-1-2@m uk-flex-middle" uk-grid>
            <div>
              <h2 class="uk-heading-small uk-text-bold  uk-margin-bottom">
                <span uk-icon="icon: desktop" class="uk-margin-small-right"></span>
                Web制作・開発サービス
              </h2>
              
              <div class="uk-margin-bottom">
                <span class="uk-label  uk-margin-small-right">WordPress・カスタム</span>
                <span class="uk-label ">+ AI最適化</span>
                <span class="uk-label ">= 継続成長</span>
              </div>

              <p class="uk-text-lead uk-margin-bottom">
                WordPress・カスタム開発による高品質Webサイトに、AI技術を統合。
                スマホファースト・SEO対策を標準装備し、「成長し続けるWebサイト」を実現。
              </p>

              <div class="uk-margin-bottom">
                <h3 class="uk-text-bold uk-text-small uk-margin-small-bottom">✓ 基本制作サービス</h3>
                <div class="uk-grid-small uk-child-width-1-2@s" uk-grid>
                  <div>
                    <ul class="uk-list uk-list-bullet uk-text-small">
                      <li>レスポンシブWebサイト制作</li>
                      <li>WordPress構築・カスタマイズ</li>
                      <li>EC・予約サイト開発</li>
                      <li>カスタムシステム開発</li>
                    </ul>
                  </div>
                  <div>
                    <ul class="uk-list uk-list-bullet uk-text-small">
                      <li>SEO対策・高速化</li>
                      <li>SSL・セキュリティ対策</li>
                      <li>アクセス解析導入</li>
                      <li>保守・運用サポート</li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="uk-margin-bottom">
                <h3 class="uk-text-bold uk-text-small uk-margin-small-bottom ">⚡ AI強化機能</h3>
                <ul class="uk-list uk-list-bullet uk-text-small">
                  <li><strong>A/Bテスト自動化：</strong>AIによる継続的コンバージョン改善</li>
                  <li><strong>コンテンツ最適化：</strong>SEO・ユーザビリティの自動調整</li>
                  <li><strong>パフォーマンス監視：</strong>速度・離脱率の予測改善</li>
                  <li><strong>競合分析：</strong>AI市場分析による戦略提案</li>
                </ul>
              </div>

              <div class="uk-margin-top">
                <h3 class="uk-text-bold uk-text-small uk-margin-small-bottom">技術スタック</h3>
                <div class="uk-grid-small uk-child-width-auto" uk-grid>
                  <div><span class="uk-label ">WordPress</span></div>
                  <div><span class="uk-label ">PHP</span></div>
                  <div><span class="uk-label ">JavaScript</span></div>
                  <div><span class="uk-label ">React</span></div>
                  <div><span class="uk-label ">Node.js</span></div>
                  <div><span class="uk-label ">Python</span></div>
                  <div><span class="uk-label ">AI API</span></div>
                </div>
              </div>
            </div>
            
            <div>
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
              
              <div class="uk-margin-top uk-text-center">
                <p class="uk-text-small uk-text-muted">
                  <strong>実績例：</strong>飲食店Webサイト（AI A/Bテストで予約率40%向上）
                </p>
              </div>
            </div>
          </div>
        </div>
    </div>
  </section>

  <!-- 4. SaaSサービス -->
  <section id="saas-service" class="uk-section uk-section-primary uk-light">
    <div class="uk-container">
      <div class="uk-text-center uk-margin-large-bottom">
        <h2 class="uk-heading-medium uk-text-bold uk-text-white">
          <span uk-icon="icon: cloud; ratio: 2" class="uk-margin-small-right"></span>
          自社SaaSプラットフォーム
        </h2>
        <p class="uk-text-lead uk-text-white">
          受託開発で培った知見を活かし、継続的な価値提供を実現するSaaSサービス群
        </p>
      </div>

      <div class="uk-grid-large uk-child-width-1-3@m" uk-grid>
        
        <!-- AiPostPilot Pro -->
        <div>
          <div class="uk-card uk-card-default uk-card-body uk-box-shadow-medium uk-border-rounded uk-height-1-1">
            <div class="uk-text-center uk-margin-bottom">
              <span uk-icon="icon: social; ratio: 2" class="uk-text-primary"></span>
            </div>
            <h3 class="uk-text-bold uk-text-center uk-margin-bottom">AiPostPilot Pro</h3>
            <p class="uk-text-center uk-text-small uk-text-muted uk-margin-bottom">ゼロ設定でSNS自動投稿</p>
            
            <ul class="uk-list uk-list-bullet uk-text-small uk-margin-bottom">
              <li>日次・週次の自動配信スケジュール</li>
              <li>アカウント別の軽量KPI記録</li>
              <li>WPや外部APIからの連携も拡張可</li>
              <li>コンテンツ生成〜配信〜ログまで一気通貫</li>
            </ul>
            
            <div class="uk-text-center uk-margin-top">
              <div class="uk-margin-small-bottom">
                <span class="uk-label uk-label-success">月額¥2,980〜</span>
              </div>
              <a href="<?php echo esc_url(home_url('/products/')); ?>" class="uk-button uk-button-primary uk-width-1-1">
                詳細を見る
              </a>
            </div>
          </div>
        </div>

        <!-- Chat2Doc -->
        <div>
          <div class="uk-card uk-card-default uk-card-body uk-box-shadow-medium uk-border-rounded uk-height-1-1">
            <div class="uk-text-center uk-margin-bottom">
              <span uk-icon="icon: file-text; ratio: 2" class="uk-text-secondary"></span>
            </div>
            <h3 class="uk-text-bold uk-text-center uk-margin-bottom">Chat2Doc</h3>
            <p class="uk-text-center uk-text-small uk-text-muted uk-margin-bottom">AI会話の自動ドキュメント化</p>
            
            <ul class="uk-list uk-list-bullet uk-text-small uk-margin-bottom">
              <li>会話→章立て → 版管理まで自動化</li>
              <li>議事・要件・仕様書の一次生成</li>
              <li>OEMで自社ブランド化も可能</li>
              <li>チーム共有・履歴管理機能</li>
            </ul>
            
            <div class="uk-text-center uk-margin-top">
              <div class="uk-margin-small-bottom">
                <span class="uk-label uk-label-warning">月額¥1,980〜</span>
              </div>
              <a href="<?php echo esc_url(home_url('/products/')); ?>" class="uk-button uk-button-secondary uk-width-1-1">
                詳細を見る
              </a>
            </div>
          </div>
        </div>

        <!-- App Vending -->
        <div>
          <div class="uk-card uk-card-default uk-card-body uk-box-shadow-medium uk-border-rounded uk-height-1-1">
            <div class="uk-text-center uk-margin-bottom">
              <span uk-icon="icon: mobile; ratio: 2" class="uk-text-success"></span>
              <span class="uk-label uk-label-danger uk-margin-left">NEW</span>
            </div>
            <h3 class="uk-text-bold uk-text-center uk-margin-bottom">App Vending</h3>
            <p class="uk-text-center uk-text-small uk-text-muted uk-margin-bottom">アプリ効率量産プラットフォーム</p>
            
            <ul class="uk-list uk-list-bullet uk-text-small uk-margin-bottom">
              <li>テンプレートベースの高速開発</li>
              <li>アプリストア最適化（ASO）</li>
              <li>収益化戦略サポート</li>
              <li>申請代行・運用サポート</li>
            </ul>
            
            <div class="uk-text-center uk-margin-top">
              <div class="uk-margin-small-bottom">
                <span class="uk-label uk-label-primary">¥300k〜/案件</span>
              </div>
              <a href="https://app-vending.panolabollc.com/" target="_blank" class="uk-button uk-button-success uk-width-1-1">
                <span uk-icon="external-link" class="uk-margin-small-right"></span>サービスを見る
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- SaaS戦略 -->
      <div class="uk-margin-large-top">
        <div class="uk-text-center uk-margin-bottom">
          <h3 class="uk-text-bold uk-text-white uk-margin-bottom">SaaS事業戦略</h3>
        </div>
        
        <div class="uk-grid-match uk-child-width-1-2@m" uk-grid>
          <div>
            <div class="uk-card uk-card-default uk-card-body uk-text-center">
              <h4 class="uk-text-bold uk-margin-bottom">
                <span uk-icon="refresh" class="uk-margin-small-right"></span>継続収益モデル
              </h4>
              <p class="uk-text-small">一度の開発投資で継続的な収益を実現。月額課金モデルで安定したキャッシュフローを構築します。</p>
            </div>
          </div>
          <div>
            <div class="uk-card uk-card-default uk-card-body uk-text-center">
              <h4 class="uk-text-bold uk-margin-bottom">
                <span uk-icon="users" class="uk-margin-small-right"></span>スケーラブル展開
              </h4>
              <p class="uk-text-small">受託開発の知見を標準化し、より多くの顧客に価値提供。個別対応からプラットフォーム型へ進化。</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 5. AI統合ソリューション -->
  <section id="ai-service" class="uk-section ">
    <div class="uk-container">
      <div class="uk-text-center uk-margin-large-bottom">
            <h2 class="uk-heading-medium uk-text-bold ">
              <span uk-icon="icon: future; ratio: 2" class="uk-margin-small-right"></span>
              AI統合ソリューション
            </h2>
            <p class="uk-text-lead">
              既存の制作サービスにAI技術を統合し、データドリブンなビジネス変革を支援
            </p>
          </div>

          <div class="uk-grid-large uk-child-width-1-3@m" uk-grid>
            
            <!-- データ分析・予測 -->
            <div>
              <div class="uk-card uk-card-default uk-card-body uk-box-shadow-medium uk-border-rounded uk-height-1-1">
                <div class="uk-text-center uk-margin-bottom">
                  <span uk-icon="icon: database; ratio: 2" class=""></span>
                </div>
                <h3 class="uk-text-bold uk-text-center uk-margin-bottom">データ分析・予測</h3>
                <ul class="uk-list uk-list-bullet uk-text-small">
                  <li>ユーザー行動分析・予測</li>
                  <li>売上・需要予測モデル</li>
                  <li>チャーン（離脱）予測</li>
                  <li>LTV（顧客生涯価値）分析</li>
                  <li>市場トレンド分析</li>
                </ul>
              </div>
            </div>

            <!-- 自動化・最適化 -->
            <div>
              <div class="uk-card uk-card-default uk-card-body uk-box-shadow-medium uk-border-rounded uk-height-1-1">
                <div class="uk-text-center uk-margin-bottom">
                  <span uk-icon="icon: cog; ratio: 2" class=""></span>
                </div>
                <h3 class="uk-text-bold uk-text-center uk-margin-bottom">自動化・最適化</h3>
                <ul class="uk-list uk-list-bullet uk-text-small">
                  <li>A/Bテスト自動実行・最適化</li>
                  <li>コンテンツ・価格動的調整</li>
                  <li>プッシュ通知タイミング最適化</li>
                  <li>在庫・リソース管理自動化</li>
                  <li>レポート自動生成・配信</li>
                </ul>
              </div>
            </div>

            <!-- パーソナライゼーション -->
            <div>
              <div class="uk-card uk-card-default uk-card-body uk-box-shadow-medium uk-border-rounded uk-height-1-1">
                <div class="uk-text-center uk-margin-bottom">
                  <span uk-icon="icon: users; ratio: 2" class=""></span>
                </div>
                <h3 class="uk-text-bold uk-text-center uk-margin-bottom">パーソナライゼーション</h3>
                <ul class="uk-list uk-list-bullet uk-text-small">
                  <li>個別レコメンド機能</li>
                  <li>パーソナライズド広告配信</li>
                  <li>動的価格設定</li>
                  <li>カスタマイズUIデザイン</li>
                  <li>個別メッセージング</li>
                </ul>
              </div>
            </div>
          </div>

          <div class="uk-text-center uk-margin-large-top">
            <h3 class="uk-text-bold uk-margin-bottom">AI統合による効果実績</h3>
            <div class="uk-grid-large uk-child-width-1-4@m" uk-grid>
              <div class="uk-text-center">
                <div class="uk-text-bold uk-heading-small ">+150%</div>
                <div class="uk-text-small">コンバージョン率改善</div>
              </div>
              <div class="uk-text-center">
                <div class="uk-text-bold uk-heading-small ">+80%</div>
                <div class="uk-text-small">運用効率化</div>
              </div>
              <div class="uk-text-center">
                <div class="uk-text-bold uk-heading-small ">+200%</div>
                <div class="uk-text-small">リピート率向上</div>
              </div>
              <div class="uk-text-center">
                <div class="uk-text-bold uk-heading-small ">+60%</div>
                <div class="uk-text-small">ROI改善</div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </section>

  <!-- 5. WordPressプラグイン -->
  <section id="plugin-service" class="uk-section ">
    <div class="uk-container">
      <div class="uk-text-center uk-margin-large-bottom">
            <h2 class="uk-heading-medium uk-text-bold ">
              <span uk-icon="icon: wordpress; ratio: 2" class="uk-margin-small-right"></span>
              WordPressプラグイン開発・販売
            </h2>
            <p class="uk-text-lead">
              受注管理・分析ダッシュボード・自動投稿など、ビジネス効率化プラグインを開発・販売
            </p>
          </div>

          <div class="uk-grid-large uk-child-width-1-2@m" uk-grid>
            
            <!-- プラグイン一覧 -->
            <div>
              <h3 class="uk-text-bold uk-margin-bottom">開発プラグイン一覧</h3>
              
              <div class="uk-margin-bottom">
                <div class="uk-card uk-card-primary uk-card-body uk-card-small">
                  <h4 class="uk-text-bold uk-margin-small-bottom">
                    <span uk-icon="icon: future" class="uk-margin-small-right"></span>
                    🚀 Panolabo AI Boost <span class="uk-label uk-label-warning">NEW</span>
                  </h4>
                  <p class="uk-text-small uk-margin-small-bottom">
                    <strong>営業支援プラグイン</strong> - AI導入効果を「提案型事例」で視覚化
                  </p>
                  <div class="uk-grid-small uk-child-width-auto uk-flex-wrap uk-margin-small-bottom" uk-grid>
                    <div><span class="uk-label uk-label-success uk-text-small">6業種対応</span></div>
                    <div><span class="uk-label uk-label-success uk-text-small">ショートコード</span></div>
                    <div><span class="uk-label uk-label-success uk-text-small">成約率UP</span></div>
                  </div>
                  <div class="uk-text-center">
                    <a href="<?php echo esc_url(home_url('/panolabo-ai-boost/')); ?>" class="uk-button uk-button-secondary uk-button-small">
                      <span uk-icon="play" class="uk-margin-small-right"></span>実演デモを見る
                    </a>
                  </div>
                </div>
              </div>

              <div class="uk-margin-bottom">
                <div class="uk-card uk-card-default uk-card-body uk-card-small">
                  <h4 class="uk-text-bold uk-margin-small-bottom">
                    <span uk-icon="icon: cart" class="uk-margin-small-right"></span>
                    Panolabo Order
                  </h4>
                  <p class="uk-text-small uk-margin-small-bottom">受注・発注・請求管理プラグイン</p>
                  <div class="uk-grid-small uk-child-width-auto" uk-grid>
                    <div><span class="uk-label  uk-text-small">受注管理</span></div>
                    <div><span class="uk-label  uk-text-small">請求書生成</span></div>
                    <div><span class="uk-label  uk-text-small">UI Kit対応</span></div>
                  </div>
                </div>
              </div>

              <div class="uk-margin-bottom">
                <div class="uk-card uk-card-default uk-card-body uk-card-small">
                  <h4 class="uk-text-bold uk-margin-small-bottom">
                    <span uk-icon="icon: database" class="uk-margin-small-right"></span>
                    App Analytics Dashboard
                  </h4>
                  <p class="uk-text-small uk-margin-small-bottom">App Store・Google Play分析ダッシュボード</p>
                  <div class="uk-grid-small uk-child-width-auto" uk-grid>
                    <div><span class="uk-label  uk-text-small">iOS分析</span></div>
                    <div><span class="uk-label  uk-text-small">Android分析</span></div>
                    <div><span class="uk-label  uk-text-small">Chart.js</span></div>
                  </div>
                </div>
              </div>

              <div class="uk-margin-bottom">
                <div class="uk-card uk-card-default uk-card-body uk-card-small">
                  <h4 class="uk-text-bold uk-margin-small-bottom">
                    <span uk-icon="icon: social" class="uk-margin-small-right"></span>
                    AI SNS Autoposter
                  </h4>
                  <p class="uk-text-small uk-margin-small-bottom">AI自動SNS投稿・スケジュール管理</p>
                  <div class="uk-grid-small uk-child-width-auto" uk-grid>
                    <div><span class="uk-label  uk-text-small">AI生成</span></div>
                    <div><span class="uk-label  uk-text-small">自動投稿</span></div>
                    <div><span class="uk-label  uk-text-small">多SNS対応</span></div>
                  </div>
                </div>
              </div>
            </div>

            <!-- 販売・ライセンス戦略 -->
            <div>
              <h3 class="uk-text-bold uk-margin-bottom">販売・ライセンス戦略</h3>
              
              <div class="uk-margin-bottom">
                <h4 class="uk-text-bold uk-text-small uk-margin-small-bottom">販売チャネル</h4>
                <ul class="uk-list uk-list-bullet uk-text-small">
                  <li><strong>自社サイト販売：</strong>Stripe連携による直接販売</li>
                  <li><strong>WordPressリポジトリ：</strong>無料版・有料版展開</li>
                  <li><strong>パートナー販売：</strong>代理店・リセラー展開</li>
                  <li><strong>企業向けライセンス：</strong>カスタマイズ・サポート付き</li>
                </ul>
              </div>

              <div class="uk-margin-bottom">
                <h4 class="uk-text-bold uk-text-small uk-margin-small-bottom">ライセンス管理</h4>
                <ul class="uk-list uk-list-bullet uk-text-small">
                  <li>自動ライセンス認証システム</li>
                  <li>利用状況監視・制限機能</li>
                  <li>アップデート配信管理</li>
                  <li>サポート・保守契約管理</li>
                </ul>
              </div>

              <div class="uk-margin-bottom">
                <h4 class="uk-text-bold uk-text-small uk-margin-small-bottom">収益モデル</h4>
                <div class="uk-grid-small uk-child-width-1-2@s" uk-grid>
                  <div>
                    <div class="uk-card  uk-card-body uk-card-small uk-text-center">
                      <div class="uk-text-bold">単発販売</div>
                      <div class="uk-text-small">¥5,000-50,000</div>
                    </div>
                  </div>
                  <div>
                    <div class="uk-card  uk-card-body uk-card-small uk-text-center">
                      <div class="uk-text-bold">サブスクリプション</div>
                      <div class="uk-text-small">¥500-5,000/月</div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="uk-margin-top">
                <div class="uk-text-center">
                  <a href="#" class="uk-button uk-button-text">
                    <span uk-icon="icon: cart"></span> プラグイン一覧を見る
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </section>


  <!-- パートナーシップ・料金モデル -->
  <section class="uk-section ">
    <div class="uk-container">
      <div class="uk-text-center uk-margin-large-bottom">
        <h2 class="uk-heading-medium uk-text-bold ">
          <span uk-icon="icon: users; ratio: 2" class="uk-margin-small-right"></span>
          パートナーシップ・料金モデル
        </h2>
        <p class="uk-text-lead">
          制作完了で終わりではなく、継続的な成長をサポートする3つのモデル
        </p>
      </div>

      <div class="uk-grid-large uk-child-width-1-3@m" uk-grid>
        
        <!-- 従来制作モデル -->
        <div>
          <div class="uk-card uk-card-default uk-card-body uk-box-shadow-medium uk-border-rounded uk-height-1-1">
            <div class="uk-text-center uk-margin-bottom">
              <span uk-icon="icon: cog; ratio: 2" class="uk-text-muted"></span>
            </div>
            <h3 class="uk-text-bold uk-text-center uk-margin-bottom">従来制作モデル</h3>
            <div class="uk-text-center uk-margin-bottom">
              <div class="uk-text-bold uk-text-large">¥300,000-</div>
              <div class="uk-text-small uk-text-muted">一括制作費</div>
            </div>
            <ul class="uk-list uk-list-bullet uk-text-small">
              <li>VR・アプリ・Web制作</li>
              <li>基本機能実装</li>
              <li>3ヶ月保証・サポート</li>
              <li>納品・完了</li>
            </ul>
            <div class="uk-text-center uk-margin-top">
              <span class="uk-label ">短期完了型</span>
            </div>
          </div>
        </div>

        <!-- AI統合モデル -->
        <div>
          <div class="uk-card  uk-card-body uk-box-shadow-medium uk-border-rounded uk-height-1-1">
            <div class="uk-text-center uk-margin-bottom">
              <span uk-icon="icon: future; ratio: 2" class=""></span>
            </div>
            <h3 class="uk-text-bold uk-text-center uk-margin-bottom">AI統合モデル</h3>
            <div class="uk-text-center uk-margin-bottom">
              <div class="uk-text-bold uk-text-large">¥500,000- + ¥50,000/月</div>
              <div class="uk-text-small uk-text-muted">初期 + 継続改善</div>
            </div>
            <ul class="uk-list uk-list-bullet uk-text-small">
              <li>基本制作 + AI機能統合</li>
              <li>データ分析・改善提案</li>
              <li>継続的最適化</li>
              <li>月次レポート・相談</li>
            </ul>
            <div class="uk-text-center uk-margin-top">
              <span class="uk-label ">継続改善型</span>
            </div>
          </div>
        </div>

        <!-- パートナーシップモデル -->
        <div>
          <div class="uk-card  uk-card-body uk-box-shadow-medium uk-border-rounded uk-height-1-1">
            <div class="uk-text-center uk-margin-bottom">
              <span uk-icon="icon: heart; ratio: 2" class=""></span>
            </div>
            <h3 class="uk-text-bold uk-text-center uk-margin-bottom">パートナーシップモデル</h3>
            <div class="uk-text-center uk-margin-bottom">
              <div class="uk-text-bold uk-text-large">売上連動型</div>
              <div class="uk-text-small uk-text-muted">成功報酬・収益分配</div>
            </div>
            <ul class="uk-list uk-list-bullet uk-text-small">
              <li>初期費用最小化</li>
              <li>売上・利益向上に連動</li>
              <li>長期戦略パートナー</li>
              <li>共同事業展開</li>
            </ul>
            <div class="uk-text-center uk-margin-top">
              <span class="uk-label ">収益共有型</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- お問い合わせ・相談 CTA -->
  <section class="uk-section">
    <div class="uk-container">
      <div class="uk-text-center">
        <h2 class="uk-heading-small uk-text-bold uk-margin-bottom">
          まずは無料相談から始めましょう
        </h2>
        <p class="uk-text-lead uk-margin-bottom">
          あなたのビジネスに最適なソリューション・パートナーシップを一緒に考えます
        </p>
        
        <div class="uk-button-group uk-flex-center uk-margin-top">
          <a href="<?php echo esc_url(home_url('/contact/')); ?>" 
             class="uk-button uk-button-text">
            <span uk-icon="icon: mail"></span> 無料相談を申し込む
          </a>
          <a href="<?php echo esc_url(home_url('/about')); ?>" 
             class="uk-button uk-button-text">
            <span uk-icon="icon: info"></span> 会社について
          </a>
        </div>

        <div class="uk-margin-large-top">
          <div class="uk-grid-small uk-child-width-auto uk-flex-center" uk-grid>
            <div><span class="uk-label ">初回相談無料</span></div>
            <div><span class="uk-label ">オンライン対応</span></div>
            <div><span class="uk-label ">見積もり無料</span></div>
            <div><span class="uk-label ">NDA対応</span></div>
          </div>
        </div>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>
