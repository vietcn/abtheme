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
<div class="cms-call-to-action-wrapper <?php echo esc_attr($el_class); ?>">

    ggdfgdfgdfgdgf
</div>