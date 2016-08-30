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

		$data = [];
		if ($project_id != NULL) {
			$this->load->model("project_model");

			$project = $this->project_model->get_project($project_id);
			$images  = $this->project_model->get_images($project_id);

			$data['project'] = $project;
			$data['images']  = $images;
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
			$youtube_id     = $this->input->post('youtube_id');
			$ios_url        = $this->input->post('ios_url');
			$android_url    = $this->input->post('android_url');
			$date           = $this->input->post('date');
			$date_timestamp = strtotime($date);
			$is_featured    = $this->input->post('is_featured') == "on";
			$image_urls     = $this->input->post('images');
			$images         = explode("\n", $image_urls);

			$this->load->model('project_model');

			/* create or edit project */
			if ($project_id != NULL) {
				$this->project_model->change_project(
					$project_id, $title, $description, $img_url, $web_url, $youtube_id, $ios_url, $android_url, $date_timestamp, $is_featured);
			} else {
				$project_id = $this->project_model->add_project(
					$title, $description, $img_url, $web_url, $youtube_id, $ios_url, $android_url, $date_timestamp, $is_featured);
			}

			/* replace images */
			$this->project_model->delete_images($project_id);

			for ($i=0; $i < count($images); $i++) {
				if (strlen($images[$i]) > 0)
					$this->project_model->add_image($images[$i], $i, "", $project_id);
			}

			/* redirect to homepage */
			redirect("admin");
		}
	}

	public function delete_project($project_id) {

		check_login();

		$this->load->model('project_model');

		$this->project_model->delete_project($project_id);

		redirect("admin");

	}

}





