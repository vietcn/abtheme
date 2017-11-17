<?php
/**
 * Template part for displaying posts in loop
 *
 * @package Abtheme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-hentry' ); ?>>

    <div class="entry-featured">
        <?php if(has_post_format('gallery')) : ?>

            <?php
            if (has_post_thumbnail()) {
                echo '<div class="post-gallery abtheme-post">';
                the_post_thumbnail('large');
                echo '</div>';
            }
            ?>

        <?php elseif(has_post_format('quote')) : ?>

            <?php
            if (has_post_thumbnail()) {
                echo '<div class="post-quote abtheme-post">';
                the_post_thumbnail('large');
                echo '</div>';
            }
            ?>

        <?php elseif(has_post_format('link')) : ?>

            <?php
            if (has_post_thumbnail()) {
                echo '<div class="post-link abtheme-post">';
                the_post_thumbnail('large');
                echo '</div>';
            }
            ?>

        <?php elseif(has_post_format('video')) : ?>

            <?php
            if (has_post_thumbnail()) {
                echo '<div class="post-video abtheme-post">';
                the_post_thumbnail('large');
                echo '</div>';
            }
            ?>

        <?php elseif(has_post_format('audio')) : ?>

            <?php
            if (has_post_thumbnail()) {
                echo '<div class="post-audio abtheme-post">';
                the_post_thumbnail('large');
                echo '</div>';
            }
            ?>

        <?php else : ?>

            <?php
            if (has_post_thumbnail()) {
                echo '<div class="post-image abtheme-post">';
                the_post_thumbnail('large');
                echo '</div>';
            }
            ?>

        <?php endif; ?>
    </div><!-- .entry-featured -->

    <header class="entry-header">
        <?php
            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

            if ( 'post' === get_post_type() )
            {
                abtheme_entry_meta();
            }
        ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php the_content(); ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php abtheme_entry_footer(); ?>
    </footer><!-- .entry-footer -->

</article><!-- #post -->