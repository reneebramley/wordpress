<?php
/* ADD BUY PRICE TO ORDER FORM ITEMS */
add_action('woocommerce_admin_order_item_headers', 'ranaay_admin_order_item_headers');
function ranaay_admin_order_item_headers() {
    // set the column name
    $column_buy = 'Buy Price';
	
    // display the column name
    echo '<th>' . $column_buy . '</th>';
}

// ADD BUY VALUE TO ORDER ITEM
add_action('woocommerce_admin_order_item_values', 'ranaay_admin_order_item_values', 10, 3);
function ranaay_admin_order_item_values($_product, $item, $item_id = null) {
    // get the post meta value from the associated product
    $buy_value = get_post_meta($_product->post->ID, '_buy_price', true);
	
    // display the value
    echo '<td>$'. $buy_value . '</td>';
}
?>