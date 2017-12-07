<?php
    $carousel_title = isset($atts['carousel_title']) ? $atts['carousel_title'] : '';
?>
<div class="cms-carousel-wrap">
    <?php if(!empty($carousel_title)) { ?>
        <h3><?php echo esc_attr($carousel_title); ?></h3>
    <?php } ?>
    <div class="cms-carousel owl-carousel owl-theme cms-carousel-layout2 <?php echo esc_attr($atts['template']);?>" data-margin="<?php echo esc_attr($atts['margin']); ?>" data-loop="<?php echo esc_attr($atts['loop']); ?>" data-nav="<?php echo esc_attr($atts['nav']); ?>" data-dots="<?php echo esc_attr($atts['dots']); ?>" data-autoplay="<?php echo esc_attr($atts['autoplay']); ?>" data-large-items="<?php echo esc_attr($atts['large_items']); ?>" data-medium-items="<?php echo esc_attr($atts['medium_items']); ?>" data-small-items="<?php echo esc_attr($atts['small_items']); ?>" data-xsmall-items="<?php echo esc_attr($atts['xsmall_items']); ?>">
        <?php
        $posts = $atts['posts'];
        while($posts->have_posts()){
            $posts->the_post();
            $size = 'abtheme_blog_size3';
            ?>
                <div class="cms-carousel-item">
                    <?php 
                        if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false)):
                            $class = ' has-feature-img';
                            $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false);
                            $thumbnail = get_the_post_thumbnail(get_the_ID(),'large');
                        else:
                            $class = ' no-feature-img';
                            $thumbnail_url[0] = get_template_directory_uri(). '/assets/images/no-image.jpg';
                            $thumbnail = '<img src="'.get_template_directory_uri(). '/assets/images/no-image.jpg" alt="'.get_the_title().'" />';
                        endif;
                    ?>
                    <div class="carousel-entry-blog <?php echo esc_attr($class); ?>">
                        <div class="entry-header">
                            <ul class="entry-details">
                                <?php if(has_category()): ?>
                                    <li class="detail-terms"><?php the_terms( get_the_ID(), 'category', '', ', ' ); ?></li>
                                <?php endif; ?> 
                                <li class="detail-date"><?php the_date(); ?></li>
                            </ul>
                            <div class="entry-feature">
                                <a href="<?php the_permalink(); ?>"><?php echo ''.wp_kses_allowed_html($thumbnail); ?></a>
                            </div>
                        </div>
                        <div class="entry-body">
                            <h3 class="entry-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <div class="entry-content">
                                <?php echo esc_attr(substr(strip_tags(strip_shortcodes(get_the_content())), 0,118)); ?>...
                            </div>
                            <div class="entry-readmore">
                                <a href="<?php the_permalink(); ?>"><?php echo esc_html__('Read more', 'abtheme'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        }
        ?>
    </div>
</div>