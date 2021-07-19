<?php
/* ADD SCRIPT TO FOOTER */
add_action('wp_footer', 'ranaay_add_to_footer');
function ranaay_add_to_footer(){
  ?>
<script type='text/javascript' defer src='https://www.celltec.com.au/app/sw-register.js'></script>
  <?php
};

?>