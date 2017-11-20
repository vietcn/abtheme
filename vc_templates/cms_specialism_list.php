<div class="jb-specialism-list <?php echo esc_html($atts['job_style']); ?> <?php echo esc_html($atts['custom_class']); ?> clearfix">
    <?php if(!empty($content)): ?>

        <?php foreach ($content as $term): ?>

        <div class="jb-specialism-item">
            <div class="jb-specialism-inner clearfix" data-toggle="tooltip" title="<?php echo esc_html($term->name);?>">
                <div class="jb-specialism-left">
                    <span>
                        <?php

                        $term_link = get_term_link($term->term_id, 'jobboard-tax-specialisms');
                        $term_icon = get_term_meta($term->term_id, '_icon', true);
                        $term_image = get_term_meta($term->term_id, '_image', true);
                        $term_media = get_term_meta($term->term_id, '_media', true);

                        if($term_media && $term_icon){
                            echo '<i class="'.esc_attr($term_icon).'"></i>';
                        } elseif (!$term_media && isset($term_image['url'])){
                            echo '<img src="'.esc_url($term_image['url']).'" alt="' . esc_html($term->name) . '">';
                        } elseif(strlen($term->name) <= 2){
                            echo esc_html($term->name);
                        } else {
                            echo substr($term->name, 0, 1);
                        }

                        ?>
                    </span>
                </div>
                <div class="jb-specialism-right">
                    <h6><?php echo esc_html($atts['length'] && strlen($term->name) > (int)$atts['length'] ? substr($term->name, 0 , (int)$atts['length']) . '...' : $term->name);?></h6>
                    <a class="jb-specialism-position" href="<?php echo esc_url($term_link); ?>"><?php echo sprintf(esc_html__('%s Positions', 'wp-abtheme'), $term->count); ?></a>
                    <a class="jb-specialism-more" href="<?php echo esc_url($term_link); ?>"><?php esc_html_e('View', 'wp-abtheme'); ?></a>
                </div>
            </div>
        </div>

        <?php endforeach; ?>

    <?php else: ?>

        <p><?php esc_html_e('Specialism not found!', 'wp-abtheme'); ?></p>

    <?php endif; ?>
</div>

<?php if(!empty($atts['page'])): $page_url = vc_build_link($atts['page']); ?>
<div class="jb-specialism-button text-center">
    <a href="<?php echo esc_url($page_url['url']); ?>" target="<?php echo esc_attr($page_url['target']); ?>"><i class="zmdi zmdi-chevron-down"></i><?php echo esc_html($page_url['title'] ? $page_url['title'] : esc_html__('All Sectors', 'wp-abtheme')); ?><i class="zmdi zmdi-chevron-down"></i></a>
</div>
<?php endif; ?>