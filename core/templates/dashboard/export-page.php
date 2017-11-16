<?php
/**
 * @since: 1.0.0
 * @author: KP
 * @create: 16-Nov-17
 */
?>
<div class="abcore-export-demos">
    <h2><?php echo esc_html__('Export', 'abtheme') ?></h2>
    <form method="post" class="abcore-export-contents">
        <div class="abcore-export-name">
            <label for="abcore-ie-id">
                <h4><?php echo esc_html__('Demo Name (*) Enter demo slug (EXP : demo1, demo_1, demo-1...)', 'abtheme') ?></h4>
            </label>
            <input type="text" id="abcore-ie-id" placeholder="demo-slug">
        </div>
        <div class="abcore-export-link">
            <label for="abcore-ie-link">
                <h4><?php echo esc_html__('Link Demo Preview (*)', 'abtheme') ?></h4>
            </label>
            <input type="text" id="abcore-ie-id" placeholder="https://cmssuperheroes.com/">
        </div>
        <div class="abcore-export-options">
            <h4><?php echo esc_html__('Select data (*):') ?></h4>
            <div class="abcore-export-list-opt">

                <input name="abcore-ie-data-type[]" type="checkbox" value="attachment" checked="checked">
                <label><?php esc_html_e('Media', 'abtheme'); ?></label>

                <input name="abcore-ie-data-type[]" type="checkbox" value="widgets" checked="checked">
                <label><?php esc_html_e('Widgets', 'abtheme'); ?></label>

                <input name="abcore-ie-data-type[]" type="checkbox" value="options" checked="checked">
                <label><?php esc_html_e('WP Settings', 'abtheme'); ?></label>

                <?php if (class_exists('ReduxFramework')): ?>

                    <input name="abcore-ie-data-type[]" type="checkbox" value="settings" checked="checked">
                    <label><?php esc_html_e('Theme Options', 'abtheme'); ?></label>

                <?php endif; ?>

                <?php if (function_exists('cptui_get_post_type_data')): ?>

                    <input name="abcore-ie-data-type[]" type="checkbox" value="ctp_ui" checked="checked">
                    <label><?php esc_html_e('Post Type', 'abtheme'); ?></label>

                <?php endif; ?>

                <input name="abcore-ie-data-type[]" type="checkbox" value="content" checked="checked">
                <label><?php esc_html_e('Content', 'abtheme'); ?></label>

                <?php if (class_exists('RevSlider')): ?>

                    <input name="abcore-ie-data-type[]" type="checkbox" value="revslider" checked="checked">
                    <label><?php esc_html_e('Slider Revolution', 'abtheme'); ?></label>

                <?php endif; ?>
            </div>
        </div>
        <div class="abcore-export-btn">
            <input type="hidden" name="action" value="abcore_export">
            <button type="submit" class="button button-primary create-demo"><?php esc_html_e('Create Demo', 'abtheme'); ?></button>
            <button type="button" class="button button-primary download-demo"><?php esc_html_e('Download All Demos', 'abtheme'); ?></button>
        </div>
    </form>
</div>