<?php
/* HELP AREA
https://blog.templatetoaster.com/wordpress-contextual-help/ */

// ADD USER
add_action('admin_head', 'ranaay_add_user_help');
function ranaay_add_user_help(){
//get the current screen object
$current_screen = get_current_screen();

//register our help tab with a callback
$current_screen->add_help_tab( array(
'id' => 'ranaay_add_user_help_tab_callback',
'title' => __('Add Users'),
'callback' => 'ranaay_add_user_help_tab'
)
);
}
//callback function used to display the second help tab
function ranaay_add_user_help_tab(){
$content = '<p> STEP 1. HOW TO ADD CUSTOMER BUSINESS ROLES<br>
			Under Roles, click on Add New<br>
			<ul>
			<li>Create Display Name</li>
			<li>On the right of Capabilities, in the dropdown menu, click on Customer > Apply</li>
			<li>Scroll down and Save/Add New Role</li>
			</ul><br>
			STEP 2. HOW TO ADD CUSTOMER<br>
			Under Users, click on Add New<br>
			<ul>
			<li>Add New Username, Email, First Name, Last Name, Password (Can be changed. An Email to the new customer noting the Password will need to be sent).</li>
			<li>Keep Role as Customer or change to a business Role already added. If it has not been added, Step 1 will need to be done.</li>
			<li>Scroll down and Save/Add New User.</li>
			<ul>
</p>';
echo $content;
}

// ADD DISCOUNTS
add_action('admin_head', 'ranaay_add_discounts_help');
function ranaay_add_discounts_help(){
//get the current screen object
$current_screen = get_current_screen();

//register our help tab with a callback
$current_screen->add_help_tab( array(
'id' => 'ranaay_add_discounts_help_tab_callback',
'title' => __('Add Discounts'),
'callback' => 'ranaay_display_add_discounts_help_tab'
)
);
}
//callback function used to display the second help tab
function ranaay_display_add_discounts_help_tab(){
$content = '<p>HOW TO ADD DISCOUNTS<br>
			Under Woocommerce, click on Pricing & Discounts<br>
			<ul>
			<li>Click on Product Pricing. Leave as ‘Apply rule for smaller price’ and ‘No discount limit’</li>
			<li>Click Add Rule</li>
			<ul><br>
			<strong>NOTE: You cannot add Business User Roles and Individual Customer Names under the same rule. There are too many conflicting codes in the backend and particular rules will not apply to the customer accounts. Please make sure they are separated.</strong><br>
			<ul>
			<li>Fill out Note with a description. </li>
			<li>Fill out Adjustment > Dropdown to Percentage Discount > Add Rate</li>
			<li>Fill out Products > Dropdown to Product Category > Add Category</li>
			<li>Fill out Conditions > Dropdown to User Role or Customer > Add Business or Individual
Scroll down and Save Changes.</li>
			<ul>
			Now when the Customer logs into their account, they can add the product to their shopping cart and the discounted prices will appear in the Shopping Cart Views.<br>
			Shopping Cart view shows Unit Price rate changed.<br>
</p>';
echo $content;
}

// CREATE ORDER
add_action('admin_head', 'ranaay_create_order_help');
function ranaay_create_order_help(){
//get the current screen object
$current_screen = get_current_screen();

//register our help tab with a callback
$current_screen->add_help_tab( array(
'id' => 'ranaay_create_order_help_tab_callback',
'title' => __('Create Order'),
'callback' => 'ranaay_display_create_order_help_tab'
)
);
}
//callback function used to display the second help tab
function ranaay_display_create_order_help_tab(){
$content = '<p> Create Order, Create PDF.<br>To remove GST from Invoices, they need to be shipped to an overseas.</p>';
echo $content;
}

// CHANGE STORE PAGES
add_action('admin_head', 'ranaay_change_category_info_help');
function ranaay_change_category_info_help(){
//get the current screen object
$current_screen = get_current_screen();

//register our help tab with a callback
$current_screen->add_help_tab( array(
'id' => 'ranaay_change_category_info_help_tab_callback',
'title' => __('Change Store Pages'),
'callback' => 'ranaay_display_change_category_info_help_tab'
)
);
}
//callback function used to display the second help tab
function ranaay_display_change_category_info_help_tab(){
$content = '<p> Found in Blocks </p>';
echo $content;
}
?>