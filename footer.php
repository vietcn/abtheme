<?php
/**
 * The template for displaying the footer.
 * Contains the closing of the #content div and all content after.
 *
 * @package eThemeFramework
 */

?>

    </div><!-- #content -->

    <footer id="colophon" class="site-footer">
        <div class="top-footer">
            <div class="container top-footer-container">
            </div>
        </div>
        <div class="bottom-footer">
            <div class="container bottom-footer-container">
                <div class="site-info">
                    <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'ethemeframework' ) ); ?>"><?php
                        /* translators: %s: CMS name, i.e. WordPress. */
                        printf( esc_html__( 'Proudly powered by %s', 'ethemeframework' ), 'WordPress' );
                    ?></a>
                    <span class="sep"> | </span>
                    <?php
                        /* translators: 1: Theme name, 2: Theme author. */
                        printf( esc_html__( 'Theme: %1$s by %2$s.', 'ethemeframework' ), 'ethemeframework', '<a href="https://stevngo.com">Stev Ngo</a>' );
                    ?>
                </div><!-- .site-info -->
            </div>
        </div>
    </footer><!-- #colophon -->
    <?php if ( ethemeframework_get_opt( 'back_totop_on', true ) ) : ?>
    <button class="backtotop" data-efelement="totopbutton"><span class="screen-reader-text"><?php
        esc_html_e( 'Back to top', 'ethemeframework' );
    ?></span><i class="fa fa-angle-up"></i></button>
    <?php endif; ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
