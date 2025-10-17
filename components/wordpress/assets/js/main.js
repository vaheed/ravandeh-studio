/**
 * Main JavaScript file for Ravandeh Studio Theme
 * 
 * @package Ravandeh_Studio
 * @since 1.0.0
 */

(function() {
    'use strict';

    // Wait for DOM to be ready
    document.addEventListener('DOMContentLoaded', function() {
        initTheme();
    });

    /**
     * Initialize theme functionality
     */
    function initTheme() {
        initDarkMode();
        initLanguageToggle();
        initMobileMenu();
        initSmoothScroll();
        initScrollAnimations();
        initGlassEffects();
    }

    /**
     * Dark Mode Toggle
     */
    function initDarkMode() {
        const toggle = document.getElementById('dark-mode-toggle');
        if (!toggle) return;

        const sunIcon = toggle.querySelector('.sun-icon');
        const moonIcon = toggle.querySelector('.moon-icon');
        
        // Check for saved dark mode preference or default to light mode
        const isDarkMode = document.documentElement.classList.contains('dark');
        updateDarkModeIcons(isDarkMode, sunIcon, moonIcon);

        toggle.addEventListener('click', function() {
            const newDarkMode = !document.documentElement.classList.contains('dark');
            document.documentElement.classList.toggle('dark');
            document.body.classList.toggle('dark');
            
            updateDarkModeIcons(newDarkMode, sunIcon, moonIcon);

            // Save preference via AJAX
            if (typeof ravandehAjax !== 'undefined') {
                fetch(ravandehAjax.ajaxurl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams({
                        action: 'ravandeh_toggle_dark_mode',
                        dark_mode: newDarkMode.toString(),
                        nonce: ravandehAjax.nonce
                    })
                });
            }

            // Set cookie
            document.cookie = `ravandeh_dark_mode=${newDarkMode}; path=/; max-age=${30 * 24 * 60 * 60}`;
        });
    }

    function updateDarkModeIcons(isDarkMode, sunIcon, moonIcon) {
        if (isDarkMode) {
            sunIcon.classList.add('hidden');
            moonIcon.classList.remove('hidden');
        } else {
            sunIcon.classList.remove('hidden');
            moonIcon.classList.add('hidden');
        }
    }

    /**
     * Language Toggle
     */
    function initLanguageToggle() {
        const toggle = document.getElementById('language-toggle');
        if (!toggle) return;

        toggle.addEventListener('click', function() {
            const currentLang = toggle.dataset.lang || 'en';
            const newLang = currentLang === 'en' ? 'fa' : 'en';
            
            // Save preference via AJAX
            if (typeof ravandehAjax !== 'undefined') {
                fetch(ravandehAjax.ajaxurl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams({
                        action: 'ravandeh_switch_language',
                        language: newLang,
                        nonce: ravandehAjax.nonce
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Reload page to apply language changes
                        location.reload();
                    }
                });
            }

            // Set cookie
            document.cookie = `ravandeh_language=${newLang}; path=/; max-age=${30 * 24 * 60 * 60}`;
        });
    }

    /**
     * Mobile Menu Toggle
     */
    function initMobileMenu() {
        const toggle = document.getElementById('mobile-menu-toggle');
        const menu = document.getElementById('mobile-menu');
        
        if (!toggle || !menu) return;

        toggle.addEventListener('click', function() {
            const isExpanded = toggle.getAttribute('aria-expanded') === 'true';
            toggle.setAttribute('aria-expanded', !isExpanded);
            menu.classList.toggle('hidden');
        });

        // Close mobile menu when clicking on a link
        const mobileLinks = menu.querySelectorAll('a');
        mobileLinks.forEach(link => {
            link.addEventListener('click', function() {
                menu.classList.add('hidden');
                toggle.setAttribute('aria-expanded', 'false');
            });
        });
    }

    /**
     * Smooth Scroll for anchor links
     */
    function initSmoothScroll() {
        const links = document.querySelectorAll('a[href^="#"]');
        
        links.forEach(link => {
            link.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href === '#') return;

                const target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    const headerOffset = 100;
                    const elementPosition = target.getBoundingClientRect().top;
                    const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });
    }

    /**
     * Scroll Animations with Intersection Observer
     */
    function initScrollAnimations() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Observe elements with animation classes
        const animatedElements = document.querySelectorAll('.glass-card, .section-header, .hero-content');
        animatedElements.forEach(el => observer.observe(el));
    }

    /**
     * Glass Effects - Enhanced hover interactions
     */
    function initGlassEffects() {
        const glassCards = document.querySelectorAll('.glass-card');
        
        glassCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-8px)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    }

    /**
     * Parallax Effect for Hero Section (if GSAP is available)
     */
    if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
        gsap.registerPlugin(ScrollTrigger);

        // Hero parallax
        gsap.to('.hero-background', {
            yPercent: 50,
            ease: 'none',
            scrollTrigger: {
                trigger: '.hero-section',
                start: 'top top',
                end: 'bottom top',
                scrub: true
            }
        });

        // Fade in animations
        gsap.utils.toArray('.glass-card').forEach(card => {
            gsap.from(card, {
                scrollTrigger: {
                    trigger: card,
                    start: 'top bottom-=100',
                    toggleActions: 'play none none none'
                },
                opacity: 0,
                y: 50,
                duration: 0.8,
                ease: 'power2.out'
            });
        });
    }

    /**
     * Load More functionality (if needed)
     */
    function initLoadMore() {
        const loadMoreBtns = document.querySelectorAll('.load-more-btn');
        
        loadMoreBtns.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                
                const postType = this.dataset.postType;
                const currentPage = parseInt(this.dataset.page) || 1;
                const maxPages = parseInt(this.dataset.maxPages) || 1;
                
                if (currentPage >= maxPages) return;
                
                // Show loading state
                this.classList.add('loading');
                this.textContent = 'Loading...';
                
                // AJAX request
                if (typeof ravandehAjax !== 'undefined') {
                    fetch(ravandehAjax.ajaxurl, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: new URLSearchParams({
                            action: `ravandeh_load_more_${postType}s`,
                            paged: currentPage + 1,
                            lang: ravandehAjax.currentLang,
                            nonce: ravandehAjax.nonce
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            const container = document.querySelector(`.${postType}s-grid`);
                            if (container) {
                                container.insertAdjacentHTML('beforeend', data.data.html);
                            }
                            
                            // Update button state
                            this.dataset.page = data.data.current_page;
                            this.classList.remove('loading');
                            this.textContent = this.dataset.text;
                            
                            if (data.data.current_page >= data.data.max_pages) {
                                this.style.display = 'none';
                            }
                        }
                    })
                    .catch(error => {
                        console.error('Error loading more posts:', error);
                        this.classList.remove('loading');
                    });
                }
            });
        });
    }

    // Initialize load more if buttons exist
    if (document.querySelector('.load-more-btn')) {
        initLoadMore();
    }

})();
