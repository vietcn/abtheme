<?php

if ( is_front_page() && is_home() )
{
    return;
}

$titles = abtheme_get_page_titles();

ob_start();

if ( $titles['title'] )
{
    printf( '<h1 class="page-title">%s</h1>', esc_attr($titles['title']) );
}

if ( $titles['desc'] )
{
    printf( '<div class="page-desc">%s</div>', esc_attr(wpautop( $titles['desc'] )) );
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
<div id="pagetitle" class="page-title page-title-layout2">
    <div class="container page-title-container">
        <div class="row">
            <?php
                printf( '<div class="page-title-titles col-md-6">%s</div>', wp_kses($titles_html,wp_kses_allowed_html()));
                echo '<div class="page-title-breadcrumb col-md-6">';
                    abtheme_breadcrumb();
                echo '</div>';
            ?>
        </div>
    </div>
</div>