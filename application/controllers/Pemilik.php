<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemilik extends CI_Controller {

	public function index()
	{
        //echo "Ini Halaman Pemilik"; die;
		$this->load->view('template/admin/header');
		$this->load->view('template/admin/sidebar');
        $this->load->view('dashboard');
	}
}
