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

// Export for global access
window.PanolaboTheme = {
    initializeTheme,
    handleContactForm,
    initLazyLoading,
    initAnalytics
};