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

        public function __construct($redux)
        {
            add_action('init', array($this, 'init'));
        }

        public function init()
        {
//            global $pagenow;
//            $post_type = isset($_REQUEST['post_type']) ? $_REQUEST['post_type'] : 'post';
//            if (isset($pagenow) && ('post.php' === $pagenow || 'post-new.php' === $pagenow) && current_theme_supports('post-formats') && post_type_supports($post_type, 'post-formats')) {
//                $post_formats = get_theme_support('post-formats');
//                require_once get_template_directory() . '/inc/post-format.php';
//            }

            function redux_add_metaboxes($metaboxes) {
                die();
                // Declare your sections
                $boxSections = array();
                $boxSections[] = array(
                    //'title'         => __('General Settings', 'redux-framework-demo'),
                    //'icon'          => 'el-icon-home', // Only used with metabox position normal or advanced
                    'fields'        => array(
                        array(
                            'id' => 'sidebar',
                            //'title' => __( 'Sidebar', 'redux-framework-demo' ),
                            'desc' => 'Please select the sidebar you would like to display on this page. Note: You must first create the sidebar under Appearance > Widgets.',
                            'type' => 'select',
                            'data' => 'sidebars',
                        ),
                    ),
                );

                // Declare your metaboxes
                $metaboxes = array();
                $metaboxes[] = array(
                    'id'            => 'sidebar',
                    'title'         => __( 'Sidebar', 'fusion-framework' ),
                    'post_types'    => array( 'page', 'post', 'acme_product' ),
                    //'page_template' => array('page-test.php'), // Visibility of box based on page template selector
                    //'post_format' => array('image'), // Visibility of box based on post format
                    'position'      => 'side', // normal, advanced, side
                    'priority'      => 'high', // high, core, default, low - Priorities of placement
                    'sections'      => $boxSections,
                );

                return $metaboxes;
            }
            // Change {$redux_opt_name} to your opt_name
            add_action("redux/metaboxes/kpkpkpkp_options/boxes", "redux_add_metaboxes");
        }
    }
}