<?php
/**
 * Load the Customizer with some custom extended addons
 *
 * @package MentalPress
 * @link http://codex.wordpress.org/Theme_Customization_API
 */

/**
 * This funtion is only called when the user is actually on the customizer page
 * @param  WP_Customize_Manager $wp_customize
 */
if ( ! function_exists( 'mentalpress_mentalpress_customizer' ) ) {
	function mentalpress_mentalpress_customizer( $wp_customize ) {
		// add required files
		load_template( get_template_directory() . '/inc/customizer/class-pt-customize-setting-dynamic-css.php' );
		load_template( get_template_directory() . '/inc/customizer/class-pt-customize-control-range.php' );
		load_template( get_template_directory() . '/inc/customizer/class-pt-customize-base.php' );

		new MentalPress_Customizer_Base( $wp_customize );
	}
	add_action( 'customize_register', 'mentalpress_mentalpress_customizer' );
}


/**
 * Takes care for the frontend output from the customizer and nothing else
 */
if ( ! function_exists( 'mentalpress_mentalpress_customizer_frontend' ) && ! class_exists( 'MentalPress_Customize_Frontent' ) ) {
	function mentalpress_mentalpress_customizer_frontend() {
		load_template( get_template_directory() . '/inc/customizer/class-pt-customize-frontend.php' );
		new MentalPress_Customize_Frontent();
	}
	add_action( 'init', 'mentalpress_mentalpress_customizer_frontend' );
}
