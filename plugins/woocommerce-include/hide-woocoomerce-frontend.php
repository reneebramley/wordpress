<?php
/* HIDE WOOCOMMERCE FROM CUSTOMER*/


add_filter( 'wc_product_enable_dimensions_display', '_return_false' );
?>