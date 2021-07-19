<?php
/* ADD META BOX TO ORDER FORM */
// ADD META BOX
add_action( 'add_meta_boxes', 'ranaay_sales_details_box' );
function ranaay_sales_details_box() {
    add_meta_box(
        'ranaay-tracking-modal', // ID, should be a string
        'Sales Details', // Meta Box Title
        'ranaay_meta_box_callback', // Your call back function, this is where your form field goes
        'shop_order', // The post type you want this to show up
        'side', // The placement of your meta box, can be normal or side
        'high' // The priority in which this will be displayed
    );
}

// Callback
function ranaay_meta_box_callback( $order ){ ?>
		<?php
 			woocommerce_wp_text_input( array(
				'id' => 'account_no',
				'label' => 'Account Number:',
				'value' => $account_no,
				'wrapper_class' => 'form-field-wide'
			) );
			
						woocommerce_wp_text_input( array(
				'id' => 'cus_terms',
				'label' => 'Customer Terms:',
				'value' => $cus_terms,
				'wrapper_class' => 'form-field-wide'
			) );
 
 
			woocommerce_wp_select( array(
				'id' => 'sales_contact',
				'label' => 'Sales Contact:',
				'value' => $sales_contact,
				'options' => array(
					'Nigel Best' => 'Nigel Best',
					'Peter Denniston' => 'Peter Denniston',
					'Adin Kapetanovic' => 'Adin Kapetanovic',
					'Craige Ingram' => 'Craige Ingram',
					'Ken McNabb' => 'Ken McNabb',
					'Marijana Sabo' => 'Marijana Sabo',
					'Phil Stinchcombe' => 'Phil Stinchcombe'
				),
				'wrapper_class' => 'form-field-wide'
			) );
 
			woocommerce_wp_text_input( array(
				'id' => 'client_po',
				'label' => 'Purchase Order:',
				'value' => $client_po,
				'wrapper_class' => 'form-field-wide'
			) );
	
			woocommerce_wp_text_input( array(
				'id' => 'client_project',
				'label' => 'Project Name:',
				'value' => $client_project,
				'wrapper_class' => 'form-field-wide'
			) );
	
			woocommerce_wp_text_input( array(
				'id' => 'lead_time',
				'label' => 'Lead Time:',
				'value' => $lead_time,
				'wrapper_class' => 'form-field-wide'
			) );
	
			woocommerce_wp_select( array(
				'id' => 'template_type',
				'label' => 'Template Type:',
				'value' => $templates,
				'options' => array(
					'Quote with all details' => 'Quote with all details',
					'Quote with Net Price only' => 'Quote with Net Price only',
					'Quote with Qty and Total only' => 'Quote with Qty and Total only',
					'Quote with No GST' => 'Quote with No GST'
				),
				'wrapper_class' => 'form-field-wide'
			) );
			
			woocommerce_wp_text_input( array(
				'id' => 'quote_suffx',
				'label' => 'Last Suffix:',
				'value' => $quote_suffx,
				'wrapper_class' => 'form-field-wide'
			) );
		?>
<?php }

// Save
add_action( 'woocommerce_process_shop_order_meta', 'ranaay_save_order_details' );
function ranaay_save_order_details( $ord_id ){
	update_post_meta( $ord_id, 'account_no', wc_clean( $_POST[ 'account_no' ] ) );
	update_post_meta( $ord_id, 'cus_terms', wc_clean( $_POST[ 'cus_terms' ] ) );
	update_post_meta( $ord_id, 'sales_contact', wc_clean( $_POST[ 'sales_contact' ] ) );
	update_post_meta( $ord_id, 'client_po', wc_clean( $_POST[ 'client_po' ] ) );
	update_post_meta( $ord_id, 'client_project', wc_clean( $_POST[ 'client_project' ] ) );
	update_post_meta( $ord_id, 'lead_time', wc_clean( $_POST[ 'lead_time' ] ) );
	update_post_meta( $ord_id, 'template_type', wc_clean( $_POST[ 'template_type' ] ) );	
	update_post_meta( $ord_id, 'quote_suffx', wc_clean( $_POST[ 'quote_suffx' ] ) );
	// wc_clean() and wc_sanitize_textarea() are WooCommerce sanitization functions
}
?>