<?php
// Register Doctor Custom Post Type

function jws_theme_add_post_type_doctor() {
    // Register taxonomy
    $labels = array(
            'name'              => esc_html_x( 'Doctor Category', 'taxonomy general name', 'medicare' ),
            'singular_name'     => esc_html_x( 'Doctor Category', 'taxonomy singular name', 'medicare' ),
            'search_items'      => esc_html__( 'Search Doctor Category', 'medicare' ),
            'all_items'         => esc_html__( 'All Doctor Category', 'medicare' ),
            'parent_item'       => esc_html__( 'Parent Doctor Category', 'medicare' ),
            'parent_item_colon' => esc_html__( 'Parent Doctor Category:', 'medicare' ),
            'edit_item'         => esc_html__( 'Edit Doctor Category', 'medicare' ),
            'update_item'       => esc_html__( 'Update Doctor Category', 'medicare' ),
            'add_new_item'      => esc_html__( 'Add New Doctor Category', 'medicare' ),
            'new_item_name'     => esc_html__( 'New Doctor Category Name', 'medicare' ),
            'menu_name'         => esc_html__( 'Doctor Category', 'medicare' ),
    );

    $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'doctor_category' ),
    );
    if(function_exists('custom_reg_taxonomy')) {
        custom_reg_taxonomy( 'doctor_category', array( 'doctor' ), $args );
    }
    //Register tags
    $labels = array(
            'name'              => esc_html_x( 'Doctor Tag', 'taxonomy general name', 'medicare' ),
            'singular_name'     => esc_html_x( 'Doctor Tag', 'taxonomy singular name', 'medicare' ),
            'search_items'      => esc_html__( 'Search Doctor Tag', 'medicare' ),
            'all_items'         => esc_html__( 'All Doctor Tag', 'medicare' ),
            'parent_item'       => esc_html__( 'Parent Doctor Tag', 'medicare' ),
            'parent_item_colon' => esc_html__( 'Parent Doctor Tag:', 'medicare' ),
            'edit_item'         => esc_html__( 'Edit Doctor Tag', 'medicare' ),
            'update_item'       => esc_html__( 'Update Doctor Tag', 'medicare' ),
            'add_new_item'      => esc_html__( 'Add New Doctor Tag', 'medicare' ),
            'new_item_name'     => esc_html__( 'New Doctor Tag Name', 'medicare' ),
            'menu_name'         => esc_html__( 'Doctor Tag', 'medicare' ),
    );

    $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'doctor_tag' ),
    );
    
    if(function_exists('custom_reg_taxonomy')) {
        custom_reg_taxonomy( 'doctor_tag', array( 'Doctor' ), $args );
    }
    
    //Register post type Doctor
    $labels = array(
            'name'                => esc_html_x( 'Doctor', 'Post Type General Name', 'medicare' ),
            'singular_name'       => esc_html_x( 'Doctor Item', 'Post Type Singular Name', 'medicare' ),
            'menu_name'           => esc_html__( 'Doctor', 'medicare' ),
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
            'label'               => esc_html__( 'Doctor', 'medicare' ),
            'description'         => esc_html__( 'Doctor Description', 'medicare' ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats', ),
            'taxonomies'          => array( 'doctor_category', 'doctor_tag' ),
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
        custom_reg_post_type( 'doctor', $args );
    }
    
}

// Hook into the 'init' action
add_action( 'init', 'jws_theme_add_post_type_doctor', 0 );
