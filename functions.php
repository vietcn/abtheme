<?php
/**
 * Abtheme functions and definitions
 *
 * @package Abtheme
 */

if (!function_exists('abtheme_setup')) :
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
        load_theme_textdomain('abtheme', get_template_directory() . '/languages');

        // Custom Header
        add_theme_support("custom-header");

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        // Let WordPress manage the document title.
        add_theme_support('title-tag');

        /* Change default image thumbnail sizes in wordpress */
        update_option('thumbnail_size_w', 300);
        update_option('thumbnail_size_h', 300);
        update_option('thumbnail_crop', 1);
        update_option('medium_size_w', 800);
        update_option('medium_size_h', 400);
        update_option('medium_crop', 1);
        update_option('large_size_w', 1000);
        update_option('large_size_h', 500);
        update_option('large_crop', 1);

        // Enable support for Post Thumbnails on posts and pages.
        add_theme_support('post-thumbnails');
        add_image_size( 'abtheme-small', 160, 160, true );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => esc_html__('Primary', 'abtheme'),
            'cms' => esc_html__('CMS HELLO', 'abtheme'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('abtheme_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        // Add support for core custom logo.
        add_theme_support('custom-logo', array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ));
        add_theme_support('post-formats', array(
            'gallery',
            'video',
            'audio',
            'quote',
            'link',
        ));

        add_theme_support('woocommerce');
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');
    }
endif;
add_action('after_setup_theme', 'abtheme_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function abtheme_content_width()
{
    $GLOBALS['content_width'] = apply_filters('abtheme_content_width', 640);
}

add_action('after_setup_theme', 'abtheme_content_width', 0);

/**
 * Register widget area.
 */
function abtheme_widgets_init()
{
    register_sidebar(array(
        'name'          => esc_html__('Blog Sidebar', 'abtheme'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'abtheme'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Page Sidebar', 'abtheme'),
        'id'            => 'sidebar-page',
        'description'   => esc_html__('Add widgets here.', 'abtheme'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Shop Sidebar', 'abtheme'),
        'id'            => 'sidebar-shop',
        'description'   => esc_html__('Add widgets here.', 'abtheme'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}

add_action('widgets_init', 'abtheme_widgets_init');

/**
 * Register Google fonts
 */
if ( ! function_exists( 'abtheme_fonts_url' ) ) :

    function abtheme_fonts_url() {
        $fonts_url = '';
        $fonts     = array();
        $subsets   = 'latin,latin-ext';

        /* translators: If there are characters in your language that are not supported by Source Sans Pro, translate this to 'off'. Do not translate into your own language. */
        if ( 'off' !== _x( 'on', 'Source Sans Pro font: on or off', 'abtheme' ) ) {
            $fonts[] = 'Source+Sans+Pro:400,600,700,900';
        }

        /* translators: If there are characters in your language that are not supported by PT Serif, translate this to 'off'. Do not translate into your own language. */
        if ( 'off' !== _x( 'on', 'PT Serif font: on or off', 'abtheme' ) ) {
            $fonts[] = 'PT+Serif:400,700';
        }

        if ( $fonts ) {
            $fonts_url = add_query_arg( array(
                'family' => urlencode( implode( '|', $fonts ) ),
                'subset' => urlencode( $subsets ),
            ), 'https://fonts.googleapis.com/css' );
        }

        return $fonts_url;
    }
endif;

/**
 * Enqueue scripts and styles.
 */
function abtheme_scripts()
{
    $min = '';
    if (!defined('WP_DEBUG') || !WP_DEBUG) {
        $min = '.min';
    }
    $theme = wp_get_theme(get_template());

    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome' . $min . '.css', array(), '4.7.0', 'screen');
    wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.css', array(), $theme->get('Version'));
    wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css', array(), $theme->get('Version'));
    wp_enqueue_style('abtheme-theme', get_template_directory_uri() . '/assets/css/theme.css', array(), 'all');
    wp_enqueue_style('abtheme-menu', get_template_directory_uri() . '/assets/css/menu.css', array(), $theme->get('Version'));
    wp_enqueue_style('abtheme-style', get_stylesheet_uri());

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    $sticky_on = abtheme_get_opt('sticky_on', 0);
    if ($sticky_on == 1) {
        wp_enqueue_script('headroom', get_template_directory_uri() . '/assets/js/headroom.min.js', array('jquery'), $theme->get('Version'), true);
        wp_enqueue_script('abtheme-headroom', get_template_directory_uri() . '/assets/js/headroom.js', array('jquery'), $theme->get('Version'), true);
    }
    wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), $theme->get('Version'), true);
    wp_enqueue_script('magnific-popup', get_template_directory_uri() . '/assets/js/magnific-popup.min.js', array('jquery'), $theme->get('Version'), true);
    wp_enqueue_script('abtheme-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), $theme->get('Version'), true);
}

add_action('wp_enqueue_scripts', 'abtheme_scripts');

/* add editor styles */
function abtheme_add_editor_styles()
{
    add_editor_style('editor-style.css');
}

add_action('admin_init', 'abtheme_add_editor_styles');

/* add admin styles */
function abtheme_admin_style()
{
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
if (!class_exists('Abtheme_CSS_Generator')) {
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
 */

function abtheme_vc_after_init()
{
    require_once(get_template_directory() . '/vc_params/cms_custom_pagram_vc.php');

    // vc_remove_element("vc_button");
}

add_action('vc_after_init', 'abtheme_vc_after_init');

/**
 * Add new elements for VC
 */

function abtheme_vc_elements()
{
    if (class_exists('CmsShortCode')) {
        cms_require_folder('vc_elements', get_template_directory());
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
 * woo_hide_page_title
 *
 * Removes the "shop" title on the main shop page
 *
 * @access      public
 * @since       1.0
 * @return      void
 */
function woo_hide_page_title()
{
    return false;
}
add_filter('woocommerce_show_page_title', 'woo_hide_page_title');

/**
 * Add Cart icon and count to header if WC is active
 */
function abtheme_wc_cart_count() {

    if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

        $count = WC()->cart->cart_contents_count;
        $cart_url = wc_get_cart_url();
        ?>
        <a class="cartcontents tooltip" href="<?php echo esc_url($cart_url); ?>" title="<?php esc_html_e( 'View Cart' ); ?>">
            <i class="fa fa-shopping-cart"></i>
            <span class="cart-contents-count"><?php echo esc_html( $count ); ?></span>
        </a>
        <?php
    }

}

/**
 * Ensure cart contents update when products are added to the cart via AJAX
 */
function abtheme_header_add_to_cart_fragment( $fragments ) {

    ob_start();
    $count = WC()->cart->cart_contents_count;
    $cart_url = wc_get_cart_url();
    ?>
    <a class="cartcontents tooltip" href="<?php echo esc_url($cart_url); ?>" title="<?php esc_html_e( 'View Cart' ); ?>">
        <i class="fa fa-shopping-cart"></i>
        <span class="cart-contents-count"><?php echo esc_html( $count ); ?></span>
    </a>
    <?php

    $fragments['a.cartcontents'] = ob_get_clean();

    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'abtheme_header_add_to_cart_fragment' );

/**
 * Custom post types and args based on plugin.
 * require plugin
 */
/**
 * Custom post types and args based on plugin.
 * require plugin
 */
add_filter('cms_extra_post_types', 'abtheme_extra_post_types_func' );
function abtheme_extra_post_types_func($post_types)
{
    $post_types = array(
        'portfolio' => array(
            'status'     => true,
        ),
    );
    return $post_types;
}