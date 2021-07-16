/* ADD SCRIPT TO HEADER */
add_action('wp_head', 'ranaay_add_to_header');
function ranaay_add_to_header(){
  ?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
  <?php
};

add_action( 'wp_enqueue_scripts', 'ranaay_enqueue_custom_stylesheets', 11 );
function ranaay_enqueue_custom_stylesheets() {
    if ( ! is_admin() ) {
        wp_enqueue_style( 'Home Page CSS', get_template_directory_uri() . '/ranaay/home-page.css' );
    }
}
