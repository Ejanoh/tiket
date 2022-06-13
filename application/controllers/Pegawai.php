<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('M_pegawai');
	}

	public function index()
	{
		$data = [
			'title' => 'Pegawai',
			'pegawai' => $this->M_pegawai->get(),
		];
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/navbar', $data);
		$this->load->view('conten/pegawai/index');
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
		$result = $this->M_pegawai->adddata($data); 
		if ($result > 0) {
			// echo "Berhasillllllll";
			$this->session->set_flashdata('pesan', 'Berhasil Menambahkan Data Pegawai..');
			redirect('Pegawai');
		} else {
			// echo "Gagalllllllllllllllll";
			$this->session->set_flashdata('error', 'Gagal Menambahkan Data Pegawai..');
			redirect('Pegawai');
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
		$result = $this->M_pegawai->update($data); 
		if ($result > 0) {
			$this->session->set_flashdata('pesan', 'Berhasil Mengubah Data Pegawai..');
			redirect('Pegawai');
		} else {
			$this->session->set_flashdata('error', 'Gagal Mengubah Data Pegawai..');
			redirect('Pegawai');
		}
	}

	public function nonaktif($id)
	{
		$result = $this->M_pegawai->nonaktif($id);
		if ($result > 0) {
			$this->session->set_flashdata('pesan', 'Pegawai Berhasil di Non Aktifkan');
			redirect('Pegawai');
		} else {
			$this->session->set_flashdata('error', 'Pegawai Gagal di Non Aktifkan');
			redirect('Pegawai');
		}
	}

	public function aktif($id)
	{
		$result = $this->M_pegawai->aktif($id);
		if ($result > 0) {
			$this->session->set_flashdata('pesan', 'Pegawai Berhasil di Aktifkan');
			redirect('Pegawai');
		} else {
			$this->session->set_flashdata('error', 'Pegawai Gagal di Aktifkan');
			redirect('Pegawai');
		}
	}
}
