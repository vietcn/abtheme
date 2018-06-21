<?php
/**
 * Template part for displaying default header layout
 */
$sticky_on = abtheme_get_opt( 'sticky_on', 0 );
?>
<header id="masthead" class="site-header header-layout1">
    <div class="header-top"></div>
    <div id="headroom" class="main-header">
        <div class="container main-header-container">
            <?php if (abtheme_get_opt( 'show_social', true )) { ?>
            <div id="header-socials">
                <?php get_template_part('template-parts/social');?>
            </div>
            <?php } ?>

            <div class="site-branding">
                <?php get_template_part( 'template-parts/header-branding' ); ?>
            </div>
            <nav id="site-navigation" class="main-navigation">
                <?php get_template_part( 'template-parts/header-menu' ); ?>
            </nav>
            <div id="main-menu-mobile">
                <span class="btn-nav-mobile open-menu">
                    <span></span>
                </span>
            </div>

            <?php if (abtheme_get_opt( 'show_search', true )) { ?>
                <div id="header-search">
                    <a href="#" class="search-toggle"><i class="fa fa-search"></i></a>
                    <div class="searchform">
                        <?php get_search_form(); ?>
                    </div>
                </div>
            <?php } ?>
            <?php if(class_exists( 'WooCommerce' ) && abtheme_get_opt( 'show_cart', true )) {?>
            <div id="header-cart">
                <a href="#" class="cart-toggle"><i class="fa fa-shopping-bag"></i></a>
                <div class="cartform">
                    <?php get_template_part( 'template-parts/cartform' ); ?>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</header>