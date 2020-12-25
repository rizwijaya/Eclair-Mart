<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemilik extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct(); // you have missed this line.
		$this->load->library('session');
		if (!$this->session->userdata('email')) {
			redirect('home');
		}

		$session_data = $this->session->userdata('id_grup');
		if ($session_data != 1) {
			redirect('home/redirecting');
		}
	}

	public function index()
	{
        //echo "Ini Halaman Pemilik"; die;
		$this->load->view('template/admin/header');
		$this->load->view('template/admin/sidebar');
        $this->load->view('dashboard');
	}
}
