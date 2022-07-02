<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reckup extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('M_tiket');		
		$this->load->model('M_pegawai');		
	}

	public function index()
	{
		$data = [
			'title' => 'Reckup Tiket',
		];
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/navbar', $data);
		$this->load->view('conten/reckup/index');
		$this->load->view('layout/footer');
	}
	
	public function get($id, $bulan = '')
	{
		if ($bulan == '') {
			$bulan = '';
		} else {
			$bln = $bulan;
		}
		$data = [
			'title' => 'Reckup Tiket',
			'pegawai' => $this->M_pegawai->get(),
			'select' => $id,
			'bln' => $bln
		];
		if ($id == 1) {
			$data['tiket'] = $this->M_tiket->getsatua();			
			$data['tikets'] = $this->M_tiket->getsatub();			
		} else if ($id == 2) {
			$data['tiket'] = $this->M_tiket->getdua();			
		} else if ($id == 3) {
			$data['tiket'] = $this->M_tiket->gettiga();			
		} else if ($id == 4) {
			$data['tiket'] = $this->M_tiket->get($bln);			
			
		}
		
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/navbar', $data);
		$this->load->view('conten/reckup/indexx');
		$this->load->view('layout/footer');
	}
}
