<?php
/* REMOVE FROM ON ADMIN SIDEBAR 
https://wordpress.stackexchange.com/questions/136058/how-to-remove-admin-menu-pages-inserted-by-plugins */
add_action( 'admin_menu', 'ranaay_remove_wp_sidebar', 999 );
function ranaay_remove_wp_sidebar() {
  remove_menu_page( 'aws-options' );                      //Adv. Woo Search
  //remove_menu_page( 'themes.php' );                     //Appearance
  remove_menu_page( 'wpassetcleanup_getting_started' );         //Asset Clean Up
  remove_menu_page( 'edit.php?post_type=block' );       //Blocks
  remove_menu_page( 'admin/backend-redesign-admin-page.php' ); //CellTec Plugin
  remove_menu_page( 'edit-comments.php' );                //Comments
  remove_menu_page( 'wpcf7' );                           //Contact Form
  remove_menu_page( 'envato-market' );                   //Envato Market
  remove_menu_page( 'edit.php?post_type=event' );         //Events
  remove_menu_page( 'edit.php?post_type=faq' );          //FAQs
  remove_menu_page( 'link-manager.php' );                //Links
  //remove_menu_page( 'upload.php' );                    //Media
  remove_menu_page( 'edit.php?post_type=member' );       //Members
  remove_menu_page( 'newsletter_main_index' );           //Newsletter
  remove_menu_page( 'edit.php?post_type=page' );         //Pages
  remove_menu_page( 'edit.php' );                        //Posts
  //remove_menu_page( 'plugins.php' );                   //Plugins
  remove_menu_page( 'edit.php?post_type=portfolio' );    //Portfolio
  remove_menu_page( 'porto' );                           //Porto
  //remove_menu_page( 'options-general.php' );             //Settings
  remove_menu_page( 'wds_wizard' );                     //Smartcrawl
  remove_menu_page( 'tinvwl' );                          //TI Wishlist
  remove_menu_page( 'tools.php' );                       //Tools
  remove_menu_page( 'about-ultimate' );                  //Ultimate
  remove_menu_page( 'vc-general' );                      //WPBakery 
  remove_menu_page( 'WP-Optimize' );                     //WP-Optimize
  //remove_menu_page( 'wpseo_dashboard' );               //Yoast
}

/* CHECK SIDEBAR NAMES
add_action( 'admin_init', 'wpse_136058_debug_admin_menu' );
function wpse_136058_debug_admin_menu() {
    echo '<pre>' . print_r( $GLOBALS[ 'menu' ], TRUE) . '</pre>';
} */
?>