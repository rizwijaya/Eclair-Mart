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
		$this->load->model('barang_model');
		$data['barang'] = $this->barang_model->select_barang()->result();

		$this->load->view('template/home/header');
		$this->load->view('home', $data);
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
	
	function tambahkeranjang($id_barang)
	{
		$this->load->helper(array('date'));
		$id_user = $this->session->userdata('id_user');

		if($_POST) {
			var_dump($_POST); die;
		} else {
			$jumlah = 1;
		}

		$cekbarang = $this->barang_model->findbarang($id_user, $id_barang);
		$getharga = $this->barang_model->getharga($id_barang);

		$total_harga = $getharga[0]->harga * $jumlah;
		if(!empty($cekbarang)) { //Update ke Keranjang yang sudah ada
			$jml = $jumlah + $cekbarang[0]->jumlah; //Menambahkan jumlah barang
			$total = $total_harga + $cekbarang[0]->total_harga; //Jumlah harga sebelum dengan input

			$data = array(
				'id_user'		=> 	$id_user,
				'id_barang' 	=> 	$id_barang,
				'jumlah'		=> 	$jml,
				'total_harga'	=>	$total,
				'date_created'	=> 	date('Y-m-d')
			);

			$this->barang_model->updatekeranjang($data, 'keranjang');
		} else { //Masukan Ke keranjang baru
			$data = array(
				'id_user'		=> 	$id_user,
				'id_barang' 	=> 	$id_barang,
				'jumlah'		=> 	$jumlah,
				'total_harga'	=>	$total_harga,
				'date_created'	=> 	date('Y-m-d')
			);

			$this->barang_model->insertkeranjang($data, 'keranjang');
		}

		$this->list_barang(); //Redirect ke list barang
	}

	function hapus_keranjang($id)
	{
		$this->barang_model->hapus_keranjang($id);

		redirect('home/keranjangbelanja');
	}
}
