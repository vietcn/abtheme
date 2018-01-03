<?php
extract(shortcode_atts(array(
    'heading' => '',
    'heading_color' => '',
    'icon_type' => 'fontawesome',
    'button_text'  => 'Button',
    'link_button'  => '#',
    'icon_openiconic' => '',
    'button_size'  => 'btn-normal',
    'icon_align'  => 'left',
    'icon_custom'  => '',

    'el_class'  => ''
), $atts));

$type = $icon_fontawesome = $icon_openiconic = $icon_typicons = $icon_entypo = $icon_linecons = '';

// Enqueue needed icon font.
vc_icon_element_fonts_enqueue( $type );

$icon_name = "icon_" . $icon_type;
$iconClass = isset($atts[$icon_name])?$atts[$icon_name]:'';
$link = vc_build_link($link_button);
$a_href = '';
if ( strlen( $link['url'] ) > 0 ) {
    $a_href = $link['url'];
}
// Build the animation classes
$animation_classes = $this->getCSSAnimation( $animation );
?>
<div class="cms-cta-wrapper <?php echo esc_attr($el_class); ?> <?php echo esc_attr($animation_classes); ?>">
    <div class="cta-text" style="color: <?php echo esc_attr($heading_color); ?>">
        <?php echo esc_attr($heading); ?>
    </div>
    <div class="cta-button">
        <a href="<?php echo esc_url($a_href);?>" class="btn <?php echo esc_attr($button_size); ?>">
            <span class="btn-text">
                <?php switch ($icon_align) {
                    case 'right':
                        ?>
                        <span><?php echo esc_attr($button_text); ?></span>
                            <?php if( $iconClass ): ?>
                        <i class="<?php echo esc_attr($iconClass);?> pull-right"></i>
                    <?php endif; ?>
                        <?php
                        break;
                    case 'left':
                    default:
                        ?>
                        <?php if( $iconClass ): ?>
                        <i class="<?php echo esc_attr($icon_custom);?> pull-left"></i>
                    <?php endif;?>
                            <span><?php echo esc_attr($button_text); ?></span>
                        <?php
                        break;
                }?>
            </span>
        </a>
    </div>
</div>