<?php
/* REMOVE PASSWORD STRENGTH */
function ranaay_remove_password_strength() {
	if ( wp_script_is( 'wc-password-strength-meter', 'enqueued' ) ) {
		wp_dequeue_script( 'wc-password-strength-meter' );
	}
}
add_action( 'wp_print_scripts', 'ranaay_remove_password_strength', 100 );
?>