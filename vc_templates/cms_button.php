<?php
extract(shortcode_atts(array(
    'button_text'  => 'Button',
    'button_text_color'  => '',
    'button_link'  => '#',
    'button_style'  => 'btn-default',
    'button_size'  => 'btn-normal',
    'button_align'  => '',
    'button_color'  => '',
    'icon_type' => 'fontawesome',
    'icon_align'  => 'left',
    'el_class'  => '',
    'css_animation' => '',
    'cms_template' => 'cms_button.php',
), $atts));

// Enqueue needed icon font.
vc_icon_element_fonts_enqueue( $icon_type );
// Build the animation classes
$animation_classes = $this->getCSSAnimation( $css_animation );
// VC link
$link = vc_build_link($button_link);

$icon_name = "icon_" . $icon_type;
$iconClass = isset($atts[$icon_name])?$atts[$icon_name]:'';
if($button_style == 'btn-outline'){
    $st= 'border-color:'.esc_attr($button_color);
}
?>
<div class="cms-button-wrapper button-layout1 text-<?php echo esc_attr($button_align); ?> <?php echo esc_attr($el_class.' '.$animation_classes); ?>">
    <a href="<?php echo esc_url($link["url"]);?>" title="<?php echo esc_attr($link["title"]);?>" target="<?php echo esc_attr($link["target"]);?>" class="btn <?php echo esc_attr($button_style); ?> <?php echo esc_attr($button_size); ?>" style="<?php echo $st; ?>; color: <?php echo esc_attr($button_text_color);?>">
        <span class="btn-text">
            <?php switch ($icon_align) {
                case 'right':
                    ?>
                    <span><?php echo esc_attr($button_text); ?></span>
                        <?php if( $iconClass ): ?>
                    <i class="<?php echo esc_attr($iconClass);?> icon-right"></i>
                <?php endif; ?>
                    <?php
                    break;
                case 'left':
                default:
                    ?>
                    <?php if( $iconClass ): ?>
                    <i class="<?php echo esc_attr($iconClass);?> icon-left"></i>
                <?php endif;?>
                        <span><?php echo esc_attr($button_text); ?></span>
                    <?php
                    break;
            }?>
        </span>
    </a>
</div>