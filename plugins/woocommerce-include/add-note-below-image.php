<?php
/* ADD NOTE ABOUT IMAGE */
add_action( 'woocommerce_before_add_to_cart_form' , 'add_note_about_image', 3 );
 
function add_note_about_image() {
    echo '<div class="woocommerce-product-gallery" style="padding:0px 0px 0px 5px;margin-bottom:2em;color:#7b858a;">';
    echo '<span>This image is for illustrative purposes only and actual model may vary</span><hr>';
    echo '</div>';
}
?>