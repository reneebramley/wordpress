<?php
/* DEFER JAVASCRIPT 
https://jasonyingling.me/fixing-render-blocking-scripts-third-party-sources-wordpress/ */

add_filter( 'script_loader_tag', 'ranaay_async_js', 10 );
function ranaay_async_js($tag){
# Do not add defer or async attribute to these scripts
$scripts_to_exclude = array('jquery.js');

foreach($scripts_to_exclude as $exclude_script){
    if(true == strpos($tag, $exclude_script ) )
    return $tag;    
}
# Defer or async all remaining scripts not excluded above
return str_replace( ' src', ' defer src', $tag );
}
?>