<?php
/**
 * Template part for displaying default header layout
 */
$sticky_on = abtheme_get_opt( 'sticky_on', true );
?>
<header id="masthead" class="site-header">
    <div class="header-top"></div>
    <div id="headroom" class="main-header" <?php echo ( $sticky_on ? ' data-efelement="stickyheader"' : '' ); ?>>
        <div class="container main-header-container">
            <div class="site-branding">
                <?php get_template_part( 'template-parts/header-branding' ); ?>
            </div>
            <nav id="site-navigation" class="main-navigation" aria-expanded="false" data-efelement="ariactarget">
                <?php get_template_part( 'template-parts/header-menu' ); ?>
            </nav>
            <nav class="extra-navigation">
                <button class="menu-toggle" aria-controls="site-navigation" aria-expanded="false" data-efelement="ariac"><?php
                    printf( '<span class="screen-reader-text">%s</span>', esc_html__( 'Primary Menu', 'abtheme' ) );
                    echo '<span class="menu-toggle-icon"></span>';
                ?></button>
            </nav>
        </div>
    </div>
</header>