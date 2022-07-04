<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('M_user');
    }

    public function index()
    {
        $data = [
            'title' => 'Management User',
            'user' => $this->M_user->get(),
        ];
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('conten/user/index');
        $this->load->view('layout/footer');
    }

    public function adddata()
    {
        $data = [
            // 'id' => $this->input->post('id'),
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'active' => $this->input->post('active'),
            'role' => $this->input->post('role'),
        ];
        $result = $this->M_user->adddata($data);
        if ($result > 0) {
            // echo "Berhasillllllll";
            $this->session->set_flashdata('pesan', 'Berhasil Menambahkan Data User..');
            redirect('User');
        } else {
            // echo "Gagalllllllllllllllll";
            $this->session->set_flashdata('error', 'Gagal Menambahkan Data User..');
            redirect('User');
        }
    }

    public function update()
    {
        $data = [
            'id' => $this->input->post('id'),
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'role' => $this->input->post('role'),
            'active' => $this->input->post('active'),
        ];
        $result = $this->M_user->update($data);
        if ($result > 0) {
            $this->session->set_flashdata('pesan', 'Berhasil Mengubah Data User..');
            redirect('User');
        } else {
            $this->session->set_flashdata('error', 'Gagal Mengubah Data User..');
            redirect('User');
        }
    }

    public function nonaktif($id)
    {
        $result = $this->M_user->nonaktif($id);
        if ($result > 0) {
            $this->session->set_flashdata('pesan', 'User Berhasil di Non Aktifkan');
            redirect('User');
        } else {
            $this->session->set_flashdata('error', 'User Gagal di Non Aktifkan');
            redirect('User');
        }
    }

    public function aktif($id)
    {
        $result = $this->M_user->aktif($id);
        if ($result > 0) {
            $this->session->set_flashdata('pesan', 'User Berhasil di Aktifkan');
            redirect('User');
        } else {
            $this->session->set_flashdata('error', 'User Gagal di Aktifkan');
            redirect('User');
        }
    }
}
