<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Abtheme
 */

/**
 * Setup default image sizes after the theme has been activated
 */
function abtheme_after_setup_theme()
{

}
add_action( 'after_setup_theme', 'abtheme_after_setup_theme' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function abtheme_body_classes( $classes )
{

	if ( is_front_page() && is_home() ) {
	// Default homepage

	} elseif ( is_front_page()){
	//Static homepage

	} elseif ( is_home()){

	//Blog page

	} else {

	//everything else
	}
	
    // Adds a class of group-blog to blogs with more than 1 published author.
    if (is_multi_author()) {
        $classes[] = 'group-blog';
    }

    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    if (abtheme_get_opt( 'site_boxed', false )) {
        $classes[] = 'site-boxed';
    }

    if ( class_exists('WPBakeryVisualComposerAbstract') ) {
        $classes[] = 'visual-composer';
    }

    return $classes;
}
add_filter( 'body_class', 'abtheme_body_classes' );


/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function abtheme_pingback_header()
{
    if ( is_singular() && pings_open() )
    {
        echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
    }
}
add_action( 'wp_head', 'abtheme_pingback_header' );
