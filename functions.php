<?php
function theme_style()
{
    // Enqueue stylesheets with version based on file modification time
    wp_enqueue_style('sidebar', get_stylesheet_directory_uri() . '/css/sidebar.css', array(), filemtime(get_stylesheet_directory() . '/css/sidebar.css'), 'all');
    wp_enqueue_style('styleCommon', get_stylesheet_directory_uri() . '/css/styleCommon.css', array(), filemtime(get_stylesheet_directory() . '/css/styleCommon.css'), 'all');
    wp_enqueue_style('pages', get_stylesheet_directory_uri() . '/css/stylelPages.css', array(), filemtime(get_stylesheet_directory() . '/css/stylelPages.css'), 'all');
    wp_enqueue_style('stmedia', get_stylesheet_directory_uri() . '/css/styleMedia.css', array(), filemtime(get_stylesheet_directory() . '/css/styleMedia.css'), 'all');
    wp_enqueue_style('nav', get_stylesheet_directory_uri() . '/css/styleNav.css', array(), filemtime(get_stylesheet_directory() . '/css/styleNav.css'), 'all');
    wp_enqueue_style('slider', get_stylesheet_directory_uri() . '/css/slider.css', array(), filemtime(get_stylesheet_directory() . '/css/slider.css'), 'all');
    wp_enqueue_style('slider-swipe', get_stylesheet_directory_uri() . '/css/swiper.min.css', array(), filemtime(get_stylesheet_directory() . '/css/swiper.min.css'), 'all');
    wp_enqueue_style('style', get_stylesheet_uri(), array(), filemtime(get_stylesheet_directory() . '/style.css'));
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css');

    // Enqueue scripts
    wp_enqueue_script('jQuery-js', 'https://code.jquery.com/jquery-3.7.0.min.js', array(), null, true);
    wp_enqueue_script('bs-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jQuery-js'), null, true);
    wp_enqueue_script('scroll', 'https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js', array('jQuery-js'), null, true);
    wp_enqueue_script('common-js', get_template_directory_uri() . '/js/common.js', array('jQuery-js'), '1.1', true);
    wp_enqueue_script('swiper-js', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/js/swiper.jquery.min.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'theme_style');

/*Navigation*/
function treks_menus()
{
    register_nav_menus(
        array(
            'primary' => __('Primary Menu'), //Main Menu
            'top' => __('Top Menu'), //Main Menu
            'footer' => __('Footer'), //First Footer Menu
        )
    );
}
add_action('after_setup_theme', 'treks_menus');

function new_submenu_class($menu)
{
    $menu = preg_replace('/class="sub-menu"/', '/ class="dropdown" /', $menu);
    return $menu;
}

add_filter('wp_nav_menu', 'new_submenu_class');
/*Featured Image*/
add_theme_support('post-thumbnails');

require_once 'breadcrumbs.php';
require_once 'cptype.php';

/*
 *************************************
 **Custom Post Type for Slider**
 *************************************
 */
function slider_post()
{
    $labels = array(
        'name' => 'Slider',
        'singular_name' => 'Slider',
        'add_new' => 'Add Slider',
        'all_items' => 'Slider',
        'add_new_item' => 'Add Slider',
        'edit_item' => 'Edit Slider',
        'new_item' => 'New Slider',
        'view_item' => 'View Slider',
        'search_item' => 'Search Slider',
        'not_found' => 'No items found',
        'not_found_in_trash' => 'No items found in trash',
        'parent_item_colon' => 'Parent Slider'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions'),
        'menu_position' => 5,
        'menu_icon' => 'dashicons-controls-play',
        'exclude_from_search' => true,
    );
    register_post_type('slider', $args);
}
add_action('init', 'slider_post');



//add_shortcode('CF7_ADD_POST_ID', 'cf7_add_post_id');
//Remove update plugins
remove_action('load-update-core.php', 'wp_update_plugins');
add_filter('pre_site_transient_update_plugins', '__return_null');

/**
 * Removes width and height attributes from image tags
 *
 * @param string $html
 *
 * @return string
 */
function remove_image_size_attributes($html)
{
    return preg_replace('/(width|height)="\d*"/', '', $html);
}

// Remove image size attributes from post thumbnails
add_filter('post_thumbnail_html', 'remove_image_size_attributes');

// Remove image size attributes from images added to a WordPress post
add_filter('image_send_to_editor', 'remove_image_size_attributes');

add_filter('wp_calculate_image_srcset_meta', '__return_null');


add_action('init', 'testimonials_post_type');
function testimonials_post_type()
{
    $labels = array(
        'name' => 'Testimonials',
        'singular_name' => 'Testimonial',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Testimonial',
        'edit_item' => 'Edit Testimonial',
        'new_item' => 'New Testimonial',
        'view_item' => 'View Testimonial',
        'search_items' => 'Search Testimonials',
        'not_found' => 'No Testimonials found',
        'not_found_in_trash' => 'No Testimonials in the trash',
        'parent_item_colon' => '',
    );

    register_post_type('testimonials', array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'exclude_from_search' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 10,
        'supports' => array('editor', 'thumbnail'),
        'register_meta_box_cb' => 'testimonials_meta_boxes', // Callback function for custom metaboxes
    ));
}

add_action('save_post', 'testimonials_save_post');
function testimonials_save_post($post_id)
{
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;

    if (!empty($_POST['testimonials']) && !wp_verify_nonce($_POST['testimonials'], 'testimonials'))
        return;

    if (!empty($_POST['post_type']) && 'page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id))
            return;
    } else {
        if (!current_user_can('edit_post', $post_id))
            return;
    }

    if (!wp_is_post_revision($post_id) && 'testimonials' == get_post_type($post_id)) {
        remove_action('save_post', 'testimonials_save_post');

        wp_update_post(array(
            'ID' => $post_id,
            'post_title' => 'Testimonial - ' . $post_id
        ));

        add_action('save_post', 'testimonials_save_post');
    }

    if (!empty($_POST['testimonial'])) {
        $testimonial_data['client_name'] = (empty($_POST['testimonial']['client_name'])) ? '' : sanitize_text_field($_POST['testimonial']['client_name']);
        $testimonial_data['source'] = (empty($_POST['testimonial']['source'])) ? '' : sanitize_text_field($_POST['testimonial']['source']);
        $testimonial_data['link'] = (empty($_POST['testimonial']['link'])) ? '' : esc_url($_POST['testimonial']['link']);

        update_post_meta($post_id, '_testimonial', $testimonial_data);
    } else {
        delete_post_meta($post_id, '_testimonial');
    }
}
add_filter('manage_edit-testimonials_columns', 'testimonials_edit_columns');
function testimonials_edit_columns($columns)
{
    $columns = array(
        'cb' => '<input type="checkbox" />',
        'title' => 'Title',
        'testimonial' => 'Testimonial',
        // 'testimonial-client-name' => 'Client\'s Name',
        // 'testimonial-source' => 'Business/Site',
        // 'testimonial-link' => 'Link',
        'author' => 'Posted by',
        'date' => 'Date'
    );

    return $columns;
}

add_action('manage_posts_custom_column', 'testimonials_columns', 10, 2);
function testimonials_columns($column, $post_id)
{
    $testimonial_data = get_post_meta($post_id, '_testimonial', true);
    switch ($column) {
        case 'testimonial':
            the_excerpt();
            break;
        // case 'testimonial-client-name':
        //     if ( ! empty( $testimonial_data['client_name'] ) )
        //         echo $testimonial_data['client_name'];
        //     break;
        case 'testimonial-source':
            if (!empty($testimonial_data['source']))
                echo $testimonial_data['source'];
            break;
        // case 'testimonial-link':
        //     if ( ! empty( $testimonial_data['link'] ) )
        //         echo $testimonial_data['link'];
        //     break;
    }
}

/**
 * Display a testimonial
 *
 * @param  int $post_per_page  The number of testimonials you want to display
 * @param  string $orderby  The order by setting  https://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters
 * @param  array $testimonial_id  The ID or IDs of the testimonial(s), comma separated
 *
 * @return  string  Formatted HTML
 */
function get_testimonial($posts_per_page = 1, $orderby = 'none', $testimonial_id = null)
{
    $args = array(
        'posts_per_page' => (int) $posts_per_page,
        'post_type' => 'testimonials',
        'orderby' => $orderby,
        'no_found_rows' => true,
    );
    if ($testimonial_id)
        $args['post__in'] = array($testimonial_id);

    $query = new WP_Query($args);

    $testimonials = '';
    if ($query->have_posts()) {
        while ($query->have_posts()):
            $query->the_post();
            $post_id = get_the_ID();
            $testimonial_data = get_post_meta($post_id, '_testimonial', true);
            $client_name = (empty($testimonial_data['client_name'])) ? '' : $testimonial_data['client_name'];
            $source = (empty($testimonial_data['source'])) ? '' : ' - ' . $testimonial_data['source'];
            $link = (empty($testimonial_data['link'])) ? '' : $testimonial_data['link'];
            $cite = ($link) ? '<a href="' . esc_url($link) . '" target="_blank">' . $client_name . $source . '</a>' : $client_name . $source;

            $testimonials .= '<aside class="testimonial">';
            $testimonials .= '<span class="quote">&ldquo;</span>';
            $testimonials .= '<div class="entry-content">';
            $testimonials .= '<p class="testimonial-text">' . get_the_content() . '<span></span></p>';
            $testimonials .= '<p class="testimonial-client-name"><cite>' . $cite . '</cite>';
            $testimonials .= '</div>';
            $testimonials .= '</aside>';

        endwhile;
        wp_reset_postdata();
    }

    return $testimonials;
}

//function to add custom media field
function custom_team_department_field($form_fields, $attachmentPost)
{
    $parent_post = $attachmentPost->post_parent;
    if ($parent_post != 4372)
        return $form_fields;

    $field_value = get_post_meta($attachmentPost->ID, 'team_department', true);
    $form_fields['team_department'] = array(
        'input' => 'html',
        'label' => __('Department ')
    );
    $form_fields['team_department']['html'] = "<select name='attachments[{$attachmentPost->ID}][team_department]'>";

    $options = array(
        'head_office' => 'Head Office',
        'guide' => 'Guide'
    );

    foreach ($options as $key => $value) {
        $selected = $field_value && $field_value == $key ? 'selected' : '';
        $form_fields['team_department']['html'] .= '<option ' . $selected . ' value="' . $key . '">' . $value . '</option>';
    }
    $form_fields['team_department']['html'] .= '</select>';

    return $form_fields;
}
add_filter('attachment_fields_to_edit', 'custom_team_department_field', 10, 2);

//save your custom media field
function save_team_department($attachment_id)
{
    $parent_post = wp_get_post_parent_id($attachment_id);
    if ($parent_post != 4372)
        return;

    if (isset($_REQUEST['attachments'][$attachment_id]['team_department'])) {
        $team_department = sanitize_text_field($_REQUEST['attachments'][$attachment_id]['team_department']);
        update_post_meta($attachment_id, 'team_department', $team_department);
    }
}
add_action('edit_attachment', 'save_team_department');


function create_team_post_type()
{
    $labels = array(
        'name' => 'Teams',
        'singular_name' => 'Team',
        'menu_name' => 'Teams',
        'name_admin_bar' => 'Team',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Team',
        'new_item' => 'New Team',
        'edit_item' => 'Edit Team',
        'view_item' => 'View Team',
        'all_items' => 'All Teams',
        'search_items' => 'Search Teams',
        'parent_item_colon' => 'Parent Teams:',
        'not_found' => 'No teams found.',
        'not_found_in_trash' => 'No teams found in Trash.',
        'featured_image' => 'Team Image',
        'set_featured_image' => 'Set team image',
        'remove_featured_image' => 'Remove team image',
        'use_featured_image' => 'Use as team image',
        'archives' => 'Team Archives',
        'insert_into_item' => 'Insert into team',
        'uploaded_to_this_item' => 'Uploaded to this team',
        'items_list' => 'Teams list',
        'items_list_navigation' => 'Teams list navigation',
        'filter_items_list' => 'Filter teams list',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'team'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 5,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'show_in_rest' => true, // Enable block editor (Gutenberg) for custom post type
    );

    register_post_type('team', $args);
}
add_action('init', 'create_team_post_type');
function create_team_categories_taxonomy()
{
    $labels = array(
        'name' => 'Team Categories',
        'singular_name' => 'Team Category',
        'search_items' => 'Search Team Categories',
        'all_items' => 'All Team Categories',
        'parent_item' => 'Parent Team Category',
        'parent_item_colon' => 'Parent Team Category:',
        'edit_item' => 'Edit Team Category',
        'update_item' => 'Update Team Category',
        'add_new_item' => 'Add New Team Category',
        'new_item_name' => 'New Team Category Name',
        'menu_name' => 'Team Categories',
    );

    $args = array(
        'hierarchical' => true, // Set to true for a category-like taxonomy (like default WordPress categories)
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'team-category'),
        'show_in_rest' => true, // Enable for Gutenberg editor
    );

    register_taxonomy('team_category', 'team', $args);
}
add_action('init', 'create_team_categories_taxonomy');
