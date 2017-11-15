<?php
/**
 * @Template: Import demo page
 * @version: 1.0.0
 * @author: KP
 * @descriptions: Display for import demo page in Dashboard framework
 */
?>
<div class="wrap">
    <div class="abcore-dashboard">

        <header class="abcore-dashboard-header">
            <div class="abcore-dashboard-title">
                <h1><?php echo esc_attr($this->theme_name) ?></h1>
            </div>
            <!--            --><?php //include_once(get_template_directory() . '/rella/admin/views/rella-tabs.php'); ?>
        </header>
        <?php
        if (!is_plugin_active('theme-core-import-export/theme-core-import-export.php')):
            ?>
            <div class="abcore-tab-pane">
                <div class="abcore-info abtheme-align-center bg-seashell">
                    <h4>
                        <i class="fa fa-info-circle abcore-text-gradient"></i> <?php esc_html_e('Importing a demo will create pages, posts, add images, theme options, widgets, sliders and others.', 'abtheme'); ?>
                        <br/>
                        <?php esc_html_e('IMPORTANT: Please, install and activate required plugins  before to import any demo.', 'abtheme'); ?>
                    </h4>
                </div>
            </div>
            <?php
        else:
            ?>
            <h1>Show demos here</h1>
            <?php
        endif;
        ?>
    </div>
</div>
