<?php
/**
 * Filters for MentalPress WP theme
 *
 * @package MentalPress
 */


/**
* Filter the widgets that the MentalPress theme will need from ProteusWidgets
*/
if ( ! function_exists( 'mentalpress_set_widgets' ) ) {
	function mentalpress_set_widgets() {
		return array(
			// 'widget-author',
			'widget-banner',
			'widget-brochure-box',
			'widget-facebook',
			'widget-featured-page',
			'widget-google-map',
			'widget-icon-box',
			// 'widget-opening-time',
			'widget-social-icons',
			'widget-testimonials',
			'widget-skype',
			'widget-about-us',
		);
	}
	add_filter( 'pw/loaded_widgets', 'mentalpress_set_widgets' );
}



/**
* Filter the Testimonial widget fields that the MentalPress theme will need from ProteusWidgets - Testimonial widget
*/
if ( ! function_exists( 'mentalpress_set_testimonial_settings' ) ) {
	function mentalpress_set_testimonial_settings( $attr ) {
		$attr['number_of_testimonial_per_slide'] = 1;
		$attr['rating'] = false;
		$attr['author_description'] = true;
		return $attr;
	}
	add_filter( 'pw/testimonial_widget', 'mentalpress_set_testimonial_settings' );
}



/**
 * Add shortcodes in widgets
 */
add_filter( 'widget_text', 'do_shortcode' );



/**
 * Custom tag font size
 */
if ( ! function_exists( 'mentalpress_set_tag_cloud_sizes' ) ) {
	function mentalpress_set_tag_cloud_sizes($args) {
		$args['smallest'] = 8;
		$args['largest']  = 12;
		return $args;
	}
	add_filter( 'widget_tag_cloud_args', 'mentalpress_set_tag_cloud_sizes' );
}



/**
 * Custom text after excerpt
 */
if ( ! function_exists( 'mentalpress_excerpt_more' ) ) {
	function mentalpress_excerpt_more( $more ) {
		return _x( ' &hellip;', 'custom read more text after the post excerpts' , 'mentalpress_wp');
	}
	add_filter( 'excerpt_more', 'mentalpress_excerpt_more' );
}



/**
 * Embedded videos and video container around them
 */
if ( ! function_exists( 'mentalpress_custom_oembed_filter' ) ) {
	function mentalpress_custom_oembed_filter( $html, $url ) {
		if (
			false !== strstr( $html, 'youtube.com' ) ||
			false !== strstr( $html, 'wordpress.tv' ) ||
			false !== strstr( $html, 'wordpress.com' ) ||
			false !== strstr( $html, 'vimeo.com')
		) {
			$out = '<div class="embed-responsive  embed-responsive-16by9">' . $html . '</div>';
		} else {
			$out = $html;
		}
		return $out;
	}
	add_filter( 'embed_oembed_html', 'mentalpress_custom_oembed_filter', 10, 2 ) ;
}



/**
 * Filter the dynamic sidebars and alter the BS col classes for the footer wigets
 * @param  array $params
 * @return array
 */
if ( ! function_exists( 'mentalpress_footer_widgets_params' ) ) {
	function mentalpress_footer_widgets_params( $params ) {
		static $counter = 0;
		static $first_row = true;
		$footer_widgets_layout_array = mentalpress_footer_widgets_layout_array();

		if ( $params[0]['id'] === 'footer-widgets' ) {
			// 'before_widget' contains %d, see inc/theme-sidebars.php
			$params[0]['before_widget'] = sprintf( $params[0]['before_widget'], $footer_widgets_layout_array[$counter] );

			// first widget in the any non-first row
			if ( false === $first_row && 0 === $counter ) {
				$params[0]['before_widget'] = '</div><div class="row">' . $params[0]['before_widget'];
			}

			$counter++;
		}

		end( $footer_widgets_layout_array );
		if ( $counter > key( $footer_widgets_layout_array ) ) {
			$counter = 0;
			$first_row = false;
		}

		return $params;
	}
	add_filter( 'dynamic_sidebar_params', 'mentalpress_footer_widgets_params', 9, 1 );
}



/**
 * Filter for MentalPress skin of google maps widget (ProteusWidgets)
 * @param  array $skins
 * @return array
 */
if ( ! function_exists( 'mentalpress_set_google_maps_skins' ) ) {
	function mentalpress_set_google_maps_skins( $skins ) {
		if ( ! isset( $skins['MentalPress'] ) ) {
			$skins['MentalPress'] = '[{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":20}]},{"featureType":"landscape.natural.landcover","elementType":"geometry.fill","stylers":[{"saturation":"17"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f1f1f1"},{"lightness":21}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#dedede"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#dedede"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#a0d6d1"},{"lightness":17}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#9ba7b2"}]}]';
		}

		return $skins;
	}
	add_filter( 'pw/google_map_skins', 'mentalpress_set_google_maps_skins' );
}



/**
* Filter the Featured page widget pw-page-box image size for MentalPress (ProteusWidgets)
*/
if ( ! function_exists( 'mentalpress_set_page_box_image_size' ) ) {
	function mentalpress_set_page_box_image_size( $image ) {
		$image['width'] = 360;
		$image['height'] = 240;
		return $image;
	}
	add_filter( 'pw/featured_page_widget_page_box_image_size', 'mentalpress_set_page_box_image_size' );
}



/**
* Filter the Featured page widget pw-inline image size for MentalPress (ProteusWidgets)
*/
if ( ! function_exists( 'mentalpress_set_inline_image_size' ) ) {
	function mentalpress_set_inline_image_size( $image ) {
		$image['width'] = 100;
		$image['height'] = 70;
		return $image;
	}
	add_filter( 'pw/featured_page_widget_inline_image_size', 'mentalpress_set_inline_image_size' );
}



/**
 * Filter the text in the footer
 */
foreach ( array( 'mentalpress/footer_left_txt', 'mentalpress/footer_right_txt' ) as $mentalpress_filter ) {
	add_filter( $mentalpress_filter, 'wptexturize' );
	add_filter( $mentalpress_filter, 'convert_chars' );
	add_filter( $mentalpress_filter, 'capital_P_dangit' );
}



/**
 * Return Google fonts and sizes
 *
 * @see https://github.com/grappler/wp-standard-handles/blob/master/functions.php
 * @return array Google fonts and sizes.
 */
if ( ! function_exists( 'mentalpress_additional_fonts' ) ) {
	function mentalpress_additional_fonts( $fonts ) {

		/* translators: If there are characters in your language that are not supported by Noto Serif, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Noto Serif font: on or off', 'mentalpress_wp' ) ) {
			$fonts['Merriweather'] = array(
				'400' => '400',
				'700' => '700',
			);
			$fonts['Montserrat'] = array(
				'400' => '400',
				'700' => '700',
			);
		}

		return $fonts;
	}
	add_filter( 'pre_google_web_fonts', 'mentalpress_additional_fonts' );
}



/**
 * Add subsets from customizer, if needed.
 *
 * @return array
 */
if ( ! function_exists( 'mentalpress_subsets_google_web_fonts' ) ) {
	function mentalpress_subsets_google_web_fonts( $subsets ) {
		$additional_subset = get_theme_mod( 'charset_setting', 'latin' );

		array_push( $subsets, $additional_subset );

		return $subsets;
	}
	add_filter( 'subsets_google_web_fonts', 'mentalpress_subsets_google_web_fonts' );
}


/**
 * Define demo import files for One Click Demo Import plugin.
 */
if ( ! function_exists( 'mentalpress_ocdi_import_files' ) ) {
	function mentalpress_ocdi_import_files() {
		return array(
			array(
				'import_file_name'       => 'Mentalpress Import',
				'import_file_url'        => 'http://artifacts.proteusthemes.com/xml-exports/mentalpress-latest.xml',
				'import_widget_file_url' => 'http://artifacts.proteusthemes.com/json-widgets/mentalpress.json'
			),
		);
	}
	add_filter( 'pt-ocdi/import_files', 'mentalpress_ocdi_import_files' );
}


/**
 * After import theme setup for One Click Demo Import plugin.
 */
if ( ! function_exists( 'mentalpress_ocdi_after_import_setup' ) ) {
	function mentalpress_ocdi_after_import_setup() {

		// Menus to Import and assign - you can remove or add as many as you want
		$top_menu  = get_term_by('name', 'Top Menu', 'nav_menu');
		$main_menu = get_term_by('name', 'Main Menu', 'nav_menu');

		set_theme_mod( 'nav_menu_locations', array(
				'top-bar-menu' => $top_menu->term_id,
				'main-menu'    => $main_menu->term_id,
			)
		);

		// Set options for front page and blog page
		$front_page_id = get_page_by_title( 'Home' )->ID;
		$blog_page_id  = get_page_by_title( 'Blog' )->ID;

		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $front_page_id );
		update_option( 'page_for_posts', $blog_page_id );

		// Set WooCommerce pages.
		if ( is_woocommerce_active() ) {
			$shop_page = get_page_by_title( 'Shop' );
			if ( $shop_page ) {
				update_option( 'woocommerce_shop_page_id', $shop_page->ID );
			}

			$cart_page = get_page_by_title( 'Cart' );
			if ( $cart_page ) {
				update_option( 'woocommerce_cart_page_id', $cart_page->ID );
			}

			$checkout_page = get_page_by_title( 'Checkout' );
			if ( $checkout_page ) {
				update_option( 'woocommerce_checkout_page_id', $checkout_page->ID );
			}

			$account_page = get_page_by_title( 'My Account' );
			if ( $account_page ) {
				update_option( 'woocommerce_myaccount_page_id', $account_page->ID );
			}
		}

		// Set logo in customizer
		set_theme_mod( 'logo_img', get_template_directory_uri() . '/assets/images/logo.png' );

		_e( 'After import setup ended!', 'mentalpress_wp' );
	}
	add_action( 'pt-ocdi/after_import', 'mentalpress_ocdi_after_import_setup' );
}


/**
 * Message for manual demo import for One Click Demo Import plugin.
 */
if ( ! function_exists( 'mentalpress_ocdi_message_after_file_fetching_error' ) ) {
	function mentalpress_ocdi_message_after_file_fetching_error() {
		return sprintf( __( 'Please try to manually import the demo data. Here are instructions on how to do that: %sDocumentation: Import XML File%s', 'mentalpress_wp' ), '<a href="https://www.proteusthemes.com/docs/mentalpress/#import-xml-file" target="_blank">', '</a>' );
	}
	add_filter( 'pt-ocdi/message_after_file_fetching_error', 'mentalpress_ocdi_message_after_file_fetching_error' );
}


/**
 * Add PW widgets to Page Builder group and add icon class.
 *
 * @param array $widgets All widgets in page builder list of widgets.
 *
 * @return array
 */
if ( ! function_exists( 'mentalpress_add_icons_to_page_builder_for_pw_widgets' ) ) {
	function mentalpress_add_icons_to_page_builder_for_pw_widgets( $widgets ) {
		foreach ( $widgets as $class => $widget ) {
			if ( strstr( $widget['title'], 'ProteusThemes:' ) ) {
				$widgets[ $class ]['icon']   = 'pw-pb-widget-icon';
				$widgets[ $class ]['groups'] = array( 'pw-widgets' );
			}
		}

		return $widgets;
	}
	add_filter( 'siteorigin_panels_widgets', 'mentalpress_add_icons_to_page_builder_for_pw_widgets', 15 );
}


/**
 * Add another tab section in the Page Builder "add new widget" dialog.
 *
 * @param array $tabs Existing tabs.
 *
 * @return array
 */
if ( ! function_exists( 'mentalpress_siteorigin_panels_add_widgets_dialog_tabs' ) ) {
	function mentalpress_siteorigin_panels_add_widgets_dialog_tabs( $tabs ) {
		$tabs['pw_widgets'] = array(
			'title' => esc_html__( 'ProteusThemes Widgets', 'mentalpress_wp' ),
			'filter' => array(
				'groups' => array( 'pw-widgets' ),
			),
		);

		return $tabs;
	}
	add_filter( 'siteorigin_panels_widget_dialog_tabs', 'mentalpress_siteorigin_panels_add_widgets_dialog_tabs', 15 );
}


// Remove references to SiteOrigin Premium.
add_filter( 'siteorigin_premium_upgrade_teaser', '__return_false' );


if( ! function_exists( 'mentalpress_wpml_change_proteus_widget_ids_upon_duplication' ) ) {
	/**
	 * Change the page ID in the Featured Page, when duplicating a page (with these widgets in it) to a new language.
	 *
	 * @see https://wpml.org/documentation/support/wpml-coding-api/wpml-hooks-reference/#hook-645257
	 *
	 * @param $value_to_filter
	 * @param $target_language
	 * @param $meta_data
	 *
	 * @return string
	 */
	function mentalpress_wpml_change_proteus_widget_ids_upon_duplication( $value_to_filter, $target_language, $meta_data ) {
		if ( ! isset( $meta_data['key'] ) || 'panels_data' !== $meta_data['key'] ) {
			return $value_to_filter;
		}

		$new_value = maybe_unserialize( $value_to_filter );

		if ( ! is_array( $new_value ) || empty( $new_value ) || empty( $new_value['widgets'] ) ) {
			return $value_to_filter;
		}

		$new_value['widgets'] = array_map( function( $widget ) use ( $target_language ) {
			if ( isset( $widget['panels_info']['class'] ) && 'PW_Featured_Page' === $widget['panels_info']['class'] ) {
				$widget['page_id'] = apply_filters( 'wpml_object_id', absint( $widget['page_id'] ), 'page', true, $target_language );
			}

			return $widget;
		}, $new_value['widgets'] );

		return serialize( $new_value );
	}
	add_filter( 'wpml_duplicate_generic_string', 'mentalpress_wpml_change_proteus_widget_ids_upon_duplication', 10, 3 );
}
