<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dream_Gen extends CI_Controller {

	public function index ()
	{
		$this->load->helper('url');
		$this->load->view('pages/dream_form');
	}

	public function generate ($theme = false) {
		$this->load->model("dreams");
		$url = $this->dreams->generate_dream($theme);
		$this->load->view("components/dream_loaded", ['dream_url'=>$url]);
	}

	public function test () {
		$this->load->model("dreams");
		$this->dreams->clean();
	}
}
