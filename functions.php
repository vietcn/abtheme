<?php
/**
 * Abtheme functions and definitions
 *
 * @package Abtheme
 */

require_once get_template_directory() . '/inc/abtheme.php';
if ( ! function_exists( 'abtheme_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function abtheme_setup()
    {
        // Make theme available for translation.
        load_theme_textdomain( 'abtheme', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        // Let WordPress manage the document title.
        add_theme_support( 'title-tag' );

        // Enable support for Post Thumbnails on posts and pages.
        add_theme_support( 'post-thumbnails' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary', 'abtheme' ),
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
        add_theme_support( 'custom-background', apply_filters( 'abtheme_custom_background_args', array(
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
        add_theme_support( 'post-formats', array(
            'gallery',
            'video',
            'audio',
            'quote',
            'link',
        ) );

        add_theme_support( 'woocommerce' );
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );
    }
endif;
add_action( 'after_setup_theme', 'abtheme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function abtheme_content_width()
{
    $GLOBALS['content_width'] = apply_filters( 'abtheme_content_width', 640 );
}
add_action( 'after_setup_theme', 'abtheme_content_width', 0 );

/**
 * Register widget area.
 */
function abtheme_widgets_init()
{
    register_sidebar( array(
        'name'          => esc_html__( 'Blog Sidebar', 'abtheme' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'abtheme' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Page Sidebar', 'abtheme' ),
        'id'            => 'sidebar-page',
        'description'   => esc_html__( 'Add widgets here.', 'abtheme' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Shop Sidebar', 'abtheme' ),
        'id'            => 'sidebar-shop',
        'description'   => esc_html__( 'Add widgets here.', 'abtheme' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'abtheme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function abtheme_scripts()
{
    $min = '';
    if ( ! defined( 'WP_DEBUG' ) || ! WP_DEBUG )
    {
        $min = '.min';
    }
    $theme = wp_get_theme( get_template() );

    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome' . $min . '.css', array(), '4.7.0', 'screen' );
    wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.css', array(), $theme->get( 'Version' ) );
    wp_enqueue_style( 'abtheme-theme', get_template_directory_uri() . '/assets/css/theme.css', array(), $theme->get( 'Version' ) );
    wp_enqueue_style( 'abtheme-menu', get_template_directory_uri() . '/assets/css/menu.css', array(), $theme->get( 'Version' ) );
    wp_enqueue_style( 'abtheme-style', get_stylesheet_uri() );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
    {
        wp_enqueue_script( 'comment-reply' );
    }

    $sticky_on = abtheme_get_opt( 'sticky_on', true );
    if( $sticky_on = 1 ){
        wp_enqueue_script( 'headroom', get_template_directory_uri() . '/assets/js/headroom.min.js', array( 'jquery' ), $theme->get( 'Version' ), true );
    }
    wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array( 'jquery' ), $theme->get( 'Version' ), true );
    //wp_enqueue_script( 'abtheme-menu', get_template_directory_uri() . '/assets/js/menu.js', array( 'jquery' ), $theme->get( 'Version' ), true );
    wp_enqueue_script( 'abtheme-main', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), $theme->get( 'Version' ), true );
}
add_action( 'wp_enqueue_scripts', 'abtheme_scripts' );

/* add editor styles */
function abtheme_add_editor_styles()
{
    add_editor_style('editor-style.css');
}
add_action('admin_init', 'abtheme_add_editor_styles');

/* add admin styles */
function abtheme_admin_style() {
    wp_enqueue_style('abtheme-admin-style', get_template_directory_uri() . '/assets/css/admin.css');
}
add_action('admin_enqueue_scripts', 'abtheme_admin_style');

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
if ( ! class_exists( 'Abtheme_CSS_Generator' ) )
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
 * Custom params & remove VC Elements.
 *
 * @author FOX
 */

function abtheme_vc_after_init(){

    require_once ( get_template_directory() . '/vc_params/vc_custom_heading.php' );
    require_once ( get_template_directory() . '/vc_params/cms_custom_pagram_vc.php' );

    vc_remove_element( "vc_button" );
    vc_remove_element( "vc_button2" );
    vc_remove_element( "vc_cta_button" );
    vc_remove_element( "vc_cta_button2" );
    vc_remove_element( "vc_cta" );
    // vc_remove_element( "cms_fancybox" );
    // vc_remove_element( "cms_counter" );
}
add_action('vc_after_init', 'abtheme_vc_after_init');

/* Include CMS Shortcode */
function abtheme_shortcodes_list(){
    $abtheme_shortcodes_list = array(
        'cms_carousel',
        'cms_grid',
        'cms_fancybox_single',
        'cms_counter_single',
        'cms_progressbar',
    );

    return $abtheme_shortcodes_list;
}

/**
 * Add new elements for VC
 */

function abtheme_vc_elements(){

    if(class_exists('CmsShortCode')) {
        add_filter('cms-shorcode-list', 'abtheme_shortcodes_list');

        require_once( get_template_directory() . '/vc_elements/cms_button.php' );
        require_once( get_template_directory() . '/vc_elements/cms_googlemap.php' );
        require_once( get_template_directory() . '/vc_elements/cms_heading.php' );
        require_once( get_template_directory() . '/vc_elements/cms_process.php' );
    }
}
add_action('vc_before_init', 'abtheme_vc_elements');

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
add_filter( 'cmssuperheroes_extra_post_types', function( $post_types ) { return array( 'portfolio' => true, 'team_member' => true ); } );
add_filter( 'cmssuperheroes_extra_post_types', function( $args )
{
    $args['labels']['menu_name'] = 'Portfolio Test Filter';
    return $args;
});