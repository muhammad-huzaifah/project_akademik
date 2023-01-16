<?php

class Rombel extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		//CheckAksesModule();
		$this->load->library('ssp');
		$this->load->model('Model_rombel');
	}

	function data() {
		// nama tabel
		$table = 'v_master_rombel';
		// nama PK
		$primaryKey = 'id_rombel';
		// List field
		$columns = array(
			array('db' => 'id_rombel','dt' => 'id_rombel'),
			array('db' => 'nama_rombel','dt' => 'nama_rombel'),
			array('db' => 'kelas','dt' => 'kelas'),
			array('db' => 'nama_jurusan','dt' => 'nama_jurusan'),
			array(
				'db' => 'id_rombel',
				'dt' => 'aksi',
				'formatter' => function($d) {
					return anchor('rombel/edit/'.$d, '<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-warning tooltips" data-placement="top" data-original-title="Edit"').'
					 '.anchor('rombel/delete/'.$d, '<i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger tooltips" data-placement="top" data-original-title="Delete"');
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
		$this->template->load('template', 'rombel/list');
	}

	function add(){
		if (isset($_POST['submit'])) {
//			echo "save";
			$this->Model_rombel->save();
			redirect('rombel');
		} else {
			$infoSekolah = "SELECT js.jumlah_kelas
    					   FROM tabel_jenjang_sekolah as js, table_sekolah_info as si WHERE js.id_jenjang=si.id_jenjang_sekolah ";
			$data['info'] = $this->db->query($infoSekolah)->row_array();
			$this->template->load('template', 'rombel/add', $data);
		}
	}

	function edit() {
	if (isset($_POST['submit'])){
		$this->Model_rombel->update();
		redirect('rombel');
	}else {
		$infoSekolah = "SELECT js.jumlah_kelas
    					   FROM tabel_jenjang_sekolah as js, table_sekolah_info as si WHERE js.id_jenjang=si.id_jenjang_sekolah ";
		$data['info'] = $this->db->query($infoSekolah)->row_array();

		$edit 			= $this->uri->segment(3);
		$data['rombel'] 	= $this->db->get_where('tabel_rombel', array('id_rombel'=>$edit))->row_array();
		$this->template->load('template', 'rombel/edit', $data);
	}
	}

	function delete() {
		$id_rombel = $this->uri->segment(3);
		if (!empty($id_rombel)) {
			$this->db->where('id_rombel', $id_rombel);
			$this->db->delete('tabel_rombel');
		}
		redirect('rombel');
	}


}

