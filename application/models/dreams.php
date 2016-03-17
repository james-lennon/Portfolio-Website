<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dreams extends CI_Model {

	public function generate_dream ($theme = false) {
		$this->load->helper("url");
		$result = [];
		$return_var = -1;
		exec("./application/bin/dream_gen/main.py -n 1 -q -i", $result, $return_var);
		// exec("python run.py", $result, $return_var);
		var_dump($result);
		var_dump($return_var);
		// TODO: check for bad JSON
		return json_decode(implode($result,''));
	}

	public function clean () {
		// TODO: use php's file stuff
		system("rm res/gen/*");
	}

}