<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package Abtheme
 */

get_header();
$h_sidebar = 'no-sidebar';
$sidebar_pos = abtheme_get_opt( 'archive_sidebar_pos', 'right' );
if( is_active_sidebar( 'sidebar-1' ) && ($sidebar_pos != 'none') ) {
    $h_sidebar = 'has-sidebar';
}
?>
    <div class="container content-container">
        <div class="row content-row">
            <?php if( is_active_sidebar( 'sidebar-1' ) && ($sidebar_pos != 'none') ) { ?>
                <aside id="secondary" class="widget-area widget-<?php echo esc_attr($h_sidebar); ?> pull-<?php echo esc_attr($sidebar_pos); ?>">
                    <?php get_sidebar(); ?>
                </aside>
            <?php }?>
            <div id="primary" class="content-area content-<?php echo esc_attr($h_sidebar); ?> pull-<?php echo esc_attr($sidebar_pos); ?>">
                <main id="main" class="site-main">
                    <?php

                    if ( have_posts() )
                    {
                        while ( have_posts() )
                        {
                            the_post();

                            /*
                             * Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called loop-post-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
                            get_template_part( 'template-parts/content' );
                        }

                        abtheme_posts_navigation();
                    }
                    else
                    {
                        get_template_part( 'template-parts/content', 'none' );
                    }

                    ?>
                </main><!-- #main -->
            </div><!-- #primary -->
        </div>
    </div>
<?php
get_footer();