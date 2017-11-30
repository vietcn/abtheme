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
?>