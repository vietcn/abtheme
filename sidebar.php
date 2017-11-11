<?php
/**
 * The sidebar containing the main widget area
 *
 * @package Abtheme
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
    return;
}
?>

<div class="widgets">
    <?php dynamic_sidebar( 'sidebar-1' ); ?>
</div>
