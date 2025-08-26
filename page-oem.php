<?php
/**
 * Template Name: OEM パートナー募集（最適化・二本立てプラン対応）
 * Description: 代理店向けLP（スタンダード月額/バイアウト参加費）＋簡易＆時系列シミュレーター
 */
get_header();
?>

<main class="uk-section">

  <!-- ================================
       HERO
  =================================== -->
  <section class="uk-section uk-section-primary uk-light uk-text-center" style="background: linear-gradient(135deg, #316B3F 0%, #2E86AB 100%);">
    <div class="uk-container">
      <h1 class="uk-heading-large uk-margin-bottom">
        代理店は「売るだけ」。<br class="uk-visible@s">
        <span class="uk-text-warning">開発ゼロで新収益</span>
      </h1>

      <p class="uk-text-lead uk-margin">
        <strong>Panolaboは、AI・VR・アプリ・Web制作を OEMモデル で提供します。</strong><br class="uk-visible@s">
        代理店は自社ブランドで販売でき、開発リスクなしで新しい収益源を作れます。
      </p>
      <p class="uk-text-default uk-margin-remove">
        <strong>参加形態は2つ：</strong> スタンダード（<u>月額5万円</u>） / バイアウト（<u>参加費30万円＋月額0円</u>）
      </p>

      <div class="uk-margin-top">
        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="uk-button uk-button-secondary uk-button-large">
          パートナー相談する
        </a>
      </div>
    </div>
  </section>

  <!-- ================================
       料金プラン（比較）
  =================================== -->
  <section class="uk-section uk-section-default">
    <div class="uk-container">
      <h2 class="uk-heading-line uk-text-center"><span>選べる2つの参加形態</span></h2>

      <div class="uk-child-width-1-2@m" uk-grid>
        <!-- スタンダード -->
        <div>
          <div class="uk-card uk-card-default uk-card-body uk-height-1-1">
            <h3 class="uk-card-title uk-text-primary uk-text-bold">スタンダード</h3>
            <p class="uk-text-large uk-margin-small">月額 <strong>¥50,000</strong>（システム使用料）</p>
            <ul class="uk-list uk-list-bullet">
              <li>参加費なし、すぐ始めやすい</li>
              <li>損益分岐の目安：<strong>約5店舗</strong>（例：月額管理費¥15,000、panolabo管理¥5,000 → 1店あたり差益¥10,000）</li>
              <li>拡販・裾野拡大に最適</li>
            </ul>
            <p class="uk-text-meta uk-margin-small">※ panolabo制作費（初期/件）＝¥100,000、panolabo月額管理費（1件/月）＝¥5,000 は共通。</p>
          </div>
        </div>

        <!-- バイアウト -->
        <div>
          <div class="uk-card uk-card-primary uk-card-body uk-light uk-height-1-1">
            <h3 class="uk-card-title uk-text-bold">バイアウト</h3>
            <p class="uk-text-large uk-margin-small">参加費 <strong>¥300,000</strong> ＋ <strong>月額0円</strong></p>
            <ul class="uk-list uk-list-bullet">
              <li>月次固定費ゼロ。積み上げが早い</li>
              <li>参加費は<strong>初期差益×約3件</strong>で回収目安（例：初期販売¥200,000 − 制作¥100,000＝差益¥100,000）</li>
              <li>既に顧客基盤がある代理店向け</li>
            </ul>
            <p class="uk-text-meta uk-margin-small">※ 参加費は初回のみ。制作費・月額管理費はスタンダードと同額。</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================================
       三者Win-Win
  =================================== -->
  <section class="uk-section uk-section-default">
    <div class="uk-container">
      <h2 class="uk-heading-line uk-text-center"><span>三者Win-Winの利益構造</span></h2>

      <div class="uk-grid-large uk-child-width-1-3@m" uk-grid>
        <div>
          <div class="uk-card uk-card-primary uk-card-body uk-text-center uk-light">
            <span uk-icon="icon: cog; ratio: 3" class="uk-margin-bottom"></span>
            <h3 class="uk-card-title">Panolabo（技術提供）</h3>
            <ul class="uk-list uk-text-left">
              <li><strong>役割：</strong>AI・VR・アプリ・Web制作</li>
              <li><strong>収益：</strong>制作費＋パートナーフィー</li>
              <li><strong>メリット：</strong>営業工数削減で制作に集中</li>
            </ul>
          </div>
        </div>
        <div>
          <div class="uk-card uk-card-secondary uk-card-body uk-text-center uk-light">
            <span uk-icon="icon: users; ratio: 3" class="uk-margin-bottom"></span>
            <h3 class="uk-card-title">代理店・営業パートナー</h3>
            <ul class="uk-list uk-text-left">
              <li><strong>役割：</strong>営業・販売・顧客サポート</li>
              <li><strong>収益：</strong>販売価格の差額（自由設定）＋月次管理利益</li>
              <li><strong>メリット：</strong>開発リスクゼロで新事業開始</li>
            </ul>
          </div>
        </div>
        <div>
          <div class="uk-card uk-card-default uk-card-body uk-text-center">
            <span uk-icon="icon: heart; ratio: 3" class="uk-text-primary uk-margin-bottom"></span>
            <h3 class="uk-card-title">店舗・企業クライアント</h3>
            <ul class="uk-list uk-text-left">
              <li><strong>導入：</strong>AI集客ツール・アプリ・Web・VR</li>
              <li><strong>効果：</strong>集客力向上、運営効率化</li>
              <li><strong>メリット：</strong>短納期・低コスト・高品質</li>
            </ul>
          </div>
        </div>
      </div>

      <div class="uk-text-center uk-margin-large-top">
        <div class="uk-alert-success" uk-alert>
          <p><span uk-icon="check" class="uk-margin-small-right"></span><strong>価格設定は完全自由</strong><br>
          Panolaboへの支払いは固定単価。<u>差額と月次管理費</u>がパートナーの利益になります。</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ================================
       ターゲット
  =================================== -->
  <section class="uk-section uk-section-muted">
    <div class="uk-container">
      <h2 class="uk-heading-line uk-text-center"><span>こんな方・企業に最適</span></h2>

      <div class="uk-grid-match uk-child-width-1-2@m" uk-grid>
        <div>
          <div class="uk-card uk-card-default uk-card-body">
            <h3 class="uk-card-title uk-text-primary">パートナー候補</h3>
            <ul class="uk-list uk-list-bullet">
              <li><strong>営業力のある代理店：</strong>技術は外注、販売に集中</li>
              <li><strong>既存顧客を持つ企業：</strong>アップセル・クロスセル</li>
              <li><strong>地域密着：</strong>地場の中小企業支援に強い</li>
              <li><strong>個人/小規模：</strong>扱いやすい高付加価値商材を探している</li>
            </ul>
          </div>
        </div>
        <div>
          <div class="uk-card uk-card-default uk-card-body">
            <h3 class="uk-card-title uk-text-primary">エンドクライアント例</h3>
            <ul class="uk-list uk-list-bullet">
              <li>飲食店：予約アプリ＋Web＋VRメニュー</li>
              <li>美容：予約/カルテアプリ＋Instagram連携</li>
              <li>不動産：物件VRツアー＋顧客管理アプリ</li>
              <li>教育：キャンパスVR＋学習アプリ</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="uk-section uk-section-default">
    <div class="uk-container">
      <h2 class="uk-heading-line uk-text-center"><span>価格と利益のカンタン目安</span></h2>

      <!-- 固定仕入（ロック表示） -->
      <div class="uk-grid-small uk-child-width-1-3@m uk-margin" uk-grid>
        <div class="uk-text-center">
          <div class="uk-text-meta">panolabo制作費（初期／1件）</div>
          <div class="uk-heading-bullet"><span uk-icon="lock"></span> <strong>¥100,000</strong></div>
        </div>
        <div class="uk-text-center">
          <div class="uk-text-meta">panolabo月額管理費（1件／月）</div>
          <div class="uk-heading-bullet"><span uk-icon="lock"></span> <strong>¥5,000</strong></div>
        </div>
        <div class="uk-text-center">
          <div class="uk-text-meta">月額固定（スタンダード）</div>
          <div class="uk-heading-bullet"><span uk-icon="lock"></span> <strong>¥50,000</strong> <span class="uk-text-meta">（バイアウトは¥0）</span></div>
        </div>
      </div>

      <div class="uk-overflow-auto">
        <table class="uk-table uk-table-striped uk-table-hover uk-text-small">
          <thead>
            <tr>
              <th>サービス</th>
              <th>あなたの初期販売（例）</th>
              <th>仕入：panolabo制作費</th>
              <th>初期差益（例）</th>
              <th>あなたの月額（例）</th>
              <th>仕入：panolabo月額管理費</th>
              <th>月次差益（例）</th>
              <th>補足</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><strong>アプリ（Web同梱0円）</strong></td>
              <td>¥200,000</td>
              <td>¥100,000</td>
              <td class="uk-text-success">¥100,000</td>
              <td>¥15,000/月</td>
              <td>¥5,000/月</td>
              <td class="uk-text-success">¥10,000/月</td>
              <td class="uk-text-meta">Webはアプリ契約に同梱0円</td>
              <td>
                <button class="uk-button uk-button-default uk-button-small js-apply-sim"
                  data-init="200000" data-mrr="15000">この条件で試算</button>
              </td>
            </tr>
            <tr>
              <td><strong>フルパッケージ（アプリ＋Web＋VR）</strong></td>
              <td>¥350,000</td>
              <td>¥100,000 + VR撮影（例）¥80,000</td>
              <td class="uk-text-success">¥170,000 <span class="uk-text-meta">（例）</span></td>
              <td>¥18,000/月</td>
              <td>¥5,000/月</td>
              <td class="uk-text-success">¥13,000/月</td>
              <td class="uk-text-meta">VR撮影は現地条件で変動</td>
              <td>
                <button class="uk-button uk-button-default uk-button-small js-apply-sim"
                  data-init="350000" data-mrr="18000">この条件で試算</button>
              </td>
            </tr>
            <tr>
              <td><strong>VR（単体オプション）</strong></td>
              <td>¥200,000</td>
              <td>VR撮影（例）¥80,000</td>
              <td class="uk-text-success">¥120,000 <span class="uk-text-meta">（例）</span></td>
              <td>—</td>
              <td>—</td>
              <td>—</td>
              <td class="uk-text-meta">月額は通常なし／都度案件</td>
              <td>
                <button class="uk-button uk-button-default uk-button-small js-apply-sim"
                  data-init="200000" data-mrr="0">この条件で試算</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="uk-alert-primary uk-margin-top uk-alert" uk-alert>
        <h4 class="uk-alert-title">"同梱0円"で始めやすい</h4>
        <p>アプリ契約時は<strong>Web同梱0円</strong>で初期差益を確保。月額は<strong>あなたの設定 − ¥5,000</strong>が1店舗あたりの差益になります。VRは撮影実費が発生するため、別途見積となります。</p>
        <p class="uk-margin-remove"><a href="#simple-sim" class="uk-button uk-button-primary uk-button-small">シミュレーターで確認する</a></p>
      </div>
    </div>
  </section>

  <script>
  // 「この条件で試算」→ 超シンプル試算の入力へ反映
  document.addEventListener('click', function(e){
    const btn = e.target.closest('.js-apply-sim');
    if(!btn) return;
    const init = parseInt(btn.dataset.init || '0', 10);
    const mrr  = parseInt(btn.dataset.mrr  || '0', 10);
    const initInput = document.getElementById('s_init');
    const mrrInput  = document.getElementById('s_mrr');
    if(initInput && mrrInput){
      initInput.value = init;
      mrrInput.value  = mrr;
      // スクロールして即計算
      const target = document.querySelector('#simple-sim') || document.body;
      if(window.SIMPLE && typeof window.SIMPLE.calc==='function'){ window.SIMPLE.calc(); }
      target.scrollIntoView({behavior:'smooth'});
    }
  });
  </script>

  <!-- ================================
       超シンプル試算（直感表示版）
  ================================ -->
  <section id="simple-sim" class="uk-section uk-section-default">
    <div class="uk-container">

      <h2 class="uk-heading-medium uk-text-primary uk-text-bold uk-text-center">何件売ったら、いくら儲かる？</h2>

      <div class="uk-card uk-card-default uk-card-body uk-margin">
        <!-- プラン切替 -->
        <div class="uk-margin-small">
          <label class="uk-margin-small-right">
            <input class="uk-radio" type="radio" name="s_plan" value="standard" checked onchange="SIMPLE.calc()"> スタンダード（月額¥50,000）
          </label>
          <label class="uk-margin-small-left">
            <input class="uk-radio" type="radio" name="s_plan" value="buyout" onchange="SIMPLE.calc()"> バイアウト（参加費¥300,000／月額0）
          </label>
          <label class="uk-margin-small-left uk-text-meta" id="s_join_wrap" style="display:none;">
            <input class="uk-checkbox" type="checkbox" id="s_join_now" checked onchange="SIMPLE.calc()"> 今月 参加費¥300,000を計上（初回のみ）
          </label>
        </div>

        <!-- 入力 -->
        <div class="uk-grid-small uk-child-width-1-4@m uk-child-width-1-2@s" uk-grid>
          <div>
            <label class="uk-form-label">あなたが販売したい販売金額（初期）</label>
            <input id="s_init" class="uk-input" type="number" value="200000" step="1000" min="0">
          </div>
          <div>
            <label class="uk-form-label">あなたが設定したい月額管理費</label>
            <input id="s_mrr" class="uk-input" type="number" value="15000" step="500" min="0">
          </div>
          <div>
            <label class="uk-form-label">今月 売る件数</label>
            <input id="s_deals" class="uk-input" type="number" value="3" step="1" min="0">
          </div>
          <div>
            <label class="uk-form-label">現在の稼働件数（継続中）</label>
            <input id="s_active" class="uk-input" type="number" value="0" step="1" min="0">
          </div>
        </div>

        <div class="uk-margin uk-text-center">
          <button class="uk-button uk-button-primary uk-button-large" onclick="SIMPLE.calc()">一発計算</button>
        </div>
        <div id="s_warn" class="uk-margin-small"></div>
      </div>

      <!-- 出力：大きい数字＋わかりやすい内訳チップ -->
      <div class="uk-grid-large uk-child-width-1-3@m" uk-grid id="s_out" style="opacity:0;">

        <!-- (1) 今月のキャッシュ -->
        <div>
          <div class="uk-card uk-card-default uk-card-body uk-text-center">
            <div class="uk-text-meta" id="s_now_title">今月の利益</div>
            <div class="uk-heading-medium uk-margin-small" id="s_now_profit">¥0</div>
            <div class="uk-margin-small-top uk-text-left uk-flex uk-flex-center uk-flex-wrap" id="s_breakdown" style="gap:6px;">
              <!-- ここにチップをJSで追加 -->
            </div>
          </div>
        </div>

        <!-- (2) 今回の販売で増える "毎月の積み上げ" -->
        <div>
          <div class="uk-card uk-card-default uk-card-body uk-text-center">
            <div class="uk-text-meta">今回の販売で増える "毎月の積み上げ"</div>
            <div class="uk-heading-medium uk-margin-small uk-text-success" id="s_delta_mrr">+¥0/月</div>
            <div class="uk-text-meta">（<span id="s_unit_mrr">¥0</span> × 新規 <span id="s_deals_disp">0</span>件）</div>
          </div>
        </div>

        <!-- (3) 来月以降の "毎月の見込み" -->
        <div>
          <div class="uk-card uk-card-default uk-card-body uk-text-center">
            <div class="uk-text-meta">来月以降の "毎月の見込み"</div>
            <div class="uk-heading-medium uk-margin-small" id="s_post_net">¥0/月</div>
            <div class="uk-text-meta" id="s_post_note">（月額差益 × 稼働合計 − <span id="s_fix_disp2">¥50,000</span>）</div>
          </div>
        </div>

      </div>

      <!-- 黒字まであと何件？ -->
      <div id="s_be" class="uk-alert-primary uk-margin-large-top" uk-alert style="display:none;">
        <p class="uk-margin-remove">
          <strong>黒字まであと：<span id="s_need_more">0</span> 件</strong>
          <span class="uk-text-meta">（損益分岐点：<span id="s_be_need">0</span>件、現在：<span id="s_after_active">0</span>件）</span>
        </p>
      </div>
    </div>
  </section>

  <!-- ================================
       時系列シミュレーター（プラン切替対応）
  =================================== -->
  <section id="timeline-sim" class="uk-section uk-section-default">
    <div class="uk-container">

      <div class="uk-text-center uk-margin-large-bottom">
        <h2 class="uk-heading-medium uk-text-primary uk-text-bold">売上・利益の"積み上がり"を月ごとに可視化</h2>
        <p class="uk-text-lead uk-margin-remove">仕入は固定。<strong>あなたの販売金額とペース</strong>を入れるだけで、<strong>売上・費用・利益・累積</strong>が一発で分かります。</p>
      </div>

      <!-- 固定仕入（表示のみ） -->
      <div class="uk-card uk-card-default uk-card-body uk-margin">
        <h3 class="uk-h5 uk-text-bold uk-margin-small">仕入（固定・代理店は変更不可）</h3>
        <div class="uk-grid-small uk-child-width-1-4@m" uk-grid>
          <div class="uk-text-center">
            <div class="uk-text-meta">panolabo制作費／初期のみ（1件）</div>
            <div class="uk-heading-bullet"><span uk-icon="lock"></span> <strong id="cfg_setup_disp">¥100,000</strong></div>
          </div>
          <div class="uk-text-center">
            <div class="uk-text-meta">panolabo月額管理費／件</div>
            <div class="uk-heading-bullet"><span uk-icon="lock"></span> <strong id="cfg_mgmt_disp">¥5,000</strong></div>
          </div>
          <div class="uk-text-center">
            <div class="uk-text-meta">panolabo月額システム使用料</div>
            <div class="uk-heading-bullet"><span uk-icon="lock"></span> <strong id="cfg_fixed_disp">¥50,000</strong></div>
          </div>
          <div class="uk-text-center">
            <div class="uk-text-meta">（バイアウト）参加費／初回のみ</div>
            <div class="uk-heading-bullet"><span uk-icon="lock"></span> <strong id="cfg_join_disp">¥300,000</strong></div>
          </div>
        </div>
      </div>

      <!-- 入力（プラン切替＋販売設定） -->
      <div class="uk-card uk-card-default uk-card-body uk-margin">
        <h3 class="uk-h5 uk-text-bold uk-margin-small">販売条件・シミュレーション設定</h3>

        <div class="uk-margin-small">
          <label class="uk-margin-small-right"><input class="uk-radio" type="radio" name="ts_plan" value="standard" checked onchange="TS.run()"> スタンダード（月額¥50,000）</label>
          <label class="uk-margin-small-left"><input class="uk-radio" type="radio" name="ts_plan" value="buyout" onchange="TS.run()"> バイアウト（参加費¥300,000／月額0）</label>
          <label class="uk-margin-small-left uk-text-meta" id="ts_join_wrap" style="display:none;">
            <input class="uk-checkbox" type="checkbox" id="ts_join_now" checked onchange="TS.run()"> 月1（初月）に参加費¥300,000を計上
          </label>
        </div>

        <div class="uk-grid-small uk-child-width-1-4@m uk-child-width-1-2@s" uk-grid>
          <div>
            <label class="uk-form-label">あなたが販売したい販売金額</label>
            <input id="ts_sell_init" class="uk-input" type="number" value="200000" step="1000" min="0">
          </div>
          <div>
            <label class="uk-form-label">あなたが設定したい月額管理費</label>
            <input id="ts_sell_monthly" class="uk-input" type="number" value="15000" step="500" min="0">
          </div>
          <div>
            <label class="uk-form-label">シミュレーション月数</label>
            <input id="ts_months" class="uk-input" type="number" value="12" step="1" min="1" max="36">
          </div>
          <div>
            <label class="uk-form-label">開始時点の稼働店舗数</label>
            <input id="ts_active_start" class="uk-input" type="number" value="0" step="1" min="0">
          </div>
          <div>
            <label class="uk-form-label">毎月の新規受注（件）</label>
            <input id="ts_new_deals" class="uk-input" type="number" value="3" step="1" min="0">
          </div>
          <div>
            <label class="uk-form-label">（任意）月ごとの新規受注リスト</label>
            <input id="ts_custom_deals" class="uk-input" type="text" placeholder="例: 3,3,4,5,5,6（空なら上の件数で一定）">
          </div>
        </div>

        <!-- 分岐表示 -->
        <div id="be_box" class="uk-alert-primary uk-margin-small" uk-alert>
          <p class="uk-margin-remove">
            <strong>損益分岐点（必要店舗数）：</strong><span id="be_need">—</span> 店　
            /　1店舗あたり月次粗利：<span id="be_unit">—</span><br>
            <small>計算式：<u>あなたの月額管理費 − panolabo月額管理費（¥5,000）</u></small>
          </p>
        </div>

        <div class="uk-margin">
          <button class="uk-button uk-button-primary" onclick="TS.run()">計算する</button>
          <button class="uk-button uk-button-default" onclick="TS.downloadCSV()">CSVダウンロード</button>
        </div>
        <div id="ts_warn" class="uk-margin-small"></div>
      </div>

      <!-- グラフ -->
      <div class="uk-card uk-card-default uk-card-body uk-margin">
        <h3 class="uk-h5 uk-text-bold uk-margin-small">月次利益 と 累積利益（ラインチャート）</h3>
        <canvas id="ts_chart" height="280" style="width:100%;max-width:100%;"></canvas>
      </div>

      <!-- テーブル -->
      <div class="uk-overflow-auto uk-margin">
        <table class="uk-table uk-table-striped uk-table-hover uk-text-small" id="ts_table">
          <thead>
            <tr>
              <th>月</th>
              <th>新規(件)</th>
              <th>稼働(店)</th>
              <th>売上: あなたが販売したい販売金額</th>
              <th>売上: あなたが設定したい月額管理費</th>
              <th>売上 合計</th>
              <th>費用: panolabo制作費（初期）</th>
              <th>費用: panolabo月額管理費／件</th>
              <th>費用: panolabo月額システム使用料</th>
              <th>費用: 参加費（バイアウト）</th>
              <th>費用 合計</th>
              <th class="uk-text-bold">月次利益</th>
              <th class="uk-text-bold">累積利益</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>

    </div>
  </section>

  <!-- ================================
       実装フロー
  =================================== -->
  <section class="uk-section uk-section-muted">
    <div class="uk-container">
      <h2 class="uk-heading-line uk-text-center"><span>パートナー契約から実装まで</span></h2>
      <div class="uk-child-width-1-5@m uk-grid-match" uk-grid>
        <div class="uk-text-center">
          <div class="uk-margin-bottom"><span class="uk-badge uk-badge-primary" style="font-size: 1.5rem; padding: 15px 20px;">01</span></div>
          <h4 class="uk-text-bold">相談・ヒアリング</h4>
          <p class="uk-text-small">対象市場や強みをヒアリング。最適な参加形態をご提案。</p>
        </div>
        <div class="uk-text-center">
          <div class="uk-margin-bottom"><span class="uk-badge uk-badge-primary" style="font-size: 1.5rem; padding: 15px 20px;">02</span></div>
          <h4 class="uk-text-bold">契約・条件決定</h4>
          <p class="uk-text-small">収益分配・サポート範囲・ブランド使用権などを取り決め。</p>
        </div>
        <div class="uk-text-center">
          <div class="uk-margin-bottom"><span class="uk-badge uk-badge-primary" style="font-size: 1.5rem; padding: 15px 20px;">03</span></div>
          <h4 class="uk-text-bold">営業支援・研修</h4>
          <p class="uk-text-small">販売資料・デモ・技術説明。必要に応じ営業同行も。</p>
        </div>
        <div class="uk-text-center">
          <div class="uk-margin-bottom"><span class="uk-badge uk-badge-primary" style="font-size: 1.5rem; padding: 15px 20px;">04</span></div>
          <h4 class="uk-text-bold">受注・制作開始</h4>
          <p class="uk-text-small">要件ヒアリング→制作。進捗を適宜共有。</p>
        </div>
        <div class="uk-text-center">
          <div class="uk-margin-bottom"><span class="uk-badge uk-badge-primary" style="font-size: 1.5rem; padding: 15px 20px;">05</span></div>
          <h4 class="uk-text-bold">納品・運用開始</h4>
          <p class="uk-text-small">納品後も更新・追加・改善を継続サポート。</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ================================
       FAQ（プラン対応）
  =================================== -->
  <section class="uk-section uk-section-default">
    <div class="uk-container">
      <h2 class="uk-heading-line uk-text-center"><span>よくある質問</span></h2>

      <ul uk-accordion="multiple: true">
        <li class="uk-margin">
          <a class="uk-accordion-title uk-text-bold uk-padding" href="#">参加費や月額はかかりますか？</a>
          <div class="uk-accordion-content uk-padding">
            <p>2つの参加形態から選べます。<br>
            ・スタンダード：参加費0円、<strong>月額¥50,000</strong>（システム使用料）<br>
            ・バイアウト：<strong>参加費¥300,000</strong>（初回のみ）、月額0円</p>
            <p>いずれも、<strong>panolabo制作費（¥100,000/件）</strong>と<strong>panolabo月額管理費（¥5,000/件）</strong>が別途かかります。</p>
          </div>
        </li>
        <li class="uk-margin">
          <a class="uk-accordion-title uk-text-bold uk-padding" href="#">月次の黒字化はどれくらいで？</a>
          <div class="uk-accordion-content uk-padding">
            <p>目安は <strong>必要店舗数＝ 月額固定 ÷（あなたの月額 − ¥5,000）</strong>。<br>
            例（スタンダード、あなたの月額¥15,000）：50,000 ÷ (15,000−5,000) = <strong>5店舗</strong>。<br>
            バイアウトは月額固定0円のため、<strong>0店舗</strong>から月次プラスに積み上がります（※参加費の回収は初期差益で目安3件）。</p>
          </div>
        </li>
        <li class="uk-margin">
          <a class="uk-accordion-title uk-text-bold uk-padding" href="#">技術知識がなくても運用できますか？</a>
          <div class="uk-accordion-content uk-padding">
            <p>はい。制作・運用はすべてPanolaboが担当。代理店は営業・サポートに集中できます。同行や資料提供も可能です。</p>
          </div>
        </li>
      </ul>
    </div>
  </section>

  <!-- ================================
       CTA
  =================================== -->
  <section class="uk-section uk-section-primary uk-text-center uk-light" style="background: linear-gradient(135deg, #316B3F 0%, #2E86AB 100%);">
    <div class="uk-container">
      <h2 class="uk-heading-medium">開発リスクゼロで新収益源を</h2>
      <p class="uk-text-lead uk-margin">
        技術は任せて、あなたは売るだけ。<br class="uk-visible@s">まずはどちらの参加形態が合うか相談しましょう。
      </p>
      <div class="uk-margin-top">
        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="uk-button uk-button-secondary uk-button-large uk-margin-small-right">パートナー相談する</a>
        <a href="<?php echo esc_url(home_url('/products/')); ?>" class="uk-button uk-button-default uk-button-large">サービス詳細を見る</a>
      </div>
    </div>
  </section>

</main>

<!-- ================================
     スクリプト：シミュレーター（共通）
================================ -->
<script>
(function(){
  // 共通定数
  const COST = {
    SETUP: 100000,   // panolabo制作費（初期/件）
    MGMT:   5000,    // panolabo月額管理費（1件/月）
    FIXED_STD: 50000,// スタンダード月額固定
    JOIN_FEE: 300000 // バイアウト参加費（初回のみ）
  };
  const Y = n => '¥' + (Math.round(n)||0).toLocaleString('ja-JP');
  const el = id => document.getElementById(id);

  // ===== 超シンプル試算 =====
  function s_getPlan(){
    return document.querySelector('input[name="s_plan"]:checked').value;
  }
  function s_updatePlanUI(plan){
    const isBuyout = plan==='buyout';
    document.getElementById('s_join_wrap').style.display = isBuyout ? '' : 'none';
    document.getElementById('s_join_note').style.display = (isBuyout && el('s_join_now').checked) ? '' : 'none';
    el('s_fix_disp').textContent  = isBuyout ? '¥0' : Y(COST.FIXED_STD);
    el('s_fix_disp2').textContent = isBuyout ? '¥0' : Y(COST.FIXED_STD);
  }
  window.SIMPLE = {
    calc(){
      const plan   = s_getPlan();
      s_updatePlanUI(plan);
      const sellInit = parseInt(el('s_init').value,10)||0;
      const sellM    = parseInt(el('s_mrr').value,10)||0;
      const deals    = Math.max(0, parseInt(el('s_deals').value,10)||0);
      const active   = Math.max(0, parseInt(el('s_active').value,10)||0);

      const isBuyout = plan==='buyout';
      const monthlyFixed = isBuyout ? 0 : COST.FIXED_STD;
      const joinNow = isBuyout && el('s_join_now').checked;

      const unitInit = sellInit - COST.SETUP;   // 1件あたり初期差益
      const unitMRR  = sellM   - COST.MGMT;    // 1件あたり月額差益

      if (unitMRR <= 0){
        el('s_warn').innerHTML = `<div class="uk-alert-danger" uk-alert><p>「あなたが設定したい月額管理費」が「panolabo月額管理費（¥5,000）」以下です。</p></div>`;
      } else {
        el('s_warn').innerHTML = '';
      }

      const afterActive = active + deals;

      const nowProfit = (unitInit * deals) + (unitMRR * afterActive) - monthlyFixed - (joinNow ? COST.JOIN_FEE : 0);
      const deltaMRR  = unitMRR * deals;
      const postNet   = (unitMRR * afterActive) - monthlyFixed;

      const beNeed = unitMRR > 0 ? Math.ceil((monthlyFixed) / unitMRR) : '—';
      const needMore = (beNeed==='—') ? '—' : Math.max(0, beNeed - afterActive);

      el('s_now_profit').textContent = Y(nowProfit);
      el('s_delta_mrr').textContent  = `+${Y(deltaMRR)}/月`;
      el('s_post_net').textContent   = Y(postNet) + '/月';

      el('s_unit_mrr').textContent = Y(unitMRR);
      el('s_deals_disp').textContent = deals;
      el('s_now_active_disp').textContent = afterActive;

      el('s_be').style.display = 'block';
      el('s_be_need').textContent  = beNeed;
      el('s_after_active').textContent = afterActive;
      el('s_need_more').textContent = needMore;

      document.getElementById('s_out').style.opacity = 1;
    }
  };
  // 初期実行
  window.SIMPLE.calc();

  // ===== 時系列シミュレーター =====
  function ts_plan(){ return document.querySelector('input[name="ts_plan"]:checked').value; }
  function ts_updatePlanUI(plan){
    const isBuyout = plan==='buyout';
    document.getElementById('ts_join_wrap').style.display = isBuyout ? '' : 'none';
    // 固定表示の数値（ロック表示）
    document.getElementById('cfg_setup_disp').textContent = Y(COST.SETUP);
    document.getElementById('cfg_mgmt_disp').textContent  = Y(COST.MGMT);
    document.getElementById('cfg_fixed_disp').textContent = isBuyout ? '¥0' : Y(COST.FIXED_STD);
    document.getElementById('cfg_join_disp').textContent  = Y(COST.JOIN_FEE);
  }

  function ts_parseCustomDeals(input, months, fallback){
    if(!input) return Array.from({length: months}, _=> fallback);
    const arr = input.split(',').map(s=>parseInt(s.trim(),10));
    const out = [];
    for(let i=0;i<months;i++){
      out.push(Number.isFinite(arr[i]) ? Math.max(0, arr[i]) : fallback);
    }
    return out;
  }

  function ts_simulate(params){
    const {
      months, startActive, newDealsPlan,
      sellInit, sellMonthly, plan, joinAtM1
    } = params;

    const isBuyout = plan==='buyout';
    const monthlyFixed = isBuyout ? 0 : COST.FIXED_STD;

    const rows = [];
    let active = startActive;
    let cumProfit = 0;

    for(let m=1; m<=months; m++){
      const newDeals = newDealsPlan[m-1];
      active += newDeals;

      const revInit  = sellInit   * newDeals;
      const revMrr   = sellMonthly* active;
      const revTotal = revInit + revMrr;

      const costSetup = COST.SETUP * newDeals;
      const costMgmt  = COST.MGMT  * active;
      const costFix   = monthlyFixed;
      const costJoin  = (isBuyout && joinAtM1 && m===1) ? COST.JOIN_FEE : 0;
      const costTotal = costSetup + costMgmt + costFix + costJoin;

      const profit = revTotal - costTotal;
      cumProfit += profit;

      rows.push({
        month:m, newDeals, active,
        revInit, revMrr, revTotal,
        costSetup, costMgmt, costFix, costJoin, costTotal,
        profit, cumProfit
      });
    }
    return rows;
  }

  function ts_renderTable(rows){
    const tbody = document.querySelector('#ts_table tbody');
    tbody.innerHTML = '';
    rows.forEach(r=>{
      const tr = document.createElement('tr');
      if(r.profit < 0) tr.classList.add('uk-text-danger');
      tr.innerHTML = `
        <td>${r.month}</td>
        <td>${r.newDeals}</td>
        <td>${r.active}</td>
        <td>${Y(r.revInit)}</td>
        <td>${Y(r.revMrr)}</td>
        <td>${Y(r.revTotal)}</td>
        <td>${Y(r.costSetup)}</td>
        <td>${Y(r.costMgmt)}</td>
        <td>${Y(r.costFix)}</td>
        <td>${r.costJoin ? Y(r.costJoin) : '—'}</td>
        <td>${Y(r.costTotal)}</td>
        <td class="uk-text-bold">${Y(r.profit)}</td>
        <td class="uk-text-bold">${Y(r.cumProfit)}</td>
      `;
      tbody.appendChild(tr);
    });
  }

  function ts_renderChart(rows){
    const canvas = document.getElementById('ts_chart');
    const ctx = canvas.getContext('2d');

    const w = canvas.clientWidth;
    const h = canvas.height;
    const ratio = window.devicePixelRatio || 1;
    canvas.width = w * ratio; canvas.height = h * ratio; ctx.scale(ratio, ratio);
    ctx.clearRect(0,0,canvas.width,canvas.height);

    const pad = {l: 50, r: 10, t: 10, b: 30};
    const plotW = w - pad.l - pad.r;
    const plotH = h - pad.t - pad.b;

    const profits = rows.map(r=>r.profit);
    const cum = rows.map(r=>r.cumProfit);
    const all = profits.concat(cum);
    const minV = Math.min(0, ...all);
    const maxV = Math.max(...all, 10);

    const x = i => pad.l + (plotW * i / (rows.length - 1 || 1));
    const y = v => pad.t + plotH - ((v - minV) / (maxV - minV || 1)) * plotH;

    // axes
    ctx.strokeStyle = '#ddd'; ctx.lineWidth = 1;
    ctx.beginPath(); ctx.moveTo(pad.l, pad.t); ctx.lineTo(pad.l, pad.t+plotH); ctx.lineTo(pad.l+plotW, pad.t+plotH); ctx.stroke();

    if(minV < 0 && maxV > 0){
      ctx.setLineDash([4,4]); ctx.strokeStyle = '#bbb';
      ctx.beginPath(); ctx.moveTo(pad.l, y(0)); ctx.lineTo(pad.l+plotW, y(0)); ctx.stroke(); ctx.setLineDash([]);
    }

    // monthly profit
    ctx.strokeStyle = '#2E86AB'; ctx.lineWidth = 2; ctx.beginPath();
    rows.forEach((r,i)=>{ i?ctx.lineTo(x(i), y(r.profit)):ctx.moveTo(x(i), y(r.profit)); });
    ctx.stroke();

    // cumulative
    ctx.strokeStyle = '#316B3F'; ctx.lineWidth = 2; ctx.beginPath();
    rows.forEach((r,i)=>{ i?ctx.lineTo(x(i), y(r.cumProfit)):ctx.moveTo(x(i), y(r.cumProfit)); });
    ctx.stroke();

    // legend
    ctx.fillStyle = '#333'; ctx.font = '12px sans-serif';
    ctx.fillText('利益', pad.l, pad.t+12);
    ctx.fillText('累積利益', pad.l+50, pad.t+12);
    ctx.fillStyle = '#2E86AB'; ctx.fillRect(pad.l-28, pad.t+3, 8, 8);
    ctx.fillStyle = '#316B3F'; ctx.fillRect(pad.l+22, pad.t+3, 8, 8);
  }

  function ts_updateBE(plan){
    const sellM = parseInt(el('ts_sell_monthly').value,10) || 0;
    const unit = sellM - COST.MGMT;
    const monthlyFixed = (plan==='buyout') ? 0 : COST.FIXED_STD;
    const need = unit > 0 ? Math.ceil(monthlyFixed / unit) : '—';
    document.getElementById('be_unit').textContent = unit > 0 ? Y(unit) : '—';
    document.getElementById('be_need').textContent = need;
  }

  function ts_warn(plan){
    const sellM = parseInt(el('ts_sell_monthly').value,10) || 0;
    const unit = sellM - COST.MGMT;
    const warnEl = document.getElementById('ts_warn');
    if(unit <= 0){
      warnEl.innerHTML = `<div class="uk-alert-danger" uk-alert><p>「あなたの月額管理費」が「panolabo月額管理費（¥5,000）」以下です。</p></div>`;
    } else {
      warnEl.innerHTML = '';
    }
  }

  window.TS = {
    run(){
      const plan = ts_plan();
      ts_updatePlanUI(plan);
      ts_warn(plan);

      const sellInit  = parseInt(el('ts_sell_init').value,10) || 0;
      const sellM     = parseInt(el('ts_sell_monthly').value,10) || 0;
      const months    = Math.max(1, parseInt(el('ts_months').value,10) || 1);
      const startAct  = Math.max(0, parseInt(el('ts_active_start').value,10) || 0);
      const newDeals  = Math.max(0, parseInt(el('ts_new_deals').value,10) || 0);
      const custom    = el('ts_custom_deals').value;
      const joinAtM1  = (plan==='buyout') ? el('ts_join_now').checked : false;

      const planArr   = ts_parseCustomDeals(custom, months, newDeals);
      const rows      = ts_simulate({
        months, startActive: startAct, newDealsPlan: planArr,
        sellInit, sellMonthly: sellM, plan, joinAtM1
      });

      ts_renderTable(rows);
      ts_renderChart(rows);
      window.__TS_ROWS__ = rows;

      ts_updateBE(plan);
    },
    downloadCSV(){
      const rows = window.__TS_ROWS__ || [];
      if(!rows.length) TS.run();
      const data = window.__TS_ROWS__ || [];
      const header = ['月','新規(件)','稼働(店)','売上_初期','売上_月額','売上_合計','費用_制作(初期)','費用_管理(月額)','費用_システム(月額)','費用_参加費(初回)','費用_合計','月次利益','累積利益'];
      const lines = [header.join(',')].concat(
        data.map(r=>[r.month,r.newDeals,r.active,r.revInit,r.revMrr,r.revTotal,r.costSetup,r.costMgmt,r.costFix,r.costJoin||0,r.costTotal,r.profit,r.cumProfit].join(','))
      );
      const blob = new Blob([lines.join('\n')], {type:'text/csv'});
      const url = URL.createObjectURL(blob);
      const a = document.createElement('a');
      a.href = url; a.download = 'panolabo_timeline.csv';
      document.body.appendChild(a); a.click(); a.remove(); URL.revokeObjectURL(url);
    }
  };

  // 初期実行
  TS.run();

  // 画面幅変更でグラフ再描画
  window.addEventListener('resize', ()=> { if(window.__TS_ROWS__) (function(){ ts_renderChart(window.__TS_ROWS__); })(); });

})();
</script>

<?php get_footer(); ?>