<?php

vc_map ( array (

		"name" => 'Gallery',
		"base" => "gallerys",
		"icon" => "tb-icon-for-vc",
		"category" => esc_html__('Medicare', 'medicare' ), 
		'admin_enqueue_js' => array(JWS_THEME_URI_PATH_FR .'/admin/assets/js/customvc.js'),
		"params" => array (
					array (
							"type" => "jws_theme_taxonomy",
							"taxonomy" => "gallery_category",
							"heading" => esc_html__( "Gallery Categories", 'medicare' ),
							"param_name" => "category",
							"description" => esc_html__( "Note: By default, all your projects will be displayed. <br>If you want to narrow output, select category(s) above. Only selected categories will be displayed.", 'medicare' )
					),
					array(
						"type" => "dropdown",
						"class" => "",
						"heading" => esc_html__("Template", "medicare"),
						"param_name" => "tpl",
						"value" => array(
							"Gallery Grid" => "tpl1",
						),
						
						"description" => esc_html__('Select template for gallery.', "medicare")
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
						"heading" => esc_html__('Crop image', "medicare"),
						"param_name" => "crop_image",
						"value" => array(
							esc_html__("Yes, please", "medicare") => 1
						),
						"description" => esc_html__('Crop or not crop image on your Post.', "medicare")
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__('Width image', "medicare"),
						"param_name" => "width_image",
						"description" => esc_html__('Enter the width of image. Default: 373.', "medicare"),
						"dependency" => array(
							"element"=>"crop_image",
							"value"=>"1"
						),
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__('Height image', "medicare"),
						"param_name" => "height_image",
						"description" => esc_html__('Enter the height of image. Default: 332.', "medicare"),
						"dependency" => array(
							"element"=>"crop_image",
							"value"=>"1"
						),
					),
					array(
						"type" => "checkbox",
						"heading" => esc_html__('Show Image Popup Button', "medicare"),
						"param_name" => "show_popup",
						"value" => array(
							esc_html__("Yes, please", "medicare") => 1
						),
						"group" => esc_html__("Template", 'medicare'),
						"description" => esc_html__('Show or hide Popup Button of post on your blog.', "medicare")
					),
					array(
						"type" => "checkbox",
						"heading" => esc_html__('Show Title', "medicare"),
						"param_name" => "show_title",
						"value" => array(
							esc_html__("Yes, please", "medicare") => 1
						),
						"group" => esc_html__("Template", 'medicare'),
						 "dependency" => array(
							"element"=>"tpl",
							"value"=>"tpl1"
						),
						"description" => esc_html__('Show or hide title of post on your blog.', "medicare")
					),
					array(
						"type" => "checkbox",
						"heading" => esc_html__('Show author', "medicare"),
						"param_name" => "show_author",
						"value" => array(
							esc_html__("Yes, please", "medicare") => 1
						),
						"group" => esc_html__("Template", 'medicare'),
						 "dependency" => array(
							"element"=>"tpl",
							"value"=>"tpl1"
						),
						"description" => esc_html__('Show or hide author of post on your blog.', "medicare")
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__('Show Pagination', "medicare"),
						"param_name" => "show_pagination",
						"value" => Array(
							"None" => "none",
							"Number" => "number",
							"Ajax" => "ajax"
						),
						"group" => esc_html__("Template", 'medicare'),
						"description" => esc_html__('Show or hide pagination of post on your blog.', "medicare")
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__('Pagination Position', "medicare"),
						"param_name" => "pos_pagination",
						"value" => Array(
							"Left" => "text-left",
							"Center" => "text-center",
							"Right" => "text-right"
						),
						"group" => esc_html__("Template", 'medicare'),
						"description" => esc_html__('Select Pagination Position.', "medicare")
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

							),
							 "dependency" => array(
								"element"=>"tpl",
								"value"=>"tpl1"
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
						"type" => "textfield",
						"class" => "",
						"heading" => esc_html__("Load more", 'medicare'),
						"param_name" => "load_more",
						"value" => "",
						"description" => esc_html__( "Enter View all name, default: load more, leave blank for hidden this button", 'medicare' )
					),
		)

));