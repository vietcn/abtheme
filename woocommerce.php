<?php
/**
 * Custom Woocommerce shop page.
 */
get_header();
$h_sidebar = 'no-sidebar';
$sidebar_pos = abtheme_get_opt( 'sidebar_shop', 'right' );
if($sidebar_pos != 'none') {
    $h_sidebar = 'has-sidebar';
}
?>
    <div class="container content-container">
        <div class="row content-row">
            <?php if($sidebar_pos != 'none') { ?>
                <aside id="secondary" class="widget-area widget-<?php echo esc_attr($h_sidebar); ?> pull-<?php echo esc_attr($sidebar_pos); ?>">
                    <?php get_sidebar(); ?>
                </aside>
            <?php }?>
            <div id="primary" class="content-area content-<?php echo esc_attr($h_sidebar); ?> pull-<?php echo esc_attr($sidebar_pos); ?>">
                <main id="main" class="site-main" role="main">
                    <?php woocommerce_content(); ?>
                </main><!-- #main -->
            </div><!-- #primary -->
        </div>
    </div>
<?php
get_footer();