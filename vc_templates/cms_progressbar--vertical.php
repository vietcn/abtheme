<?php
extract(shortcode_atts(array(
    'values'=> '',
    'show_value' => 'true',
    'value_suffix'=> '',
    'bg_color'=> '#e9e9e9',
    'color'=> '',
    'width'=> '250px',
    'height'=> '50px',
    'border_radius'=> '',
    'css_animation'     => '',
    'el_class'     => '',
), $atts));

/* CSS */
wp_register_style('bootstrap-progressbar', get_template_directory_uri() . '/assets/css/bootstrap-progressbar.min.css','','0.7.0','all');
wp_enqueue_style('bootstrap-progressbar');
/* JS */
wp_register_script('bootstrap-progressbar', get_template_directory_uri() . '/assets/js/bootstrap-progressbar.min.js',array('jquery'),'0.7.0',true);
wp_register_script('abtheme-progressbar', get_template_directory_uri() . '/assets/js/do.bootstrap-progressbar.js',array('jquery','bootstrap-progressbar'),"1.0.0",true);
wp_enqueue_script('abtheme-progressbar');
wp_enqueue_script('waypoints');
/* Layout */
$html_id = cmsHtmlID('cms-progressbar');

$animation_classes = $this->getCSSAnimation( $css_animation );
$new_line = (array) vc_param_group_parse_atts( $values );
?>
<div class="cms-progressbar-wraper cms-progressbar-vertical <?php echo esc_attr($el_class.' '.$animation_classes);?>">
    <div class="cms-progress-content">
        <?php foreach ($new_line as $key => $value) {
        $label = isset($value['label']) ? $value['label'] : '';
        $value = isset($value['value']) ? $value['value'] : ''; ?>
        <div class="cms-progress-title">
            <?php echo esc_attr($label);?>
        </div>
        <div class="cms-progress progress vertical" style="background-color:<?php echo esc_attr($bg_color);?>; border-radius:<?php echo esc_attr($border_radius);?>; width:<?php echo esc_attr($width);?>; height:<?php echo esc_attr($height);?>">
            <div id="item-<?php echo esc_attr($html_id); ?>" class="progress-bar progress-striped" role="progressbar" data-valuetransitiongoal="<?php echo esc_attr($value); ?>" style="background-color:<?php echo esc_attr($color);?>;">
                <span class="progress-couter">
                    <?php if($show_value == 'true'): ?>
                        <?php echo esc_attr($value.' '.$value_suffix);?>
                    <?php endif; ?>
                </span>
            </div>
        </div>
        <?php } ?>
    </div>
</div>