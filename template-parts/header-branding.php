<?php
/**
 * Template part for displaying site branding
 */

$logo     = abtheme_get_opt( 'logo', array( 'url' => '', 'id' => '' ) );
$logo_url = '';

if ( $logo['id'] )
{
    $logo_url = wp_get_attachment_url( $logo['id'] );
}

if ( ! $logo_url )
{
    $logo_url = $logo['url'];
}

$sticky_logo     = abtheme_get_opt( 'logo_sticky', array( 'url' => '', 'id' => '' ) );
$sticky_logo_url = '';

if ( $sticky_logo['id'] )
{
    $sticky_logo_url = wp_get_attachment_url( $sticky_logo['id'] );
}

if ( ! $sticky_logo_url )
{
    $sticky_logo_url = $sticky_logo['url'];
}

if ( $logo_url )
{
    if ( is_front_page() && is_home() )
    {
        printf(
            '<h1 class="site-title" style="display: none;">%2$s</h1><a class="site-logo" href="%1$s" title="%2$s" rel="home"><img src="%3$s" alt="logo"/></a>',
            esc_url( home_url( '/' ) ),
            esc_attr( get_bloginfo( 'name' ) ),
            esc_url( $logo_url )
        );
    }
    else
    {
        printf(
            '<a class="site-logo" href="%1$s" title="%2$s" rel="home"><img src="%3$s" alt="logo"/></a>',
            esc_url( home_url( '/' ) ),
            esc_attr( get_bloginfo( 'name' ) ),
            esc_url( $logo_url )
        );
    }
}
else
{
    if ( is_front_page() && is_home() )
    {
        printf(
            '<h1 class="site-title"><a href="%1$s" rel="home">%2$s</a></h1>',
            esc_url( home_url( '/' ) ),
            esc_html( get_bloginfo( 'name' ) )
        );
    }
    else
    {
        printf(
            '<p class="site-title"><a href="%1$s" rel="home">%2$s</a></p>',
            esc_url( home_url( '/' ) ),
            esc_html( get_bloginfo( 'name' ) )
        );
    }

    $description = get_bloginfo( 'description', 'display' );
    if ( $description || is_customize_preview() )
    {
        printf( '<p class="site-description">%s</p>', esc_attr($description) );
    }
}

if ( $sticky_logo_url )
{
    printf(
        '<a class="site-logo-sticky" href="%1$s" title="%2$s" rel="home"><img src="%3$s" alt="logo"/></a>',
        esc_url( home_url( '/' ) ),
        esc_attr( get_bloginfo( 'name' ) ),
        esc_url( $sticky_logo_url )
    );
}
