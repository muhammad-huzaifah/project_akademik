<?php

class Model_user extends CI_Model
{
    function checkLogin($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        $user = $this->db->get('tabel_user')->row_array();
        return $user;
    }
}
