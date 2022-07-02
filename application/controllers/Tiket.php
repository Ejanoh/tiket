<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tiket extends CI_Controller
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
		$bln = date('m');
		$data = [
			'title' => 'Tiket',
			'tiket' => $this->M_tiket->get($bln),
			'pegawai' => $this->M_pegawai->get(),
			'bulan' => $bln,
		];
		// print_r($data['tiket']); die;
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/navbar', $data);
		$this->load->view('conten/tiket/index');
		$this->load->view('layout/footer');
	}

	public function bulan($bln)
	{
		$data = [
			'title' => 'Tiket',
			'tiket' => $this->M_tiket->get($bln),
			'pegawai' => $this->M_pegawai->get(),
			'bulan' => '0'.$bln,
		];
		// print_r($data['tiket']); die;
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/navbar', $data);
		$this->load->view('conten/tiket/index');
		$this->load->view('layout/footer');
	}

	public function adddata()
	{
		$tgl = date('d');
		$bln = date('m');
		$thn = date('Y');
		$data = [
			'tgl' => $tgl,
			'desk' => $this->input->post('desk'),
			'pic' => $this->input->post('pic'),
			'request' => $this->input->post('request'),
			'pelapor' => $this->input->post('pelapor'),
			'team' => $this->input->post('team'),
			'priority' => $this->input->post('priority'),
			'status' => $this->input->post('status'),
			'divisi' => $this->input->post('divisi'),
			'bulan' => $bln,
			'tahun' => $thn
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
			'desk' => $this->input->post('desk'),
			'pic' => $this->input->post('pic'),
			'request' => $this->input->post('request'),
			'pelapor' => $this->input->post('pelapor'),
			'team' => $this->input->post('team'),
			'priority' => $this->input->post('priority'),
			'status' => $this->input->post('status'),
			'divisi' => $this->input->post('divisi')
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

	public function delete($id)
	{
		$result = $this->M_tiket->delete($id);
		if ($result > 0) {
			$this->session->set_flashdata('pesan', 'Berhasil Menghapus Data tiket..');
			redirect('tiket');
		} else {
			$this->session->set_flashdata('error', 'Gagal Menghapus Data tiket..');
			redirect('tiket');
		}
	}

	// public function nonaktif($id)
	// {
	// 	$result = $this->M_tiket->nonaktif($id);
	// 	if ($result > 0) {
	// 		$this->session->set_flashdata('pesan', 'tiket Berhasil di Non Aktifkan');
	// 		redirect('tiket');
	// 	} else {
	// 		$this->session->set_flashdata('error', 'tiket Gagal di Non Aktifkan');
	// 		redirect('tiket');
	// 	}
	// }

	// public function aktif($id)
	// {
	// 	$result = $this->M_tiket->aktif($id);
	// 	if ($result > 0) {
	// 		$this->session->set_flashdata('pesan', 'tiket Berhasil di Aktifkan');
	// 		redirect('tiket');
	// 	} else {
	// 		$this->session->set_flashdata('error', 'tiket Gagal di Aktifkan');
	// 		redirect('tiket');
	// 	}
	// }
}
