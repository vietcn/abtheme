<?php
vc_map(array(
    "name" => 'CMS Heading',
    "base" => "cms_heading",
    "icon" => "cs_icon_for_vc",
    "category" => esc_html__('CmsSuperheroes Shortcodes', "wp-abtheme"),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => esc_html__( 'Title', "wp-abtheme" ),
            "param_name" => "hd_title",
            "value" => '',
            "admin_label" => true,
            "group" => esc_html__("Heading Settings", "wp-abtheme")
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Title Color","wp-abtheme"),
            "param_name" => "title_color",
            "value" => "",
            "group" => esc_html__("Heading Settings", "wp-abtheme"),
            "dependency" => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_heading.php",
                )
            ),
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Heading tag", "wp-abtheme"),
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
            "group" => esc_html__("Heading Settings", "wp-abtheme"),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__( 'Title Font Size', "wp-abtheme" ),
            "param_name" => "hd_title_font_size",
            "value" => '',
            "group" => esc_html__("Heading Settings", "wp-abtheme"),
            "description" => "Enter font size (Number Only)",
            "dependency" => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_heading.php",
                )
            ),
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Content Align", "wp-abtheme"),
            "param_name" => "content_align",
            "value" => array(
                "Left" => "left",
                "Center" => "center",
                "Right" => "right"
            ),
            "group" => esc_html__("Heading Settings", "wp-abtheme"),
            "dependency" => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_heading.php",
                )
            ),
        ),
        array(
            "type" => "textarea",
            "heading" => esc_html__( 'Description', "wp-abtheme" ),
            "param_name" => "hd_description",
            "value" => '',
            "group" => esc_html__("Heading Settings", "wp-abtheme"),
            "dependency" => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_heading.php",
                    "cms_heading--layout1.php",
                )
            ),
        ),  
        array(
            'type' => 'cms_template_img',
            'param_name' => 'cms_template',
            "shortcode" => "cms_heading",
            "heading" => esc_html__("Heading Template","wp-abtheme"),
            "admin_label" => true,
            "group" => esc_html__("Template", "wp-abtheme"),
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