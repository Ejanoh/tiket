<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
    public function get()
    {

        $sql = "SELECT * FROM user";

        $data = $this->db->query($sql);

        return $data->result();
    }

    public function adddata($data)
    {
        $sql = "INSERT INTO `user`(`id`,`nama`, `username`, `password`, `active`, `role`) VALUES ('','" . $data['nama'] . "','" . $data['username'] . "','" . $data['password'] . "','" . $data['active'] . "','" . $data['role'] . " ')";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    public function update($data)
    {
        $sql = "UPDATE `user` SET `nama` = '" . $data['nama'] . "',`username` = '" . $data['username'] . "', `password` = '" . $data['password'] . "', `role` = '" . $data['role'] . "', `active` = '" . $data['active'] .  "' WHERE `id` = '" . $data['id'] . "';";

        $this->db->query($sql);

        return $this->db->affected_rows();
    }

    public function nonaktif($id)
    {
        $sql = "UPDATE `user` SET `active` = '0' WHERE `id` = '" . $id . "';";

        $this->db->query($sql);

        return $this->db->affected_rows();
    }

    public function aktif($id)
    {
        $sql = "UPDATE `user` SET `active` = '1' WHERE `id` = '" . $id . "';";

        $this->db->query($sql);

        return $this->db->affected_rows();
    }
}
