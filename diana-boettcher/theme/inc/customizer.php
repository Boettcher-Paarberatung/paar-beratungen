<?php

function theme_customize_register($wp_customize) {

  $wp_customize -> add_section('tracking', array(
		'title'    => __('Tracking', 'Diana Boettcher Theme'),
		'priority' => 10
  ));

  $wp_customize -> add_section('navigation', array(
		'title'    => __('Navigation', 'Diana Boettcher Theme'),
		'priority' => 20
  ));

  $wp_customize -> add_section('frontpage_header', array(
		'title'    => __('Frontpage Header', 'Diana Boettcher Theme'),
		'priority' => 30
  ));

  $wp_customize -> add_section('frontpage_media', array(
		'title'    => __('Frontpage Media', 'Diana Boettcher Theme'),
		'priority' => 35
  ));

  $wp_customize -> add_section('frontpage_about_me', array(
		'title'    => __('Frontpage About Me', 'Diana Boettcher Theme'),
		'priority' => 40
  ));

  $wp_customize -> add_section('frontpage_team', array(
		'title'    => __('Frontpage Team', 'Diana Boettcher Theme'),
		'priority' => 45
  ));

  $wp_customize -> add_section('frontpage_forms', array(
		'title'    => __('Frontpage Forms', 'Diana Boettcher Theme'),
		'priority' => 50
  ));

  $wp_customize -> add_section('frontpage_first_talk', array(
		'title'    => __('Frontpage First Talk', 'Diana Boettcher Theme'),
		'priority' => 60
  ));

  $wp_customize -> add_section('frontpage_text', array(
		'title'    => __('Frontpage Text', 'Diana Boettcher Theme'),
		'priority' => 70
  ));

  $wp_customize -> add_section('frontpage_costs', array(
		'title'    => __('Frontpage Costs', 'Diana Boettcher Theme'),
		'priority' => 80
  ));

  $wp_customize -> add_section('frontpage_text', array(
		'title'    => __('Frontpage Text', 'Diana Boettcher Theme'),
		'priority' => 90
  ));

  $wp_customize -> add_section('frontpage_blog', array(
		'title'    => __('Frontpage Blog', 'Diana Boettcher Theme'),
		'priority' => 100
  ));

  $wp_customize -> add_section('footer', array(
		'title'    => __('Footer', 'Diana Boettcher Theme'),
		'priority' => 110
  ));

  //
  // Tracking
  //

  $wp_customize -> add_setting('analytics_id', array(
		'default'   => '',
		'transport' => 'refresh'
  ));

  $wp_customize -> add_control('analytics_id_ctrl', array(
		'label'    => __('Google Analytics ID', 'Diana Boettcher Theme'),
		'section'  => 'tracking',
		'settings' => 'analytics_id',
		'type'		 => 'text'
  ));

  //
  // Navigation
  //

  $wp_customize -> add_setting('navigation_cta', array(
		'default'   => '',
		'transport' => 'refresh'
  ));

  $wp_customize -> add_control('navigation_cta_ctrl', array(
		'label'    => __('Navigation CTA', 'Diana Boettcher Theme'),
		'section'  => 'navigation',
		'settings' => 'navigation_cta',
		'type'		 => 'text'
  ));

  $wp_customize -> add_setting('navigation_phone', array(
		'default'   => '',
		'transport' => 'refresh'
  ));

  $wp_customize -> add_control('navigation_phone_ctrl', array(
		'label'    => __('Navigation Phone', 'Diana Boettcher Theme'),
		'section'  => 'navigation',
		'settings' => 'navigation_phone',
		'type'		 => 'text'
  ));

  $wp_customize -> add_setting('navigation_mail', array(
		'default'   => '',
		'transport' => 'refresh'
  ));

  $wp_customize -> add_control('navigation_mail_ctrl', array(
		'label'    => __('Navigation Mail', 'Diana Boettcher Theme'),
		'section'  => 'navigation',
		'settings' => 'navigation_mail',
		'type'		 => 'text'
  ));

  //
  // Header
  //

  $wp_customize -> add_setting('frontpage_header_title', array(
		'default'   => '',
		'transport' => 'refresh'
  ));

  $wp_customize -> add_control('frontpage_header_title_ctrl', array(
		'label'    => __('Frontpage Header Title', 'Diana Boettcher Theme'),
		'section'  => 'frontpage_header',
		'settings' => 'frontpage_header_title',
		'type'		 => 'text'
  ));

	$wp_customize -> add_setting('frontpage_header_subtitle', array(
		'default'   => '',
		'transport' => 'refresh'
  ));

  $wp_customize -> add_control('frontpage_header_subtitle_ctrl', array(
		'label'    => __('Frontpage Header Subtitle', 'Diana Boettcher Theme'),
		'section'  => 'frontpage_header',
		'settings' => 'frontpage_header_subtitle',
		'type'		 => 'textarea'
  ));

	$wp_customize -> add_setting('frontpage_header_button_text', array(
		'default'   => '',
		'transport' => 'refresh'
  ));

  $wp_customize -> add_control('frontpage_header_button_text_ctrl', array(
		'label'    => __('Frontpage Header Button Text', 'Diana Boettcher Theme'),
		'section'  => 'frontpage_header',
		'settings' => 'frontpage_header_button_text',
		'type'		 => 'text'
  ));

  $wp_customize -> add_setting('frontpage_header_list', array(
		'default'   => '',
		'transport' => 'refresh'
  ));

  $wp_customize -> add_control('frontpage_header_list_ctrl', array(
		'label'    => __('Frontpage Header List', 'Diana Boettcher Theme'),
		'section'  => 'frontpage_header',
		'settings' => 'frontpage_header_list',
		'type'		 => 'textarea'
  ));

  $wp_customize -> add_setting('frontpage_header_image', array(
		'default'   => '',
		'transport' => 'refresh'
  ));

  $wp_customize -> add_control(new WP_Customize_Image_Control($wp_customize, 'frontpage_header_image_ctrl', array(
		'label'    => __('Frontpage Header image', 'Diana Boettcher Theme'),
		'section'  => 'frontpage_header',
		'settings' => 'frontpage_header_image'
  )));

  //
  // Media
  //

  $wp_customize -> add_setting('frontpage_media_image1', array(
    'default'   => '',
    'transport' => 'refresh'
  ));

  $wp_customize -> add_control(new WP_Customize_Image_Control($wp_customize, 'frontpage_media_image1_ctrl', array(
    'label'    => __('Frontpage Media image 1', 'Diana Boettcher Theme'),
    'section'  => 'frontpage_media',
    'settings' => 'frontpage_media_image1'
  )));

  $wp_customize -> add_setting('frontpage_media_image2', array(
    'default'   => '',
    'transport' => 'refresh'
  ));

  $wp_customize -> add_control(new WP_Customize_Image_Control($wp_customize, 'frontpage_media_image2_ctrl', array(
    'label'    => __('Frontpage Media image 2', 'Diana Boettcher Theme'),
    'section'  => 'frontpage_media',
    'settings' => 'frontpage_media_image2'
  )));

  $wp_customize -> add_setting('frontpage_media_image3', array(
    'default'   => '',
    'transport' => 'refresh'
  ));

  $wp_customize -> add_control(new WP_Customize_Image_Control($wp_customize, 'frontpage_media_image3_ctrl', array(
    'label'    => __('Frontpage Media image 3', 'Diana Boettcher Theme'),
    'section'  => 'frontpage_media',
    'settings' => 'frontpage_media_image3'
  )));

  $wp_customize -> add_setting('frontpage_media_image4', array(
    'default'   => '',
    'transport' => 'refresh'
  ));

  $wp_customize -> add_control(new WP_Customize_Image_Control($wp_customize, 'frontpage_media_image4_ctrl', array(
    'label'    => __('Frontpage Media image 4', 'Diana Boettcher Theme'),
    'section'  => 'frontpage_media',
    'settings' => 'frontpage_media_image4'
  )));

  $wp_customize -> add_setting('frontpage_media_image5', array(
    'default'   => '',
    'transport' => 'refresh'
  ));

  $wp_customize -> add_control(new WP_Customize_Image_Control($wp_customize, 'frontpage_media_image5_ctrl', array(
    'label'    => __('Frontpage Media image 5', 'Diana Boettcher Theme'),
    'section'  => 'frontpage_media',
    'settings' => 'frontpage_media_image5'
  )));

  $wp_customize -> add_setting('frontpage_media_image6', array(
    'default'   => '',
    'transport' => 'refresh'
  ));

  $wp_customize -> add_control(new WP_Customize_Image_Control($wp_customize, 'frontpage_media_image6_ctrl', array(
    'label'    => __('Frontpage Media image 6', 'Diana Boettcher Theme'),
    'section'  => 'frontpage_media',
    'settings' => 'frontpage_media_image6'
  )));

  $wp_customize -> add_setting('frontpage_media_text', array(
		'default'   => '',
		'transport' => 'refresh'
  ));

  $wp_customize -> add_control('frontpage_media_text_ctrl', array(
		'label'    => __('Frontpage Media Text', 'Diana Boettcher Theme'),
		'section'  => 'frontpage_media',
		'settings' => 'frontpage_media_text',
		'type'		 => 'text'
  ));

  $wp_customize -> add_setting('frontpage_media_file', array(
		'default'   => '',
		'transport' => 'refresh'
  ));

  $wp_customize -> add_control(new WP_Customize_Upload_Control($wp_customize, 'frontpage_media_file_ctrl', array(
		'label'    => __('Frontpage Media File', 'Diana Boettcher Theme'),
		'section'  => 'frontpage_media',
		'settings' => 'frontpage_media_file'
  )));


  //
  // About Me
  //

  $wp_customize -> add_setting('frontpage_about_me_title', array(
		'default'   => '',
		'transport' => 'refresh'
  ));

  $wp_customize -> add_control('frontpage_about_me_title_ctrl', array(
		'label'    => __('Frontpage About Me Title', 'Diana Boettcher Theme'),
		'section'  => 'frontpage_about_me',
		'settings' => 'frontpage_about_me_title',
		'type'		 => 'text'
  ));

  $wp_customize -> add_setting('frontpage_about_me_text', array(
		'default'   => '',
		'transport' => 'refresh'
  ));

  $wp_customize -> add_control('frontpage_about_me_text_ctrl', array(
		'label'    => __('Frontpage About Me Text Above Button', 'Diana Boettcher Theme'),
		'section'  => 'frontpage_about_me',
		'settings' => 'frontpage_about_me_text',
		'type'		 => 'textarea'
  ));

  $wp_customize -> add_setting('frontpage_about_me_image', array(
		'default'   => '',
		'transport' => 'refresh'
  ));

  $wp_customize -> add_control(new WP_Customize_Image_Control($wp_customize, 'frontpage_about_me_image_ctrl', array(
		'label'    => __('Frontpage About Me image', 'Diana Boettcher Theme'),
		'section'  => 'frontpage_about_me',
		'settings' => 'frontpage_about_me_image'
  )));

  //
  // Team
  //

	$wp_customize -> add_setting('frontpage_team_title', array(
		'default'   => '',
		'transport' => 'refresh'
  ));

  $wp_customize -> add_control('frontpage_team_title_ctrl', array(
		'label'    => __('Frontpage Team Title', 'Diana Boettcher Theme'),
		'section'  => 'frontpage_team',
		'settings' => 'frontpage_team_title',
		'type'		 => 'text'
  ));

  //
  // Therapy Forms
  //

	$wp_customize -> add_setting('frontpage_forms_title', array(
		'default'   => '',
		'transport' => 'refresh'
  ));

  $wp_customize -> add_control('frontpage_forms_title_ctrl', array(
		'label'    => __('Frontpage Forms Title', 'Diana Boettcher Theme'),
		'section'  => 'frontpage_forms',
		'settings' => 'frontpage_forms_title',
		'type'		 => 'text'
  ));

	$wp_customize -> add_setting('frontpage_forms_text', array(
		'default'   => '',
		'transport' => 'refresh'
  ));

  $wp_customize -> add_control('frontpage_forms_text_ctrl', array(
		'label'    => __('Frontpage Forms Text', 'Diana Boettcher Theme'),
		'section'  => 'frontpage_forms',
		'settings' => 'frontpage_forms_text',
		'type'		 => 'textarea'
  ));

  //
  // First Talk
  //

	$wp_customize -> add_setting('frontpage_first_talk_title', array(
		'default'   => '',
		'transport' => 'refresh'
  ));

  $wp_customize -> add_control('frontpage_first_talk_title_ctrl', array(
		'label'    => __('Frontpage First Talk Title', 'Diana Boettcher Theme'),
		'section'  => 'frontpage_first_talk',
		'settings' => 'frontpage_first_talk_title',
		'type'		 => 'text'
  ));

	$wp_customize -> add_setting('frontpage_first_talk_text', array(
		'default'   => '',
		'transport' => 'refresh'
  ));

  $wp_customize -> add_control('frontpage_first_talk_text_ctrl', array(
		'label'    => __('Frontpage First Talk Text', 'Diana Boettcher Theme'),
		'section'  => 'frontpage_first_talk',
		'settings' => 'frontpage_first_talk_text',
		'type'		 => 'text'
  ));

	$wp_customize -> add_setting('frontpage_first_talk_1_head', array(
		'default'   => '',
		'transport' => 'refresh'
  ));

  $wp_customize -> add_control('frontpage_first_talk_1_head_ctrl', array(
		'label'    => __('Frontpage First Talk 1 Head', 'Diana Boettcher Theme'),
		'section'  => 'frontpage_first_talk',
		'settings' => 'frontpage_first_talk_1_head',
		'type'		 => 'text'
  ));

	$wp_customize -> add_setting('frontpage_first_talk_1_text', array(
		'default'   => '',
		'transport' => 'refresh'
  ));

  $wp_customize -> add_control('frontpage_first_talk_1_text_ctrl', array(
		'label'    => __('Frontpage First Talk 1 Text', 'Diana Boettcher Theme'),
		'section'  => 'frontpage_first_talk',
		'settings' => 'frontpage_first_talk_1_text',
		'type'		 => 'textarea'
  ));

	$wp_customize -> add_setting('frontpage_first_talk_2_head', array(
		'default'   => '',
		'transport' => 'refresh'
  ));

  $wp_customize -> add_control('frontpage_first_talk_2_head_ctrl', array(
		'label'    => __('Frontpage First Talk 2 Head', 'Diana Boettcher Theme'),
		'section'  => 'frontpage_first_talk',
		'settings' => 'frontpage_first_talk_2_head',
		'type'		 => 'text'
  ));

	$wp_customize -> add_setting('frontpage_first_talk_2_text', array(
		'default'   => '',
		'transport' => 'refresh'
  ));

  $wp_customize -> add_control('frontpage_first_talk_2_text_ctrl', array(
		'label'    => __('Frontpage First Talk 2 Text', 'Diana Boettcher Theme'),
		'section'  => 'frontpage_first_talk',
		'settings' => 'frontpage_first_talk_2_text',
		'type'		 => 'textarea'
  ));

 	$wp_customize -> add_setting('frontpage_first_talk_3_head', array(
		'default'   => '',
		'transport' => 'refresh'
  ));

  $wp_customize -> add_control('frontpage_first_talk_3_head_ctrl', array(
		'label'    => __('Frontpage First Talk 3 Head', 'Diana Boettcher Theme'),
		'section'  => 'frontpage_first_talk',
		'settings' => 'frontpage_first_talk_3_head',
		'type'		 => 'text'
  ));

	$wp_customize -> add_setting('frontpage_first_talk_3_text', array(
		'default'   => '',
		'transport' => 'refresh'
  ));

  $wp_customize -> add_control('frontpage_first_talk_3_text_ctrl', array(
		'label'    => __('Frontpage First Talk 3 Text', 'Diana Boettcher Theme'),
		'section'  => 'frontpage_first_talk',
		'settings' => 'frontpage_first_talk_3_text',
		'type'		 => 'textarea'
  ));

  //
  // Costs
  //

	$wp_customize -> add_setting('frontpage_costs_title', array(
		'default'   => '',
		'transport' => 'refresh'
  ));

  $wp_customize -> add_control('frontpage_costs_title_ctrl', array(
		'label'    => __('Frontpage Costs Title', 'Diana Boettcher Theme'),
		'section'  => 'frontpage_costs',
		'settings' => 'frontpage_costs_title',
		'type'		 => 'text'
  ));

	$wp_customize -> add_setting('frontpage_costs_minutes', array(
		'default'   => '',
		'transport' => 'refresh'
  ));

  $wp_customize -> add_control('frontpage_costs_minutes_ctrl', array(
		'label'    => __('Frontpage Costs Minutes', 'Diana Boettcher Theme'),
		'section'  => 'frontpage_costs',
		'settings' => 'frontpage_costs_minutes',
		'type'		 => 'text'
  ));

	$wp_customize -> add_setting('frontpage_costs_hours', array(
		'default'   => '',
		'transport' => 'refresh'
  ));

  $wp_customize -> add_control('frontpage_costs_hours_ctrl', array(
		'label'    => __('Frontpage Costs Hours', 'Diana Boettcher Theme'),
		'section'  => 'frontpage_costs',
		'settings' => 'frontpage_costs_hours',
		'type'		 => 'text'
  ));

	$wp_customize -> add_setting('frontpage_costs_head1', array(
		'default'   => '',
		'transport' => 'refresh'
  ));

  $wp_customize -> add_control('frontpage_costs_head1_ctrl', array(
		'label'    => __('Frontpage Costs head1', 'Diana Boettcher Theme'),
		'section'  => 'frontpage_costs',
		'settings' => 'frontpage_costs_head1',
		'type'		 => 'text'
  ));

	$wp_customize -> add_setting('frontpage_costs_head2', array(
		'default'   => '',
		'transport' => 'refresh'
  ));

  $wp_customize -> add_control('frontpage_costs_head2_ctrl', array(
		'label'    => __('Frontpage Costs head2', 'Diana Boettcher Theme'),
		'section'  => 'frontpage_costs',
		'settings' => 'frontpage_costs_head2',
		'type'		 => 'text'
  ));

  $wp_customize -> add_setting('frontpage_costs_head3', array(
		'default'   => '',
		'transport' => 'refresh'
  ));

  $wp_customize -> add_control('frontpage_costs_head3_ctrl', array(
		'label'    => __('Frontpage Costs head3', 'Diana Boettcher Theme'),
		'section'  => 'frontpage_costs',
		'settings' => 'frontpage_costs_head3',
		'type'		 => 'text'
  ));

	$wp_customize -> add_setting('frontpage_costs_text', array(
		'default'   => '',
		'transport' => 'refresh'
  ));

  $wp_customize -> add_control('frontpage_costs_text_ctrl', array(
		'label'    => __('Frontpage Costs Text', 'Diana Boettcher Theme'),
		'section'  => 'frontpage_costs',
		'settings' => 'frontpage_costs_text',
		'type'		 => 'text'
  ));

  //
  // Text
  //

	$wp_customize -> add_setting('frontpage_text_title', array(
		'default'   => '',
		'transport' => 'refresh'
  ));

  $wp_customize -> add_control('frontpage_text_title_ctrl', array(
		'label'    => __('Frontpage Text Title', 'Diana Boettcher Theme'),
		'section'  => 'frontpage_text',
		'settings' => 'frontpage_text_title',
		'type'		 => 'text'
  ));

  //
  // Blog
  //

	$wp_customize -> add_setting('frontpage_blog_title', array(
		'default'   => '',
		'transport' => 'refresh'
  ));

  $wp_customize -> add_control('frontpage_blog_title_ctrl', array(
		'label'    => __('Frontpage Blog Title', 'Diana Boettcher Theme'),
		'section'  => 'frontpage_blog',
		'settings' => 'frontpage_blog_title',
		'type'		 => 'text'
  ));

	$wp_customize -> add_setting('frontpage_blog_button', array(
		'default'   => '',
		'transport' => 'refresh'
  ));

  $wp_customize -> add_control('frontpage_blog_button_ctrl', array(
		'label'    => __('Frontpage Blog Button', 'Diana Boettcher Theme'),
		'section'  => 'frontpage_blog',
		'settings' => 'frontpage_blog_button',
		'type'		 => 'text'
  ));

  //
  // Footer
  //

  $wp_customize -> add_setting('footer_headline', array(
		'default'   => '',
		'transport' => 'refresh'
  ));

  $wp_customize -> add_control('footer_headline_ctrl', array(
		'label'    => __('Footer Headline', 'Diana Boettcher Theme'),
		'section'  => 'footer',
		'settings' => 'footer_headline',
		'type'		 => 'text'
  ));

  $wp_customize -> add_setting('footer_image', array(
		'default'   => '',
		'transport' => 'refresh'
  ));

  $wp_customize -> add_control(new WP_Customize_Image_Control($wp_customize, 'footer_image_ctrl', array(
		'label'    => __('Footer Image', 'Diana Boettcher Theme'),
		'section'  => 'footer',
		'settings' => 'footer_image'
  )));

  $wp_customize -> add_setting('footer_text', array(
		'default'   => '',
		'transport' => 'refresh'
  ));

  $wp_customize -> add_control('footer_text_ctrl', array(
		'label'    => __('Footer text', 'Diana Boettcher Theme'),
		'section'  => 'footer',
		'settings' => 'footer_text',
		'type'		 => 'textarea'
  ));

}

add_action('customize_register', 'theme_customize_register');

?>
