<?php
/**
 * Template name: Left Sidebar
 * The template for displaying all pages with left sidebar.
 *
 * @package Abtheme
 */

get_header();
?>
    <div class="container content-container">
        <div class="row content-row">
            <div id="primary" class="content-area content-has-sidebar pull-left">
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
                <aside id="secondary" class="widget-area widget-has-sidebar pull-left">
                    <?php get_sidebar(); ?>
                </aside>
            <?php endif; ?>
        </div>
    </div>
<?php
get_footer();