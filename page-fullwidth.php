<?php
/**
 * Template name: Full Width
 * The template for displaying all pages with left sidebar.
 *
 * @package Abtheme
 */

get_header();
?>
    <div class="container content-container">
        <div class="row content-row">
            <div id="primary" class="content-area">
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
        </div>
    </div>
<?php
get_footer();