<?php 
/**
 * @package 	WordPress
 * @subpackage 	Psychology Help
 * @version 	1.1.2
 * 
 * Admin Panel General Options
 * Created by CMSMasters
 * 
 */


function psychology_help_options_general_tabs() {
	$cmsmasters_option = psychology_help_get_global_options();
	
	$tabs = array();
	
	$tabs['general'] = esc_attr__('General', 'psychology-help');
	
	if ($cmsmasters_option['psychology-help' . '_theme_layout'] === 'boxed') {
		$tabs['bg'] = esc_attr__('Background', 'psychology-help');
	}
	
	$tabs['header'] = esc_attr__('Header', 'psychology-help');
	$tabs['content'] = esc_attr__('Content', 'psychology-help');
	$tabs['footer'] = esc_attr__('Footer', 'psychology-help');
	
	return $tabs;
}


function psychology_help_options_general_sections() {
	$tab = psychology_help_get_the_tab();
	
	switch ($tab) {
	case 'general':
		$sections = array();
		
		$sections['general_section'] = esc_attr__('General Options', 'psychology-help');
		
		break;
	case 'bg':
		$sections = array();
		
		$sections['bg_section'] = esc_attr__('Background Options', 'psychology-help');
		
		break;
	case 'header':
		$sections = array();
		
		$sections['header_section'] = esc_attr__('Header Options', 'psychology-help');
		
		break;
	case 'content':
		$sections = array();
		
		$sections['content_section'] = esc_attr__('Content Options', 'psychology-help');
		
		break;
	case 'footer':
		$sections = array();
		
		$sections['footer_section'] = esc_attr__('Footer Options', 'psychology-help');
		
		break;
	}
	
	return $sections;
} 


function psychology_help_options_general_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = psychology_help_get_the_tab();
	}
	
	$options = array();
	
	switch ($tab) {
	case 'general':
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'psychology-help' . '_theme_layout', 
			'title' => esc_html__('Theme Layout', 'psychology-help'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'liquid', 
			'choices' => array( 
				esc_html__('Liquid', 'psychology-help') . '|liquid', 
				esc_html__('Boxed', 'psychology-help') . '|boxed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'psychology-help' . '_logo_type', 
			'title' => esc_html__('Logo Type', 'psychology-help'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'image', 
			'choices' => array( 
				esc_html__('Image', 'psychology-help') . '|image', 
				esc_html__('Text', 'psychology-help') . '|text' 
			) 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'psychology-help' . '_logo_url', 
			'title' => esc_html__('Logo Image', 'psychology-help'), 
			'desc' => esc_html__('Choose your website logo image.', 'psychology-help'), 
			'type' => 'upload', 
			'std' => '|' . get_template_directory_uri() . '/img/logo.png', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'psychology-help' . '_logo_url_retina', 
			'title' => esc_html__('Retina Logo Image', 'psychology-help'), 
			'desc' => esc_html__('Choose logo image for retina displays.', 'psychology-help'), 
			'type' => 'upload', 
			'std' => '|' . get_template_directory_uri() . '/img/logo_retina.png', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'psychology-help' . '_logo_title', 
			'title' => esc_html__('Logo Title', 'psychology-help'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => ((get_bloginfo('name')) ? get_bloginfo('name') : 'Psychology Help'), 
			'class' => 'nohtml' 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'psychology-help' . '_logo_subtitle', 
			'title' => esc_html__('Logo Subtitle', 'psychology-help'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => 'nohtml' 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'psychology-help' . '_logo_custom_color', 
			'title' => esc_html__('Custom Text Colors', 'psychology-help'), 
			'desc' => esc_html__('enable', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'psychology-help' . '_logo_title_color', 
			'title' => esc_html__('Logo Title Color', 'psychology-help'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => '' 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'psychology-help' . '_logo_subtitle_color', 
			'title' => esc_html__('Logo Subtitle Color', 'psychology-help'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => '' 
		);
		
		break;
	case 'bg':
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'psychology-help' . '_bg_col', 
			'title' => esc_html__('Background Color', 'psychology-help'), 
			'desc' => '', 
			'type' => 'color', 
			'std' => '#ffffff' 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'psychology-help' . '_bg_img_enable', 
			'title' => esc_html__('Background Image Visibility', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'psychology-help' . '_bg_img', 
			'title' => esc_html__('Background Image', 'psychology-help'), 
			'desc' => esc_html__('Choose your custom website background image url.', 'psychology-help'), 
			'type' => 'upload', 
			'std' => '', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'psychology-help' . '_bg_rep', 
			'title' => esc_html__('Background Repeat', 'psychology-help'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'no-repeat', 
			'choices' => array( 
				esc_html__('No Repeat', 'psychology-help') . '|no-repeat', 
				esc_html__('Repeat Horizontally', 'psychology-help') . '|repeat-x', 
				esc_html__('Repeat Vertically', 'psychology-help') . '|repeat-y', 
				esc_html__('Repeat', 'psychology-help') . '|repeat' 
			) 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'psychology-help' . '_bg_pos', 
			'title' => esc_html__('Background Position', 'psychology-help'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => 'top center', 
			'choices' => array( 
				esc_html__('Top Left', 'psychology-help') . '|top left', 
				esc_html__('Top Center', 'psychology-help') . '|top center', 
				esc_html__('Top Right', 'psychology-help') . '|top right', 
				esc_html__('Center Left', 'psychology-help') . '|center left', 
				esc_html__('Center Center', 'psychology-help') . '|center center', 
				esc_html__('Center Right', 'psychology-help') . '|center right', 
				esc_html__('Bottom Left', 'psychology-help') . '|bottom left', 
				esc_html__('Bottom Center', 'psychology-help') . '|bottom center', 
				esc_html__('Bottom Right', 'psychology-help') . '|bottom right' 
			) 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'psychology-help' . '_bg_att', 
			'title' => esc_html__('Background Attachment', 'psychology-help'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'scroll', 
			'choices' => array( 
				esc_html__('Scroll', 'psychology-help') . '|scroll', 
				esc_html__('Fixed', 'psychology-help') . '|fixed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'psychology-help' . '_bg_size', 
			'title' => esc_html__('Background Size', 'psychology-help'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'cover', 
			'choices' => array( 
				esc_html__('Auto', 'psychology-help') . '|auto', 
				esc_html__('Cover', 'psychology-help') . '|cover', 
				esc_html__('Contain', 'psychology-help') . '|contain' 
			) 
		);
		
		break;
	case 'header':
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'psychology-help' . '_fixed_header', 
			'title' => esc_html__('Fixed Header', 'psychology-help'), 
			'desc' => esc_html__('enable', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'psychology-help' . '_header_overlaps', 
			'title' => esc_html__('Header Overlaps Content', 'psychology-help'), 
			'desc' => esc_html__('enable', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'psychology-help' . '_header_top_line', 
			'title' => esc_html__('Top Line', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'psychology-help' . '_header_top_height', 
			'title' => esc_html__('Top Height', 'psychology-help'), 
			'desc' => esc_html__('pixels', 'psychology-help'), 
			'type' => 'number', 
			'std' => '40', 
			'min' => '30' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'psychology-help' . '_header_top_line_short_info', 
			'title' => esc_html__('Top Short Info', 'psychology-help'), 
			'desc' => '<strong>' . esc_html__('HTML tags are allowed!', 'psychology-help') . '</strong>', 
			'type' => 'textarea', 
			'std' => '', 
			'class' => '' 
		);
		
	if (CMSMASTERS_DONATIONS) {
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'psychology-help' . '_header_top_line_donations_but', 
			'title' => esc_html__('Top Donations Button', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'psychology-help' . '_header_top_line_donations_but_text', 
			'title' => esc_html__('Top Donations Button Text', 'psychology-help'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => esc_html__('Donate Now!', 'psychology-help'), 
			'class' => 'nohtml' 
		);
	}
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'psychology-help' . '_header_top_line_add_cont', 
			'title' => esc_html__('Top Additional Content', 'psychology-help'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'social', 
			'choices' => array( 
				esc_html__('None', 'psychology-help') . '|none', 
				esc_html__('Top Line Social Icons', 'psychology-help') . '|social', 
				esc_html__('Top Line Navigation', 'psychology-help') . '|nav' 
			) 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'psychology-help' . '_header_styles', 
			'title' => esc_html__('Header Styles', 'psychology-help'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'l_nav', 
			'choices' => array( 
				esc_html__('Default Style', 'psychology-help') . '|default', 
				esc_html__('Compact Style Left Navigation', 'psychology-help') . '|l_nav', 
				esc_html__('Compact Style Right Navigation', 'psychology-help') . '|r_nav', 
				esc_html__('Compact Style Center Navigation', 'psychology-help') . '|c_nav'
			) 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'psychology-help' . '_header_mid_height', 
			'title' => esc_html__('Header Middle Height', 'psychology-help'), 
			'desc' => esc_html__('pixels', 'psychology-help'), 
			'type' => 'number', 
			'std' => '100', 
			'min' => '80' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'psychology-help' . '_header_bot_height', 
			'title' => esc_html__('Header Bottom Height', 'psychology-help'), 
			'desc' => esc_html__('pixels', 'psychology-help'), 
			'type' => 'number', 
			'std' => '55', 
			'min' => '40' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'psychology-help' . '_header_search', 
			'title' => esc_html__('Header Search', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
	if (CMSMASTERS_DONATIONS) {
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'psychology-help' . '_header_donations_but', 
			'title' => esc_html__('Header Donations Button', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'psychology-help' . '_header_donations_but_text', 
			'title' => esc_html__('Header Donations Button Text', 'psychology-help'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => esc_html__('Donate Now!', 'psychology-help'), 
			'class' => 'nohtml' 
		);
	}
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'psychology-help' . '_header_add_cont', 
			'title' => esc_html__('Header Additional Content', 'psychology-help'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'social', 
			'choices' => array( 
				esc_html__('None', 'psychology-help') . '|none', 
				esc_html__('Header Social Icons', 'psychology-help') . '|social', 
				esc_html__('Header Custom HTML', 'psychology-help') . '|cust_html' 
			) 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'psychology-help' . '_header_add_cont_cust_html', 
			'title' => esc_html__('Header Custom HTML', 'psychology-help'), 
			'desc' => '<strong>' . esc_html__('HTML tags are allowed!', 'psychology-help') . '</strong>', 
			'type' => 'textarea', 
			'std' => '', 
			'class' => '' 
		);
		
		break;
	case 'content':
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'psychology-help' . '_layout', 
			'title' => esc_html__('Layout Type by Default', 'psychology-help'), 
			'desc' => '', 
			'type' => 'radio_img', 
			'std' => 'fullwidth', 
			'choices' => array( 
				esc_html__('Right Sidebar', 'psychology-help') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'psychology-help') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'psychology-help') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'psychology-help' . '_archives_layout', 
			'title' => esc_html__('Archives Layout Type', 'psychology-help'), 
			'desc' => '', 
			'type' => 'radio_img', 
			'std' => 'fullwidth', 
			'choices' => array( 
				esc_html__('Right Sidebar', 'psychology-help') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'psychology-help') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'psychology-help') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'psychology-help' . '_search_layout', 
			'title' => esc_html__('Search Layout Type', 'psychology-help'), 
			'desc' => '', 
			'type' => 'radio_img', 
			'std' => 'fullwidth', 
			'choices' => array( 
				esc_html__('Right Sidebar', 'psychology-help') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'psychology-help') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'psychology-help') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
	if (CMSMASTERS_EVENTS_CALENDAR) {
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'psychology-help' . '_events_layout', 
			'title' => esc_html__('Events Calendar Layout Type', 'psychology-help'), 
			'desc' => '', 
			'type' => 'radio_img', 
			'std' => 'fullwidth', 
			'choices' => array( 
				esc_html__('Right Sidebar', 'psychology-help') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'psychology-help') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'psychology-help') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
	}
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'psychology-help' . '_other_layout', 
			'title' => esc_html__('Other Layout Type', 'psychology-help'), 
			'desc' => 'Layout for pages of non-listed types', 
			'type' => 'radio_img', 
			'std' => 'fullwidth', 
			'choices' => array( 
				esc_html__('Right Sidebar', 'psychology-help') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'psychology-help') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'psychology-help') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'psychology-help' . '_heading_alignment', 
			'title' => esc_html__('Heading Alignment by Default', 'psychology-help'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'center', 
			'choices' => array( 
				esc_html__('Left', 'psychology-help') . '|left', 
				esc_html__('Right', 'psychology-help') . '|right', 
				esc_html__('Center', 'psychology-help') . '|center' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'psychology-help' . '_heading_scheme', 
			'title' => esc_html__('Heading Custom Color Scheme by Default', 'psychology-help'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => 'default', 
			'choices' => cmsmasters_color_schemes_list() 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'psychology-help' . '_heading_bg_image_enable', 
			'title' => esc_html__('Heading Background Image Visibility by Default', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'psychology-help' . '_heading_bg_image', 
			'title' => esc_html__('Heading Background Image by Default', 'psychology-help'), 
			'desc' => esc_html__('Choose your custom heading background image by default.', 'psychology-help'), 
			'type' => 'upload', 
			'std' => '', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'psychology-help' . '_heading_bg_repeat', 
			'title' => esc_html__('Heading Background Repeat by Default', 'psychology-help'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'no-repeat', 
			'choices' => array( 
				esc_html__('No Repeat', 'psychology-help') . '|no-repeat', 
				esc_html__('Repeat Horizontally', 'psychology-help') . '|repeat-x', 
				esc_html__('Repeat Vertically', 'psychology-help') . '|repeat-y', 
				esc_html__('Repeat', 'psychology-help') . '|repeat' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'psychology-help' . '_heading_bg_attachment', 
			'title' => esc_html__('Heading Background Attachment by Default', 'psychology-help'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'scroll', 
			'choices' => array( 
				esc_html__('Scroll', 'psychology-help') . '|scroll', 
				esc_html__('Fixed', 'psychology-help') . '|fixed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'psychology-help' . '_heading_bg_size', 
			'title' => esc_html__('Heading Background Size by Default', 'psychology-help'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'cover', 
			'choices' => array( 
				esc_html__('Auto', 'psychology-help') . '|auto', 
				esc_html__('Cover', 'psychology-help') . '|cover', 
				esc_html__('Contain', 'psychology-help') . '|contain' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'psychology-help' . '_heading_bg_color', 
			'title' => esc_html__('Heading Background Color Overlay by Default', 'psychology-help'), 
			'desc' => '',  
			'type' => 'rgba', 
			'std' => '' 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'psychology-help' . '_heading_height', 
			'title' => esc_html__('Heading Height by Default', 'psychology-help'), 
			'desc' => esc_html__('pixels', 'psychology-help'), 
			'type' => 'number', 
			'std' => '200', 
			'min' => '0' 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'psychology-help' . '_breadcrumbs', 
			'title' => esc_html__('Breadcrumbs Visibility by Default', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'psychology-help' . '_bottom_scheme', 
			'title' => esc_html__('Bottom Custom Color Scheme', 'psychology-help'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => 'default', 
			'choices' => cmsmasters_color_schemes_list() 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'psychology-help' . '_bottom_sidebar', 
			'title' => esc_html__('Bottom Sidebar Visibility by Default', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'psychology-help' . '_bottom_sidebar_layout', 
			'title' => esc_html__('Bottom Sidebar Layout by Default', 'psychology-help'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => '14141414', 
			'choices' => array( 
				'1/1|11', 
				'1/2 + 1/2|1212', 
				'1/3 + 2/3|1323', 
				'2/3 + 1/3|2313', 
				'1/4 + 3/4|1434', 
				'3/4 + 1/4|3414', 
				'1/3 + 1/3 + 1/3|131313', 
				'1/2 + 1/4 + 1/4|121414', 
				'1/4 + 1/2 + 1/4|141214', 
				'1/4 + 1/4 + 1/2|141412', 
				'1/4 + 1/4 + 1/4 + 1/4|14141414' 
			) 
		);
		
		break;
	case 'footer':
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'psychology-help' . '_footer_scheme', 
			'title' => esc_html__('Footer Custom Color Scheme', 'psychology-help'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => 'footer', 
			'choices' => cmsmasters_color_schemes_list() 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'psychology-help' . '_footer_type', 
			'title' => esc_html__('Footer Type', 'psychology-help'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'small', 
			'choices' => array( 
				esc_html__('Default', 'psychology-help') . '|default', 
				esc_html__('Small', 'psychology-help') . '|small' 
			) 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'psychology-help' . '_footer_additional_content', 
			'title' => esc_html__('Footer Additional Content', 'psychology-help'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'nav', 
			'choices' => array( 
				esc_html__('None', 'psychology-help') . '|none', 
				esc_html__('Footer Navigation', 'psychology-help') . '|nav', 
				esc_html__('Social Icons', 'psychology-help') . '|social', 
				esc_html__('Custom HTML', 'psychology-help') . '|text' 
			) 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'psychology-help' . '_footer_logo', 
			'title' => esc_html__('Footer Logo', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'psychology-help' . '_footer_logo_url', 
			'title' => esc_html__('Footer Logo', 'psychology-help'), 
			'desc' => esc_html__('Choose your website footer logo image.', 'psychology-help'), 
			'type' => 'upload', 
			'std' => '|' . get_template_directory_uri() . '/img/logo_footer.png', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'psychology-help' . '_footer_logo_url_retina', 
			'title' => esc_html__('Footer Logo for Retina', 'psychology-help'), 
			'desc' => esc_html__('Choose your website footer logo image for retina.', 'psychology-help'), 
			'type' => 'upload', 
			'std' => '|' . get_template_directory_uri() . '/img/logo_footer_retina.png', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'psychology-help' . '_footer_nav', 
			'title' => esc_html__('Footer Navigation', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'psychology-help' . '_footer_social', 
			'title' => esc_html__('Footer Social Icons', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'psychology-help' . '_footer_html', 
			'title' => esc_html__('Footer Custom HTML', 'psychology-help'), 
			'desc' => '<strong>' . esc_html__('HTML tags are allowed!', 'psychology-help') . '</strong>', 
			'type' => 'textarea', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'psychology-help' . '_footer_copyright', 
			'title' => esc_html__('Copyright Text', 'psychology-help'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => 'Psychology Help' . ' &copy; ' . date('Y') . ' | ' . esc_html__('All Rights Reserved', 'psychology-help'), 
			'class' => '' 
		);
		
		break;
	}
	
	return $options;	
}

