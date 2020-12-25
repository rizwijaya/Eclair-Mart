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
		$this->load->library('pagination');

		 //konfigurasi pagination
		 $config['base_url'] = site_url('pelanggan/list_barang'); //site url
		 $config['total_rows'] = $this->db->count_all('barang'); //total row
		 $config['per_page'] = 12;  //show record per halaman
		 $config["uri_segment"] = 3;  // uri parameter
		 $choice = $config["total_rows"] / $config["per_page"];
		 $config["num_links"] = floor($choice);
  
		// Membuat Style pagination dengan bootsrap
		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = '<span aria-hidden="true">»</span>';
		$config['prev_link']        = '<span aria-hidden="true">«</span>';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center justify-content-lg-end">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';

		 $this->pagination->initialize($config);
		 $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
           
		 $data['barang'] = $this->barang_model->barang_pagging($config["per_page"], $data['page'])->result();

		 $data['pagination'] = $this->pagination->create_links();

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
		$this->load->view('filterbarang', $data);
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

	function lengkapipembayaran($id)
	{
		if (!$this->session->userdata('email')) {
			redirect('home/redirecting');
		}

		$data['getprofile'] = $this->account->getprofile();

		$this->load->view('template/home/header');
        $this->load->view('lengkapipembayaran', $data);
        $this->load->view('template/home/footer');
	}
}
