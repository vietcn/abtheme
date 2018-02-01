<?php
extract(shortcode_atts(array(
    'name'  => '',
    'position'  => '',
    'description'  => '',
    'image'  => '',
    'el_class'  => '',
    'css_animation' => '',
), $atts));

$image_url = '';
if (!empty($image)) {
    $attachment_image = wp_get_attachment_image_src($image, 'full');
    $image_url = $attachment_image[0];
}
?>
<div class="cms-testimonial cms-testimonial-layout1 <?php echo esc_attr($el_class.' '.$animation_classes); ?>">
    <div class="testimonial-image">
        <?php if($image_url){ ?>
            <img src="<?php echo esc_attr($image_url);?>" />
        <?php } ?>
    </div>
    <div class="testimonial-title">
        <?php echo esc_attr($name); ?>
    </div>
    <div class="testimonial-description">
        <?php echo esc_attr($description); ?>
    </div>
</div>