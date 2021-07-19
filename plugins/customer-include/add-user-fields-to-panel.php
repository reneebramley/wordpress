<?php
/* ADD USER FIELDS TO USER PANEL */ 
add_filter( 'manage_users_columns', 'ranaay_new_user_table' );
function ranaay_new_user_table( $column ) {
	$column['position'] = 'Position/Title';
    $column['phone'] = 'Phone';
    $column['add_company'] = 'Company';
    $column['acc_nu'] = 'Account No.';
    $column['vendor'] = 'Vendor Code';
    $column['s_terms'] = 'Supplier Terms';
    $column['c_terms'] = 'Customer Terms';
    return $column;
}

add_filter( 'manage_users_custom_column', 'ranaay_new_user_table_row', 10, 3 );
function ranaay_new_user_table_row( $val, $column_name, $user_id ) {
    switch ($column_name) {
        case 'position' :
            return get_the_author_meta( 'nickname', $user_id );
            break;
        case 'phone' :
            return get_the_author_meta( 'billing_phone', $user_id );
            break;
        case 'company' :
            return get_the_author_meta( 'add_company', $user_id );
            break;
        case 'acc_nu' :
            return get_the_author_meta( 'acc_nu', $user_id );
            break;
        case 'vendor' :
            return get_the_author_meta( 'vendor', $user_id );
            break;
        case 's_terms' :
            return get_the_author_meta( 's_terms', $user_id );
            break;
        case 'c_terms' :
            return get_the_author_meta( 'c_terms', $user_id );
            break;
        default:
    }
    return $val;
}

// REORDER USER TABLE
add_filter('manage_users_columns','ranaay_reorder_user_columns');
function ranaay_reorder_user_columns($column) {
    $column = array(
        'username' => 'Username',
        'name' => 'Name',
        'position' => 'Position/Title', //the new column
        'email' => 'Email',
        'phone' => 'Phone',
        'add_company' => 'Company',
        'acc_nu' => 'Account No.',
        'vendor' => 'Vendor',
        's_terms' => 'Supplier Terms',
        'c_terms' => 'Customer Terms'
    );
    return $column;
}

//MAKE USER TABLE SORTABLE
add_filter( 'manage_users_columns', 'ranaay_sort_name_table' );
function ranaay_sort_name_table( $columns ) { 
	$columns['name'] = 'Name';
	return $columns;
}

add_filter( 'manage_users_sortable_columns', 'ranaay_sort_name_column' );
function ranaay_sort_name_column( $columns ) {
	return wp_parse_args( array( 'name' => 'name' ), $columns );
}

add_filter( 'manage_users_columns', 'ranaay_sort_company_table' );
function ranaay_sort_company_table( $columns ) { 
	$columns['add_company'] = 'Company';
	return $columns;
}

add_filter( 'manage_users_sortable_columns', 'ranaay_sort_company_column' );
function ranaay_sort_company_column( $columns ) {
	return wp_parse_args( array( 'add_company' => 'add_company' ), $columns );
}

// REMOVE AVATAR FROM USERNAME
add_filter( 'get_avatar', 'remove_avatar_from_users_list' );
function remove_avatar_from_users_list( $avatar ) {
    if (is_admin()) {
        global $current_screen; 
        if ( $current_screen->base == 'users' ) {
            $avatar = '';
        }
    }
    return $avatar;
}
?>