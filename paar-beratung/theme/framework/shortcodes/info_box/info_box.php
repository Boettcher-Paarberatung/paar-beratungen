<?php
function jws_theme_info_box_func($atts, $content = null) {
    extract(shortcode_atts(array(
        'tpl' => 'tpl1',
        'heading_1' => '',
        'image_1' => '',
        'align_image1' => '',
        'heading_2' => '',
        'image_2' => '',
        'align_image2' => '',
        'heading_3' => '',
        'image_3' => '',
        'align_image3' => '',
        'link_text' => '',
        'ex_link' => '',
        'promotion_text' => '',
        'promotion_link' => '',
        'el_class' => '',
		/*'crop_image1' => '',
		'width_image1' => '',
		'height_image1' => '',*/
    ), $atts));
	
	$content = wpb_js_remove_wpautop($content, true);
	
    $class = array();
	$class[] = 'tb-info-box-wrap';
	$class[] = $tpl;
	$class[] = $el_class;
	$heading_1 = jws_theme_get_sep_title( $heading_1 );
	$heading_2 = jws_theme_get_sep_title( $heading_2 );
	$heading_3 = jws_theme_get_sep_title( $heading_3 );
    ob_start();
    ?>
		<div class="<?php echo esc_attr(implode(' ', $class)); ?>">
		
			<?php 
			include $tpl.".php"; ?>
		</div>
		
    <?php
    return ob_get_clean();
}
if(function_exists('insert_shortcode')) { insert_shortcode('info_box', 'jws_theme_info_box_func');}
