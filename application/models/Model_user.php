<?php

class Model_user extends CI_Model
{
    function checkLogin($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        $user = $this->db->get('v_tabel_user')->row_array();
        return $user;
    }

    public $table = 'tabel_user';

	function save ($foto) {
        $data = array (
            'nama_lengkap'  => $this->input->post('nama_lengkap', TRUE),
            'username'      => $this->input->post('username', TRUE),
            'password'      => md5($this->input->post('password', TRUE)),
            'id_level_user' => $this->input->post('id_level_user', TRUE),
            'foto'          => $foto,
        );
//        print_r($data);
        $this->db->insert($this->table, $data);
    }

	function update($foto) {
		if (empty($foto)) {
			// jangan upload field foto
			$data = array(
				'nama_lengkap' => $this->input->post('nama_lengkap', TRUE),
				'username' => $this->input->post('username', TRUE),
				'password' => md5($this->input->post('password', TRUE)),
				'id_level_user' => $this->input->post('id_level_user', TRUE)
			);
		}else {
			// update field foto
			$data = array (
				'nama_lengkap'  => $this->input->post('nama_lengkap', TRUE),
				'username'      => $this->input->post('username', TRUE),
				'password'      => md5($this->input->post('password', TRUE)),
				'id_level_user' => $this->input->post('id_level_user', TRUE),
				'foto' => $foto
			);
		}



		$id_user = $this->input->post('id_user');
		$this->db->where('id_user', $id_user);
		$this->db->update($this->table, $data);
	}

}
