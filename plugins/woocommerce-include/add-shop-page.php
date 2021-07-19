<?php
/* ADDING SKU TO SHOP PAGE */
add_action( 'woocommerce_after_shop_loop_item_title', 'ranaay_custom_shop_item', 3);
function ranaay_custom_shop_item() {
	global $post, $product;
	
	// PRODUCT SKU
	echo '<p style="color:#777;padding-left:5%;">SKU: '.$product->get_sku().'</p>';
}
?>