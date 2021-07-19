<?php
/* MODIFY ORDER FORMS
https://rudrastyh.com/woocommerce/order-statuses.html */

// ADD HIDDEN STATUS
add_action( 'init', 'ranaay_hide_status' );
function ranaay_hide_status() {
	register_post_status( 'wc-ranaay-hidden', array(
		'label'		=> 'Hidden from Customer',
		'public'	=> false,
		'internal'	=> false,
		'protected' => false,
		'private'	=> false,
		'publicly_queryable' => false,
		'show_in_admin_all_list'    => true,
		'show_in_admin_status_list' => true,
		'label_count'	=> _n_noop( 'Hidden from Customer <span class="count">(%s)</span>', 'Hidden from Customer <span class="count">(%s)</span>' )
	) );
}

add_filter( 'wc_order_is_editable', 'wc_make_hidden_orders_editable', 10, 2 );
function wc_make_hidden_orders_editable( $is_editable, $order ) {
    if ( $order->get_status() == 'wc-ranaay-hidden' ) {
        $is_editable = true;
    }
    return $is_editable;
}

add_filter( 'wc_order_statuses', 'ranaay_add_status' );
function ranaay_add_status( $wc_statuses_arr ) {
	$wc_statuses_arr['wc-ranaay-hidden'] = 'Hidden from Customer';
	return $wc_statuses_arr;
}

 
// REARRANGE ORDER STATUSES
add_filter( 'wc_order_statuses', 'ranaay_change_statuses_order' );
function ranaay_change_statuses_order( $wc_statuses_arr ){
	$new_statuses_arr = array(
		'wc-ranaay-hidden' => $wc_statuses_arr['wc-ranaay-hidden'], // 1
		'wc-pending' => $wc_statuses_arr['wc-pending'], // 2
		'wc-processing' => $wc_statuses_arr['wc-processing'], // 3
		'wc-completed' => $wc_statuses_arr['wc-completed'], // 4
		'wc-cancelled' => $wc_statuses_arr['wc-cancelled'], // 5
		'wc-refunded' => $wc_statuses_arr['wc-refunded'], // 6
		'wc-failed' => $wc_statuses_arr['wc-failed'], // 7
		'wc-on-hold' => $wc_statuses_arr['wc-on-hold'] // 8
	);
	return $new_statuses_arr;
}

// CHANGE ORDER ITEM COST TO UNIT PRICE
add_action('woocommerce_admin_order_item_headers', 'ranaay_admin_order_item_cost');
function ranaay_admin_order_item_cost() { 
    echo '<script type="text/javascript">jQuery(document).ready(function($) {
$(\'th.item_cost.sortable\').replaceWith(\'<th>Unit Price</th>\'); 
});</script>';
}

// REMOVE SHIPPING METHOD FROM BACKEND
add_action('woocommerce_admin_order_item_headers', 'ranaay_admin_order_item_shipping');
function ranaay_admin_order_item_shipping() { 
    echo '<script type="text/javascript">jQuery(document).ready(function($) {
$(\'select.shipping_method\').remove(); 
});</script>';
}

?>