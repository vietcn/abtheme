<?php
	$params = array(
		array(
			'type' => 'cms_template_img',
		    'param_name' => 'cms_template',
		    "shortcode" => "cms_counter_single",
		    "heading" => esc_html__("Shortcode Template",'abtheme'),
		    "admin_label" => true,
		    "group" => esc_html__("Template", 'abtheme'),
		),
		array(
			"type" => "colorpicker",
			"heading" => esc_html__("Title Color",'abtheme'),
			"param_name" => "title_color",
			"value" => "",
			"group" => esc_html__("Template", 'abtheme')
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Title Font Size",'abtheme'),
			"param_name" => "title_fontsize",
			"value" => "",
			"group" => esc_html__("Template", 'abtheme'),
			"description" => esc_html__("Enter: ...px", 'abtheme'),
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Title Margin",'abtheme'),
			"param_name" => "title_margin",
			"value" => "",
			"group" => esc_html__("Template", 'abtheme'),
			"description" => esc_html__("Enter: ...px", 'abtheme'),
		),
		array(
			"type" => "colorpicker",
			"heading" => esc_html__("Digit Color",'abtheme'),
			"param_name" => "digit_color",
			"value" => "",
			"group" => esc_html__("Template", 'abtheme')
		),	
		array(
			"type" => "textfield",
			"heading" => esc_html__("Digit Font Size",'abtheme'),
			"param_name" => "digit_fontsize",
			"value" => "",
			"group" => esc_html__("Template", 'abtheme'),
			"description" => esc_html__("Enter: ...px", 'abtheme'),
		),
		array(
			"type" => "colorpicker",
			"heading" => esc_html__("Icon Color",'abtheme'),
			"param_name" => "icon_color",
			"value" => "",
			"group" => esc_html__("Template", 'abtheme')
		),
		array(
            "type" => "attach_image",
            "heading" => esc_html__("Icon Image",'abtheme'),
            "param_name" => "image_icon",
            "group" => esc_html__("Template", 'abtheme'),
        ),
	);
	vc_remove_param( "cms_counter_single", "title" );
	vc_remove_param( "cms_counter_single", "description" );
	vc_remove_param( "cms_counter_single", "content_align" );
	vc_remove_param( "cms_counter_single", "suffix" );
	vc_remove_param( "cms_counter_single", "prefix" );
?>