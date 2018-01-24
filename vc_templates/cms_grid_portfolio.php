<?php
extract(shortcode_atts(array(
    'source'   => '',
    'orderby'  => 'date',
    'order'    => 'DESC',
    'limit'    => '6',
    'gap'      => '30',
    'post_ids' => '',
    'col_lg'               => 4,
    'col_md'               => 3,
    'col_sm'               => 2,
    'col_xs'               => 1,
    'layout'               => 'basic',
    'loadmore'             => 'true',
    'filter'               => 'true',
    'filter_default_title' => 'All',
    'filter_alignment'     => 'center',
    'el_class'             => '',
), $atts));
//$atts = array_merge($atts_extra, $atts);
//extract($atts);
$tax = array();
extract(cms_get_posts_of_grid('portfolio', $atts));
$filter_default_title = !empty($filter_default_title) ? $filter_default_title : 'All';

$col_lg = 12 / $col_lg;
$col_md = 12 / $col_md;
$col_sm = 12 / $col_sm;
$col_xs = 12 / $col_xs;
$item_class = "cms-grid-item col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-xs-{$col_xs}";
$html_id = cmsHtmlID('cms-grid-portfolio');

$gap_item = intval($gap / 2);
$custom_css = "
        .cms-grid-inner {
            margin: 0 -{$gap_item}px;
        }
        .cms-grid-inner .grid-item {
            padding: {$gap_item}px;
        }";
wp_add_inline_style('inline-style', $custom_css);

$grid_class = '';
if ($layout == 'masonry') {
    wp_enqueue_script('isotope');
    wp_enqueue_script('abtheme-isotope', get_template_directory_uri() . '/assets/js/isotope.cms.js', array('jquery'), '1.0.0', true);
    $grid_class = 'cms-grid-inner cms-grid-masonry row';
    if ($loadmore == 'true') {
        $html_id = str_replace('-', '_', $html_id);
        wp_enqueue_script('cms-loadmore-grid', get_template_directory_uri() . '/assets/js/cms-loadmore-grid.js', array('jquery'), 'all', true);
        wp_localize_script('cms-loadmore-grid', 'cms_load_more_' . $html_id, array(
            'startPage' => $paged,
            'maxPages'  => $max,
            'total'     => $total,
            'perpage'   => $limit,
            'nextLink'  => $next_link,
            'layout'    => $layout
        ));
    }
} else {
    $grid_class = 'cms-grid-inner row';
}
?>

<div id="<?php echo esc_attr($html_id) ?>" class="cms-grid cms-grid-portfolio clearfix <?php echo esc_attr($el_class); ?>">

    <?php if ($filter == "true" and $layout == 'masonry'): ?>
        <div class="grid-filter-wrap align-<?php echo esc_attr($filter_alignment); ?>">
            <span class="filter-item active" data-filter="*"><?php echo esc_html($filter_default_title); ?></span>
            <?php foreach ($categories as $category): ?>
                <?php $category_arr = explode('|', $category); ?>
                <?php $tax[] = $category_arr[1]; ?>
                <?php $term = get_term($category_arr[0], $category_arr[1]); ?>

                <span class="filter-item" data-filter="<?php echo esc_attr('.' . $term->slug); ?>">
                    <?php echo esc_html($term->name); ?>
                </span>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <div class="<?php echo esc_attr($grid_class); ?>" data-gutter="<?php echo esc_attr($gap_item); ?>">
        <?php
        $size = 'larger';
        if (is_array($posts)):
            foreach ($posts as $post) {
                $filter_class = cms_get_term_of_post_to_class($post->ID,array_unique($tax));
                ?>
                <div class="<?php echo esc_attr($item_class.' '.$filter_class); ?>" data-category="<?php echo esc_attr($filter_class) ?>">
                    <?php
                    if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size, false)):
                        $class = ' has-thumbnail';
                        $thumbnail = get_the_post_thumbnail($post->ID, $size );
                    else:
                        $class = ' no-image';
                        $thumbnail = '<img src="' . get_template_directory_uri() . '/assets/images/no-image.jpg" alt="' . get_the_title($post->ID) . '" />';
                    endif;
                    ?>
                    <div class="grid-portfolio-media <?php echo esc_attr($class); ?> images-light-box">
                        <?php echo !empty($thumbnail_url[0]) ? '<a href="' . esc_url($thumbnail_url[0]) . '" class="light-box"></a>' : '' ?>
                        <?php echo wp_kses_post($thumbnail); ?>
                    </div>
                    <div class="grid-portfolio-title">
                        <h3>
                            <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                <?php echo esc_attr(get_the_title($post->ID)); ?>
                            </a>
                        </h3>
                    </div>
                    <div class="grid-portfolio-desc">
                        <?php echo wp_trim_words( $post->post_content, $num_words = 55, $more = null ); ?>
                    </div>
                </div>
                <?php
            }
        endif;
        ?>
    </div>


    <?php
    if (!empty($next_link) && $layout == 'masonry' && $loadmore == 'true') {
        ?>
        <div class="cms-load-more text-center">
            <span class="btn">
                <i class="fa fa-plus"></i>
                <?php echo esc_html__('Load more', 'abtheme') ?>
            </span>
        </div>
        <?php
    }
    ?>

</div>