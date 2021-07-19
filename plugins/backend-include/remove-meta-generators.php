<?php
/* REMOVE META GENERATORS */
add_action('get_header', 'clean_meta_generators', 100);
add_action('wp_footer', function(){ ob_end_flush(); }, 100);
function remove_meta_generators($html) {
    $pattern = '/<meta name(.*)=(.*)"generator"(.*)>/i';
    $html = preg_replace($pattern, '', $html);
    return $html;
}
function clean_meta_generators($html) {
    ob_start('remove_meta_generators');
}
?>