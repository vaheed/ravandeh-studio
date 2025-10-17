<?php
/**
 * Ravandeh Studio Theme Functions
 * 
 * @package Ravandeh_Studio
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Constants
 */
define('RAVANDEH_VERSION', '1.0.0');
define('RAVANDEH_THEME_DIR', get_template_directory());
define('RAVANDEH_THEME_URI', get_template_directory_uri());

/**
 * Theme Setup
 */
function ravandeh_theme_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(1200, 675, true);

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'ravandeh-studio'),
        'footer'  => __('Footer Menu', 'ravandeh-studio'),
    ));

    // Switch default core markup to output valid HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // Add support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 60,
        'width'       => 250,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Add support for custom background
    add_theme_support('custom-background');

    // Add support for editor styles
    add_theme_support('editor-styles');
    add_editor_style('assets/css/editor-style.css');

    // Add support for wide alignment
    add_theme_support('align-wide');

    // Add support for responsive embeds
    add_theme_support('responsive-embeds');

    // Load theme textdomain for translations
    load_theme_textdomain('ravandeh-studio', RAVANDEH_THEME_DIR . '/languages');
}
add_action('after_setup_theme', 'ravandeh_theme_setup');

/**
 * Include Required Files
 */
require_once RAVANDEH_THEME_DIR . '/inc/custom-post-types.php';
require_once RAVANDEH_THEME_DIR . '/inc/theme-options.php';
require_once RAVANDEH_THEME_DIR . '/inc/customizer.php';
require_once RAVANDEH_THEME_DIR . '/inc/enqueue-scripts.php';
require_once RAVANDEH_THEME_DIR . '/inc/template-functions.php';
require_once RAVANDEH_THEME_DIR . '/inc/ajax-handlers.php';

/**
 * Register Widget Areas
 */
function ravandeh_widgets_init() {
    register_sidebar(array(
        'name'          => __('Footer Column 1', 'ravandeh-studio'),
        'id'            => 'footer-1',
        'description'   => __('Add widgets here to appear in the first footer column.', 'ravandeh-studio'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Column 2', 'ravandeh-studio'),
        'id'            => 'footer-2',
        'description'   => __('Add widgets here to appear in the second footer column.', 'ravandeh-studio'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Column 3', 'ravandeh-studio'),
        'id'            => 'footer-3',
        'description'   => __('Add widgets here to appear in the third footer column.', 'ravandeh-studio'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'ravandeh_widgets_init');

/**
 * Content Width
 */
if (!isset($content_width)) {
    $content_width = 1280;
}

/**
 * Add body classes for RTL and dark mode
 */
function ravandeh_body_classes($classes) {
    $current_lang = get_ravandeh_current_language();
    
    // Add language class
    $classes[] = 'lang-' . $current_lang;
    
    // Add RTL class for Persian
    if ($current_lang === 'fa') {
        $classes[] = 'rtl';
        $classes[] = 'font-vazir';
    }
    
    // Add dark mode class if enabled
    if (isset($_COOKIE['ravandeh_dark_mode']) && $_COOKIE['ravandeh_dark_mode'] === 'true') {
        $classes[] = 'dark';
    }
    
    return $classes;
}
add_filter('body_class', 'ravandeh_body_classes');

/**
 * Add admin notice for Tailwind CSS compilation
 */
function ravandeh_admin_notice() {
    $screen = get_current_screen();
    if ($screen->id === 'themes' || $screen->id === 'appearance_page_ravandeh-options') {
        ?>
        <div class="notice notice-info is-dismissible">
            <p><strong><?php _e('Ravandeh Studio Theme:', 'ravandeh-studio'); ?></strong> <?php _e('This theme uses Tailwind CSS. For production, compile your CSS using: npm run build:css', 'ravandeh-studio'); ?></p>
        </div>
        <?php
    }
}
add_action('admin_notices', 'ravandeh_admin_notice');

/**
 * Filter excerpt length
 */
function ravandeh_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'ravandeh_excerpt_length');

/**
 * Filter excerpt more
 */
function ravandeh_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'ravandeh_excerpt_more');
