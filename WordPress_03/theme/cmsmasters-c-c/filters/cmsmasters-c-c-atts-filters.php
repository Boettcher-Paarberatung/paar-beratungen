<?php
/**
 * @package 	WordPress
 * @subpackage 	Psychology Help
 * @version 	1.0.5
 * 
 * Content Composer Attributes Filters
 * Created by CMSMasters
 * 
 */



// Bar Shortcode Attributes Filter
add_filter('cmsmasters_stat_atts_filter', 'cmsmasters_stat_atts');

function cmsmasters_stat_atts() {
	return array( 
		'subtitle' => 		'', 
		'progress' => 		'0', 
		'icon' => 			'', 
		'color' => 			'', 
		'bg' => 			'', 
		'classes' => 		'' 
	);
}


// Posts Slider Shortcode Attributes Filter
add_filter('cmsmasters_posts_slider_atts_filter', 'cmsmasters_posts_slider_atts');

function cmsmasters_posts_slider_atts() {
	return array( 
		'orderby' => 				'date', 
		'order' => 					'DESC', 
		'post_type' => 				'post', 
		'blog_categories' => 		'', 
		'portfolio_categories' => 	'', 
		'columns' => 				'4', 
		'controls' =>				'', 
		'amount' => 				'1', 
		'count' => 					'12', 
		'pause' => 					'5', 
		'blog_metadata' => 			'title,date,categories,comments,likes,more', 
		'portfolio_metadata' => 	'title,categories,likes', 
		'animation' => 				'', 
		'animation_delay' => 		'', 
		'classes' => 				'', 
		'product_columns' => 		'4', 
		'product_metadata' => 		'rating,title,categories,price', 
		'product_categories' => 	'' 
	);
}


/* Register Admin Panel JS Scripts */
function register_admin_js_scripts() {
	global $pagenow;
	
	
	if ( 
		$pagenow == 'post-new.php' || 
		($pagenow == 'post.php' && isset($_GET['post']) && get_post_type($_GET['post']) != 'attachment') 
	) {
		wp_enqueue_script('composer-shortcodes-extend', get_template_directory_uri() . '/cmsmasters-c-c/js/cmsmasters-c-c-shortcodes-extend.js', array('cmsmasters_composer_shortcodes_js'), '1.0.0', true);
		
		wp_localize_script('composer-shortcodes-extend', 'composer_shortcodes_extend', array( 
			'choice_view' 								=> 		esc_attr__('Views', 'psychology-help'),
			'prog_bar_field_bar_bg_title'				=>      esc_attr__('Custom Bar Color', 'psychology-help'), 
			'blog_field_layout_mode_puzzle'				=> 		esc_attr__('Puzzle', 'psychology-help'), 
			'posts_slider_controls_enable_title'		=> 		esc_attr__('Controls', 'psychology-help')
		));
	}
}

add_action('admin_enqueue_scripts', 'register_admin_js_scripts');

