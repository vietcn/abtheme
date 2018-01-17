<?php
function abtheme_get_term_list()
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

function abtheme_get_term_of_post_to_class($post_id,$tax = array())
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

function abtheme_get_type_posts_data($post_type = 'post')
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

$term_list = abtheme_get_term_list();
vc_map(
    array(
        "name"     => __("CMS Grid Portfolio", CMS_NAME),
        "base"     => "cms_grid_portfolio",
        "class"    => "vc-cms-grid-portfolio",
        "category" => __("CmsSuperheroes Shortcodes", CMS_NAME),
        "params"   => array(
            array(
                "type"       => "autocomplete",
                "heading"    => __("Source", CMS_NAME),
                "param_name" => "source",
                'settings'   => array(
                    'multiple' => true,
                    'values'   => $term_list['auto_complete']
                ),
                "group"      => __("Source Settings", CMS_NAME),
            ),
            array(
                "type"       => "dropdown",
                "heading"    => __("Order by", CMS_NAME),
                "param_name" => "orderby",
                "value"      => array(
                    'Date'   => 'date',
                    'ID'     => 'ID',
                    'Author' => 'author',
                    'Title'  => 'title',
                    'Random' => 'rand',
                ),
                "std"        => 'date',
                "group"      => __("Source Settings", CMS_NAME)
            ),
            array(
                "type"       => "dropdown",
                "heading"    => __("Order", CMS_NAME),
                "param_name" => "order",
                "value"      => array(
                    'Ascending'  => 'ASC',
                    'Descending' => 'DESC',
                ),
                "std"        => 'DESC',
                "group"      => __("Source Settings", CMS_NAME)
            ),
            array(
                "type"       => "textfield",
                "heading"    => __("Limit", CMS_NAME),
                "param_name" => "limit",
                "value"      => "6",
                "group"      => __("Source Settings", CMS_NAME)
            ),
            array(
                'type'       => 'autocomplete',
                'class'      => '',
                'heading'    => esc_html__('Post Name', 'alispx'),
                'param_name' => 'post_ids',
                'settings'   => array(
                    'multiple' => true,
                    'values'   => abtheme_get_type_posts_data('portfolio')
                ),
                "group"      => __("Source Settings", CMS_NAME),
            ),
            array(
                "type"       => "dropdown",
                "heading"    => __("Layout Type", CMS_NAME),
                "param_name" => "layout",
                "value"      => array(
                    "Basic"   => "basic",
                    "Masonry" => "masonry",
                ),
                "group"      => __("Grid Settings", CMS_NAME)
            ),
            array(
                "type"             => "dropdown",
                "heading"          => __("Columns XS Devices", CMS_NAME),
                "param_name"       => "col_xs",
                "edit_field_class" => "vc_col-sm-3 vc_column",
                "value"            => array(1, 2, 3, 4, 6, 12),
                "std"              => 1,
                "group"            => __("Grid Settings", CMS_NAME)
            ),
            array(
                "type"             => "dropdown",
                "heading"          => __("Columns SM Devices", CMS_NAME),
                "param_name"       => "col_sm",
                "edit_field_class" => "vc_col-sm-3 vc_column",
                "value"            => array(1, 2, 3, 4, 6, 12),
                "std"              => 2,
                "group"            => __("Grid Settings", CMS_NAME)
            ),
            array(
                "type"             => "dropdown",
                "heading"          => __("Columns MD Devices", CMS_NAME),
                "param_name"       => "col_md",
                "edit_field_class" => "vc_col-sm-3 vc_column",
                "value"            => array(1, 2, 3, 4, 6, 12),
                "std"              => 3,
                "group"            => __("Grid Settings", CMS_NAME)
            ),
            array(
                "type"             => "dropdown",
                "heading"          => __("Columns LG Devices", CMS_NAME),
                "param_name"       => "col_lg",
                "edit_field_class" => "vc_col-sm-3 vc_column",
                "value"            => array(1, 2, 3, 4, 6, 12),
                "std"              => 4,
                "group"            => __("Grid Settings", CMS_NAME)
            ),
            array(
                "type"       => "dropdown",
                "heading"    => __("Filter on Masonry", CMS_NAME),
                "param_name" => "filter",
                "value"      => array(
                    "Enable"  => "true",
                    "Disable" => "false"
                ),
                "dependency" => array(
                    "element" => "layout",
                    "value"   => "masonry"
                ),
                "group"      => __("Grid Settings", CMS_NAME)
            ),
            array(
                "type"        => "textfield",
                "heading"     => __("Extra Class", CMS_NAME),
                "param_name"  => "class",
                "value"       => "",
                "description" => __("", CMS_NAME),
                "group"       => __("Template", CMS_NAME)
            ),
            array(
                "type"        => "cms_template",
                "param_name"  => "cms_template",
                "shortcode"   => "cms_grid",
                "admin_label" => true,
                "heading"     => __("Shortcode Template", CMS_NAME),
                "group"       => __("Template", CMS_NAME),
            )
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