<?php
/**
 * Register automatic updates for this theme.
 */

use ProteusThemes\ThemeRegistration\ThemeRegistration;

class MentalPressThemeRegistration {
	function __construct() {
		$this->enable_theme_registration();
	}

	/**
	 * Load theme registration and automatic updates.
	 */
	private function enable_theme_registration() {
		$config = array(
			'item_name'        => 'MentalPress',
			'theme_slug'       => 'mentalpress',
			'item_id'          => 2819,
			'tf_item_id'       => 10676732,
			'customizer_panel' => 'panel_mentalpress',
			'build'            => 'tf',
		);
		$pt_theme_registration = ThemeRegistration::get_instance( $config );
	}
}

if ( ! MENTALPRESS_DEVELOPMENT && ! defined( 'ENVATO_HOSTED_SITE' ) ) {
	$mentalpress_theme_registration = new MentalPressThemeRegistration();
}
