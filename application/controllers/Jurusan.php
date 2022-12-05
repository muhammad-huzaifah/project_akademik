<?php

class Jurusan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		//CheckAksesModule();
		$this->load->library('ssp');
		$this->load->model('Model_jurusan');
	}

	function data() {
		// nama tabel
		$table = 'tabel_jurusan';
		// nama PK
		$primaryKey = 'kd_jurusan';
		// List field
		$columns = array(
			array('db' => 'kd_jurusan','dt' => 'kd_jurusan'),
			array('db' => 'nama_jurusan','dt' => 'nama_jurusan'),
			array(
				'db' => 'kd_jurusan',
				'dt' => 'aksi',
				'formatter' => function($d) {
					return anchor('jurusan/edit/'.$d, '<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-warning tooltips" data-placement="top" data-original-title="Edit"').'
					 '.anchor('jurusan/delete/'.$d, '<i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger tooltips" data-placement="top" data-original-title="Delete"');
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
		$this->template->load('template', 'jurusan/list');
	}

	function add(){
		if (isset($_POST['submit'])) {
//			echo "save";
			$this->Model_jurusan->save();
			redirect('jurusan');
		} else {
			$this->template->load('template', 'jurusan/add');
		}
	}

	function edit() {
	if (isset($_POST['submit'])){
		$this->Model_jurusan->update();
		redirect('jurusan');
	}else {
		$edit 			= $this->uri->segment(3);
		$data['jurusan'] 	= $this->db->get_where('tabel_jurusan', array('kd_jurusan'=>$edit))->row_array();
		$this->template->load('template', 'jurusan/edit', $data);
	}
	}

	function delete() {
		$edit = $this->uri->segment(3);
		if (!empty($edit)) {
			$this->db->where('kd_jurusan', $edit);
			$this->db->delete('tabel_jurusan');
		}
		redirect('jurusan');
	}


}

