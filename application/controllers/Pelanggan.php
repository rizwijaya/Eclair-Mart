<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	public function index()
	{
        //echo "Ini Halaman Pelanggan"; die;
		$this->load->view('template/home/header');
        $this->load->view('home');
        $this->load->view('template/home/footer');
	}
}
