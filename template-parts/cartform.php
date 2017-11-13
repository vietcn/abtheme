<?php
/**
 * Cart Form
 */

echo '<div class="site-shopping-cart">';

if ( class_exists( 'WC_Widget_Cart' ) )
{
    the_widget( 'WC_Widget_Cart',
        array(
            'title'         => esc_html__( 'Cart', 'shopy' ),
            'hide_if_empty' => 0
        ),
        array(
            'before_widget' => '<section class="widget woocommerce widget_shopping_cart">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="screen-reader-text">',
            'after_title'   => '</h3>'
        )
    );
}

echo '</div>';