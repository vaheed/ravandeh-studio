<?php
/**
 * Enqueue Scripts and Styles
 * 
 * @package Ravandeh_Studio
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Enqueue theme styles and scripts
 */
function ravandeh_enqueue_assets() {
    // Enqueue Google Fonts - Vazirmatn for Persian
    wp_enqueue_style(
        'vazirmatn-font',
        'https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;600&display=swap',
        array(),
        RAVANDEH_VERSION
    );
    
    // Enqueue Tailwind CSS (compiled version)
    wp_enqueue_style(
        'ravandeh-tailwind',
        RAVANDEH_THEME_URI . '/assets/css/tailwind.css',
        array(),
        RAVANDEH_VERSION
    );
    
    // Enqueue custom styles
    wp_enqueue_style(
        'ravandeh-custom',
        RAVANDEH_THEME_URI . '/assets/css/custom.css',
        array('ravandeh-tailwind'),
        RAVANDEH_VERSION
    );
    
    // Enqueue theme JavaScript
    wp_enqueue_script(
        'ravandeh-main',
        RAVANDEH_THEME_URI . '/assets/js/main.js',
        array(),
        RAVANDEH_VERSION,
        true
    );
    
    // Localize script for AJAX
    wp_localize_script('ravandeh-main', 'ravandehAjax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('ravandeh_nonce'),
        'currentLang' => get_ravandeh_current_language(),
    ));
    
    // Enqueue animation library (GSAP or similar) - Optional
    wp_enqueue_script(
        'gsap',
        'https://cdn.jsdelivr.net/npm/gsap@3.12.2/dist/gsap.min.js',
        array(),
        '3.12.2',
        true
    );
    
    wp_enqueue_script(
        'gsap-scroll',
        'https://cdn.jsdelivr.net/npm/gsap@3.12.2/dist/ScrollTrigger.min.js',
        array('gsap'),
        '3.12.2',
        true
    );
}
add_action('wp_enqueue_scripts', 'ravandeh_enqueue_assets');

/**
 * Enqueue admin styles
 */
function ravandeh_enqueue_admin_assets($hook) {
    // Only load on our theme options page and post edit screens
    if ($hook === 'toplevel_page_ravandeh-options' || 
        $hook === 'post.php' || 
        $hook === 'post-new.php') {
        
        wp_enqueue_style(
            'ravandeh-admin',
            RAVANDEH_THEME_URI . '/assets/css/admin.css',
            array(),
            RAVANDEH_VERSION
        );
    }
}
add_action('admin_enqueue_scripts', 'ravandeh_enqueue_admin_assets');

/**
 * Add preconnect for Google Fonts
 */
function ravandeh_resource_hints($urls, $relation_type) {
    if (wp_style_is('vazirmatn-font', 'queue') && 'preconnect' === $relation_type) {
        $urls[] = array(
            'href' => 'https://fonts.googleapis.com',
            'crossorigin',
        );
        $urls[] = array(
            'href' => 'https://fonts.gstatic.com',
            'crossorigin',
        );
    }
    return $urls;
}
add_filter('wp_resource_hints', 'ravandeh_resource_hints', 10, 2);
