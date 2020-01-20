<?php
vc_map ( array (
	"name" => 'Testimonial Slider',
	"base" => "testimonial_slider",
	"icon" => "tb-icon-for-vc",
	"category" => esc_html__( 'Medicare', 'medicare' ), 
	'admin_enqueue_js' => array(JWS_THEME_URI_PATH_FR.'/admin/assets/js/customvc.js'),
	"params" => array (
		array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Template", 'medicare'),
            "param_name" => "tpl",
            "value" => array(
                esc_html__('Template 1( Thumbnail on the left )','medicare') => "tpl1",
				esc_html__('Template 2( Thumbnail on the left - Style 2)','medicare') => "tpl2",
				esc_html__('Template 3(All thumdnail)','medicare') => "tpl3"
            ),
            "std"=>"tpl1",
            "description" => esc_html__('Select template for title.', 'medicare')
        ),
		array (
			"type" => "jws_theme_taxonomy",
			"taxonomy" => "testimonial_category",
			"heading" => __ ( "Testimonial Categories", 'medicare' ),
			"param_name" => "testimonial_category",
			"class" => "",
			
			"description" => __ ( "Note: By default, all your projects will be displayed. <br>If you want to narrow output, select category(s) above. Only selected categories will be displayed.", 'medicare' )
		),
		array (
				"type" => "textfield",
				"heading" => esc_html__( 'Count', 'medicare' ),
				"param_name" => "posts_per_page",
				'value' => '',
				"description" => esc_html__( 'The number of posts to display on each page. Set to "-1" for display all posts on the page.', 'medicare' )
		),
		 array(
                "type" => "dropdown",
                "class" => "",
                "heading" => esc_html__("Columns", 'medicare'),
                "param_name" => "columns",
                "value" => array(
                    esc_html__("3 Columns",'medicare') => "3",
                    esc_html__("2 Columns",'medicare') => "2",
                    esc_html__("1 Column",'medicare') => "1",
                ),
                "description" => esc_html__('Select columns in this element.', 'medicare')
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
			"type" => "checkbox",
			"class" => "",
			"heading" => esc_html__("Show Image", 'medicare'),
			"param_name" => "show_image",
			"value" => array (
				esc_html__( "Yes, please", 'medicare' ) => true
			),
			"group" => esc_html__("Template", 'medicare'),
			"std" => true,
			"description" => esc_html__("Show or not image of post in this element.", 'medicare')
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => esc_html__("Show Title", 'medicare'),
			"param_name" => "show_title",
			"value" => array (
				esc_html__( "Yes, please", 'medicare' ) => true
			),
			"group" => esc_html__("Template", 'medicare'),
			"std" => true,
			"description" => esc_html__("Show or not title of post in this element.", 'medicare')
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => esc_html__("Show Excerpt", 'medicare'),
			"param_name" => "show_excerpt",
			"value" => array (
				esc_html__( "Yes, please", 'medicare' ) => true
			),
			"group" => esc_html__("Template", 'medicare'),
			"std" => true,
			"description" => esc_html__("Show or not excerpt of post in this element.", 'medicare')
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => esc_html__("Show Patient", 'medicare'),
			"param_name" => "show_patient",
			"value" => array (
				esc_html__( "Yes, please", 'medicare' ) => true
			),
			"group" => esc_html__("Template", 'medicare'),
			"description" => esc_html__("Show or not patient name in this element.", 'medicare')
		),
		 array(
			"type" => "textfield",
			"heading" => esc_html__('Excerpt Length', "medicare"),
			"param_name" => "excerpt_length",
			"value" => '',
			"group" => esc_html__("Template", 'medicare'),
			"description" => esc_html__('The length of the excerpt, number of words to display. Set -1 show all words of excerpt.', "medicare")
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__('Excerpt More', "medicare"),
			"param_name" => "excerpt_more",
			"value" => "",
			"group" => esc_html__("Template", 'medicare'),
			"description" => esc_html__('Please enter excerpt more for blog.', "medicare")
		),
			
	)
));