<?php
/**
 * Abtheme
 */
?>
<div class="social-icon">
    <?php
    if(abtheme_get_opt('social_facebook_url')) { ?>
        <a class="tooltip" title ="Facebook" href="<?php echo esc_url(abtheme_get_opt('social_facebook_url')); ?>" target="_blank">
            <i class="fa fa-facebook"></i>
        </a>
    <?php }
    if(abtheme_get_opt('social_twitter_url')) { ?>
        <a class="tooltip" title ="Twitter" href="<?php echo esc_url(abtheme_get_opt('social_twitter_url')); ?>" target="_blank">
            <i class="fa fa-twitter"></i>
        </a>
    <?php }
    if(abtheme_get_opt('social_inkedin_url')) { ?>
        <a class="tooltip" title ="Linkedin" href="<?php echo esc_url(abtheme_get_opt('social_inkedin_url')); ?>" target="_blank">
            <i class="fa fa-linkedin"></i>
        </a>
    <?php }
    if(abtheme_get_opt('social_instagram_url')) { ?>
        <a class="tooltip" title ="Instagram" href="<?php echo esc_url(abtheme_get_opt('social_instagram_url')); ?>" target="_blank">
            <i class="fa fa-instagram"></i>
        </a>
    <?php }
    if(abtheme_get_opt('social_google_url')) { ?>
        <a class="tooltip" title ="Google plus" href="<?php echo esc_url(abtheme_get_opt('social_google_url')); ?>" target="_blank">
            <i class="fa fa-google-plus"></i>
        </a>
    <?php }
    if(abtheme_get_opt('social_pinterest_url')) { ?>
        <a class="tooltip" title ="Pinterest" href="<?php echo esc_url(abtheme_get_opt('social_pinterest_url')); ?>" target="_blank">
            <i class="fa fa-pinterest"></i>
        </a>
    <?php }
    if(abtheme_get_opt('social_skype_url')) { ?>
        <a class="tooltip" title ="Skype" href="<?php echo esc_url(abtheme_get_opt('social_skype_url')); ?>" target="_blank">
            <i class="fa fa-heart"></i>
        </a>
    <?php }
    if(abtheme_get_opt('social_vimeo_url')) { ?>
        <a class="tooltip" title ="Vimeo" href="http://<?php echo esc_url(abtheme_get_opt('social_vimeo_url')); ?>" target="_blank">
            <i class="fa fa-tumblr"></i>
        </a>
    <?php }
    if(abtheme_get_opt('social_youtube_url')) { ?>
        <a class="tooltip" title ="Youtube" href="<?php echo esc_url(abtheme_get_opt('social_youtube_url')); ?>" target="_blank">
            <i class="fa fa-youtube"></i>
        </a>
    <?php }
    if(abtheme_get_opt('social_yelp_url')) { ?>
        <a class="tooltip" title ="Yelp" href="<?php echo esc_url(abtheme_get_opt('social_yelp_url')); ?>" target="_blank">
            <i class="fa fa-yelp"></i>
        </a>
    <?php }
    if(abtheme_get_opt('social_tumblr_url')) { ?>
        <a class="tooltip" title ="Tumblr" href="<?php echo esc_url(abtheme_get_opt('social_tumblr_url')); ?>" target="_blank">
            <i class="fa fa-tumblr"></i>
        </a>
    <?php }
    if(abtheme_get_opt('social_tripadvisor_url')) { ?>
        <a class="tooltip" title ="Tripadvisor" href="<?php echo esc_url(abtheme_get_opt('social_tripadvisor_url')); ?>" target="_blank">
            <i class="fa fa-tripadvisor"></i>
        </a>
    <?php } ?>
</div>