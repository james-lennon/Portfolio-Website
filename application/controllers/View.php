<?
defined('BASEPATH') OR exit('No direct script access allowed');

class View extends CI_Controller {

	public function __construct() {

		parent::__construct();

		$this->load->helper("url");
	}

	public function project($project_id) {

		$this->load->model(["project_model", "admin_model"]);

		/* get project data */
		$project = $this->project_model->get_project($project_id);

		/* increment view count for this project */
		$this->project_model->increment_view_count($project_id);

		$this->load->view("components/project_view", ["project" => $project, "admin"=>$this->admin_model->is_logged_in()]);
	}

}