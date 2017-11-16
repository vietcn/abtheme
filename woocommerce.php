<?php
/**
 * Custom Woocommerce shop page.
 */
get_header();
$sidebar_pos = abtheme_get_opt( 'sidebar_shop', 'none' );
?>
    <div class="container content-container">
        <div class="row content-row">
            <div id="primary" <?php abtheme_primary_class( $sidebar_pos, 'content-area' ); ?>>
                <main id="main" class="site-main" role="main">
                        <?php woocommerce_content(); ?>
                </main><!-- #main -->
            </div><!-- #primary -->

            <?php if ( 'left' == $sidebar_pos || 'right' == $sidebar_pos ) : ?>
                <aside id="secondary"<?php abtheme_secondary_class( $sidebar_pos, 'widget-area' ); ?>>
                    <?php get_sidebar(); ?>
                </aside>
            <?php endif; ?>
        </div>
    </div>
<?php
get_footer();