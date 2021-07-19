<?php
/* REMOVE HELP TABS */
add_filter( 'contextual_help', 'ranaay_remove_help_overview', 999, 3 );
function ranaay_remove_help_overview(){
	$screen = get_current_screen();
	$screen->remove_help_tab( 'overview' );
	$screen->remove_help_tab( 'help-navigation' );
	$screen->remove_help_tab( 'help-layout' );
	$screen->remove_help_tab( 'help-content' );
}
?>