<?php
/**
 * The template for displaying all single posts
 *
 * @package Abtheme
 */

get_header();
$h_sidebar = 'no-sidebar';
$sidebar_pos = abtheme_get_opt( 'post_sidebar_pos', 'left' );
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
        </div>
    </div>
<?php
get_footer();