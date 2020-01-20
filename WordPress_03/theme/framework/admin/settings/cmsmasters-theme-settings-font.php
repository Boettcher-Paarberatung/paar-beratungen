<?php 
/**
 * @package 	WordPress
 * @subpackage 	Psychology Help
 * @version		1.1.2
 * 
 * Admin Panel Fonts Options
 * Created by CMSMasters
 * 
 */


function psychology_help_options_font_tabs() {
	$tabs = array();
	
	$tabs['content'] = esc_attr__('Content', 'psychology-help');
	$tabs['link'] = esc_attr__('Links', 'psychology-help');
	$tabs['nav'] = esc_attr__('Navigation', 'psychology-help');
	$tabs['heading'] = esc_attr__('Heading', 'psychology-help');
	$tabs['other'] = esc_attr__('Other', 'psychology-help');
	
	return $tabs;
}


function psychology_help_options_font_sections() {
	$tab = psychology_help_get_the_tab();
	
	switch ($tab) {
	case 'content':
		$sections = array();
		
		$sections['content_section'] = esc_html__('Content Font Options', 'psychology-help');
		
		break;
	case 'link':
		$sections = array();
		
		$sections['link_section'] = esc_html__('Links Font Options', 'psychology-help');
		
		break;
	case 'nav':
		$sections = array();
		
		$sections['nav_section'] = esc_html__('Navigation Font Options', 'psychology-help');
		
		break;
	case 'heading':
		$sections = array();
		
		$sections['heading_section'] = esc_html__('Headings Font Options', 'psychology-help');
		
		break;
	case 'other':
		$sections = array();
		
		$sections['other_section'] = esc_html__('Other Fonts Options', 'psychology-help');
		
		break;
	}
	
	return $sections;
} 


function psychology_help_options_font_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = psychology_help_get_the_tab();
	}
	
	
	$cmsmasters_option = psychology_help_get_global_options();
	
	
	$options = array();
	
	switch ($tab) {
	case 'content':
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'psychology-help' . '_content_font', 
			'title' => esc_html__('Main Content Font', 'psychology-help'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Source+Sans+Pro:300,300italic,400,400italic,600,600italic,700,700italic', 
				'font_size' => 			'15', 
				'line_height' => 		'24', 
				'font_weight' => 		'400', 
				'font_style' => 		'normal' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style' 
			) 
		);
		
		break;
	case 'link':
		$options[] = array( 
			'section' => 'link_section', 
			'id' => 'psychology-help' . '_link_font', 
			'title' => esc_html__('Links Font', 'psychology-help'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Source+Sans+Pro:300,300italic,400,400italic,600,600italic,700,700italic', 
				'font_size' => 			'14', 
				'line_height' => 		'24', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'link_section', 
			'id' => 'psychology-help' . '_link_hover_decoration', 
			'title' => esc_html__('Links Hover Text Decoration', 'psychology-help'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => 'none', 
			'choices' => psychology_help_text_decoration_list() 
		);
		
		break;
	case 'nav':
		$options[] = array( 
			'section' => 'nav_section', 
			'id' => 'psychology-help' . '_nav_title_font', 
			'title' => esc_html__('Navigation Title Font', 'psychology-help'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Source+Sans+Pro:300,300italic,400,400italic,600,600italic,700,700italic', 
				'font_size' => 			'14', 
				'line_height' => 		'20', 
				'font_weight' => 		'600', 
				'font_style' => 		'normal', 
				'text_transform' => 	'uppercase' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform' 
			) 
		);
		
		$options[] = array( 
			'section' => 'nav_section', 
			'id' => 'psychology-help' . '_nav_dropdown_font', 
			'title' => esc_html__('Navigation Dropdown Font', 'psychology-help'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Source+Sans+Pro:300,300italic,400,400italic,600,600italic,700,700italic', 
				'font_size' => 			'13', 
				'line_height' => 		'40', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform' 
			) 
		);
		
		break;
	case 'heading':
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => 'psychology-help' . '_h1_font', 
			'title' => esc_html__('H1 Tag Font', 'psychology-help'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Source+Sans+Pro:300,300italic,400,400italic,600,600italic,700,700italic', 
				'font_size' => 			'36', 
				'line_height' => 		'42', 
				'font_weight' => 		'bold', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => 'psychology-help' . '_h2_font', 
			'title' => esc_html__('H2 Tag Font', 'psychology-help'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Source+Sans+Pro:300,300italic,400,400italic,600,600italic,700,700italic', 
				'font_size' => 			'22', 
				'line_height' => 		'30', 
				'font_weight' => 		'bold', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => 'psychology-help' . '_h3_font', 
			'title' => esc_html__('H3 Tag Font', 'psychology-help'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Source+Sans+Pro:300,300italic,400,400italic,600,600italic,700,700italic',  
				'font_size' => 			'20', 
				'line_height' => 		'28', 
				'font_weight' => 		'bold', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => 'psychology-help' . '_h4_font', 
			'title' => esc_html__('H4 Tag Font', 'psychology-help'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Source+Sans+Pro:300,300italic,400,400italic,600,600italic,700,700italic',  
				'font_size' => 			'18', 
				'line_height' => 		'26', 
				'font_weight' => 		'600', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => 'psychology-help' . '_h5_font', 
			'title' => esc_html__('H5 Tag Font', 'psychology-help'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Source+Sans+Pro:300,300italic,400,400italic,600,600italic,700,700italic', 
				'font_size' => 			'16', 
				'line_height' => 		'22', 
				'font_weight' => 		'600', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => 'psychology-help' . '_h6_font', 
			'title' => esc_html__('H6 Tag Font', 'psychology-help'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Source+Sans+Pro:300,300italic,400,400italic,600,600italic,700,700italic', 
				'font_size' => 			'14', 
				'line_height' => 		'20', 
				'font_weight' => 		'600', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		break;
	case 'other':
		$options[] = array( 
			'section' => 'other_section', 
			'id' => 'psychology-help' . '_button_font', 
			'title' => esc_html__('Button Font', 'psychology-help'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Source+Sans+Pro:300,300italic,400,400italic,600,600italic,700,700italic', 
				'font_size' => 			'12', 
				'line_height' => 		'36', 
				'font_weight' => 		'bold', 
				'font_style' => 		'normal', 
				'text_transform' => 	'uppercase' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform' 
			) 
		);
		
		$options[] = array( 
			'section' => 'other_section', 
			'id' => 'psychology-help' . '_small_font', 
			'title' => esc_html__('Small Tag Font', 'psychology-help'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Droid+Serif:400,400italic,700,700italic',
				'font_size' => 			'12', 
				'line_height' => 		'20', 
				'font_weight' => 		'normal', 
				'font_style' => 		'italic', 
				'text_transform' => 	'none' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform' 
			) 
		);
		
		$options[] = array( 
			'section' => 'other_section', 
			'id' => 'psychology-help' . '_input_font', 
			'title' => esc_html__('Text Fields Font', 'psychology-help'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Droid+Serif:400,400italic,700,700italic',
				'font_size' => 			'13', 
				'line_height' => 		'22', 
				'font_weight' => 		'normal', 
				'font_style' => 		'italic' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style' 
			) 
		);
		
		$options[] = array( 
			'section' => 'other_section', 
			'id' => 'psychology-help' . '_quote_font', 
			'title' => esc_html__('Blockquote Font', 'psychology-help'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Droid+Serif:400,400italic,700,700italic', 
				'font_size' => 			'18', 
				'line_height' => 		'32', 
				'font_weight' => 		'normal', 
				'font_style' => 		'italic' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style' 
			) 
		);
		
		break;
	}
	
	return $options;	
}

