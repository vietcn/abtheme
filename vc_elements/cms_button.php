<?php
vc_map(array(
    "name" => 'CMS Button',
    "base" => "cms_button",
    "icon" => "cs_icon_for_vc",
    "category" => esc_html__('CmsSuperheroes Shortcodes', "abtheme"),
    "params" => array(
        array(
            'type' => 'cms_template_img',
            'param_name' => 'cms_template',
            "shortcode" => "cms_button",
            "heading" => esc_html__("Shortcode Template","abtheme"),
            "admin_label" => true,
            "group" => esc_html__("Template", "abtheme"),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__( 'Text on the button', "abtheme" ),
            "param_name" => "button_text",
            "value" => '',
        ),
        array(
            "type"       => "colorpicker",
            "heading"    => esc_html__("Button Text Color","abtheme"),
            "param_name" => "button_text_color",
        ),
        array(
            "type" => "vc_link",
            "class" => "",
            "heading" => esc_html__("Link button", "abtheme"),
            "param_name" => "link_button",
            "value" => '',
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__("Button Style", "abtheme"),
            'param_name' => 'button_style',
            'value' => array(
                'Default' => 'btn-default',
                'Outline' => 'btn-outline',
                'Primary' => 'btn-primary',
            ),
        ),
        array(
            "type"       => "colorpicker",
            "class"      => "",
            "heading"    => esc_html__("Background Color","abtheme"),
            "param_name" => "button_color",
            'dependency' => array(
                'element' => 'button_style',
                'value' => 'btn-outline',
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__("Button Size", "abtheme"),
            'param_name' => 'button_size',
            'value' => array(
                'Normal' => 'btn-normal',
                'Small' => 'btn-small',
                'Large' => 'btn-large',
            ),
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Button Align","abtheme"),
            'description' => esc_html__( 'Button Align', 'abtheme' ),
            "param_name" => "button_align",
            "value" => array(
                "Default" => "default",
                "Left" => "left",
                "Right" => "right",
                "Center" => "center"
            ),
        ),
        /* Start Icon */
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
            'value' => '',
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
            'value' => '',
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
            'value' => '',
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
            'value' => '',
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
            'value' => '',
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
            'value' => '',
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
            'value' => '',
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
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Icon Align", "abtheme"),
            "admin_label" => true,
            "param_name" => "icon_align",
            "value" => array(
                "Left" => "left",
                "Right" => "right"
            ),
            'group' => esc_html__('Icon', 'abtheme'),
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

class WPBakeryShortCode_cms_button extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>