<?php

add_action('init', 'tb_blog_integrateWithVC');

function tb_blog_integrateWithVC() {
    vc_map(array(
        "name" => esc_html__("Blog grid view", 'medicare'),
        "base" => "tb_blog",
        "class" => "tb-blog",
        "category" => esc_html__('Medicare', 'medicare'),
        'admin_enqueue_js' => array(JWS_THEME_URI_PATH_ADMIN.'/assets/js/customvc.js'),
        "icon" => "tb-icon-for-vc",
        "params" => array(
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Post Type", 'medicare'),
                "param_name" => "post_type",
                "value" => array(
                    "Post" => "post",
                    "Services" => "services",
                    "Testimonial" => "testimonial",
                    "Doctor" => "doctor",
                ),
				"description" => esc_html__('Select post type for blog.', 'medicare')
            ),
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Post Count", 'medicare'),
                "param_name" => "posts_per_page",
                "value" => "",
				"description" => esc_html__('Please, enter number of post per page for blog. Show all: -1.', 'medicare')
            ),
            array (
                "type" => "jws_theme_taxonomy",
                "taxonomy" => "category",
                "heading" => __ ( "Blog Categories", 'medicare' ),
                "param_name" => "category",
                "class" => "",
                "dependency" => array(
                    "element"=>"post_type",
                    "value"=>"post"
                    ),
                "description" => __ ( "Note: By default, all your projects will be displayed. <br>If you want to narrow output, select category(s) above. Only selected categories will be displayed.", 'medicare' )
            ),
            array (
                "type" => "jws_theme_taxonomy",
                "taxonomy" => "services_category",
                "heading" => __ ( "Services Categories", 'medicare' ),
                "param_name" => "services_category",
                "class" => "",
                "dependency" => array(
                    "element"=>"post_type",
                    "value"=>"services"
                    ),
                "description" => __ ( "Note: By default, all your projects will be displayed. <br>If you want to narrow output, select category(s) above. Only selected categories will be displayed.", 'medicare' )
            ),
			array (
                "type" => "jws_theme_taxonomy",
                "taxonomy" => "testimonial_category",
                "dependency" => array(
                    "element"=>"post_type",
                    "value"=>"testimonial"
                    )
                ,
                "heading" => __ ( "Categories", 'medicare' ),
                "param_name" => "testimonial_category",
                "class" => "",
                "description" => __ ( "Note: By default, all your projects will be displayed. <br>If you want to narrow output, select category(s) above. Only selected categories will be displayed.", 'medicare' )
            ),
			array (
                "type" => "jws_theme_taxonomy",
                "taxonomy" => "doctor_category",
                "dependency" => array(
                    "element"=>"post_type",
                    "value"=>"doctor"
                    )
                ,
                "heading" => __ ( "Categories", 'medicare' ),
                "param_name" => "doctor_category",
                "class" => "",
                "description" => __ ( "Note: By default, all your projects will be displayed. <br>If you want to narrow output, select category(s) above. Only selected categories will be displayed.", 'medicare' )
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => esc_html__("Columns", 'medicare'),
                "param_name" => "columns",
                "value" => array(
                    "4 Columns" => "4",
                    "3 Columns" => "3",
                    "2 Columns" => "2",
                    "1 Column" => "1",
                ),
				"description" => esc_html__('Select columns for blog.', 'medicare')
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
                "heading" => esc_html__("Deviation Text Align", 'medicare'),
                "param_name" => "deviation_text_align",
                "value" => array(
                    "Left" => "left",
                    "Right" => "right",
                    "Bottom" => "bottom",
                ),
                "dependency" => array(
                    "element"=>"style",
                    "value"=>"deviation"
				),
				"description" => esc_html__('Select deviation style for blog.', 'medicare')
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => esc_html__("Style", 'medicare'),
                "param_name" => "services_style",
                "value" => array(
                    "Services Style 1 (Carousel)" => "enable_carousel",
                    //"Services Style 2 (Grid)" => "entry",
                ),
                "dependency" => array(
                    "element"=>"post_type",
                    "value"=>"services"
				),
				"description" => esc_html__('Select style for blog.', 'medicare')
            ),
			array(
                "type" => "dropdown",
                "class" => "",
                "heading" => esc_html__("Style", 'medicare'),
                "param_name" => "testimonial_style",
                "value" => array(
                    "Style 1" => "entry",
                ),
                "dependency" => array(
                    "element"=>"post_type",
                    "value"=>"testimonial"
				),
				"description" => esc_html__('Select style for blog.', 'medicare')
            ),
			array(
                "type" => "dropdown",
                "class" => "",
                "heading" => esc_html__("Style", 'medicare'),
                "param_name" => "doctor_style",
                "value" => array(
                    "Style 1" => "entry",
                ),
                "dependency" => array(
                    "element"=>"post_type",
                    "value"=>"doctor"
				),
				"description" => esc_html__('Select style for blog.', 'medicare')
            ),
            array(
                "type" => "checkbox", 
                "heading" => esc_html__('Crop image', 'medicare'),
                "param_name" => "crop_image",
                "value" => array(
                    esc_html__("Yes, please", 'medicare') => 1
                ),
                "description" => esc_html__('Crop or not crop image on your Post.', 'medicare')
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__('Width image', 'medicare'),
                "param_name" => "width_image",
                "description" => esc_html__('Enter the width of image. Default: 300.', 'medicare')
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__('Height image', 'medicare'),
                "param_name" => "height_image",
                "description" => esc_html__('Enter the height of image. Default: 200.', 'medicare')
            ),
            array(
                "type" => "checkbox",
                "heading" => esc_html__('Show Title', 'medicare'),
                "param_name" => "show_title",
                "value" => array(
                    esc_html__("Yes, please", 'medicare') => 1
                ),
                "description" => esc_html__('Show or hide title of post on your blog.', 'medicare')
            ),
            array(
                "type" => "checkbox",
                "heading" => esc_html__('Show Info', 'medicare'),
                "param_name" => "show_info",
                "value" => array(
                    esc_html__("Yes, please", 'medicare') => 1
                ),
				"dependency" => array(
                    "element" => "post_type",
                    "value" => array("post","services"),
                ),
                "description" => esc_html__('Show or hide info of post on your blog.', 'medicare')
            ),
            array(
                "type" => "checkbox",
                "heading" => esc_html__('Show Description', 'medicare'),
                "param_name" => "show_desc",
                "value" => array(
                    esc_html__("Yes, please", 'medicare') => 1
                ),
                "dependency" => array(
                    "element" => "post_type",
                    "value" => array("post","services","testimonial","doctor"),
                ),
                "description" => esc_html__('Show or hide description of post on your blog.', 'medicare')
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__('Excerpt Length', 'medicare'),
                "param_name" => "excerpt_length",
                "value" => '',
                "dependency" => array(
                    "element" => "post_type",
                    "value" => array("post","services","testimonial","doctor"),
                ),
                "description" => esc_html__('The length of the excerpt, number of words to display. Set -1 show all words of excerpt.', 'medicare')
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__('Excerpt More', 'medicare'),
                "param_name" => "excerpt_more",
                "value" => "",
                "dependency" => array(
                    "element" => "post_type",
                    "value" => array("post","services","testimonial","doctor"),
                ),
				"description" => esc_html__('Please enter excerpt more for blog.', 'medicare')
            ),
            array(
                "type" => "dropdown",
                "heading" => esc_html__('Order by', 'medicare'),
                "param_name" => "orderby",
                "value" => array(
                    "None" => "none",
                    "Title" => "title",
                    "Date" => "date",
                    "ID" => "ID"
                ),
                "description" => esc_html__('Order by ("none", "title", "date", "ID").', 'medicare')
            ),
            array(
                "type" => "dropdown",
                "heading" => esc_html__('Order', 'medicare'),
                "param_name" => "order",
                "value" => Array(
                    "None" => "none",
                    "ASC" => "ASC",
                    "DESC" => "DESC"
                ),
                "description" => esc_html__('Order ("None", "Asc", "Desc").', 'medicare')
            ),
            array(
                "type" => "dropdown",
                "heading" => esc_html__('Show Pagination', 'medicare'),
                "param_name" => "show_pagination",
                "value" => Array(
                    "None" => "none",
                    "Number" => "number",
					"Ajax" => "ajax"
                ),
                "description" => esc_html__('Show or hide pagination of post on your blog.', 'medicare')
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
				"description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'medicare' )
            ),
        )
    ));
}
