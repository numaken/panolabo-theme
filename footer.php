<!-- =============================
     統一フッター
============================= -->
<footer class="uk-section uk-section-default uk-padding">
    <div class="uk-container">
        <div class="uk-grid-match" uk-grid>
            <!-- 会社情報 -->
            <div class="uk-width-1-3@m">
                <div class="uk-text-center uk-text-left@m">
                    <img src="<?php bloginfo('template_directory'); ?>/images/logo/panolabo-logoBr.svg" alt="Panolabo Logo" style="height: 40px; margin-bottom: 15px;">
                    <p class="uk-text-small uk-text-muted">
                        AI・VR・アプリ・Web・OEMまで全部1人で回す<br>
                        「1人総合制作代理店」
                    </p>
                    <p class="uk-text-small">
                        <a href="mailto:hello@panolabollc.com" class="uk-link-muted">
                            <span uk-icon="mail"></span> hello@panolabollc.com
                        </a>
                    </p>
                </div>
            </div>
            
            <!-- サービスリンク -->
            <div class="uk-width-1-3@m">
                <div class="uk-text-center uk-text-left@m">
                    <h4 class="uk-heading-bullet">サービス</h4>
                    <ul class="uk-list uk-list-collapse">
                        <li><a href="<?php echo home_url('/services/'); ?>" class="uk-link-muted">受託開発</a></li>
                        <li><a href="<?php echo home_url('/products/'); ?>" class="uk-link-muted">自社プロダクト</a></li>
                        <li><a href="<?php echo home_url('/oem/'); ?>" class="uk-link-muted">OEMパートナーシップ</a></li>
                        <li><a href="<?php echo home_url('/contact/'); ?>" class="uk-link-muted">お問い合わせ</a></li>
                    </ul>
                </div>
            </div>
            
            <!-- SNS・法的情報 -->
            <div class="uk-width-1-3@m">
                <div class="uk-text-center uk-text-left@m">
                    <h4 class="uk-heading-bullet">フォロー</h4>
                    <div class="uk-margin-small-bottom">
                        <a href="https://twitter.com/Panolabo360VR" target="_blank" class="uk-icon-button uk-margin-small-right" uk-icon="twitter"></a>
                        <a href="https://facebook.com/panolabo" target="_blank" class="uk-icon-button uk-margin-small-right" uk-icon="facebook"></a>
                        <a href="https://www.youtube.com/@panolabollc" target="_blank" class="uk-icon-button" uk-icon="youtube"></a>
                    </div>
                    <ul class="uk-list uk-list-collapse uk-text-small">
                        <li><a href="<?php echo home_url('/privacy/'); ?>" class="uk-link-muted">プライバシーポリシー</a></li>
                        <li><a href="<?php echo home_url('/sitemap/'); ?>" class="uk-link-muted">サイトマップ</a></li>
                    </ul>
                </div>
            </div>
        </div>
        
        <hr class="uk-divider-small uk-margin-medium">
        
        <!-- コピーライト -->
        <div class="uk-text-center uk-text-small uk-text-muted">
            <p>© <?php
                $then = 2015;
                $now = date('Y');
                if ($then < $now) {
                    echo $then.'–'.$now;
                } else {
                    echo $then;
                }
            ?> Panolabo LLC. All rights reserved.</p>
        </div>
    </div>
</footer>

<!-- トップに戻るボタン -->
<div id="back-top" class="uk-hidden@s">
    <a href="#" class="uk-icon-button uk-position-bottom-right uk-position-fixed uk-margin" uk-icon="chevron-up" uk-scroll></a>
</div>

<!-- UIKit初期化 -->
<script>
(function() {
    'use strict';
    
    if (typeof UIkit !== 'undefined') {
        UIkit.update();
    }
    
    // スムーススクロールの初期化
    document.addEventListener('DOMContentLoaded', function() {
        // トップに戻るボタンの表示制御
        const backTop = document.getElementById('back-top');
        if (backTop) {
            window.addEventListener('scroll', function() {
                if (window.pageYOffset > 300) {
                    backTop.style.display = 'block';
                } else {
                    backTop.style.display = 'none';
                }
            });
        }
    });
})();

// 黒字転換（損益分岐点）シミュレーター（OEMページ用）
if (document.getElementById('breakeven')) {
  const Y = n => '¥' + (Math.round(n)||0).toLocaleString();

  window.setScenario = function(sellMonthly, mgmt){
    document.getElementById('sell_monthly2').value = sellMonthly;
    document.getElementById('mgmt_fee2').value = mgmt;
    calcBreakeven();
  };

  window.calcBreakeven = function(){
    const fixed   = parseInt(document.getElementById('sys_fee2').value,10) || 0;     // 固定5万円など
    const mgmt    = parseInt(document.getElementById('mgmt_fee2').value,10) || 0;    // 管理/店舗
    const sellM   = parseInt(document.getElementById('sell_monthly2').value,10) || 0;// 販売月額
    const active  = parseInt(document.getElementById('active_stores2').value,10) || 0;

    const unitMrr = sellM - mgmt; // 1店舗あたり月次粗利
    if (unitMrr <= 0){
      document.getElementById('be_out').innerHTML =
        `<div class="uk-alert-danger" uk-alert><p>⚠️ 販売月額 ≤ 管理費 のため、店舗が増えるほど赤字です。価格を見直してください。</p></div>`;
      return;
    }

    const be = Math.ceil(fixed / unitMrr); // 損益分岐点（店舗数）
    const monthlyNet = (unitMrr * active) - fixed; // 現在の月次最終（固定控除後）
    const remain = Math.max(0, be - active);
    const pct = Math.min(100, Math.round((active / be) * 100));

    document.getElementById('be_out').innerHTML = `
      <div class="uk-grid-small uk-child-width-1-2@m" uk-grid>
        <div>
          <div class="uk-card uk-card-default uk-card-body uk-text-center">
            <div class="uk-text-meta">この設定の損益分岐点</div>
            <div class="uk-heading-medium uk-margin-small">あと <span class="uk-text-primary">${remain}</span> 店で黒字</div>
            <p class="uk-margin-remove">必要店舗数：<strong>${be}</strong> 店 ／ 現在：<strong>${active}</strong> 店</p>
            <progress class="uk-progress" value="${pct}" max="100"></progress>
          </div>
        </div>
        <div>
          <div class="uk-card uk-card-default uk-card-body">
            <ul class="uk-list uk-list-divider uk-margin-remove">
              <li><strong>1店舗あたり月次粗利：</strong> ${Y(unitMrr)} <span class="uk-text-meta">（${Y(sellM)} − ${Y(mgmt)}）</span></li>
              <li><strong>現在の月次最終：</strong> ${Y(monthlyNet)} <span class="uk-text-meta">（${Y(unitMrr)}×${active} − 固定 ${Y(fixed)}）</span></li>
            </ul>
            <p class="uk-margin-small uk-text-meta">※ 黒字化後は、<strong>1店舗増えるごとに ${Y(unitMrr)}</strong> の純増。</p>
          </div>
        </div>
      </div>
    `;
  };

  window.calcInitBoost = function(){
    const sellInit = parseInt(document.getElementById('sell_init2').value,10) || 0;
    const setup    = parseInt(document.getElementById('setup_cost2').value,10) || 0;
    const vradd    = parseInt(document.getElementById('vr_add2').value,10) || 0;
    const deals    = parseInt(document.getElementById('new_deals2').value,10) || 0;

    const unitInit = (sellInit - (setup + vradd));
    const total    = unitInit * deals;

    const warn = unitInit < 0 ? `<div class="uk-alert-danger" uk-alert><p>⚠️ 初期販売が仕入を下回っています（1件あたり ${Y(unitInit)}）。</p></div>` : '';

    document.getElementById('init_out').innerHTML = `
      ${warn}
      <ul class="uk-list uk-list-divider">
        <li><strong>1件あたり初期粗利：</strong> ${Y(unitInit)} <span class="uk-text-meta">（${Y(sellInit)} − ${Y(setup)}${vradd?` − VR加算 ${Y(vradd)}`:''}）</span></li>
        <li><strong>今月の初期粗利合計：</strong> ${Y(total)} <span class="uk-text-meta">（×${deals}件）</span></li>
      </ul>
      <p class="uk-text-meta uk-margin-small">※ 初期粗利は「受注月のブースト」。翌月以降は月次で積み上げます。</p>
    `;
  };

  // 初期計算
  calcBreakeven();
  calcInitBoost();
}
</script>

<?php wp_footer(); ?>

</body>
</html>