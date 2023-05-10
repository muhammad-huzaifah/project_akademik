<?php

class Users extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		//CheckAksesModule();
		$this->load->library('ssp');
		$this->load->model('Model_user');
	}

	function data() {
		// nama tabel
		$table = 'v_tabel_user';
		// nama PK
		$primaryKey = 'id_user';
		// List field
		$columns = array(
			array('db' => 'foto','dt' => 'foto'),
			array('db' => 'nama_lengkap','dt' => 'nama_lengkap'),
			array('db' => 'nama_level','dt' => 'nama_level'),
			array(
				'db' => 'id_user',
				'dt' => 'aksi',
				'formatter' => function($d) {
					return anchor('users/edit/'.$d, '<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-warning tooltips" data-placement="top" data-original-title="Edit"').'
					 '.anchor('users/delete/'.$d, '<i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger tooltips" data-placement="top" data-original-title="Delete"');
				}
			)
			);

		$sql_details = array(
			'user' 	=> $this->db->username,
			'pass' 	=> $this->db->password,
			'db' 	=> $this->db->database,
			'host' 	=> $this->db->hostname
		);

		echo json_encode(
			SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
		);
	}

	function index(){
		$this->template->load('template', 'users/list');
	}

	function add(){
		if (isset($_POST['submit'])) {
//			echo "save";
			$this->Model_user->save();
			redirect('users');
		} else {
			$this->template->load('template', 'users/add');
		}
	}

	function edit() {
	if (isset($_POST['submit'])){
		$this->Model_user->update();
		redirect('users');
	}else {
		$edit 			= $this->uri->segment(3);
		$data['users'] 	= $this->db->get_where('tabel_users', array('kd_users'=>$edit))->row_array();
		$this->template->load('template', 'users/edit', $data);
	}
	}

	function delete() {
		$edit = $this->uri->segment(3);
		if (!empty($edit)) {
			$this->db->where('kd_users', $edit);
			$this->db->delete('tabel_users');
		}
		redirect('users');
	}


}

