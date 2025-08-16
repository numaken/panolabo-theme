<!-- 固定CTAバー（スマホのみ表示）
<div class="uk-hidden@s uk-hidden@m cta-fixed-bar uk-background-primary uk-light" style="position: fixed; bottom: 0; left: 0; width: 100%; z-index: 9999;">
  <div class="uk-container uk-padding-small">
    <div class="uk-flex uk-flex-middle uk-flex-between">
      <span class="uk-text-small uk-text-bold">ご質問・ご相談はこちらから</span>
      <div class="uk-flex">
        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="uk-button uk-button-text">
          無料相談
        </a>
        <a href="<?php echo esc_url(home_url('/docs')); ?>" class="uk-button uk-button-text">
          資料DL
        </a>
      </div>
    </div>
  </div>
</div>
 -->

<!-- =============================
      Footer Section
============================= -->
<footer class="uk-section uk-section-default uk-dark uk-padding-remove">

    <div class="uk-width-1-1@m">
        <div class="uk-container-expand">
            <div class="uk-grid uk-margin uk-visible@m">
                
                <div class="uk-width-1-2@m footer-link">
                    <a href="/contact">
                        <div class="footer-link-inner uk-flex uk-flex-middle">
                            <div class="footer-icons uk-margin-small-right">
                                <i class="far fa-envelope"></i>
                            </div>
                            <div class="footer-text">
                                <span class="uk-light">お気軽にお問合わせください</span>
                                <h3 class="uk-light uk-margin-remove">Contact Us</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="uk-width-1-2@m footer-link">
                    <a href="/contact">
                        <div class="footer-link-inner uk-flex uk-flex-middle">
                            <div class="footer-icons uk-margin-small-right">
                                <i class="far fa-paper-plane"></i>
                            </div>
                            <div class="footer-text">
                                <span class="uk-light">仕事の準備はできています！</span>
                                <h3 class="uk-light uk-margin-remove">Start A Project</h3>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="uk-grid uk-margin">
                <div class="uk-width-1-1 text-center">
                    <div class="footer-content uk-text-center">
                        <ul class="uk-subnav uk-subnav-divider uk-flex-center footer-socail">
                            <li>
                                <a href="https://twitter.com/Panolabo360VR" target="_blank"><i class="fab fa-x fa-1x gray"></i></a>
                            </li>
                            <li>
                                <a href="https://facebook.com/panolabo" target="_blank"><i class="fab fa-facebook-f fa-1x gray"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="uk-grid uk-margin">
                <div class="uk-width-1-1 uk-text-center">
                    <ul class="uk-subnav uk-flex-center">
                        <li>©
                            <?php
                            $then = 2015; // サイトの公開年
                            $now = date('Y');
                            if ($then < $now) {
                                echo $then.'–'.$now;
                            } else {
                                echo $then;
                            }
                            ?>
                        </li>
                        <li>
                            <i class="fa fa-heart"></i>
                        </li>                         
                        <li>
                            <img src="<?php bloginfo('template_directory'); ?>/images/logo/panolabo-logoBr.svg" alt="panolabo Logo" style="height: 24px; vertical-align: middle;">
                        </li>                        
                        <li>
                            <a href="mailto:hello@panolabollc.com">hello@panolabollc.com</a>
                        </li>
                        <li>
                            <a href="tel:+81-90-4749-5780">+81.90.4749.5780</a>
                        </li>
                        <li><a href="<?php echo home_url('/privacy'); ?>">プライバシーポリシー</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</footer><!-- end footer -->

<div id="back-top">
    <a href="#" class="scrollToTop"><i class="fa fa-angle-up"></i></a>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuTrigger = document.querySelector('.menu-trigger a');
        const menu = document.querySelector('.menu');

        if (menuTrigger && menu) {
            menuTrigger.addEventListener('click', function(e) {
                e.preventDefault();
                if (menu.classList.contains('open')) {
                    menu.classList.remove('open');
                } else {
                    menu.classList.add('open');
                }
            });
        }
    });
</script>

<!-- UIKit初期化とハンバーガーメニュー設定 -->
<script>
(function() {
    'use strict';
    
    function waitForUIKit() {
        if (typeof UIkit !== 'undefined' && window.UIKitReady) {
            console.log('UIKit ready, initializing components...');
            initializeComponents();
        } else {
            setTimeout(waitForUIKit, 100);
        }
    }
    
    function initializeComponents() {
        // Offcanvasの初期化
        var offcanvasElement = document.getElementById('offcanvas-nav');
        if (offcanvasElement) {
            var offcanvas = UIkit.offcanvas(offcanvasElement, {
                mode: 'slide',
                overlay: true
            });
            console.log('Offcanvas initialized');
        }
        
        // ハンバーガーメニューボタンに手動でイベントリスナーを追加
        var toggleButton = document.querySelector('a[href="#offcanvas-nav"]');
        if (toggleButton && offcanvasElement) {
            toggleButton.addEventListener('click', function(e) {
                e.preventDefault();
                if (typeof UIkit !== 'undefined') {
                    UIkit.offcanvas(offcanvasElement).toggle();
                }
            });
            console.log('Hamburger menu event listener added');
        }
        
        // UIKitコンポーネントの更新
        UIkit.update();
    }
    
    // DOMContentLoadedまたはUIKitの準備完了を待つ
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', waitForUIKit);
    } else {
        waitForUIKit();
    }
})();
</script>

<?php wp_footer(); ?>

</body>
</html>
