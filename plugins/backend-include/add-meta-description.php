<?php
/* ADD META DESCRIPTION */
add_action('wp_head', 'custom_add_meta_description_tag', 1);
function custom_get_excerpt($post_id) {
    $temp = $post;
    $post = get_post( $post_id );
    setup_postdata( $post );

    $excerpt = esc_attr(strip_tags(get_the_excerpt()));
    
    wp_reset_postdata();
    $post = $temp;

    return $excerpt;
}

function custom_add_meta_description_tag() {
?>
<meta name="description" content="<?php if ( is_single() || is_page() ) {
	$excerpt = custom_get_excerpt(get_the_ID());
        echo $excerpt;
    } else {
        bloginfo('description');
    }
    ?>" />
<?php 
}
?>