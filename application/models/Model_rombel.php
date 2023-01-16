<?php

class Model_rombel extends CI_Model
{
	public $table = 'tabel_rombel';

	function save() {
		$data = array(
			'kd_jurusan'	=>$this->input->post('jurusan', TRUE),
			'kelas'			=>$this->input->post('kelas', TRUE),
			'nama_rombel'	=>$this->input->post('nama_rombel', TRUE)
		);
		$this->db->insert($this->table, $data);
	}

	function update() {
		$data = array(
			'kd_jurusan'	=>$this->input->post('jurusan', TRUE),
			'kelas'			=>$this->input->post('kelas', TRUE),
			'nama_rombel'	=>$this->input->post('nama_rombel', TRUE)
		);
		$rombel = $this->input->post('id_rombel');
		$this->db->where('id_rombel', $rombel);
		$this->db->update($this->table, $data);
	}

}
