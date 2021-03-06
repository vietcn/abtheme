<?php

if ( is_front_page() && is_home() )
{
    return;
}

$titles = abtheme_get_page_titles();

ob_start();

if ( $titles['title'] )
{
    printf( '<h1 class="page-title">%s</h1>', wp_kses_post($titles['title']) );
}

if ( $titles['desc'] )
{
    printf( '<div class="page-desc">%s</div>', wp_kses_post( $titles['desc'] ) );
}

if ( is_singular( 'post' ) )
{
    abtheme_entry_meta();
}

if ( ( is_page() && get_post_meta( get_the_ID(), 'breadcrumb_on', true ) )
    || abtheme_get_opt( 'breadcrumb_on', true ) )
{
    abtheme_breadcrumb();
}

$titles_html = ob_get_clean();

if ( ! $titles_html )
{
    return;
}
?>
<div id="pagetitle" class="page-title page-title-layout1">
    <div class="container page-title-container">
        <?php printf( '<div class="page-title-content">%s</div>', wp_kses_post($titles_html)); ?>
    </div>
</div>