<?php

// Register Custom Post Type

function jws_theme_add_post_type_gallery() {

    // Register taxonomy
    $labels = array(
            'name'              => esc_html_x( 'Gallery Category', 'taxonomy general name', 'medicare' ),
            'singular_name'     => esc_html_x( 'Gallery Category', 'taxonomy singular name', 'medicare' ),
            'search_items'      => esc_html__( 'Search Gallery Category', 'medicare' ),
            'all_items'         => esc_html__( 'All Gallery Category', 'medicare' ),
            'parent_item'       => esc_html__( 'Parent Gallery Category', 'medicare' ),
            'parent_item_colon' => esc_html__( 'Parent Gallery Category:', 'medicare' ),
            'edit_item'         => esc_html__( 'Edit Gallery Category', 'medicare' ),
            'update_item'       => esc_html__( 'Update Gallery Category', 'medicare' ),
            'add_new_item'      => esc_html__( 'Add New Gallery Category', 'medicare' ),
            'new_item_name'     => esc_html__( 'New Gallery Category Name', 'medicare' ),
            'menu_name'         => esc_html__( 'Gallery Category', 'medicare' ),
    );
    $args = array(

            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'gallery_category' ),
    );
    if(function_exists('custom_reg_taxonomy')) {
        custom_reg_taxonomy( 'gallery_category', array( 'gallery' ), $args );
    }  

    //Register post type Gallery
    $labels = array(
            'name'                => esc_html_x( 'Gallery', 'Post Type General Name', 'medicare' ),
            'singular_name'       => esc_html_x( 'Gallery Item', 'Post Type Singular Name', 'medicare' ),
            'menu_name'           => esc_html__( 'Gallery', 'medicare' ),
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
            'label'               => esc_html__( 'Gallery', 'medicare' ),
            'description'         => esc_html__( 'Gallery Description', 'medicare' ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', ),
            'taxonomies'          => array( 'gallery_category', 'gallery_tag' ),
            'hierarchical'        => true,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'menu_icon'           => 'dashicons-pressthis',
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'page',
    );

    if(function_exists('custom_reg_post_type')) {
        custom_reg_post_type( 'gallery', $args );
    }
}


// Hook into the 'init' action

add_action( 'init', 'jws_theme_add_post_type_gallery', 0 );

