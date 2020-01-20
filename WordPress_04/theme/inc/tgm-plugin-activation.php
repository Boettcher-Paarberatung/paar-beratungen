<?php
/**
 * Loading the remote and local plugins when the theme is activated
 *
 * For reference see file vendor/tgm/plugin-activation/example.php
 *
 * @package TGM-Plugin-Activation
 */

/**
 * Register the required plugins for this theme.
 */
function mentalpress_register_required_plugins() {

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		array(
			'name'     => 'Advanced Custom Fields',
			'slug'     => 'advanced-custom-fields',
			'required' => true,
			'force_activation'   => true,
			'force_deactivation' => true,
		),
		array(
			'name'               => 'ACF Repeater Field',
			'slug'               => 'acf-repeater',
			'source'             => get_template_directory() . '/bundled-plugins/acf-repeater-v2.zip',
			'required'           => true,
			'version'            => '2.1.0',
			'force_activation'   => true,
			'force_deactivation' => true,
			'external_url'       => 'http://www.advancedcustomfields.com/add-ons/repeater-field/',
		),
		array(
			'name'               => 'ProteusWidgets',
			'slug'               => 'proteuswidgets',
			'source'             => get_template_directory() . '/bundled-plugins/proteuswidgets.zip',
			'required'           => true,
			'version'            => '1.1.2', // should in sync with bin/get-bundled-plugins.sh, var pwVersion
			'force_activation'   => true,
			'force_deactivation' => false,
		),
		array(
			'name'               => 'Page Builder by SiteOrigin',
			'slug'               => 'siteorigin-panels',
			'required'           => true,
			'version'            => '2.0',
		),
		array(
			'name'               => 'One Click Demo Import',
			'slug'               => 'one-click-demo-import',
			'required'           => true,
		),
		array(
			'name'               => 'Black Studio TinyMCE Widget',
			'slug'               => 'black-studio-tinymce-widget',
			'required'           => false,
		),
		array(
			'name'               => 'Contact Form 7',
			'slug'               => 'contact-form-7',
			'required'           => false,
		),
		array(
			'name'               => 'Simple Lightbox',
			'slug'               => 'simple-lightbox',
			'required'           => false,
		),
		array(
			'name'               => 'WooCommerce - excelling eCommerce',
			'slug'               => 'woocommerce',
			'required'           => false,
		),
	);

	// Let the magic happen!
	tgmpa( $plugins );
}
add_action( 'tgmpa_register', 'mentalpress_register_required_plugins' );
