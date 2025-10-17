<?php
/**
 * Template Functions and Helpers
 * 
 * @package Ravandeh_Studio
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Get translated text for current language
 */
function ravandeh_t($key, $en_text, $fa_text) {
    $lang = get_ravandeh_current_language();
    return $lang === 'fa' ? $fa_text : $en_text;
}

/**
 * Get artist meta data
 */
function get_artist_data($post_id, $lang = null) {
    if ($lang === null) {
        $lang = get_ravandeh_current_language();
    }
    
    $data = array(
        'id' => $post_id,
        'name' => $lang === 'fa' ? get_post_meta($post_id, '_artist_name_fa', true) : get_the_title($post_id),
        'bio' => $lang === 'fa' ? get_post_meta($post_id, '_artist_bio_fa', true) : get_the_excerpt($post_id),
        'specialty' => $lang === 'fa' ? get_post_meta($post_id, '_artist_specialty_fa', true) : get_post_meta($post_id, '_artist_specialty', true),
        'image' => get_the_post_thumbnail_url($post_id, 'large'),
        'permalink' => get_permalink($post_id),
    );
    
    return $data;
}

/**
 * Get collection meta data
 */
function get_collection_data($post_id, $lang = null) {
    if ($lang === null) {
        $lang = get_ravandeh_current_language();
    }
    
    $data = array(
        'id' => $post_id,
        'title' => $lang === 'fa' ? get_post_meta($post_id, '_collection_title_fa', true) : get_the_title($post_id),
        'description' => $lang === 'fa' ? get_post_meta($post_id, '_collection_description_fa', true) : get_the_excerpt($post_id),
        'year' => get_post_meta($post_id, '_collection_year', true),
        'pieces' => get_post_meta($post_id, '_collection_pieces', true),
        'image' => get_the_post_thumbnail_url($post_id, 'large'),
        'permalink' => get_permalink($post_id),
    );
    
    return $data;
}

/**
 * Display glass card component
 */
function ravandeh_glass_card($args = array()) {
    $defaults = array(
        'title' => '',
        'description' => '',
        'image' => '',
        'link' => '#',
        'meta' => '',
        'class' => '',
    );
    
    $args = wp_parse_args($args, $defaults);
    ?>
    <a href="<?php echo esc_url($args['link']); ?>" class="glass-card group block <?php echo esc_attr($args['class']); ?>">
        <?php if ($args['image']): ?>
        <div class="glass-card-image">
            <img src="<?php echo esc_url($args['image']); ?>" alt="<?php echo esc_attr($args['title']); ?>" class="w-full h-full object-cover" />
        </div>
        <?php endif; ?>
        
        <div class="glass-card-content">
            <?php if ($args['meta']): ?>
            <div class="glass-card-meta">
                <?php echo esc_html($args['meta']); ?>
            </div>
            <?php endif; ?>
            
            <?php if ($args['title']): ?>
            <h3 class="glass-card-title">
                <?php echo esc_html($args['title']); ?>
            </h3>
            <?php endif; ?>
            
            <?php if ($args['description']): ?>
            <p class="glass-card-description">
                <?php echo esc_html($args['description']); ?>
            </p>
            <?php endif; ?>
        </div>
    </a>
    <?php
}

/**
 * Display social media links
 */
function ravandeh_social_links($class = '') {
    $email = get_option('ravandeh_contact_email', 'hello@ravandeh.studio');
    $instagram = get_option('ravandeh_contact_instagram', 'ravandeh.studio');
    $twitter = get_option('ravandeh_contact_twitter', 'ravandehstudio');
    ?>
    <div class="social-links <?php echo esc_attr($class); ?>">
        <?php if ($email): ?>
        <a href="mailto:<?php echo esc_attr($email); ?>" class="social-link" aria-label="Email">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect width="20" height="16" x="2" y="4" rx="2"/>
                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
            </svg>
        </a>
        <?php endif; ?>
        
        <?php if ($instagram): ?>
        <a href="https://instagram.com/<?php echo esc_attr($instagram); ?>" class="social-link" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect width="20" height="20" x="2" y="2" rx="5" ry="5"/>
                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
                <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/>
            </svg>
        </a>
        <?php endif; ?>
        
        <?php if ($twitter): ?>
        <a href="https://twitter.com/<?php echo esc_attr($twitter); ?>" class="social-link" target="_blank" rel="noopener noreferrer" aria-label="Twitter">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"/>
            </svg>
        </a>
        <?php endif; ?>
    </div>
    <?php
}

/**
 * Display language toggle
 */
function ravandeh_language_toggle() {
    $current_lang = get_ravandeh_current_language();
    ?>
    <button id="language-toggle" 
            class="language-toggle" 
            data-lang="<?php echo esc_attr($current_lang); ?>"
            aria-label="<?php echo $current_lang === 'en' ? 'Switch to Persian' : 'Switch to English'; ?>">
        <span class="lang-label"><?php echo $current_lang === 'en' ? 'FA' : 'EN'; ?></span>
    </button>
    <?php
}

/**
 * Display dark mode toggle
 */
function ravandeh_dark_mode_toggle() {
    ?>
    <button id="dark-mode-toggle" 
            class="dark-mode-toggle" 
            aria-label="Toggle dark mode">
        <svg class="sun-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="4"/>
            <path d="M12 2v2"/>
            <path d="M12 20v2"/>
            <path d="m4.93 4.93 1.41 1.41"/>
            <path d="m17.66 17.66 1.41 1.41"/>
            <path d="M2 12h2"/>
            <path d="M20 12h2"/>
            <path d="m6.34 17.66-1.41 1.41"/>
            <path d="m19.07 4.93-1.41 1.41"/>
        </svg>
        <svg class="moon-icon hidden" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"/>
        </svg>
    </button>
    <?php
}

/**
 * Get navigation menu items with language support
 */
function ravandeh_get_nav_items() {
    $lang = get_ravandeh_current_language();
    
    $items = array(
        array(
            'label_en' => 'Collections',
            'label_fa' => 'مجموعه‌ها',
            'url' => '#collections',
        ),
        array(
            'label_en' => 'Artists',
            'label_fa' => 'هنرمندان',
            'url' => '#artists',
        ),
        array(
            'label_en' => 'About',
            'label_fa' => 'درباره',
            'url' => '#about',
        ),
        array(
            'label_en' => 'Contact',
            'label_fa' => 'تماس',
            'url' => '#contact',
        ),
    );
    
    return $items;
}

/**
 * Pagination
 */
function ravandeh_pagination() {
    global $wp_query;
    
    if ($wp_query->max_num_pages <= 1) {
        return;
    }
    
    $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
    $max = intval($wp_query->max_num_pages);
    
    echo '<nav class="pagination" role="navigation">';
    
    if ($paged > 1) {
        echo '<a href="' . get_pagenum_link($paged - 1) . '" class="pagination-prev">' . __('Previous', 'ravandeh-studio') . '</a>';
    }
    
    echo '<div class="pagination-numbers">';
    for ($i = 1; $i <= $max; $i++) {
        $class = $paged === $i ? 'pagination-number active' : 'pagination-number';
        echo '<a href="' . get_pagenum_link($i) . '" class="' . $class . '">' . $i . '</a>';
    }
    echo '</div>';
    
    if ($paged < $max) {
        echo '<a href="' . get_pagenum_link($paged + 1) . '" class="pagination-next">' . __('Next', 'ravandeh-studio') . '</a>';
    }
    
    echo '</nav>';
}
