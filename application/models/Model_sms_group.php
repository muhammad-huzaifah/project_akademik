<?php

class Model_sms_group extends CI_Model
{
	public $table = 'tabel_sms_group';

	function save() {
		$data = array(
			'kd_sms_group'	=>$this->input->post('kd_sms_group', TRUE),
			'nama_sms_group'=>$this->input->post('nama_sms_group', TRUE)
		);
		$this->db->insert($this->table, $data);
	}

	function update() {
		$data = array(
//			'kd_sms_group'	=>$this->input->post('kd_sms_group', TRUE),
			'nama_sms_group'=>$this->input->post('nama_sms_group', TRUE)
		);
		$sms_group = $this->input->post('kd_sms_group');
		$this->db->where('kd_sms_group', $sms_group);
		$this->db->update($this->table, $data);
	}

}
