<?php
vc_map(array(
    "name" => 'CMS Process',
    "base" => "cms_process",
    "icon" => "cs_icon_for_vc",
    "category" => esc_html__('CmsSuperheroes Shortcodes', 'wp-abtheme'),
    "params" => array(

        array(
            "type" => "textarea",
            "heading" => esc_html__("Description", 'wp-abtheme'),
            "param_name" => "process_description1",
            "group" => esc_html__("Item 1", 'wp-abtheme'),
            
        ),
        /* Start Icon */
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Icon library', 'wp-abtheme' ),
                'value' => array(
                    esc_html__( 'Font Awesome', 'wp-abtheme' ) => 'fontawesome',
                ),
                'param_name' => 'icon_type1',
                'description' => esc_html__( 'Select icon library.', 'wp-abtheme' ),
                "group" => esc_html__("Item 1", 'wp-abtheme'),
                
            ),
            array(
                'type' => 'iconpicker',
                'heading' => esc_html__( 'Icon Item', 'wp-abtheme' ),
                'param_name' => 'icon_fontawesome1',
                'value' => '',
                'settings' => array(
                    'emptyIcon' => true, // default true, display an "EMPTY" icon?
                    'type' => 'fontawesome',
                    'iconsPerPage' => 200, // default 100, how many icons per/page to display
                ),
                
                'description' => esc_html__( 'Select icon from library.', 'wp-abtheme' ),
                "group" => esc_html__("Item 1", 'wp-abtheme')
            ),

            array(
                "type" => "attach_image",
                "heading" => esc_html__( 'Icon Image', "wp-abtheme" ),
                "param_name" => "process_icon_image1",
                "value" => '',
                "group" => esc_html__("Item 1", "wp-abtheme")
            ),
            
        /* End Icon */

        array(
            "type" => "textarea",
            "heading" => esc_html__("Description", 'wp-abtheme'),
            "param_name" => "process_description2",
            "group" => esc_html__("Item 2", 'wp-abtheme'),
            
        ),
        /* Start Icon */
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Icon library', 'wp-abtheme' ),
                'value' => array(
                    esc_html__( 'Font Awesome', 'wp-abtheme' ) => 'fontawesome',
                ),
                'param_name' => 'icon_type2',
                'description' => esc_html__( 'Select icon library.', 'wp-abtheme' ),
                "group" => esc_html__("Item 2", 'wp-abtheme'),
                
            ),
            array(
                'type' => 'iconpicker',
                'heading' => esc_html__( 'Icon Item', 'wp-abtheme' ),
                'param_name' => 'icon_fontawesome2',
                'value' => '',
                'settings' => array(
                    'emptyIcon' => true, // default true, display an "EMPTY" icon?
                    'type' => 'fontawesome',
                    'iconsPerPage' => 200, // default 100, how many icons per/page to display
                ),
                
                'description' => esc_html__( 'Select icon from library.', 'wp-abtheme' ),
                "group" => esc_html__("Item 2", 'wp-abtheme')
            ),
            array(
                "type" => "attach_image",
                "heading" => esc_html__( 'Icon Image', "wp-abtheme" ),
                "param_name" => "process_icon_image2",
                "value" => '',
                "group" => esc_html__("Item 2", "wp-abtheme")
            ),

        /* End Icon */

        array(
            "type" => "textarea",
            "heading" => esc_html__("Description", 'wp-abtheme'),
            "param_name" => "process_description3",
            "group" => esc_html__("Item 3", 'wp-abtheme'),
        ),
        /* Start Icon */
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Icon library', 'wp-abtheme' ),
                'value' => array(
                    esc_html__( 'Font Awesome', 'wp-abtheme' ) => 'fontawesome',
                ),
                'param_name' => 'icon_type3',
                'description' => esc_html__( 'Select icon library.', 'wp-abtheme' ),
                "group" => esc_html__("Item 3", 'wp-abtheme'),
            ),
            array(
                'type' => 'iconpicker',
                'heading' => esc_html__( 'Icon Item', 'wp-abtheme' ),
                'param_name' => 'icon_fontawesome3',
                'value' => '',
                'settings' => array(
                    'emptyIcon' => true, // default true, display an "EMPTY" icon?
                    'type' => 'fontawesome',
                    'iconsPerPage' => 200, // default 100, how many icons per/page to display
                ),
                'description' => esc_html__( 'Select icon from library.', 'wp-abtheme' ),
                "group" => esc_html__("Item 3", 'wp-abtheme')
            ),
            array(
                "type" => "attach_image",
                "heading" => esc_html__( 'Icon Image', "wp-abtheme" ),
                "param_name" => "process_icon_image3",
                "value" => '',
                "group" => esc_html__("Item 3", "wp-abtheme")
            ),
            
        /* End Icon */
    )
));

class WPBakeryShortCode_cms_process extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>