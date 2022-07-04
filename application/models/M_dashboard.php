<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_dashboard extends CI_Model
{
    public function progress()
    {
        return $this->db->get_where('tiket', ['status' => 1])->num_rows();
    }
    public function closed()
    {
        return $this->db->get_where('tiket', ['status' => 2])->num_rows();
    }
    public function pending()
    {
        return $this->db->get_where('tiket', ['status' => 3])->num_rows();
    }
    public function totalt()
    {
        return $this->db->get('tiket')->num_rows();
    }
    public function aktif()
    {
        return $this->db->get_where('pegawai', ['status' => 1])->num_rows();
    }
    public function taktif()
    {
        return $this->db->get_where('pegawai', ['status' => 2])->num_rows();
    }
    public function totalp()
    {
        return $this->db->get('pegawai')->num_rows();
    }
}
