<?php
extract(shortcode_atts(array(
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
    'nav' => 'false',
    'dots' => 'false',
    'autoplay' => 'false',
    'filter'       => 'false',
    'not__in'      => 'false',
    'el_class'        => '',
), $atts));
extract(cms_get_posts_of_grid('post', $atts));
?>

<div class="carousel-post carousel-post-layout1 <?php echo esc_attr($el_class); ?>">
    <div class="cms-carousel owl-carousel owl-theme cms-carousel-post-layout1" data-margin="<?php echo esc_attr($margin); ?>" data-loop="<?php echo esc_attr($loop); ?>" data-nav="<?php echo esc_attr($nav); ?>" data-dots="<?php echo esc_attr($dots); ?>" data-autoplay="<?php echo esc_attr($autoplay); ?>" data-large-items="<?php echo esc_attr($large_items); ?>" data-medium-items="<?php echo esc_attr($medium_items); ?>" data-small-items="<?php echo esc_attr($small_items); ?>" data-xsmall-items="<?php echo esc_attr($xsmall_items); ?>">
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
                    echo '<div class="carousel-post-media ' . esc_attr($class) . '">' . wp_kses_post($thumbnail) . '</div>';
                    ?>
                    <div class="carousel-post-title">
                        <h3>
                            <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                <?php echo esc_attr(get_the_title($post->ID)); ?>
                            </a>
                        </h3>
                    </div>
                    <div class="carousel-post-desc">
                        <?php echo wp_trim_words( $post->post_content, $num_words = 15, $more = null ); ?>
                    </div>
                </div>
                <?php
            }
        endif;
        ?>
    </div>
</div>