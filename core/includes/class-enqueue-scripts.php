<?php
/**
 * Class EFramework_enqueue_scripts
 * Author: KP
 * Version: 1.0.0
 */
if (!defined('ABSPATH')) {
    die();
}
if (!class_exists('EFramework_enqueue_scripts')) {
    class EFramework_enqueue_scripts
    {
        public function __construct()
        {
            add_action('admin_enqueue_scripts', array($this, 'abtheme_admin_enqueue_scripts'));
            add_action('admin_menu',array($this,'abtheme_add_menu'));
        }

        public function abtheme_admin_enqueue_scripts()
        {
            global $pagenow;
            if (!empty($pagenow) && ($pagenow === 'post.php' || $pagenow === 'post-new.php')) {
                $post_format = !empty($_REQUEST['post']) ? get_post_format($_REQUEST['post']) : '';
                wp_enqueue_script('abtheme-meta-box.js', abtheme()->path('APP_URL') . '/assets/js/abtheme-meta-box.js', '', 'all', true);
                wp_localize_script('abtheme-meta-box.js', 'post_format', $post_format);
            }
        }

        public function abtheme_add_menu()
        {
            $current_theme = wp_get_theme();
            add_menu_page($current_theme->get('Name'),$current_theme->get('Name'),'manage_options',$current_theme->get('TextDomain'),array($this,'abtheme_create_theme_dashboard'),'dashicons-admin-generic',3);
            add_submenu_page($current_theme->get('TextDomain'), esc_html__('Dashboard','abtheme'), esc_html__('Dashboard','abtheme'), 'manage_options', $current_theme->get('TextDomain'),array($this,'abtheme_create_theme_dashboard'));
//            add_submenu_page($current_theme->get('TextDomain'), 'New Service', 'New Sevice', 'manage_options', 'abc',array($this,'abtheme_create_theme_dashboard_menu'));

        }

        public function abtheme_create_theme_dashboard()
        {
            echo '1111';
        }

        public function abtheme_create_theme_dashboard_menu()
        {
            echo '22323';
        }
    }
}
new EFramework_enqueue_scripts();