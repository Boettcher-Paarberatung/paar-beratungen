<?php
/**
 * Shortcodes for MentalPress WP theme defined
 *
 * @package MentalPress
 */


/**
 * Shortcode for Font Awesome
 * @param  array $atts
 * @return string HTML
 */
if ( ! function_exists( 'mentalpress_fa_shortcode' ) ) {
	function mentalpress_fa_shortcode( $atts ) {
		extract( shortcode_atts( array(
			'icon'   => 'fa-home',
			'href'   => '',
			'target' => '_self',
		), $atts ) );

		if ( empty( $href ) ) {
			return '<span class="icon-container"><span class="fa ' . esc_attr( strtolower( $icon ) ) . '"></span></span>';
		}
		else if ( 'fa-envelope' === $icon || 'fa-envelope-o' === $icon || 'fa-envelope-square' === $icon ) {
			return '<a class="icon-container" href="mailto:' . esc_url( $href ) . '" target="' . esc_attr( $target ) . '"><span class="fa ' . esc_attr( strtolower( $icon ) ) . '"></span></a>';
		}
		else {
			return '<a class="icon-container" href="' . esc_url( $href ) . '" target="' . esc_attr( $target ) . '"><span class="fa ' . esc_attr( strtolower( $icon ) ) . '"></span></a>';
		}
	}
	add_shortcode( 'fa', 'mentalpress_fa_shortcode' );
}


/**
 * Shortcode for Buttons
 * @param  array $atts
 * @return string HTML
 */
if ( ! function_exists( 'mentalpress_button_shortcode' ) ) {
	function mentalpress_button_shortcode( $atts , $content = '' ) {
		extract( shortcode_atts( array(
			'style'     => 'primary',
			'href'      => '#',
			'target'    => '_self',
			'corners'   => '',
			'fa'        => null,
			'fullwidth' => false,
			'css'       => '',
		), $atts ) );

		return sprintf( '<a class="btn  btn-%1$s%2$s%3$s" href="%4$s" target="%5$s"%8$s>%6$s%7$s</a>',
			esc_attr( strtolower( $style ) ), // 1
			'rounded' == $corners  ? '  btn-rounded' : '', // 2
			true == $fullwidth  ? '  fullwidth' : '', // 3
			esc_url( $href ), // 4
			esc_attr( $target ), // 5
			isset( $fa )  ? '<i class="fa ' . $fa . '"></i> ' : '', // 6
			$content, // 7
			empty( $css ) ? '' : ' style="' . esc_attr( $css ) . '"' // 8
		);
	}
	add_shortcode( 'button', 'mentalpress_button_shortcode' );
}