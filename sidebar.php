<?php
/**
 * The sidebar containing the main widget area
 *
 * @package eThemeFramework
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
    return;
}
?>

<div class="widgets">
    <?php dynamic_sidebar( 'sidebar-1' ); ?>
</div>
