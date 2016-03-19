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
			$this->session->set_userdata('user_id', $query->row()->user_id);
		}
		return $result;
	}

	public function is_logged_in () {
		$this->load->library('session');
		return $this->session->userdata('user_id');
	}

	public function add_admin ($email, $password, $permissions = 0) {

	}

}
