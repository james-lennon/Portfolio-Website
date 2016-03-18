<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Model extends CI_Model {

	public function check_login ($email, $password) {
		return true;
		$this->load->database();

		$this->db->query(
				"SELECT user.id, user.password
				 FROM user WHERE user.email = ?",
				 [$email, password_hash($password)]);

		if ($this->db->num_rows() == 0)
			return false;

		$result = password_verify($password, $this->db->row()->password);

		if ($result) {
			$this->load->library('session');
			$this->session->set_userdata('user_id', $this->db->row()->user_id);
		}

		return $result;
	}

	public function is_logged_in () {
		$this->load->library('session');
		return $this->session->userdata('user_id');
	}

}
