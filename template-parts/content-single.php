<?php
/**
 * Template part for displaying posts in loop
 *
 * @package Abtheme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('single-hentry'); ?>>

    <div class="entry-featured">
        <?php if (has_post_format('gallery')) : ?>
            <?php
            $light_box = abtheme_get_post_format_value('post-gallery-lightbox', '0'); //Value is string ("0" or "1")
            $gallery_list = explode(',', abtheme_get_post_format_value('post-gallery-images', '')); //Value is array of id image list
            ?>
            <div class="cms-carousel owl-carousel" data-margin="0" data-loop="false" data-nav="true" data-dots="false" data-autoplay="false" data-large-items="1" data-medium-items="1" data-small-items="1" data-xsmall-items="1">
                <?php
                foreach ($gallery_list as $img_id):
                    ?>
                    <div class="cms-carousel-item">
                        <img src="<?php echo esc_url(wp_get_attachment_image_url($img_id));?>" alt="<?php echo esc_attr(get_post_meta( $img_id, '_wp_attachment_image_alt', true )) ?>">
                    </div>
                    <?php
                endforeach;
                ?>
            </div>
        <?php elseif (has_post_format('quote')) : ?>
            <?php
            $quote_text = abtheme_get_post_format_value('post-quote-cite', ''); //Value is string
            echo esc_attr($quote_text);
            ?>
        <?php elseif (has_post_format('link')) : ?>
            <?php
            $link_pf = abtheme_get_post_format_value('post-link-url', '#');// Value is url
            echo esc_url($link_pf);
            ?>
        <?php elseif (has_post_format('video')) : ?>
            <?php
            $video_url = abtheme_get_post_format_value('post-video-url', '#');
            $video_file = abtheme_get_post_format_value('post-video-file', '');
            $video_html = abtheme_get_post_format_value('post-video-html', '');
            $video = '';
            if (!empty($video_url)) {
                global $wp_embed;
                echo wp_kses_post($wp_embed->run_shortcode('[embed]' . $video_url . '[/embed]'));
            } elseif (!empty($video_file)) {
                if (strpos('[embed', $video_file)) {
                    global $wp_embed;
                    echo $wp_embed->run_shortcode($video_file);
                } else {
                    echo do_shortcode($video_file);
                }
            } else {
                if ('' != $video_html) {
                    $my_allowed = wp_kses_allowed_html('post');

                    $my_allowed['iframe'] = array(
                        'align'        => true,
                        'width'        => true,
                        'height'       => true,
                        'frameborder'  => true,
                        'name'         => true,
                        'src'          => true,
                        'id'           => true,
                        'class'        => true,
                        'style'        => true,
                        'scrolling'    => true,
                        'marginwidth'  => true,
                        'marginheight' => true,
                    );
                    echo wp_kses($video_html, $my_allowed);
                }
            }
            ?>

        <?php elseif (has_post_format('audio')) : ?>
            <?php
            $audio_url = abtheme_get_post_format_value('post-audio-url', '#');
            echo esc_url($audio_url);
            ?>
        <?php else : ?>

            <?php
            if (has_post_thumbnail()) {
                echo '<div class="post-image abtheme-post">';
                the_post_thumbnail('large');
                echo '</div>';
            }
            ?>

        <?php endif; ?>
    </div><!-- .entry-featured -->

    <header class="entry-header">
        <?php
        the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');

        if ('post' === get_post_type()) {
            abtheme_entry_meta();
        }
        ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php the_content(); ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php abtheme_entry_footer(); ?>
    </footer><!-- .entry-footer -->

</article><!-- #post -->