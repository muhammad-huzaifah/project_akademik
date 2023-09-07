<?php
class auth extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_user');
        $this->load->model('Model_guru');
    }

    function index() {
        $this->load->view('auth/login');
	}

    function check_login () {
        if (isset($_POST['submit'])){
            //proses login di sini
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $loginUser   = $this->Model_user->checkLogin($username, $password);
//			print_r($result);
            $loginGuru = $this->Model_guru->checkLogin($username, $password);
			if (!empty($loginUser)) {
//				echo " Login sukses ";
				$this->session->set_userdata($loginUser);
				redirect('siswa');
			} elseif (!empty($loginGuru)) {
                // login guru
                /*print_r($loginGuru);
                die;*/

                $session = array('nama_lengkap'=>$loginGuru['nama_guru'], 'id_level_user'=>3);
//                print_r($session);
//                die;

                $this->session->set_userdata($session);

                redirect('jadwal');
                } else {
                    //echo "gagal login";
                    redirect('auth');
                }
        }
    }

	function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}

}


