<?php
/**
 * Custom Post Types for Ravandeh Studio Theme
 * 
 * Registers Artists and Collections custom post types
 * 
 * @package Ravandeh_Studio
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Custom Post Type: Artists
 */
function ravandeh_register_artist_post_type() {
    $labels = array(
        'name'                  => _x('Artists', 'Post Type General Name', 'ravandeh-studio'),
        'singular_name'         => _x('Artist', 'Post Type Singular Name', 'ravandeh-studio'),
        'menu_name'             => __('Artists', 'ravandeh-studio'),
        'name_admin_bar'        => __('Artist', 'ravandeh-studio'),
        'archives'              => __('Artist Archives', 'ravandeh-studio'),
        'attributes'            => __('Artist Attributes', 'ravandeh-studio'),
        'parent_item_colon'     => __('Parent Artist:', 'ravandeh-studio'),
        'all_items'             => __('All Artists', 'ravandeh-studio'),
        'add_new_item'          => __('Add New Artist', 'ravandeh-studio'),
        'add_new'               => __('Add New', 'ravandeh-studio'),
        'new_item'              => __('New Artist', 'ravandeh-studio'),
        'edit_item'             => __('Edit Artist', 'ravandeh-studio'),
        'update_item'           => __('Update Artist', 'ravandeh-studio'),
        'view_item'             => __('View Artist', 'ravandeh-studio'),
        'view_items'            => __('View Artists', 'ravandeh-studio'),
        'search_items'          => __('Search Artist', 'ravandeh-studio'),
        'not_found'             => __('Not found', 'ravandeh-studio'),
        'not_found_in_trash'    => __('Not found in Trash', 'ravandeh-studio'),
        'featured_image'        => __('Artist Photo', 'ravandeh-studio'),
        'set_featured_image'    => __('Set artist photo', 'ravandeh-studio'),
        'remove_featured_image' => __('Remove artist photo', 'ravandeh-studio'),
        'use_featured_image'    => __('Use as artist photo', 'ravandeh-studio'),
        'insert_into_item'      => __('Insert into artist', 'ravandeh-studio'),
        'uploaded_to_this_item' => __('Uploaded to this artist', 'ravandeh-studio'),
        'items_list'            => __('Artists list', 'ravandeh-studio'),
        'items_list_navigation' => __('Artists list navigation', 'ravandeh-studio'),
        'filter_items_list'     => __('Filter artists list', 'ravandeh-studio'),
    );

    $args = array(
        'label'                 => __('Artist', 'ravandeh-studio'),
        'description'           => __('Artists and their works', 'ravandeh-studio'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-admin-users',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
        'rewrite'               => array('slug' => 'artists'),
    );

    register_post_type('artist', $args);
}
add_action('init', 'ravandeh_register_artist_post_type', 0);

/**
 * Register Custom Post Type: Collections
 */
function ravandeh_register_collection_post_type() {
    $labels = array(
        'name'                  => _x('Collections', 'Post Type General Name', 'ravandeh-studio'),
        'singular_name'         => _x('Collection', 'Post Type Singular Name', 'ravandeh-studio'),
        'menu_name'             => __('Collections', 'ravandeh-studio'),
        'name_admin_bar'        => __('Collection', 'ravandeh-studio'),
        'archives'              => __('Collection Archives', 'ravandeh-studio'),
        'attributes'            => __('Collection Attributes', 'ravandeh-studio'),
        'parent_item_colon'     => __('Parent Collection:', 'ravandeh-studio'),
        'all_items'             => __('All Collections', 'ravandeh-studio'),
        'add_new_item'          => __('Add New Collection', 'ravandeh-studio'),
        'add_new'               => __('Add New', 'ravandeh-studio'),
        'new_item'              => __('New Collection', 'ravandeh-studio'),
        'edit_item'             => __('Edit Collection', 'ravandeh-studio'),
        'update_item'           => __('Update Collection', 'ravandeh-studio'),
        'view_item'             => __('View Collection', 'ravandeh-studio'),
        'view_items'            => __('View Collections', 'ravandeh-studio'),
        'search_items'          => __('Search Collection', 'ravandeh-studio'),
        'not_found'             => __('Not found', 'ravandeh-studio'),
        'not_found_in_trash'    => __('Not found in Trash', 'ravandeh-studio'),
        'featured_image'        => __('Collection Image', 'ravandeh-studio'),
        'set_featured_image'    => __('Set collection image', 'ravandeh-studio'),
        'remove_featured_image' => __('Remove collection image', 'ravandeh-studio'),
        'use_featured_image'    => __('Use as collection image', 'ravandeh-studio'),
        'insert_into_item'      => __('Insert into collection', 'ravandeh-studio'),
        'uploaded_to_this_item' => __('Uploaded to this collection', 'ravandeh-studio'),
        'items_list'            => __('Collections list', 'ravandeh-studio'),
        'items_list_navigation' => __('Collections list navigation', 'ravandeh-studio'),
        'filter_items_list'     => __('Filter collections list', 'ravandeh-studio'),
    );

    $args = array(
        'label'                 => __('Collection', 'ravandeh-studio'),
        'description'           => __('Art collections and exhibitions', 'ravandeh-studio'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-portfolio',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
        'rewrite'               => array('slug' => 'collections'),
    );

    register_post_type('collection', $args);
}
add_action('init', 'ravandeh_register_collection_post_type', 0);

/**
 * Add custom meta boxes for Artists
 */
function ravandeh_add_artist_meta_boxes() {
    add_meta_box(
        'ravandeh_artist_details',
        __('Artist Details', 'ravandeh-studio'),
        'ravandeh_artist_meta_box_callback',
        'artist',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'ravandeh_add_artist_meta_boxes');

/**
 * Artist meta box callback
 */
function ravandeh_artist_meta_box_callback($post) {
    wp_nonce_field('ravandeh_artist_meta_box', 'ravandeh_artist_meta_box_nonce');
    
    $name_fa = get_post_meta($post->ID, '_artist_name_fa', true);
    $bio_fa = get_post_meta($post->ID, '_artist_bio_fa', true);
    $specialty = get_post_meta($post->ID, '_artist_specialty', true);
    $specialty_fa = get_post_meta($post->ID, '_artist_specialty_fa', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="artist_name_fa"><?php _e('Name (Persian)', 'ravandeh-studio'); ?></label></th>
            <td><input type="text" id="artist_name_fa" name="artist_name_fa" value="<?php echo esc_attr($name_fa); ?>" class="regular-text" dir="rtl" /></td>
        </tr>
        <tr>
            <th><label for="artist_bio_fa"><?php _e('Bio (Persian)', 'ravandeh-studio'); ?></label></th>
            <td><textarea id="artist_bio_fa" name="artist_bio_fa" rows="5" class="large-text" dir="rtl"><?php echo esc_textarea($bio_fa); ?></textarea></td>
        </tr>
        <tr>
            <th><label for="artist_specialty"><?php _e('Specialty (English)', 'ravandeh-studio'); ?></label></th>
            <td><input type="text" id="artist_specialty" name="artist_specialty" value="<?php echo esc_attr($specialty); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="artist_specialty_fa"><?php _e('Specialty (Persian)', 'ravandeh-studio'); ?></label></th>
            <td><input type="text" id="artist_specialty_fa" name="artist_specialty_fa" value="<?php echo esc_attr($specialty_fa); ?>" class="regular-text" dir="rtl" /></td>
        </tr>
    </table>
    <?php
}

/**
 * Save artist meta box data
 */
function ravandeh_save_artist_meta_box_data($post_id) {
    if (!isset($_POST['ravandeh_artist_meta_box_nonce'])) {
        return;
    }

    if (!wp_verify_nonce($_POST['ravandeh_artist_meta_box_nonce'], 'ravandeh_artist_meta_box')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $fields = array('artist_name_fa', 'artist_bio_fa', 'artist_specialty', 'artist_specialty_fa');

    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, '_' . $field, sanitize_text_field($_POST[$field]));
        }
    }
}
add_action('save_post', 'ravandeh_save_artist_meta_box_data');

/**
 * Add custom meta boxes for Collections
 */
function ravandeh_add_collection_meta_boxes() {
    add_meta_box(
        'ravandeh_collection_details',
        __('Collection Details', 'ravandeh-studio'),
        'ravandeh_collection_meta_box_callback',
        'collection',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'ravandeh_add_collection_meta_boxes');

/**
 * Collection meta box callback
 */
function ravandeh_collection_meta_box_callback($post) {
    wp_nonce_field('ravandeh_collection_meta_box', 'ravandeh_collection_meta_box_nonce');
    
    $title_fa = get_post_meta($post->ID, '_collection_title_fa', true);
    $description_fa = get_post_meta($post->ID, '_collection_description_fa', true);
    $year = get_post_meta($post->ID, '_collection_year', true);
    $pieces = get_post_meta($post->ID, '_collection_pieces', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="collection_title_fa"><?php _e('Title (Persian)', 'ravandeh-studio'); ?></label></th>
            <td><input type="text" id="collection_title_fa" name="collection_title_fa" value="<?php echo esc_attr($title_fa); ?>" class="regular-text" dir="rtl" /></td>
        </tr>
        <tr>
            <th><label for="collection_description_fa"><?php _e('Description (Persian)', 'ravandeh-studio'); ?></label></th>
            <td><textarea id="collection_description_fa" name="collection_description_fa" rows="5" class="large-text" dir="rtl"><?php echo esc_textarea($description_fa); ?></textarea></td>
        </tr>
        <tr>
            <th><label for="collection_year"><?php _e('Year', 'ravandeh-studio'); ?></label></th>
            <td><input type="number" id="collection_year" name="collection_year" value="<?php echo esc_attr($year); ?>" class="small-text" /></td>
        </tr>
        <tr>
            <th><label for="collection_pieces"><?php _e('Number of Pieces', 'ravandeh-studio'); ?></label></th>
            <td><input type="number" id="collection_pieces" name="collection_pieces" value="<?php echo esc_attr($pieces); ?>" class="small-text" /></td>
        </tr>
    </table>
    <?php
}

/**
 * Save collection meta box data
 */
function ravandeh_save_collection_meta_box_data($post_id) {
    if (!isset($_POST['ravandeh_collection_meta_box_nonce'])) {
        return;
    }

    if (!wp_verify_nonce($_POST['ravandeh_collection_meta_box_nonce'], 'ravandeh_collection_meta_box')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $fields = array('collection_title_fa', 'collection_description_fa', 'collection_year', 'collection_pieces');

    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, '_' . $field, sanitize_text_field($_POST[$field]));
        }
    }
}
add_action('save_post', 'ravandeh_save_collection_meta_box_data');
