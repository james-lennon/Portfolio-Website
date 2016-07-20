<?
defined('BASEPATH') OR exit('No direct script access allowed');

class View extends CI_Controller {

	public function project($project_id) {

		$this->load->model("project_model");

		$project = $this->project_model->get_project($project_id);
		
		$this->load->view("components/project_view", ["project" => $project]);

	}

}