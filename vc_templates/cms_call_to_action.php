<?php
extract(shortcode_atts(array(
    'heading' => '',
    'heading_color' => '',
    'icon_type' => 'fontawesome',
    'button_text'  => 'Button',
    'button_link'  => '#',
    'button_size'  => 'btn-normal',
    'icon_align'  => 'left',
    'el_class'  => '',
    'css_animation' => '',
    'cms_template' => 'cms_call_to_action.php',
), $atts));

// Enqueue needed icon font.
vc_icon_element_fonts_enqueue( $icon_type );
// Build the animation classes
$animation_classes = $this->getCSSAnimation( $css_animation );
// VC link
$link = vc_build_link($button_link);

$icon_name = "icon_" . $icon_type;
$iconClass = isset($atts[$icon_name])?$atts[$icon_name]:'';
?>
<div class="cta-wrapper cta-layout1 <?php echo esc_attr($el_class); ?> <?php echo esc_attr($animation_classes); ?>">
    <div class="cta-text" style="color: <?php echo esc_attr($heading_color); ?>">
        <?php echo esc_attr($heading); ?>
    </div>
    <div class="cta-button">
        <a href="<?php echo esc_url($link["url"]);?>" title="<?php echo esc_attr($link["title"]);?>" target="<?php echo esc_attr($link["target"]);?>" class="btn <?php echo esc_attr($button_size); ?>">
            <span class="btn-text">
                <?php switch ($icon_align) {
                    case 'right':
                        ?>
                        <span><?php echo esc_attr($button_text); ?></span>
                            <?php if( $iconClass ): ?>
                        <i class="<?php echo esc_attr($iconClass);?>"></i>
                    <?php endif; ?>
                        <?php
                        break;
                    case 'left':
                    default:
                        ?>
                        <?php if( $iconClass ): ?>
                        <i class="<?php echo esc_attr($iconClass);?>"></i>
                    <?php endif;?>
                            <span><?php echo esc_attr($button_text); ?></span>
                        <?php
                        break;
                }?>
            </span>
        </a>
    </div>
</div>