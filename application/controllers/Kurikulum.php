<?php

class Kurikulum extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		//CheckAksesModule();
		$this->load->library('ssp');
		$this->load->model('Model_kurikulum');
	}

	function data() {
		// nama tabel
		$table = 'tabel_kurikulum';
		// nama PK
		$primaryKey = 'id_kurikulum';
		// List field
		$columns = array(
			array('db' => 'id_kurikulum','dt' => 'id_kurikulum'),
			array('db' => 'nama_kurikulum','dt' => 'nama_kurikulum'),
			array('db' => 'is_aktif',
				'dt' => 'is_aktif',
				'formatter' => function($d) {
			return $d=='Y'?'Aktif':'Tidak Aktif';
				}),
			array(
				'db' => 'id_kurikulum',
				'dt' => 'aksi',
				'formatter' => function($d) {
					return anchor('kurikulum/edit/'.$d, '<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-warning tooltips" data-placement="top" data-original-title="Edit"').'
					 '.anchor('kurikulum/delete/'.$d, '<i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger tooltips" data-placement="top" data-original-title="Delete"').'
					'.anchor('kurikulum/detail/'.$d, '<i class="fa fa-eye"></i>', 'class="btn btn-xs btn-danger tooltips" data-placement="top" data-original-title="Detail"');

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
		$this->template->load('template', 'kurikulum/list');
	}

	function add(){
		if (isset($_POST['submit'])) {
//			echo "save";
			$this->Model_kurikulum->save();
			redirect('kurikulum');
		} else {
			$this->template->load('template', 'kurikulum/add');
		}
	}

	function edit() {
	if (isset($_POST['submit'])){
		$this->Model_kurikulum->update();
		redirect('kurikulum');
	}else {
		$id_kurikulum 			= $this->uri->segment(3);
		$data['kurikulum'] 	= $this->db->get_where('tabel_kurikulum', array('id_kurikulum'=>$id_kurikulum))->row_array();
		$this->template->load('template', 'kurikulum/edit', $data);
	}
	}

	function delete() {
		$edit = $this->uri->segment(3);
		if (!empty($edit)) {
			$this->db->where('id_kurikulum', $edit);
			$this->db->delete('tabel_kurikulum');
		}
		redirect('kurikulum');
	}


}

