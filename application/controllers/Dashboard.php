<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	// public function __construct() {
	// 	parent::__construct();
	// 	$this->load->model('M_admin');
	// }

	public function index()
	{
		$data = [
			'title' 		=> 'Dashboard',
		];
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/navbar', $data);
		$this->load->view('conten/dashboard/index');
		$this->load->view('layout/footer');
	}
}
