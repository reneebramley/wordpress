<?php
/* REMOVE SCRIPT */
add_action('init','ranaay_remove_script');
function ranaay_remove_script(){
 wp_deregister_script( 'comment-reply' );
 }
 ?>