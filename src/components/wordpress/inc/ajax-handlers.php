<?php
/**
 * AJAX Handlers
 * 
 * @package Ravandeh_Studio
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Handle language switch AJAX request
 */
function ravandeh_switch_language() {
    check_ajax_referer('ravandeh_nonce', 'nonce');
    
    $language = isset($_POST['language']) ? sanitize_text_field($_POST['language']) : 'en';
    
    if (!in_array($language, array('en', 'fa'))) {
        wp_send_json_error(array('message' => 'Invalid language'));
    }
    
    // Set cookie for 30 days
    setcookie('ravandeh_language', $language, time() + (30 * 24 * 60 * 60), '/');
    
    wp_send_json_success(array(
        'language' => $language,
        'message' => 'Language switched successfully'
    ));
}
add_action('wp_ajax_ravandeh_switch_language', 'ravandeh_switch_language');
add_action('wp_ajax_nopriv_ravandeh_switch_language', 'ravandeh_switch_language');

/**
 * Handle dark mode toggle AJAX request
 */
function ravandeh_toggle_dark_mode() {
    check_ajax_referer('ravandeh_nonce', 'nonce');
    
    $dark_mode = isset($_POST['dark_mode']) ? sanitize_text_field($_POST['dark_mode']) : 'false';
    
    // Set cookie for 30 days
    setcookie('ravandeh_dark_mode', $dark_mode, time() + (30 * 24 * 60 * 60), '/');
    
    wp_send_json_success(array(
        'dark_mode' => $dark_mode,
        'message' => 'Dark mode toggled successfully'
    ));
}
add_action('wp_ajax_ravandeh_toggle_dark_mode', 'ravandeh_toggle_dark_mode');
add_action('wp_ajax_nopriv_ravandeh_toggle_dark_mode', 'ravandeh_toggle_dark_mode');

/**
 * Load more artists AJAX
 */
function ravandeh_load_more_artists() {
    check_ajax_referer('ravandeh_nonce', 'nonce');
    
    $paged = isset($_POST['paged']) ? absint($_POST['paged']) : 1;
    $lang = isset($_POST['lang']) ? sanitize_text_field($_POST['lang']) : 'en';
    
    $args = array(
        'post_type' => 'artist',
        'posts_per_page' => 6,
        'paged' => $paged,
        'post_status' => 'publish',
    );
    
    $query = new WP_Query($args);
    
    if ($query->have_posts()) {
        ob_start();
        
        while ($query->have_posts()) {
            $query->the_post();
            $artist_data = get_artist_data(get_the_ID(), $lang);
            
            get_template_part('template-parts/content', 'artist', array('data' => $artist_data));
        }
        
        $html = ob_get_clean();
        
        wp_send_json_success(array(
            'html' => $html,
            'max_pages' => $query->max_num_pages,
            'current_page' => $paged,
        ));
    } else {
        wp_send_json_error(array('message' => 'No more artists found'));
    }
    
    wp_reset_postdata();
}
add_action('wp_ajax_ravandeh_load_more_artists', 'ravandeh_load_more_artists');
add_action('wp_ajax_nopriv_ravandeh_load_more_artists', 'ravandeh_load_more_artists');

/**
 * Load more collections AJAX
 */
function ravandeh_load_more_collections() {
    check_ajax_referer('ravandeh_nonce', 'nonce');
    
    $paged = isset($_POST['paged']) ? absint($_POST['paged']) : 1;
    $lang = isset($_POST['lang']) ? sanitize_text_field($_POST['lang']) : 'en';
    
    $args = array(
        'post_type' => 'collection',
        'posts_per_page' => 6,
        'paged' => $paged,
        'post_status' => 'publish',
    );
    
    $query = new WP_Query($args);
    
    if ($query->have_posts()) {
        ob_start();
        
        while ($query->have_posts()) {
            $query->the_post();
            $collection_data = get_collection_data(get_the_ID(), $lang);
            
            get_template_part('template-parts/content', 'collection', array('data' => $collection_data));
        }
        
        $html = ob_get_clean();
        
        wp_send_json_success(array(
            'html' => $html,
            'max_pages' => $query->max_num_pages,
            'current_page' => $paged,
        ));
    } else {
        wp_send_json_error(array('message' => 'No more collections found'));
    }
    
    wp_reset_postdata();
}
add_action('wp_ajax_ravandeh_load_more_collections', 'ravandeh_load_more_collections');
add_action('wp_ajax_nopriv_ravandeh_load_more_collections', 'ravandeh_load_more_collections');
