<?php

class Model_guru extends CI_Model
{
	public $table = 'tabel_guru';

	function save() {
		$data = array(
			'nuptk'			=>$this->input->post('nuptk', TRUE),
			'nama_guru'		=>$this->input->post('nama_guru', TRUE),
			'jenis_kelamin'	=>$this->input->post('jenis_kelamin', TRUE)
		);
//		print_r($data);
//		print_r($_POST);
//		die;
		$this->db->insert($this->table, $data);
	}

	function update() {
		$data = array(
			'nuptk'	=>$this->input->post('nuptk', TRUE),
			'nama_guru'=>$this->input->post('nama_guru', TRUE),
			'jenis_kelamin'=>$this->input->post('jenis_kelamin', TRUE)
		);
		$id_guru = $this->input->post('id_guru');
		$this->db->where('id_guru', $id_guru);
		$this->db->update($this->table, $data);
	}

}
