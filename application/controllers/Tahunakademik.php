<?php

class Tahunakademik extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		//CheckAksesModule();
		$this->load->library('ssp');
		$this->load->model('Model_akademik');
	}

	function data() {
		// nama tabel
		$table = 'tabel_tahun_akademik';
		// nama PK
		$primaryKey = 'id_tahun_akademik';
		// List field
		$columns = array(
			array('db' => 'id_tahun_akademik','dt' => 'id_tahun_akademik'),
			array('db' => 'tahun_akademik','dt' => 'tahun_akademik'),
			array('db' => 'is_aktif',
				'dt' => 'is_aktif',
				'formatter' => function($d) {
			return $d=='Y'?'Aktif':'Tidak Aktif';
				}),
			array(
				'db' => 'id_tahun_akademik',
				'dt' => 'aksi',
				'formatter' => function($d) {
					return anchor('tahunakademik/edit/'.$d, '<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-warning tooltips" data-placement="top" data-original-title="Edit"').'
					 '.anchor('tahunakademik/delete/'.$d, '<i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger tooltips" data-placement="top" data-original-title="Delete"');
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
		$this->template->load('template', 'tahunakademik/list');
	}

	function add(){
		if (isset($_POST['submit'])) {
//			echo "save";
			$this->Model_akademik->save();
			$idTahunAkademik = $this->db->insert_id();
			//setup data dummy walikelas
			$this->load->model('Model_walikelas');
			$this->Model_walikelas->setup_walikelas($idTahunAkademik);
			redirect('tahunakademik');
		} else {
			$this->template->load('template', 'tahunakademik/add');
		}
	}

	function edit() {
	if (isset($_POST['submit'])){
		$this->Model_akademik->update();
		redirect('tahunakademik');
	}else {
		$id_tahun_akademik 			= $this->uri->segment(3);
		$data['tahunakademik'] 	= $this->db->get_where('tabel_tahun_akademik', array('id_tahun_akademik'=>$id_tahun_akademik))->row_array();
		$this->template->load('template', 'tahunakademik/edit', $data);
	}
	}

	function delete() {
		$edit = $this->uri->segment(3);
		if (!empty($edit)) {
			$this->db->where('id_tahun_akademik', $edit);
			$this->db->delete('tabel_tahun_akademik');
		}
		redirect('tahunakademik');
	}


}

