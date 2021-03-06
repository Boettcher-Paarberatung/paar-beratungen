<?php
/**
* Include the TGM_Plugin_Activation class.
*/
require_once get_template_directory() . '/framework/admin/tgm-plugin-activation/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'jws_theme_theme_register_required_plugins' );
/**  * Register the required plugins for this theme.
*
*  <snip />
*
* This function is hooked into tgmpa_init, which is fired within the
* TGM_Plugin_Activation class constructor.
*/
if(!function_exists('jws_theme_theme_register_required_plugins')){
function jws_theme_theme_register_required_plugins() {
	/*
	* Array of plugin arrays. Required keys are name and slug.
	* If the source is NOT from the .org repo, then source is also required.
	*/
	$plugins = array(
		array(
			'name' => __('JWS Plugins','medicare'),
			'slug' => 'jwsplugins',
			'source' => 'http://jwsuperthemes.com/plugins/jwsplugins.zip',
			'required' => true,
			'version' => '1.0.0',
		),			
		array(
			'name' => __('Revolution Slider','medicare'),
			'slug' => 'revslider',
			'source' => 'http://jwsuperthemes.com/plugins/revslider.zip',
			'required' => true,
			'version' => '6.1.3',
		),
		array(
			'name' => __('WPBakery Page Builder','medicare'),
			'slug' => 'js_composer',
			'source' => 'http://jwsuperthemes.com/plugins/js_composer.zip',
			'required' => true,
			'version' => '6.0.5',
		),
		array(
			'name' => __('Newsletter','medicare'),
			'slug' => 'newsletter',			
			'required' => false,			
		),
		array(
			'name' => __('Unyson','medicare'),
			'slug' => 'unyson',		
			'required' => false,			
		),
		array(
			'name' => __('WP User Avatar','medicare'),
			'slug' => 'wp-user-avatar',		
			'required' => false,			
		),
		array(
			'name' => __('Contact Form 7','medicare'),
			'slug' => 'contact-form-7',
			'required' => false,
		)
	);
	/*
	* Array of configuration settings. Amend each line as needed.
	*
	* TGMPA will start providing localized text strings soon. If you already have translations of our standard
	* strings available, please help us make TGMPA even better by giving us access to these translations or by
	* sending in a pull-request with .po file(s) with the translations.
	*
	* Only uncomment the strings in the config array if you want to customize the strings.
	*/
	$config = array(
	'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
	'default_path' => '',                      // Default absolute path to bundled plugins.
	'menu'         => 'tgmpa-install-plugins', // Menu slug.
	'parent_slug'  => 'themes.php',            // Parent menu slug.
	'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
	'has_notices'  => true,                    // Show admin notices or not.
	'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
	'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
	'is_automatic' => false,                   // Automatically activate plugins after installation or not.
	'message'      => '',                      // Message to output right before the plugins table.		
	);
	tgmpa( $plugins, $config );
}
}