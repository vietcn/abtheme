<?php
/**
 * The header for our theme.
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package Abtheme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'abtheme' ); ?></a>
    <?php
        $header_layout = abtheme_get_opt( 'header_layout', '1' );
        if ( is_page() )
        {
            $page_header_layout = get_post_meta( get_the_ID(), '_header_layout', true );
            if ( $page_header_layout !== '0' )
            {
                $header_layout = $page_header_layout;
            }
        }
        get_template_part( 'template-parts/header-layout', $header_layout );

        $pheader_layout = abtheme_get_opt( 'pheader_layout', '1' );

        if ( is_page() )
        {
            $page_pheader_layout = get_post_meta( get_the_ID(), '_pheader_layout', true );
            if ( $page_pheader_layout !== '0' )
            {
                $pheader_layout = $page_pheader_layout;
            }
        }
        get_template_part( 'template-parts/page-header', $pheader_layout );
    ?>
    <div id="content" class="site-content">
