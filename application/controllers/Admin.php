<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index () {
		check_login();
	}

	public function login() {
		$this->load->helper("url");

		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view("pages/admin_login");
		}
		else
		{
			$email    = $_POST['email'];
			$password = $_POST['password'];

			$this->load->model('admin_model');
			if ($this->admin_model->check_login($email, $password)) {
				redirect("admin/index");
			}
		}
	}

	public function add_admin($email, $password) {
		if (!$this->is_cli_request()) {
			echo "UNAUTHORIZED";
		}

		$this->load->model('admin_model');
		$result = $this->admin_model->add_admin($email, $password);
		echo "Added admin $email\nsuccess=$result";
	}

}