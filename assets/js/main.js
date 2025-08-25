// Panolabo WordPress Theme - Main JavaScript
// UIKitはCDNから読み込まれるので、window.UIkitを使用

// LoadBoxアニメーション初期化
function initLoadBox() {
    const loadBox = document.getElementById('loadbox');
    
    if (loadBox) {
        console.log('LoadBox found:', loadBox);
        
        // 初期状態で表示されていることを確認
        loadBox.style.display = 'block';
        loadBox.style.visibility = 'visible';
        loadBox.style.opacity = '1';
        loadBox.classList.add('loadbox-active');
        loadBox.classList.remove('loadbox-hidden');
        
        console.log('LoadBox アニメーション開始');
        
        // ページが完全に読み込まれたら非表示
        function hideLoadBox() {
            console.log('LoadBox 非表示開始');
            loadBox.classList.remove('loadbox-active');
            loadBox.classList.add('loadbox-hidden');
            
            // CSS transition終了後に完全非表示
            setTimeout(() => {
                loadBox.style.display = 'none';
                console.log('LoadBox アニメーション終了');
            }, 600);
        }
        
        // ぴこぴこアニメーションを見せるため3秒間表示
        setTimeout(hideLoadBox, 3000); // 3秒間表示
        
        // ページ読み込み完了時にも非表示（どちらか早い方）
        window.addEventListener('load', function() {
            setTimeout(hideLoadBox, 1500);
        });
    } else {
        console.error('LoadBox not found!');
    }
}

// ページ読み込み開始時に即座実行
initLoadBox();

// DOM読み込み後の初期化
document.addEventListener('DOMContentLoaded', function() {
    // LoadBoxがまだある場合は再初期化
    const loadBox = document.getElementById('loadbox');
    if (loadBox && !loadBox.classList.contains('loadbox-hidden')) {
        console.log('DOM読み込み後にLoadBox再初期化');
        initLoadBox();
    }
    
    // UIKitが読み込まれるまで待機
    function waitForUIKit() {
        if (typeof UIkit !== 'undefined') {
            console.log('Panolabo Theme - UIKit Ready');
            initializeTheme();
        } else {
            setTimeout(waitForUIKit, 100);
        }
    }
    waitForUIKit();
});

function initializeTheme() {
    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            // hrefが'#'だけや空の場合はスキップ
            if (!href || href === '#' || href.length <= 1) {
                return;
            }
            
            e.preventDefault();
            const target = document.querySelector(href);
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // UIKit Offcanvas debugging
    console.log('Checking UIKit offcanvas...');
    const offcanvasToggle = document.querySelector('[uk-toggle]');
    const offcanvasElement = document.querySelector('#offcanvas-nav');
    
    if (offcanvasToggle && offcanvasElement) {
        console.log('Offcanvas elements found:', { toggle: offcanvasToggle, element: offcanvasElement });
        
        // UIKitのoffcanvasが初期化されていない場合のフォールバック
        offcanvasToggle.addEventListener('click', function(e) {
            console.log('Toggle clicked');
            if (typeof UIkit !== 'undefined' && UIkit.offcanvas) {
                const offcanvas = UIkit.offcanvas(offcanvasElement);
                if (offcanvas) {
                    offcanvas.toggle();
                }
            }
        });
    } else {
        console.error('Offcanvas elements not found!');
    }

    // Contact form enhancements
    const contactForm = document.querySelector('#contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', handleContactForm);
    }

    // Lazy loading for images
    initLazyLoading();
    
    // Analytics tracking
    initAnalytics();
    
    // モバイル背景画像対応
    initMobileBackgroundImages();
}

function handleContactForm(e) {
    e.preventDefault();
    
    // Basic form validation
    const formData = new FormData(e.target);
    const email = formData.get('email');
    const message = formData.get('message');
    
    if (!email || !message) {
        UIkit.notification({
            message: 'メールアドレスとメッセージは必須です',
            status: 'warning',
            pos: 'top-center'
        });
        return;
    }
    
    // Submit form (WordPress handles backend)
    e.target.submit();
}

function initLazyLoading() {
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    imageObserver.unobserve(img);
                }
            });
        });

        document.querySelectorAll('img[data-src]').forEach(img => {
            imageObserver.observe(img);
        });
    }
}

function initAnalytics() {
    // Track page views and interactions
    if (typeof gtag !== 'undefined') {
        gtag('event', 'page_view', {
            page_title: document.title,
            page_location: window.location.href
        });
    }
    
    // Track business pillar interactions
    document.querySelectorAll('.business-pillar').forEach(pillar => {
        pillar.addEventListener('click', function() {
            const pillarName = this.dataset.pillar || 'unknown';
            if (typeof gtag !== 'undefined') {
                gtag('event', 'business_pillar_click', {
                    pillar_name: pillarName
                });
            }
        });
    });
}

function initMobileBackgroundImages() {
    // モバイルデバイスで背景画像の表示を確実にする
    const isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
    const isIOS = /iPad|iPhone|iPod/.test(navigator.userAgent);
    
    // すべてのデバイスで背景画像を確認・修正
    const bgElements = document.querySelectorAll('[style*="background-image"], [data-bg-mobile], .parallax, section.parallax');
    
    bgElements.forEach(element => {
        // 現在の背景画像を取得
        const currentBg = window.getComputedStyle(element).backgroundImage;
        const mobileBg = element.getAttribute('data-bg-mobile');
        
        if (isMobile && mobileBg) {
            // モバイル専用背景画像がある場合
            element.style.backgroundImage = `url('${mobileBg}')`;
            console.log('Applied mobile background:', mobileBg);
        }
        
        // 背景画像の表示を強制（すべてのデバイス）
        element.style.setProperty('background-size', 'cover', 'important');
        element.style.setProperty('background-position', 'center center', 'important');
        element.style.setProperty('background-repeat', 'no-repeat', 'important');
        element.style.setProperty('background-attachment', 'scroll', 'important');
        
        // iOS専用対応
        if (isIOS) {
            element.style.setProperty('-webkit-background-size', 'cover', 'important');
            element.style.setProperty('-webkit-transform', 'translateZ(0)', 'important');
            element.style.minHeight = '400px'; // 最小高さを保証
        }
        
        // GPU加速
        element.style.transform = 'translateZ(0)';
        element.style.willChange = 'transform';
    });
    
    console.log(`Background images processed: ${bgElements.length} elements`);
    console.log('User agent:', navigator.userAgent);
}

// Export for global access
window.PanolaboTheme = {
    initializeTheme,
    handleContactForm,
    initLazyLoading,
    initAnalytics,
    initMobileBackgroundImages
};