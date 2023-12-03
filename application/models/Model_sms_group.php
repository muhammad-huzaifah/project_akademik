<?php

class Model_sms_group extends CI_Model
{
	public $table = 'tabel_sms_group';

	function save() {
		$data = array(
<<<<<<< HEAD
			'nama_group'=>$this->input->post('nama_group', TRUE)
=======
			'kd_sms_group'	=>$this->input->post('kd_sms_group', TRUE),
			'nama_sms_group'=>$this->input->post('nama_sms_group', TRUE)
>>>>>>> origin/master
		);
		$this->db->insert($this->table, $data);
	}

	function update() {
		$data = array(
//			'kd_sms_group'	=>$this->input->post('kd_sms_group', TRUE),
<<<<<<< HEAD
			'nama_group'=>$this->input->post('nama_group', TRUE)
		);
		$sms_group = $this->input->post('id');
		$this->db->where('id', $sms_group);
=======
			'nama_sms_group'=>$this->input->post('nama_sms_group', TRUE)
		);
		$sms_group = $this->input->post('kd_sms_group');
		$this->db->where('kd_sms_group', $sms_group);
>>>>>>> origin/master
		$this->db->update($this->table, $data);
	}

}
