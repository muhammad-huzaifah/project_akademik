<?php

class Sms_group extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		//CheckAksesModule();
		$this->load->library('ssp');
		$this->load->model('Model_sms_group');
	}

	function data() {
		// nama tabel
		$table = 'tabel_sms_group';
		// nama PK
		$primaryKey = 'id';
		// List field
		$columns = array(
			array('db' => 'nama_group','dt' => 'nama_group'),
			array(
				'db' => 'id',
				'dt' => 'aksi',
				'formatter' => function($d) {
					return anchor('sms_group/edit/'.$d, '<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-warning tooltips" data-placement="top" data-original-title="Edit"').'
					 '.anchor('sms_group/delete/'.$d, '<i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger tooltips" data-placement="top" data-original-title="Delete"');
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
		$this->template->load('template', 'sms_group/list');
	}

	function add(){
		if (isset($_POST['submit'])) {
//			echo "save";
			$this->Model_sms_group->save();
			redirect('sms_group');
		} else {
			$this->template->load('template', 'sms_group/add');
		}
	}

	function edit() {
	if (isset($_POST['submit'])){
		$this->Model_sms_group->update();
		redirect('sms_group');
	}else {
		$edit 			= $this->uri->segment(3);
		$data['sms_group'] 	= $this->db->get_where('tabel_sms_group', array('kd_sms_group'=>$edit))->row_array();
		$this->template->load('template', 'sms_group/edit', $data);
	}
	}

	function delete() {
		$edit = $this->uri->segment(3);
		if (!empty($edit)) {
			$this->db->where('kd_sms_group', $edit);
			$this->db->delete('tabel_sms_group');
		}
		redirect('sms_group');
	}


}

