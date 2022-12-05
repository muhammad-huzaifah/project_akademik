<?php

class Model_ruangan extends CI_Model
{
	public $table = 'tabel_ruangan';

	function save() {
		$data = array(
			'kd_ruangan' 	=>$this->input->post('kd_ruangan', TRUE),
			'nama_ruangan'	=>$this->input->post('nama_ruangan', TRUE)
		);
		$this->db->insert($this->table, $data);
	}

	function update() {
		$data = array(
//			'kd_ruangan' 	=>$this->input->post('kd_ruangan', TRUE),
			'nama_ruangan'	=>$this->input->post('nama_ruangan', TRUE)
		);
		$ruangan = $this->input->post('kd_ruangan');
		$this->db->where('kd_ruangan', $ruangan);
		$this->db->update($this->table, $data);
	}

}
