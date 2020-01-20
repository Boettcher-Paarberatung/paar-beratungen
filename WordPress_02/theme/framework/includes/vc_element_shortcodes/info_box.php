<?php
vc_map(array(
	"name" => esc_html__("Info Box", 'medicare'),
	"base" => "info_box",
	"category" => esc_html__('Medicare', 'medicare'),
	"icon" => "tb-icon-for-vc",
	"params" => array(
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Template", 'medicare'),
			"param_name" => "tpl",
			"value" => array(
				esc_html__("Template 1 (Text on the left)",'medicare') => "tpl1",
				esc_html__("Template 2 (Header_Pic)",'medicare') => "tpl2",
				esc_html__("Template 3 (Img left, text right, only img1)",'medicare') => "tpl3",
				
				/*
				esc_html__("Template 2 (Text on the right)",'medicare') => "tpl2",
				esc_html__("Template 3 (Vertical center Text)",'medicare') => "tpl3",
				esc_html__("Template 4 (Text on the right, 2 banner)",'medicare') => "tpl4",
				esc_html__("Template 5 (Big column ~ Special today)",'medicare') => "tpl5",
				esc_html__("Template 6 (Vertical align style as home page 1)",'medicare') => "tpl6",
				esc_html__("Template 7 (Big column ~ new trend)",'medicare') => "tpl7",
				*/
			),
			"description" => esc_html__('Select template in this element.', 'medicare')
		),
		array(
			"type" => "exploded_textarea",
			"class" => "",
			"heading" => esc_html__("Heading 1", 'medicare'),
			"param_name" => "heading_1",
			"value" => "",
			"group" => esc_html__("Content & image", 'medicare'),
			"description" => esc_html__("Please, Enter text of heading.", 'medicare')
		),
		array(
			"type" => "textarea_html",
			"class" => "",
			"heading" => esc_html__("Description", 'medicare'),
			"param_name" => "content",
			"value" => "",
			"group" => esc_html__("Content & image", 'medicare'),
			"description" => esc_html__("Please, enter description in this element.", 'medicare')
		),
		array(
            "type" => "attach_image",
            "class" => "",
            "heading" => esc_html__("Image", 'medicare'),
            "param_name" => "image_1",
            "value" => "",
            //"group" => "Image 1",
            "group" => esc_html__("Content & image", 'medicare'),
            "description" => esc_html__("Select image in this element", 'medicare')
        ),
		array(
			"type" => "checkbox", 
			"heading" => esc_html__('Crop image', 'medicare'),
			"param_name" => "crop_image1",
			"value" => array(
				esc_html__("Yes, please", 'medicare') => 1
			),
			"group" => esc_html__("Content & image", 'medicare'),
			"description" => esc_html__('Crop or not crop image on your Post.', 'medicare')
		),
		/*
		array(
			"type" => "textfield",
			"heading" => esc_html__('Width image', 'medicare'),
			"param_name" => "width_image1",
			"dependency" => array(
				"element"=>"crop_image1",
				"value"=>"1"
			),
			"group" => esc_html__("Content & image", 'medicare'),
			"description" => esc_html__('Enter the width of image. Default: 300.', 'medicare')
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__('Height image', 'medicare'),
			"param_name" => "height_image1",
			"dependency" => array(
				"element"=>"crop_image1",
				"value"=>"1"
			),
			"group" => esc_html__("Content & image", 'medicare'),
			"description" => esc_html__('Enter the height of image. Default: 200.', 'medicare')
		),
		*/
        array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Align image", 'medicare'),
			"param_name" => "align_image1",
			"value" => array(
				esc_html__("Center Center",'medicare') => "",
				esc_html__("Top Left",'medicare') => "tb-origin-top-left",
				esc_html__("Top Right",'medicare') => "tb-origin-top-right",
				esc_html__("Top Center",'medicare') => "tb-origin-top-center",
				esc_html__("Bottom Left",'medicare') => "tb-origin-bottom-left",
				esc_html__("Bottom Right",'medicare') => "tb-origin-bottom-right",
				esc_html__("Bottom Center",'medicare') => "tb-origin-bottom-center"
			),
			"group" => esc_html__("Content & image", 'medicare'),
			"description" => esc_html__('Select template in this element.', 'medicare')
		),
		array(
			"type" => "exploded_textarea",
			"class" => "",
			"heading" => esc_html__("Heading 2:", 'medicare'),
			"param_name" => "heading_2",
			"value" => "",
			"group" => esc_html__("Image 2", 'medicare'),
			"description" => esc_html__("Please, Enter text of heading.", 'medicare')
		),
		array(
            "type" => "attach_image",
            "class" => "",
            "heading" => esc_html__("Image", 'medicare'),
            "param_name" => "image_2",
            "value" => "",
            "group" => "Image 2",
            "description" => esc_html__("Select image in this element", 'medicare')
        ),
        array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Align image", 'medicare'),
			"param_name" => "align_image2",
			"value" => array(
				esc_html__("Center Center",'medicare') => "",
				esc_html__("Top Left",'medicare') => "tb-origin-top-left",
				esc_html__("Top Right",'medicare') => "tb-origin-top-right",
				esc_html__("Top Center",'medicare') => "tb-origin-top-center",
				esc_html__("Bottom Left",'medicare') => "tb-origin-bottom-left",
				esc_html__("Bottom Right",'medicare') => "tb-origin-bottom-right",
				esc_html__("Bottom Center",'medicare') => "tb-origin-bottom-center"
			),
			"group" => esc_html__("Image 2", 'medicare'),
			"description" => esc_html__('Select template in this element.', 'medicare')
		),
        array(
			"type" => "exploded_textarea",
			"class" => "",
			"heading" => esc_html__("Heading 3", 'medicare'),
			"param_name" => "heading_3",
			"value" => "",
			"group" => esc_html__("Image 3", 'medicare'),
			"description" => esc_html__("Please, Enter text of heading.", 'medicare')
		),
        array(
            "type" => "attach_image",
            "class" => "",
            "heading" => esc_html__("Image", 'medicare'),
            "param_name" => "image_3",
            "value" => "",
            "group" => "Image 3",
            "description" => esc_html__("Select image in this element", 'medicare')
        ),
        array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Align image", 'medicare'),
			"param_name" => "align_image3",
			"value" => array(
				esc_html__("Center Center",'medicare') => "",
				esc_html__("Top Left",'medicare') => "tb-origin-top-left",
				esc_html__("Top Right",'medicare') => "tb-origin-top-right",
				esc_html__("Top Center",'medicare') => "tb-origin-top-center",
				esc_html__("Bottom Left",'medicare') => "tb-origin-bottom-left",
				esc_html__("Bottom Right",'medicare') => "tb-origin-bottom-right",
				esc_html__("Bottom Center",'medicare') => "tb-origin-bottom-center"
			),
			"group" => esc_html__("Image 3", 'medicare'),
			"description" => esc_html__('Select template in this element.', 'medicare')
		),
        array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Link Text", 'medicare'),
			"param_name" => "link_text",
			"value" => "",
			"std" =>"",
			"description" => esc_html__("Please, Enter read more text in this element. EX: Shop Now", 'medicare')
		),
        array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Extra Link", 'medicare'),
			"param_name" => "ex_link",
			"value" => "",
			"description" => esc_html__("Please, enter extra link in this element.", 'medicare')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Promotion Link Text", 'medicare'),
			"param_name" => "promotion_text",
			"value" => "",
			"std" =>""	,
			"description" => esc_html__("Please, Enter read more text in this element. EX: Promotion", 'medicare')
		),
        array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Extra Promotion Link", 'medicare'),
			"param_name" => "promotion_link",
			"value" => "",
			"description" => esc_html__("Please, enter extra link in this element.", 'medicare')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Extra Class", 'medicare'),
			"param_name" => "el_class",
			"value" => "",
			"description" => esc_html__( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'medicare' )
		),
	)
));
