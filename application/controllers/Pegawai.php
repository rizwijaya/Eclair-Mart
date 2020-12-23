<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{

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
			$this->index();
		} else {

			$nama_perusahaan      	  	= $this->input->post('nama_perusahaan');
			$nama_distributor        	= $this->input->post('nama_distributor');
			$nomor_telepon          	= $this->input->post('nomor_telepon');
			$status        				= $this->input->post('status');

			$data = array(
				'nama_perusahaan'    	=>   $nama_perusahaan,
				'nama_distributor'		=>   $nama_distributor,
				'no_telp_distributor'	    	=>   $nomor_telepon,
				'status_distributor'			=>   $status,
				'date_created'			=> now('Asia/Jakarta'),
				'date_updated'			=> now('Asia/Jakarta')
			);

			$que = $this->pegawai_model->tambah_distributor($data, 'distributor');
			if (!$que) {
				$this->db->_error_message();
				die();
			}
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data telah berhasil ditambahkan.</div>');
			$this->index();
		}
	}
}
