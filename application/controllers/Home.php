<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->model('barang_model');
		$data['barang'] = $this->barang_model->select_barang()->result();

		$this->load->view('template/home/header');
        $this->load->view('home', $data);
        $this->load->view('template/home/footer');
	}

	public function redirecting()
    {
        if (!$this->session->userdata('email')) {
            redirect('home');
        }
        $session_data = $this->session->userdata('id_grup');

        switch ($session_data['id_grup']) {
            case 1:
                redirect('pemilik');
                break;
            case 2:
                redirect('pegawai');
                break;
            case 3:
                redirect('pelanggan');
                break;
            default:
                redirect('home');
                break;
        }
        return;
    }

	public function login()
	{
		if ($this->session->userdata('email')) {
            $this->redirecting();
		}
		
		$this->load->view('template/login/header');
        $this->load->view('login');
        $this->load->view('template/login/footer');
	}

	public function register()
    {
		if ($this->session->userdata('email')) {
			$this->redirecting();
        }

		$this->load->view('template/login/header');
        $this->load->view('register');
        $this->load->view('template/login/footer');
    }
}
