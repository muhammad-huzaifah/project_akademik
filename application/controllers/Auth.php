<?php
class auth extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_user');
    }

    function index() {
			$this->load->view('auth/login');
	}

    function check_login () {
        if (isset($_POST['submit'])){
            //proses login di sini
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $result = $this->Model_user->checkLogin($username, $password);
//			print_r($result);
			if (!empty($result)) {
//				echo " Login sukses ";
				$this->session->set_userdata($result);
				redirect('siswa');
			} else {
//				echo "gagal login";
				redirect('auth');
			}
        } else {
            redirect('auth');
        }
    }

	function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}

}


