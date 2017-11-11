<?php
/**
 * Template part for displaying posts in loop
 *
 * @package eThemeFramework
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'loop-hentry' ); ?>>
    <?php if ( has_post_thumbnail() ) : ?>
    <div class="entry-featured">
        <?php the_post_thumbnail(); ?>
    </div><!-- .entry-featured -->
    <?php endif; ?>
    <header class="entry-header">
        <?php
            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

            if ( 'post' === get_post_type() )
            {
                ethemeframework_entry_meta();
            }
        ?>
    </header><!-- .entry-header -->

    <div class="entry-summary">
        <?php
            ethemeframework_entry_excerpt();
            ethemeframework_entry_read_more();
        ?>
    </div><!-- .entry-summary -->

    <footer class="entry-footer">
        <?php ethemeframework_entry_footer(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
<hr/>