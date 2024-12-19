<?php
/*
 *********************************
 **Custom Post Type for Trekking**
 *********************************
 */
function trekking_post() {
    $labels = array(
        'name' => 'Trekking',
        'singular_name' => 'Trekking',
        'add_new' => 'Add Trekking',
        'all_items' => 'Trekking',
        'add_new_item' => 'Add Trekking',
        'edit_item' => 'Edit Trekking',
        'new_item' => 'New Trekking',
        'view_item' => 'View Trekking',
        'search_item' => 'Search Trekking',
        'not_found' => 'No items found',
        'not_found_in_trash' => 'No items found in trash',
        'parent_item_colon' => 'Parent Trekking'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'trekking'),
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 5,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions'),
        'menu_icon' => 'dashicons-location-alt',
        'exclude_from_search' => false, // Set to false to include in search results
        'show_in_rest' => true, // Enable Gutenberg support
    );
    register_post_type('trekking', $args);
}
add_action('init', 'trekking_post');

/*
 **************************************
 **Custom Post Type for Expedition**
 **************************************
 */
function expedition_post() {
    $labels = array(
        'name' => 'Expedition',
        'singular_name' => 'Expedition',
        'add_new' => 'Add Expedition',
        'all_items' => 'Expeditions',
        'add_new_item' => 'Add Expedition',
        'edit_item' => 'Edit Expedition',
        'new_item' => 'New Expedition',
        'view_item' => 'View Expedition',
        'search_item' => 'Search Expedition',
        'not_found' => 'No items found',
        'not_found_in_trash' => 'No items found in trash',
        'parent_item_colon' => 'Parent Expedition'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'expedition'),
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 5,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions'),
        'menu_icon' => 'dashicons-location',
        'exclude_from_search' => false, // Set to false to include in search results
        'show_in_rest' => true, // Enable Gutenberg support
    );
    register_post_type('expedition', $args);
}
add_action('init', 'expedition_post');

/*
 **************************************
 **Custom Post Type for Peak Climbing**
 **************************************
 */
function peak_post() {
    $labels = array(
        'name' => 'Peak Climbing',
        'singular_name' => 'Peak Climbing',
        'add_new' => 'Add Peak Climbing',
        'all_items' => 'Peak Climbings',
        'add_new_item' => 'Add Peak Climbing',
        'edit_item' => 'Edit Peak Climbing',
        'new_item' => 'New Peak Climbing',
        'view_item' => 'View Peak Climbing',
        'search_item' => 'Search Peak Climbing',
        'not_found' => 'No items found',
        'not_found_in_trash' => 'No items found in trash',
        'parent_item_colon' => 'Parent Peak Climbing'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'peak-climbing'),
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 5,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions'),
        'menu_icon' => 'dashicons-location',
        'exclude_from_search' => false, // Set to false to include in search results
        'show_in_rest' => true, // Enable Gutenberg support
    );
    register_post_type('peak', $args);
}
add_action('init', 'peak_post');

/*
 *****************************************
 **Custom Post Type for Other Activities**
 *****************************************
 */
function other_post() {
    $labels = array(
        'name' => 'Other Activities',
        'singular_name' => 'Other Activity',
        'add_new' => 'Add Activity',
        'all_items' => 'Other Activities',
        'add_new_item' => 'Add Activity',
        'edit_item' => 'Edit Activity',
        'new_item' => 'New Activity',
        'view_item' => 'View Activity',
        'search_item' => 'Search Activity',
        'not_found' => 'No items found',
        'not_found_in_trash' => 'No items found in trash',
        'parent_item_colon' => 'Parent Activity'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'other-activities'),
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 5,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions'),
        'menu_icon' => 'dashicons-location-alt',
        'exclude_from_search' => false, // Set to false to include in search results
        'show_in_rest' => true, // Enable Gutenberg support
    );
    register_post_type('others', $args);
}
add_action('init', 'other_post');

/*
 *****************************
 ***Taxonomies for Trekking***
 *****************************
 */
function trekking_taxonomies() {
    $labels = array(
        'name' => _x('Trekking Categories', 'taxonomy general name'),
        'singular_name' => _x('Trekking Category', 'taxonomy singular name'),
        'search_items' => __('Search Categories'),
        'all_items' => __('All Categories'),
        'parent_item' => __('Parent Category'),
        'parent_item_colon' => __('Parent Category:'),
        'edit_item' => __('Edit Category'),
        'update_item' => __('Update Category'),
        'add_new_item' => __('Add New Category'),
        'new_item_name' => __('New Category Name'),
        'menu_name' => __('Trekking Categories')
    );
    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
    );
    register_taxonomy('treks_category', array('trekking'), $args);
}
add_action('init', 'trekking_taxonomies', 0);

/*
 **********************************
 ***Taxonomies for Expedition***
 **********************************
 */
function expedition_taxonomies() {
    $labels = array(
        'name' => _x('Expedition Categories', 'taxonomy general name'),
        'singular_name' => _x('Expedition Category', 'taxonomy singular name'),
        'search_items' => __('Search Categories'),
        'all_items' => __('All Categories'),
        'parent_item' => __('Parent Category'),
        'parent_item_colon' => __('Parent Category:'),
        'edit_item' => __('Edit Category'),
        'update_item' => __('Update Category'),
        'add_new_item' => __('Add New Category'),
        'new_item_name' => __('New Category Name'),
        'menu_name' => __('Expedition Categories')
    );
    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
    );
    register_taxonomy('expedition_category', 'expedition', $args);
}
add_action('init', 'expedition_taxonomies', 0);

/*
 **********************************
 ***Taxonomies for Peak Climbing***
 **********************************
 */
function peak_taxonomies() {
    $labels = array(
        'name' => _x('Peak Climbing Categories', 'taxonomy general name'),
        'singular_name' => _x('Peak Climbing Category', 'taxonomy singular name'),
        'search_items' => __('Search Categories'),
        'all_items' => __('All Categories'),
        'parent_item' => __('Parent Category'),
        'parent_item_colon' => __('Parent Category:'),
        'edit_item' => __('Edit Category'),
        'update_item' => __('Update Category'),
        'add_new_item' => __('Add New Category'),
        'new_item_name' => __('New Category Name'),
        'menu_name' => __('Peak Climbing Categories')
    );
    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
    );
    register_taxonomy('peak_climbing_category', 'peak', $args);
}
add_action('init', 'peak_taxonomies', 0);

/*
 ***************************************
 ***Taxonomies for Other Activities***
 ***************************************
 */
function other_taxonomies() {
    $labels = array(
        'name' => _x('Other Activity Categories', 'taxonomy general name'),
        'singular_name' => _x('Other Activity Category', 'taxonomy singular name'),
        'search_items' => __('Search Categories'),
        'all_items' => __('All Categories'),
        'parent_item' => __('Parent Category'),
        'parent_item_colon' => __('Parent Category:'),
        'edit_item' => __('Edit Category'),
        'update_item' => __('Update Category'),
        'add_new_item' => __('Add New Category'),
        'new_item_name' => __('New Category Name'),
        'menu_name' => __('Other Activity Categories')
    );
    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
    );
    register_taxonomy('other_activity_category', 'others', $args);
}
add_action('init', 'other_taxonomies', 0);
