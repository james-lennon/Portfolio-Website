<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project_model extends CI_Model {

	public function add_project($title, $description, $img_url, $date_timestamp) {
		$this->load->database();

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

	public function get_projects() {
		$this->load->database();

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