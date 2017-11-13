<?php
/**
 * The template for displaying the footer.
 * Contains the closing of the #content div and all content after.
 *
 * @package Abtheme
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
                    <?php
                    if (abtheme_get_opt( 'footer_copyright')) {
                        printf(esc_html__('&copy; %1$s %2$s - Theme by %3$s', 'abtheme'), date("Y"), get_bloginfo('name'), '<a href="' . esc_url('http://www.farost.com/', 'abtheme') . '">Farost</a>');
                    } else {
                        echo wp_kses_post(abtheme_get_opt( 'footer_copyright'));
                    }
                    ?>
                </div><!-- .site-info -->
            </div>
        </div>
    </footer><!-- #colophon -->

    <?php if ( abtheme_get_opt( 'back_totop_on', true ) ) : ?>
    <button class="backtotop" data-efelement="totopbutton"><span class="screen-reader-text"><?php
        esc_html_e( 'Back to top', 'abtheme' );
    ?></span><i class="fa fa-angle-up"></i></button>
    <?php endif; ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
