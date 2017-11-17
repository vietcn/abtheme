<?php
/**
 * The template for displaying all single posts
 *
 * @package Abtheme
 */

get_header();

if ( is_singular('product')  ) :
    $sidebar_pos = abtheme_get_opt( 'sidebar_shop', 'right' );
else :
    $sidebar_pos = abtheme_get_opt( 'post_sidebar_pos', 'right' );
endif;
?>
<div class="container content-container">
    <div class="row content-row">
        <div id="primary" <?php abtheme_primary_class( $sidebar_pos, 'content-area' ); ?>>
            <main id="main" class="site-main">
            <?php

                while ( have_posts() )
                {
                    the_post();
                    get_template_part( 'template-parts/content-single' );
                    the_post_navigation();

                    // If comments are open or we have at least one comment, load up the comment template.
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
