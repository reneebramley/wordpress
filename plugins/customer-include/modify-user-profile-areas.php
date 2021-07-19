<?php
/* MODIFY USER PROFILE AREAS. 
https://isabelcastillo.com/hide-personal-options-wordpress-admin-profile 
http://justintadlock.com/archives/2009/09/10/adding-and-using-custom-user-profile-fields */

/* REMOVE USER PROFILE AREAS */
add_action('admin_head','ranaay_remove_personal_options');
function ranaay_remove_personal_options(){
    echo '<script type="text/javascript">jQuery(document).ready(function($) {
$(\'form#your-profile > h2:first\').remove();
$(\'form#your-profile tr.user-rich-editing-wrap\').remove();
$(\'form#your-profile tr.user-admin-color-wrap\').remove();
$(\'form#your-profile tr.user-comment-shortcuts-wrap\').remove();
$(\'form#your-profile tr.user-admin-bar-front-wrap\').remove();
$(\'form#your-profile tr.user-language-wrap\').remove();
$(\'table.form-table tr.user-display-name-wrap\').remove();
$(\'h2:contains("About Yourself"), h2:contains("About the user")\').remove();
$(\'form#your-profile tr.user-description-wrap\').remove();
$(\'form#your-profile tr.user-profile-picture\').remove();
$(\'table.form-table tr.user-aim-wrap\').remove();
$(\'table.form-table tr.user-yim-wrap\').remove();
$(\'table.form-table tr.user-jabber-wrap\').remove();
$(\'table.form-table tr.user-googleplus-wrap\').remove();
$(\'table.form-table tr.user-twitter-wrap\').remove();
$(\'table.form-table tr.user-mtwitter-wrap\').remove();
$(\'table.form-table tr.user-facebook-wrap\').remove();
$(\'table.form-table tr.user-mfacebook-wrap\').remove();
$(\'div.yoast.yoast-settings\').remove();
});</script>'; 
}

/* HIDE USER PROFILE AREAS */
add_action('admin_head','ranaay_hide_personal_options');
function ranaay_hide_personal_options(){
    if ( ! current_user_can('manage_options') ) {
        echo "\n"
 . '<script type="text/javascript">jQuery(document).ready(function($) {
$(\'form#your-profile > h3:first\').hide();
$(\'form#your-profile > table:first\').hide();
$(\'table.form-table:eq(2) tr:eq(1)\').hide();
$(\'form#your-profile\').show(); }); </script>' . "\n";
    }
}

/* CHANGE USER PROFILE AREAS */
add_action('admin_head','ranaay_change_about_us');
function ranaay_change_about_us(){echo "\n"
 . '<script type="text/javascript">jQuery(document).ready(function($) {
$(\'table.form-table tr.user-nickname-wrap label\').replaceWith(\'<h4>Position/Title</h4>\');
}); </script>' . "\n"; }


/* ADD USER PROFILE AREAS 
https://wordpress.stackexchange.com/questions/23813/adding-fields-to-the-add-new-user-screen-in-the-dashboard */
add_action( 'show_user_profile', 'ranaay_show_extra_user_fields' );
add_action( 'edit_user_profile', 'ranaay_show_extra_user_fields' );
add_action( 'user_new_form', 'ranaay_show_extra_user_fields' );
function ranaay_show_extra_user_fields( $user ) { ?>
<h3>Accounts Information</h3>
    <table class="form-table">
<tr>
            <th><label for="acc_nu">Account Number</label></th>
            <td>
            <input type="text" name="acc_nu" id="acc_nu" value="<?php echo esc_attr( get_the_author_meta( 'acc_nu', $user->ID ) ); ?>" class="regular-text" /><br />
            </td>
</tr>
<tr>
            <th><label for="vendor">Vendor Code</label></th>
            <td>
            <input type="text" name="vendor" id="vendor" value="<?php echo esc_attr( get_the_author_meta( 'vendor', $user->ID ) ); ?>" class="regular-text" /><br />
            </td>
</tr>
<tr>
            <th><label for="c_terms">Customer Terms</label></th>
            <td>
            <input type="text" name="c_terms" id="c_terms" value="<?php echo esc_attr( get_the_author_meta( 'c_terms', $user->ID ) ); ?>" class="regular-text" /><br />
            </td>
</tr>
<tr>
            <th><label for="s_terms">Supplier Terms</label></th>
            <td>
            <input type="text" name="s_terms" id="s_terms" value="<?php echo esc_attr( get_the_author_meta( 's_terms', $user->ID ) ); ?>" class="regular-text" /><br />
            </td>
</tr>
<tr>
            <th><label for="abn">ABN</label></th>
            <td>
            <input type="text" name="abn" id="abn" value="<?php echo esc_attr( get_the_author_meta( 'abn', $user->ID ) ); ?>" class="regular-text" /><br />
            </td>
</tr>		
<tr>
            <th><label for="acn">ACN</label></th>
            <td>
            <input type="text" name="acn" id="acn" value="<?php echo esc_attr( get_the_author_meta( 'acn', $user->ID ) ); ?>" class="regular-text" /><br />
            </td>
</tr>
</table>
<?php }

add_action( 'personal_options_update', 'ranaay_save_extra_user_fields' );
add_action( 'edit_user_profile_update', 'ranaay_save_extra_user_fields' );
function ranaay_save_extra_user_fields( $user_id ) {
if ( !current_user_can( 'edit_user', $user_id ) )
    return false;
update_usermeta( $user_id, 'position', $_POST['position'] );
update_usermeta( $user_id, 'acc_nu', $_POST['acc_nu'] );
update_usermeta( $user_id, 'vendor', $_POST['vendor'] );
update_usermeta( $user_id, 'c_terms', $_POST['c_terms'] );
update_usermeta( $user_id, 's_terms', $_POST['s_terms'] );
update_usermeta( $user_id, 'abn', $_POST['abn'] );
update_usermeta( $user_id, 'acn', $_POST['acn'] );
}
?>