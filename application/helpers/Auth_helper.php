<?
function check_login () {
	$ci =& get_instance();
	$ci->load->model('admin_model');
	if (!$ci->admin_model->is_logged_in()) {
		$ci->load->helper("url");
		redirect("admin/login");
		exit();
	}
}