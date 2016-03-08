<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dream_Gen extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}
}
