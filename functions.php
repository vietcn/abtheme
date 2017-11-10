<?php
/**
 * eThemeFramework functions and definitions
 *
 * @package eThemeFramework
 */

require_once get_template_directory() . '/inc/eframework.php';
if ( ! function_exists( 'ethemeframework_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function ethemeframework_setup()
    {
        // Make theme available for translation.
        load_theme_textdomain( 'ethemeframework', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /* Change default image thumbnail sizes in wordpress */
        update_option('thumbnail_size_w', 400);
        update_option('thumbnail_size_h', 400);
        update_option('thumbnail_crop', 1);
        update_option('medium_size_w', 600);
        update_option('medium_size_h', 400);
        update_option('medium_crop', 1);
        update_option('large_size_w', 1000);
        update_option('large_size_h', 500);
        update_option('large_crop', 1);


        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support('post-thumbnails');


        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary', 'ethemeframework' ),
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'ethemeframework_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        // Add support for core custom logo.
        add_theme_support( 'custom-logo', array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ) );

        /*
         * Enable support for Post Formats.
         * See https://developer.wordpress.org/themes/functionality/post-formats/
         */
        add_theme_support( 'post-formats', array(
            'image',
            'gallery',
            'video',
            'audio',
            'quote',
            'link',
        ) );
    }
endif;
add_action( 'after_setup_theme', 'ethemeframework_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ethemeframework_content_width()
{
    $GLOBALS['content_width'] = apply_filters( 'ethemeframework_content_width', 640 );
}
add_action( 'after_setup_theme', 'ethemeframework_content_width', 0 );

/**
 * Register widget area.
 */
function ethemeframework_widgets_init()
{
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'ethemeframework' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'ethemeframework' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'ethemeframework_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ethemeframework_scripts()
{
    $min = '';
    if ( ! defined( 'WP_DEBUG' ) || ! WP_DEBUG )
    {
        $min = '.min';
    }
    $theme = wp_get_theme( get_template() );

    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap' . $min . '.css', array(), '3.3.7' );
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome' . $min . '.css', array(), '4.7.0', 'screen' );
    wp_enqueue_style( 'ethemeframework', get_template_directory_uri() . '/assets/css/theme.css', array(), $theme->get( 'Version' ) );
    wp_enqueue_style( 'ethemeframework-style', get_stylesheet_uri() );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
    {
        wp_enqueue_script( 'comment-reply' );
    }

    wp_enqueue_script( 'ethemeframework', get_template_directory_uri() . '/assets/js/theme' . $min . '.js', array( 'jquery', 'imagesloaded' ), $theme->get( 'Version' ), true );
}
add_action( 'wp_enqueue_scripts', 'ethemeframework_scripts' );

/**
 * Helper functions for this theme.
 */
require_once get_template_directory() . '/inc/template-functions.php';

/**
 * Theme options
 */
require_once get_template_directory() . '/inc/theme-options.php';

/**
 * Page options
 */
require_once get_template_directory() . '/inc/page-options.php';

/**
 * CSS Generator.
 */
if ( ! class_exists( 'eThemeFramework_CSS_Generator' ) )
{
    require_once get_template_directory() . '/inc/classes/class-css-generator.php';
}

/**
 * Breadcrumb.
 */
require_once get_template_directory() . '/inc/classes/class-breadcrumb.php';

/**
 * Custom template tags for this theme.
 */
require_once get_template_directory() . '/inc/template-tags.php';

/**
 * Additional widgets for the theme
 */
require_once get_template_directory() . '/widgets/widget-recent-posts.php';
require_once get_template_directory() . '/widgets/widget-flickr.php';
require_once get_template_directory() . '/widgets/widget-instagram.php';
require_once get_template_directory() . '/widgets/widget-contact-info.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require_once get_template_directory() . '/inc/extends.php';


/**
 * Tutorials snippet functions. You should add those to extends.php
 * and remove the file.
 */
require_once get_template_directory() . '/inc/snippets.php';

/**
 * Custom post types and args based on eFramework.
 * require eFramework plugin
 */
add_filter( 'eframework_extra_post_types', function( $post_types ) { return array( 'portfolio' => true, 'team_member' => true ); } );
add_filter( 'eframework_portfolio_post_type_args', function( $args )
{
    $args['labels']['menu_name'] = 'Portfolio Test Filter';
    return $args;
});