<?php
	$params = array(
		array(
			'type' => 'cms_template_img',
		    'param_name' => 'cms_template',
		    "shortcode" => "cms_counter_single",
		    "heading" => esc_html__("Shortcode Template",'wp-abtheme'),
		    "admin_label" => true,
		    "group" => esc_html__("Template", 'wp-abtheme'),
		),
		array(
			"type" => "colorpicker",
			"heading" => esc_html__("Title Color",'wp-abtheme'),
			"param_name" => "title_color",
			"value" => "",
			"group" => esc_html__("Template", 'wp-abtheme')
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Title Font Size",'wp-abtheme'),
			"param_name" => "title_fontsize",
			"value" => "",
			"group" => esc_html__("Template", 'wp-abtheme'),
			"description" => esc_html__("Enter: ...px", 'wp-abtheme'),
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Title Margin",'wp-abtheme'),
			"param_name" => "title_margin",
			"value" => "",
			"group" => esc_html__("Template", 'wp-abtheme'),
			"description" => esc_html__("Enter: ...px", 'wp-abtheme'),
		),
		array(
			"type" => "colorpicker",
			"heading" => esc_html__("Digit Color",'wp-abtheme'),
			"param_name" => "digit_color",
			"value" => "",
			"group" => esc_html__("Template", 'wp-abtheme')
		),	
		array(
			"type" => "textfield",
			"heading" => esc_html__("Digit Font Size",'wp-abtheme'),
			"param_name" => "digit_fontsize",
			"value" => "",
			"group" => esc_html__("Template", 'wp-abtheme'),
			"description" => esc_html__("Enter: ...px", 'wp-abtheme'),
		),
		array(
			"type" => "colorpicker",
			"heading" => esc_html__("Icon Color",'wp-abtheme'),
			"param_name" => "icon_color",
			"value" => "",
			"group" => esc_html__("Template", 'wp-abtheme')
		),
		array(
            "type" => "attach_image",
            "heading" => esc_html__("Icon Image",'wp-abtheme'),
            "param_name" => "image_icon",
            "group" => esc_html__("Template", 'wp-abtheme'),
        ),
	);
	vc_remove_param( "cms_counter_single", "title" );
	vc_remove_param( "cms_counter_single", "description" );
	vc_remove_param( "cms_counter_single", "content_align" );
	vc_remove_param( "cms_counter_single", "suffix" );
	vc_remove_param( "cms_counter_single", "prefix" );
?>