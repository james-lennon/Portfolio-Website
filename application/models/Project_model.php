<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function add_project(
		$title, $description, $img_url, $web_url, $ios_url, 
		$android_url,$date_timestamp, $is_featured) {

		$data = [
			'title'          => $title,
			'description'    => $description,
			'img_url'        => $img_url,
			'web_url'        => $web_url,
			'ios_url'        => $ios_url,
			'android_url'    => $android_url,
			'date_timestamp' => $date_timestamp,
			'is_featured'    => $is_featured ? 1 : 0
		];

		$this->db->insert('project', $data);
	}

	public function change_project(
		$project_id, $title, $description, $img_url, $web_url, $ios_url, 
		$android_url, $date_timestamp, $is_featured) {
		
		$data = [
			'title'          => $title,
			'description'    => $description,
			'img_url'        => $img_url,
			'web_url'        => $web_url,
			'ios_url'        => $ios_url,
			'android_url'    => $android_url,
			'date_timestamp' => $date_timestamp,
			'is_featured'    => $is_featured ? 1 : 0
		];

		$this->db->where('id', $project_id);
		$this->db->update('project', $data);
	}

	public function get_project($project_id) {

		$query = $this->db->query("SELECT * FROM project WHERE id = ?",
						[$project_id]);

		return $query->row();

	}

	public function delete_project($project_id) {

		$query = $this->db->query("DELETE FROM project WHERE id = ?", [
						$project_id]);
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

	public function get_images($project_id) {
		$query = $this->db->query("
					SELECT * FROM image WHERE project_id = ? ORDER BY position",
					[$project_id]);

		return $query->result();
	}

	public function remove_images($project_id) {
		$this->db->query("DELETE FROM image WHERE project_id = ?", [$project_id]);
	}

	public function add_image($url, $position, $caption, $project_id) {

		$data = [
			'url'        => $url,
			'position'   => $position,
			'caption'    => $position,
			'project_id' => $project_id
		];

		$this->db->insert('image', $data);
	}

}