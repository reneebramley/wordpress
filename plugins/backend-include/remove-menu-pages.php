/* REMOVE MENU PAGES */
add_action( 'admin_menu', 'ranaay_remove_menus' );
function ranaay_remove_menus(){
  remove_menu_page( 'upload.php' );                 //Media
  remove_menu_page( 'edit-comments.php' );          //Comments
  
}
