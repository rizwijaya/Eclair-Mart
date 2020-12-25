<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemilik extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct(); // you have missed this line.
		$this->load->library('session');
		if (!$this->session->userdata('email')) {
			redirect('home');
		}

		$session_data = $this->session->userdata('id_grup');
		if ($session_data != 1) {
			redirect('home/redirecting');
		}
	}

	public function index()
	{
        //echo "Ini Halaman Pemilik"; die;
		$this->load->view('template/admin/header');
		$this->load->view('template/admin/sidebar');
        $this->load->view('dashboard');
	}

	function tambahpegawai()
	{
		$this->load->view('template/admin/header');
		$this->load->view('template/admin/sidebar');
        $this->load->view('pegawai/tambahpegawai');
	}

	function tambahinpegawai()
	{
		$this->load->helper(array('url', 'security'));
		$this->load->library(array('form_validation'));

		$this->form_validation->set_rules(
			'nama',
			'Nama',
			'trim|min_length[2]|max_length[128]|xss_clean|required'
		);
		$this->form_validation->set_rules(
			'alamat_pegawai',
			'Alamat Pegawai',
			'trim|min_length[2]|max_length[128]|xss_clean|required'
		);
		$this->form_validation->set_rules(
			'no_telp_pegawai',
			'Nomor Telpon Pegawai',
			'trim|min_length[2]|max_length[128]|xss_clean|required'
		);
		$this->form_validation->set_rules(
			'email',
			'Email',
			'trim|valid_email|is_unique[users.email]|min_length[2]|max_length[128]|xss_clean|required',
			['is_unique' => 'This email has already registered!']
		);
		$this->form_validation->set_rules(
			'password',
			'Password',
			'trim|min_length[5]|max_length[128]|xss_clean|required'
		);

		$this->form_validation->set_rules(
			'confirm_password',
			'Confirm Password',
			'required|matches[password]'
		);

		if ($this->form_validation->run() == FALSE) {
			$this->tambahpegawai();
		} else {
			$nama				=	$this->input->post('nama');
			$email				=	$this->input->post('email');
			$alamat_pegawai		=	$this->input->post('alamat_pegawai');
			$no_telp_pegawai	=	$this->input->post('no_telp_pegawai');
			$password			=	$this->input->post('password');
			$id_grup			=	2;
			$data = array(
				'nama'				=>	$nama,
				'email'				=>	$email,
				'alamat_pegawai'	=>	$alamat_pegawai,
				'no_telp_pegawai'	=>	$no_telp_pegawai,
				'password'			=>	password_hash($password, PASSWORD_DEFAULT),
				'id_grup'			=>	$id_grup
			);

			$this->load->model('account');
			$this->account->insertNewUser($data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Pegawai Berhasil ditambahkan!. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</button></div>');
			$this->tambahpegawai();
		}
	}
}
