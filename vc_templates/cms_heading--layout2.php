<?php
extract(shortcode_atts(array(
    'hd_title' => '',
    'hd_title_color' => '',
    'hd_tag' => 'h2',
    'hd_title_font_size' => '',
    'hd_content_align' => 'left',
    'el_class'  => '',
    'css_animation' => '',
    'hd_margin' => '',
), $atts));
$animation_classes = $this->getCSSAnimation( $css_animation );
?>
<div class="cms-heading-wrapper cms-heading-layout2 <?php echo esc_attr($el_class); ?> text-<?php echo esc_attr($hd_content_align); ?> <?php echo esc_attr($animation_classes); ?>" style="margin-bottom: <?php echo esc_attr($hd_margin); ?>px">
    <<?php echo esc_attr($hd_tag);?> class="cms-heading" style="font-size:<?php echo esc_attr($hd_title_font_size).'px'; ?>;color:<?php echo esc_attr($hd_title_color); ?>;">
    <?php echo wp_kses_post($hd_title); ?>
</<?php echo esc_attr($hd_tag);?>>
</div>