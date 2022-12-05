<?php

class Model_jurusan extends CI_Model
{
	public $table = 'tabel_jurusan';

	function save() {
		$data = array(
			'kd_jurusan'	=>$this->input->post('kd_jurusan', TRUE),
			'nama_jurusan'=>$this->input->post('nama_jurusan', TRUE)
		);
		$this->db->insert($this->table, $data);
	}

	function update() {
		$data = array(
//			'kd_jurusan'	=>$this->input->post('kd_jurusan', TRUE),
			'nama_jurusan'=>$this->input->post('nama_jurusan', TRUE)
		);
		$jurusan = $this->input->post('kd_jurusan');
		$this->db->where('kd_jurusan', $jurusan);
		$this->db->update($this->table, $data);
	}

}
