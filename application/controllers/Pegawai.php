<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{

	public function index()
	{
		// echo "Ini Halaman Pegawai"; die;
		$this->load->view('template/admin/header');
		$this->load->view('template/admin/sidebar');
		$this->load->view('dashboard');
		$this->load->view('template/admin/footer');
	}
	public function input_barang()
	{
		$this->load->view('template/admin/header');
		$this->load->view('template/admin/sidebar');
		$this->load->view('pegawai/submitbarang');
		$this->load->view('template/admin/footer');
	}

	public function inputing_barang()
	{

		$this->load->helper(array('url', 'security'));
		$this->load->library(array('form_validation'));
		//form validation
		$this->form_validation->set_rules(
			'nama',
			'Nama Barang',
			'trim|min_length[2]|max_length[128]|xss_clean|required'
		);
		$this->form_validation->set_rules(
			'deskripsi',
			'Deskripsi Barang',
			'trim|min_length[2]|max_length[128]|xss_clean|required'
		);
		$this->form_validation->set_rules(
			'iddistributor',
			'No Distributor',
			'trim|min_length[1]|max_length[128]|xss_clean|required'
		);



		//upload gambar
		$config['upload_path']          = './assets/admin/images';
		//$config['filename'] = '';
		//$config['allowed_types']        = 'gif|jpg|png';
		//$config['max_size']             = 100;
		//$config['max_width']            = 1024;
		//$config['max_height']           = 768;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('foto')) {
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('pegawai/submitbarang', $error);
		} else {
			$datafoto = array('upload_data' => $this->upload->data());
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('template/admin/header');
				$this->load->view('template/admin/sidebar');
				$this->load->view('dashboard');
				$this->load->view('template/admin/footer');
			} else {
				$nama			=	$this->input->post('nama_barang');
				$deskripsi		=	$this->input->post('deskripsi_barang');
				$iddistributor	=	$this->input->post('id_distributor');
				$foto		=	$this->input->post('foto');
				$harga		=	$this->input->post('harga');
				$stok		=	$this->input->post('stok');
				$data = array(
					'nama'	=>	$nama,
					'deskripsi_barang'	=>	$deskripsi,
					'id_distributor' => $iddistributor,
					'foto'	=>	$foto,
					'harga'	=>	$harga,
					'stok'	=>	$stok,
				);

				$this->load->model('barang');
				$this->barang->insert_barang($data);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"> Barang berhasil diUpdate. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</button></div>');
				die();
				redirect('admin/index.php');
			}
		}
	}
}
