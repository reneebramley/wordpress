<?php

function admin_order_note( $order ) {
    echo '<p data-sort="float" style="text-align: right;">Add GST after products.</p>';
};
add_action( 'woocommerce_admin_order_totals_after_tax', 'admin_order_note' );
?>