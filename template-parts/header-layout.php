<?php
/**
 * Template part for displaying default header layout
 */
$sticky_on = abtheme_get_opt( 'sticky_on', true );
?>
<header id="masthead" class="site-header">
    <div class="header-top"></div>
    <div id="headroom" class="main-header">
        <div class="container main-header-container">
            <div class="site-branding">
                <?php get_template_part( 'template-parts/header-branding' ); ?>
            </div>
            <nav id="site-navigation" class="main-navigation" aria-expanded="false" data-efelement="ariactarget">
                <?php get_template_part( 'template-parts/header-menu' ); ?>
            </nav>

            <div id="header-cart">
                <div class="menu-right pull-right">
                    <?php if ( class_exists( 'WC_Widget_Cart' ) ): ?>
                        <span class="cat-icon">
                            <?php //matilda_get_cart_icon(); ?>
                            </span>
                    <?php endif; ?>
                </div>
                <div class="top-socials pull-right">
                    <?php get_template_part('template-parts/social');?>
                </div>
            </div>

            <?php if (abtheme_get_opt( 'search_button', true )) { ?>
                <div id="header-search">
                    <a href="#" class="search-toggle"><i class="fa fa-search"></i></a>
                    <div class="searchform">
                        <?php get_search_form(); ?>
                    </div>
                </div>
            <?php } ?>
            <?php if(class_exists( 'WooCommerce' )) {?>
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