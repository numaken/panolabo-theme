// Panolabo WordPress Theme - Main JavaScript
import UIkit from 'uikit';
import Icons from 'uikit/dist/js/uikit-icons';

// Load UIKit Icons
UIkit.use(Icons);

// Initialize UIKit
UIkit.util.ready(() => {
    console.log('Panolabo Theme - UIKit Ready');
    
    // Custom theme initialization
    initializeTheme();
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

    // Mobile menu enhancements
    const mobileNavToggle = document.querySelector('.uk-navbar-toggle');
    if (mobileNavToggle) {
        mobileNavToggle.addEventListener('click', function() {
            document.body.classList.toggle('mobile-nav-open');
        });
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