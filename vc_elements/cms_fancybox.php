<?php
vc_map(
    array(
        "name" => __("CMS Fancy Box", "abtheme"),
        "base" => "cms_fancybox",
        "class" => "vc-cms-fancy-boxes",
        "category" => __("CmsSuperheroes Shortcodes", "abtheme"),
        "params" => array(
            array(
                'type' => 'cms_template_img',
                'param_name' => 'cms_template',
                "shortcode" => "cms_fancybox",
                "heading" => esc_html__("Shortcode Template","abtheme"),
                "admin_label" => true,
                "group" => esc_html__("Template", "abtheme"),
            ),
            array(
                "type" => "textfield",
                "heading" => __("Title","abtheme"),
                "param_name" => "title",
                "value" => "",
                "description" => __("Title Of Fancy Icon Box","abtheme"),
            ),
            array(
                "type" => "textarea",
                "heading" => __("Description","abtheme"),
                "param_name" => "description",
                "value" => "",
                "description" => __("Description Of Fancy Icon Box","abtheme"),
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Content Align","abtheme"),
                'description' => esc_html__( 'Content Align', 'abtheme' ),
                "param_name" => "content_align",
                "value" => array(
                    "Default" => "default",
                    "Left" => "left",
                    "Right" => "right",
                    "Center" => "center"
                ),
            ),
            /* Start Items */
            array(
                'type' => 'dropdown',
                'heading' => __( 'Icon library', 'abtheme' ),
                'value' => array(
                    __( 'Font Awesome', 'abtheme' ) => 'fontawesome',
                    __( 'Open Iconic', 'abtheme' ) => 'openiconic',
                    __( 'Typicons', 'abtheme' ) => 'typicons',
                    __( 'Entypo', 'abtheme' ) => 'entypo',
                    __( 'Linecons', 'abtheme' ) => 'linecons',
                    __( 'Mono Social', 'abtheme' ) => 'monosocial',
                    __( 'Material', 'abtheme' ) => 'material',
                ),
                'param_name' => 'icon_type',
                'description' => __( 'Select icon library.', 'abtheme' ),
                'group' => esc_html__('Icon', 'abtheme'),
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __( 'Icon', 'abtheme' ),
                'param_name' => 'icon_fontawesome',
                'value' => 'fa fa-adjust',
                // default value to backend editor admin_label
                'settings' => array(
                    'emptyIcon' => true,
                    // default true, display an "EMPTY" icon?
                    'iconsPerPage' => 4000,
                    // default 100, how many icons per/page to display, we use (big number) to display all icons in single page
                ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'fontawesome',
                ),
                'description' => __( 'Select icon from library.', 'abtheme' ),
                'group' => esc_html__('Icon', 'abtheme'),
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __( 'Icon', 'abtheme' ),
                'param_name' => 'icon_openiconic',
                'value' => 'vc-oi vc-oi-dial',
                // default value to backend editor admin_label
                'settings' => array(
                    'emptyIcon' => true,
                    // default true, display an "EMPTY" icon?
                    'type' => 'openiconic',
                    'iconsPerPage' => 4000,
                    // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'openiconic',
                ),
                'description' => __( 'Select icon from library.', 'abtheme' ),
                'group' => esc_html__('Icon', 'abtheme'),
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __( 'Icon', 'abtheme' ),
                'param_name' => 'icon_typicons',
                'value' => 'typcn typcn-adjust-brightness',
                // default value to backend editor admin_label
                'settings' => array(
                    'emptyIcon' => true,
                    // default true, display an "EMPTY" icon?
                    'type' => 'typicons',
                    'iconsPerPage' => 4000,
                    // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'typicons',
                ),
                'description' => __( 'Select icon from library.', 'abtheme' ),
                'group' => esc_html__('Icon', 'abtheme'),
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __( 'Icon', 'abtheme' ),
                'param_name' => 'icon_entypo',
                'value' => 'entypo-icon entypo-icon-note',
                // default value to backend editor admin_label
                'settings' => array(
                    'emptyIcon' => true,
                    // default true, display an "EMPTY" icon?
                    'type' => 'entypo',
                    'iconsPerPage' => 4000,
                    // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'entypo',
                ),
                'description' => __( 'Select icon from library.', 'abtheme' ),
                'group' => esc_html__('Icon', 'abtheme'),
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __( 'Icon', 'abtheme' ),
                'param_name' => 'icon_linecons',
                'value' => 'vc_li vc_li-heart',
                // default value to backend editor admin_label
                'settings' => array(
                    'emptyIcon' => true,
                    // default true, display an "EMPTY" icon?
                    'type' => 'linecons',
                    'iconsPerPage' => 4000,
                    // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'linecons',
                ),
                'description' => __( 'Select icon from library.', 'abtheme' ),
                'group' => esc_html__('Icon', 'abtheme'),
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __( 'Icon', 'abtheme' ),
                'param_name' => 'icon_monosocial',
                'value' => 'vc-mono vc-mono-fivehundredpx',
                // default value to backend editor admin_label
                'settings' => array(
                    'emptyIcon' => true,
                    // default true, display an "EMPTY" icon?
                    'type' => 'monosocial',
                    'iconsPerPage' => 4000,
                    // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'monosocial',
                ),
                'description' => __( 'Select icon from library.', 'abtheme' ),
                'group' => esc_html__('Icon', 'abtheme'),
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __( 'Icon', 'abtheme' ),
                'param_name' => 'icon_material',
                'value' => 'vc-material vc-material-cake',
                // default value to backend editor admin_label
                'settings' => array(
                    'emptyIcon' => true,
                    // default true, display an "EMPTY" icon?
                    'type' => 'material',
                    'iconsPerPage' => 4000,
                    // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'material',
                ),
                'description' => __( 'Select icon from library.', 'abtheme' ),
                'group' => esc_html__('Icon', 'abtheme'),
            ),
            /* End Icon */
            array(
                "type" => "attach_image",
                "heading" => __("Image","abtheme"),
                "param_name" => "image",
                'group' => esc_html__('Icon', 'abtheme'),
                "description" => __("If you select image, icon will replace by image","abtheme"),
            ),
            /* End Items */
            array(
                "type" => "dropdown",
                "heading" => __("Button Type","abtheme"),
                "param_name" => "button_type",
                "value" => array(
                    "Button" => "button",
                    "Text" => "text"
                ),
                "group" => __("Button", "abtheme")
            ),
            array(
                'type'        => 'vc_link',
                'heading'     => esc_html__( 'Button URL (Link)', 'abtheme' ),
                'param_name'  => 'button_link',
                'description' => esc_html__( 'Button link.', 'abtheme' ),
                'group' => esc_html__("Button", "abtheme"),
            ),
            array(
                "type" => "textfield",
                "heading" => __("Button Text","abtheme"),
                "param_name" => "button_text",
                "value" => "",
                "description" => __("Button Text","abtheme"),
                "group" => __("Button", "abtheme")
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Extra class name", "abtheme" ),
                "param_name" => "el_class",
                "description" => esc_html__( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "abtheme" ),
            ),
            array(
                'type' => 'animation_style',
                'heading' => __( 'Animation Style', 'abtheme' ),
                'param_name' => 'css_animation',
                'description' => __( 'Choose your animation style', 'abtheme' ),
                'admin_label' => false,
                'weight' => 0,
            ),
        )
    )
);
class WPBakeryShortCode_cms_fancybox extends CmsShortCode{
    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}
?>