<?php
/**
 * Template name: Right Sidebar
 * The template for displaying all pages with right sidebar.
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

            <aside id="secondary" class="widget-area widget-has-sidebar pull-right">
                <?php get_sidebar(); ?>
            </aside>
        </div>
    </div>
<?php
get_footer();