<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('barang_model');
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
		$data['barang'] = $this->barang_model->select_barang()->result();
		$data['kategori'] = $this->barang_model->select_category()->result();

		$this->load->view('template/home/header');
		$this->load->view('listbarang', $data);
		$this->load->view('template/home/footer');
	}

	public function detail_barang($data)
	{
		$this->load->model('barang_model');
		$this->load->view('template/home/header');
		$query['barang'] = $this->barang_model->select_barang_byid($data)->result();
		//var_dump($query['barang'][0]->id_kategori);
		//die;
		$query['barangbyid'] = $this->barang_model->barangbycategory($query['barang'][0]->id_kategori)->result();
		//var_dump($query);
		//die();
		$this->load->view('detail_barang', $query);
		$this->load->view('template/home/footer');
	}

	function filtercategory($id)
	{
		$data['barang'] = $this->barang_model->barangbycategory($id)->result();
		$data['kategori'] = $this->barang_model->select_category()->result();

		$this->load->view('template/home/header');
		$this->load->view('listbarang', $data);
		$this->load->view('template/home/footer');
	}
}
