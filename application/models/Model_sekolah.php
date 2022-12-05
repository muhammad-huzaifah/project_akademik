<?php

class Model_sekolah extends CI_Model
{
	public $table = 'table_sekolah_info';

	function update() {

		$data = array(
			'nama_sekolah'			=>$this->input->post('nama_sekolah', TRUE),
			'alamat_sekolah'		=>$this->input->post('alamat_sekolah', TRUE),
			'email'					=>$this->input->post('email', TRUE),
			'Telepon'				=>$this->input->post('Telepon', TRUE),
			'id_jenjang_sekolah'	=>$this->input->post('id_jenjang_sekolah', TRUE)
		);
		$id_sekolah = $this->input->post('id_sekolah');
		$this->db->where('id_sekolah', $id_sekolah);
		$this->db->update($this->table, $data);
	}
}
