<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->view('template/home/header');
        $this->load->view('home');
        $this->load->view('template/home/footer');
	}

	public function login()
	{
		$this->load->view('template/login/header');
        $this->load->view('login');
        $this->load->view('template/login/footer');
	}

	public function register()
    {
		$this->load->view('template/login/header');
        $this->load->view('register');
        $this->load->view('template/login/footer');
    }
}
