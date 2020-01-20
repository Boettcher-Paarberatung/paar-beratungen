<?php
/**
 * Helper functions
 *
 * @package MentalPress
 */



/**
 * comments_number() does not use _n function, here we are to fix that
 * @return void
 */
if ( ! function_exists( 'mentalpress_pretty_comments_number' ) ) {
	function mentalpress_pretty_comments_number() {
		global $post;
		printf(
			/* translators: %s represents a number */
			_n( '%s Comment', '%s Comments', get_comments_number(), 'mentalpress_wp' ), number_format_i18n( get_comments_number() )
		);
	}
}



/**
 * Prepare the srcset attribute value.
 * @param  int $img_id ID of the image
 * @uses http://codex.wordpress.org/Function_Reference/wp_get_attachment_image_src
 * @return string
 */
if ( ! function_exists( 'mentalpress_get_slide_sizes' ) ) {
	function mentalpress_get_slide_sizes( $img_id ) {
		$srcset = array();

		$sizes = array( 'jumbotron-slider-s', 'jumbotron-slider-l' );

		foreach ( $sizes as $size ) {
			$img = wp_get_attachment_image_src( $img_id, $size );
			$srcset[] = sprintf( '%s %sw', $img[0], $img[1] );
		}

		return implode( ', ' , $srcset );
	}
}



/**
 * Check if WooCommerce is active
 * @return boolean
 */
if ( ! function_exists( 'is_woocommerce_active' ) ) {
	function is_woocommerce_active() {
		return class_exists( 'Woocommerce' );
	}
}



/**
 * Check if Ecwid plugin is active
 * @return boolean
 */
if ( ! function_exists( 'is_ecwid_active' ) ) {
	function is_ecwid_active() {
		return defined( 'ECWID_PLUGIN_DIR' );
	}
}



/**
 * Return array of the number which represent the layout of the footer.
 * @return array
 */
if ( ! function_exists( 'mentalpress_footer_widgets_layout_array' ) ) {
	function mentalpress_footer_widgets_layout_array() {
		$layout = get_theme_mod( 'footer_widgets_layout', '[4,6,8]' );
		$layout = json_decode( $layout );

		if ( is_array( $layout ) && ! empty( $layout ) ) {
			$spans = array( (int)$layout[0] );

			for ( $i = 0; $i < ( sizeof( $layout ) - 1 ); $i++ ) {
				$spans[] = $layout[$i+1] - $layout[$i];
			}

			$spans[] = 12 - $layout[$i];

			return $spans;
		}
		else if ( 1 === $layout ) { // single column
			return array( '12' );
		}

		// default: disable footer
		return array();
	}
}


/**
 * Return url with Google Fonts.
 *
 * @see https://github.com/grappler/wp-standard-handles/blob/master/functions.php
 * @return string Google fonts URL for the theme.
 */
function mentalpress_google_web_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = array( 'latin' );

	$fonts = apply_filters( 'pre_google_web_fonts', $fonts );

	foreach ( $fonts as $key => $value ) {
		$fonts[ $key ] = $key . ':' . implode( ',', $value );
	}

	/* translators: To add an additional character subset specific to your language, translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language. */
	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'mentalpress_wp' );
	if ( 'cyrillic' == $subset ) {
		array_push( $subsets, 'cyrillic', 'cyrillic-ext' );
	} elseif ( 'greek' == $subset ) {
		array_push( $subsets, 'greek', 'greek-ext' );
	} elseif ( 'devanagari' == $subset ) {
		array_push( $subsets, 'devanagari' );
	} elseif ( 'vietnamese' == $subset ) {
		array_push( $subsets, 'vietnamese' );
	}

	$subsets = apply_filters( 'subsets_google_web_fonts', $subsets );

	if ( $fonts ) {
		$fonts_url = add_query_arg(
			array(
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( implode( ',', array_unique( $subsets ) ) ),
			),
			'//fonts.googleapis.com/css'
		);
	}

	return apply_filters( 'google_web_fonts_url', $fonts_url );
}


/**
 * Get the Google maps API URL with API key.
 */
if ( ! function_exists( 'mentalpress_get_google_maps_api_url' ) ) {
	function mentalpress_get_google_maps_api_url() {
		$google_maps_api_url = '//maps.google.com/maps/api/js';
		$google_maps_api_key = get_theme_mod( 'google_maps_api_key', '' );

		if ( ! empty( $google_maps_api_key ) ) {
			$google_maps_api_url = add_query_arg( 'key', $google_maps_api_key, $google_maps_api_url );
		}

		return $google_maps_api_url;
	}
}
