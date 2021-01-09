<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{
	public function __construct()
	{
		parent::__construct(); // you have missed this line.
		$this->load->library('session');
		if (!$this->session->userdata('email')) {
			redirect('home');
		}

		$session_data = $this->session->userdata('id_grup');
		if ($session_data == 3) {
			redirect('home/redirecting');
		}
	}


	public function index()
	{
		//echo "Ini Halaman Pegawai"; die;
		$this->load->view('template/admin/header');
		$this->load->view('template/admin/sidebar');
		$this->load->view('dashboard');
	}

	public function distributor()
	{
		$this->load->model('pegawai_model');
		$data['distributor'] = $this->pegawai_model->select_distributor()->result();

		$this->load->view('template/admin/header');
		$this->load->view('template/admin/sidebar');
		$this->load->view('pegawai/distributor', $data);
	}

	public function _rules_tambah_distributor()
	{
		$this->load->library(array('form_validation'));

		$this->form_validation->set_rules(
			'nama_perusahaan',
			'nama_perusahaan',
			'trim|min_length[2]|max_length[128]|xss_clean|required'
		);
		$this->form_validation->set_rules(
			'nama_distributor',
			'nama_distributor',
			'trim|xss_clean|required'
		);
		$this->form_validation->set_rules(
			'nomor_telepon',
			'nomor_telepon',
			'trim|xss_clean|required'
		);
	}

	public function tambah_distributor()
	{

		$this->load->helper(array('form', 'url', 'security', 'date'));
		$this->load->library(array('form_validation'));
		$this->load->model('pegawai_model');
		$this->_rules_tambah_distributor();
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-error alert-danger fade show" role="alert">Kesalahan, Input tidak sesuai!</div>');
			$this->distributor();
		} else {

			$nama_perusahaan      	  	= $this->input->post('nama_perusahaan');
			$nama_distributor        	= $this->input->post('nama_distributor');
			$nomor_telepon          	= $this->input->post('nomor_telepon');
			$status        				= $this->input->post('status');

			$data = array(
				'nama_perusahaan'    	=>   $nama_perusahaan,
				'nama_distributor'		=>   $nama_distributor,
				'no_telp_distributor'	=>   $nomor_telepon,
				'status_distributor'	=>   $status,
				'date_created'			=> 	 date('Y-m-d'),
				'date_updated'			=> 	 date('Y-m-d')
			);

			$this->pegawai_model->tambah_distributor($data, 'distributor');

			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data telah berhasil ditambahkan.</div>');
			$this->distributor();
		}
	}

	function kategori()
	{
		$this->load->model('pegawai_model');
		$data['kategori'] = $this->pegawai_model->kategori();

		$this->load->view('template/admin/header');
		$this->load->view('template/admin/sidebar');
		$this->load->view('pegawai/kategori', $data);
	}

	public function _rules_tambah_kategori()
	{
		$this->load->library(array('form_validation'));

		$this->form_validation->set_rules(
			'kode_kategori',
			'kode_kategori',
			'trim|min_length[2]|max_length[128]|xss_clean|required'
		);
		$this->form_validation->set_rules(
			'nama_kategori',
			'nama_kategori',
			'trim|xss_clean|required'
		);
	}

	public function tambah_kategori()
	{

		$this->load->helper(array('form', 'url', 'security', 'date'));
		$this->load->library(array('form_validation'));
		$this->load->model('pegawai_model');
		$this->_rules_tambah_kategori();
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-error alert-danger fade show" role="alert">Kesalahan, Input tidak sesuai!</div>');
			$this->kategori();
		} else {

			$kode_kategori      	= $this->input->post('kode_kategori');
			$nama_kategori        	= $this->input->post('nama_kategori');

			$data = array(
				'kode_kategori'    	=>   $kode_kategori,
				'nama_kategori'		=>   $nama_kategori,
				'date_created'		=> 	 date('Y-m-d')
			);

			$this->pegawai_model->tambah_kategori($data, 'kategori');

			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data telah berhasil ditambahkan.</div>');
			$this->kategori();
		}
	}

	function hapus_kategori($id)
	{
		$this->load->model('pegawai_model');
		$this->pegawai_model->hapus_kategori($id);
		$this->kategori();
	}

	function update_kategori()
	{
		$this->load->helper(array('form', 'url', 'security', 'date'));
		$this->load->library(array('form_validation'));
		$this->load->model('pegawai_model');

		$this->form_validation->set_rules(
			'kode_kategori',
			'kode_kategori',
			'trim|min_length[2]|max_length[128]|xss_clean|required'
		);
		$this->form_validation->set_rules(
			'nama_kategori',
			'nama_kategori',
			'trim|xss_clean|required'
		);

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-error alert-danger fade show" role="alert">Kesalahan, Input tidak sesuai!</div>');
			$this->kategori();
		} else {

			$id_kategori        	= $this->input->post('id_kategori');
			$kode_kategori      	= $this->input->post('kode_kategori');
			$nama_kategori        	= $this->input->post('nama_kategori');

			$data = array(
				'id_kategori'    	=>   $id_kategori,
				'kode_kategori'    	=>   $kode_kategori,
				'nama_kategori'		=>   $nama_kategori
			);

			$this->pegawai_model->update_kategori($data);

			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data telah berhasil diperbarui.</div>');
			$this->kategori();
		}
	}

	function update_distributor()
	{
		$this->load->helper(array('form', 'url', 'security', 'date'));
		$this->load->library(array('form_validation'));
		$this->load->model('pegawai_model');

		$this->form_validation->set_rules(
			'nama_perusahaan',
			'nama_perusahaan',
			'trim|min_length[2]|max_length[128]|xss_clean|required'
		);
		$this->form_validation->set_rules(
			'nama_distributor',
			'nama_distributor',
			'trim|xss_clean|required'
		);
		$this->form_validation->set_rules(
			'nomor_telepon',
			'nomor_telepon',
			'trim|xss_clean|required'
		);

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-error alert-danger fade show" role="alert">Kesalahan, Input tidak sesuai!</div>');
			$this->distributor();
		} else {
			$id_distributor				= $this->input->post('id_distributor');
			$nama_perusahaan      	  	= $this->input->post('nama_perusahaan');
			$nama_distributor        	= $this->input->post('nama_distributor');
			$no_telp_distributor     	= $this->input->post('nomor_telepon');
			$status_distributor        	= $this->input->post('status');

			$data = array(
				'id_distributor'		=>	 $id_distributor,
				'nama_perusahaan'    	=>   $nama_perusahaan,
				'nama_distributor'		=>   $nama_distributor,
				'no_telp_distributor'	=>   $no_telp_distributor,
				'status_distributor'	=>   $status_distributor
			);

			$this->pegawai_model->update_distributor($data);

			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data telah berhasil diperbarui.</div>');
			$this->distributor();
		}
	}

	function hapus_distributor($id)
	{
		$this->load->model('pegawai_model');
		$this->pegawai_model->hapus_distributor($id);
		$this->distributor();
	}

	function daftarpelanggan()
	{
		$this->load->model('pegawai_model');
		$data['pelanggan'] = $this->pegawai_model->daftarpelanggan()->result();

		$this->load->view('template/admin/header');
		$this->load->view('template/admin/sidebar');
		$this->load->view('pegawai/pelanggan', $data);
	}

	function daftarpegawai()
	{
		$this->load->model('pegawai_model');
		$data['pegawai'] = $this->pegawai_model->daftarpegawai()->result();

		$this->load->view('template/admin/header');
		$this->load->view('template/admin/sidebar');
		$this->load->view('pegawai/pegawai', $data);
	}

	function pembayaranmasuk()
	{
		$this->load->model('pegawai_model');
		$data['pembayaran'] = $this->pegawai_model->pembayaran(1);

		$this->load->view('template/admin/header');
		$this->load->view('template/admin/sidebar');
		$this->load->view('pegawai/pembayaranmasuk', $data);
	}

	function terimabukti($id)
	{
		$data = array(
			'status_bayar'	=> 3
		);

		$where = array(
			'id_transaksi'	=> $id
		);

		$this->load->model('transaksi_model');

		$this->transaksi_model->updatebayar('transaksi', $data, $where);

		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Pembayaran Berhasil diterima, barang sedang akan dikemas!</div>');
		$this->pembayaranmasuk();
	}

	function tolakbukti($id)
	{
		$data = array(
			'status_bayar'	=> 2
		);

		$where = array(
			'id_transaksi'	=> $id
		);

		$this->load->model('transaksi_model');
		$this->transaksi_model->updatebayar('transaksi', $data, $where);

		$this->session->set_flashdata('pesan', '<div class="alert alert-error alert-danger fade show" role="alert">Pembayaran Berhasil Ditolak!</div>');
		$this->pembayaranmasuk();
	}

	function transaksi()
	{
		$this->load->model('pegawai_model');
		$data['transaksi'] = $this->pegawai_model->transaksi();

		$this->load->view('template/admin/header');
		$this->load->view('template/admin/sidebar');
		$this->load->view('pegawai/transaksi', $data);
	}

	function update_transaksi()
	{
		$status			= $this->input->post('status_bayar');
		$id				= $this->input->post('id_transaksi');

		$where = array(
			'id_transaksi'	=> $id
		);

		$data = array(
			'status_bayar'	=> $status
		);

		$this->load->model('transaksi_model');
		$this->transaksi_model->updatebayar('transaksi', $data, $where);

		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Status Pembelian Berhasil diperbarui!</div>');
		$this->transaksi();
	}

	function laporantransaksi()
	{
		$this->load->model('pegawai_model');
		$data['laporan'] = $this->pegawai_model->pembayaran(6);
		$data['transaksi'] = $this->pegawai_model->transaksi();
		$this->load->view('template/admin/header');
		$this->load->view('template/admin/sidebar');
		$this->load->view('pegawai/laporan', $data);
	}

	function cetaklaporan()
	{
		$this->load->model('pegawai_model');
		$data['laporan'] = $this->pegawai_model->pembayaran(6);

		$this->load->view('pegawai/cetaklaporan', $data);
	}
}
