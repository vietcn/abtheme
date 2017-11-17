<?php
/**
 * The template for displaying the footer.
 * Contains the closing of the #content div and all content after.
 *
 * @package Abtheme
 */

?>

    </div><!-- #content -->

    <?php
    $footer_layout = abtheme_get_opt( 'footer_layout', '1' );
    if ( is_page() )
    {
        $page_footer_layout = get_post_meta( get_the_ID(), '_footer_layout', true );
        if ( $page_footer_layout !== '0' )
        {
            $footer_layout = $page_footer_layout;
        }
    }
    get_template_part( 'template-parts/footer-layout', $footer_layout );
    ?>

    <?php if ( abtheme_get_opt( 'back_totop_on', true ) ) : ?>
    <button class="backtotop" data-efelement="totopbutton"><span class="screen-reader-text"><?php
        esc_html_e( 'Back to top', 'abtheme' );
    ?></span><i class="fa fa-angle-up"></i></button>
    <?php endif; ?>

</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>
