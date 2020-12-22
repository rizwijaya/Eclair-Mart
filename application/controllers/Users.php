<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index()
	{
		$this->load->view('template/home/header');
        $this->load->view('home');
        $this->load->view('template/home/footer');
	}
}