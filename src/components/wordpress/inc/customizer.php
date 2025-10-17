<?php
/**
 * Theme Customizer
 * 
 * @package Ravandeh_Studio
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Customizer settings
 */
function ravandeh_customize_register($wp_customize) {
    
    // Add Ravandeh Studio Section
    $wp_customize->add_section('ravandeh_colors', array(
        'title'    => __('Ravandeh Colors', 'ravandeh-studio'),
        'priority' => 30,
    ));
    
    // Primary Color
    $wp_customize->add_setting('ravandeh_primary_color', array(
        'default'           => '#6366f1',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ravandeh_primary_color', array(
        'label'    => __('Primary Color', 'ravandeh-studio'),
        'section'  => 'ravandeh_colors',
        'settings' => 'ravandeh_primary_color',
    )));
    
    // Accent Color
    $wp_customize->add_setting('ravandeh_accent_color', array(
        'default'           => '#8b5cf6',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ravandeh_accent_color', array(
        'label'    => __('Accent Color', 'ravandeh-studio'),
        'section'  => 'ravandeh_colors',
        'settings' => 'ravandeh_accent_color',
    )));
    
    // Add Hero Section
    $wp_customize->add_section('ravandeh_hero', array(
        'title'    => __('Hero Section', 'ravandeh-studio'),
        'priority' => 40,
    ));
    
    // Hero Background Image
    $wp_customize->add_setting('ravandeh_hero_bg_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'ravandeh_hero_bg_image', array(
        'label'    => __('Hero Background Image', 'ravandeh-studio'),
        'section'  => 'ravandeh_hero',
        'settings' => 'ravandeh_hero_bg_image',
    )));
    
    // Add Footer Section
    $wp_customize->add_section('ravandeh_footer', array(
        'title'    => __('Footer Settings', 'ravandeh-studio'),
        'priority' => 50,
    ));
    
    // Footer Copyright Text
    $wp_customize->add_setting('ravandeh_footer_copyright', array(
        'default'           => '© 2025 Ravandeh Studio',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('ravandeh_footer_copyright', array(
        'label'    => __('Copyright Text', 'ravandeh-studio'),
        'section'  => 'ravandeh_footer',
        'settings' => 'ravandeh_footer_copyright',
        'type'     => 'text',
    ));
}
add_action('customize_register', 'ravandeh_customize_register');

/**
 * Output custom CSS from customizer
 */
function ravandeh_customizer_css() {
    $primary_color = get_theme_mod('ravandeh_primary_color', '#6366f1');
    $accent_color = get_theme_mod('ravandeh_accent_color', '#8b5cf6');
    ?>
    <style type="text/css">
        :root {
            --color-primary-custom: <?php echo esc_attr($primary_color); ?>;
            --color-accent-custom: <?php echo esc_attr($accent_color); ?>;
        }
        
        .glass-card:hover {
            border-color: <?php echo esc_attr($primary_color); ?>40;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, <?php echo esc_attr($primary_color); ?>, <?php echo esc_attr($accent_color); ?>);
        }
    </style>
    <?php
}
add_action('wp_head', 'ravandeh_customizer_css');
