<?php
/**
 * Search Form
 */
?>

<form role="search" method="get" class="searchform" action="<?php echo home_url( '/' ); ?>">
	<div class="searchform-wrap">
        <input type="text" placeholder="<?php esc_html_e('Search on the site', 'matilda'); ?>" name="s" class="search-field" />
        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
    </div>
</form>