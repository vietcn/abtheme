<?php
extract(shortcode_atts(array(
    'title' => '',
    'title_color' => '',
    'title_fontsize' => '',
    'title_margin' => '',
    'type' => 'Random',
    'digit' => '668',
    'digit_color' => '',
    'digit_fontsize' => '',
    'icon_type' => 'fontawesome',
    'icon_color' => '',
    'suffix' => '',
    'prefix' => '',
    'css_animation' => '',
    'el_class' => '',
), $atts));
$html_id = cmsHtmlID('cms-counter');
wp_register_script('counter', get_template_directory_uri().'/assets/js/counter.min.js', array('jquery'),'1.0.0',true);
wp_enqueue_script('abtheme-do-counter', get_template_directory_uri().'/assets/js/do.counter.js', array('counter','waypoints'),'1.0.0',true);

$atts['icon_type'] = isset($atts['icon_type'])?$atts['icon_type']:'fontawesome';
switch ($atts['icon_type']) {
    case 'pe7stroke':
        wp_enqueue_style('cms-icon-pe7stroke', CMS_CSS. 'Pe-icon-7-stroke.css');
        break;
    default:
        vc_icon_element_fonts_enqueue( $atts['icon_type'] );
        break;
}

// Enqueue needed icon font.
vc_icon_element_fonts_enqueue( $icon_type );
// Build the animation classes
$animation_classes = $this->getCSSAnimation( $css_animation );

$icon_name = "icon_" . $icon_type;
$iconClass = isset($atts[$icon_name])?$atts[$icon_name]:'';
?>
<div class="cms-counter-wrap cms-counter-layout1 <?php echo esc_attr($el_class.' '.$animation_classes);?>">
    <div class="cms-counter-inner clearfix">
        <?php
        $image_url = '';
        if (!empty($atts['image'])) {
            $attachment_image = wp_get_attachment_image_src($atts['image'], 'full');
            $image_url = $attachment_image[0];
        }
        ?>

        <?php if($image_url):?>
            <div class="cms-counter-icon">
                <img src="<?php echo esc_attr($image_url);?>" />
            </div>
        <?php else:?>
            <div class="cms-counter-icon">
                <?php if( $iconClass ): ?>
                    <i class="<?php echo esc_attr($iconClass); ?>" style="color: <?php echo esc_attr($icon_color)?>;"></i>
                <?php endif; ?>
            </div>
        <?php endif;?>

        <?php if($title):?>
            <div class="cms-counter-title" style="font-size: <?php echo esc_attr($title_fontsize); ?>px; margin-bottom: <?php echo esc_attr($title_margin); ?>px; color: <?php echo esc_attr($title_color)?>">
                <?php echo esc_attr($title);?>
            </div>
        <?php endif;?>

        <div class="cms-counter-content">
            <div style="font-size: <?php echo esc_attr($digit_fontsize); ?>px; color: <?php echo esc_attr($digit_color)?>" id="<?php echo esc_attr($html_id) ?>" class="cms-counter ft-lr <?php echo esc_attr(strtolower($type));?>" data-suffix="<?php echo esc_attr($suffix);?>" data-prefix="<?php echo esc_attr($prefix);?>" data-type="<?php echo esc_attr(strtolower($type));?>" data-digit="<?php echo esc_attr($digit);?>"></div>
        </div>
    </div>
</div>