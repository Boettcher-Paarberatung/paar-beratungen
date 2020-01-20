<?php
vc_map(array(
	"name" => esc_html__("Service Box", 'medicare'),
	"base" => "service_box",
	"category" => esc_html__('Medicare', 'medicare'),
	"icon" => "tb-icon-for-vc",
	"params" => array(
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Template", 'medicare'),
			"param_name" => "tpl",
			"value" => array(
				esc_html__("Default",'medicare') => "tpl",
				esc_html__("Template 1 (Border top)",'medicare') => "tpl1",
				esc_html__("Template 2 (Icon on the left)",'medicare') => "tpl2",
				esc_html__("Template 3 (Count Up)",'medicare') => "tpl3",
				esc_html__("Template 4 (Icon on Top)",'medicare') => "tpl4",
				esc_html__("Template 5 (Img on left)",'medicare') => "tpl5",
				esc_html__("Template 6 (Img on Top - Style 2)",'medicare') => "tpl6"
			),
			"description" => esc_html__('Select template in this element.', 'medicare')
		),
		array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Text Align", 'medicare'),
            "param_name" => "el_align",
            "value" => array(
                esc_html__("Left",'medicare') => "text-left",
                esc_html__("Right",'medicare') => "text-right",
                esc_html__("Center",'medicare') => "text-center"
            ),
            "std" => "text-center",
            "description" => esc_html__("Text Align in Service box", 'medicare')
        ),

		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Icon", 'medicare'),
			"param_name" => "icon",
			"value" => "",
			"std" => "",
			"description" => esc_html__("Please, enter class icon in this element.\n Empty this field if you user an image", 'medicare')
		),
		array(
            "type" => "attach_image",
            "class" => "",
            "heading" => esc_html__("Image", 'medicare'),
            "param_name" => "image_icon",
            "value" => "",
            "group" => esc_html__("Template", 'medicare'),
            "description" => esc_html__("Select image in this element", 'medicare')
        ),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Title", 'medicare'),
			"param_name" => "title",
			"value" => "",
			"description" => esc_html__("Please, enter title in this element.", 'medicare')
		),
		array(
			"type" => "textarea_html",
			"class" => "",
			"heading" => esc_html__("Description", 'medicare'),
			"param_name" => "content",
			"value" => "",
			"description" => esc_html__("Please, enter description in this element.", 'medicare')
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
			"heading" => esc_html__("Extra Class", 'medicare'),
			"param_name" => "el_class",
			"value" => "",
			"description" => esc_html__( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'medicare' )
		),
	)
));
