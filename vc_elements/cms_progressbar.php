<?php
vc_map(
    array(
        "name" => __("CMS Progress Bar", "abtheme"),
        "base" => "cms_progressbar",
        "icon" => "icon-wpb-graph",
        "category" => __("CmsSuperheroes Shortcodes", "abtheme"),
        "params" => array(
            array(
                'type' => 'cms_template_img',
                'param_name' => 'cms_template',
                "shortcode" => "cms_progressbar",
                "heading" => esc_html__("Shortcode Template","abtheme"),
                "admin_label" => true,
                "group" => esc_html__("Template", "abtheme"),
            ),
            array(
                'type' => 'param_group',
                'heading' => __( 'Values', 'abtheme' ),
                'param_name' => 'values',
                'description' => __( 'Enter values for graph - title, value.', 'abtheme' ),
                "group" => __("Progress Bar Settings", "abtheme"),
                'value' => urlencode( json_encode( array(
                    array(
                        'label' => __( 'Design', 'abtheme' ),
                        'value' => '80',
                    ),
                    array(
                        'label' => __( 'Marketing', 'abtheme' ),
                        'value' => '70',
                    ),
                ) ) ),
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'heading' => __( 'Label', 'abtheme' ),
                        'param_name' => 'label',
                        'description' => __( 'Enter text used as title of bar.', 'abtheme' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => __( 'Value', 'abtheme' ),
                        'param_name' => 'value',
                        'description' => __( 'Enter value of bar. Number only', 'abtheme' ),
                    ),
                ),
            ),
            array(
                "type" => "dropdown",
                "heading" => __ ( 'Show Value', "abtheme" ),
                "param_name" => "show_value",
                "value" => array(
                    "Yes" => "true",
                    "No" => "false"
                ),
                "description" => '',
                "group" => __("Progress Bar Settings", "abtheme")
            ),
            array(
                "type" => "textfield",
                "class" => "",
                "value" => "60",
                "heading" => __ ( "Value", "abtheme" ),
                "param_name" => "value",
                "description" => "Number only, ex: 60",
                "group" => __("Progress Bar Settings", "abtheme")
            ),
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => __ ( "Value Suffix", "abtheme" ),
                "group" => __("Progress Bar Settings", "abtheme"),
                "param_name" => "value_suffix",
                "description" => ""
            ),
            array(
                "type" => "colorpicker",
                "heading" => __ ( 'Background Color Bar', "abtheme" ),
                "param_name" => "bg_color",
                "group" => __("Progress Bar Settings", "abtheme"),
                "value" =>"#e9e9e9",
                "description" => __('Background color for wrapper bar. Default is #e9e9e9',"abtheme")
            ),
            array(
                "type" => "colorpicker",
                "heading" => __ ( 'Progress Color', "abtheme" ),
                "param_name" => "color",
                "group" => __("Progress Bar Settings", "abtheme"),
                "description" => __('Background color for progress.',"abtheme")
            ),
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => __ ( "Width", "abtheme" ),
                "param_name" => "width",
                "value" => "50px",
                "group" => __("Progress Bar Settings", "abtheme"),
                "description" => "in px",
                "dependency" => array(
                    "element"=>"cms_template",
                    "value"=>array(
                        "cms_progressbar--vertical.php",
                    )
                ),
            ),
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => __ ( "Height", "abtheme" ),
                "param_name" => "height",
                "value" => "200px",
                "group" => __("Progress Bar Settings", "abtheme"),
                "description" => "in px",
                "dependency" => array(
                    "element"=>"cms_template",
                    "value"=>array(
                        "cms_progressbar--vertical.php",
                    )
                ),
            ),
            array(
                "type" => "textfield",
                "heading" => __ ( 'Border Radius', "abtheme" ),
                "param_name" => "border_radius",
                "group" => __("Progress Bar Settings", "abtheme"),
                "description" => 'px,%,...',
            ),
            array(
                'type' => 'animation_style',
                'heading' => __( 'Animation Style', 'abtheme' ),
                'param_name' => 'css_animation',
                'description' => __( 'Choose your animation style', 'abtheme' ),
                'admin_label' => false,
                'weight' => 0,
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Extra class name", "abtheme" ),
                "param_name" => "el_class",
                "description" => esc_html__( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "abtheme" ),
            ),
        )
    )
);
class WPBakeryShortCode_cms_progressbar extends CmsShortCode{
    protected function content($atts, $content = null){
        return parent::content($atts, $content);
    }
}

?>