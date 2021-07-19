<?php
/* ADD BACKEND COLOUR '#121419', '#262a33', '#ffffff', '#d71920' */
function additional_admin_color_schemes() {
  //Get the theme directory
  $theme_dir = get_template_directory_uri();
 
  //CellTec
  wp_admin_css_color( 'celltec', __( 'CellTec' ),
    $theme_dir . '/ranaay/celltec-colours.css',
    array( '#121419', '#262a33', '#ffffff', '#d71920' )
  );
}
add_action('admin_init', 'additional_admin_color_schemes');

function set_default_admin_color($user_id) {
  $args = array(
    'ID' => $user_id,
    'admin_color' => 'celltec'
  );
  wp_update_user( $args );
}
add_action('user_register', 'set_default_admin_color');
?>