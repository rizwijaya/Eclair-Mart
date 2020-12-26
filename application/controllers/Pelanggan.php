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

		if ($_POST) {
			var_dump($_POST);
			die;
		} else {
			$jumlah = 1;
		}

		$cekbarang = $this->barang_model->findbarang($id_user, $id_barang);
		$getharga = $this->barang_model->getharga($id_barang);

		$total_harga = $getharga[0]->harga * $jumlah;
		if (!empty($cekbarang)) { //Update ke Keranjang yang sudah ada
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

	function lengkapipembayaran()
	{
		if (!$this->session->userdata('email')) {
			redirect('home/redirecting');
		}

		$cek = $this->barang_model->lengkap($this->session->userdata('id_user'));

		if ($cek[0]['no_telp_pelanggan'] != NULL) {
			redirect('home/redirecting');
		}

		$this->load->model('barang_model');
		$this->load->model('account');

		$data['barang'] = $this->barang_model->getkeranjangbyid($this->session->userdata('id_user'));
		$data['getprofile'] = $this->account->getprofile($this->session->userdata('id_user'));

		$this->load->view('template/home/header');
		$this->load->view('lengkapipembayaran', $data);
		$this->load->view('template/home/footer');
	}

	function proseslengkapi()
	{
		$this->load->helper(array('url', 'security'));
		$this->load->library(array('form_validation'));

		$this->form_validation->set_rules(
			'alamat',
			'Alamat',
			'trim|min_length[2]|max_length[128]|xss_clean|required'
		);
		$this->form_validation->set_rules(
			'kode_pos',
			'Kode Pos',
			'trim|min_length[2]|max_length[128]|xss_clean|required'
		);
		$this->form_validation->set_rules(
			'kota',
			'Kota',
			'trim|min_length[5]|max_length[128]|xss_clean|required'
		);
		$this->form_validation->set_rules(
			'negara',
			'Negara',
			'trim|min_length[5]|max_length[128]|xss_clean|required'
		);
		$this->form_validation->set_rules(
			'no_telepon',
			'No Telepon',
			'trim|min_length[5]|max_length[128]|xss_clean|required'
		);
		//var_dump($_POST); die;
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/home/header');
			$this->load->view('register');
			$this->load->view('template/home/footer');
		} else {
			$id_user			=	$this->input->post('id_user');
			$alamat				=	$this->input->post('alamat');
			$kode_pos			=	$this->input->post('kode_pos');
			$kota				=	$this->input->post('kota');
			$negara				=	$this->input->post('negara');
			$no_telepon			=	$this->input->post('no_telepon');

			$data = array(
				'alamat_pelanggan'		=>		$alamat,
				'kode_pos_pelanggan'	=>		$kode_pos,
				'kota_pelanggan'		=>		$kota,
				'negara_pelanggan'		=>		$negara,
				'no_telp_pelanggan'		=>		$no_telepon,
			);

			$this->load->model('account');
			$this->account->updateprofile($id_user, $data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Profile Berhasil Ditambahkan!. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</button></div>');
			redirect('pelanggan/checkout');
		}
	}

	function checkout()
	{
		$this->load->helper(array('date'));
		$this->load->model('transaksi_model');
		//Melakukan Perhitungan total bayar
		$totalbayar = $this->transaksi_model->totalcheckout($this->session->userdata('id_user'));
		$tanggal_bayar = date('Y-m-d');// pendefinisian tanggal awal bayar
		$batas_bayar = date('Y-m-d', strtotime('+1 days', strtotime($tanggal_bayar))); //batas pembayaran
		foreach ($totalbayar['0'] as $tb) {
			//Menginisialisasi nilai dari array input dengan data transaksi
			$input = array(
				'id_user'		=>	$this->session->userdata('id_user'),
				'total_bayar'	=>	$tb,
				'status_bayar'	=>	0,
				'tanggal_bayar'	=> 	$tanggal_bayar,
				'batas_bayar'	=> 	$batas_bayar
			);
		}
		
		//Melakukan Insert ke data Transaksi
		
		$id_transaksi = $this->transaksi_model->insertcheckout($input, 'transaksi');

		//Mengurangi Stock barang sekarang dengan yang diorder pelanggan
		$keranjang = $this->transaksi_model->getcheckout($this->session->userdata('id_user'));
		foreach ($keranjang as $kj) {
			$id_barang = $kj->id_barang;
			//Mengambil Stock barang sekarang
			$stock = $this->barang_model->getstock($id_barang);
			foreach ($stock as $stk) {
				$hasil = $stk->jumlah - $kj->jumlah; //Mengurangi stock barang
				$kurangi = array(
					'jumlah'		=>	$hasil
				);
				$this->barang_model->kurangistock($id_barang, $kurangi);
			}
		}

		//Melakukan Pemindahan data dari keranjang ke checkout
		foreach ($keranjang as $kj) {
			$data = array(
				'id_transaksi'	=>	$id_transaksi,
				'id_barang'		=>	$kj->id_barang,
				'jumlah'		=>	$kj->jumlah,
				'total_harga'	=>	$kj->total_harga,
				'date_created'	=> 	date('Y-m-d')
			);
			$this->transaksi_model->insertbarang($data, 'checkout');
		}

		//Menghapus data pada keranjang setelah checkout
		$this->transaksi_model->hapusallkeranjang($this->session->userdata('id_user'));

		$this->invoice($id_transaksi); //Melakukan load ke halaman invoice
	}

	function invoice($id_transaksi)
	{
		if (!$this->session->userdata('email')) {
			redirect('home');
		}

		$this->load->model('transaksi_model');
		$data['barang_detail'] = $this->transaksi_model->barangtransaksi($id_transaksi); //mengambil data barang
		$data['total_transaksi'] = $this->transaksi_model->getinvoice($id_transaksi); //mengambil data Transaksi
		
		$this->load->view('template/home/header');
		$this->load->view('invoice', $data);
		$this->load->view('template/home/footer');
	}

	function histori()
	{
		if (!$this->session->userdata('email')) {
			redirect('home');
		}

		$session_data = $this->session->userdata('id_grup');
		if ($session_data != 3) {
				redirect('home/redirecting');
		}

		$this->load->model('transaksi_model');
		$data['histori'] = $this->transaksi_model->gethistori($this->session->userdata('id_user')); //mengambil data Transaksi

		$this->load->view('template/home/header');
		$this->load->view('histori', $data);
		$this->load->view('template/home/footer');
	}
}
