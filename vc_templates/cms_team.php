<?php
extract(shortcode_atts(array(
    'name'  => '',
    'position'  => '',
    'description'  => '',
    'image'  => '',
    'facebook'  => '',
    'twitter'  => '',
    'pinterest'  => '',
    'google' => '',
    'el_class'  => '',
    'css_animation' => '',
), $atts));

$image_url = '';
if (!empty($image)) {
    $attachment_image = wp_get_attachment_image_src($image, 'full');
    $image_url = $attachment_image[0];
}
?>
<div class="cms-team-member cms-team-member-layout1 <?php echo esc_attr($el_class.' '.$animation_classes); ?>">
    <div class="team-image">
        <?php if($image_url){ ?>
            <img src="<?php echo esc_attr($image_url);?>" />
        <?php } ?>
    </div>
    <div class="team-title">
        <?php echo esc_attr($name); ?>
    </div>
    <div class="team-description">
        <?php echo esc_attr($description); ?>
    </div>

    <?php if($facebook || $twitter || $pinterest || $google){ ?>
        <div class="ab-team-social">
            <?php if($facebook){ ?><a class="team-social" title="Facebook" href="<?php echo esc_attr($facebook); ?>" target="_blank"><i class="fa fa-facebook"></i></a><?php } ?>
            <?php if($twitter){ ?><a class="team-social" title="Twitter" href="<?php echo esc_attr($twitter); ?>" target="_blank"><i class="fa fa-twitter"></i></a><?php } ?>
            <?php if($pinterest){ ?><a class="team-social" title="Pinterest" href="<?php echo esc_attr($pinterest); ?>" target="_blank"><i class="fa fa-pinterest-p"></i></a><?php } ?>
            <?php if($google){ ?><a class="team-social" title="Google +" href="<?php echo esc_attr($google); ?>" target="_blank"><i class="fa fa-google-plus"></i></a><?php } ?>
        </div>
    <?php } ?>
</div>