<?php
$taxonomy_objects = get_object_taxonomies('portfolio', 'names');
$term_list = array();
foreach ($taxonomy_objects as $tax) {
    $terms = get_terms(
        array(
            'taxonomy'   => $tax,
            'hide_empty' => false,
        )
    );
    foreach ($terms as $term) {
        $term_list[] = array(
            'value' => $term->term_id . '|' . $tax,
            'label' => $term->name,
        );
    }
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
                    'values'   => $term_list
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
        $atts_extra = shortcode_atts(array(
            'source'       => '',
            'orderby'      => 'date',
            'order'        => 'DESC',
            'limit'        => '6',
            'post_ids'     => '',
            'col_lg'       => 4,
            'col_md'       => 3,
            'col_sm'       => 2,
            'col_xs'       => 1,
            'layout'       => 'basic',
            'filter'       => 'true',
            'not__in'      => 'false',
            'cms_template' => 'cms_grid_portfolio.php',
            'class'        => '',
        ), $atts);
        $atts = array_merge($atts_extra, $atts);

        $html_id = cmsHtmlID('cms-grid-portfolio');
        $args_lol = array(
            'post_type'       => 'portfolio',
            'posts_per_page ' => !empty($atts['limit']) ? intval($atts['limit']) : 6,
            'order'           => !empty($atts['order']) ? $atts['order'] : 'DESC',
            'orderby'         => !empty($atts['orderby']) ? $atts['orderby'] : 'date',
            'tax_query'       => array(
                'relation' => 'OR',
            )
        );
        //default categories selected
        $source = !empty($atts['source']) ? $atts['source'] : '';
        // if select term on custom post type, move term item to cat.
        if (!empty($source)) {
            $source_a = explode(',', $source);
            foreach ($source_a as $terms) {
                $tmp = explode('|', $terms);
                if (isset($tmp[0]) && isset($tmp[1])) {
                    $args_lol['tax_query'][] = array(
                        'taxonomy' => $tmp[1],
                        'field'    => 'term_id',
                        'operator' => 'IN',
                        'terms'    => array($tmp[0]),
                    );
                }
            }
        }
        $cms_query = new WP_Query($args_lol);
        $cms_query->set('posts_per_page', !empty($atts['limit']) ? intval($atts['limit']) : 6);
        $query = $cms_query->query($cms_query->query_vars);
        $atts['posts'] = $query;


        $col_lg = 12 / $atts['col_lg'];
        $col_md = 12 / $atts['col_md'];
        $col_sm = 12 / $atts['col_sm'];
        $col_xs = 12 / $atts['col_xs'];
        $atts['item_class'] = "cms-grid-item col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-xs-{$col_xs}";
        $atts['grid_class'] = "cms-grid";
        $class = $atts['class'];
        $atts['template'] = 'template-' . str_replace('.php', '', $atts['cms_template']) . ' ' . $class;
        if ($atts['layout'] == 'masonry') {
            wp_enqueue_script('cms-jquery-shuffle');
            $atts['grid_class'] .= " cms-grid-{$atts['layout']}";
        }
        $atts['html_id'] = $html_id;
        return parent::content($atts, $content);
    }
}

?>