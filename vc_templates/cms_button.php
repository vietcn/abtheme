<?php
extract(shortcode_atts(array(
    'icon_type' => 'fontawesome',
    'button_text'  => 'Button',
    'link_button'  => '#',
    'button_style'  => 'btn-default',
    'button_size'  => 'size-default',
    'icon_align'  => 'left',
    'icon_custom'  => '',
    'el_class'  => ''       
), $atts));
 
    $icon_name = "icon_" . $icon_type;
    $iconClass = isset($atts[$icon_name])?$atts[$icon_name]:'';
    $link = vc_build_link($link_button);
    $a_href = '';
    if ( strlen( $link['url'] ) > 0 ) {
        $a_href = $link['url'];
    }
?>
<div class="cms-button-wrapper <?php echo esc_attr($el_class); ?> style-<?php echo esc_attr($button_style); ?>">

    <a href="<?php echo esc_url($a_href);?>" class="btn <?php echo esc_attr($button_style); ?> <?php echo esc_attr($button_size); ?>"><span class="btn-text">
        <?php switch ($icon_align) {
            case 'right':
                ?>
                    <span><?php echo esc_attr($button_text); ?></span>
                    <?php if( $icon_custom ): ?>
                        <i class="<?php echo esc_attr($icon_custom);?> fa-right"></i>
                        <?php else: if( $iconClass ): ?>
                            <i class="<?php echo esc_attr($iconClass);?> fa-right"></i>
                        <?php endif; ?>
                    <?php endif;?>
                <?php
                break;
            case 'left':
            default:
                ?>
                    <?php if( $icon_custom ): ?>
                        <i class="<?php echo esc_attr($icon_custom);?> fa-left"></i>
                        <?php else: if( $iconClass ): ?>
                            <i class="<?php echo esc_attr($iconClass);?> fa-left"></i>
                        <?php endif; ?>
                    <?php endif;?>
                    <span><?php echo esc_attr($button_text); ?></span>
                <?php
                break;
        }?>
    </span>
    </a>
</div>