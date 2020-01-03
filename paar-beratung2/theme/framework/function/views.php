<?php
/**
 * @package 	WordPress
 * @subpackage 	Psychology Help
 * @version		1.1.2
 * 
 * Views Functions
 * Changed by CMSMasters
 * 
 */


function cmsmastersView($show = true) {
	$post_ID = get_the_ID();
	
	
	$ip = getenv('REMOTE_ADDR');
	
	$ip_name = str_replace('.', '-', $ip);
	
	
	$views = (get_post_meta($post_ID, 'cmsmasters_views', true) != '') ? get_post_meta($post_ID, 'cmsmasters_views', true) : '0';
	
	
	$ipPost = new WP_Query(array( 
		'post_type' => 		'cmsmasters_view', 
		'post_status' => 	'draft', 
		'post_parent' => 	$post_ID, 
		'name' => 			$ip_name 
	));
	
	
	$ipCheck = $ipPost->posts;
	
	
	
	if (
		is_single() && 
		(
			!isset($_COOKIE['view-' . $post_ID]) || 
			count($ipCheck) == 0
		)
	) {
		$counter = '<span id="cmsmastersView-' . esc_attr($post_ID) . '" class="cmsmastersView no_active cmsmasters_theme_icon_view"><span>' . esc_html($views) . '</span></span>';
	} elseif (
		isset($_COOKIE['view-' . $post_ID]) || 
		count($ipCheck) != 0
	) {
		$counter = '<span id="cmsmastersView-' . esc_attr($post_ID) . '" class="cmsmastersView active cmsmasters_theme_icon_view"><span>' . esc_html($views) . '</span></span>';
	} else {
		$counter = '<span id="cmsmastersView-' . esc_attr($post_ID) . '" class="cmsmastersView cmsmasters_theme_icon_view"><span>' . esc_html($views) . '</span></span>';
	}
	
	
	if ($show != true) {
		return $counter;
	} else {
		echo psychology_help_return_content($counter);
	}
}

