<?php
/**
 * Class EFramework_enqueue_scripts
 * Author: KP
 * Version: 1.0.0
 * Create: 11 November, 2017
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
        }

        public function abtheme_admin_enqueue_scripts()
        {
            global $pagenow;
            if (!empty($pagenow) && ($pagenow === 'post.php' && !empty($_REQUEST['post'])) || $pagenow === 'post-new.php') {

                $id = esc_attr(wp_unslash(intval($_REQUEST['post'])));
                $post_format = get_post_format($id);
                wp_enqueue_script('abtheme-meta-box.js', abtheme()->path('APP_URL') . '/assets/js/abtheme-meta-box'.Redux_Functions::isMin().'.js', '', 'all', true);
                wp_localize_script('abtheme-meta-box.js', 'post_format', $post_format);
            }
        }
    }
}
new EFramework_enqueue_scripts();