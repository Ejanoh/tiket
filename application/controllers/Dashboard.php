<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_dashboard');
		is_logged_in();
	}

	public function index()
	{
		$data = [
			'title' => 'Dashboard',
			'progres' => $this->M_dashboard->progress(),
			'pending' => $this->M_dashboard->pending(),
			'closed' => $this->M_dashboard->closed(),
			'totalt' => $this->M_dashboard->totalt(),
			'aktif' => $this->M_dashboard->aktif(),
			'taktif' => $this->M_dashboard->taktif(),
			'totalp' => $this->M_dashboard->totalp(),
		];
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/navbar', $data);
		$this->load->view('conten/dashboard/index');
		$this->load->view('layout/footer');
	}
}
