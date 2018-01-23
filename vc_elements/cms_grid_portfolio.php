<?php
$term_list = cms_get_grid_term_list('portfolio');
vc_map(
    array(
        "name"     => __("CMS Grid Portfolio", "abtheme"),
        "base"     => "cms_grid_portfolio",
        "class"    => "vc-cms-grid-portfolio",
        "category" => __("CmsSuperheroes Shortcodes", "abtheme"),
        "params"   => array(
            array(
                'type' => 'cms_template_img',
                'param_name' => 'cms_template',
                "shortcode" => "cms_grid_portfolio",
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
                "group"      => __("Source Settings", "abtheme")
            ),
            array(
                'type'       => 'autocomplete',
                'class'      => '',
                'heading'    => esc_html__('Post Name', 'alispx'),
                'param_name' => 'post_ids',
                'settings'   => array(
                    'multiple' => true,
                    'values'   => cms_get_type_posts_data('portfolio')
                ),
                "group"      => __("Source Settings", "abtheme"),
            ),
            array(
                "type"       => "dropdown",
                "heading"    => __("Layout Type", "abtheme"),
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
                "type"       => "dropdown",
                "heading"    => __("Layout Type", "abtheme"),
                "param_name" => "layout",
                "value"      => array(
                    "Basic"   => "basic",
                    "Masonry" => "masonry",
                ),
                "group"      => __("Grid Settings", "abtheme")
            ),
            array(
                "type"             => "dropdown",
                "heading"          => __("Columns XS Devices", "abtheme"),
                "group"      => __("Grid Settings", "abtheme")
            ),
            array(
                "type"       => "dropdown",
                "heading"    => __("Filter on Masonry", "abtheme"),
                "param_name" => "filter",
                "value"      => array(
                    "Enable"  => "true",
                    "Disable" => "false"
                ),
                "dependency" => array(
                    "element" => "layout",
                    "value"   => "masonry"
                ),
                "group"      => __("Grid Settings", "abtheme")
            ),
            array(
                "type"       => "textfield",
                "heading"    => __("Gap", "abtheme"),
                "param_name" => "gap",
                "value"      => "30",
                "group"      => __("Grid Settings", "abtheme"),
                "description" => __("Select gap between grid elements. Enter number only","abtheme"),
            ),
            array(
                "type"             => "dropdown",
                "heading"          => __("Columns XS Devices", "abtheme"),
                "param_name"       => "col_xs",
                "edit_field_class" => "vc_col-sm-3 vc_column",
                "value"            => array(1, 2, 3, 4, 6, 12),
                "std"              => 1,
                "group"            => __("Grid Settings", "abtheme")
            ),
            array(
                "type"             => "dropdown",
                "heading"          => __("Columns SM Devices", "abtheme"),
                "group"            => __("Grid Settings", "abtheme")
            ),
            array(
                "type"             => "dropdown",
                "heading"          => __("Columns SM Devices", "abtheme"),
                "param_name"       => "col_sm",
                "edit_field_class" => "vc_col-sm-3 vc_column",
                "value"            => array(1, 2, 3, 4, 6, 12),
                "std"              => 2,
                "group"            => __("Grid Settings", "abtheme")
            ),
            array(
                "type"             => "dropdown",
                "heading"          => __("Columns MD Devices", "abtheme"),
                "group"            => __("Grid Settings", "abtheme")
            ),
            array(
                "type"             => "dropdown",
                "heading"          => __("Columns MD Devices", "abtheme"),
                "param_name"       => "col_md",
                "edit_field_class" => "vc_col-sm-3 vc_column",
                "value"            => array(1, 2, 3, 4, 6, 12),
                "std"              => 3,
                "group"            => __("Grid Settings", "abtheme")
            ),
            array(
                "type"             => "dropdown",
                "heading"          => __("Columns LG Devices", "abtheme"),
                "group"            => __("Grid Settings", "abtheme")
            ),
            array(
                "type"             => "dropdown",
                "heading"          => __("Columns LG Devices", "abtheme"),
                "param_name"       => "col_lg",
                "edit_field_class" => "vc_col-sm-3 vc_column",
                "value"            => array(1, 2, 3, 4, 6, 12),
                "std"              => 4,
                "group"            => __("Grid Settings", "abtheme")
            ),
            array(
                "type"       => "dropdown",
                "heading"    => __("Filter on Masonry", "abtheme"),
                "param_name" => "filter",
                "value"      => array(
                    "Enable"  => "true",
                    "Disable" => "false"
                ),
                "dependency" => array(
                    "element" => "layout",
                    "value"   => "masonry"
                ),
                "group"      => __("Grid Settings", "abtheme")
            ),
            array(
                "type"        => "textfield",
                "heading"     => __("Extra Class", "abtheme"),
                "param_name"  => "class",
                "value"       => "",
                "description" => __("", "abtheme"),
                "group"       => __("Template", "abtheme")
            ),
            array(
                "type"        => "cms_template",
                "param_name"  => "cms_template",
                "shortcode"   => "cms_grid",
                "admin_label" => true,
                "heading"     => __("Shortcode Template", "abtheme"),
                "group"       => __("Template", "abtheme"),
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

class WPBakeryShortCode_cms_grid_portfolio extends CmsShortCode
{
    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>