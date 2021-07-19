<?php
/* REMOVE IMAGE SIZES */
add_action('init', 'ranaay_remove_plugin_image_sizes');
function ranaay_remove_plugin_image_sizes() {
	remove_image_size('image-name');
}
?>