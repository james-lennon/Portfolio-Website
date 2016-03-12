<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dream_Gen extends CI_Controller {

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('pages/dream_form');
	}

	public function generate ($topic = false) {
		$this->load->model("dreams");
		$filename = $this->dreams->generate_dream($topic);
		echo json_encode(["url" => $filename]);
	}

	public function test () {
		$this->load->model("dreams");
		$this->dreams->clean();
	}
}
