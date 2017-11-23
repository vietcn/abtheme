<?php
vc_map(array(
    "name" => 'CMS Button',
    "base" => "cms_button",
    "icon" => "cs_icon_for_vc",
    "category" => esc_html__('CmsSuperheroes Shortcodes', 'abtheme'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __ ( 'Text on the button', 'abtheme' ),
            "param_name" => "button_text",
            "value" => '',
            "group" => esc_html__("Button Settings", 'abtheme')
        ),
        array(
            "type" => "vc_link",
            "class" => "",
            "heading" => esc_html__("Link button", 'abtheme'),
            "param_name" => "link_button",
            "value" => '',
            "group" => esc_html__("Button Settings", 'abtheme')
        ),
        array(    
            'type' => 'dropdown',
            'heading' => esc_html__("Button Style", 'abtheme'),
            'param_name' => 'button_style',
            'value' => array(
                'Button Default' => 'btn-default',
                'Button Default Outline' => 'btn-default-outline',
                'Button Primary' => 'btn-primary',
                'Button Primary Outline' => 'btn-primary-outline',
                'Button Color' => 'btn-color',
                'Button White Outline - Hover Primary' => 'btn-white-primary',
                'Button White Outline - Hover Dark' => 'btn-white-dark',
                'Button White Outline - Hover White' => 'btn-white-white',
                'Button White Primary' => 'btn-white',
                'Button Primary - Hover White' => 'btn-primary-white',
            ),
            "group" => esc_html__("Button Settings", 'abtheme'),
        ),  
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Button Custom Color", 'abtheme'),
            "param_name" => "button_bg_color",
            "value" => "",
            "dependency" => array(
                "element"=>"button_style",
                "value"=>array(
                    "btn-color",
                )
            ),
            "group" => esc_html__("Button Settings", 'abtheme'),
        ),
        array(    
            'type' => 'dropdown',
            'heading' => esc_html__("Button Shapes", 'abtheme'),
            'param_name' => 'button_shapes',
            'value' => array(
                'Button Normal' => '',
                'Button Round' => 'btn-round',
                'Button Square' => 'btn-square',
                'Button Circle' => 'btn-circle',
            ),
            "group" => esc_html__("Button Settings", 'abtheme'),
        ),  
        array(    
            'type' => 'dropdown',
            'heading' => esc_html__("Button Size", 'abtheme'),
            'param_name' => 'button_size',
            'value' => array(
                'Large' => 'btn-lg',                
                'Super Large' => 'btn-xlg',        
                'Small' => 'btn-sm',        
            ),
            "group" => esc_html__("Button Settings", 'abtheme'),
        ),   
        array(    
            'type' => 'dropdown',
            'heading' => esc_html__("Button Shadow", 'abtheme'),
            'param_name' => 'button_shadow',
            'value' => array(
                'No' => '',
                'Yes' => 'yes',
            ),
            "group" => esc_html__("Button Settings", 'abtheme'),
        ),  
        array(    
            'type' => 'dropdown',
            'heading' => esc_html__("Button Full Width", 'abtheme'),
            'param_name' => 'button_full_width',
            'value' => array(
                'No' => '',
                'Yes' => 'yes',
            ),
            "group" => esc_html__("Button Settings", 'abtheme'),
        ),  
        array(    
            'type' => 'dropdown',
            'heading' => esc_html__("Button Align", 'abtheme'),
            'param_name' => 'button_align',
            'value' => array(
                'Left' => 'left',                
                'Center' => 'center',        
                'Right' => 'right',        
            ),
            "group" => esc_html__("Button Settings", 'abtheme'),
        ),   
        array(
            "type" => "textfield",
            "heading" => __ ( 'Button Padding', 'abtheme' ),
            "param_name" => "button_padding",
            "value" => '',
            'description' => esc_html__( 'Enter: ...px', 'abtheme' ),
            "group" => esc_html__("Button Settings", 'abtheme')
        ),
        /* Start Icon */
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Icon library', 'abtheme' ),
            'value' => array(
                esc_html__( 'Font Awesome', 'abtheme' ) => 'fontawesome',
                esc_html__( 'Stroke Gap', 'abtheme' ) => 'stroke-gap',
            ),
            'param_name' => 'icon_type',
            'description' => esc_html__( 'Select icon library.', 'abtheme' ),
            "group" => esc_html__("Button Settings", 'abtheme'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', 'abtheme' ),
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
            'description' => esc_html__( 'Select icon from library.', 'abtheme' ),
            "group" => esc_html__("Button Settings", 'abtheme'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', 'abtheme' ),
            'param_name' => 'icon_stroke-gap',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'stroke-gap',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'stroke-gap',
            ),
            'description' => esc_html__( 'Select icon from library.', 'abtheme' ),
            "group" => esc_html__("Button Settings", 'abtheme'),
        ),
        
        /* End Icon */
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Icon Align", 'abtheme'),
            "admin_label" => true,
            "param_name" => "icon_align",
            "value" => array(
                "Left" => "left",
                "Right" => "right"
            ),
            "group" => esc_html__("Button Settings", 'abtheme'),
        ),
        array(
            "type" => "textfield",
            "heading" => __ ( "Extra class name", 'abtheme' ),
            "param_name" => "el_class",
            "description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'abtheme' ),
            "group" => esc_html__("Button Settings", 'abtheme'),
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