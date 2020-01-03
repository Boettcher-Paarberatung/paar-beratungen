<?php
/**
 * Compatibility hooks for MentalPress WP theme.
 *
 * For 3rd party plugins/features.
 *
 * @package MentalPress
 */



/**
 * Add custom separator as an option for the Breadcrumbs NavXT plugin when the plugin is activated
 */
if ( ! function_exists( 'mentalpress_custom_hseparator' ) ) {
	function mentalpress_custom_hseparator() {
		add_option( 'bcn_options', array( 'hseparator' => '' ) );
	}
	add_action( 'activate_breadcrumb-navxt/breadcrumb-navxt.php', 'mentalpress_custom_hseparator', 90 );
}