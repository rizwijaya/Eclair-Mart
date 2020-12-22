<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('barang');
		$this->load->helper('url');
	}

	public function index()
	{
		//echo "Ini Halaman Pelanggan"; die;
		$this->load->view('template/home/header');
		$this->load->view('home');
		$this->load->view('template/home/footer');
	}

	public function list_barang()
	{
		$this->load->view('template/home/header');
		$data['barang'] = $this->barang->select_barang()->result();
		//var_dump($data);
		$this->load->view('listbarang', $data);
		$this->load->view('template/home/footer');
	}
}
