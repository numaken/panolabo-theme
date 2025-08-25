<?php
/**
 * Template Name: About Company
 * Description: 会社紹介・信頼性構築ページ
 */
get_header(); ?>

<main class="uk-section" style="color: #333 !important;">
  
  <!-- Hero Section: 会社概要 -->
  <section class="uk-section uk-background-cover uk-background-center-center uk-background-norepeat" style="background: linear-gradient(135deg, #316B3F 0%, #2E86AB 100%); color: white;">
    <div class="uk-container">
      <div class="uk-grid-large uk-child-width-1-2@m uk-flex-middle" uk-grid>
        <div uk-scrollspy="cls: uk-animation-slide-left-small; delay: 200;">
          <h1 class="uk-heading-primary uk-text-bold uk-margin-bottom">
            <span class="uk-text-emphasis">About Panolabo</span><br>
            <span class=" uk-text-large">小規模でも、AIを使えば会社規模を動かせる。</span>
          </h1>
          <p class="uk-text-lead uk-margin-bottom">
            <strong>AI・VR・アプリ・Web・OEM</strong>までを一貫して扱う<br>
            <span class="">クリエイティブラボ</span>として、<br>
            「1人で会社規模のプロジェクトを動かす」を体現しています。
          </p>
          <div class="uk-grid-small uk-child-width-auto uk-margin-top" uk-grid>
            <div><span class="uk-label  uk-text-bold">🏆 30年の実績</span></div>
            <div><span class="uk-label  uk-text-bold">🌟 大手100社超</span></div>
            <div><span class="uk-label  uk-text-bold">🚀 AI活用先駆者</span></div>
          </div>
        </div>
        <div class="uk-text-center" uk-scrollspy="cls: uk-animation-scale-up; delay: 400;">
          <img src="<?php bloginfo('template_directory'); ?>/images/logo_panolabo.png" 
               alt="Panolabo LLC" 
               style="max-width: 80%; height: auto;">
        </div>
      </div>
    </div>
  </section>

  <!-- 代表メッセージ -->
  <section class="uk-section " style="color: #333 !important;">
    <div class="uk-container">
      <div class="uk-text-center uk-margin-large-bottom" uk-scrollspy="cls: uk-animation-fade; delay: 200;">
        <h2 class="uk-heading-medium uk-text-bold ">
          <span uk-icon="icon: user; ratio: 2" class="uk-margin-small-right"></span>
          代表メッセージ
        </h2>
      </div>
      
      <div class="uk-grid-large uk-flex-middle" uk-grid>
        <div class="uk-width-1-1@s uk-width-2-3@m">
          <div class="uk-card uk-card-default uk-card-body uk-box-shadow-large" uk-scrollspy="cls: uk-animation-slide-left-small; delay: 300;">
            <p class="uk-text-lead uk-margin-bottom">
              Panolabo（合同会社panolabo）は、<strong>AI・VR・アプリ・Web・OEM</strong>までを一貫して扱う<span class="">クリエイティブラボ</span>です。<br>
              「小規模でも、AIを活用すれば1人で会社規模のプロジェクトを動かせる」──それを体現してきたのがPanolaboです。
            </p>
            
            <p class="uk-margin-bottom">
              代表の沼は、<strong>Web黎明期から30年</strong>、広告業界の国内最大手や外資系エージェンシー（<span class="">ADK、JWT</span>など）のパートナーとして、<br>
              <strong>NTTドコモやLVMH</strong>を含む<span class="">100社超のプロジェクト</span>に携わってきました。
            </p>
            
            <p>
              ブランディングからマーケティング、Web制作、システム開発、運用まで幅広く経験し、<strong>「課題解決と仕組みづくり」</strong>を軸に実績を積み重ねています。
            </p>
            
            <!-- 実績バッジ -->
            <div class="uk-grid-small uk-child-width-auto uk-flex-left uk-margin-top" uk-grid>
              <div><span class="uk-label ">ADK</span></div>
              <div><span class="uk-label ">JWT</span></div>
              <div><span class="uk-label ">NTTドコモ</span></div>
              <div><span class="uk-label ">LVMH</span></div>
              <div><span class="uk-label ">100社超</span></div>
            </div>
          </div>
        </div>
        
        <div class="uk-width-1-1@s uk-width-1-3@m uk-text-center">
          <div uk-scrollspy="cls: uk-animation-scale-up; delay: 500;">
            <div class="uk-card  uk-card-body uk-text-center">
              <h3 class="uk-card-title">30年の実績</h3>
              <div class="uk-grid-small uk-child-width-1-1" uk-grid>
                <div><span class="uk-text-large uk-text-bold">🏆</span><br><span class="uk-text-small">Web黎明期から</span></div>
                <div><span class="uk-text-large uk-text-bold">🌟</span><br><span class="uk-text-small">大手エージェンシー</span></div>
                <div><span class="uk-text-large uk-text-bold">🚀</span><br><span class="uk-text-small">課題解決重視</span></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Panolaboの特徴 -->
  <section class="uk-section " style="color: #333 !important;">
    <div class="uk-container">
      <div class="uk-text-center uk-margin-large-bottom">
        <h2 class="uk-heading-medium uk-text-bold ">
          <span uk-icon="icon: star; ratio: 2" class="uk-margin-small-right"></span>
          Panolaboの特徴
        </h2>
      </div>
      
      <div class="uk-grid-large uk-child-width-1-3@m" uk-grid uk-scrollspy="target: > div; cls: uk-animation-slide-bottom-small; delay: 300;">
        <div>
          <div class="uk-card uk-card-default uk-card-body uk-box-shadow-medium uk-border-rounded uk-height-1-1">
            <div class="uk-text-center uk-margin-bottom">
              <span uk-icon="icon: user; ratio: 2" class=""></span>
            </div>
            <h3 class="uk-text-bold uk-text-center uk-margin-bottom">1人総合制作代理店</h3>
            <p class="uk-text-center">
              <strong>営業・企画・開発・運用</strong>まで、すべて1人で完結。<br>
              だから<span class="">速く、柔軟で、実行力</span>があります。
            </p>
          </div>
        </div>
        <div>
          <div class="uk-card uk-card-default uk-card-body uk-box-shadow-medium uk-border-rounded uk-height-1-1">
            <div class="uk-text-center uk-margin-bottom">
              <span uk-icon="icon: bolt; ratio: 2" class=""></span>
            </div>
            <h3 class="uk-text-bold uk-text-center uk-margin-bottom">AI活用でストック型ビジネスへ</h3>
            <p class="uk-text-center">
              「作って終わり」ではなく、<strong>AIを組み込んだ仕組み</strong>で<br>
              <span class="">継続収益を生み出す設計</span>を提供します。
            </p>
          </div>
        </div>
        <div>
          <div class="uk-card uk-card-default uk-card-body uk-box-shadow-medium uk-border-rounded uk-height-1-1">
            <div class="uk-text-center uk-margin-bottom">
              <span uk-icon="icon: future; ratio: 2" class=""></span>
            </div>
            <h3 class="uk-text-bold uk-text-center uk-margin-bottom">大手経験＋小規模機動力</h3>
            <p class="uk-text-center">
              <strong>大手案件で培った戦略思考</strong>と、<br>
              小規模ならではの<span class="">スピード感</span>を両立。<br>
              1人だからこそ、余計な部署調整なくプロジェクトを進められます。
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 事業領域 -->
  <section class="uk-section " style="color: #333 !important;">
    <div class="uk-container">
      <div class="uk-text-center uk-margin-large-bottom">
        <h2 class="uk-heading-medium uk-text-bold ">
          <span uk-icon="icon: cog; ratio: 2" class="uk-margin-small-right"></span>
          事業領域
        </h2>
      </div>
      
      <div class="uk-grid-large uk-child-width-1-2@m uk-child-width-1-1@s" uk-grid uk-scrollspy="target: > div; cls: uk-animation-slide-bottom-small; delay: 300;">
        
        <!-- VR制作 -->
        <div>
          <div class="uk-card uk-card-default uk-card-body uk-box-shadow-medium uk-border-rounded">
            <div class="uk-flex uk-flex-middle uk-margin-bottom">
              <span uk-icon="icon: camera; ratio: 2" class=" uk-margin-small-right"></span>
              <h3 class="uk-text-bold uk-margin-remove">VR制作</h3>
            </div>
            <p><strong>360°パノラマ</strong>で空間体験を可視化</p>
          </div>
        </div>
        
        <!-- スマホアプリ -->
        <div>
          <div class="uk-card uk-card-default uk-card-body uk-box-shadow-medium uk-border-rounded">
            <div class="uk-flex uk-flex-middle uk-margin-bottom">
              <span uk-icon="icon: tablet; ratio: 2" class=" uk-margin-small-right"></span>
              <h3 class="uk-text-bold uk-margin-remove">スマホアプリ</h3>
            </div>
            <p><strong>プッシュ通知・予約・クーポン</strong>等を搭載</p>
          </div>
        </div>
        
        <!-- Web制作 -->
        <div>
          <div class="uk-card uk-card-default uk-card-body uk-box-shadow-medium uk-border-rounded">
            <div class="uk-flex uk-flex-middle uk-margin-bottom">
              <span uk-icon="icon: world; ratio: 2" class=" uk-margin-small-right"></span>
              <h3 class="uk-text-bold uk-margin-remove">Web制作</h3>
            </div>
            <p><strong>WordPress＋SEO</strong>で成果重視のサイト構築</p>
          </div>
        </div>
        
        <!-- 自社SaaS & プラグイン -->
        <div>
          <div class="uk-card  uk-card-body uk-box-shadow-medium uk-border-rounded">
            <div class="uk-flex uk-flex-middle uk-margin-bottom">
              <span uk-icon="icon: bolt; ratio: 2" class="uk-margin-small-right"></span>
              <h3 class="uk-text-bold uk-margin-remove ">自社SaaS & プラグイン</h3>
            </div>
            <div class="">
              <p class="uk-margin-small">AI活用により生産性が飛躍的に向上した結果、</p>
              <ul class="uk-list uk-list-bullet uk-text-small">
                <li><strong>AIを絡めたSaaSサービス</strong>（例：AiPostPilot Pro＝SNS自動化、Chat2Doc＝会話ドキュメント化）</li>
                <li><strong>WordPressプラグイン</strong>（依然としてWebの本流であり、今も継続的に新規開発中）</li>
              </ul>
              <p class="uk-text-small">を次々と生産しています。</p>
            </div>
          </div>
        </div>
        
      </div>
      
      <!-- OEM・共同プロジェクト -->
      <div class="uk-text-center uk-margin-large-top">
        <div class="uk-card  uk-card-body uk-box-shadow-large uk-width-3-4@m uk-margin-auto" uk-scrollspy="cls: uk-animation-fade; delay: 500;">
          <div class="uk-flex uk-flex-center uk-flex-middle uk-margin-bottom">
            <span uk-icon="icon: users; ratio: 2" class=" uk-margin-small-right"></span>
            <h3 class="uk-text-bold uk-margin-remove ">OEM・共同プロジェクト</h3>
          </div>
          <p class=""><strong>テンプレートや仕組み</strong>をホワイトラベル供給</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Panolaboの約束 -->
  <section class="uk-section  ">
    <div class="uk-container">
      <div class="uk-text-center uk-margin-large-bottom">
        <h2 class="uk-heading-medium uk-text-bold">
          <span uk-icon="icon: heart; ratio: 2" class="uk-margin-small-right"></span>
          Panolaboの約束
        </h2>
      </div>
      
      <div class="uk-grid-large uk-child-width-1-3@m uk-text-center" uk-grid uk-scrollspy="target: > div; cls: uk-animation-slide-bottom-small; delay: 300;">
        <div>
          <div class="uk-card uk-card-default uk-card-body uk-box-shadow-medium uk-border-rounded">
            <span uk-icon="icon: check; ratio: 2" class=" uk-margin-bottom"></span>
            <p class="uk-text-bold ">「小規模でも大手水準の成果」を提供します。</p>
          </div>
        </div>
        
        <div>
          <div class="uk-card uk-card-default uk-card-body uk-box-shadow-medium uk-border-rounded">
            <span uk-icon="icon: refresh; ratio: 2" class=" uk-margin-bottom"></span>
            <p class="uk-text-bold ">「作って終わりではなく、仕組みで成果を持続」させます。</p>
          </div>
        </div>
        
        <div>
          <div class="uk-card uk-card-default uk-card-body uk-box-shadow-medium uk-border-rounded">
            <span uk-icon="icon: bolt; ratio: 2" class=" uk-margin-bottom"></span>
            <p class="uk-text-bold ">「1人だからできる柔軟性とスピード感」を活かします。</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 会社概要・代表者情報 -->
  <section class="uk-section " style="color: #333 !important;">
    <div class="uk-container">
      <div class="uk-grid-large uk-child-width-1-2@m uk-flex-middle" uk-grid>
        
        <!-- 会社概要 -->
        <div uk-scrollspy="cls: uk-animation-slide-left-small; delay: 200;">
          <h2 class="uk-heading-small uk-text-bold  uk-margin-bottom">
            <span uk-icon="icon: home" class="uk-margin-small-right"></span>
            会社概要
          </h2>
          
          <table class="uk-table uk-table-striped uk-table-responsive">
            <tbody>
              <tr>
                <td class="uk-text-bold uk-width-small">会社名</td>
                <td>合同会社 panolabo（パノラボ）</td>
              </tr>
              <tr>
                <td class="uk-text-bold">設立</td>
                <td>2015年4月</td>
              </tr>
              <tr>
                <td class="uk-text-bold">所在地</td>
                <td>愛知県一宮市三条</td>
              </tr>
              <tr>
                <td class="uk-text-bold">事業内容</td>
                <td>
                  • VR/360°コンテンツ制作<br>
                  • スマートフォンアプリ開発<br>
                  • Webサイト制作・システム開発<br>
                  • AI技術統合ソリューション<br>
                  • WordPress プラグイン開発・販売
                </td>
              </tr>
              <tr>
                <td class="uk-text-bold">主要取引先</td>
                <td>
                  飲食店・美容室・不動産・医療機関・<br>
                  製造業・小売業・サービス業など
                </td>
              </tr>
              <tr>
                <td class="uk-text-bold">累計実績</td>
                <td><strong>300案件以上</strong>（2024年現在）</td>
              </tr>
            </tbody>
          </table>
        </div>

        <!-- 代表者情報 -->
        <div uk-scrollspy="cls: uk-animation-slide-right-small; delay: 400;">
          <h2 class="uk-heading-small uk-text-bold  uk-margin-bottom">
            <span uk-icon="icon: user" class="uk-margin-small-right"></span>
            代表者プロフィール
          </h2>
          
          <div class="uk-card uk-card-default uk-card-body uk-box-shadow-medium uk-border-rounded">
            <div class="uk-grid-small uk-flex-middle" uk-grid>
              <div class="uk-width-auto">
                <div class="uk-border-circle  uk-flex uk-flex-center uk-flex-middle" 
                     style="width: 80px; height: 80px; color: white; font-size: 32px; font-weight: bold;">
                     P
                </div>
              </div>
              <div class="uk-width-expand">
                <h3 class="uk-text-bold uk-margin-remove">代表社員</h3>
                <p class="uk-text-meta uk-margin-small">システムエンジニア / AI技術統合スペシャリスト</p>
              </div>
            </div>
            
            <div class="uk-margin-top">
              <h4 class="uk-text-bold uk-text-small uk-margin-small-bottom">主な経歴・実績</h4>
              <ul class="uk-list uk-list-bullet uk-text-small">
                <li><strong>2015年</strong> 合同会社panolabo設立</li>
                <li><strong>VR技術</strong> 360°撮影・制作実績 100案件以上</li>
                <li><strong>アプリ開発</strong> iOS/Android 実績 80案件以上</li>
                <li><strong>Web制作</strong> WordPress・カスタム開発 120案件以上</li>
                <li><strong>AI統合</strong> 機械学習・データ分析による業務改善支援</li>
                <li><strong>プラグイン開発</strong> WordPress製品群の設計・開発</li>
              </ul>
            </div>

            <div class="uk-margin-top">
              <h4 class="uk-text-bold uk-text-small uk-margin-small-bottom">技術スタック</h4>
              <div class="uk-grid-small uk-child-width-auto uk-flex-left" uk-grid>
                <div><span class="uk-label ">PHP</span></div>
                <div><span class="uk-label ">WordPress</span></div>
                <div><span class="uk-label ">JavaScript</span></div>
                <div><span class="uk-label ">Python</span></div>
                <div><span class="uk-label ">Swift</span></div>
                <div><span class="uk-label ">Kotlin</span></div>
                <div><span class="uk-label ">TensorFlow</span></div>
                <div><span class="uk-label ">OpenAI API</span></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 事業の変遷・成長 -->
  <section class="uk-section " style="color: #333 !important;">
    <div class="uk-container">
      <div class="uk-text-center uk-margin-large-bottom" uk-scrollspy="cls: uk-animation-fade; delay: 200;">
        <h2 class="uk-heading-medium uk-text-bold ">
          <span uk-icon="icon: trending-up; ratio: 2" class="uk-margin-small-right"></span>
          事業の変遷と成長
        </h2>
        <p class="uk-text-lead">
          単発制作からパートナーシップ型へ、さらにAI統合による次世代サービスへ
        </p>
      </div>

      <div class="uk-position-relative">
        <div class="uk-grid-large uk-child-width-1-4@m" uk-grid uk-scrollspy="target: > div; cls: uk-animation-slide-bottom-small; delay: 300;">
          
          <!-- 2015-2017: 創業期 -->
          <div>
            <div class="uk-card  uk-card-body uk-text-center uk-border-rounded">
              <h3 class="uk-text-bold uk-margin-small-bottom">2015-2017</h3>
              <h4 class="uk-text-bold uk-margin-small-bottom">創業・基盤構築期</h4>
              <div class="uk-margin-bottom">
                <span uk-icon="icon: bolt; ratio: 2"></span>
              </div>
              <ul class="uk-list uk-text-small uk-text-left">
                <li>• VR/360°制作サービス開始</li>
                <li>• Web制作業務確立</li>
                <li>• 初期顧客基盤構築</li>
                <li>• 技術ノウハウ蓄積</li>
              </ul>
              <div class="uk-margin-top">
                <span class="uk-label ">実績: 50案件</span>
              </div>
            </div>
          </div>

          <!-- 2018-2020: 拡大期 -->
          <div>
            <div class="uk-card  uk-card-body uk-text-center uk-border-rounded">
              <h3 class="uk-text-bold uk-margin-small-bottom">2018-2020</h3>
              <h4 class="uk-text-bold uk-margin-small-bottom">サービス拡大期</h4>
              <div class="uk-margin-bottom">
                <span uk-icon="icon: expand; ratio: 2"></span>
              </div>
              <ul class="uk-list uk-text-small uk-text-left">
                <li>• アプリ開発サービス本格化</li>
                <li>• 多業種での実績拡大</li>
                <li>• リピート率向上</li>
                <li>• 品質管理体制確立</li>
              </ul>
              <div class="uk-margin-top">
                <span class="uk-label ">実績: 150案件</span>
              </div>
            </div>
          </div>

          <!-- 2021-2023: 成熟期 -->
          <div>
            <div class="uk-card uk-card-default uk-card-body uk-text-center uk-border-rounded">
              <h3 class="uk-text-bold uk-margin-small-bottom">2021-2023</h3>
              <h4 class="uk-text-bold uk-margin-small-bottom">安定成長期</h4>
              <div class="uk-margin-bottom">
                <span uk-icon="icon: check; ratio: 2"></span>
              </div>
              <ul class="uk-list uk-text-small uk-text-left">
                <li>• 高品質サービスの安定提供</li>
                <li>• WordPress製品開発開始</li>
                <li>• 長期契約顧客増加</li>
                <li>• 運用・保守体制強化</li>
              </ul>
              <div class="uk-margin-top">
                <span class="uk-label ">実績: 250案件</span>
              </div>
            </div>
          </div>

          <!-- 2024-: 変革期 -->
          <div>
            <div class="uk-card uk-card-success uk-card-body uk-text-center uk-border-rounded">
              <h3 class="uk-text-bold uk-margin-small-bottom">2024-</h3>
              <h4 class="uk-text-bold uk-margin-small-bottom">AI統合・変革期</h4>
              <div class="uk-margin-bottom">
                <span uk-icon="icon: future; ratio: 2"></span>
              </div>
              <ul class="uk-list uk-text-small uk-text-left">
                <li>• AI技術統合サービス開始</li>
                <li>• ストックビジネス化支援</li>
                <li>• パートナーシップ強化</li>
                <li>• 次世代ソリューション提供</li>
              </ul>
              <div class="uk-margin-top">
                <span class="uk-label ">実績: 300案件+</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 選ばれる理由 -->
  <section class="uk-section " style="background: linear-gradient(135deg, #316B3F 0%, #2E86AB 100%); color: white;">
    <div class="uk-container">
      <div class="uk-text-center uk-margin-large-bottom" uk-scrollspy="cls: uk-animation-fade; delay: 200;">
        <h2 class="uk-heading-medium uk-text-bold">
          <span uk-icon="icon: star; ratio: 2" class="uk-margin-small-right"></span>
          panolaboが選ばれる理由
        </h2>
        <p class="uk-text-lead">
          300案件以上の実績が証明する、信頼できるパートナーシップ
        </p>
      </div>

      <div class="uk-grid-large uk-child-width-1-3@m" uk-grid uk-scrollspy="target: > div; cls: uk-animation-slide-up-small; delay: 300;">
        
        <div>
          <div class="uk-text-center uk-margin-bottom">
            <span uk-icon="icon: cog; ratio: 2" class=""></span>
          </div>
          <h3 class="uk-text-bold uk-text-center uk-margin-bottom">技術力 × 実績</h3>
          <p class="uk-text-center">
            <strong>9年間で300案件以上</strong>の豊富な制作実績。<br>
            VR・アプリ・Web全領域での確実な技術力と、
            AI統合による次世代対応力を保有
          </p>
        </div>

        <div>
          <div class="uk-text-center uk-margin-bottom">
            <span uk-icon="icon: users; ratio: 2" class=""></span>
          </div>
          <h3 class="uk-text-bold uk-text-center uk-margin-bottom">パートナーシップ思考</h3>
          <p class="uk-text-center">
            「作って終わり」ではなく<strong>「共に成長」</strong>。<br>
            クライアントの成功が我々の成功という
            Win-Winの関係性を重視
          </p>
        </div>

        <div>
          <div class="uk-text-center uk-margin-bottom">
            <span uk-icon="icon: future; ratio: 2" class=""></span>
          </div>
          <h3 class="uk-text-bold uk-text-center uk-margin-bottom">継続改善・進化</h3>
          <p class="uk-text-center">
            最新のAI技術を既存サービスに統合し、<br>
            <strong>データドリブンな継続改善</strong>で
            長期的な価値創出をサポート
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- お問い合わせ CTA -->
  <section class="uk-section " style="color: #333 !important;">
    <div class="uk-container">
      <div class="uk-text-center" uk-scrollspy="cls: uk-animation-scale-up; delay: 200;">
        <h2 class="uk-heading-small uk-text-bold  uk-margin-bottom">
          まずはお気軽にご相談ください
        </h2>
        <p class="uk-text-lead uk-margin-bottom">
          あなたのビジネスに最適なソリューションを、一緒に考えさせていただきます
        </p>
        
        <div class="uk-button-group uk-flex-center uk-margin-top">
          <a href="<?php echo esc_url(home_url('/contact/')); ?>" 
             class="uk-button uk-button-primary uk-button-small">
            <span uk-icon="icon: mail"></span> お問い合わせ
          </a>
          <a href="<?php echo esc_url(home_url('/services')); ?>" 
             class="uk-button uk-button-primary uk-button-small">
            <span uk-icon="icon: thumbnails"></span> サービス詳細
          </a>
        </div>

        <div class="uk-margin-large-top">
          <div class="uk-grid-small uk-child-width-auto uk-flex-center" uk-grid>
            <div><span class="uk-label ">初回相談無料</span></div>
            <div><span class="uk-label ">オンライン対応可</span></div>
            <div><span class="uk-label ">秘密保持契約対応</span></div>
          </div>
        </div>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>
