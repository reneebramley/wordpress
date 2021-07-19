<?php
/* ADD PREFIX TO ORDERS */
add_filter( 'woocommerce_order_number', 'change_woocommerce_order_number' );
function change_woocommerce_order_number( $order_id ) {
    $prefix = 'CT';
    $suffix = '';
    $new_order_id = $prefix . $order_id . $suffix;
    return $new_order_id;
}
?>