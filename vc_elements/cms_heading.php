<?php
vc_map(array(
    "name" => 'CMS Heading',
    "base" => "cms_heading",
    "icon" => "icon-wpb-ui-custom_heading",
    "category" => esc_html__('CmsSuperheroes Shortcodes', "abtheme"),
    "params" => array(
        array(
            'type' => 'cms_template_img',
            'param_name' => 'cms_template',
            "shortcode" => "cms_heading",
            "heading" => esc_html__("Shortcode Template","abtheme"),
            "group" => esc_html__("Template", "abtheme"),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__( 'Heading Text', "abtheme" ),
            "param_name" => "hd_title",
            "value" => '',
            "admin_label" => true,
            "description" => "Enter Heading Text",
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Heading Color","abtheme"),
            "param_name" => "hd_title_color",
            "value" => "",
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Heading tag", "abtheme"),
            "param_name" => "hd_tag",
            "value" => array(
                "h1" => "h1",
                "h2" => "h2",
                "h3" => "h3",
                "h4" => "h4",
                "h5" => "h5",
                "h6" => "h6",
                "p" => "p",
                "div" => "div",
            ),
            "std" => "h2",
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__( 'Heading Font Size', "abtheme" ),
            "param_name" => "hd_title_font_size",
            "value" => '',
            "description" => "Enter font size (Number Only)",
        ),
        array(
            "type" => "textarea",
            "heading" => esc_html__( 'Subheading', "abtheme" ),
            "param_name" => "hd_subheading",
            "value" => '',
            "dependency" => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_heading--layout2.php",
                )
            ),
            "group" => esc_html__("Sub Heading", "abtheme"),
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Sub Heading Color","abtheme"),
            "param_name" => "hd_subheading_color",
            "value" => "",
            "dependency" => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_heading--layout2.php",
                )
            ),
            "group" => esc_html__("Sub Heading", "abtheme"),
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Title Align", "abtheme"),
            "param_name" => "hd_content_align",
            "value" => array(
                "Default" => "default",
                "Left" => "left",
                "Center" => "center",
                "Right" => "right"
            ),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__( 'Config for margin bottom', "abtheme" ),
            "param_name" => "hd_margin",
            "value" => '',
            "description" => "Enter margin bottom (Number Only)",
            "group" => esc_html__("Margin", "abtheme"),
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
));

class WPBakeryShortCode_cms_heading extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>