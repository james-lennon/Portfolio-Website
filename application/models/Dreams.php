<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dreams extends CI_Model {

	public function generate_dream ($theme = false) {
		$this->load->helper("url");
		$result = [];
		$return_var = -1;
		$theme_str = "";
		if ($theme) {
			$theme_str = "-t \"$theme\"";
		}
		$result = exec("./application/bin/dream_gen/main.py -n 1 -q -i $theme_str");
		// exec("python run.py", $result, $return_var);
		// var_dump($result);
		// var_dump($return_var);
		// TODO: check for bad JSON
		return json_decode($result);
	}

	public function clean () {
		// TODO: use php's file stuff
		system("rm res/gen/*");
	}

}