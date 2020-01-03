<?php
function jws_theme_testimonial_slider_func($atts, $content = null) {
    extract(shortcode_atts(array(
		'tpl' => '',
		'testimonial_category' =>'',
		'posts_per_page' => -1,
		'columns'		 => 3,
		'orderby' => 'none',
        'order' => 'none',
        'el_class' => '',
        'show_image' => 1,
		'crop_image' => '',
		'width_image' => '',
		'height_image' => '',
		'show_title' => '',
        'show_patient' => '',
        'show_excerpt' => 1,
		'testimonial_category' =>'',
		'excerpt_length' => 50,
        'excerpt_more' => '',
    ), $atts));
			
    $class = array();
    $class[] = 'tb-testimonial-slider';
	$class[] = 'tb-testimonial-slider'. intval( $columns );
	$tpl = ! empty( $tpl ) ? esc_attr( $tpl ) : 'tpl1';
    $class[] = $tpl;
    $class[] = $el_class;
	
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	
    $args = array(
        'posts_per_page' => $posts_per_page,
        'paged' => $paged,
        'orderby' => $orderby,
        'order' => $order,
        'post_type' => 'testimonial',
        'post_status' => 'publish');
	
    if (isset($testimonial_category) && $testimonial_category != '') {
        $cats = explode(',', $testimonial_category);
        $testimonial_category = array();
        foreach ((array) $cats as $cat) :
			$testimonial_category[] = trim($cat);
        endforeach;
        $args['tax_query'] = array(
			array(
				'taxonomy' => 'testimonial_category',
				'field' => 'id',
				'terms' => $testimonial_category
			)
		);
    }
	
    $wp_query = new WP_Query($args);
	
    ob_start();
	
	if ( $wp_query->have_posts() ) {
		?>
		<div class="<?php echo esc_attr(implode(' ', $class)); ?>">
			<?php 
			include( $tpl .'.php' );
			wp_reset_postdata(); ?>
		</div>
		<?php
	}
    return ob_get_clean();
}

if(function_exists('insert_shortcode')) { insert_shortcode('testimonial_slider', 'jws_theme_testimonial_slider_func'); }
