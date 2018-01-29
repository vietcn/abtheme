<?php
$term_list = cms_get_grid_term_list('portfolio');

vc_map(
    array(
        "name"     => __("CMS Carousel Portfolio", "abtheme"),
        "base"     => "cms_carousel_portfolio",
        "icon"    => "icon-wpb-images-carousel",
        "category" => __("CmsSuperheroes Shortcodes", "abtheme"),
        "params"   => array(
            array(
                'type' => 'cms_template_img',
                'param_name' => 'cms_template',
                "shortcode" => "cms_carousel_portfolio",
                "heading" => esc_html__("Shortcode Template","abtheme"),
                "admin_label" => true,
                "group" => esc_html__("Template", "abtheme"),
            ),
            array(
                "type"       => "checkbox",
                "heading"    => __("Custom Source", "abtheme"),
                "param_name" => "custom_source",
                "value"      => "1",
                "description"        => 'Check here if you want custom source',
                "group"      => __("Source Settings", "abtheme")
            ),
            array(
                "type"       => "autocomplete",
                "heading"    => __("Select Categories", "abtheme"),
                "param_name" => "source",
                "description" => __("Leave blank to select all category","abtheme"),
                'settings'   => array(
                    'multiple' => true,
                    'values'   => $term_list['auto_complete'],
                ),
                "dependency" => array(
                    "element"=>"custom_source",
                    "value"=>array(
                        "true",
                    )
                ),
                "group"      => __("Source Settings", "abtheme"),
            ),
            array(
                'type'       => 'autocomplete',
                'class'      => '',
                'heading'    => esc_html__('Select Post Name', 'alispx'),
                'param_name' => 'post_ids',
                "description" => __("Leave blank to show all post","abtheme"),
                'settings'   => array(
                    'multiple' => true,
                    'values'   => cms_get_type_posts_data('portfolio')
                ),
                "dependency" => array(
                    "element"=>"custom_source",
                    "value"=>array(
                        "true",
                    )
                ),
                "group"      => __("Source Settings", "abtheme"),
            ),
            array(
                "type"       => "dropdown",
                "heading"    => __("Order by", "abtheme"),
                "param_name" => "orderby",
                "value"      => array(
                    'Date'   => 'date',
                    'ID'     => 'ID',
                    'Author' => 'author',
                    'Title'  => 'title',
                    'Random' => 'rand',
                ),
                "std"        => 'date',
                "group"      => __("Source Settings", "abtheme")
            ),
            array(
                "type"       => "dropdown",
                "heading"    => __("Order", "abtheme"),
                "param_name" => "order",
                "value"      => array(
                    'Ascending'  => 'ASC',
                    'Descending' => 'DESC',
                ),
                "std"        => 'DESC',
                "group"      => __("Source Settings", "abtheme")
            ),
            array(
                "type"       => "textfield",
                "heading"    => __("Limit", "abtheme"),
                "param_name" => "limit",
                "value"      => "6",
                "group"      => __("Source Settings", "abtheme"),
                "description" => __("Enter number only","abtheme"),
            ),
            array(
                "type" => "dropdown",
                "heading" => __("XSmall Devices","abtheme"),
                "param_name" => "xsmall_items",
                "edit_field_class" => "vc_col-sm-3 vc_carousel_item",
                "value" => array(1,2,3,4,5,6),
                "std" => 1,
                "group" => __("Carousel Settings", "abtheme")
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Small Devices","abtheme"),
                "param_name" => "small_items",
                "edit_field_class" => "vc_col-sm-3 vc_carousel_item",
                "value" => array(1,2,3,4,5,6),
                "std" => 2,
                "group" => __("Carousel Settings", "abtheme")
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Medium Devices","abtheme"),
                "param_name" => "medium_items",
                "edit_field_class" => "vc_col-sm-3 vc_carousel_item",
                "value" => array(1,2,3,4,5,6),
                "std" => 3,
                "group" => __("Carousel Settings", "abtheme")
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Large Devices","abtheme"),
                "param_name" => "large_items",
                "edit_field_class" => "vc_col-sm-3 vc_carousel_item",
                "value" => array(1,2,3,4,5,6),
                "std" => 4,
                "group" => __("Carousel Settings", "abtheme")
            ),
            array(
                "type" => "textfield",
                "heading" => __("Margin Items","abtheme"),
                "param_name" => "margin",
                "value" => "10",
                "description" => __("","abtheme"),
                "group" => __("Carousel Settings", "abtheme")
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Loop Items","abtheme"),
                "param_name" => "loop",
                "value" => array(
                    "True" => "true",
                    "False" => "false"
                ),
                "group" => __("Carousel Settings", "abtheme")
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Mouse Drag","abtheme"),
                "param_name" => "mousedrag",
                "value" => array(
                    "True" => "true",
                    "False" => "false"
                ),
                "group" => __("Carousel Settings", "abtheme")
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Show Navigation","abtheme"),
                "param_name" => "nav",
                "value" => array(
                    "False" => "false",
                    "True" => "true",
                ),
                "std" => false,
                "group" => __("Carousel Settings", "abtheme")
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Show Dots","abtheme"),
                "param_name" => "dots",
                "value" => array(
                    "False" => "false",
                    "True" => "true",
                ),
                "std" => false,
                "group" => __("Carousel Settings", "abtheme")
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Auto Play","abtheme"),
                "param_name" => "autoplay",
                "value" => array(
                    "False" => "false",
                    "True" => "true",
                ),
                "group" => __("Carousel Settings", "abtheme")
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

class WPBakeryShortCode_cms_carousel_portfolio extends CmsShortCode
{
    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>