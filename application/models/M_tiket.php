<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tiket extends CI_Model
{
	public function get()
	{

		$sql = "SELECT * FROM tiket";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function adddata($data)
	{
		$sql = "INSERT INTO `tiket`(`id`, `tgl`, `desk`, `pic`, `request`, `pelapor`, `team`, `priority` , `status`, `divisi`, `bulan`, `tahun`) VALUES ('', '" . $data['tgl'] . "', '" . $data['desk'] . "','" . $data['pic'] . "', '" . $data['request'] . "', '" . $data['pelapor'] . "', '" . $data['team'] . "', '" . $data['priority'] . "', '" . $data['status'] . "', '" . $data['divisi'] . "', '" . $data['bulan'] . "', '" . $data['tahun'] . "')";
		$this->db->query($sql);
		return $this->db->affected_rows();
	}

	public function update($data) 
	{	
		$sql = "UPDATE `tiket` SET `desk` = '" .$data['desk'] ."', `pic` = '" .$data['pic'] ."', `request` = '" .$data['request'] ."', `pelapor` = '" .$data['pelapor'] ."', `team` = '" .$data['team'] ."', `priority` = '" .$data['priority'] ."', `status` = '" .$data['status'] ."', `divisi` = '" .$data['divisi'] ."' WHERE `id` = '" .$data['id'] ."';";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM tiket WHERE id ='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	// public function nonaktif($id)
	// {
	// 	$sql = "UPDATE `pegawai` SET `status` = '0' WHERE `id` = '" .$id ."';";

	// 	$this->db->query($sql);

	// 	return $this->db->affected_rows();
	// }

	// public function aktif($id)
	// {
	// 	$sql = "UPDATE `pegawai` SET `status` = '1' WHERE `id` = '" .$id ."';";

	// 	$this->db->query($sql);

	// 	return $this->db->affected_rows();
	// }
}
