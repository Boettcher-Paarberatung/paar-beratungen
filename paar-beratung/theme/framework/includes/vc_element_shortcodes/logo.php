<?php

add_action('init', 'jws_theme_logo_integrateWithVC');

function jws_theme_logo_integrateWithVC() {
    vc_map(array(
        "name" => esc_html__("Insert Logo", 'medicare'),
        "base" => "logo",
        "class" => "tb-logo",
        "category" => esc_html__('Medicare', 'medicare'),
        "icon" => "tb-icon-for-vc",
        "params" => array(
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

                "heading" => esc_html__("Image Logo", 'medicare'),

                "param_name" => "image_logo",

                "value" => "",

                "description" => esc_html__("Insert logo image.", 'medicare')

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
                "heading" => esc_html__("Extra Class", 'medicare'),
                "param_name" => "el_class",
                "value" => "",
                "description" => esc_html__("Extra Class.", 'medicare')
            ),
        )
    ));
}
