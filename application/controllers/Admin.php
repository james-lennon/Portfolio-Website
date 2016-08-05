<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper("url");
		$this->load->model("admin_model");
	}

	public function index () {
		check_login();

		$this->load->model("project_model");

		$projects = $this->project_model->get_projects();
		$this->load->view("pages/portfolio", ['admin'=>true, 'projects'=>$projects]);
	}

	public function login() {
		$this->load->helper("url");

		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if (!$this->form_validation->run())
		{
			$this->load->view("pages/admin_login");
		}
		else
		{
			$email    = $this->input->post('email');
			$password = $this->input->post('password');

			$this->load->model('admin_model');
			if ($this->admin_model->check_login($email, $password)) {
				redirect("admin/index");
			} else {
				$this->load->view("pages/admin_login", ['error'=>'Invalid credentials']);
			}
		}
	}

	// public function add_admin () {
	// 	$email = "jameslennon321@gmail.com";
	// 	$password = "admintest";

	// 	$this->load->model('admin_model');
	// 	$result = $this->admin_model->add_admin($email, $password);
	// 	echo "Added admin $email\nsuccess=$result";
	// }

	public function edit_project ($project_id = NULL) {

		check_login();

		$this->load->helper("url");

		$data = [];
		if ($project_id != NULL) {
			$this->load->model("project_model");

			$project = $this->project_model->get_project($project_id);

			$data['project'] = $project;
		}

		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('date', 'Date', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view("pages/project_form", $data);
		}
		else
		{
			$title          = $this->input->post('title');
			$description    = $this->input->post('description');
			$img_url        = $this->input->post('img_url');
			$web_url        = $this->input->post('web_url');
			$ios_url        = $this->input->post('ios_url');
			$android_url    = $this->input->post('android_url');
			$date           = $this->input->post('date');
			$date_timestamp = strtotime($date);
			$is_featured    = $this->input->post('is_featured') == "on" ? 1 : 0;

			$this->load->model('project_model');
			if ($project_id != NULL) {
				$this->project_model->change_project(
					$project_id, $title, $description, $img_url, $web_url, $ios_url, $android_url, $date_timestamp);
			} else {
				$this->project_model->add_project(
					$title, $description, $img_url, $web_url, $ios_url, $android_url, $date_timestamp);
			}
			redirect("admin");
		}
	}

}





