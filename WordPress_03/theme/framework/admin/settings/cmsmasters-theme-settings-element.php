<?php 
/**
 * @package 	WordPress
 * @subpackage 	Psychology Help
 * @version 	1.1.2
 * 
 * Admin Panel Element Options
 * Created by CMSMasters
 * 
 */


function psychology_help_options_element_tabs() {
	$tabs = array();
	
	$tabs['sidebar'] = esc_attr__('Sidebars', 'psychology-help');
	$tabs['icon'] = esc_attr__('Social Icons', 'psychology-help');
	$tabs['lightbox'] = esc_attr__('Lightbox', 'psychology-help');
	$tabs['sitemap'] = esc_attr__('Sitemap', 'psychology-help');
	$tabs['error'] = esc_attr__('404', 'psychology-help');
	$tabs['code'] = esc_attr__('Custom Codes', 'psychology-help');
	
	if (class_exists('Cmsmasters_Form_Builder')) {
		$tabs['recaptcha'] = esc_attr__('reCAPTCHA', 'psychology-help');
	}
	
	return $tabs;
}


function psychology_help_options_element_sections() {
	$tab = psychology_help_get_the_tab();
	
	switch ($tab) {
	case 'sidebar':
		$sections = array();
		
		$sections['sidebar_section'] = esc_attr__('Custom Sidebars', 'psychology-help');
		
		break;
	case 'icon':
		$sections = array();
		
		$sections['icon_section'] = esc_attr__('Social Icons', 'psychology-help');
		
		break;
	case 'lightbox':
		$sections = array();
		
		$sections['lightbox_section'] = esc_attr__('Theme Lightbox Options', 'psychology-help');
		
		break;
	case 'sitemap':
		$sections = array();
		
		$sections['sitemap_section'] = esc_attr__('Sitemap Page Options', 'psychology-help');
		
		break;
	case 'error':
		$sections = array();
		
		$sections['error_section'] = esc_attr__('404 Error Page Options', 'psychology-help');
		
		break;
	case 'code':
		$sections = array();
		
		$sections['code_section'] = esc_attr__('Custom Codes', 'psychology-help');
		
		break;
	case 'recaptcha':
		$sections = array();
		
		$sections['recaptcha_section'] = esc_attr__('Form Builder Plugin reCAPTCHA Keys', 'psychology-help');
		
		break;
	}
	
	return $sections;	
} 


function psychology_help_options_element_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = psychology_help_get_the_tab();
	}
	
	$options = array();
	
	switch ($tab) {
	case 'sidebar':
		$options[] = array( 
			'section' => 'sidebar_section', 
			'id' => 'psychology-help' . '_sidebar', 
			'title' => esc_html__('Custom Sidebars', 'psychology-help'), 
			'desc' => '', 
			'type' => 'sidebar', 
			'std' => '' 
		);
		
		break;
	case 'icon':
		$options[] = array( 
			'section' => 'icon_section', 
			'id' => 'psychology-help' . '_social_icons', 
			'title' => esc_html__('Social Icons', 'psychology-help'), 
			'desc' => '', 
			'type' => 'social', 
			'std' => array( 
				'cmsmasters-icon-twitter-circled|#|' . esc_html__('Twitter', 'psychology-help') . '|true||', 
				'cmsmasters-icon-facebook-circled|#|' . esc_html__('Facebook', 'psychology-help') . '|true||', 
				'cmsmasters-icon-gplus-circled|#|' . esc_html__('Google+', 'psychology-help') . '|true||', 
				'cmsmasters-icon-vimeo-circled|#|' . esc_html__('Vimeo', 'psychology-help') . '|true||', 
				'cmsmasters-icon-skype-circled|#|' . esc_html__('Skype', 'psychology-help') . '|true||' 
			) 
		);
		
		break;
	case 'lightbox':
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'psychology-help' . '_ilightbox_skin', 
			'title' => esc_html__('Skin', 'psychology-help'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => 'dark', 
			'choices' => array( 
				esc_html__('Dark', 'psychology-help') . '|dark', 
				esc_html__('Light', 'psychology-help') . '|light', 
				esc_html__('Mac', 'psychology-help') . '|mac', 
				esc_html__('Metro Black', 'psychology-help') . '|metro-black', 
				esc_html__('Metro White', 'psychology-help') . '|metro-white', 
				esc_html__('Parade', 'psychology-help') . '|parade', 
				esc_html__('Smooth', 'psychology-help') . '|smooth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'psychology-help' . '_ilightbox_path', 
			'title' => esc_html__('Path', 'psychology-help'), 
			'desc' => esc_html__('Sets path for switching windows', 'psychology-help'), 
			'type' => 'radio', 
			'std' => 'vertical', 
			'choices' => array( 
				esc_html__('Vertical', 'psychology-help') . '|vertical', 
				esc_html__('Horizontal', 'psychology-help') . '|horizontal' 
			) 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'psychology-help' . '_ilightbox_infinite', 
			'title' => esc_html__('Infinite', 'psychology-help'), 
			'desc' => esc_html__('Sets the ability to infinite the group', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'psychology-help' . '_ilightbox_aspect_ratio', 
			'title' => esc_html__('Keep Aspect Ratio', 'psychology-help'), 
			'desc' => esc_html__('Sets the resizing method used to keep aspect ratio within the viewport', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'psychology-help' . '_ilightbox_mobile_optimizer', 
			'title' => esc_html__('Mobile Optimizer', 'psychology-help'), 
			'desc' => esc_html__('Make lightboxes optimized for giving better experience with mobile devices', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'psychology-help' . '_ilightbox_max_scale', 
			'title' => esc_html__('Max Scale', 'psychology-help'), 
			'desc' => esc_html__('Sets the maximum viewport scale of the content', 'psychology-help'), 
			'type' => 'number', 
			'std' => 1, 
			'min' => 0.1, 
			'max' => 2, 
			'step' => 0.05 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'psychology-help' . '_ilightbox_min_scale', 
			'title' => esc_html__('Min Scale', 'psychology-help'), 
			'desc' => esc_html__('Sets the minimum viewport scale of the content', 'psychology-help'), 
			'type' => 'number', 
			'std' => 0.2, 
			'min' => 0.1, 
			'max' => 2, 
			'step' => 0.05 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'psychology-help' . '_ilightbox_inner_toolbar', 
			'title' => esc_html__('Inner Toolbar', 'psychology-help'), 
			'desc' => esc_html__('Bring buttons into windows, or let them be over the overlay', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'psychology-help' . '_ilightbox_smart_recognition', 
			'title' => esc_html__('Smart Recognition', 'psychology-help'), 
			'desc' => esc_html__('Sets content auto recognize from web pages', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'psychology-help' . '_ilightbox_fullscreen_one_slide', 
			'title' => esc_html__('Fullscreen One Slide', 'psychology-help'), 
			'desc' => esc_html__('Decide to fullscreen only one slide or hole gallery the fullscreen mode', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'psychology-help' . '_ilightbox_fullscreen_viewport', 
			'title' => esc_html__('Fullscreen Viewport', 'psychology-help'), 
			'desc' => esc_html__('Sets the resizing method used to fit content within the fullscreen mode', 'psychology-help'), 
			'type' => 'select', 
			'std' => 'center', 
			'choices' => array( 
				esc_html__('Center', 'psychology-help') . '|center', 
				esc_html__('Fit', 'psychology-help') . '|fit', 
				esc_html__('Fill', 'psychology-help') . '|fill', 
				esc_html__('Stretch', 'psychology-help') . '|stretch' 
			) 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'psychology-help' . '_ilightbox_controls_toolbar', 
			'title' => esc_html__('Toolbar Controls', 'psychology-help'), 
			'desc' => esc_html__('Sets buttons be available or not', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'psychology-help' . '_ilightbox_controls_arrows', 
			'title' => esc_html__('Arrow Controls', 'psychology-help'), 
			'desc' => esc_html__('Enable the arrow buttons', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'psychology-help' . '_ilightbox_controls_fullscreen', 
			'title' => esc_html__('Fullscreen Controls', 'psychology-help'), 
			'desc' => esc_html__('Sets the fullscreen button', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'psychology-help' . '_ilightbox_controls_thumbnail', 
			'title' => esc_html__('Thumbnails Controls', 'psychology-help'), 
			'desc' => esc_html__('Sets the thumbnail navigation', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'psychology-help' . '_ilightbox_controls_keyboard', 
			'title' => esc_html__('Keyboard Controls', 'psychology-help'), 
			'desc' => esc_html__('Sets the keyboard navigation', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'psychology-help' . '_ilightbox_controls_mousewheel', 
			'title' => esc_html__('Mouse Wheel Controls', 'psychology-help'), 
			'desc' => esc_html__('Sets the mousewheel navigation', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'psychology-help' . '_ilightbox_controls_swipe', 
			'title' => esc_html__('Swipe Controls', 'psychology-help'), 
			'desc' => esc_html__('Sets the swipe navigation', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'psychology-help' . '_ilightbox_controls_slideshow', 
			'title' => esc_html__('Slideshow Controls', 'psychology-help'), 
			'desc' => esc_html__('Enable the slideshow feature and button', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		break;
	case 'sitemap':
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'psychology-help' . '_sitemap_nav', 
			'title' => esc_html__('Website Pages', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'psychology-help' . '_sitemap_categs', 
			'title' => esc_html__('Blog Archives by Categories', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'psychology-help' . '_sitemap_tags', 
			'title' => esc_html__('Blog Archives by Tags', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'psychology-help' . '_sitemap_month', 
			'title' => esc_html__('Blog Archives by Month', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'psychology-help' . '_sitemap_pj_categs', 
			'title' => esc_html__('Portfolio Archives by Categories', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'psychology-help' . '_sitemap_pj_tags', 
			'title' => esc_html__('Portfolio Archives by Tags', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		break;
	case 'error':
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'psychology-help' . '_error_color', 
			'title' => esc_html__('Text Color', 'psychology-help'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => '#292929' 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'psychology-help' . '_error_bg_color', 
			'title' => esc_html__('Background Color', 'psychology-help'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => '#fbfbfb' 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'psychology-help' . '_error_bg_img_enable', 
			'title' => esc_html__('Background Image Visibility', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'psychology-help' . '_error_bg_image', 
			'title' => esc_html__('Background Image', 'psychology-help'), 
			'desc' => esc_html__('Choose your custom error page background image.', 'psychology-help'), 
			'type' => 'upload', 
			'std' => '', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'psychology-help' . '_error_bg_rep', 
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
			'section' => 'error_section', 
			'id' => 'psychology-help' . '_error_bg_pos', 
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
			'section' => 'error_section', 
			'id' => 'psychology-help' . '_error_bg_att', 
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
			'section' => 'error_section', 
			'id' => 'psychology-help' . '_error_bg_size', 
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
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'psychology-help' . '_error_search', 
			'title' => esc_html__('Search Line', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'psychology-help' . '_error_sitemap_button', 
			'title' => esc_html__('Sitemap Button', 'psychology-help'), 
			'desc' => esc_html__('show', 'psychology-help'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'psychology-help' . '_error_sitemap_link', 
			'title' => esc_html__('Sitemap Page URL', 'psychology-help'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		break;
	case 'code':
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'psychology-help' . '_custom_css', 
			'title' => esc_html__('Custom CSS', 'psychology-help'), 
			'desc' => '', 
			'type' => 'textarea', 
			'std' => '', 
			'class' => 'allowlinebreaks' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'psychology-help' . '_custom_js', 
			'title' => esc_html__('Custom JavaScript', 'psychology-help'), 
			'desc' => '', 
			'type' => 'textarea', 
			'std' => '', 
			'class' => 'allowlinebreaks' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'psychology-help' . '_gmap_api_key', 
			'title' => esc_html__('Google Maps API key', 'psychology-help'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'psychology-help' . '_api_key', 
			'title' => esc_html__('Twitter API key', 'psychology-help'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'psychology-help' . '_api_secret', 
			'title' => esc_html__('Twitter API secret', 'psychology-help'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'psychology-help' . '_access_token', 
			'title' => esc_html__('Twitter Access token', 'psychology-help'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'psychology-help' . '_access_token_secret', 
			'title' => esc_html__('Twitter Access token secret', 'psychology-help'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		break;
	case 'recaptcha':
		$options[] = array( 
			'section' => 'recaptcha_section', 
			'id' => 'psychology-help' . '_recaptcha_public_key', 
			'title' => esc_html__('reCAPTCHA Public Key', 'psychology-help'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'recaptcha_section', 
			'id' => 'psychology-help' . '_recaptcha_private_key', 
			'title' => esc_html__('reCAPTCHA Private Key', 'psychology-help'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		break;
	}
	
	return $options;	
}

