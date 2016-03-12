<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dreams extends CI_Model {

	public function generate_dream ($theme = false) {
		$this->load->helper("url");
		$id = (int) (rand());
		$local_name = "res/gen/$id.txt";
		system("echo yo > $local_name");
		return base_url().$local_name;
	}

	public function clean () {
		// TODO: use php's file stuff
		system("rm res/gen/*");
	}

}