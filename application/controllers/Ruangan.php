<?php

class Ruangan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		//CheckAksesModule();
		$this->load->library('ssp');
		$this->load->model('Model_ruangan');
	}

	function data() {
		// nama tabel
		$table = 'tabel_ruangan';
		// nama PK
		$primaryKey = 'kd_ruangan';
		// List field
		$columns = array(
			array('db' => 'kd_ruangan','dt' => 'kd_ruangan'),
			array('db' => 'nama_ruangan','dt' => 'nama_ruangan'),
			array(
				'db' => 'kd_ruangan',
				'dt' => 'aksi',
				'formatter' => function($d) {
//					return "<a href='edit.php?id=$d'>EDIT</a>";
					return anchor('ruangan/edit/'.$d, '<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-warning tooltips" data-placement="top" data-original-title="Edit"').'
					 '.anchor('ruangan/delete/'.$d, '<i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger tooltips" data-placement="top" data-original-title="Delete"');
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
		$this->template->load('template', 'ruangan/list');
	}

	function add(){
		if (isset($_POST['submit'])) {
//			echo "save";
			$this->Model_ruangan->save();
			redirect('ruangan');
		} else {
			$this->template->load('template', 'ruangan/add');
		}
	}

	function edit() {
//		$nim 			= $this->uri->segment(3);
//		$data['ruangan'] 	= $this->db->get_where('tabel_ruangan', array('nim'=>$nim))->row_array();
//		$this->template->load('template', 'ruangan/edit', $data);
	if (isset($_POST['submit'])){
		$this->Model_ruangan->update();
		redirect('ruangan');
	}else {
		$ruangan 			= $this->uri->segment(3);
		$data['ruangan'] 	= $this->db->get_where('tabel_ruangan', array('kd_ruangan'=>$ruangan))->row_array();
		$this->template->load('template', 'ruangan/edit', $data);
	}
	}

	function delete() {
		$ruangan = $this->uri->segment(3);
		if (!empty($ruangan)) {
			// Proses delete data
			$this->db->where('kd_ruangan', $ruangan);
			$this->db->delete('tabel_ruangan');
		}
		redirect('ruangan');
	}


}

