<?php
vc_map(array(
    "name" => 'CMS Call To Action',
    "base" => "cms_call_to_action",
    "icon" => "icon-wpb-call-to-action",
    "category" => esc_html__('CmsSuperheroes Shortcodes', "abtheme"),
    "params" => array(
        array(
            'type'        => 'textfield',
            'heading'     => esc_html__( 'Heading', 'abtheme' ),
            'param_name'  => 'heading',
            "admin_label" => true,
            'description' => esc_html__( 'Enter text for heading line.', 'abtheme' ),
        ),
        array(
            "type"       => "colorpicker",
            "class"      => "",
            "heading"    => esc_html__("Heading Color","abtheme"),
            "param_name" => "heading_color",
        ),

        array(
            'type' => 'cms_template_img',
            'param_name' => 'cms_template',
            "shortcode" => "cms_call_to_action",
            "heading" => esc_html__("Shortcode Template","abtheme"),
            "admin_label" => true,
            "group" => esc_html__("Template", "abtheme"),
        ),

        array(
            'type'        => 'textfield',
            'heading'     => esc_html__( 'Button Text', 'abtheme' ),
            'param_name'  => 'button_text',
            'group' => esc_html__("Button", "abtheme"),
            'description' => esc_html__( 'Text on the button.', 'abtheme' ),
        ),
        array(
            'type'        => 'vc_link',
            'heading'     => esc_html__( 'URL (Link)', 'abtheme' ),
            'param_name'  => 'button_link',
            'description' => esc_html__( 'Button link.', 'abtheme' ),
            'group' => esc_html__("Button", "abtheme"),
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
            "group" => esc_html__("Button", "abtheme"),
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
            'group' => esc_html__('Button Icon', 'abtheme'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __( 'Icon', 'abtheme' ),
            'param_name' => 'icon_fontawesome',
            'value' => 'fa fa-adjust',
            // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false,
                // default true, display an "EMPTY" icon?
                'iconsPerPage' => 4000,
                // default 100, how many icons per/page to display, we use (big number) to display all icons in single page
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'fontawesome',
            ),
            'description' => __( 'Select icon from library.', 'abtheme' ),
            'group' => esc_html__('Button Icon', 'abtheme'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __( 'Icon', 'abtheme' ),
            'param_name' => 'icon_openiconic',
            'value' => 'vc-oi vc-oi-dial',
            // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false,
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
            'group' => esc_html__('Button Icon', 'abtheme'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __( 'Icon', 'abtheme' ),
            'param_name' => 'icon_typicons',
            'value' => 'typcn typcn-adjust-brightness',
            // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false,
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
            'group' => esc_html__('Button Icon', 'abtheme'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __( 'Icon', 'abtheme' ),
            'param_name' => 'icon_entypo',
            'value' => 'entypo-icon entypo-icon-note',
            // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false,
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
            'group' => esc_html__('Button Icon', 'abtheme'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __( 'Icon', 'abtheme' ),
            'param_name' => 'icon_linecons',
            'value' => 'vc_li vc_li-heart',
            // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false,
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
            'group' => esc_html__('Button Icon', 'abtheme'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __( 'Icon', 'abtheme' ),
            'param_name' => 'icon_monosocial',
            'value' => 'vc-mono vc-mono-fivehundredpx',
            // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false,
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
            'group' => esc_html__('Button Icon', 'abtheme'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __( 'Icon', 'abtheme' ),
            'param_name' => 'icon_material',
            'value' => 'vc-material vc-material-cake',
            // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false,
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
            'group' => esc_html__('Button Icon', 'abtheme'),
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
            "group" => esc_html__("Button Icon", "abtheme"),
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
));

class WPBakeryShortCode_cms_call_to_action extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>