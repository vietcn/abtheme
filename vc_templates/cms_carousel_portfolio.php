<?php
$atts_extra = shortcode_atts(array(
    'source'       => '',
    'orderby'      => 'date',
    'order'        => 'DESC',
    'limit'        => '6',
    'post_ids'     => '',
    'xsmall_items' => 1,
    'small_items' => 2,
    'medium_items' => 3,
    'large_items' => 4,
    'margin' => 10,
    'loop' => 'true',
    'nav' => 'true',
    'dots' => 'true',
    'autoplay' => 'true',
    'filter'       => 'true',
    'not__in'      => 'false',
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
if (!empty($source)) {
    $categories = explode(',', $source);
} else {
    $source = abtheme_get_carousel_portfolio_term_list();
    $categories = $source['terms'];
}
$categories = is_array($categories) ? $categories : array();
$tax = array();
?>

<div class="carousel-portfolio carousel-portfolio-layout1 <?php echo esc_attr($el_class); ?>">
    <div class="cms-carousel owl-carousel owl-theme cms-carousel-portfolio-layout1" data-margin="<?php echo esc_attr($margin); ?>" data-loop="<?php echo esc_attr($loop); ?>" data-nav="<?php echo esc_attr($nav); ?>" data-dots="<?php echo esc_attr($dots); ?>" data-autoplay="<?php echo esc_attr($autoplay); ?>" data-large-items="<?php echo esc_attr($large_items); ?>" data-medium-items="<?php echo esc_attr($medium_items); ?>" data-small-items="<?php echo esc_attr($small_items); ?>" data-xsmall-items="<?php echo esc_attr($xsmall_items); ?>">
        <?php
        if (is_array($posts)):
            foreach ($posts as $post) {
                ?>
                <div class="cms-carousel-item">
                    <?php
                    if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                        $class = ' has-thumbnail';
                        $thumbnail = get_the_post_thumbnail($post->ID, 'larger');
                    else:
                        $class = ' no-image';
                        $thumbnail = '<img src="' . get_template_directory_uri() . '/assets/images/no-image.jpg" alt="' . get_the_title($post->ID) . '" />';
                    endif;
                    echo '<div class="carousel-portfolio-media ' . esc_attr($class) . '">' . wp_kses_post($thumbnail) . '</div>';
                    ?>
                    <div class="carousel-portfolio-title">
                        <h3>
                            <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                <?php echo esc_attr(get_the_title($post->ID)); ?>
                            </a>
                        </h3>
                    </div>
                    <div class="carousel-portfolio-desc">
                        <?php echo wp_trim_words( $post->post_content, $num_words = 55, $more = null ); ?>
                    </div>
                </div>
                <?php
            }
        endif;
        ?>
    </div>
</div>