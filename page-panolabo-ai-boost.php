<?php
/**
 * Template Name: Panolabo AI Boost Product Page
 * Description: AI Boost営業支援プラグイン製品詳細ページ
 */
get_header(); ?>

<main class="uk-section">
  
  <!-- Hero Section: AI Boost紹介 -->
  <section class="uk-section uk-background-cover uk-background-center-center uk-background-norepeat" style="background: linear-gradient(135deg, #546E7A 0%, #4CAF50 50%, #42A5F5 100%);">
    <div class="uk-container">
      <div class="uk-text-center uk-text-white" uk-scrollspy="cls: uk-animation-fade; delay: 200;">
        <div class="uk-margin-bottom">
          <span uk-icon="icon: future; ratio: 3" class="uk-text-warning"></span>
        </div>
        <h1 class="uk-heading-primary uk-text-bold uk-margin-bottom">
          <span class="uk-text-emphasis">Panolabo AI Boost</span><br>
          <span class="uk-text-large">営業支援プラグイン</span>
        </h1>
        <p class="uk-text-lead uk-margin-bottom">
          AI導入効果を「提案型事例」で視覚化。<br>
          <strong>営業成約率を3倍に向上</strong>させる革命的WordPressプラグイン
        </p>
        
        <!-- 価格・プラン表示 -->
        <div class="uk-grid-small uk-child-width-auto uk-flex-center uk-margin-top" uk-grid>
          <div><span class="uk-label uk-label-success uk-text-bold">無料プラン ¥0</span></div>
          <div><span class="uk-label uk-label-warning uk-text-bold">プレミアム ¥980/月</span></div>
          <div><span class="uk-label uk-label-danger uk-text-bold">エンタープライズ ¥4,980/月</span></div>
        </div>
        
        <!-- CTA ボタン -->
        <div class="uk-margin-large-top">
          <a href="#pricing" class="uk-button uk-button-primary uk-button-small uk-margin-right" uk-scroll>
            <span uk-icon="icon: credit-card" class="uk-margin-small-right"></span>
            今すぐ購入する
          </a>
          <a href="#demo" class="uk-button uk-button-primary uk-button-small" uk-scroll>
            <span uk-icon="icon: play" class="uk-margin-small-right"></span>
            デモを見る
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- 問題提起セクション -->
  <section class="uk-section uk-section-default">
    <div class="uk-container">
      <div class="uk-text-center uk-margin-large-bottom">
        <h2 class="uk-heading-medium uk-text-bold">
          <span uk-icon="icon: warning; ratio: 1.5" class="uk-margin-small-right uk-text-danger"></span>
          こんな営業の悩み、ありませんか？
        </h2>
      </div>
      
      <div class="uk-grid-large uk-child-width-1-2@m" uk-grid>
        <div>
          <div class="uk-card uk-card-default uk-card-body uk-border-rounded">
            <h3 class="uk-text-bold uk-text-danger uk-margin-bottom">
              <span uk-icon="icon: close" class="uk-margin-small-right"></span>従来の営業方法
            </h3>
            <ul class="uk-list uk-list-bullet">
              <li>「AIで何が変わるの？」と聞かれて説明に困る</li>
              <li>具体的な数値効果を示せない</li>
              <li>「リニューアルが必要では？」と敬遠される</li>
              <li>営業資料作成に2-3時間かかる</li>
              <li>同業種の成功事例がない</li>
            </ul>
          </div>
        </div>
        
        <div>
          <div class="uk-card uk-card-primary uk-card-body uk-border-rounded">
            <h3 class="uk-text-bold uk-text-white uk-margin-bottom">
              <span uk-icon="icon: check" class="uk-margin-small-right"></span>AI Boost導入後
            </h3>
            <ul class="uk-list uk-list-bullet uk-text-white">
              <li>業種別の具体的成功事例を瞬時に表示</li>
              <li>数値化された効果をビジュアルで訴求</li>
              <li>「足すだけ」の手軽さをアピール</li>
              <li>ワンクリックで営業資料完成</li>
              <li>6業種の豊富な事例データを内蔵</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- デモセクション -->
  <section id="demo" class="uk-section uk-section-muted">
    <div class="uk-container">
      <div class="uk-text-center uk-margin-large-bottom">
        <h2 class="uk-heading-medium uk-text-bold">
          <span uk-icon="icon: play; ratio: 1.5" class="uk-margin-small-right"></span>
          実際の動作デモ
        </h2>
        <p class="uk-text-lead">
          営業現場で実際に表示される画面をご覧ください
        </p>
      </div>
      
      <!-- ショートコード実演 -->
      <div class="uk-grid-large uk-child-width-1-2@m" uk-grid>
        
        <!-- 飲食店事例 -->
        <div>
          <div class="uk-card uk-card-default uk-card-body">
            <div class="uk-flex uk-flex-between uk-flex-middle uk-margin-bottom">
              <h3 class="uk-text-bold">飲食店向け営業シーン</h3>
              <span class="uk-label uk-label-primary">ライブデモ</span>
            </div>
            <p class="uk-text-small uk-text-muted uk-margin-small-bottom">
              コード：<code>[future_case id="1" layout="card"]</code>
            </p>
            
            <!-- プラグイン出力例 -->
            <div style="border: 2px solid #4CAF50; border-radius: 8px; padding: 20px; background: white;">
              <div class="pab-future-case pab-layout-card">
                <div class="pab-card">
                  <div class="pab-card-content">
                    <h4 style="font-size: 1.1rem; font-weight: 700; margin-bottom: 10px; color: #546E7A;">
                      都内イタリアンレストランの集客自動化事例
                    </h4>
                    <div style="margin-bottom: 15px;">
                      <span style="background: #4CAF50; color: white; padding: 4px 8px; border-radius: 15px; font-size: 0.8rem; margin-right: 8px;">飲食店</span>
                      <span style="background: #42A5F5; color: white; padding: 4px 8px; border-radius: 15px; font-size: 0.8rem;">東京都渋谷区</span>
                    </div>
                    <p style="color: #6c757d; margin-bottom: 15px; font-size: 0.95rem;">SNS自動投稿で来店予約率35%向上、運営工数50%削減を実現</p>
                    
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin: 15px 0; font-size: 0.9rem;">
                      <div style="text-align: center; padding: 10px; background: #E8F5E9; border-radius: 6px;">
                        <strong style="color: #4CAF50; font-size: 1.2rem;">+35%</strong><br>
                        <span style="color: #666;">予約率向上</span>
                      </div>
                      <div style="text-align: center; padding: 10px; background: #E8F5E9; border-radius: 6px;">
                        <strong style="color: #4CAF50; font-size: 1.2rem;">-50%</strong><br>
                        <span style="color: #666;">運営工数</span>
                      </div>
                    </div>
                    
                    <div style="margin: 15px 0;">
                      <span style="background: #42A5F5; color: white; padding: 4px 8px; border-radius: 15px; font-size: 0.8rem;">SNS自動投稿</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="uk-alert-success uk-margin-top" uk-alert>
              <p><strong>営業効果:</strong> この表示で成約率3倍向上を実現</p>
            </div>
          </div>
        </div>

        <!-- 美容室事例 -->
        <div>
          <div class="uk-card uk-card-default uk-card-body">
            <div class="uk-flex uk-flex-between uk-flex-middle uk-margin-bottom">
              <h3 class="uk-text-bold">美容室向け営業シーン</h3>
              <span class="uk-label uk-label-primary">ライブデモ</span>
            </div>
            <p class="uk-text-small uk-text-muted uk-margin-small-bottom">
              コード：<code>[future_case id="2" layout="card"]</code>
            </p>
            
            <div style="border: 2px solid #4CAF50; border-radius: 8px; padding: 20px; background: white;">
              <div class="pab-future-case pab-layout-card">
                <div class="pab-card">
                  <div class="pab-card-content">
                    <h4 style="font-size: 1.1rem; font-weight: 700; margin-bottom: 10px; color: #546E7A;">
                      原宿美容室のブログ自動化＋SNS連携事例
                    </h4>
                    <div style="margin-bottom: 15px;">
                      <span style="background: #4CAF50; color: white; padding: 4px 8px; border-radius: 15px; font-size: 0.8rem; margin-right: 8px;">美容室</span>
                      <span style="background: #42A5F5; color: white; padding: 4px 8px; border-radius: 15px; font-size: 0.8rem;">東京都渋谷区</span>
                    </div>
                    <p style="color: #6c757d; margin-bottom: 15px; font-size: 0.95rem;">AI記事生成とSNS自動投稿で新規客獲得率40%向上</p>
                    
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin: 15px 0; font-size: 0.9rem;">
                      <div style="text-align: center; padding: 10px; background: #E8F5E9; border-radius: 6px;">
                        <strong style="color: #4CAF50; font-size: 1.2rem;">+40%</strong><br>
                        <span style="color: #666;">新規客獲得</span>
                      </div>
                      <div style="text-align: center; padding: 10px; background: #E8F5E9; border-radius: 6px;">
                        <strong style="color: #4CAF50; font-size: 1.2rem;">-70%</strong><br>
                        <span style="color: #666;">制作工数</span>
                      </div>
                    </div>
                    
                    <div style="margin: 15px 0;">
                      <span style="background: #FF7043; color: white; padding: 4px 8px; border-radius: 15px; font-size: 0.8rem; margin-right: 5px;">AI加筆</span>
                      <span style="background: #42A5F5; color: white; padding: 4px 8px; border-radius: 15px; font-size: 0.8rem;">SNS自動投稿</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="uk-alert-success uk-margin-top" uk-alert>
              <p><strong>工数削減:</strong> 資料作成時間を90%短縮</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- 機能詳細 -->
  <section class="uk-section uk-section-default">
    <div class="uk-container">
      <div class="uk-text-center uk-margin-large-bottom">
        <h2 class="uk-heading-medium uk-text-bold">
          <span uk-icon="icon: cog; ratio: 1.5" class="uk-margin-small-right"></span>
          主要機能
        </h2>
      </div>
      
      <div class="uk-grid-large uk-child-width-1-3@m" uk-grid>
        
        <div class="uk-text-center">
          <div class="uk-margin-bottom">
            <span uk-icon="icon: code; ratio: 2.5" class="uk-text-primary"></span>
          </div>
          <h3 class="uk-text-bold">ショートコード対応</h3>
          <p>
            <code>[future_case id="1" layout="full"]</code><br>
            任意の場所に簡単埋め込み。フル・カード表示で柔軟な表現。
          </p>
        </div>
        
        <div class="uk-text-center">
          <div class="uk-margin-bottom">
            <span uk-icon="icon: database; ratio: 2.5" class="uk-text-primary"></span>
          </div>
          <h3 class="uk-text-bold">6業種事例データ</h3>
          <p>
            飲食・美容・製造・不動産・歯科・EC<br>
            各業種に特化した成功事例を内蔵。
          </p>
        </div>
        
        <div class="uk-text-center">
          <div class="uk-margin-bottom">
            <span uk-icon="icon: bolt; ratio: 2.5" class="uk-text-primary"></span>
          </div>
          <h3 class="uk-text-bold">高速パフォーマンス</h3>
          <p>
            条件付きアセット読み込み。<br>
            必要な時だけ動作し、サイト速度に影響なし。
          </p>
        </div>
        
        <div class="uk-text-center">
          <div class="uk-margin-bottom">
            <span uk-icon="icon: paint-bucket; ratio: 2.5" class="uk-text-primary"></span>
          </div>
          <h3 class="uk-text-bold">UIKit3互換デザイン</h3>
          <p>
            美しいレスポンシブデザイン。<br>
            UIKitがなくても崩れない独立設計。
          </p>
        </div>
        
        <div class="uk-text-center">
          <div class="uk-margin-bottom">
            <span uk-icon="icon: search; ratio: 2.5" class="uk-text-primary"></span>
          </div>
          <h3 class="uk-text-bold">SEO最適化</h3>
          <p>
            Schema.org構造化データ対応。<br>
            検索エンジンにも最適化された表示。
          </p>
        </div>
        
        <div class="uk-text-center">
          <div class="uk-margin-bottom">
            <span uk-icon="icon: users; ratio: 2.5" class="uk-text-primary"></span>
          </div>
          <h3 class="uk-text-bold">営業効果測定</h3>
          <p>
            プレミアム版では効果レポート機能。<br>
            営業成果を数値で確認可能。
          </p>
        </div>

      </div>
    </div>
  </section>

  <!-- 料金プラン -->
  <section id="pricing" class="uk-section uk-section-muted">
    <div class="uk-container">
      <div class="uk-text-center uk-margin-large-bottom">
        <h2 class="uk-heading-medium uk-text-bold">
          <span uk-icon="icon: credit-card; ratio: 1.5" class="uk-margin-small-right"></span>
          料金プラン
        </h2>
        <p class="uk-text-lead">
          目的に応じて選べる3つのプラン
        </p>
      </div>
      
      <div class="uk-grid-large uk-child-width-1-3@m" uk-grid>
        
        <!-- 無料プラン -->
        <div>
          <div class="uk-card uk-card-default uk-card-body uk-text-center uk-border-rounded">
            <h3 class="uk-text-bold uk-margin-bottom">無料プラン</h3>
            <div class="uk-text-bold uk-text-large uk-margin-bottom">¥0<small>/月</small></div>
            <ul class="uk-list uk-list-divider uk-text-left">
              <li>✓ 基本事例表示（3件まで）</li>
              <li>✓ カードレイアウトのみ</li>
              <li>✓ 6業種サンプルデータ</li>
              <li>✓ 基本ショートコード</li>
              <li>✓ コミュニティサポート</li>
            </ul>
            <a href="#" class="uk-button uk-button-primary uk-button-small uk-width-1-1 uk-margin-top">
              無料で始める
            </a>
          </div>
        </div>

        <!-- プレミアムプラン -->
        <div>
          <div class="uk-card uk-card-primary uk-card-body uk-text-center uk-border-rounded uk-box-shadow-large">
            <div class="uk-label uk-label-warning uk-position-top-right uk-margin-small-top uk-margin-small-right">人気No.1</div>
            <h3 class="uk-text-bold uk-margin-bottom uk-text-white">プレミアムプラン</h3>
            <div class="uk-text-bold uk-text-large uk-margin-bottom uk-text-white">¥980<small>/月</small></div>
            <ul class="uk-list uk-list-divider uk-text-left uk-text-white">
              <li>✓ 無制限事例表示</li>
              <li>✓ フル・カードレイアウト対応</li>
              <li>✓ 事例データ無制限追加</li>
              <li>✓ カスタムフィールド対応</li>
              <li>✓ 営業効果レポート</li>
              <li>✓ 優先サポート</li>
            </ul>
            <a href="#" class="uk-button uk-button-primary uk-button-small uk-width-1-1 uk-margin-top">
              今すぐ購入
            </a>
          </div>
        </div>

        <!-- エンタープライズ -->
        <div>
          <div class="uk-card uk-card-default uk-card-body uk-text-center uk-border-rounded">
            <h3 class="uk-text-bold uk-margin-bottom">エンタープライズ</h3>
            <div class="uk-text-bold uk-text-large uk-margin-bottom">¥4,980<small>/月</small></div>
            <ul class="uk-list uk-list-divider uk-text-left">
              <li>✓ プレミアムの全機能</li>
              <li>✓ 複数サイト利用権</li>
              <li>✓ チーム管理機能</li>
              <li>✓ 営業分析ダッシュボード</li>
              <li>✓ API連携機能</li>
              <li>✓ 専任サポート</li>
            </ul>
            <a href="#" class="uk-button uk-button-primary uk-button-small uk-width-1-1 uk-margin-top">
              相談する
            </a>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- お客様の声 -->
  <section class="uk-section uk-section-default">
    <div class="uk-container">
      <div class="uk-text-center uk-margin-large-bottom">
        <h2 class="uk-heading-medium uk-text-bold">
          <span uk-icon="icon: star; ratio: 1.5" class="uk-margin-small-right"></span>
          お客様の声
        </h2>
      </div>
      
      <div class="uk-grid-large uk-child-width-1-2@m" uk-grid>
        
        <div>
          <div class="uk-card uk-card-default uk-card-body">
            <blockquote class="uk-blockquote">
              <p>営業の成約率が3倍になりました。事例を見せた瞬間、お客様の表情が変わるのが分かります。</p>
              <footer>田中 一郎様<br><cite>株式会社テックソリューション 営業部長</cite></footer>
            </blockquote>
          </div>
        </div>
        
        <div>
          <div class="uk-card uk-card-default uk-card-body">
            <blockquote class="uk-blockquote">
              <p>資料作成の時間が10分の1になりました。数値で効果を示せるので、お客様も納得して契約してくれます。</p>
              <footer>佐藤 美咲様<br><cite>デジタルマーケティング株式会社</cite></footer>
            </blockquote>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="uk-section uk-section-primary">
    <div class="uk-container">
      <div class="uk-text-center uk-text-white">
        <h2 class="uk-heading-medium uk-text-bold uk-margin-bottom">
          今すぐ営業成果を変革しませんか？
        </h2>
        <p class="uk-text-lead uk-margin-bottom">
          AI Boostで、あなたの営業プレゼンテーションを次のレベルへ
        </p>
        <div class="uk-margin-top">
          <a href="#pricing" class="uk-button uk-button-primary uk-button-small uk-margin-right" uk-scroll>
            <span uk-icon="icon: credit-card" class="uk-margin-small-right"></span>
            プランを選ぶ
          </a>
          <a href="/panolabo-ai-boost/sales-presentation.html" class="uk-button uk-button-primary uk-button-small">
            <span uk-icon="icon: download" class="uk-margin-small-right"></span>
            完全デモを見る
          </a>
        </div>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>