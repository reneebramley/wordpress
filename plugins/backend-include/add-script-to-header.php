<?php
/* ADD SCRIPT TO HEADER */
// LINKS
add_action('wp_head', 'ranaay_add_links_to_header', 8);
function ranaay_add_links_to_header(){
  ?>
<meta name="theme-color" content="#262a33"/>
<link rel="manifest" href="/wp-content/uploads/ranaay/manifest.json">

  <?php
};

/* SCRIPT
 * <script defer src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-lazyload/8.7.1/lazyload.min.js"></script>
add_action( 'wp_enqueue_scripts', 'ranaay_enqueue_custom_stylesheets', 1 );
function ranaay_enqueue_custom_stylesheets() {
    if ( ! is_admin() ) {
        wp_enqueue_style( 'main-css', get_template_directory_uri() . '/ranaay/main.css' );
    }
} */
?>