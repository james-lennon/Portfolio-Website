<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function add_project($title, $description, $img_url, $date_timestamp) {

		$data = [
			'title'          => $title,
			'description'    => $description,
			'img_url'        => $img_url,
			'date_timestamp' => $date_timestamp
		];

		$this->db->insert('project', $data);
	}

	public function change_project($project_id, $title, $description, 
		$img_url, $date_timestamp) {
		
		$data = [
			'title'       => $title,
			'description' => $description,
			'img_url'        => $img_url,
			'date_timestamp' => $date_timestamp
		];

		$this->db->where('id', $project_id);
		$this->db->update('project', $data);
	}

	public function get_project($project_id) {

		$query = $this->db->query("SELECT * FROM project WHERE id = ?",
						[$project_id]);

		return $query->row();

	}

	public function get_projects() {

		$query = $this->db->query("
			SELECT * FROM project ORDER BY date_timestamp DESC
			");

		return $query->result();
	}

	public function increment_view_count($project_id) {

		$this->db->query("
			UPDATE
				project
			SET
				view_count = view_count + 1
			WHERE
				project.id = ?
			", [$project_id]);

	}

}