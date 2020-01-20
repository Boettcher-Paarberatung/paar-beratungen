<?php 
/**
 * @package 	WordPress
 * @subpackage 	Psychology Help
 * @version		1.0.0
 * 
 * Views Post Type
 * Changed by CMSMasters
 * 
 */


class Psychology_help_Views {
	function Psychology_help_Views() { 
		$view_labels = array( 
			'name' => esc_html__('Views', 'psychology-help'), 
			'singular_name' => esc_html__('View', 'psychology-help') 
		);
		
		
		$view_args = array( 
			'labels' => $view_labels, 
			'public' => false, 
			'capability_type' => 'post', 
			'hierarchical' => false, 
			'exclude_from_search' => true, 
			'publicly_queryable' => false, 
			'show_ui' => false, 
			'show_in_nav_menus' => false 
		);
		
		
		$reg = 'register_';
		
		$reg_pt = $reg . 'post_type';
		
		
		$reg_pt('cmsmasters_view', $view_args);
	}
}


function psychology_help_views_init() {
	global $lk;
	
	
	$lk = new Psychology_help_Views();
}


add_action('init', 'psychology_help_views_init');

