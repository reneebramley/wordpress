<?php
/* REMOVE WORDPRESS ICONS ON ADMIN BAR */
add_action( 'admin_bar_menu', 'ranaay_remove_wp_links', 999 );
function ranaay_remove_wp_links( $wp_admin_bar ) {
	$wp_admin_bar->remove_node( 'wp-logo' );
        $wp_admin_bar->remove_node( 'comments' );
	$wp_admin_bar->remove_node( 'new-content' );
}
?>