<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
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
		$this->load->model('barang_model');
		$data['barang'] = $this->barang_model->select_barang()->result();
		$data['kategori'] = $this->barang_model->select_category()->result();
		$data['distributor'] = $this->barang_model->select_distributor()->result();

		$this->load->view('template/admin/header');
		$this->load->view('template/admin/sidebar');
		$this->load->view('pegawai/barang', $data);
	}

	public function _rules_tambah_barang()
	{
		$this->load->library(array('form_validation'));

		$this->form_validation->set_rules(
			'nama_barang',
			'nama_barang',
			'trim|min_length[2]|max_length[128]|xss_clean|required'
		);
		$this->form_validation->set_rules(
			'harga',
			'harga',
			'trim|xss_clean|required'
		);
		$this->form_validation->set_rules(
			'jumlah',
			'jumlah',
			'trim|xss_clean|required'
		);
		$this->form_validation->set_rules(
			'deskripsi',
			'deskripsi',
			'trim|min_length[2]|max_length[200]|xss_clean|required'
		);
	}

	function tambah_barang()
	{
		$this->load->helper(array('form', 'url', 'security'));
		$this->load->library(array('form_validation'));
		$this->load->model('barang_model');

		$this->_rules_tambah_barang();
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-error alert-danger fade show" role="alert">Kesalahan, Input tidak sesuai!</div>');
			$this->index();
		} else {
			$nama_barang        = $this->input->post('nama_barang');
			$harga        		= $this->input->post('harga');
			$jumlah          	= $this->input->post('jumlah');
			$status        		= $this->input->post('status');
			$distributor        = $this->input->post('distributor');
			$kategori           = $this->input->post('kategori');
			$deskripsi           = $this->input->post('deskripsi');
			$gambar         	= $_FILES['gambar']['name'];

			if ($gambar = '') {
			} else {
				$config['upload_path']          = './assets/assets_barang/image';
				$config['allowed_types']        = 'jpg|png|jpeg';
				$config['max_size']             = 2048;

				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('gambar')) {
					// return $this->upload->data('file_name');		
					$this->session->set_flashdata('pesan', '
					<div class="alert alert-error alert-dismissible fade show" role="alert"> ' . $this->upload->display_errors() . '</div>');

					// // $error = array('error' => $this->upload->display_errors());
					$this->index();
				} else {
					$gambar = $this->upload->data('file_name');
				}
			}

			$data = array(
				'id_distributor'    =>   $distributor,
				'nama_barang'       =>   $nama_barang,
				'jumlah'          	=>   $jumlah,
				'harga'             =>   $harga,
				'status_barang'     =>   $status,
				'id_kategori'      	=>   $kategori,
				'photo_barang' 		=>   $gambar,
				'deskripsi_barang' 	=>	 $deskripsi
			);

			$this->barang_model->tambah_barang($data, 'barang');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data telah berhasil ditambahkan.</div>');
			$this->index();
		}
	}

	function hapus($id)
	{
		$this->load->model('barang_model');
		$this->barang_model->hapus_barang($id);
		$this->index();
	}

	function update_barang($id)
	{
		$this->load->helper(array('form', 'url', 'security'));
		$this->load->library(array('form_validation'));
		$this->load->model('barang_model');

		$this->_rules_tambah_barang();
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-error alert-danger fade show" role="alert">Kesalahan, Input tidak sesuai!</div>');
			$this->index();
		} else {
			$nama_barang        = $this->input->post('nama_barang');
			$harga        		= $this->input->post('harga');
			$jumlah          	= $this->input->post('jumlah');
			$status        		= $this->input->post('status');
			$distributor        = $this->input->post('distributor');
			$kategori           = $this->input->post('kategori');
			$deskripsi           = $this->input->post('deskripsi');
			$gambar         	= $_FILES['gambar']['name'];

			if ($gambar == '') {
				$oldgambar = $this->barang_model->select_barang_byid($id)->result();
				foreach ($oldgambar as $u) :
					$gambar = $u->photo_barang;
				endforeach;
			} else {
				$config['upload_path']          = './assets/assets_barang/image';
				$config['allowed_types']        = 'jpg|png|jpeg';
				$config['max_size']             = 2048;

				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('gambar')) {
					// return $this->upload->data('file_name');		
					$this->session->set_flashdata('pesan', '
					<div class="alert alert-error alert-dismissible fade show" role="alert"> ' . $this->upload->display_errors() . '</div>');

					// // $error = array('error' => $this->upload->display_errors());
					$this->index();
				} else {
					$gambar = $this->upload->data('file_name');
					var_dump($gambar);
					die();
				}
			}


			// $data = array(
			// 	'id_barang'			=> $id,
			// 	'id_distributor'    =>   $distributor,
			// 	'nama_barang'       =>   $nama_barang,
			// 	'jumlah'          	=>   $jumlah,
			// 	'harga'             =>   $harga,
			// 	'status_barang'     =>   $status,
			// 	'id_kategori'      	=>   $kategori,
			// 	'photo_barang' 		=>   $gambar,
			// 	'deskripsi_barang' 	=>	 $deskripsi
			// );

			$this->barang_model->update_barang($id, $distributor, $nama_barang, $jumlah, $harga, $status, $kategori, $gambar, $deskripsi);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data telah berhasil ditambahkan.</div>');
			$this->index();
		}
	}

	public function view_update()
	{
		$this->load->model('barang_model');
		$data['barang'] = $this->barang_model->select_barang()->result();
		$data['kategori'] = $this->barang_model->select_category()->result();
		$data['distributor'] = $this->barang_model->select_distributor()->result();

		$this->load->view('template/admin/header');
		$this->load->view('template/admin/sidebar');
		$this->load->view('pegawai/barang', $data);
	}

	public function hapus_barang()
	{
		$this->load->model('barang_model');
		$data['barang'] = $this->barang_model->select_barang_hapus()->result();
		$data['kategori'] = $this->barang_model->select_category()->result();
		$data['distributor'] = $this->barang_model->select_distributor()->result();

		$this->load->view('template/admin/header');
		$this->load->view('template/admin/sidebar');
		$this->load->view('pegawai/barangdihapus', $data);
	}
}
