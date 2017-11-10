<?php
/**
 * Template part for displaying page content in page.php
 *
 * @package eThemeFramework
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-content">
        <?php
            the_content();
            ethemeframework_entry_link_pages();
        ?>
    </div><!-- .entry-content -->

    <?php if ( get_edit_post_link() ) : ?>
        <footer class="entry-footer">
            <?php ethemeframework_entry_edit_link(); ?>
        </footer><!-- .entry-footer -->
    <?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
