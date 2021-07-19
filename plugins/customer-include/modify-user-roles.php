<?php
/* ADD USER ROLES */ 
add_role('wholesaler', __(
    'Wholesaler'),
    array(
        'read'              => false, // Allows a user to read
        'create_posts'      => false, // Allows user to create new posts
        'edit_posts'        => false, // Allows user to edit their own posts
        'edit_others_posts' => false, // Allows user to edit others posts too
        'publish_posts'     => false, // Allows the user to publish posts
        'manage_categories' => false, // Allows user to manage post categories
        )
);

add_role('enduser', __(
    'End User'),
    array(
        'read'              => false, // Allows a user to read
        'create_posts'      => false, // Allows user to create new posts
        'edit_posts'        => false, // Allows user to edit their own posts
        'edit_others_posts' => false, // Allows user to edit others posts too
        'publish_posts'     => false, // Allows the user to publish posts
        'manage_categories' => false, // Allows user to manage post categories
        )
);

add_role('distributor', __(
    'Distributor'),
    array(
        'read'              => false, // Allows a user to read
        'create_posts'      => false, // Allows user to create new posts
        'edit_posts'        => false, // Allows user to edit their own posts
        'edit_others_posts' => false, // Allows user to edit others posts too
        'publish_posts'     => false, // Allows the user to publish posts
        'manage_categories' => false, // Allows user to manage post categories
        )
);

add_role('reseller', __(
    'Reseller'),
    array(
        'read'              => false, // Allows a user to read
        'create_posts'      => false, // Allows user to create new posts
        'edit_posts'        => false, // Allows user to edit their own posts
        'edit_others_posts' => false, // Allows user to edit others posts too
        'publish_posts'     => false, // Allows the user to publish posts
        'manage_categories' => false, // Allows user to manage post categories
        )
);

add_role('oem', __(
    'OEM'),
    array(
        'read'              => false, // Allows a user to read
        'create_posts'      => false, // Allows user to create new posts
        'edit_posts'        => false, // Allows user to edit their own posts
        'edit_others_posts' => false, // Allows user to edit others posts too
        'publish_posts'     => false, // Allows the user to publish posts
        'manage_categories' => false, // Allows user to manage post categories
        )
);


add_role('supplier', __(
    'Supplier'),
    array(
        'read'              => false, // Allows a user to read
        'create_posts'      => false, // Allows user to create new posts
        'edit_posts'        => false, // Allows user to edit their own posts
        'edit_others_posts' => false, // Allows user to edit others posts too
        'publish_posts'     => false, // Allows the user to publish posts
        'manage_categories' => false, // Allows user to manage post categories
        )
);

add_role('salesteam', __(
    'Sales Team'),
    array(
        'read'              => false, // Allows a user to read
        'create_posts'      => false, // Allows user to create new posts
        'edit_posts'        => false, // Allows user to edit their own posts
        'edit_others_posts' => false, // Allows user to edit others posts too
        'publish_posts'     => false, // Allows the user to publish posts
        'manage_categories' => false, // Allows user to manage post categories
        )
);

add_role('author', __(
    'Author'),
    array(
        'read'              => true, // Allows a user to read
        'create_posts'      => true, // Allows user to create new posts
        'edit_posts'        => true, // Allows user to edit their own posts
        'edit_others_posts' => true, // Allows user to edit others posts too
        'publish_posts'     => true, // Allows the user to publish posts
        'manage_categories' => true, // Allows user to manage post categories
        )
);
?>