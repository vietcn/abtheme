<?php
vc_map(
    array(
        "name" => esc_html__("Team member", "abtheme"),
        "base" => "cms_team",
        "icon" => "fa fa-user",
        "category" => esc_html__("CmsSuperheroes Shortcodes", "abtheme"),
        "params" => array(
            array(
                'type' => 'cms_template_img',
                'param_name' => 'cms_template',
                "shortcode" => "cms_team",
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
                "group" => esc_html__("Team", "abtheme")
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__("Position","abtheme"),
                "param_name" => "position",
                "value" => "",
                "description" => esc_html__("Position","abtheme"),
                "group" => esc_html__("Team", "abtheme")
            ),
            array(
                "type" => "textarea",
                "heading" => esc_html__("Description","abtheme"),
                "param_name" => "description",
                "value" => "",
                "description" => esc_html__("Description","abtheme"),
                "group" => esc_html__("Team", "abtheme")
            ),
            array(
                "type" => "attach_image",
                "heading" => esc_html__("Team Image","abtheme"),
                "param_name" => "image",
                "group" => esc_html__("Team", "abtheme")
            ),
            array(
                "type"			=> "textfield",
                "class"			=> "",
                "heading"		=> esc_html__("Facebook","abtheme"),
                "param_name"	=> "facebook",
                "value"			=> "",
                "description" 	=> "Insert your facebook link here",
                "group" => esc_html__("Social", "abtheme"),
            ),
            array(
                "type"			=> "textfield",
                "class"			=> "",
                "heading"		=> esc_html__("Twitter","abtheme"),
                "param_name"	=> "twitter",
                "value"			=> "",
                "description" 	=> "Insert your twitter link here",
                "group" => esc_html__("Social", "abtheme"),
            ),
            array(
                "type"			=> "textfield",
                "class"			=> "",
                "heading"		=> esc_html__("Pinterest","abtheme"),
                "param_name"	=> "pinterest",
                "value"			=> "",
                "description" 	=> "Insert your pinterest link here",
                "group" => esc_html__("Social", "abtheme"),
            ),
            array(
                "type"			=> "textfield",
                "class"			=> "",
                "heading"		=> esc_html__("Google +","abtheme"),
                "param_name"	=> "google",
                "value"			=> "",
                "description" 	=> "Insert your google+ link here",
                "group" => esc_html__("Social", "abtheme"),
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

class WPBakeryShortCode_cms_team extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}
?>