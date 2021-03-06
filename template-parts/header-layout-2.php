<?php
/**
 * Template part for displaying header layout 2.
 */
?>
<header id="masthead" class="site-header header-layout2">
    <div id="headroom">
        <nav id="site-navigation" class="main-navigation">
            <button class="menu-toggle" aria-controls="mastmenu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'abtheme' ); ?></button>
            <?php get_template_part( 'template-parts/header-menu' ); ?>
        </nav>
    </div>

    <div class="site-branding">
        <?php get_template_part( 'template-parts/header-branding' ); ?>
    </div>
</header>