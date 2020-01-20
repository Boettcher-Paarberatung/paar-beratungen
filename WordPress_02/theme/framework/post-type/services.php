<?php 
// Register Services Custom Post Type
function jws_theme_add_post_type_services() {
    // Register taxonomy
    $labels = array(
            'name'              => esc_html_x( 'Services Category', 'taxonomy general name', 'medicare' ),
            'singular_name'     => esc_html_x( 'Services Category', 'taxonomy singular name', 'medicare' ),
            'search_items'      => esc_html__( 'Search Services Category', 'medicare' ),
            'all_items'         => esc_html__( 'All Services Category', 'medicare' ),
            'parent_item'       => esc_html__( 'Parent Services Category', 'medicare' ),
            'parent_item_colon' => esc_html__( 'Parent Services Category:', 'medicare' ),
            'edit_item'         => esc_html__( 'Edit Services Category', 'medicare' ),
            'update_item'       => esc_html__( 'Update Services Category', 'medicare' ),
            'add_new_item'      => esc_html__( 'Add New Services Category', 'medicare' ),
            'new_item_name'     => esc_html__( 'New Services Category Name', 'medicare' ),
            'menu_name'         => esc_html__( 'Services Category', 'medicare' ),
    );

    $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'services_category' ),
    );
    if(function_exists('custom_reg_taxonomy')) {
        custom_reg_taxonomy( 'services_category', array( 'services' ), $args );
    }
    //Register tags
    $labels = array(
            'name'              => esc_html_x( 'Services Tag', 'taxonomy general name', 'medicare' ),
            'singular_name'     => esc_html_x( 'Services Tag', 'taxonomy singular name', 'medicare' ),
            'search_items'      => esc_html__( 'Search Services Tag', 'medicare' ),
            'all_items'         => esc_html__( 'All Services Tag', 'medicare' ),
            'parent_item'       => esc_html__( 'Parent Services Tag', 'medicare' ),
            'parent_item_colon' => esc_html__( 'Parent Services Tag:', 'medicare' ),
            'edit_item'         => esc_html__( 'Edit Services Tag', 'medicare' ),
            'update_item'       => esc_html__( 'Update Services Tag', 'medicare' ),
            'add_new_item'      => esc_html__( 'Add New Services Tag', 'medicare' ),
            'new_item_name'     => esc_html__( 'New Services Tag Name', 'medicare' ),
            'menu_name'         => esc_html__( 'Services Tag', 'medicare' ),
    );

    $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'services_tag' ),
    );
    
    if(function_exists('custom_reg_taxonomy')) {
        custom_reg_taxonomy( 'services_tag', array( 'Services' ), $args );
    }
    
    //Register post type Services
    $labels = array(
            'name'                => esc_html_x( 'Services', 'Post Type General Name', 'medicare' ),
            'singular_name'       => esc_html_x( 'Services Item', 'Post Type Singular Name', 'medicare' ),
            'menu_name'           => esc_html__( 'Services', 'medicare' ),
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
            'label'               => esc_html__( 'Services', 'medicare' ),
            'description'         => esc_html__( 'Services Description', 'medicare' ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats', ),
            'taxonomies'          => array( 'services_category', 'services_tag' ),
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
        custom_reg_post_type( 'services', $args );
    }
    
}

// Hook into the 'init' action
add_action( 'init', 'jws_theme_add_post_type_services', 0 );
