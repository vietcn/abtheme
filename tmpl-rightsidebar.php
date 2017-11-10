<?php
/**
 * Template name: Right Sidebar
 * The template for displaying all pages with right sidebar.
 *
 * @package eThemeFramework
 */

$sidebar_pos = 'right';
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

                        get_template_part( 'template-parts/content', 'page' );

                        if ( comments_open() || get_comments_number() )
                        {
                            comments_template();
                        }
                    }

                ?>
            </main><!-- #main -->
        </div><!-- #primary -->
        <aside id="secondary"<?php ethemeframework_secondary_class( $sidebar_pos, 'widget-area' ); ?>>
            <?php get_sidebar(); ?>
        </aside>
    </div>
</div>
<?php
get_footer();
