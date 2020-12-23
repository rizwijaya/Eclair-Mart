<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function index()
	{
        $this->load->model('barang_model');
        $data['barang'] = $this->barang_model->select_barang()->result();

		$this->load->view('template/admin/header');
		$this->load->view('template/admin/sidebar');
        $this->load->view('pegawai/barang', $data);
        $this->load->view('template/admin/footer');
	}
}
