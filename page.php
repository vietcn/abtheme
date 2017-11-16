<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @package Abtheme
 */

get_header();

if(( class_exists( 'WooCommerce' ) && (is_cart() || is_checkout()) )) {
    $sidebar_pos = 'none';
} else {
    $sidebar_pos = abtheme_get_opt( 'sidebar_page', 'none' );
}
?>
<div class="container content-container">
    <div class="row content-row">
        <div id="primary" <?php abtheme_primary_class( $sidebar_pos, 'content-area' ); ?>>
            <main id="main" class="site-main">
                <?php

                    while ( have_posts() )
                    {
                        the_post();

                        get_template_part( 'template-parts/content', 'page' );

                        if ( comments_open() || get_comments_number() )
                        {
                            comments_template();
                        }
                    }

                ?>
            </main><!-- #main -->
        </div><!-- #primary -->


            <?php if ( 'left' == $sidebar_pos || 'right' == $sidebar_pos ) : ?>
                <aside id="secondary" <?php abtheme_secondary_class( $sidebar_pos, 'widget-area' ); ?>>
                    <?php get_sidebar(); ?>
                </aside>
        <?php endif; ?>
    </div>
</div>
<?php
get_footer();