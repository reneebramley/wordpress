/* CHANGE BACKEND FOOTER */
add_filter('admin_footer_text', 'ranaay_change_admin_footer');
function ranaay_change_admin_footer(){
	 echo '<span id="footer-note">CellTec Pty Limited</span>';
}