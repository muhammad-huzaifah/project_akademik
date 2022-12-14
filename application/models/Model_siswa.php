<?php

class Model_siswa extends CI_Model
{
	public $table = 'tabel_siswa';

	function save($foto) {
		$data = array(
			'nim' 			=>$this->input->post('nim', TRUE),
			'kd_agama'		=>$this->input->post('agama', TRUE),
			'nama' 			=>$this->input->post('nama', TRUE),
			'tanggal_lahir'	=>$this->input->post('tanggal_lahir', TRUE),
			'tempat_lahir'	=>$this->input->post('tempat_lahir', TRUE),
			'gender' 		=>$this->input->post('gender', TRUE),
			'foto' 			=> $foto
		);
//		print_r($data);
		$this->db->insert($this->table, $data);
	}

	function update($foto) {
		if (empty($foto)) {
			// update without foto
			$data = array(
				'nama' 			=> $this->input->post('nama', TRUE),
				'kd_agama' 		=> $this->input->post('agama', TRUE),
				'tanggal_lahir' => $this->input->post('tanggal_lahir', TRUE),
				'tempat_lahir' 	=> $this->input->post('tempat_lahir', TRUE),
				'gender' 		=> $this->input->post('gender', TRUE),
			);
		}else{
			// update with foto
			$data = array(
				'nama' 			=> $this->input->post('nama', TRUE),
				'kd_agama' 		=> $this->input->post('agama', TRUE),
				'tanggal_lahir' => $this->input->post('tanggal_lahir', TRUE),
				'tempat_lahir' 	=> $this->input->post('tempat_lahir', TRUE),
				'gender' 		=> $this->input->post('gender', TRUE),
				'foto' 			=> $foto
			);
		}



		$nim = $this->input->post('nim');
		$this->db->where('nim', $nim);
		$this->db->update($this->table, $data);
	}

}
