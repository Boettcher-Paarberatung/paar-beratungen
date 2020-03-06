<?php

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_front-page-slider',
		'title' => 'Front page slider',
		'fields' => array (
			array (
				'key' => 'field_54e5b072c24c3',
				'label' => 'Slider with captions',
				'name' => 'slider_with_captions',
				'type' => 'true_false',
				'instructions' => 'If this is ON, you will be able to define the title and text for each slide. Otherwise only the images will be shown in the slider.',
				'message' => 'Use the title with text over the slider',
				'default_value' => 1,
			),
			array (
				'key' => 'field_54e5af11f7e41',
				'label' => 'Slides',
				'name' => 'slides',
				'type' => 'repeater',
				'instructions' => 'You can add multiple slides to the front page, each with its own caption.',
				'sub_fields' => array (
					array (
						'key' => 'field_54e5af58c3656',
						'label' => 'Slide image',
						'name' => 'slide_image',
						'type' => 'image',
						'required' => 1,
						'column_width' => '',
						'save_format' => 'id',
						'preview_size' => 'thumbnail',
						'library' => 'all',
					),
					array (
						'key' => 'field_54e5afadc3657',
						'label' => 'Slide title',
						'name' => 'slide_title',
						'type' => 'text',
						'required' => 1,
						'conditional_logic' => array (
							'status' => 1,
							'rules' => array (
								array (
									'field' => 'field_54e5b072c24c3',
									'operator' => '==',
									'value' => '1',
								),
							),
							'allorany' => 'all',
						),
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
					array (
						'key' => 'field_54e5afe6c3658',
						'label' => 'Slide text',
						'name' => 'slide_text',
						'type' => 'wysiwyg',
						'conditional_logic' => array (
							'status' => 1,
							'rules' => array (
								array (
									'field' => 'field_54e5b072c24c3',
									'operator' => '==',
									'value' => '1',
								),
							),
							'allorany' => 'all',
						),
						'column_width' => '',
						'default_value' => '',
						'toolbar' => 'full',
						'media_upload' => 'no',
					),
					array (
						'key' => 'field_54e5b6ccf0d9e',
						'label' => 'Slide link',
						'name' => 'slide_link',
						'type' => 'text',
						'conditional_logic' => array (
							'status' => 1,
							'rules' => array (
								array (
									'field' => 'field_54e5b072c24c3',
									'operator' => '!=',
									'value' => '1',
								),
							),
							'allorany' => 'all',
						),
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'none',
						'maxlength' => '',
					),
					array (
						'key' => 'field_54e5b7327c937',
						'label' => 'Slide open link in new window/tab',
						'name' => 'slide_open_link_in_new_window',
						'type' => 'true_false',
						'instructions' => 'Open link in new window/tab',
						'conditional_logic' => array (
							'status' => 1,
							'rules' => array (
								array (
									'field' => 'field_54e5b072c24c3',
									'operator' => '!=',
									'value' => '1',
								),
							),
							'allorany' => 'all',
						),
						'column_width' => '',
						'message' => '',
						'default_value' => 1,
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Another Slide',
			),
			array (
				'key' => 'field_54e5b0ec85737',
				'label' => 'Auto cycle',
				'name' => 'auto_cycle',
				'type' => 'true_false',
				'instructions' => 'Automatically cycle over the slides on the page load.',
				'message' => 'Automatically cycle the slides',
				'default_value' => 1,
			),
			array (
				'key' => 'field_54e5b10f85738',
				'label' => 'Cycle interval',
				'name' => 'cycle_interval',
				'type' => 'number',
				'instructions' => 'Cycle interval in miliseconds (1s = 1000ms).',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_54e5b0ec85737',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => 5000,
				'placeholder' => '',
				'prepend' => '',
				'append' => 'ms',
				'min' => 0,
				'max' => '',
				'step' => 1000,
			),
			array (
				'key' => 'field_54f02c64e02b3',
				'label' => 'Slider caption background opacity',
				'name' => 'slider_caption_background_opacity',
				'type' => 'number',
				'instructions' => 'Choose the opacity value from 0 to 1.',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_54e5b072c24c3',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '0.65',
				'placeholder' => '0.65',
				'prepend' => '',
				'append' => '',
				'min' => 0,
				'max' => 1,
				'step' => '0.01',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-front-page-with-slider.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_page-slider',
		'title' => 'Page Slider',
		'fields' => array (
			array (
				'key' => 'field_54f971516b207',
				'label' => 'Slider Type',
				'name' => 'slider_type',
				'type' => 'radio',
				'required' => 1,
				'choices' => array (
					'layer' => 'LayerSlider',
					'revolution' => 'Revolution Slider',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => '',
				'layout' => 'vertical',
			),
			array (
				'key' => 'field_54f971796b208',
				'label' => 'LayerSlider ID',
				'name' => 'layer_slider_id',
				'type' => 'number',
				'instructions' => 'LayerSlider can be used as alternative slider and doesn\'t come with the theme for free. You can buy it <a href="http://codecanyon.net/item/layerslider-responsive-wordpress-slider-plugin-/1362246?ref=ProteusThemes" target="_blank">here</a>. Paste the ID of the slider you created in the plugin to this box (only ID, not the whole shortcode).',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_54f971516b207',
							'operator' => '==',
							'value' => 'layer',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => 1,
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => '',
			),
			array (
				'key' => 'field_54f971a56b209',
				'label' => 'Revolution Slider Alias',
				'name' => 'revolution_slider_alias',
				'type' => 'text',
				'instructions' => 'Slider Revolution can be used as alternative slider and doesn\'t come with the theme for free. You can buy it <a href="http://codecanyon.net/item/slider-revolution-responsive-wordpress-plugin/2751380?ref=ProteusThemes" target="_blank">here</a>. Paste the alias of the slider you created in the plugin to this box (only <a href="https://www.diigo.com/item/image/3rli1/s9bj?size=o" target="_blank">alias</a>, not the whole shortcode).',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_54f971516b207',
							'operator' => '==',
							'value' => 'revolution',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => 'main-slider',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-front-page-with-slider-alt.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'side',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_position-of-the-sidebar',
		'title' => 'Position of the Sidebar',
		'fields' => array (
			array (
				'key' => 'field_54d4a83ef508b',
				'label' => '',
				'name' => 'sidebar',
				'type' => 'radio',
				'instructions' => 'Position the sidebar for this particular page: left or right',
				'choices' => array (
					'left' => 'Left',
					'right' => 'Right',
					'none' => 'No Sidebar',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'left',
				'layout' => 'horizontal',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 1,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_subtitle',
		'title' => 'Subtitle',
		'fields' => array (
			array (
				'key' => 'field_54db2ece41cfd',
				'label' => '',
				'name' => 'subtitle',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => 'Subtitle',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}
