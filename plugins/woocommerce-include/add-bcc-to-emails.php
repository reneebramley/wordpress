<?php
/* ADD ON HOLD ORDER NOTIFICATIONS TO SALES TEAM */
  add_filter( 'woocommerce_email_headers', 'custom_admin_email_notification', 10, 3);
function custom_admin_email_notification( $headers, $email_id, $order ) {

    if( 'customer_on-hold_order' == $email_id ){
        // Set HERE the Admin email
        $headers .= 'Bcc: CellTec Sales Team <sales@celltec.com.au>\r\n';
    }
    return $headers;
}
?>