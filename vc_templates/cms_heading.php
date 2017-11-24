<?php
extract(shortcode_atts(array(
    'hd_title' => '',
    'hd_title_color' => '',
    'hd_tag' => 'h2',
    'hd_title_font_size' => '',
    'hd_content_align' => 'left',
    'hd_description' => '',
), $atts));
$html_id = cmsHtmlID('cms-heading');
$atts['html_id'] = $html_id;
?>
<div id="<?php echo esc_attr($atts['html_id']);?>" class="cms-heading-wrapper cms-heading-default line-<?php echo esc_attr($hd_line); ?> text-<?php echo esc_attr($hd_content_align); ?>">
    <div class="cms-heading-inner">
        <div class="cms-heading-content">
            <<?php echo esc_attr($atts['hd_tag']);?> class="title" style="font-size:<?php echo esc_attr($hd_title_font_size).'px'; ?>;color:<?php echo esc_attr($hd_title_color); ?>;">
                <?php echo wp_kses_post($hd_title); ?>
            </<?php echo esc_attr($atts['hd_tag']);?>>
            <div class="desc"><?php echo esc_attr($hd_description); ?></div>
        </div>
    </div>
</div>