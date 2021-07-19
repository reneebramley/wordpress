<?php
/* ADD TO SINGLE PRODUCT PAGES
http://www.increativeweb.com/woocommerce-products-custom-fields
https://www.ibenic.com/how-to-add-woocommerce-custom-product-fields/ */

// ADD BUY PRICE
add_action( 'woocommerce_product_options_pricing', 'ranaay_add_buy_price' );
function ranaay_add_buy_price() {
 global $woocommerce, $post;

woocommerce_wp_text_input( 
	array(
    'id' => '_buy_price',
    'label' => __( 'Buy Price ($)', 'woocommerce' ),
    'description' => __( 'Buy price for CellTec', 'woocommerce' ),
    'desc_tip' => 'true',
    'placeholder' => ''
    ) );
}

add_action( 'woocommerce_process_product_meta', 'ranaay_save_buy_price' );
function ranaay_save_buy_price( $post_id ) {
    if ( ! empty( $_POST['_buy_price'] ) ) {
        update_post_meta( $post_id, '_buy_price', esc_attr( $_POST['_buy_price'] ) );
    }
}

// ADD MANUFACTURER NO.
add_action( 'woocommerce_product_options_sku', 'ranaay_add_manufacturer_nu' );
function ranaay_add_manufacturer_nu() {
 global $woocommerce, $post;
    // Add Manufacturer No.
    woocommerce_wp_text_input( array(
        'id' => '_manufacturer_nu',
        'label' => __( 'Manufacturer No.', 'woocommerce' ),
        'description' => __( 'Manufacturer Number for Purchase Orders', 'woocommerce' ),
        'desc_tip' => 'true',
        'placeholder' => ''
    ) );
}

add_action( 'woocommerce_process_product_meta', 'ranaay_save_manufacturer_nu' );
function ranaay_save_manufacturer_nu( $post_id ) {
    if ( ! empty( $_POST['_manufacturer_nu'] ) ) {
        update_post_meta( $post_id, '_manufacturer_nu', esc_attr( $_POST['_manufacturer_nu'] ) );
    }
}
?>