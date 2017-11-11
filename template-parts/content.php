<?php
/**
 * Template part for displaying posts in single view.
 *
 * @package Abtheme
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-hentry' ); ?>>
    <?php if ( has_post_thumbnail() ) : ?>
    <div class="entry-featured">
        <?php the_post_thumbnail(); ?>
    </div>
    <?php endif; ?>

    <div class="entry-content">
        <?php
            the_content();
            abtheme_entry_link_pages();
        ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php abtheme_entry_footer(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
