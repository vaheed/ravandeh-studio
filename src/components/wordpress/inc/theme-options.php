<?php
/**
 * Theme Options and Settings
 * 
 * @package Ravandeh_Studio
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Get current language from cookie or default to English
 */
function get_ravandeh_current_language() {
    if (isset($_COOKIE['ravandeh_language'])) {
        return $_COOKIE['ravandeh_language'] === 'fa' ? 'fa' : 'en';
    }
    return 'en';
}

/**
 * Get translated option value
 */
function get_ravandeh_option($key, $lang = null) {
    if ($lang === null) {
        $lang = get_ravandeh_current_language();
    }
    
    $option_key = "ravandeh_{$key}_{$lang}";
    return get_option($option_key, '');
}

/**
 * Add theme options page
 */
function ravandeh_add_options_page() {
    add_menu_page(
        __('Ravandeh Options', 'ravandeh-studio'),
        __('Ravandeh Options', 'ravandeh-studio'),
        'manage_options',
        'ravandeh-options',
        'ravandeh_options_page_html',
        'dashicons-art',
        61
    );
}
add_action('admin_menu', 'ravandeh_add_options_page');

/**
 * Register theme settings
 */
function ravandeh_register_settings() {
    // Register settings for hero section
    register_setting('ravandeh_options_group', 'ravandeh_hero_title_en');
    register_setting('ravandeh_options_group', 'ravandeh_hero_title_fa');
    register_setting('ravandeh_options_group', 'ravandeh_hero_subtitle_en');
    register_setting('ravandeh_options_group', 'ravandeh_hero_subtitle_fa');
    register_setting('ravandeh_options_group', 'ravandeh_hero_cta_en');
    register_setting('ravandeh_options_group', 'ravandeh_hero_cta_fa');
    
    // Register settings for about section
    register_setting('ravandeh_options_group', 'ravandeh_about_title_en');
    register_setting('ravandeh_options_group', 'ravandeh_about_title_fa');
    register_setting('ravandeh_options_group', 'ravandeh_about_description_en');
    register_setting('ravandeh_options_group', 'ravandeh_about_description_fa');
    
    // Register settings for contact info
    register_setting('ravandeh_options_group', 'ravandeh_contact_email');
    register_setting('ravandeh_options_group', 'ravandeh_contact_instagram');
    register_setting('ravandeh_options_group', 'ravandeh_contact_twitter');
    register_setting('ravandeh_options_group', 'ravandeh_contact_title_en');
    register_setting('ravandeh_options_group', 'ravandeh_contact_title_fa');
    register_setting('ravandeh_options_group', 'ravandeh_contact_description_en');
    register_setting('ravandeh_options_group', 'ravandeh_contact_description_fa');
    
    // Register settings for collections section
    register_setting('ravandeh_options_group', 'ravandeh_collections_title_en');
    register_setting('ravandeh_options_group', 'ravandeh_collections_title_fa');
    register_setting('ravandeh_options_group', 'ravandeh_collections_description_en');
    register_setting('ravandeh_options_group', 'ravandeh_collections_description_fa');
    
    // Register settings for artists section
    register_setting('ravandeh_options_group', 'ravandeh_artists_title_en');
    register_setting('ravandeh_options_group', 'ravandeh_artists_title_fa');
    register_setting('ravandeh_options_group', 'ravandeh_artists_description_en');
    register_setting('ravandeh_options_group', 'ravandeh_artists_description_fa');
    
    // Site name and tagline
    register_setting('ravandeh_options_group', 'ravandeh_site_name_en');
    register_setting('ravandeh_options_group', 'ravandeh_site_name_fa');
    register_setting('ravandeh_options_group', 'ravandeh_tagline_en');
    register_setting('ravandeh_options_group', 'ravandeh_tagline_fa');
}
add_action('admin_init', 'ravandeh_register_settings');

/**
 * Theme options page HTML
 */
function ravandeh_options_page_html() {
    if (!current_user_can('manage_options')) {
        return;
    }
    
    // Show success message if settings were saved
    if (isset($_GET['settings-updated'])) {
        add_settings_error('ravandeh_messages', 'ravandeh_message', __('Settings Saved', 'ravandeh-studio'), 'updated');
    }
    
    settings_errors('ravandeh_messages');
    ?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <p><?php _e('Configure your bilingual content for the Ravandeh Studio theme. All fields support both English and Persian (Farsi).', 'ravandeh-studio'); ?></p>
        
        <form action="options.php" method="post">
            <?php
            settings_fields('ravandeh_options_group');
            ?>
            
            <!-- Site Information -->
            <h2><?php _e('Site Information', 'ravandeh-studio'); ?></h2>
            <table class="form-table">
                <tr>
                    <th scope="row"><label for="ravandeh_site_name_en"><?php _e('Site Name (English)', 'ravandeh-studio'); ?></label></th>
                    <td><input type="text" id="ravandeh_site_name_en" name="ravandeh_site_name_en" value="<?php echo esc_attr(get_option('ravandeh_site_name_en', 'Ravandeh Studio')); ?>" class="regular-text" /></td>
                </tr>
                <tr>
                    <th scope="row"><label for="ravandeh_site_name_fa"><?php _e('Site Name (Persian)', 'ravandeh-studio'); ?></label></th>
                    <td><input type="text" id="ravandeh_site_name_fa" name="ravandeh_site_name_fa" value="<?php echo esc_attr(get_option('ravandeh_site_name_fa', 'استودیو رَوَنده')); ?>" class="regular-text" dir="rtl" /></td>
                </tr>
                <tr>
                    <th scope="row"><label for="ravandeh_tagline_en"><?php _e('Tagline (English)', 'ravandeh-studio'); ?></label></th>
                    <td><input type="text" id="ravandeh_tagline_en" name="ravandeh_tagline_en" value="<?php echo esc_attr(get_option('ravandeh_tagline_en', 'Where Art Meets Light')); ?>" class="regular-text" /></td>
                </tr>
                <tr>
                    <th scope="row"><label for="ravandeh_tagline_fa"><?php _e('Tagline (Persian)', 'ravandeh-studio'); ?></label></th>
                    <td><input type="text" id="ravandeh_tagline_fa" name="ravandeh_tagline_fa" value="<?php echo esc_attr(get_option('ravandeh_tagline_fa', 'جایی که هنر با نور ملاقات می‌کند')); ?>" class="regular-text" dir="rtl" /></td>
                </tr>
            </table>
            
            <!-- Hero Section -->
            <h2><?php _e('Hero Section', 'ravandeh-studio'); ?></h2>
            <table class="form-table">
                <tr>
                    <th scope="row"><label for="ravandeh_hero_title_en"><?php _e('Hero Title (English)', 'ravandeh-studio'); ?></label></th>
                    <td><input type="text" id="ravandeh_hero_title_en" name="ravandeh_hero_title_en" value="<?php echo esc_attr(get_option('ravandeh_hero_title_en', 'Where Art Meets Light')); ?>" class="regular-text" /></td>
                </tr>
                <tr>
                    <th scope="row"><label for="ravandeh_hero_title_fa"><?php _e('Hero Title (Persian)', 'ravandeh-studio'); ?></label></th>
                    <td><input type="text" id="ravandeh_hero_title_fa" name="ravandeh_hero_title_fa" value="<?php echo esc_attr(get_option('ravandeh_hero_title_fa', 'جایی که هنر با نور ملاقات می‌کند')); ?>" class="regular-text" dir="rtl" /></td>
                </tr>
                <tr>
                    <th scope="row"><label for="ravandeh_hero_subtitle_en"><?php _e('Hero Subtitle (English)', 'ravandeh-studio'); ?></label></th>
                    <td><textarea id="ravandeh_hero_subtitle_en" name="ravandeh_hero_subtitle_en" rows="3" class="large-text"><?php echo esc_textarea(get_option('ravandeh_hero_subtitle_en', 'A curated collection of contemporary Persian art, sculpted from glass and motion')); ?></textarea></td>
                </tr>
                <tr>
                    <th scope="row"><label for="ravandeh_hero_subtitle_fa"><?php _e('Hero Subtitle (Persian)', 'ravandeh-studio'); ?></label></th>
                    <td><textarea id="ravandeh_hero_subtitle_fa" name="ravandeh_hero_subtitle_fa" rows="3" class="large-text" dir="rtl"><?php echo esc_textarea(get_option('ravandeh_hero_subtitle_fa', 'مجموعه‌ای منتخب از هنر معاصر ایرانی، پیکرتراشیده از شیشه و حرکت')); ?></textarea></td>
                </tr>
                <tr>
                    <th scope="row"><label for="ravandeh_hero_cta_en"><?php _e('Hero CTA Button (English)', 'ravandeh-studio'); ?></label></th>
                    <td><input type="text" id="ravandeh_hero_cta_en" name="ravandeh_hero_cta_en" value="<?php echo esc_attr(get_option('ravandeh_hero_cta_en', 'Explore Collections')); ?>" class="regular-text" /></td>
                </tr>
                <tr>
                    <th scope="row"><label for="ravandeh_hero_cta_fa"><?php _e('Hero CTA Button (Persian)', 'ravandeh-studio'); ?></label></th>
                    <td><input type="text" id="ravandeh_hero_cta_fa" name="ravandeh_hero_cta_fa" value="<?php echo esc_attr(get_option('ravandeh_hero_cta_fa', 'کاوش مجموعه‌ها')); ?>" class="regular-text" dir="rtl" /></td>
                </tr>
            </table>
            
            <!-- About Section -->
            <h2><?php _e('About Section', 'ravandeh-studio'); ?></h2>
            <table class="form-table">
                <tr>
                    <th scope="row"><label for="ravandeh_about_title_en"><?php _e('About Title (English)', 'ravandeh-studio'); ?></label></th>
                    <td><input type="text" id="ravandeh_about_title_en" name="ravandeh_about_title_en" value="<?php echo esc_attr(get_option('ravandeh_about_title_en', 'About Ravandeh')); ?>" class="regular-text" /></td>
                </tr>
                <tr>
                    <th scope="row"><label for="ravandeh_about_title_fa"><?php _e('About Title (Persian)', 'ravandeh-studio'); ?></label></th>
                    <td><input type="text" id="ravandeh_about_title_fa" name="ravandeh_about_title_fa" value="<?php echo esc_attr(get_option('ravandeh_about_title_fa', 'درباره روندِه')); ?>" class="regular-text" dir="rtl" /></td>
                </tr>
                <tr>
                    <th scope="row"><label for="ravandeh_about_description_en"><?php _e('About Description (English)', 'ravandeh-studio'); ?></label></th>
                    <td><textarea id="ravandeh_about_description_en" name="ravandeh_about_description_en" rows="5" class="large-text"><?php echo esc_textarea(get_option('ravandeh_about_description_en', 'Ravandeh Studio is a digital gallery bridging the gap between Persian artistic traditions and contemporary global art movements.')); ?></textarea></td>
                </tr>
                <tr>
                    <th scope="row"><label for="ravandeh_about_description_fa"><?php _e('About Description (Persian)', 'ravandeh-studio'); ?></label></th>
                    <td><textarea id="ravandeh_about_description_fa" name="ravandeh_about_description_fa" rows="5" class="large-text" dir="rtl"><?php echo esc_textarea(get_option('ravandeh_about_description_fa', 'استودیو روندِه یک گالری دیجیتال است که شکاف بین سنت‌های هنری ایرانی و جنبش‌های هنری جهانی معاصر را پر می‌کند.')); ?></textarea></td>
                </tr>
            </table>
            
            <!-- Contact Section -->
            <h2><?php _e('Contact Information', 'ravandeh-studio'); ?></h2>
            <table class="form-table">
                <tr>
                    <th scope="row"><label for="ravandeh_contact_title_en"><?php _e('Contact Title (English)', 'ravandeh-studio'); ?></label></th>
                    <td><input type="text" id="ravandeh_contact_title_en" name="ravandeh_contact_title_en" value="<?php echo esc_attr(get_option('ravandeh_contact_title_en', 'Get in Touch')); ?>" class="regular-text" /></td>
                </tr>
                <tr>
                    <th scope="row"><label for="ravandeh_contact_title_fa"><?php _e('Contact Title (Persian)', 'ravandeh-studio'); ?></label></th>
                    <td><input type="text" id="ravandeh_contact_title_fa" name="ravandeh_contact_title_fa" value="<?php echo esc_attr(get_option('ravandeh_contact_title_fa', 'تماس با ما')); ?>" class="regular-text" dir="rtl" /></td>
                </tr>
                <tr>
                    <th scope="row"><label for="ravandeh_contact_description_en"><?php _e('Contact Description (English)', 'ravandeh-studio'); ?></label></th>
                    <td><textarea id="ravandeh_contact_description_en" name="ravandeh_contact_description_en" rows="3" class="large-text"><?php echo esc_textarea(get_option('ravandeh_contact_description_en', 'Whether you\'re an artist, collector, or simply passionate about art, we\'d love to hear from you.')); ?></textarea></td>
                </tr>
                <tr>
                    <th scope="row"><label for="ravandeh_contact_description_fa"><?php _e('Contact Description (Persian)', 'ravandeh-studio'); ?></label></th>
                    <td><textarea id="ravandeh_contact_description_fa" name="ravandeh_contact_description_fa" rows="3" class="large-text" dir="rtl"><?php echo esc_textarea(get_option('ravandeh_contact_description_fa', 'چه هنرمند باشید، چه کلکسیونر، یا صرفاً مشتاق هنر، دوست داریم از شما بشنویم.')); ?></textarea></td>
                </tr>
                <tr>
                    <th scope="row"><label for="ravandeh_contact_email"><?php _e('Email', 'ravandeh-studio'); ?></label></th>
                    <td><input type="email" id="ravandeh_contact_email" name="ravandeh_contact_email" value="<?php echo esc_attr(get_option('ravandeh_contact_email', 'hello@ravandeh.studio')); ?>" class="regular-text" /></td>
                </tr>
                <tr>
                    <th scope="row"><label for="ravandeh_contact_instagram"><?php _e('Instagram', 'ravandeh-studio'); ?></label></th>
                    <td><input type="text" id="ravandeh_contact_instagram" name="ravandeh_contact_instagram" value="<?php echo esc_attr(get_option('ravandeh_contact_instagram', 'ravandeh.studio')); ?>" class="regular-text" /></td>
                </tr>
                <tr>
                    <th scope="row"><label for="ravandeh_contact_twitter"><?php _e('Twitter/X', 'ravandeh-studio'); ?></label></th>
                    <td><input type="text" id="ravandeh_contact_twitter" name="ravandeh_contact_twitter" value="<?php echo esc_attr(get_option('ravandeh_contact_twitter', 'ravandehstudio')); ?>" class="regular-text" /></td>
                </tr>
            </table>
            
            <?php submit_button(__('Save Settings', 'ravandeh-studio')); ?>
        </form>
    </div>
    <?php
}
