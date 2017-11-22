<?php
/**
 * @Template: class-helper.php
 * @since: 1.0.0
 * @author: KP
 * @descriptions:
 * @create: 22-Nov-17
 */
if (!defined('ABSPATH')) {
    die();
}
if (!class_exists('EFramework_helper')) {
    class EFramework_helper
    {
        protected static $instance = null;

        public static function instance()
        {
            if(null == self::$instance) {
                self::$instance = new EFramework_helper();
            }

            return self::$instance;
        }

        public static function get_theme_option_name()
        {
            return abtheme_get_opt_name();
        }
    }

    function cms_helper()
    {
        return EFramework_helper::instance();
    }

    $GLOBALS['cms_helper'] = cms_helper();
}