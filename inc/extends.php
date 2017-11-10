<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package eThemeFramework
 */

/**
 * Setup default image sizes after the theme has been activated
 */
function ethemeframework_after_setup_theme()
{

}
add_action( 'after_setup_theme', 'ethemeframework_after_setup_theme' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function ethemeframework_body_classes( $classes )
{
    // Adds a class of hfeed to non-singular pages.
    if ( ! is_singular() )
    {
        $classes[] = 'hfeed';
    }

    return $classes;
}
add_filter( 'body_class', 'ethemeframework_body_classes' );


/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function ethemeframework_pingback_header()
{
    if ( is_singular() && pings_open() )
    {
        echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
    }
}
add_action( 'wp_head', 'ethemeframework_pingback_header' );
