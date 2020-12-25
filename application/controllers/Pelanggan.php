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
		$id = $this->session->userdata('id_user');
		if (!empty($id))
		{
			$data['keranjang'] = $this->barang_model->jumlahkeranjang($id);
		} else {
			$data['keranjang'] = 0;
		}

		//var_dump($data['keranjang'][0]); die;
		$this->load->view('template/home/header', $data);
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
	
	function tambahkeranjang($id_barang, $jumlah)
	{
		$this->load->helper(array('date'));
		$id_user = $this->session->userdata('id_user');

		$cekbarang = $this->barang_model->findbarang($id_user, $id_barang);

		if(!empty($cekbarang)) { //Update ke Keranjang yang sudah ada
			$jml = $jumlah + $cekbarang[0]->jumlah; //Menambahkan jumlah barang
			$data = array(
				'id_user'		=> 	$id_user,
				'id_barang' 	=> 	$id_barang,
				'jumlah'		=> 	$jml,
				'date_created'	=> 	date('Y-m-d')
			);

			$this->barang_model->updatekeranjang($data, 'keranjang');
		} else { //Masukan Ke keranjang baru
			$data = array(
				'id_user'		=> 	$id_user,
				'id_barang' 	=> 	$id_barang,
				'jumlah'		=> 	$jumlah,
				'date_created'	=> 	date('Y-m-d')
			);

			$this->barang_model->insertkeranjang($data, 'keranjang');
		}

		$this->list_barang(); //Redirect ke list barang
	}
}
