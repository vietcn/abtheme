<?php
/**
 * The sidebar containing the main widget area
 *
 * @package Abtheme
 */
?>

<aside id="sidebar" class="site-sidebar">
    <?php
    if ( is_page() ) {
        if( !(class_exists( 'WooCommerce' ) && (is_cart() || is_checkout())) ){
            dynamic_sidebar( 'sidebar-page' );
        }
    } elseif ( class_exists( 'WooCommerce' ) && (is_shop() || is_product()) ) {
        dynamic_sidebar( 'sidebar-shop' );
    } else {
        dynamic_sidebar( 'sidebar-1' );
    }
    ?>
</aside>