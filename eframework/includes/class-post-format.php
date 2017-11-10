<?php
/**
 * Post Format box module based on Redux Framework.
 * Supports only one meta box.
 *
 * @package eFramework
 * @since 1.0.0
 *
 * @version 1.0.0
 */
if (!defined('ABSPATH')) {
    die();
}
if (!class_exists('EFramework_PostFormat')) {
    class EFramework_PostFormat
    {
        protected $post_format_panel = array();
        public function __construct()
        {
            add_action('init', array($this, 'init'));
        }

        public function init()
        {
            global $pagenow;
            $post_type = isset($_REQUEST['post_type']) ? $_REQUEST['post_type'] : 'post';
            if ( isset($pagenow ) && ( 'post.php' === $pagenow || 'post-new.php' === $pagenow ) && current_theme_supports('post-formats') && post_type_supports($post_type, 'post-formats')) {
                $post_formats = get_theme_support('post-formats');
//                echo '<pre>';
//                var_dump($post_formats);
//                echo '</pre>';
            }
        }
    }
}