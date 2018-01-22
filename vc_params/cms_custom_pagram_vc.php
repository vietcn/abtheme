<?php
/*
 * VC
 */
vc_add_param("vc_row", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => esc_html__("CMS Custom Style", 'abtheme'),
    "param_name" => "el_class",
    "value" => array(
        'None' => '',
        'Row Box Shadow' => 'row-has-boxshadow row-overlay', 
        'Row Box Shadow Top' => 'row-has-boxshadow-top row-overlay', 
        'Row Box Shadow Bottom' => 'row-has-boxshadow-bottom row-overlay', 
        'Row Overlay' => 'row-overlay', 
        'Row Background Color Primary' => 'bg-primary-color', 
        'Row Background Color Primary Gradient' => 'row-bg-color-gradient', 
        'Extra Custom Class 1' => 'custom-class1', 
        'Extra Custom Class 2' => 'custom-class2',
    ),   
    "description" => 'Select Extra Custom Class (1->2): You user custom class style css: ( custom-class1 to custom-class2 )',
));