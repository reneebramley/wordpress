<?php
/* WOOCOMMERCE SHOW ACC */
add_action( 'woocommerce_admin_order_data_after_order_details', 'ranaay_hook_user_details', 1);
function ranaay_hook_user_details($order) {
  $user = $order->get_user_id();
  $acc_key = 'acc_nu';
  $single = true;
  $user_acc = get_user_meta( $user, $acc_key, $single ); 
  echo '<p class="form-field form-field-wide wc-customer-user">Account Number: ' . $user_acc . ' | '; 
  $c_key = 'c_terms';
  $user_c = get_user_meta( $user, $c_key, $single ); 
  echo 'Customer Terms: ' . $user_c . '</p>';  
}
?>