<?php
vc_map(
	array(
		"name" => __("CMS Progress Bar", "abtheme"),
	    "base" => "cms_progressbar",
	    "class" => "vc-cms-progressbar",
	    "category" => __("CmsSuperheroes Shortcodes", "abtheme"),
	    "params" => array(
            array(
                'type' => 'cms_template_img',
                'param_name' => 'cms_template',
                "shortcode" => "cms_progressbar",
                "heading" => esc_html__("Shortcode Template","abtheme"),
                "admin_label" => true,
                "group" => esc_html__("Template", "abtheme"),
            ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Mode","abtheme"),
	            "param_name" => "mode",
	            "value" => array(
	            	"Horizontal" => "horizontal",
	            	"Vertical" => "vertical"
	            	),
	            "group" => __("Progress Bar Settings", "abtheme")
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Item Title","abtheme"),
	            "param_name" => "item_title",
	            "value" => "",
	            'holder' => 'div',
	            "description" => __("","abtheme"),
	            "group" => __("Progress Bar Settings", "abtheme")
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
			"heading" => __ ( 'Show Value', "abtheme" ),
			"param_name" => "show_value",
			"value" => array(
					"Yes" => "true",
					"No" => "false"
			),
			"description" => '',
			"group" => __("Progress Bar Settings", "abtheme")
			),
			array(
				"type" => "textfield",
				"class" => "",
				"value" => "60",
				"heading" => __ ( "Value", "abtheme" ),
				"param_name" => "value",
				"description" => "Number only, ex: 60",
				"group" => __("Progress Bar Settings", "abtheme")
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __ ( "Value Suffix", "abtheme" ),
				"group" => __("Progress Bar Settings", "abtheme"),
				"param_name" => "value_suffix",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"heading" => __ ( 'Background Color Bar', "abtheme" ),
				"param_name" => "bg_color",
				"group" => __("Progress Bar Settings", "abtheme"),
				"value" =>"#e9e9e9",
				"description" => __('Background color for wrapper bar. Default is #e9e9e9',"abtheme")
			),
			array(
				"type" => "colorpicker",
				"heading" => __ ( 'Progress Color', "abtheme" ),
				"param_name" => "color",
				"group" => __("Progress Bar Settings", "abtheme"),
				"description" => __('Background color for progress.',"abtheme")
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __ ( "Width", "abtheme" ),
				"param_name" => "width",
				"value" => "250px",
				"group" => __("Progress Bar Settings", "abtheme"),
				"description" => "in px"
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __ ( "Height", "abtheme" ),
				"param_name" => "height",
				"value" => "50px",
				"group" => __("Progress Bar Settings", "abtheme"),
				"description" => "in px"
			),
			array(
			    "type" => "textfield",
			    "heading" => __ ( 'Border Radius', "abtheme" ),
			    "param_name" => "border_radius",
			    "group" => __("Progress Bar Settings", "abtheme"),
			    "description" => 'px,%,...'
			),
			array(
	            "type" => "dropdown",
	            "heading" => __("Striped","abtheme"),
	            "param_name" => "striped",
	            "value" => array(
	            	"Yes" => "yes",
	            	"No" => "no"
	            	),
	            "group" => __("Progress Bar Settings", "abtheme")
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
class WPBakeryShortCode_cms_progressbar extends CmsShortCode{
	protected function content($atts, $content = null){
		$atts_extra = shortcode_atts(array(
			'mode' => 'horizontal',
			'item_title' => '',
			'icon' => '',
			'show_value' => 'true',
			'value'=> '60',
			'value_suffix'=> '',
			'bg_color'=> '#e9e9e9',
			'color'=> '',
			'width'=> '250px',
			'height'=> '50px',
			'border_radius'=> '',
			'striped'=> 'yes',
			'cms_template' => 'cms_progressbar.php',
			'class' => '',
			    ), $atts);
		$atts['icon_type'] = isset($atts['icon_type'])?$atts['icon_type']:'fontawesome';
		$atts = array_merge($atts_extra,$atts);
		if($atts['icon_type']=='pe7stroke'){
	        wp_enqueue_style('cms-icon-pe7stroke', CMS_CSS. 'Pe-icon-7-stroke.css');
	    }else{
	        vc_icon_element_fonts_enqueue( $atts['icon_type'] );
	    }
		/* CSS */
	    wp_register_style('bootstrap-progressbar', CMS_CSS . "bootstrap-progressbar.min.css","","0.7.0","all");
	    wp_enqueue_style('bootstrap-progressbar');
	    /* JS */
	    wp_register_script('bootstrap-progressbar', CMS_JS . "bootstrap-progressbar.min.js",array('jquery'),"0.7.0",true);
	    wp_register_script('cms-progressbar', CMS_JS . "bootstrap-progressbar.cms.js",array('jquery','bootstrap-progressbar'),"1.0.0",true);
	    wp_enqueue_script('cms-progressbar');
	    wp_enqueue_script('waypoints');
	    /* Layout */
        $html_id = cmsHtmlID('cms-progressbar');
        $atts['template'] = 'template-'.str_replace('.php','',$atts['cms_template']) . ' '. $atts['class'];
        $atts['html_id'] = $html_id;
		return parent::content($atts, $content);
	}
}

?>