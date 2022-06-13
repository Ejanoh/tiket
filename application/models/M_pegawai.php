<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pegawai extends CI_Model
{
	public function get()
	{

		$sql = "SELECT * FROM pegawai";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function adddata($data)
	{
		$sql = "INSERT INTO `pegawai`(`id`, `namal`, `namap`, `divisi`, `jk`, `alamat`, `nohp`, `status`) VALUES ('','" . $data['namal'] . "','" . $data['namap'] . "','" . $data['divisi'] . "','" . $data['jk'] . "','" . $data['alamat'] . "','" . $data['nohp'] . "', '1')";
		$this->db->query($sql);
		return $this->db->affected_rows();
	}

	public function update($data) {		
		$sql = "UPDATE `pegawai` SET `namal` = '" .$data['namal'] ."', `namap` = '" .$data['namap'] ."', `jk` = '" .$data['jk'] ."', `divisi` = '" .$data['divisi'] ."', `alamat` = '" .$data['alamat'] ."', `nohp` = '" .$data['nohp'] ."' WHERE `id` = '" .$data['id'] ."';";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	// public function delete($id) {
	// 	$sql = "DELETE FROM user WHERE iduser='" .$id ."'";

	// 	$this->db->query($sql);

	// 	return $this->db->affected_rows();
	// }

	public function nonaktif($id)
	{
		$sql = "UPDATE `pegawai` SET `status` = '0' WHERE `id` = '" .$id ."';";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function aktif($id)
	{
		$sql = "UPDATE `pegawai` SET `status` = '1' WHERE `id` = '" .$id ."';";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
}
