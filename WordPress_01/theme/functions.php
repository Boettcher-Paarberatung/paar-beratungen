<?php
/** Make Theme Updateable **/

require 'template-parts/theme/plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/YvesWassersleben/DianaBoettcher',
	__FILE__,
	'DianaBoettcher'
);

//Optional: If you're using a private repository, specify the access token like this:
$myUpdateChecker->setAuthentication('c15f726e60e50bb7c21e13a1dd1c810c31adfc9e');

//Optional: Set the branch that contains the stable release.
$myUpdateChecker->setBranch('master');

// Styles

function theme_styles(){

	wp_enqueue_style('fonts', 'https://fonts.googleapis.com/css?family=Open+Sans|Ovo|Great+Vibes');
	wp_enqueue_script('script', get_template_directory_uri().'/script.min.js', array(), true, '1.0.0', true);

}

add_action( 'wp_enqueue_scripts', 'theme_styles' );

// Plugin Styles

function my_deregister_styles() {

	// Google Reviews
	wp_deregister_style('grw_css');


}

add_action( 'wp_print_styles', 'my_deregister_styles', 100 );

// Navwalker Class

require get_parent_theme_file_path( '/inc/wp-bootstrap-navwalker.php' );

// navigation menus

register_nav_menus( array(
		'primary'   => __('Primary Menu'),
		'footer'    => __('Footer Menu'),
		'legal'			=> __('Legal Menu'),
	));

function wpb_theme_setup(){

	add_theme_support('post-thumbnails');

	//Nav Menus
	register_nav_menus(
		array(
			'primary' => __('Primary Menu'),
			)
		);

}

add_action('after_setup_theme', 'wpb_theme_setup');

//exerpt Length

function set_exerpt_lenth(){

	return 20;

}

add_filter('exerpt_length', 'set_exerpt_length');

// Widget Locations

function wpb_init_widgets($id){

	register_sidebar(array(
		'name'          => 'Sidebar',
		'id'            => 'sidebar',
		'before_widget' => '<div class="sidebar-module">',
		'after_widgets' => '</div>',
		'before_title'  => '<h4>',
		'after_title'		=> '</h4>'
	));

	register_sidebar(array(
		'name'          => 'Reviews',
		'id'            => 'reviews',
		'before_widget' => '<div class="reviews">',
		'after_widgets' => '</div>'
	));

	register_sidebar(array(
		'name'          => 'Sticky',
		'id'            => 'sticky',
		'before_widget' => '<div class="sticky">',
		'after_widgets' => '</div>'
	));

	register_sidebar(array(
		'name'          => 'Footer Map',
		'id'            => 'footer-map',
		'before_widget' => '<div class="map"><div class="container-fluid"><div class="row">',
		'after_widgets' => '</div></div></div>'
	));

	register_sidebar(array(
		'name'          => 'Footer Links',
		'id'            => 'footer-links',
		'before_widget' => '<div class="container"><div class="row">',
		'after_widgets' => '</div></div>'
	));

}

add_action('widgets_init', 'wpb_init_widgets');

// Page Excerpts

add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}

/* Remove Images From Yoast Sitemap */

add_filter( 'wpseo_xml_sitemap_img', '__return_false');

/*

Customizer additions

*/

require get_parent_theme_file_path( '/inc/customizer.php');

/*

Shortcodes

*/

require get_parent_theme_file_path('/inc/shortcodes.php');

/*

Functions

*/

require get_parent_theme_file_path('/functions/build_reviews.php');

?>
