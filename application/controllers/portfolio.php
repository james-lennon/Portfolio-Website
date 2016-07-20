<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper("url");
	}

	public function index () {

		$this->load->model('project_model');

		$projects = $this->project_model->get_projects();

		$this->load->view("pages/portfolio", ['admin'=>false, 'projects' => $projects]);
	}

	public function increment_project($project_id) {

		$this->load->model();
	}

}