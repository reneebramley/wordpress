<?php
/* CHANGE HOWDY */
add_filter('gettext', 'howdy_message', 10, 3);
function howdy_message($translated_text, $text, $domain) {
$new_message = str_replace('Howdy', 'Welcome to the Admin Panel', $text);
return $new_message;
}
?>