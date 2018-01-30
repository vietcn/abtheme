<?php
vc_map(
    array(
        "name" => esc_html__("Client", "abtheme"),
        "base" => "cms_client",
        "icon" => "fa fa-user",
        "category" => esc_html__("CmsSuperheroes Shortcodes", "abtheme"),
        "params" => array(
            array(
                'type' => 'cms_template_img',
                'param_name' => 'cms_template',
                "shortcode" => "cms_client",
                "heading" => esc_html__("Shortcode Template","abtheme"),
                "admin_label" => true,
                "group" => esc_html__("Template", "abtheme"),
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__("Name","abtheme"),
                "param_name" => "name",
                "value" => "",
                "description" => esc_html__("Name","abtheme"),
                "group" => esc_html__("Client", "abtheme")
            ),
            array(
                "type" => "attach_image",
                "heading" => esc_html__("Client Image","abtheme"),
                "param_name" => "image",
                "group" => esc_html__("Client", "abtheme")
            ),
            array(
                'type'       => 'vc_link',
                'param_name' => 'link',
                'heading'    => esc_html__("Client link","abtheme"),
                "group" => esc_html__("Client", "abtheme")
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

class WPBakeryShortCode_cms_client extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}
?>