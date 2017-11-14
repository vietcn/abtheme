<?php
/**
 * The sidebar containing the main widget area
 *
 * @package Abtheme
 */
?>

<?php //if ( is_active_sidebar( 'sidebar' ) ) : ?>
    <aside id="sidebar" class="site-sidebar">
        <?php
        if ( is_page() ) :
            dynamic_sidebar( 'sidebar-page' );
        elseif ( class_exists( 'WooCommerce' ) && (is_shop() || is_product()) ) :
            dynamic_sidebar( 'sidebar-shop' );
        else :
            dynamic_sidebar( 'sidebar-1' );
        endif;
        ?>
    </aside>
<?php //endif; ?>