<?php
vc_map(array(
    "name" => 'CMS Button',
    "base" => "cms_button",
    "icon" => "cs_icon_for_vc",
    "category" => esc_html__('CmsSuperheroes Shortcodes', "wp-abtheme"),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => esc_html__( 'Text on the button', "wp-abtheme" ),
            "param_name" => "button_text",
            "value" => '',
            "group" => esc_html__("Button Settings", "wp-abtheme")
        ),
        array(
            "type" => "vc_link",
            "class" => "",
            "heading" => esc_html__("Link button", "wp-abtheme"),
            "param_name" => "link_button",
            "value" => '',
            "group" => esc_html__("Button Settings", "wp-abtheme")
        ),
        array(    
            'type' => 'dropdown',
            'heading' => esc_html__("Button Style", "wp-abtheme"),
            'param_name' => 'button_style',
            'value' => array(
                'Default' => 'btn-default',                   
                'Outline' => 'btn-outline-white',                     
                'Primary' => 'btn-primary',
            ),
            "group" => esc_html__("Button Settings", "wp-abtheme"),
        ),  
        array(    
            'type' => 'dropdown',
            'heading' => esc_html__("Button Size", "wp-abtheme"),
            'param_name' => 'button_size',
            'value' => array(
                'Default' => 'btn-small',
                'Default' => 'btn-normal',
                'Large' => 'btn-lg',
            ),
            "group" => esc_html__("Button Settings", "wp-abtheme"),
        ),   
        /* Start Icon */
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Icon library', "wp-abtheme" ),
            'value' => array(
                esc_html__( 'Font Awesome', "wp-abtheme" ) => 'fontawesome',
                esc_html__( 'Open Iconic', "wp-abtheme" ) => 'openiconic',
                esc_html__( 'Typicons', "wp-abtheme" ) => 'typicons',
                esc_html__( 'Entypo', "wp-abtheme" ) => 'entypo',
                esc_html__( 'Linecons', "wp-abtheme" ) => 'linecons',
                esc_html__( 'Pixel', "wp-abtheme" ) => 'pixelicons',
                esc_html__( 'P7 Stroke', "wp-abtheme" ) => 'pe7stroke',
                esc_html__( 'RT Icon', "wp-abtheme" ) => 'rticon',
            ),
            'param_name' => 'icon_type',
            'description' => esc_html__( 'Select icon library.', "wp-abtheme" ),
            "group" => esc_html__("Button Settings", "wp-abtheme"),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', "wp-abtheme" ),
            'param_name' => 'icon_fontawesome',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'fontawesome',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'fontawesome',
            ),
            'description' => esc_html__( 'Select icon from library.', "wp-abtheme" ),
            "group" => esc_html__("Button Settings", "wp-abtheme"),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', "wp-abtheme" ),
            'param_name' => 'icon_openiconic',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'openiconic',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'openiconic',
            ),
            'description' => esc_html__( 'Select icon from library.', "wp-abtheme" ),
            "group" => esc_html__("Button Settings", "wp-abtheme"),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', "wp-abtheme" ),
            'param_name' => 'icon_typicons',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'typicons',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'typicons',
            ),
            'description' => esc_html__( 'Select icon from library.', "wp-abtheme" ),
            "group" => esc_html__("Button Settings", "wp-abtheme"),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', "wp-abtheme" ),
            'param_name' => 'icon_entypo',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'entypo',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'entypo',
            ),
            'description' => esc_html__( 'Select icon from library.', "wp-abtheme" ),
            "group" => esc_html__("Button Settings", "wp-abtheme"),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', "wp-abtheme" ),
            'param_name' => 'icon_linecons',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'linecons',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'linecons',
            ),
            'description' => esc_html__( 'Select icon from library.', "wp-abtheme" ),
            "group" => esc_html__("Button Settings", "wp-abtheme"),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', "wp-abtheme" ),
            'param_name' => 'icon_pixelicons',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'pixelicons',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'pixelicons',
            ),
            'description' => esc_html__( 'Select icon from library.', "wp-abtheme" ),
            "group" => esc_html__("Button Settings", "wp-abtheme"),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', "wp-abtheme" ),
            'param_name' => 'icon_pe7stroke',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'pe7stroke',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'pe7stroke',
            ),
            'description' => esc_html__( 'Select icon from library.', "wp-abtheme" ),
            "group" => esc_html__("Button Settings", "wp-abtheme"),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', "wp-abtheme" ),
            'param_name' => 'icon_rticon',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'rticon',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'rticon',
            ),
            'description' => esc_html__( 'Select icon from library.', "wp-abtheme" ),
            "group" => esc_html__("Button Settings", "wp-abtheme"),
        ),
        /* End Icon */
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Icon Align", "wp-abtheme"),
            "admin_label" => true,
            "param_name" => "icon_align",
            "value" => array(
                "Left" => "left",
                "Right" => "right"
            ),
            "group" => esc_html__("Button Settings", "wp-abtheme"),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Custom Icon -  Add Class Icon", "wp-abtheme"),
            "param_name" => "icon_custom",
            "value" => "",
            "description" => "Please add class Material Design Iconic Font",
            "group" => esc_html__("Button Settings", "wp-abtheme"),
        ),     
        array(
            "type" => "textfield",
            "heading" => esc_html__( "Extra class name", "wp-abtheme" ),
            "param_name" => "el_class",
            "description" => esc_html__( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "wp-abtheme" ),
            "group" => esc_html__("Button Settings", "wp-abtheme"),
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