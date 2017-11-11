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

$titles_html = ob_get_clean();

if ( ! $titles_html )
{
    return;
}
?>
<div id="pagehead" class="page-header page-header-2">
    <div class="container page-header-container">
        <div class="row">
            <?php
                printf( '<div class="page-header-titles col-md-6">%s</div>', $titles_html );
                echo '<div class="page-header-breadcrumb col-md-6">';
                abtheme_breadcrumb();
                echo '</div>';
            ?>
        </div>
    </div>
</div>