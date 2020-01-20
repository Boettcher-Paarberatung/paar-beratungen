<?php

// Register Custom Post Type

function jws_theme_add_post_type_portfolio() {

    // Register taxonomy

    $labels = array(

            'name'              => esc_html_x( 'Portfolio Category', 'taxonomy general name', 'medicare' ),

            'singular_name'     => esc_html_x( 'Portfolio Category', 'taxonomy singular name', 'medicare' ),

            'search_items'      => esc_html__( 'Search Portfolio Category', 'medicare' ),

            'all_items'         => esc_html__( 'All Portfolio Category', 'medicare' ),

            'parent_item'       => esc_html__( 'Parent Portfolio Category', 'medicare' ),

            'parent_item_colon' => esc_html__( 'Parent Portfolio Category:', 'medicare' ),

            'edit_item'         => esc_html__( 'Edit Portfolio Category', 'medicare' ),

            'update_item'       => esc_html__( 'Update Portfolio Category', 'medicare' ),

            'add_new_item'      => esc_html__( 'Add New Portfolio Category', 'medicare' ),

            'new_item_name'     => esc_html__( 'New Portfolio Category Name', 'medicare' ),

            'menu_name'         => esc_html__( 'Portfolio Category', 'medicare' ),

    );



    $args = array(

            'hierarchical'      => true,

            'labels'            => $labels,

            'show_ui'           => true,

            'show_admin_column' => true,

            'query_var'         => true,

            'rewrite'           => array( 'slug' => 'portfolio_category' ),

    );

    if(function_exists('custom_reg_taxonomy')) {

        custom_reg_taxonomy( 'portfolio_category', array( 'portfolio' ), $args );

    }
  

    //Register post type Portfolio

    $labels = array(

            'name'                => esc_html_x( 'Portfolio', 'Post Type General Name', 'medicare' ),

            'singular_name'       => esc_html_x( 'Portfolio Item', 'Post Type Singular Name', 'medicare' ),

            'menu_name'           => esc_html__( 'Portfolio', 'medicare' ),

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

            'label'               => esc_html__( 'Portfolio', 'medicare' ),

            'description'         => esc_html__( 'Portfolio Description', 'medicare' ),

            'labels'              => $labels,

            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', ),

            'taxonomies'          => array( 'portfolio_category', 'portfolio_tag' ),

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

        custom_reg_post_type( 'portfolio', $args );

    }

    

}



// Hook into the 'init' action

add_action( 'init', 'jws_theme_add_post_type_portfolio', 0 );

