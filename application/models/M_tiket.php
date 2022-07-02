<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tiket extends CI_Model
{
	public function get($bln)
	{

		$sql = "SELECT * FROM tiket WHERE bulan = '$bln'";

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
		$sql = "UPDATE `tiket` SET `desk` = '" . $data['desk'] . "', `pic` = '" . $data['pic'] . "', `request` = '" . $data['request'] . "', `pelapor` = '" . $data['pelapor'] . "', `team` = '" . $data['team'] . "', `priority` = '" . $data['priority'] . "', `status` = '" . $data['status'] . "', `divisi` = '" . $data['divisi'] . "' WHERE `id` = '" . $data['id'] . "';";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id)
	{
		$sql = "DELETE FROM tiket WHERE id ='" . $id . "'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function getsatua()
	{

		$sql = "SELECT pic, COUNT(*) picc FROM `tiket` GROUP BY pic;";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function getsatub()
	{

		$sql = "SELECT team, COUNT(*) teams FROM `tiket` GROUP BY team;";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function getdua()
	{

		$sql = "SELECT t.id,
		t.tgl,
		t.desk,
		t.pic,
		t.request,
		t.pelapor,
		t.team,
		t.priority,
		t.status,
		t.divisi,
		t.bulan,
		t.tahun
		FROM tiket t
		JOIN (SELECT id, desk, pic, COUNT(*) AS cnt FROM `tiket` GROUP BY pic) tik ON (tik.pic = t.pic)
		ORDER BY tik.cnt DESC;";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function gettiga()
	{

		$sql = "SELECT t.id,
		t.tgl,
		t.desk,
		t.pic,
		t.request,
		t.pelapor,
		t.team,
		t.priority,
		t.status,
		t.divisi,
		t.bulan,
		t.tahun
		FROM tiket t
		JOIN (SELECT id, desk, team, COUNT(*) AS cnt FROM `tiket` GROUP BY team) tik ON (tik.team = t.team)
		ORDER BY tik.cnt DESC;";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function getempat($bln)
	{
		print_r($bln); die;
		$sql = "SELECT t.id,
		t.tgl,
		t.desk,
		t.pic,
		t.request,
		t.pelapor,
		t.team,
		t.priority,
		t.status,
		t.divisi,
		t.bulan,
		t.tahun
		FROM tiket t
		JOIN (SELECT id, desk, team, COUNT(*) AS cnt FROM `tiket` GROUP BY team) tik ON (tik.team = t.team)
		ORDER BY tik.cnt DESC;";

		$data = $this->db->query($sql);

		return $data->result();
	}
}
