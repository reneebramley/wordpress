<?php
/* https://www.nopio.com/blog/add-user-taxonomy-wordpress/ */

define( 'company', 'user_company' ); // USER_CATEGORY_NAME
define( 'add_company', '_user_company' ); //USER_CATEGORY_META_KEY


add_action( 'init', 'register_user_company_taxonomy' );
function register_user_company_taxonomy() {
	register_taxonomy(
		company, //taxonomy name
		'user', //object for which the taxonomy is created
		array( //taxonomy details
			'public' => true,
			'labels' => array(
				'name'		=> 'Add Company',
				'singular_name'	=> 'Add Company',
				'menu_name'	=> 'Add Company',
				'search_items'	=> 'Search Added Company',
				'popular_items' => 'Popular Added Companies',
				'all_items'	=> 'All Added Companies',
				'edit_item'	=> 'Edit Added Company',
				'update_item'	=> 'Update Added Company',
				'add_new_item'	=> 'Add New Company',
				'new_item_name'	=> 'New Company Name',
			),
			'update_count_callback' => function() {
				return; //important
			}
		)
	);
}

/* ADD LABEL TO SIDEBAR */
add_action( 'admin_menu', 'add_user_company_admin_page' );
function add_user_company_admin_page() {
	$taxonomy = get_taxonomy( company );
	add_users_page(
		esc_attr( $taxonomy->labels->menu_name ),//page title
		esc_attr( $taxonomy->labels->menu_name ),//menu title
		$taxonomy->cap->manage_terms,//capability
		'edit-tags.php?taxonomy=' . $taxonomy->name//menu slug
	);
}

/* FIX HIGHLIGHTED AREA ON SIDEBAR */
add_filter( 'submenu_file', 'set_user_company_submenu_active' );
function set_user_company_submenu_active( $submenu_file ) {
	global $parent_file;
	if( 'edit-tags.php?taxonomy=' . company == $submenu_file ) {
		$parent_file = 'companies.php';
	}
	return $submenu_file;
}  

/* COMPANY FIELDS CAN ONLY BE CHANGED BY ADMIN/SALESTEAM */
add_action( 'show_user_profile', 'admin_user_profile_company_select' );
add_action( 'edit_user_profile', 'admin_user_profile_company_select' );
function admin_user_profile_company_select( $user ) {
	$taxonomy = get_taxonomy( company );
	
	if ( !user_can( $user, 'salesteam' ) ) {
		return;
	}
	?>
	<table class="form-table">
		<tr>
			<th>
				<label for="<?php echo add_company ?>">User Category</label>
			</th>
			<td>
				<?php
					$user_category_terms = get_terms( array(
						'taxonomy' => company,
						'hide_empty' => 0
					) );
					
					$select_options = array();
					
					foreach ( $user_category_terms as $term ) {
						$select_options[$term->term_id] = $term->name;
					}
					
					$meta_values = get_user_meta( $user->ID, add_company, true );
					
					echo nopio_custom_form_select(
						add_company,
						$meta_values,
						$select_options,
						'',
						array( 'multiple' =>'multiple' )
					);
				?>
			</td>
		</tr>
	</table>
	<?php
}
function nopio_custom_form_select( $name, $value, $options, $default_var ='', $html_params = array() ) {
	if( empty( $options ) ) {
		$options = array( '' => '---choose---');
	}
	$html_params_string = '';
	
	if( !empty( $html_params ) ) {
		if ( array_key_exists( 'multiple', $html_params ) ) {
			$name .= '[]';
		}
		foreach( $html_params as $html_params_key => $html_params_value ) {
			$html_params_string .= " {$html_params_key}='{$html_params_value}'";
		}
	}
	echo "<select name='{$name}'{$html_params_string}>";
	
	foreach( $options as $options_value => $options_label ) {
		if( ( is_array( $value ) && in_array( $options_value, $value ) )
			|| $options_value == $value ) {
			$selected = " selected='selected'";
		} else {
			$selected = '';
		}
		if( empty( $value ) && !empty( $default_var ) && $options_value == $default_var ) {
			$selected = " selected='selected'";
		}
		echo "<option value='{$options_value}'{$selected}>{$options_label}</option>";
	}
	echo "</select>";
}

add_action( 'personal_options_update', 'admin_save_user_companies' );
add_action( 'edit_user_profile_update', 'admin_save_user_companies' );
function admin_save_user_companies( $user_id ) {
	$tax = get_taxonomy( company );
	$user = get_userdata( $user_id );
	if ( !user_can( $user, 'salesteam' ) ) {
		return false;
	}
	$new_categories_ids = $_POST[add_company];
	$user_meta = get_user_meta( $user_id, add_company, true );
	$previous_categories_ids = array();
	if( !empty( $user_meta ) ) {
		$previous_categories_ids = (array)$user_meta;
	}
	if( ( current_user_can( 'administrator' ) && $_POST['role'] != 'salesteam' ) ) {
		delete_user_meta( $user_id, add_company );
		update_users_companies_count( $previous_categories_ids, array() );
	} else {
		update_user_meta( $user_id, add_company, $new_categories_ids );
		update_users_companies_count( $previous_categories_ids, $new_categories_ids );
	}
}

function update_users_companies_count( $previous_terms_ids, $new_terms_ids ) {
	global $wpdb;
	$terms_ids = array_unique( array_merge( (array)$previous_terms_ids, (array)$new_terms_ids ) );
	if( count( $terms_ids ) < 1 ) { return; }
	foreach ( $terms_ids as $term_id ) {
		$count = $wpdb->get_var(
			$wpdb->prepare(
				"SELECT COUNT(*) FROM $wpdb->usermeta WHERE meta_key = %s AND meta_value LIKE %s", 
				add_company,
				'%"' . $term_id . '"%'
			)
		);
		$wpdb->update( $wpdb->term_taxonomy, array( 'count' => $count ), array( 'term_taxonomy_id' => $term_id ) );
	}
}

function show_authors_in_categories() {
	$categories = get_terms(array(
		'taxonomy' => company,
		'hide_empty' => true
	));
	
	echo '<ul>';
	foreach( $categories as $category ) {
		echo '<li>';
		echo $category->name;
		echo " (#{$category->count})";
			$args = array( 
				'role' => 'Author'. 'Sales Team' . 'Wholesaler' . 'Supplier', 
				'meta_key'				=> add_company,
				'meta_value'			=> '"' . $category->term_id . '"',
				'meta_compare'		=> 'LIKE'
			);
			$authors = new WP_User_Query( $args );
			echo '<ul>';
				foreach( $authors->results as $author ) {
					echo '<li>';
						echo $author->display_name;
					echo '</li>';
				}
			echo '</ul>';
		
		echo '</li>';
	}
	echo '</ul>';
}
?>