// Panolabo WordPress Theme - Main JavaScript
// UIKitはCDNから読み込まれるので、window.UIkitを使用

document.addEventListener('DOMContentLoaded', function() {
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
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
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
    
    if (isMobile) {
        const bgElements = document.querySelectorAll('[style*="background-image"], [data-bg-mobile]');
        
        bgElements.forEach(element => {
            const mobileBg = element.getAttribute('data-bg-mobile');
            if (mobileBg) {
                // モバイル専用背景画像がある場合
                element.style.backgroundImage = `url('${mobileBg}')`;
            }
            
            // 背景画像の表示を強制
            element.style.backgroundSize = 'cover';
            element.style.backgroundPosition = 'center center';
            element.style.backgroundRepeat = 'no-repeat';
            element.style.backgroundAttachment = 'scroll'; // fixedはモバイルで問題
            
            // GPU加速
            element.style.transform = 'translateZ(0)';
            element.style.willChange = 'transform';
        });
        
        console.log('Mobile background images initialized');
    }
}

// Export for global access
window.PanolaboTheme = {
    initializeTheme,
    handleContactForm,
    initLazyLoading,
    initAnalytics,
    initMobileBackgroundImages
};