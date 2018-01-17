<?php

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
    'el_class'        => '',
), $atts);
extract(array_merge($atts_extra, $atts));
if (!empty($post_ids)) {
    $posts = get_posts(
        array(
            'post_type' => 'portfolio',
            'include'   => array_map('intval', explode(',', $post_ids))
        )
    );
} else {
    $args_lol = array(
        'post_type'       => 'portfolio',
        'posts_per_page ' => !empty($limit) ? intval($limit) : 6,
        'order'           => !empty($order) ? $order : 'DESC',
        'orderby'         => !empty($orderby) ? $orderby : 'date',
        'tax_query'       => array(
            'relation' => 'OR',
        )
    );
    //default categories selected
    $source = !empty($source) ? $source : '';
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
    $cms_query->set('posts_per_page', !empty($limit) ? intval($limit) : 6);
    $query = $cms_query->query($cms_query->query_vars);
    $posts = $query;
}

$col_lg = 12 / $col_lg;
$col_md = 12 / $col_md;
$col_sm = 12 / $col_sm;
$col_xs = 12 / $col_xs;
$item_class = "cms-grid-item col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-xs-{$col_xs}";
?>

<div class="cms-grid-portfolio cms-grid-portfolio-layout1 <?php echo esc_attr($el_class); ?>">
    <?php
    if (is_array($posts)):
        foreach ($posts as $post) {
            ?>
            <div class="<?php echo esc_attr($item_class); ?>">
                <?php
                if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                    $class = ' has-thumbnail';
                    $thumbnail = get_the_post_thumbnail($post->ID, 'larger');
                else:
                    $class = ' no-image';
                    $thumbnail = '<img src="' . esc_url(CMS_IMAGES) . 'no-image.jpg" alt="' . get_the_title($post->ID) . '" />';
                endif;
                echo '<div class="cms-grid-media ' . esc_attr($class) . '">' . wp_kses_post($thumbnail) . '</div>';
                ?>
                <div class="cms-grid-title">
                    <h3><?php echo get_the_title($post->ID); ?></h3>
                </div>
            </div>
            <?php
        }
    endif;
    ?>
</div>

