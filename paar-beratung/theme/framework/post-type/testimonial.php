<?php
// Register Custom Post Type
function jws_theme_add_post_type_testimonial() {
    // Register taxonomy
    $labels = array(
            'name'              => esc_html_x( 'Testimonial Category', 'taxonomy general name', 'medicare' ),
            'singular_name'     => esc_html_x( 'Testimonial Category', 'taxonomy singular name', 'medicare' ),
            'search_items'      => esc_html__( 'Search Testimonial Category', 'medicare' ),
            'all_items'         => esc_html__( 'All Testimonial Category', 'medicare' ),
            'parent_item'       => esc_html__( 'Parent Testimonial Category', 'medicare' ),
            'parent_item_colon' => esc_html__( 'Parent Testimonial Category:', 'medicare' ),
            'edit_item'         => esc_html__( 'Edit Testimonial Category', 'medicare' ),
            'update_item'       => esc_html__( 'Update Testimonial Category', 'medicare' ),
            'add_new_item'      => esc_html__( 'Add New Testimonial Category', 'medicare' ),
            'new_item_name'     => esc_html__( 'New Testimonial Category Name', 'medicare' ),
            'menu_name'         => esc_html__( 'Testimonial Category', 'medicare' ),
    );

    $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'testimonial_category' ),
    );
    if(function_exists('custom_reg_taxonomy')) {
        custom_reg_taxonomy( 'testimonial_category', array( 'testimonial' ), $args );
    }
    //Register tags
    $labels = array(
            'name'              => esc_html_x( 'Testimonial Tag', 'taxonomy general name', 'medicare' ),
            'singular_name'     => esc_html_x( 'Testimonial Tag', 'taxonomy singular name', 'medicare' ),
            'search_items'      => esc_html__( 'Search Testimonial Tag', 'medicare' ),
            'all_items'         => esc_html__( 'All Testimonial Tag', 'medicare' ),
            'parent_item'       => esc_html__( 'Parent Testimonial Tag', 'medicare' ),
            'parent_item_colon' => esc_html__( 'Parent Testimonial Tag:', 'medicare' ),
            'edit_item'         => esc_html__( 'Edit Testimonial Tag', 'medicare' ),
            'update_item'       => esc_html__( 'Update Testimonial Tag', 'medicare' ),
            'add_new_item'      => esc_html__( 'Add New Testimonial Tag', 'medicare' ),
            'new_item_name'     => esc_html__( 'New Testimonial Tag Name', 'medicare' ),
            'menu_name'         => esc_html__( 'Testimonial Tag', 'medicare' ),
    );

    $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'testimonial_tag' ),
    );
    
    if(function_exists('custom_reg_taxonomy')) {
        custom_reg_taxonomy( 'testimonial_tag', array( 'testimonial' ), $args );
    }
    
    //Register post type Testimonial
    $labels = array(
            'name'                => esc_html_x( 'Testimonial', 'Post Type General Name', 'medicare' ),
            'singular_name'       => esc_html_x( 'Testimonial Item', 'Post Type Singular Name', 'medicare' ),
            'menu_name'           => esc_html__( 'Testimonial', 'medicare' ),
            'parent_item_colon'   => esc_html__( 'Parent Item:', 'medicare' ),
            'all_items'           => esc_html__( 'All Items', 'medicare' ),
            'view_item'           => esc_html__( 'View Item', 'medicare' ),
            'add_new_item'        => esc_html__( 'Add New Item', 'medicare' ),
            'add_new'             => esc_html__( 'Add New', 'medicare' ),
            'edit_item'           => esc_html__( 'Edit Item', 'medicare' ),
            'update_item'         => esc_html__( 'Update Item', 'medicare' ),
            'search_items'        => esc_html__( 'Search Item', 'medicare' ),
            'not_found'           => esc_html__( 'Not found', 'medicare' ),
            'not_found_in_trash'  => esc_html__( 'Not found in Trash', 'medicare' ),
    );
    $args = array(
            'label'               => esc_html__( 'Testimonial', 'medicare' ),
            'description'         => esc_html__( 'Testimonial Description', 'medicare' ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats', ),
            'taxonomies'          => array( 'testimonial_category', 'testimonial_tag' ),
            'hierarchical'        => true,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'menu_icon'           => 'dashicons-yes',
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'page',
    );
    
    if(function_exists('custom_reg_post_type')) {
        custom_reg_post_type( 'testimonial', $args );
    }
    
}

// Hook into the 'init' action
add_action( 'init', 'jws_theme_add_post_type_testimonial', 0 );
