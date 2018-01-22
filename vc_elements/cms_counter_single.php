<?php
vc_map(
	array(
		"name" => __("CMS Counter Single", "abtheme"),
	    "base" => "cms_counter_single",
	    "class" => "vc-cms-counter-single",
	    "category" => __("CmsSuperheroes Shortcodes", "abtheme"),
	    "params" => array(
            array(
                'type' => 'cms_template_img',
                'param_name' => 'cms_template',
                "shortcode" => "cms_counter_single",
                "heading" => esc_html__("Shortcode Template",'abtheme'),
                "admin_label" => true,
                "group" => esc_html__("Template", 'abtheme'),
            ),
	    	array(
	            "type" => "textfield",
	            "heading" => __("Title","abtheme"),
	            "param_name" => "title",
	            "value" => "",
                "admin_label" => true,
	            "description" => __("Title Of Item","abtheme"),
                "group" => __("Title", "abtheme"),
	        ),
            array(
                "type" => "colorpicker",
                "heading" => esc_html__("Title Color",'abtheme'),
                "param_name" => "title_color",
                "value" => "",
                "group" => esc_html__("Title", 'abtheme')
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__("Title Font Size",'abtheme'),
                "param_name" => "title_fontsize",
                "value" => "",
                "group" => esc_html__("Title", 'abtheme'),
                "description" => esc_html__("Enter number only", 'abtheme'),
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__("Title Margin",'abtheme'),
                "param_name" => "title_margin",
                "value" => "",
                "group" => esc_html__("Title", 'abtheme'),
                "description" => esc_html__("Enter number only, margin bottom", 'abtheme'),
            ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Counter Type","abtheme"),
	            "param_name" => "type",
	            "value" => array(
	            	"Zero",
	            	"Random"
	            	),
	            "group" => __("Counters", "abtheme")
	        ),
            array(
                "type" => "textfield",
                "heading" => __("Digit","abtheme"),
                "param_name" => "digit",
                "value" => "668",
                "description" => __("Enter number only","abtheme"),
                "group" => __("Counters", "abtheme")
            ),
            array(
                "type" => "colorpicker",
                "heading" => esc_html__("Digit Color",'abtheme'),
                "param_name" => "digit_color",
                "value" => "",
                "group" => __("Counters", "abtheme")
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__("Digit Font Size",'abtheme'),
                "param_name" => "digit_fontsize",
                "value" => "",
                "group" => __("Counters", "abtheme"),
                "description" => esc_html__("Enter number only", 'abtheme'),
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
                "type" => "colorpicker",
                "heading" => esc_html__("Icon Color",'abtheme'),
                "param_name" => "icon_color",
                "value" => "",
                "group" => __("Icon", "abtheme")
            ),
            array(
                "type" => "attach_image",
                "heading" => __("Image","abtheme"),
                "param_name" => "image",
                'group' => esc_html__('Icon', 'abtheme'),
                "description" => __("If you select image, icon will replace by image","abtheme"),
            ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Suffix","abtheme"),
	            "param_name" => "suffix",
	            "value" => "",
	            "description" => __("","abtheme"),
	            "group" => __("Counters", "abtheme")
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Prefix","abtheme"),
	            "param_name" => "prefix",
	            "value" => "",
	            "description" => __("","abtheme"),
	            "group" => __("Counters", "abtheme")
	        ),
	        /* End Counters */
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
class WPBakeryShortCode_cms_counter_single extends CmsShortCode{
	protected function content($atts, $content = null){
		return parent::content($atts, $content);
	}
}

?>