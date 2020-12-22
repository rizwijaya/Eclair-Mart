<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	public function index()
	{
		$this->load->view('template/admin/header');
        $this->load->view('dashboard');
        $this->load->view('template/admin/footer');
	}
}
