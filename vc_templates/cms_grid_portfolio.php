<?php

//echo '<pre>';
//var_dump($atts['posts']);
//echo '</pre>';
?>

<div class="row cms-grid">
    <?php
    $posts = $atts['posts'];
    $size = ($atts['layout'] == 'basic') ? 'thumbnail' : 'medium';

    if (is_array($posts)):
        foreach ($posts as $post) {
            ?>
            <div class="cms-grid-item">
                <?php
                if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size, false)):
                    $class = ' has-thumbnail';
                    $thumbnail = get_the_post_thumbnail($post->ID, $size);
                else:
                    $class = ' no-image';
                    $thumbnail = '<img src="' . esc_url(CMS_IMAGES) . 'no-image.jpg" alt="' . get_the_title($post->ID) . '" />';
                endif;
                echo '<div class="cms-grid-media ' . esc_attr($class) . '">' . wp_kses($thumbnail, wp_kses_allowed_html()) . '</div>';
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
