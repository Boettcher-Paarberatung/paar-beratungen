<?php

add_action('init', 'title_integrateWithVC');

function title_integrateWithVC() {
    vc_map(array(
        "name" => esc_html__("Title", 'medicare'),
        "base" => "title",
        "class" => "title",
        "category" => esc_html__('Medicare', 'medicare'),
        "icon" => "tb-icon-for-vc",
        "params" => array(
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Title", 'medicare'),
                "param_name" => "title",
                "value" => "",
                "description" => esc_html__("Content.", 'medicare')
            ),
			 array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Sub Title", 'medicare'),
                "param_name" => "sub_title",
                "value" => "",
                "description" => esc_html__("Content.", 'medicare')
            ),
			array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Font Size", 'medicare'),
                "param_name" => "font_size",
                "value" => "",
                "description" => esc_html__("Font Size.", 'medicare')
            ),
            array (
                "type" => "colorpicker",
                "heading" => esc_html__( 'Color', 'medicare' ),
                "param_name" => "color",
                "value" => '',
                "description" => esc_html__( 'Color', 'medicare' ),
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => esc_html__("Template", 'medicare'),
                "param_name" => "title_tpl",
                "value" => array(
                    //esc_html__("Title Separator ( position dependent by text-align)",'medicare') => "tpl3",
                    //esc_html__("Title Underline style 1 (Single diamond)",'medicare') => "tpl1",
                    //esc_html__("Title Underline style without diamond",'medicare') => "tpl2",
                    esc_html__("Default",'medicare') => "none",
                ),
                "std"=>"none",
                "description" => esc_html__('Select template for title.', 'medicare')
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => esc_html__("Align", 'medicare'),
                "param_name" => "el_align",
                "value" => array(
                    esc_html__("Left",'medicare') => "text-left",
                    esc_html__("Right",'medicare') => "text-right",
                    esc_html__("Center",'medicare') => "text-center"
                ),
                "std" => "text-center",
                "description" => esc_html__("Align", 'medicare')
            ),
			array(
            "type" => "attach_image",
            "class" => "",
            "heading" => esc_html__("Image", 'medicare'),
            "param_name" => "images",
            "value" => "",
            "group" => esc_html__("Template", 'medicare'),
            "description" => esc_html__("Select image in this element", 'medicare')
        ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => esc_html__("Animation", 'medicare'),
                "param_name" => "animation",
                "value" => array(
                    esc_html__("No",'medicare') => "",
                    esc_html__("Top to bottom",'medicare') => "top-to-bottom",
                    esc_html__("Bottom to top",'medicare') => "bottom-to-top",
                    esc_html__("Left to right",'medicare') => "left-to-right",
                    esc_html__("Right to left",'medicare') => "right-to-left",
                    esc_html__("Appear from center",'medicare') => "appear"
                ),
                "description" => esc_html__("Animation", 'medicare')
            ),
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Link ID", 'medicare'),
                "param_name" => "title_link_id",
                "value" => "",
                "description" => esc_html__("Set ID for this Title", 'medicare')
            ),
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Extra Class", 'medicare'),
                "param_name" => "el_class",
                "value" => "",
                "description" => esc_html__("Extra Class.", 'medicare')
            ),
        )
    ));
}
