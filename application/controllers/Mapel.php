<?php

class Mapel extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		//CheckAksesModule();
		$this->load->library('ssp');
		$this->load->model('Model_mapel');
	}

	function data() {
		// nama tabel
		$table = 'tabel_mapel';
		// nama PK
		$primaryKey = 'kd_mapel';
		// List field
		$columns = array(
			array('db' => 'kd_mapel','dt' => 'kd_mapel'),
			array('db' => 'nama_mapel','dt' => 'nama_mapel'),
			array(
				'db' => 'kd_mapel',
				'dt' => 'aksi',
				'formatter' => function($d) {
					return anchor('mapel/edit/'.$d, '<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-warning tooltips" data-placement="top" data-original-title="Edit"').'
					 '.anchor('mapel/delete/'.$d, '<i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger tooltips" data-placement="top" data-original-title="Delete"');
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
		$this->template->load('template', 'mapel/list');
	}

	function add(){
		if (isset($_POST['submit'])) {
//			echo "save";
			$this->Model_mapel->save();
			redirect('mapel');
		} else {
			$this->template->load('template', 'mapel/add');
		}
	}

	function edit() {
	if (isset($_POST['submit'])){
		$this->Model_mapel->update();
		redirect('mapel');
	}else {
		$edit 			= $this->uri->segment(3);
		$data['mapel'] 	= $this->db->get_where('tabel_mapel', array('kd_mapel'=>$edit))->row_array();
		$this->template->load('template', 'mapel/edit', $data);
	}
	}

	function delete() {
		$edit = $this->uri->segment(3);
		if (!empty($edit)) {
			$this->db->where('kd_mapel', $edit);
			$this->db->delete('tabel_mapel');
		}
		redirect('mapel');
	}


}

