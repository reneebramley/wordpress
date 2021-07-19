<?php
/* REMOVE RSS FEED */
function ranaay_disable_feed() {
wp_die( __('No feed available,please visit our <a href="'. get_bloginfo('url') .'">homepage</a>!') );
}
 
add_action('do_feed', 'ranaay_disable_feed', 1);
add_action('do_feed_rdf', 'ranaay_disable_feed', 1);
add_action('do_feed_rss', 'ranaay_disable_feed', 1);
add_action('do_feed_rss2', 'ranaay_disable_feed', 1);
add_action('do_feed_atom', 'ranaay_disable_feed', 1);
add_action('do_feed_rss2_comments', 'ranaay_disable_feed', 1);
add_action('do_feed_atom_comments', 'ranaay_disable_feed', 1);

remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
remove_action( 'wp_head', 'index_rel_link' ); // index link
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 ); // Display relational links for the posts adjacent to the current post.
remove_action( 'wp_head', 'wp_generator' ); // Display the XHTML generator that is generated on the wp_head hook, WP version
function ranaay_remove_rss () { }
?>