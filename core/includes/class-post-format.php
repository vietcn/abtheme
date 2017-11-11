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
//            add_action('init', array($this, 'init'));
            add_action( 'add_meta_boxes', array( $this, 'add_metaboxes' ) );
        }

        public function init()
        {

        }
        public function add_metaboxes(){
            global $pagenow;
            $post_type = isset($_REQUEST['post_type']) ? $_REQUEST['post_type'] : 'post';
            if (isset($pagenow) && ('post.php' === $pagenow || 'post-new.php' === $pagenow) && current_theme_supports('post-formats') && post_type_supports($post_type, 'post-formats')) {
                $post_formats = get_theme_support('post-formats');
                add_meta_box(
                    'kp_options',
                    "KP Settings",
                    array( $this, 'generate_panel' ),
                    $post_type,
                    'normal'
                );
            }
        }

        public function generate_panel($post)
        {
            $sections = array();
            $args = array(
                // TYPICAL -> Change these values as you need/desire
                'opt_name'             => 'kp_options',
                // This is where your data is stored in the database and also becomes your global variable name.
                'display_name'         => 'KAKAAKA',
                // Name that appears at the top of your panel

            );
            require_once get_template_directory() . '/inc/post-format.php';
            wp_nonce_field( 'srfmetabox_post_nonce_action', 'srfmetabox_post_nonce' );
            $redux = new ReduxFramework( $sections, $args );
            $redux->_register_settings();
            $redux->_enqueue();
            $redux->generate_panel();
        }
    }
}