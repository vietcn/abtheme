<?php
/**
 * The template for displaying all single posts
 *
 * @package eThemeFramework
 */
$sidebar_pos = ethemeframework_get_opt( 'post_sidebar_pos', 'right' );
get_header();
?>
<div class="container content-container">
    <div class="row content-row">
        <div id="primary"<?php ethemeframework_primary_class( $sidebar_pos, 'content-area' ); ?>>
            <main id="main" class="site-main">
            <?php

                while ( have_posts() )
                {
                    the_post();
                    get_template_part( 'template-parts/content', get_post_type() );
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
        <aside id="secondary"<?php ethemeframework_secondary_class( $sidebar_pos, 'widget-area' ); ?>>
            <?php get_sidebar(); ?>
        </aside>
        <?php endif; ?>
    </div>
</div>
<?php
get_footer();
