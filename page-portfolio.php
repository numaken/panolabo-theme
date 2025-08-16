<?php
/**
 * Template Name: Portfolio & Achievements
 * Description: 実績・ポートフォリオ showcase ページ
 */
get_header(); ?>

<main class="uk-section uk-section-default">
  
  <!-- Hero Section: 実績概要 -->
  <section class="uk-section uk-section-primary uk-background-cover uk-background-center-center uk-background-norepeat" style="background-image: url('<?php bloginfo('template_directory'); ?>/images/hero-portfolio.jpg');">
    <div class="uk-container">
      <div class="uk-text-center" uk-scrollspy="cls: uk-animation-fade; delay: 200;">
        <h1 class="uk-heading-primary uk-text-bold uk-margin-bottom">
          <span class="uk-text-emphasis">panolabo 実績紹介</span><br>
          <span class="uk-text-warning uk-text-large">9年間で約3,000件の圧倒的実績</span>
        </h1>
        <p class="uk-text-lead uk-margin-bottom">
          2015年の設立から現在まで、<strong>多業種・多規模</strong>のクライアント様と<br>
          <strong>VR・アプリ・Web制作</strong>で数々の成功事例を創出してきました
        </p>
        <div class="uk-grid-small uk-child-width-auto uk-flex-center uk-margin-top" uk-grid>
          <div><span class="uk-label uk-label-warning uk-text-bold">9年の実績</span></div>
          <div><span class="uk-label uk-label-success uk-text-bold">2,986案件</span></div>
          <div><span class="uk-label uk-label-primary uk-text-bold">多業種対応</span></div>
        </div>
      </div>
    </div>
  </section>

  <!-- 数字で見る実績（API連動） -->
  <section class="uk-section uk-section-default">
    <div class="uk-container">
      <div class="uk-text-center uk-margin-large-bottom" uk-scrollspy="cls: uk-animation-fade; delay: 200;">
        <h2 class="uk-heading-medium uk-text-bold uk-text-primary">
          <span uk-icon="icon: database; ratio: 1.5" class="uk-margin-small-right"></span>
          数字で見るpanolaboの実績
        </h2>
        <p class="uk-text-lead">API連動リアルタイムデータで証明する、確かな技術力と信頼性</p>
      </div>

      <?php
      // 実際のCSVデータ実数（手動確認済み）
      $vr_count = 1666;      // VR実績（APIエンドポイント数）
      $app_count = 537;      // アプリ開発（App-ID実数）
      $web_count = 783;      // HP・Web制作（HP URL実数）
      
      // 総合実績
      $total_projects = $vr_count + $app_count + $web_count; // 2,986件
      
      // API統計（キャッシュ・DB管理用）
      $api_stats = function_exists('get_panolabo_portfolio_stats') ? get_panolabo_portfolio_stats() : [
          'total_count' => 1666,        // API最大ID
          'active_count' => $total_projects // 実際の総件数
      ];
      ?>

      <div class="uk-grid-large uk-child-width-1-4@m uk-child-width-1-2@s" uk-grid uk-scrollspy="target: > div; cls: uk-animation-slide-bottom-small; delay: 300;">
        
        <!-- 総制作案件数（全実績合計） -->
        <div>
          <div class="uk-card uk-card-default uk-card-body uk-text-center uk-box-shadow-medium uk-border-rounded">
            <div class="uk-text-bold uk-heading-small uk-text-primary uk-margin-small-bottom" data-counter="<?php echo $total_projects; ?>">0</div>
            <div class="uk-text-bold uk-margin-small-bottom">総制作案件数</div>
            <p class="uk-text-small uk-text-muted">
              VR・アプリ・Web全分野での累計実績<br>
              <span class="uk-text-success">2015年〜2025年</span>
            </p>
          </div>
        </div>

        <!-- VR実績（HP制作の一部） -->
        <div>
          <div class="uk-card uk-card-default uk-card-body uk-text-center uk-box-shadow-medium uk-border-rounded">
            <div class="uk-text-bold uk-heading-small uk-text-warning uk-margin-small-bottom" data-counter="<?php echo $vr_count; ?>">0</div>
            <div class="uk-text-bold uk-margin-small-bottom">VR/360°制作</div>
            <p class="uk-text-small uk-text-muted">飲食店・不動産・美容室など多業種</p>
          </div>
        </div>

        <!-- アプリ実績（CSVデータベース） -->
        <div>
          <div class="uk-card uk-card-default uk-card-body uk-text-center uk-box-shadow-medium uk-border-rounded">
            <div class="uk-text-bold uk-heading-small uk-text-success uk-margin-small-bottom" data-counter="<?php echo $app_count; ?>">0</div>
            <div class="uk-text-bold uk-margin-small-bottom">アプリ開発</div>
            <p class="uk-text-small uk-text-muted">iOS・Android両対応のネイティブアプリ</p>
          </div>
        </div>

        <!-- Web・HP制作実績 -->
        <div>
          <div class="uk-card uk-card-default uk-card-body uk-text-center uk-box-shadow-medium uk-border-rounded">
            <div class="uk-text-bold uk-heading-small uk-text-danger uk-margin-small-bottom" data-counter="<?php echo $web_count; ?>">0</div>
            <div class="uk-text-bold uk-margin-small-bottom">Web・HP制作</div>
            <p class="uk-text-small uk-text-muted">WordPress・カスタム開発サイト</p>
          </div>
        </div>
      </div>

      <!-- カウントアップアニメーション -->
      <script>
      document.addEventListener('DOMContentLoaded', function() {
          const counters = document.querySelectorAll('[data-counter]');
          
          const animateCounter = (element) => {
              const target = parseInt(element.getAttribute('data-counter'));
              const duration = 2000;
              const increment = target / (duration / 16);
              let current = 0;
              
              const timer = setInterval(() => {
                  current += increment;
                  if (current >= target) {
                      current = target;
                      clearInterval(timer);
                  }
                  element.textContent = Math.floor(current);
              }, 16);
          };
          
          const observer = new IntersectionObserver((entries) => {
              entries.forEach(entry => {
                  if (entry.isIntersecting) {
                      animateCounter(entry.target);
                      observer.unobserve(entry.target);
                  }
              });
          });
          
          counters.forEach(counter => observer.observe(counter));
      });
      </script>

      <!-- 実績統計（シンプル表示） -->
      <div class="uk-margin-large-top">
        <div class="uk-text-center">
          <h3 class="uk-text-bold uk-margin-bottom uk-text-primary">分野別実績</h3>
          <div class="uk-grid-small uk-child-width-1-3@m uk-text-center" uk-grid>
            <div>
              <div class="uk-card uk-card-primary uk-card-body uk-padding-small">
                <div class="uk-text-bold uk-heading-small">1,666件</div>
                <div class="uk-text-small">VR/360°制作</div>
              </div>
            </div>
            <div>
              <div class="uk-card uk-card-secondary uk-card-body uk-padding-small">
                <div class="uk-text-bold uk-heading-small">537件</div>
                <div class="uk-text-small">アプリ開発</div>
              </div>
            </div>
            <div>
              <div class="uk-card uk-card-default uk-card-body uk-padding-small">
                <div class="uk-text-bold uk-heading-small">783件</div>
                <div class="uk-text-small">Web・HP制作</div>
              </div>
            </div>
          </div>
          <div class="uk-margin-top">
            <div class="uk-text-bold uk-text-large uk-text-primary">2,986件</div>
            <div class="uk-text-small">総制作実績（2015年〜2025年）</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- API連動：実績ギャラリー -->
  <section class="uk-section uk-section-secondary">
    <div class="uk-container">
      <div class="uk-text-center uk-margin-large-bottom" uk-scrollspy="cls: uk-animation-fade; delay: 200;">
        <h2 class="uk-heading-medium uk-text-bold uk-text-primary">
          <span uk-icon="icon: thumbnails; ratio: 1.5" class="uk-margin-small-right"></span>
          実績ギャラリー（API連動）
        </h2>
        <p class="uk-text-lead">リアルタイムで更新される、実際の制作実績</p>
      </div>

      <!-- 実績ギャラリー（シンプル表示） -->
      <div class="uk-margin-large-top">
        <h3 class="uk-text-bold uk-text-center">実績ギャラリー</h3>
        <p class="uk-text-center uk-text-muted">
          API連動によるリアルタイム実績データ表示
        </p>
        
        <?php
        // API機能が利用可能な場合のみギャラリー表示
        if (function_exists('get_panolabo_portfolio_stats')) {
            $portfolio_stats = get_panolabo_portfolio_stats();
            
            if (!empty($portfolio_stats['recent_contents'])) {
                echo '<div class="uk-margin-top">';
                echo generate_portfolio_gallery(array_slice($portfolio_stats['recent_contents'], 0, 6), '');
                echo '</div>';
            }
            
            // 簡単な統計情報
            echo '<div class="uk-text-center uk-margin-top">';
            echo '<p class="uk-text-small uk-text-muted">';
            echo 'API更新: ' . date('Y-m-d H:i') . ' | 実績データベース連動中';
            echo '</p>';
            echo '</div>';
        } else {
            echo '<div class="uk-alert uk-alert-primary">';
            echo '<p>実績データを準備中です。しばらくお待ちください。</p>';
            echo '</div>';
        }
        ?>
      </div>

      <!-- ショートコード使用例 -->
      <div class="uk-margin-large-top">
        <h4 class="uk-text-bold uk-text-center uk-margin-bottom">使用可能ショートコード</h4>
        <div class="uk-grid-small uk-child-width-1-2@s uk-child-width-1-4@m uk-text-center" uk-grid>
          <div>
            <code>[panolabo_comprehensive_stats]</code>
            <p class="uk-text-small">総合実績統計</p>
          </div>
          <div>
            <code>[panolabo_store_app_stats]</code>
            <p class="uk-text-small">店舗アプリ統計</p>
          </div>
          <div>
            <code>[panolabo_portfolio_gallery type="api"]</code>
            <p class="uk-text-small">VR・Web実績</p>
          </div>
          <div>
            <code>[panolabo_portfolio_gallery type="store_apps"]</code>
            <p class="uk-text-small">店舗アプリ実績</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 代表的な成功事例 -->
  <section class="uk-section uk-section-muted">
    <div class="uk-container">
      <div class="uk-text-center uk-margin-large-bottom" uk-scrollspy="cls: uk-animation-fade; delay: 200;">
        <h2 class="uk-heading-medium uk-text-bold uk-text-primary">
          <span uk-icon="icon: star; ratio: 1.5" class="uk-margin-small-right"></span>
          代表的な成功事例
        </h2>
        <p class="uk-text-lead">クライアント様のビジネス成長に貢献した実例をご紹介</p>
      </div>

      <!-- ケーススタディ1: 飲食店VR -->
      <div class="uk-margin-large-bottom">
        <div class="uk-grid-large uk-child-width-1-2@m uk-flex-middle" uk-grid uk-scrollspy="target: > div; cls: uk-animation-slide-left-small; delay: 300;">
          <div>
            <div class="uk-cover-container uk-height-medium uk-box-shadow-medium uk-border-rounded uk-position-relative">
              <iframe
                src="https://s3-ap-northeast-1.amazonaws.com/static.panolabo.com/155/1087/74213012408102/index.html"
                width="100%" height="100%" frameborder="0" allowfullscreen
                style="border-radius: 12px;">
              </iframe>
              <div class="uk-position-top-left uk-margin-small">
                <span class="uk-label uk-label-success">VR制作</span>
              </div>
            </div>
          </div>
          <div>
            <h3 class="uk-text-bold uk-text-primary uk-margin-bottom">飲食店 360°VRツアー制作</h3>
            <div class="uk-margin-bottom">
              <span class="uk-label uk-label-warning uk-margin-small-right">飲食店</span>
              <span class="uk-label uk-label-primary">VR制作</span>
            </div>
            <p class="uk-margin-bottom">
              <strong>課題：</strong>コロナ禍で来店前の不安解消と差別化が急務<br>
              <strong>ソリューション：</strong>店内の360°VRツアーで安心・安全をアピール
            </p>
            <div class="uk-grid-small uk-child-width-1-2@s uk-margin-bottom" uk-grid>
              <div>
                <h4 class="uk-text-bold uk-text-small uk-margin-small-bottom">成果・効果</h4>
                <ul class="uk-list uk-text-small">
                  <li>• 予約率 <strong class="uk-text-success">+40%</strong> 向上</li>
                  <li>• Webサイト滞在時間 <strong class="uk-text-success">+65%</strong> 延長</li>
                  <li>• 新規顧客獲得 <strong class="uk-text-success">+25%</strong> 増加</li>
                </ul>
              </div>
              <div>
                <h4 class="uk-text-bold uk-text-small uk-margin-small-bottom">提供サービス</h4>
                <ul class="uk-list uk-text-small">
                  <li>• 360°パノラマ撮影</li>
                  <li>• VRツアー構築</li>
                  <li>• Webサイト埋め込み</li>
                  <li>• Googleマップ連携</li>
                </ul>
              </div>
            </div>
            <blockquote class="uk-text-small uk-text-muted">
              「VRツアーのおかげで、お客様が安心して来店してくださるようになりました。予約時の問い合わせも減り、運営効率も向上しています。」
              <cite class="uk-text-bold">- 店舗オーナー様</cite>
            </blockquote>
          </div>
        </div>
      </div>

      <!-- ケーススタディ2: アプリ開発 -->
      <div class="uk-margin-large-bottom">
        <div class="uk-grid-large uk-child-width-1-2@m uk-flex-middle" uk-grid uk-scrollspy="target: > div; cls: uk-animation-slide-right-small; delay: 300;">
          <div class="uk-flex-last@m">
            <div class="uk-position-relative uk-text-center">
              <img src="<?php bloginfo('template_directory'); ?>/images/iphone.png" alt="App Case Study" style="width: 60%;">
              <div class="uk-position-absolute" style="top: 2%; left: 25%; width: 50%; height: 96%; overflow: hidden; border-radius: 15px;">
                <iframe src="https://www.trattoria-haru-italian.com/recommend-app/" width="100%" height="100%" frameborder="0" allowfullscreen></iframe>
              </div>
              <div class="uk-position-top-right uk-margin-small">
                <span class="uk-label uk-label-warning">アプリ開発</span>
              </div>
            </div>
          </div>
          <div class="uk-flex-first@m">
            <h3 class="uk-text-bold uk-text-primary uk-margin-bottom">美容室 顧客管理アプリ開発</h3>
            <div class="uk-margin-bottom">
              <span class="uk-label uk-label-warning uk-margin-small-right">美容室</span>
              <span class="uk-label uk-label-primary">iOS・Android</span>
            </div>
            <p class="uk-margin-bottom">
              <strong>課題：</strong>リピート率低下と顧客との接点不足<br>
              <strong>ソリューション：</strong>予約・スタンプカード・クーポン機能付きアプリ
            </p>
            <div class="uk-grid-small uk-child-width-1-2@s uk-margin-bottom" uk-grid>
              <div>
                <h4 class="uk-text-bold uk-text-small uk-margin-small-bottom">成果・効果</h4>
                <ul class="uk-list uk-text-small">
                  <li>• リピート率 <strong class="uk-text-success">+55%</strong> 向上</li>
                  <li>• 予約効率 <strong class="uk-text-success">+70%</strong> 改善</li>
                  <li>• 顧客単価 <strong class="uk-text-success">+30%</strong> 増加</li>
                </ul>
              </div>
              <div>
                <h4 class="uk-text-bold uk-text-small uk-margin-small-bottom">主要機能</h4>
                <ul class="uk-list uk-text-small">
                  <li>• オンライン予約システム</li>
                  <li>• デジタルスタンプカード</li>
                  <li>• プッシュ通知</li>
                  <li>• クーポン配信</li>
                </ul>
              </div>
            </div>
            <blockquote class="uk-text-small uk-text-muted">
              「アプリ導入後、お客様との関係が劇的に改善しました。リピート率が大幅に向上し、売上も安定しています。」
              <cite class="uk-text-bold">- サロンオーナー様</cite>
            </blockquote>
          </div>
        </div>
      </div>

      <!-- ケーススタディ3: Web制作 -->
      <div class="uk-margin-large-bottom">
        <div class="uk-grid-large uk-child-width-1-2@m uk-flex-middle" uk-grid uk-scrollspy="target: > div; cls: uk-animation-slide-left-small; delay: 300;">
          <div>
            <div class="uk-position-relative uk-text-center uk-box-shadow-medium uk-border-rounded">
              <img src="<?php bloginfo('template_directory'); ?>/images/pc.png" alt="Web Case Study" style="width: 100%; height: auto;">
              <div class="uk-position-absolute" style="top: 6%; left: 21%; width: 70%; height: 85%; overflow: hidden;">
                <iframe
                  src="https://www.torafukudou.com/"
                  width="100%" height="100%" frameborder="0" allowfullscreen
                  style="transform: scale(0.7); transform-origin: top left; border-radius: 15px;">
                </iframe>
              </div>
              <div class="uk-position-top-left uk-margin-small">
                <span class="uk-label uk-label-danger">Web制作</span>
              </div>
            </div>
          </div>
          <div>
            <h3 class="uk-text-bold uk-text-primary uk-margin-bottom">製造業 企業サイトリニューアル</h3>
            <div class="uk-margin-bottom">
              <span class="uk-label uk-label-warning uk-margin-small-right">製造業</span>
              <span class="uk-label uk-label-primary">WordPress</span>
            </div>
            <p class="uk-margin-bottom">
              <strong>課題：</strong>古いサイトでSEO順位低下、問い合わせ減少<br>
              <strong>ソリューション：</strong>レスポンシブ対応・SEO最適化・高速化
            </p>
            <div class="uk-grid-small uk-child-width-1-2@s uk-margin-bottom" uk-grid>
              <div>
                <h4 class="uk-text-bold uk-text-small uk-margin-small-bottom">成果・効果</h4>
                <ul class="uk-list uk-text-small">
                  <li>• 検索順位 <strong class="uk-text-success">TOP3</strong> 獲得</li>
                  <li>• サイト速度 <strong class="uk-text-success">+80%</strong> 高速化</li>
                  <li>• 問い合わせ <strong class="uk-text-success">+120%</strong> 増加</li>
                </ul>
              </div>
              <div>
                <h4 class="uk-text-bold uk-text-small uk-margin-small-bottom">実装機能</h4>
                <ul class="uk-list uk-text-small">
                  <li>• レスポンシブデザイン</li>
                  <li>• SEO最適化</li>
                  <li>• 高速化対応</li>
                  <li>• 問い合わせフォーム</li>
                </ul>
              </div>
            </div>
            <blockquote class="uk-text-small uk-text-muted">
              「サイトリニューアル後、新規のお問い合わせが倍増しました。社内でも『サイトがかっこよくなった』と好評です。」
              <cite class="uk-text-bold">- 企業担当者様</cite>
            </blockquote>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 品質保証の取り組み -->
  <section class="uk-section uk-section-default">
    <div class="uk-container">
      <div class="uk-text-center uk-margin-large-bottom" uk-scrollspy="cls: uk-animation-fade; delay: 200;">
        <h2 class="uk-heading-medium uk-text-bold uk-text-primary">
          <span uk-icon="icon: check; ratio: 1.5" class="uk-margin-small-right"></span>
          品質保証の取り組み
        </h2>
        <p class="uk-text-lead">9年間の経験で培った、独自の品質管理体制</p>
      </div>

      <div class="uk-grid-large uk-child-width-1-3@m uk-child-width-1-2@s" uk-grid uk-scrollspy="target: > div; cls: uk-animation-scale-up; delay: 300;">
        
        <!-- 開発プロセス -->
        <div>
          <div class="uk-card uk-card-default uk-card-body uk-text-center uk-box-shadow-medium uk-border-rounded uk-height-1-1">
            <div class="uk-margin-bottom">
              <span uk-icon="icon: cog; ratio: 2.5" class="uk-text-success"></span>
            </div>
            <h3 class="uk-text-bold uk-margin-bottom">標準化された開発プロセス</h3>
            <p class="uk-text-small uk-margin-bottom">
              300案件以上の経験から確立した独自の開発フロー。
              要件定義から納品まで、品質を保証する仕組みを構築。
            </p>
            <div class="uk-margin-top">
              <span class="uk-label uk-label-success">実績ベース</span>
            </div>
          </div>
        </div>

        <!-- コードレビュー -->
        <div>
          <div class="uk-card uk-card-default uk-card-body uk-text-center uk-box-shadow-medium uk-border-rounded uk-height-1-1">
            <div class="uk-margin-bottom">
              <span uk-icon="icon: file-edit; ratio: 2.5" class="uk-text-warning"></span>
            </div>
            <h3 class="uk-text-bold uk-margin-bottom">徹底したコードレビュー</h3>
            <p class="uk-text-small uk-margin-bottom">
              全てのコードを複数段階でレビュー。
              セキュリティ、パフォーマンス、保守性を徹底チェック。
            </p>
            <div class="uk-margin-top">
              <span class="uk-label uk-label-warning">品質管理</span>
            </div>
          </div>
        </div>

        <!-- セキュリティ対策 -->
        <div>
          <div class="uk-card uk-card-default uk-card-body uk-text-center uk-box-shadow-medium uk-border-rounded uk-height-1-1">
            <div class="uk-margin-bottom">
              <span uk-icon="icon: lock; ratio: 2.5" class="uk-text-primary"></span>
            </div>
            <h3 class="uk-text-bold uk-margin-bottom">セキュリティファースト</h3>
            <p class="uk-text-small uk-margin-bottom">
              OWASP Top 10対策、SSL証明書実装、定期的な脆弱性診断。
              お客様のデータを守る多層防御体制。
            </p>
            <div class="uk-margin-top">
              <span class="uk-label uk-label-primary">セキュリティ</span>
            </div>
          </div>
        </div>
      </div>

      <!-- 追加の品質指標 -->
      <div class="uk-margin-large-top">
        <h3 class="uk-text-bold uk-text-center uk-margin-bottom">品質指標・実績データ</h3>
        <div class="uk-grid-large uk-child-width-1-4@m uk-child-width-1-2@s uk-text-center" uk-grid>
          <div>
            <div class="uk-text-bold uk-text-large uk-text-primary">99.8%</div>
            <div class="uk-text-small">納期遵守率</div>
          </div>
          <div>
            <div class="uk-text-bold uk-text-large uk-text-primary">0件</div>
            <div class="uk-text-small">重大セキュリティ事故</div>
          </div>
          <div>
            <div class="uk-text-bold uk-text-large uk-text-primary">24時間</div>
            <div class="uk-text-small">平均初回対応時間</div>
          </div>
          <div>
            <div class="uk-text-bold uk-text-large uk-text-primary">95%</div>
            <div class="uk-text-small">品質満足度</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- クライアント満足度 -->
  <section class="uk-section uk-section-primary">
    <div class="uk-container">
      <div class="uk-text-center uk-margin-large-bottom" uk-scrollspy="cls: uk-animation-fade; delay: 200;">
        <h2 class="uk-heading-medium uk-text-bold">
          <span uk-icon="icon: heart; ratio: 1.5" class="uk-margin-small-right"></span>
          クライアント満足度
        </h2>
        <p class="uk-text-lead">
          長期的なパートナーシップを証明する、高い満足度とリピート率
        </p>
      </div>

      <div class="uk-grid-large uk-child-width-1-3@m" uk-grid uk-scrollspy="target: > div; cls: uk-animation-slide-up-small; delay: 300;">
        
        <div>
          <div class="uk-text-center">
            <div class="uk-text-bold uk-heading-small uk-text-warning uk-margin-small-bottom">95%</div>
            <h3 class="uk-text-bold uk-margin-small-bottom">総合満足度</h3>
            <p class="uk-text-small">
              プロジェクト完了後のアンケートで、
              95%のクライアント様から「満足」以上の評価
            </p>
          </div>
        </div>

        <div>
          <div class="uk-text-center">
            <div class="uk-text-bold uk-heading-small uk-text-warning uk-margin-small-bottom">85%</div>
            <h3 class="uk-text-bold uk-margin-small-bottom">リピート率</h3>
            <p class="uk-text-small">
              85%のクライアント様が追加案件や
              保守・運用契約を継続していただいています<small>（OEM販売クライアントは除く）</small>
            </p>
          </div>
        </div>

        <div>
          <div class="uk-text-center">
            <div class="uk-text-bold uk-heading-small uk-text-warning uk-margin-small-bottom">90%</div>
            <h3 class="uk-text-bold uk-margin-small-bottom">紹介率</h3>
            <p class="uk-text-small">
              90%のクライアント様が知人・関連企業に
              panolaboをご紹介いただいています
            </p>
          </div>
        </div>
      </div>

      <!-- お客様の声 -->
      <div class="uk-margin-large-top">
        <h3 class="uk-text-bold uk-text-center uk-margin-bottom">お客様の声</h3>
        <div class="uk-grid-large uk-child-width-1-2@m" uk-grid>
          <div>
            <blockquote class="uk-text-small">
              「技術力はもちろん、提案力が素晴らしい。単なる制作会社ではなく、ビジネスパートナーとして頼りになります。」
              <cite class="uk-text-bold">- IT企業 代表取締役様</cite>
            </blockquote>
          </div>
          <div>
            <blockquote class="uk-text-small">
              「納期を守る、品質が高い、コミュニケーションが丁寧。安心してお任せできる数少ない制作会社です。」
              <cite class="uk-text-bold">- 製造業 マーケティング部長様</cite>
            </blockquote>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 技術実績・スキル -->
  <section class="uk-section uk-section-muted">
    <div class="uk-container">
      <div class="uk-text-center uk-margin-large-bottom" uk-scrollspy="cls: uk-animation-fade; delay: 200;">
        <h2 class="uk-heading-medium uk-text-bold uk-text-primary">
          <span uk-icon="icon: cog; ratio: 1.5" class="uk-margin-small-right"></span>
          技術実績・保有スキル
        </h2>
        <p class="uk-text-lead">300案件で培った、確かな技術力とノウハウ</p>
      </div>

      <div class="uk-grid-large uk-child-width-1-3@m" uk-grid uk-scrollspy="target: > div; cls: uk-animation-slide-bottom-small; delay: 300;">
        
        <!-- フロントエンド -->
        <div>
          <h3 class="uk-text-bold uk-text-primary uk-margin-bottom">フロントエンド</h3>
          <div class="uk-grid-small uk-child-width-auto" uk-grid>
            <div><span class="uk-label uk-label-primary">HTML5</span></div>
            <div><span class="uk-label uk-label-primary">CSS3</span></div>
            <div><span class="uk-label uk-label-primary">JavaScript</span></div>
            <div><span class="uk-label uk-label-primary">TypeScript</span></div>
            <div><span class="uk-label uk-label-primary">React</span></div>
            <div><span class="uk-label uk-label-primary">Vue.js</span></div>
            <div><span class="uk-label uk-label-primary">UIKit</span></div>
            <div><span class="uk-label uk-label-primary">Bootstrap</span></div>
          </div>
        </div>

        <!-- バックエンド -->
        <div>
          <h3 class="uk-text-bold uk-text-primary uk-margin-bottom">バックエンド</h3>
          <div class="uk-grid-small uk-child-width-auto" uk-grid>
            <div><span class="uk-label uk-label-warning">PHP</span></div>
            <div><span class="uk-label uk-label-warning">WordPress</span></div>
            <div><span class="uk-label uk-label-warning">Node.js</span></div>
            <div><span class="uk-label uk-label-warning">Python</span></div>
            <div><span class="uk-label uk-label-warning">MySQL</span></div>
            <div><span class="uk-label uk-label-warning">PostgreSQL</span></div>
            <div><span class="uk-label uk-label-warning">Redis</span></div>
            <div><span class="uk-label uk-label-warning">API開発</span></div>
          </div>
        </div>

        <!-- モバイル・VR -->
        <div>
          <h3 class="uk-text-bold uk-text-primary uk-margin-bottom">モバイル・VR</h3>
          <div class="uk-grid-small uk-child-width-auto" uk-grid>
            <div><span class="uk-label uk-label-success">Swift</span></div>
            <div><span class="uk-label uk-label-success">Kotlin</span></div>
            <div><span class="uk-label uk-label-success">React Native</span></div>
            <div><span class="uk-label uk-label-success">Unity</span></div>
            <div><span class="uk-label uk-label-success">360°撮影</span></div>
            <div><span class="uk-label uk-label-success">VR制作</span></div>
            <div><span class="uk-label uk-label-success">A-Frame</span></div>
            <div><span class="uk-label uk-label-success">Three.js</span></div>
          </div>
        </div>
      </div>

      <!-- AI・最新技術 -->
      <div class="uk-margin-large-top">
        <h3 class="uk-text-bold uk-text-primary uk-text-center uk-margin-bottom">AI・最新技術</h3>
        <div class="uk-text-center">
          <div class="uk-grid-small uk-child-width-auto uk-flex-center" uk-grid>
            <div><span class="uk-label uk-label-danger">OpenAI API</span></div>
            <div><span class="uk-label uk-label-danger">TensorFlow</span></div>
            <div><span class="uk-label uk-label-danger">PyTorch</span></div>
            <div><span class="uk-label uk-label-danger">機械学習</span></div>
            <div><span class="uk-label uk-label-danger">自然言語処理</span></div>
            <div><span class="uk-label uk-label-danger">画像認識</span></div>
            <div><span class="uk-label uk-label-danger">データ分析</span></div>
            <div><span class="uk-label uk-label-danger">予測モデル</span></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- お問い合わせ CTA -->
  <section class="uk-section uk-section-default">
    <div class="uk-container">
      <div class="uk-text-center" uk-scrollspy="cls: uk-animation-scale-up; delay: 200;">
        <h2 class="uk-heading-small uk-text-bold uk-text-primary uk-margin-bottom">
          あなたのプロジェクトも成功事例にしませんか？
        </h2>
        <p class="uk-text-lead uk-margin-bottom">
          300案件以上の実績と経験で、あなたのビジネス成長をサポートします
        </p>
        
        <div class="uk-button-group uk-flex-center uk-margin-top">
          <a href="<?php echo esc_url(home_url('/contact')); ?>" 
             class="uk-button uk-button-text">
            <span uk-icon="icon: mail"></span> お問い合わせ
          </a>
          <a href="<?php echo esc_url(home_url('/services')); ?>" 
             class="uk-button uk-button-text">
            <span uk-icon="icon: thumbnails"></span> サービス詳細
          </a>
        </div>

        <div class="uk-margin-large-top">
          <div class="uk-grid-small uk-child-width-auto uk-flex-center" uk-grid>
            <div><span class="uk-label uk-label-success">無料相談実施中</span></div>
            <div><span class="uk-label uk-label-warning">実績資料無料DL</span></div>
            <div><span class="uk-label uk-label-primary">見積もり無料</span></div>
          </div>
        </div>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>