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
        <div class="abcore-import-demos">
            <h1>Demos..............................</h1>
        </div>
        <?php
        $page = isset($_REQUEST['page']) ? $_REQUEST['page'] : '';
        //        $current_link = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        //        wp_parse_args($current_link)
        ?>
        <form action="" method="post">
<!--            <input type="hidden" name="page" value="--><?php //echo $page ?><!--">-->
            <input type="text" name="kp" value="123123">
            <button>ABC</button>
        </form>
    </div>
</div>
