<?php
/* ADD GST AFTER PRICE */
add_filter( 'woocommerce_get_price_html', 'ranaay_gst_message', 10, 2 );
function ranaay_gst_message( $price ) {
	$gst = ' (excl. GST)';
	return $price . $gst;
}
?>