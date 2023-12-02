<?php

class Model_sms_group extends CI_Model
{
	public $table = 'tabel_sms_group';

	function save() {
		$data = array(
			'nama_group'=>$this->input->post('nama_group', TRUE)
		);
		$this->db->insert($this->table, $data);
	}

	function update() {
		$data = array(
//			'kd_sms_group'	=>$this->input->post('kd_sms_group', TRUE),
			'nama_group'=>$this->input->post('nama_group', TRUE)
		);
		$sms_group = $this->input->post('id');
		$this->db->where('id', $sms_group);
		$this->db->update($this->table, $data);
	}

}
