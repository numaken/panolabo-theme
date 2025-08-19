/**
 * Future Case JavaScript
 */

(function($) {
    'use strict';

    // DOM Ready
    $(document).ready(function() {
        initFutureCases();
    });

    /**
     * Initialize Future Cases
     */
    function initFutureCases() {
        // Add smooth scrolling for anchor links
        $('.pab-future-case a[href^="#"]').on('click', function(e) {
            e.preventDefault();
            var target = $(this.getAttribute('href'));
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top - 100
                }, 800);
            }
        });

        // Initialize card hover effects
        $('.pab-card').on('mouseenter', function() {
            $(this).addClass('pab-card-hover');
        }).on('mouseleave', function() {
            $(this).removeClass('pab-card-hover');
        });

        // Initialize image lazy loading if intersection observer is available
        if ('IntersectionObserver' in window) {
            initLazyLoading();
        }

        // Track analytics events
        trackAnalytics();

        // Initialize filter functionality for archive pages
        if ($('.pab-archive-filters').length) {
            initArchiveFilters();
        }
    }

    /**
     * Initialize lazy loading for images
     */
    function initLazyLoading() {
        var imageObserver = new IntersectionObserver(function(entries, observer) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    var img = entry.target;
                    if (img.dataset.src) {
                        img.src = img.dataset.src;
                        img.classList.remove('pab-lazy');
                        img.classList.add('pab-loaded');
                        observer.unobserve(img);
                    }
                }
            });
        }, {
            rootMargin: '50px 0px'
        });

        $('.pab-future-case img[data-src]').each(function() {
            imageObserver.observe(this);
        });
    }

    /**
     * Track analytics events
     */
    function trackAnalytics() {
        // Track CTA button clicks
        $('.pab-cta-buttons .pab-btn').on('click', function() {
            var buttonText = $(this).text().trim();
            var caseId = $(this).closest('.pab-future-case').data('case-id');
            
            if (typeof gtag !== 'undefined') {
                gtag('event', 'future_case_cta_click', {
                    'case_id': caseId,
                    'button_text': buttonText,
                    'event_category': 'Future Case',
                    'event_label': buttonText
                });
            }
        });

        // Track card clicks
        $('.pab-card-title a, .pab-card-link').on('click', function() {
            var caseTitle = $(this).closest('.pab-card').find('.pab-card-title').text().trim();
            
            if (typeof gtag !== 'undefined') {
                gtag('event', 'future_case_card_click', {
                    'case_title': caseTitle,
                    'event_category': 'Future Case',
                    'event_label': caseTitle
                });
            }
        });

        // Track plugin badge clicks
        $('.pab-plugin-badge').on('click', function() {
            var pluginName = $(this).text().trim();
            
            if (typeof gtag !== 'undefined') {
                gtag('event', 'future_case_plugin_interest', {
                    'plugin_name': pluginName,
                    'event_category': 'Future Case',
                    'event_label': pluginName
                });
            }
        });
    }

    /**
     * Initialize archive filters
     */
    function initArchiveFilters() {
        $('.pab-filter-btn').on('click', function(e) {
            e.preventDefault();
            
            var filterValue = $(this).data('filter');
            var currentUrl = new URL(window.location.href);
            
            if (filterValue === 'all') {
                currentUrl.searchParams.delete('ai');
            } else {
                currentUrl.searchParams.set('ai', filterValue);
            }
            
            // Update URL and reload
            window.location.href = currentUrl.toString();
        });

        // Highlight active filter
        var urlParams = new URLSearchParams(window.location.search);
        var activeFilter = urlParams.get('ai') || 'all';
        
        $('.pab-filter-btn').removeClass('pab-filter-active');
        $('.pab-filter-btn[data-filter="' + activeFilter + '"]').addClass('pab-filter-active');
    }

    /**
     * Utility function to get case data
     */
    function getCaseData(caseElement) {
        return {
            id: caseElement.data('case-id'),
            title: caseElement.find('.pab-hero-title, .pab-card-title').text().trim(),
            industry: caseElement.find('.pab-industry').text().trim(),
            plugins: caseElement.find('.pab-plugin-badge').map(function() {
                return $(this).text().trim();
            }).get()
        };
    }

    /**
     * Show loading state
     */
    function showLoading(element) {
        element.addClass('pab-loading');
        element.append('<div class="pab-spinner">読み込み中...</div>');
    }

    /**
     * Hide loading state
     */
    function hideLoading(element) {
        element.removeClass('pab-loading');
        element.find('.pab-spinner').remove();
    }

    // Export functions for external use
    window.PabFutureCase = {
        getCaseData: getCaseData,
        showLoading: showLoading,
        hideLoading: hideLoading,
        trackAnalytics: trackAnalytics
    };

})(jQuery);