<?php
$atts_extra = shortcode_atts(array(
    'source'       => '',
    'orderby'      => 'date',
    'order'        => 'DESC',
    'limit'        => '6',
    'gap'          => '30',
    'post_ids'     => '',
    'col_lg'       => 4,
    'col_md'       => 3,
    'col_sm'       => 2,
    'col_xs'       => 1,
    'layout'       => 'basic',
    'filter'       => 'true',
    'not__in'      => 'false',
    'cms_template' => 'cms_grid_portfolio.php',
    'el_class'     => '',
    'el_class'     => '',
), $atts);
$atts = array_merge($atts_extra, $atts);
extract($atts);
$tax = array();
extract(cms_get_posts_of_grid('portfolio', $atts));
$col_lg = 12 / $col_lg;
$col_md = 12 / $col_md;
$col_sm = 12 / $col_sm;
$col_xs = 12 / $col_xs;
$item_class = "cms-grid-item col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-xs-{$col_xs}";
$categories = is_array($categories) ? $categories : array();
$tax = array();
?>
<?php if ($filter == "true" and $layout == 'masonry'): ?>
    <div class="cms-grid-filter">
    <ul class="cms-filter-category list-unstyled list-inline">
    <li><a class="active" href="#" data-group="all"><?php echo esc_html__("All", "abtheme"); ?></a></li>
    <?php
    if ($layout == 'masonry') {
        wp_enqueue_style('isotope-css');
        wp_enqueue_script('isotope');
        wp_enqueue_script('imagesloaded');
        wp_enqueue_script('abtheme-masonry', get_template_directory_uri() . '/assets/js/masonry.js', array('jquery'), '4.2.1', true);
    }

    $gap = intval($gap / 2);
    wp_register_style('abtheme-grid-css', false, array('abtheme-theme'));
    wp_enqueue_style('abtheme-grid-css');
    $custom_css = "
            .grid-masonry{
                margin: 0 -{$gap}px;
            }
            .grid-item{
                padding: 0 {$gap}px;
            }";
    wp_add_inline_style('abtheme-grid-css', $custom_css);
    ?>

<div class="grid-portfolio grid-portfolio-layout1 <?php echo esc_attr($el_class); ?>">
    <?php if ($filter == "true" and $layout == 'masonry'): ?>
        <div class="grid-filter-wrap grid-masonry-filter">
            <span class="filter-item filter-active" data-filter="*"><?php echo esc_html__("All", "abtheme"); ?></span>
            <?php foreach ($categories as $category): ?>
                <?php $category_arr = explode('|', $category); ?>
                <?php $tax[] = $category_arr[1]; ?>
                <?php $term = get_term($category_arr[0], $category_arr[1]); ?>
                <li>
                    <a href="#" data-group="<?php echo esc_attr('category-' . $term->slug); ?>">
                        <?php echo esc_html($term->name); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        </div>
    <?php endif; ?>
    <div class="cms-grid-portfolio cms-grid-portfolio-layout1 <?php echo esc_attr($el_class); ?>">
        <?php
        if (is_array($posts)):
            foreach ($posts as $post) {
                $filter_class = cms_get_term_of_post_to_class($post->ID, array_unique($tax));
                ?>
                <div class="<?php echo esc_attr($item_class); ?>" data-group="<?php echo esc_attr($filter_class) ?>">
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

    <span class="filter-item" data-filter="<?php echo esc_attr('.' . $term->slug); ?>">
                    <?php echo esc_html($term->name); ?>
                </span>

    </div>
<?php endif; ?>

<div class="cms-grid grid-masonry">
    <?php
    if (is_array($posts)):
        foreach ($posts as $post) {
            $filter_class = cms_get_term_of_post_to_class($post->ID, array_unique($tax));
            ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>"
                 data-category="<?php echo esc_attr($filter_class) ?>">
                <?php
                if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                    $class = ' has-thumbnail';
                    $thumbnail = get_the_post_thumbnail($post->ID, 'larger');
                else:
                    $class = ' no-image';
                    $thumbnail = '<img src="' . get_template_directory_uri() . '/assets/images/no-image.jpg" alt="' . get_the_title($post->ID) . '" />';
                endif;
                echo '<div class="grid-portfolio-media ' . esc_attr($class) . '">' . wp_kses_post($thumbnail) . '</div>';
                ?>
                <div class="grid-portfolio-title">
                    <h3>
                        <a href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                            <?php echo esc_attr(get_the_title($post->ID)); ?>
                        </a>
                    </h3>
                </div>
                <div class="grid-portfolio-desc">
                    <?php echo wp_trim_words($post->post_content, $num_words = 55, $more = null); ?>
                </div>
            </div>
            <?php
        }
    endif;
    ?>
</div>
</div>
