<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	public function index()
	{
        //echo "Ini Halaman Pegawai"; die;
		$this->load->view('template/admin/header');
		$this->load->view('template/admin/sidebar');
        $this->load->view('dashboard');
        $this->load->view('template/admin/footer');
	}

	public function distributor()
	{
        $this->load->model('pegawai_model');
        $data['distributor'] = $this->pegawai_model->select_distributor()->result();

		$this->load->view('template/admin/header');
		$this->load->view('template/admin/sidebar');
        $this->load->view('pegawai/distributor', $data);
        $this->load->view('template/admin/footer');
	}
}
