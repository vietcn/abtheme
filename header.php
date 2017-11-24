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
    <?php if (abtheme_get_opt( 'show_page_loading', false )) { ?>
        <div class="loader"></div>
    <?php } ?>
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'abtheme' ); ?></a>
    <?php
        $header_layout = abtheme_get_opt( 'header_layout', '1' );
        if ( is_page() )
        {
            $page_header_layout = abtheme_get_page_opt('header_layout');
            if ( $page_header_layout !== '0' )
            {
                $header_layout = $page_header_layout;
            }
        }
        get_template_part( 'template-parts/header-layout', $header_layout );

        $ptitle_layout = abtheme_get_opt( 'ptitle_layout', '1' );

        if ( is_page() )
        {
            $page_ptitle_layout = abtheme_get_page_opt('ptitle_layout');
            if ( $page_ptitle_layout !== '0' )
            {
                $ptitle_layout = $page_ptitle_layout;
            }
        }
        get_template_part( 'template-parts/page-title', $ptitle_layout );
    ?>
    <div id="content" class="site-content">
