<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// $this->load->model('M_admin');
	}

	public function index()
	{

		$data['title'] = 'Login';
		$this->load->view('login/index', $data);
	}

	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$user = $this->db->get_where('user', ['username' => $username])->row_array();
		$cek = $this->db->get_where('user', ['username' => $username, 'password' => $password])->row_array();

		// cek user
		if ($user['active'] == 1) {
			//cek login
			if (count($cek) >= 1) {
				$data['user'] = $cek['username'];
				$data['role'] = $cek['role'];
				$this->session->set_userdata($data);
				redirect('dashboard');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Wrong password</div>');
				redirect('login');
			}
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">User Tidak Aktif</div>');
			redirect('login');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('user');
        $this->session->unset_userdata('role');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil Logout</div>');
		redirect('login');
	}
}
