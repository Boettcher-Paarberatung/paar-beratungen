<?php
vc_map ( array (
	"name" => 'Blog Carousel',
	"base" => "blog_carousel",
	"icon" => "tb-icon-for-vc",
	"category" => esc_html__( 'Medicare', 'medicare' ), 
	'admin_enqueue_js' => array(JWS_THEME_URI_PATH_FR.'/admin/assets/js/customvc.js'),
	"params" => array (
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
				"taxonomy" => "category",
				"heading" => esc_html__( "Categories", 'medicare' ),
				"param_name" => "category",
				"group" => esc_html__("Build Query", 'medicare'),
				"description" => esc_html__( "Note: By default, all your projects will be displayed. <br>If you want to narrow output, select category(s) above. Only selected categories will be displayed.", 'medicare' )
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
						esc_html__("None",'medicare') => "none",
						esc_html__("Title",'medicare') => "title",
						esc_html__("Date",'medicare') => "date",
						esc_html__("ID",'medicare') => "ID"
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
						esc_html__("ASC",'medicare') => "ASC",
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
			"std" => true,
			"group" => esc_html__("Template", 'medicare'),
			"description" => esc_html__("Show or not image of post in this element.", 'medicare')
		),
		array (
				"type" => "dropdown",
				"heading" => esc_html__( 'Image Size', 'medicare' ),
				"param_name" => "thumb_size",
				"value" => Array (
						esc_html__("Full",'medicare') => "full",
						esc_html__('Large','medicare') => 'large',
						esc_html__('Large Hard Crop','medicare') => 'medicare-blog-large-hard-crop',
						esc_html__('Medium','medicare') => 'medium',
						esc_html__('Medium Hard Crop','medicare') => 'medicare-blog-medium-hard-crop',
						esc_html__('Blog Grid','medicare') => 'medicare-blog-grid',
						esc_html__('Blog Grid Medium (270x200)','medicare') => 'medicare-blog-grid-medium',
						esc_html__('Thumbnail','medicare') => 'thumbnail'
				),
				"std" => 'medicare-blog-grid',
				"group" => esc_html__("Template", 'medicare'),
				"description" => esc_html__( 'Select image size of post in this element.', 'medicare' )
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => esc_html__("Show Title", 'medicare'),
			"param_name" => "show_title",
			"value" => array (
				esc_html__( "Yes, please", 'medicare' ) => true
			),
			"std" => true,
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
			"std" => true,
			"group" => esc_html__("Template", 'medicare'),
			"description" => esc_html__("Show or not info of post in this element.", 'medicare')
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => esc_html__("Show Excerpt", 'medicare'),
			"param_name" => "show_excerpt",
			"value" => array (
				esc_html__( "Yes, please", 'medicare' ) => true
			),
			"std" => true,
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