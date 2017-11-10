<?php

if ( is_front_page() && is_home() )
{
    return;
}

$titles = abtheme_get_page_titles();

ob_start();

if ( $titles['title'] )
{
    printf( '<h1 class="page-title">%s</h1>', $titles['title'] );
}

if ( $titles['desc'] )
{
    printf( '<div class="page-desc">%s</div>', wpautop( $titles['desc'] ) );
}

if ( is_singular( 'post' ) )
{
    abtheme_entry_meta();
}

if ( ( is_page() && get_post_meta( get_the_ID(), '_breadcrumb_on', true ) )
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
<div id="pagehead" class="page-header">
    <div class="container page-header-container">
        <?php printf( '<div class="page-header-content">%s</div>', $titles_html ); ?>
    </div>
</div>