<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tiket extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('M_tiket');
	}

	public function index()
	{
		$data = [
			'title' => 'Tiket',
			'tiket' => $this->M_tiket->get(),
		];
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/navbar', $data);
		$this->load->view('conten/tiket/index');
		$this->load->view('layout/footer');
	}

	public function adddata()
	{
		$data = [
			'namal' => $this->input->post('namal'),
			'namap' => $this->input->post('namap'),
			'jk' => $this->input->post('jk'),
			'divisi' => $this->input->post('divisi'),
			'nohp' => $this->input->post('nohp'),
			'alamat' => $this->input->post('alamat')
		];
		$result = $this->M_tiket->adddata($data); 
		if ($result > 0) {
			// echo "Berhasillllllll";
			$this->session->set_flashdata('pesan', 'Berhasil Menambahkan Data tiket..');
			redirect('tiket');
		} else {
			// echo "Gagalllllllllllllllll";
			$this->session->set_flashdata('error', 'Gagal Menambahkan Data tiket..');
			redirect('tiket');
		}
	}

	public function update()
	{
		$data = [
			'id' => $this->input->post('id'),
			'namal' => $this->input->post('namal'),
			'namap' => $this->input->post('namap'),
			'jk' => $this->input->post('jk'),
			'divisi' => $this->input->post('divisi'),
			'nohp' => $this->input->post('nohp'),
			'alamat' => $this->input->post('alamat')
		];
		$result = $this->M_tiket->update($data); 
		if ($result > 0) {
			$this->session->set_flashdata('pesan', 'Berhasil Mengubah Data tiket..');
			redirect('tiket');
		} else {
			$this->session->set_flashdata('error', 'Gagal Mengubah Data tiket..');
			redirect('tiket');
		}
	}

	public function nonaktif($id)
	{
		$result = $this->M_tiket->nonaktif($id);
		if ($result > 0) {
			$this->session->set_flashdata('pesan', 'tiket Berhasil di Non Aktifkan');
			redirect('tiket');
		} else {
			$this->session->set_flashdata('error', 'tiket Gagal di Non Aktifkan');
			redirect('tiket');
		}
	}

	public function aktif($id)
	{
		$result = $this->M_tiket->aktif($id);
		if ($result > 0) {
			$this->session->set_flashdata('pesan', 'tiket Berhasil di Aktifkan');
			redirect('tiket');
		} else {
			$this->session->set_flashdata('error', 'tiket Gagal di Aktifkan');
			redirect('tiket');
		}
	}
}
