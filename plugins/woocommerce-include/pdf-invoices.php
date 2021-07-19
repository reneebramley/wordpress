<?php
/* PDF INVOICES 
https://wordpress.org/plugins/woocommerce-pdf-invoices */

// CHANGE TO LANDSCAPE
add_filter( 'bewpi_mpdf_options', 'ranaay_bewpi_mpdf_options' );
function ranaay_bewpi_mpdf_options( $options ) {
    $options['format'] = 'A4-L'; // use [format]-L or [format]-P to force orientation (A4-L will be size A4 with landscape orientation)
    $options['orientation'] = 'L'; // Also try to force with format option
    return $options;
}

// CHANGE TEMPLATES
add_filter( 'wpi_template_name', 'ranaay_change_template', 10, 3 );
function ranaay_change_template( $template_name, $template_type, $order_id ) {
    $templates = get_post_meta( $order_id, 'template_type', true );
    if ( false === $templates ) {
        return $template_name;
    }
    switch ( $templates ) {
        case 'Quote with Net Price only':
            $template_name = 'q-net-price-only';
            break;
        case 'Quote with Qty and Total only':
            $template_name = 'q-qty-total-only';
            break;
    }
    return $template_name;
}
?>