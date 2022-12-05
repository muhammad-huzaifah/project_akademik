<?php

class Model_mapel extends CI_Model
{
	public $table = 'tabel_mapel';

	function save() {
		$data = array(
			'kd_mapel'	=>$this->input->post('kd_mapel', TRUE),
			'nama_mapel'=>$this->input->post('nama_mapel', TRUE)
		);
		$this->db->insert($this->table, $data);
	}

	function update() {
		$data = array(
//			'kd_mapel'	=>$this->input->post('kd_mapel', TRUE),
			'nama_mapel'=>$this->input->post('nama_mapel', TRUE)
		);
		$mapel = $this->input->post('kd_mapel');
		$this->db->where('kd_mapel', $mapel);
		$this->db->update($this->table, $data);
	}

}
