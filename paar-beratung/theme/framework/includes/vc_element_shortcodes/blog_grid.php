<?php
vc_map ( array (
	"name" => 'Blog Grid',
	"base" => "blog_grid",
	"icon" => "tb-icon-for-vc",
	"category" => esc_html__('Medicare', 'medicare' ), 
	'admin_enqueue_js' => array(JWS_THEME_URI_PATH_FR.'/admin/assets/js/customvc.js'),
	"params" => array (
		
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Template", 'medicare'),
			"param_name" => "tpl",
			"value" => array(
				esc_html__("Template 1",'medicare') => "tpl1",
				esc_html__("Template 2",'medicare') => "tpl2",
				esc_html__("Template 3",'medicare') => "tpl3",
				esc_html__("Template 4(Template 3 & no bigItem)",'medicare') => "tpl4",
				esc_html__("Template 5(1 Item, Image right)",'medicare') => "tpl5"
			),
			"description" => esc_html__('Select template in this element.', 'medicare')
		),
		array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Post Type", 'medicare'),
                "param_name" => "post_type",
                "value" => array(
                    "Post" => "post",
                    "Portfolio" => "portfolio",
                    "Space" => "space",
                    "Testimonial" => "testimonial",
					"Doctors" => "doctor",
					"Services" => "services",
                ),
			"description" => esc_html__('Select post type for blog.', 'medicare')
        ),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Style", 'medicare'),
			"param_name" => "style",
			"value" => array(
				"Blog" => "blog",
				"Default" => "default",
				"Deviation" => "deviation"
			),
			"dependency" => array(
				"element"=>"post_type",
				"value"=>"post"
			),
			"description" => esc_html__('Select style for blog.', 'medicare')
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Services Style", 'medicare'),
			"param_name" => "services_style",
			"value" => array(
				"Styles 1" => "services_style_one",
				"Styles 2" => "services_style_two"
			),
			"std"=>"services_style_one",
			"dependency" => array(
				"element"=>"post_type",
				"value"=>"services"
			),
			"description" => esc_html__('Select style for blog.', 'medicare')
		),
		
		array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Source", 'medicare'),
            "param_name" => "columns",
            "value" => array(
				esc_html__("6 Columnss",'medicare') => "6",
				esc_html__("6 Columns",'medicare') => "5",
                esc_html__("4 Columns",'medicare') => "4",
                esc_html__("3 Columns",'medicare') => "3",
                esc_html__("2 Columns",'medicare') => "2",
                esc_html__("1 Column",'medicare') => "1",
            ),
			
			"description" => esc_html__('Select columns in this elment. ', 'medicare')
        ),
		/*
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => esc_html__("Show Pagination", 'medicare'),
			"param_name" => "show_pagination",
			"value" => array (
				esc_html__( "Yes, please", 'medicare' ) => true
			),
			"description" => esc_html__("Show or not show pagination in this element.", 'medicare')
		),*/
		array(
			"type" => "dropdown",
			"heading" => esc_html__('View more ', 'medicare'),
			"param_name" => "view_more_post",
			"value" => Array(
				"None" => "none",
				"Pagination" => "pagination",
				"Load more" => "load_more"
			),
			"description" => esc_html__('Show or hide pagination of post on your blog.', 'medicare')
		),
		/* array(
			"type" => "checkbox",
			"heading" => esc_html__('Show View More', 'medicare'),
			"param_name" => "show_view_more",
			"value" => array(
				esc_html__("Yes, please", 'medicare') => 1
			),
			"std"=>0,
			"group" => esc_html__("Template", 'medicare'),
			"description" => esc_html__('Show view more button.', 'medicare')
		), */
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Title load", 'medicare'),
			"param_name" => "title_view_more_post",
			"value" => "",
			//"std" =>"Load more services",
			"dependency" => array(
				"element"=>"view_more_post",
				"value"=>"load_more"
			),
			"description" => esc_html__( "please enter the text from the keyboard.", 'medicare' )
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__('Pagination Position', 'medicare'),
			"param_name" => "pos_pagination",
			"value" => Array(
				"Left" => "text-left",
				"Center" => "text-center",
				"Right" => "text-right"
			),
			"description" => esc_html__('Select Pagination Position.', 'medicare')
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__('Object Animation', 'medicare'),
			"param_name" => "ob_animation",
			"value" => Array(
				"Wrap" => "wrap",
				"Item" => "item"
			),
			"description" => esc_html__('Select object animation', 'medicare')
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Animation", 'medicare'),
			"param_name" => "animation",
			"value" => array(
				"No" => "",
				"Top to bottom" => "top-to-bottom",
				"Bottom to top" => "bottom-to-top",
				"Left to right" => "left-to-right",
				"Right to left" => "right-to-left",
				"Appear from center" => "appear"
			),
			"description" => esc_html__("Box Animation", 'medicare')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Extra Class", 'medicare'),
			"param_name" => "el_class",
			"value" => "",
			"description" => esc_html__( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'medicare' )
		),
		
		array (
			"type" => "jws_theme_taxonomy",
			"taxonomy" => "services_category",
			"dependency" => array(
                    "element"=>"post_type",
                    "value"=>"services"
				),
			"heading" => __ ( "Services Categories", 'medicare' ),
			"param_name" => "services_category",
			"group" => esc_html__("Build Query", 'medicare'),
			"class" => "",
			"description" => __ ( "Note: By default, all your projects will be displayed. <br>If you want to narrow output, select category(s) above. Only selected categories will be displayed.", 'medicare' )
		),
		array (
			"type" => "jws_theme_taxonomy",
			"taxonomy" => "category",
			"dependency" => array(
                    "element"=>"post_type",
                    "value"=>"post"
				),
			"heading" => __ ( "Blog Categories", 'medicare' ),
			"param_name" => "category",
			"group" => esc_html__("Build Query", 'medicare'),
			"class" => "",
			"description" => __ ( "Note: By default, all your projects will be displayed. <br>If you want to narrow output, select category(s) above. Only selected categories will be displayed.", 'medicare' )
		),
		array (
			"type" => "jws_theme_taxonomy",
			"taxonomy" => "testimonial_category",
			"dependency" => array(
                    "element"=>"post_type",
                    "value"=>"testimonial"
				),
			"heading" => __ ( "Testimonial Categories", 'medicare' ),
			"param_name" => "testimonial_category",
			"group" => esc_html__("Build Query", 'medicare'),
			"class" => "",
			"description" => __ ( "Note: By default, all your projects will be displayed. <br>If you want to narrow output, select category(s) above. Only selected categories will be displayed.", 'medicare' )
		),
		array (
			"type" => "jws_theme_taxonomy",
			"taxonomy" => "doctor_category",
			"dependency" => array(
                    "element"=>"post_type",
                    "value"=>"doctor"
				),
			"heading" => __ ( "Doctor Categories", 'medicare' ),
			"param_name" => "doctor_category",
			"group" => esc_html__("Build Query", 'medicare'),
			"class" => "",
			"description" => __ ( "Note: By default, all your projects will be displayed. <br>If you want to narrow output, select category(s) above. Only selected categories will be displayed.", 'medicare' )
		),
		array (
				"type" => "textfield",
				"heading" => esc_html__( 'Count', 'medicare' ),
				"param_name" => "posts_per_page",
				'value' => '',
				"group" => esc_html__("Build Query", 'medicare'),
				"description" => esc_html__( 'The number of posts to display on each page. Set to "-1" for display all posts on the page.', 'medicare' )
		),
		array (
				"type" => "dropdown",
				"heading" => esc_html__( 'Order by', 'medicare' ),
				"param_name" => "orderby",
				"value" => array (
						esc_html__( "None",'medicare') => "none",
						esc_html__("Title",'medicare') => "title",
						esc_html__("Date",'medicare') => "date",
						esc_html__("ID" ,'medicare')=> "ID"
				),
				"group" => esc_html__("Build Query", 'medicare'),
				"description" => esc_html__( 'Order by ("none", "title", "date", "ID").', 'medicare' )
		),
		array (
				"type" => "dropdown",
				"heading" => esc_html__( 'Order', 'medicare' ),
				"param_name" => "order",
				"value" => Array (
						esc_html__("None",'medicare') => "none",
						esc_html__("ASC" ,'medicare')=> "ASC",
						esc_html__("DESC",'medicare') => "DESC"
				),
				"group" => esc_html__("Build Query", 'medicare'),
				"description" => esc_html__( 'Order ("None", "Asc", "Desc").', 'medicare' )
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => esc_html__("Show Image", 'medicare'),
			"param_name" => "show_thumb",
			"value" => array (
				esc_html__( "Yes, please", 'medicare' ) => true
			),
			"group" => esc_html__("Template", 'medicare'),
			"description" => esc_html__("Show or not image of post in this element.", 'medicare')
		),
		array(
			"type" => "checkbox", 
			"heading" => esc_html__('Crop image', 'medicare'),
			"param_name" => "crop_image",
			"value" => array(
				esc_html__("Yes, please", 'medicare') => 1
			),
			"dependency" => array(
				"element"=>"show_thumb",
				"value"=>"1" 
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
			"description" => esc_html__('Enter the width of image. Default: 300.', 'medicare')
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
			"description" => esc_html__('Enter the height of image. Default: 200.', 'medicare')
		),
		/*array (
				"type" => "dropdown",
				"heading" => esc_html__( 'Image Size', 'medicare' ),
				"param_name" => "thumb_size",
				"value" => Array (
						esc_html__("Full",'medicare' ) => 'full',
						esc_html__('Large','medicare' ) => 'large',
						esc_html__('Large Hard Crop','medicare') => 'medicare-blog-large-hard-crop',
						esc_html__('Medium','medicare' ) => 'medium',
						esc_html__('Medium Hard Crop','medicare') => 'medicare-blog-medium-hard-crop',
						esc_html__('Blog Grid','medicare' ) => 'medicare-blog-grid',
						esc_html__('Blog Grid Medium (270x200)','medicare') => 'medicare-blog-grid-medium',
						esc_html__('Thumbnail','medicare' ) => 'thumbnail'
				),
				"group" => esc_html__("Template", 'medicare'),
				"description" => esc_html__( 'Select image size of post in this element.', 'medicare' )
		),*/
		array (
			"type" => "dropdown",
			"heading" => esc_html__( 'Text align', 'medicare' ),
			"param_name" => "text_align",
			"value" => Array (
				esc_html__("Right",'medicare') => 'text-right',
				esc_html__("Center",'medicare') => 'text-center',
				esc_html__("Left",'medicare') => 'text-left',
			),
			"group" => esc_html__("Template", 'medicare'),
			"description" => esc_html__( 'Select text align style' ,'medicare')
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => esc_html__("Show Title", 'medicare'),
			"param_name" => "show_title",
			"value" => array (
				esc_html__( "Yes, please", 'medicare' ) => true
			),
			"std"=>true,
			"group" => esc_html__("Template", 'medicare'),
			"description" => esc_html__("Show or not title of post in this element.", 'medicare')
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => esc_html__("Show Info", 'medicare'),
			"param_name" => "show_info",
			"value" => array (
				esc_html__( "Yes, please", 'medicare' ) => true
			),
			"std"=>true,
			"group" => esc_html__("Template", 'medicare'),
			"description" => esc_html__("Show or not info of post in this element.", 'medicare')
		),
		array(
			"type" => "checkbox",
			"class" => "extended_info",
			"heading" => esc_html__("Show extended information", 'medicare'),
			"param_name" => "show_more_info",
			"value" => array (
				esc_html__( "Yes, please", 'medicare' ) => true
			),
			"std"=>true,
			"group" => esc_html__("Template", 'medicare'),
			"description" => esc_html__("Show or not extended information in this element.", 'medicare')
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => esc_html__("Show Excerpt", 'medicare'),
			"param_name" => "show_excerpt",
			"value" => array (
				esc_html__( "Yes, please", 'medicare' ) => true
			),
			"std"=>true,
			"group" => esc_html__("Template", 'medicare'),
			"description" => esc_html__("Show or not excerpt of post in this element.", 'medicare')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Excerpt Length", 'medicare'),
			"param_name" => "excerpt_lenght",
			"value" => "",
			"group" => esc_html__("Template", 'medicare'),
			"description" => esc_html__("Please, Enter excerpt lenght in this element. EX: 20", 'medicare')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Excerpt More", 'medicare'),
			"param_name" => "excerpt_more",
			"value" => "",
			"group" => esc_html__("Template", 'medicare'),
			"description" => esc_html__("Please, Enter excerpt more in this element. EX: ...", 'medicare')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Read More Text", 'medicare'),
			"param_name" => "readmore_text",
			"value" => "",
			"group" => esc_html__("Template", 'medicare'),
			"description" => esc_html__("Please, Enter read more text in this element. EX: Read more", 'medicare')
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => esc_html__("New line for read more text?", 'medicare'),
			"param_name" => "readmore_block",
			"value" => array (
				esc_html__( "Yes, please", 'medicare' ) => true
			),
			"group" => esc_html__("Template", 'medicare'),
			"description" => esc_html__("Show read more text as new line", 'medicare')
		)
	)
));