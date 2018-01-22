<?php
function abtheme_get_carousel_portfolio_term_list()
{
    $taxonomy_objects = get_object_taxonomies('portfolio', 'names');
    $term_list = array();
    $terms_of_posttype = array();
    foreach ($taxonomy_objects as $tax) {
        $terms = get_terms(
            array(
                'taxonomy'   => $tax,
                'hide_empty' => false,
            )
        );
        foreach ($terms as $term) {
            $term_list['terms'][] = $term->term_id . '|' . $tax;
            $term_list['auto_complete'][] = array(
                'value' => $term->term_id . '|' . $tax,
                'label' => $term->name,
            );
        }
    }
    return $term_list;
}
function abtheme_get_carousel_portfolio_term_of_post_to_class($post_id,$tax = array())
{
    $term_list = array();
    foreach ($tax as $taxo){
        $term_of_post = wp_get_post_terms($post_id, $taxo);
        foreach ($term_of_post as $term) {
            $term_list[] = $term->slug;
        }
    }
    return implode(',', $term_list);
}
function abtheme_get_carousel_portfolio_type_posts_data($post_type = 'post')
{
    $posts = get_posts(array(
        'posts_per_page' => -1,
        'post_type'      => $post_type,
    ));
    $result = array();
    foreach ($posts as $post) {
        $result[] = array(
            'value' => $post->ID,
            'label' => $post->post_title,
        );
    }
    return $result;
}
$term_list = abtheme_get_carousel_portfolio_term_list();

vc_map(
    array(
        "name"     => __("CMS Carousel Portfolio", "abtheme"),
        "base"     => "cms_carousel_portfolio",
        "class"    => "vc-cms-carousel-portfolio",
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
                    'values'   => abtheme_get_carousel_portfolio_type_posts_data('portfolio')
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
                "heading" => __("Show Dots","abtheme"),
                "param_name" => "dots",
                "value" => array(
                    "True" => "true",
                    "False" => "false"
                ),
                "std" => false,
                "group" => __("Carousel Settings", "abtheme")
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Auto Play","abtheme"),
                "param_name" => "autoplay",
                "value" => array(
                    "True" => "true",
                    "False" => "false"
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