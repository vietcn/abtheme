<?php
	$params = array(
        array(
            "type" => "textfield",
            "heading" => esc_html__("Carousel Title",'abtheme'),
            "param_name" => "carousel_title",
            "value" => "",
            "group" => esc_html__("Template", 'abtheme'),
            "dependency" => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_carousel--layout-blog1.php",
                )
            ),
        ),
	);

	vc_remove_param('cms_carousel','cms_template');
	$cms_template_attribute = array(
		'type' => 'cms_template_img',
	    'param_name' => 'cms_template',
	    "shortcode" => "cms_carousel",
	    "heading" => esc_html__("Shortcode Template",'abtheme'),
	    "admin_label" => true,
	    "group" => esc_html__("Template", 'abtheme'),
		);
	vc_add_param('cms_carousel',$cms_template_attribute);
?>