<?php

class Model_kurikulum extends CI_Model
{
	public $table = 'tabel_kurikulum';

	function save() {
		$data = array(
			'nama_kurikulum'=>$this->input->post('nama_kurikulum', TRUE),
			'is_aktif'		=>$this->input->post('is_aktif', TRUE)
		);
		$this->db->insert($this->table, $data);
	}

	function update() {
		$data = array(
			'nama_kurikulum'=>$this->input->post('nama_kurikulum', TRUE),
			'is_aktif'		=>$this->input->post('is_aktif', TRUE)
		);
		$id_kurikulum = $this->input->post('id_kurikulum');
		$this->db->where('id_kurikulum', $id_kurikulum);
		$this->db->update($this->table, $data);
	}

}
