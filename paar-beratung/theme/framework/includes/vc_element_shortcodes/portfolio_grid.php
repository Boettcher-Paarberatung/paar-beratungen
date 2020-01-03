<?php
vc_map ( array (
		"name" => 'Portfolio Grid',
		"base" => "portfolio_grid",
		"icon" => "tb-icon-for-vc",
		"category" => esc_html__( 'Medicare', 'medicare' ), 
		'admin_enqueue_js' => array(JWS_THEME_URI_PATH_FR .'/admin/assets/js/customvc.js'),
		"params" => array (
					array(
							"type" => "dropdown",
							"holder" => "div",
							"class" => "",
							"heading" => esc_html__("Post Type", 'medicare'),
							"param_name" => "post_type",
							"value" => array(
								"Portfolio" => "portfolio",
								"Gallery" => "gallery",
							),
						"description" => esc_html__('Select post type for blog.', 'medicare')
					),
					array (
							"type" => "jws_theme_taxonomy",
							"taxonomy" => "portfolio_category",
							"heading" => esc_html__( "Portfolio Categories", 'medicare' ),
							"param_name" => "portfolio_category",
							"dependency" => array(
								"element"=>"post_type",
								"value"=>"portfolio"
							),
							"description" => esc_html__( "Note: By default, all your projects will be displayed. <br>If you want to narrow output, select category(s) above. Only selected categories will be displayed.", 'medicare' )
					),
					array (
							"type" => "jws_theme_taxonomy",
							"taxonomy" => "gallery_category",
							"heading" => esc_html__( "Gallery Categories", 'medicare' ),
							"param_name" => "gallery_category",
							"dependency" => array(
								"element"=>"post_type",
								"value"=>"gallery"
							),
							"description" => esc_html__( "Note: By default, all your projects will be displayed. <br>If you want to narrow output, select category(s) above. Only selected categories will be displayed.", 'medicare' )
					),
					array(
						"type" => "dropdown",
						"class" => "",
						"heading" => esc_html__("Template", 'medicare'),
						"param_name" => "tpl",
						"value" => array(
							esc_html__("Template 1 ( MixItUp )",'medicare') => "tpl1",
							esc_html__("Template 2 (  )",'medicare') => "tpl2",
							esc_html__("Template 3 ( MitItUp Masonry )",'medicare') => "tpl3",
						),
						"std" => 'tpl1',
						//"group" => esc_html__("Template", 'medicare'),
						"description" => esc_html__('Select template in this element.', 'medicare')
					),
					array(
						"type" => "checkbox",
						"class" => "",
						"heading" => esc_html__("Show Filter", 'medicare'),
						"param_name" => "show_filter",
						"value" => array (
							esc_html__( "Yes, please", 'medicare' ) => true
						),
						"std" => true,
						"description" => esc_html__("Show or not show filter in this element.", 'medicare')
					),
					array (
							"type" => "textfield",
							"heading" => esc_html__( 'Count', 'medicare' ),
							"param_name" => "posts_per_page",
							'value' => '',
							"description" => esc_html__( 'The number of posts to display on each page. Set to "-1" for display all posts on the page.', 'medicare' )
					),
					array(
						"type" => "checkbox", 
						"heading" => esc_html__('Crop image', 'medicare'),
						"param_name" => "crop_image",
						"value" => array(
							esc_html__("Yes, please", 'medicare') => 1
						),
						"group" => esc_html__("Template", 'medicare'),
						"description" => esc_html__('Crop or not crop image on your Post.', 'medicare')
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__('Width image', 'medicare'),
						"param_name" => "width_image",
						"dependency" => array(
							"element"=>"crop_image",
							"value"=>"1"
						),
						"group" => esc_html__("Template", 'medicare'),
						"description" => esc_html__('Enter the width of image. Default: 370.', 'medicare')
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__('Height image', 'medicare'),
						"param_name" => "height_image",
						"dependency" => array(
							"element"=>"crop_image",
							"value"=>"1"
						),
						"group" => esc_html__("Template", 'medicare'),
						"description" => esc_html__('Enter the height of image. Default: 330.', 'medicare')
					),
					array(
						"type" => "checkbox",
						"class" => "",
						"heading" => esc_html__("Show Pagination", 'medicare'),
						"param_name" => "show_pagination",
						"value" => array (
							esc_html__( "Yes, please", 'medicare' ) => true
						),
						"group" => esc_html__("Template", 'medicare'),
						"description" => esc_html__("Show or not show pagination in this element.", 'medicare')
					),
					array(
						"type" => "checkbox",
						"class" => "",
						"heading" => esc_html__("No Padding", 'medicare'),
						"param_name" => "no_pading",
						"value" => array (
							esc_html__( "Yes, please", 'medicare' ) => true
						),
						"group" => esc_html__("Template", 'medicare'),
						"std" => false,
						"description" => esc_html__("No padding in each items", 'medicare')
					),
					array(
							"type" => "dropdown",
							"class" => "",
							"heading" => esc_html__("Columns", 'medicare'),
							"param_name" => "columns",
							"value" => array(
								esc_html__("4 Columns",'medicare') => "4",
								esc_html__("3 Columns",'medicare') => "3",
								esc_html__("2 Columns",'medicare') => "2",
								esc_html__("1 Column",'medicare') => "1",
							),
							"description" => esc_html__('Select columns display in this element.', 'medicare')
					),
					array (
							"type" => "dropdown",
							"heading" => esc_html__( 'Order by', 'medicare' ),
							"param_name" => "orderby",
							"value" => array (
									esc_html__("None",'medicare') => "none",
									esc_html__("Title",'medicare') => "title",
									esc_html__("Date",'medicare') => "date",
									esc_html__("ID",'medicare') => "ID"
							),
							"group" => esc_html__("Template", 'medicare'),
							"description" => esc_html__( 'Order by ("none", "title", "date", "ID").', 'medicare' )
					),
					array (
							"type" => "dropdown",
							"heading" => esc_html__( 'Order', 'medicare' ),
							"param_name" => "order",
							"value" => Array (
									esc_html__("None",'medicare') => "none",
									esc_html__("ASC",'medicare') => "ASC",
									esc_html__("DESC",'medicare') => "DESC"
							),
							"group" => esc_html__("Template", 'medicare'),
							"description" => esc_html__( 'Order ("None", "Asc", "Desc").', 'medicare' )
					),
					array(
						"type" => "textfield",
						"class" => "",
						"heading" => esc_html__("Extra Class", 'medicare'),
						"param_name" => "el_class",
						"value" => "",
						"description" => esc_html__( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'medicare' )
					),
					array(
						"type" => "checkbox",
						"class" => "",
						"heading" => esc_html__("Show Title", 'medicare'),
						"param_name" => "show_title",
						"value" => array (
							esc_html__( "Yes, please", 'medicare' ) => true
						),
						"std" => false,
						"group" => esc_html__("Template", 'medicare'),
						"description" => esc_html__("Show or not title of post in this element.", 'medicare')
					),
					array(
						"type" => "checkbox",
						"class" => "",
						"heading" => esc_html__("Show Category", 'medicare'),
						"param_name" => "show_category",
						"value" => array (
							esc_html__( "Yes, please", 'medicare' ) => true
						),
						"std" => false,
						"group" => esc_html__("Template", 'medicare'),
						"description" => esc_html__("Show or not category of post in this element.", 'medicare')
					),
					array(
						"type" => "checkbox",
						"class" => "",
						"heading" => esc_html__("Show View Now", 'medicare'),
						"param_name" => "show_readmore",
						"value" => array (
							esc_html__( "Yes, please", 'medicare' ) => true
						),
						"group" => esc_html__("Template", 'medicare'),
						"description" => esc_html__("Show or not View Now of post in this element.", 'medicare')
					)
		)
));