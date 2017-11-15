<?php
/**
 * @Template: Import demo page
 * @version: 1.0.0
 * @author: KP
 * @descriptions: Display for import demo page in Dashboard framework
 */
?>
<div class="wrap">
    <div class="abtheme-dashboard">

        <header class="abtheme-dashboard-header">
            <div class="abtheme-dashboard-title">
                <h1><?php echo esc_attr($this->theme_name) ?></h1>
            </div>
            <!--            --><?php //include_once(get_template_directory() . '/rella/admin/views/rella-tabs.php'); ?>
        </header>
        <?php
        if (!is_plugin_active('abtheme-import-export/abtheme-import-export.php')):
            ?>
            <div class="abtheme-tab-pane">
                <div class="abtheme-info abtheme-align-center bg-seashell">
                    <h4>
                        <i class="fa fa-info-circle text-gradient"></i> <?php esc_html_e('Importing a demo will create pages, posts, add images, theme options, widgets, sliders and others.', 'boo'); ?>
                        <br/>
                        <?php esc_html_e('IMPORTANT: Please, install and activate required plugins  before to import any demo.', 'boo'); ?>
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
