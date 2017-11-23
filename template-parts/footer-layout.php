<?php
/**
 * Template part for displaying default footer layout
 */
?>
<footer id="colophon" class="site-footer footer-layout1">
    <div class="top-footer">
        <div class="container top-footer-container">
            <?php if (abtheme_get_opt( 'show_social', true )) { ?>
                <div id="footer-socials">
                    <?php get_template_part('template-parts/social');?>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="bottom-footer">
        <div class="container bottom-footer-container">
            <div class="site-info">
                <?php
                if (abtheme_get_opt( 'footer_copyright')) {
                    echo wp_kses_post(abtheme_get_opt( 'footer_copyright'));
                } else {
                    printf(esc_html__('&copy; %1$s %2$s - Theme by %3$s', 'abtheme'), date("Y"), get_bloginfo('name'), '<a href="' . esc_url('http://www.farost.com/', 'abtheme') . '">Farost</a>');
                }
                ?>
            </div><!-- .site-info -->
        </div>
    </div>
</footer><!-- #colophon -->