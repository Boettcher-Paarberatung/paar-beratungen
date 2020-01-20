<?php

// Register Custom Post Type

function jws_theme_add_post_type_Team() {


    //Register post type Team

    $labels = array(

            'name'                => esc_html_x( 'Team', 'Post Type General Name', 'medicare' ),

            'singular_name'       => esc_html_x( 'Team Item', 'Post Type Singular Name', 'medicare' ),

            'menu_name'           => esc_html__( 'Team', 'medicare' ),

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

            'label'               => esc_html__( 'Team', 'medicare' ),

            'description'         => esc_html__( 'Team Description', 'medicare' ),

            'labels'              => $labels,

            'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'revisions', ),

            'hierarchical'        => true,

            'public'              => true,

            'show_ui'             => true,

            'show_in_menu'        => true,

            'show_in_nav_menus'   => true,

            'show_in_admin_bar'   => true,

            'menu_position'       => 5,

            'menu_icon'           => 'dashicons-groups',

            'can_export'          => true,

            'has_archive'         => true,

            'exclude_from_search' => false,

            'publicly_queryable'  => true,

            'capability_type'     => 'page',

    );

    

    if(function_exists('custom_reg_post_type')) {

        custom_reg_post_type( 'Team', $args );

    }

    

}



// Hook into the 'init' action

add_action( 'init', 'jws_theme_add_post_type_Team', 0 );

