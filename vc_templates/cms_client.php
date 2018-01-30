<?php
extract(shortcode_atts(array(
    'name'  => '',
    'image'  => '',
    'link'  => '#',
    'el_class'  => '',
    'css_animation' => '',
), $atts));

$image_url = '';
if (!empty($image)) {
    $attachment_image = wp_get_attachment_image_src($image, 'full');
    $image_url = $attachment_image[0];
}
$link = vc_build_link($link);
?>
<div class="cms-client cms-client-layout1 <?php echo esc_attr($el_class.' '.$animation_classes); ?>">
    <div class="client-image">
        <?php if($link){ ?>
            <a class="client-link" title="<?php echo esc_attr($name); ?>" href="<?php echo esc_url($link["url"]);?>" target="<?php echo esc_attr($link["target"]);?>">
                <?php if($image_url){ ?>
                    <img src="<?php echo esc_attr($image_url);?>" />
                <?php } ?>
            </a>
        <?php } ?>
    </div>
</div>