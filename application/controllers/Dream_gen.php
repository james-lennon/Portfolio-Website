<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dream_Gen extends CI_Controller {

	public function index ()
	{
		$this->load->helper('url');
		$this->load->view('pages/dream_form');
	}

	public function generate ($theme = FALSE) {
		$this->load->model("dreams");
		$dreams = $this->dreams->generate_dream(urldecode($theme));
		$this->load->view("components/dream_loaded", ['dream_data'=>$dreams[0]]);
	}

	public function test () {
		$this->load->model("dreams");
		$this->dreams->clean();
	}
}
