<?php
extract(shortcode_atts(array(
    'title' => '',
    'description' => '',
    'content_align' => 'default',
    'icon_type' => 'fontawesome',
    'button_type'=> 'button',
    'button_text'=> '',
    'button_link'=> '#',
    'image' => '',
    'cms_template' => 'cms_fancybox.php',
    'el_class' => '',
    'css_animation' => '',
), $atts));

// Enqueue needed icon font.
vc_icon_element_fonts_enqueue( $icon_type );
// Build the animation classes
$animation_classes = $this->getCSSAnimation( $css_animation );
// VC link
$link = vc_build_link($button_link);

$icon_name = "icon_" . $icon_type;
$iconClass = isset($atts[$icon_name])?$atts[$icon_name]:'';

if ($button_type == 'button'){
    $btn_class = 'btn btn-primary';
} else {
    $btn_class = 'btn-link';
}
?>
<div class="cms-fancybox-wraper cms-fancybox-layout1 <?php echo esc_attr($el_class);?> text-<?php echo esc_attr($content_align);?> <?php echo esc_attr($animation_classes); ?>">
    <div class="cms-fancybox-item">
        <?php
        $image_url = '';
        if (!empty($atts['image'])) {
            $attachment_image = wp_get_attachment_image_src($atts['image'], 'full');
            $image_url = $attachment_image[0];
        }
        ?>

        <?php if($image_url):?>
            <div class="cms-fancybox-icon">
                <img src="<?php echo esc_attr($image_url);?>" />
            </div>
        <?php else:?>
            <div class="cms-fancybox-icon">
                <?php if( $iconClass ): ?>
                    <i class="<?php echo esc_attr($iconClass); ?>"></i>
                <?php endif; ?>

            </div>
        <?php endif;?>
        <div class="cms-fancybox-content">
            <?php if($title):?>
                <h3 class="cms-fancybox-title">
                    <?php echo esc_attr($title);?>
                </h3>
            <?php endif;?>
            <?php if($description): ?>
                <div class="cms-fancybox-description">
                    <?php echo wp_kses_post($description);?>
                </div>
            <?php endif; ?>

            <?php if($button_text != ''):?>
                <div class="cms-fancybox-button">
                    <a class="<?php echo esc_attr($btn_class); ?>" href="<?php echo esc_url($button_link);?>">
                        <span class="btn-text"><?php echo esc_attr($button_text);?></span>
                    </a>
                </div>
            <?php endif;?>
        </div>
    </div>
</div>