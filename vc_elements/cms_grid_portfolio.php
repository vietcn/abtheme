<?php
$term_list = cms_get_grid_term_list('portfolio');
vc_map(
    array(
        "name"     => esc_html__("CMS Grid Portfolio", "abtheme"),
        "base"     => "cms_grid_portfolio",
        "class"    => "vc-cms-grid-portfolio",
        "category" => esc_html__("CmsSuperheroes Shortcodes", "abtheme"),
        "params"   => array(
            array(
                'type' => 'cms_template_img',
                'param_name' => 'cms_template',
                "shortcode" => "cms_grid_portfolio",
                "heading" => esc_html__("Shortcode Template", "abtheme"),
                "admin_label" => true,
                "group" => esc_html__("Template", "abtheme"),
            ),
            array(
                "type"       => "checkbox",
                "heading"    => esc_html__("Custom Source", "abtheme"),
                "param_name" => "custom_source",
                "value"      => "1",
                "description"        => 'Check here if you want custom source',
                "group"      => esc_html__("Source Settings", "abtheme")
            ),
            array(
                "type"       => "autocomplete",
                "heading"    => esc_html__("Select Categories", "abtheme"),
                "param_name" => "source",
                "description" => esc_html__("Leave blank to select all category", "abtheme"),
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
                "group"      => esc_html__("Source Settings", "abtheme"),
            ),
            array(
                'type'       => 'autocomplete',
                'class'      => '',
                'heading'    => esc_html__('Select Post Name', 'alispx'),
                'param_name' => 'post_ids',
                "description" => esc_html__("Leave blank to show all post", "abtheme"),
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
                "group"      => esc_html__("Source Settings", "abtheme"),
            ),
            array(
                "type"       => "dropdown",
                "heading"    => esc_html__("Order by", "abtheme"),
                "param_name" => "orderby",
                "value"      => array(
                    'Date'   => 'date',
                    'ID'     => 'ID',
                    'Author' => 'author',
                    'Title'  => 'title',
                    'Random' => 'rand',
                ),
                "std"        => 'date',
                "group"      => esc_html__("Source Settings", "abtheme")
            ),
            array(
                "type"       => "dropdown",
                "heading"    => esc_html__("Sort order", "abtheme"),
                "param_name" => "order",
                "value"      => array(
                    'Ascending'  => 'ASC',
                    'Descending' => 'DESC',
                ),
                "std"        => 'DESC',
                "group"      => esc_html__("Source Settings", "abtheme")
            ),
            array(
                "type"       => "textfield",
                "heading"    => esc_html__("Total items", "abtheme"),
                "param_name" => "limit",
                "value"      => "6",
                "group"      => esc_html__("Source Settings", "abtheme"),
                "description" => esc_html__("Set max limit for items in grid. Enter number only", "abtheme"),
            ),
            array(
                "type"       => "dropdown",
                "heading"    => esc_html__("Layout Type", "abtheme"),
                "param_name" => "layout",
                "value"      => array(
                    "Basic"   => "basic",
                    "Masonry" => "masonry",
                ),
                "group"      => esc_html__("Grid Settings", "abtheme")
            ),
            array(
                "type"       => "dropdown",
                "heading"    => esc_html__("Filter on Masonry", "abtheme"),
                "param_name" => "filter",
                "value"      => array(
                    "Enable"  => "true",
                    "Disable" => "false"
                ),
                "dependency" => array(
                    "element" => "layout",
                    "value"   => "masonry"
                ),
                "group"      => esc_html__("Grid Settings", "abtheme")
            ),
            array(
                "type"       => "dropdown",
                "heading"    => esc_html__("Load More on Masonry", "abtheme"),
                "param_name" => "loadmore",
                "value"      => array(
                    "Enable"  => "true",
                    "Disable" => "false"
                ),
                "dependency" => array(
                    "element" => "layout",
                    "value"   => "masonry"
                ),
                "group"      => esc_html__("Grid Settings", "abtheme")
            ),
            array(
                "type"       => "textfield",
                "heading"    => esc_html__("Default title", "abtheme"),
                "param_name" => "filter_default_title",
                "value"      => "All",
                "group"      => esc_html__("Filter", "abtheme"),
                "description" => esc_html__('Enter default title for filter option display (empty: "All")', 'summercamp'),
                "dependency" => array(
                    "element" => "filter",
                    "value"   => "true"
                ),
            ),
            array(
                "type"       => "dropdown",
                "heading"    => esc_html__("Alignment", "abtheme"),
                "param_name" => "filter_alignment",
                "value"      => array(
                    "Center"   => "center",
                    "Left"   => "left",
                    "Right"   => "right",
                ),
                "description" => esc_html__('Select filter alignment.', 'summercamp'),
                "group"      => esc_html__("Filter", "abtheme"),
                "dependency" => array(
                    "element" => "filter",
                    "value"   => "true"
                ),
            ),

            array(
                "type"       => "textfield",
                "heading"    => esc_html__("Item Gap", "abtheme"),
                "param_name" => "gap",
                "value"      => "30",
                "group"      => esc_html__("Grid Settings", "abtheme"),
                "description" => esc_html__("Select gap between grid elements. Enter number only", "abtheme"),
            ),
            array(
                "type"             => "dropdown",
                "heading"          => esc_html__("Columns XS Devices", "abtheme"),
                "param_name"       => "col_xs",
                "edit_field_class" => "vc_col-sm-3 vc_column",
                "value"            => array(1, 2, 3, 4, 6, 12),
                "std"              => 1,
                "group"            => esc_html__("Grid Settings", "abtheme")
            ),
            array(
                "type"             => "dropdown",
                "heading"          => esc_html__("Columns SM Devices", "abtheme"),
                "param_name"       => "col_sm",
                "edit_field_class" => "vc_col-sm-3 vc_column",
                "value"            => array(1, 2, 3, 4, 6, 12),
                "std"              => 2,
                "group"            => esc_html__("Grid Settings", "abtheme")
            ),
            array(
                "type"             => "dropdown",
                "heading"          => esc_html__("Columns MD Devices", "abtheme"),
                "param_name"       => "col_md",
                "edit_field_class" => "vc_col-sm-3 vc_column",
                "value"            => array(1, 2, 3, 4, 6, 12),
                "std"              => 3,
                "group"            => esc_html__("Grid Settings", "abtheme")
            ),
            array(
                "type"             => "dropdown",
                "heading"          => esc_html__("Columns LG Devices", "abtheme"),
                "param_name"       => "col_lg",
                "edit_field_class" => "vc_col-sm-3 vc_column",
                "value"            => array(1, 2, 3, 4, 6, 12),
                "std"              => 4,
                "group"            => esc_html__("Grid Settings", "abtheme")
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Extra class name", "abtheme" ),
                "param_name" => "el_class",
                "description" => esc_html__( "Style particular content element differently - add a class name and refer to it in Custom CSS.", "abtheme" ),
                "group"            => esc_html__("Grid Settings", "abtheme")
            ),
        )
    )
);

class WPBakeryShortCode_cms_grid_portfolio extends CmsShortCode
{
    protected function content($atts, $content = null)
    {
        $html_id = cmsHtmlID('cms-grid-portfolio');
        $atts['html_id'] = $html_id;
        return parent::content($atts, $content);
    }
}

?>