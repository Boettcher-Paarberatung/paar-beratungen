<?php

// Create Textarea for Webmaster Copy 'n Paste

function textarea_func($atts) {

	$a = shortcode_atts( array(
		'img'   => 'img',
		'url'   => 'url',
		'title' => 'title'
 	), $atts );

	$return = '<textarea class="webmaster_textarea" rows="5"><img src="https://www.diana-boettcher.de/'.esc_attr($a['img']).'" alt="'.esc_attr($a['title']).'"><p>Quelle: <a href="https://www.diana-boettcher.de/'.esc_attr($a['url']).'">'.esc_attr($a['title']).'</a> von <a href="https://www.diana-boettcher.de">Paartherapie, Paarberatung & Eheberatung Berlin Prenzlauer Berg - Praxis Diana Boettcher</a></p></textarea>';

	return $return;
}

add_shortcode('textarea', 'textarea_func' );




?>