<?php
/**
 * Search Form
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url( '/' )); ?>">
	<div class="searchform-wrap">
        <input type="text" placeholder="<?php esc_html_e('Search on the site', 'abtheme'); ?>" name="s" class="search-field" />
        <button type="submit" class="btn btn-primary search-submit"><i class="fa fa-search"></i></button>
    </div>
</form>