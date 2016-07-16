<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Model extends CI_Model {

	public function check_login ($email, $password) {
		$this->load->database();

		$query = $this->db->query(
				"SELECT admin.id, admin.password
				 FROM admin WHERE admin.email = ?",
				 [$email]);

		if ($query->num_rows() == 0)
			return false;

		$result = password_verify($password, $query->row()->password);

		if ($result) {
			$this->load->library('session');
			$this->session->set_userdata('user_id', $query->row()->id);
		}
		return $result;
	}

	public function is_logged_in () {
		$this->load->library('session');
		return $this->session->userdata('user_id');
	}

	public function add_admin ($email, $password = 'test', $permissions = 0) {
		$this->load->database();

		$query = $this->db->query(
			"INSERT INTO admin
			 SET email = ?, password = ?, permissions = ?",
			 [$email, password_hash($password, PASSWORD_DEFAULT), $permissions]);

		return ($this->db->affected_rows() == 1);
	}

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

}
