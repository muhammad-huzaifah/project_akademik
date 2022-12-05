<?php

class Guru extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		//CheckAksesModule();
		$this->load->library('ssp');
		$this->load->model('Model_guru');
	}

	function data() {
		// nama tabel
		$table = 'tabel_guru';
		// nama PK
		$primaryKey = 'id_guru';
		// List field
		$columns = array(
			array('db' => 'id_guru','dt'=> 'id_guru'),
			array('db' => 'nuptk','dt'=> 'nuptk'),
			array('db' => 'nama_guru','dt'=> 'nama_guru'),
			array('db' => 'jenis_kelamin',
				  'dt' => 'jenis_kelamin', 'formatter' => function($d)
					{
						return $d=='P'?'Pria':'Wanita';
					}),
			array(
				'db' => 'id_guru',
				'dt' => 'aksi',
				'formatter' => function($d) {
					return anchor('guru/edit/'.$d, '<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-warning tooltips" data-placement="top" data-original-title="Edit"').'
					 '.anchor('guru/delete/'.$d, '<i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger tooltips" data-placement="top" data-original-title="Delete"');
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
		$this->template->load('template', 'guru/list');
	}

	function add(){
		if (isset($_POST['submit'])) {
//			echo "save";
			$this->Model_guru->save();
			redirect('guru');
		} else {
			$this->template->load('template', 'guru/add');
		}
	}

	function edit() {
	if (isset($_POST['submit'])){
		$this->Model_guru->update();
		redirect('guru');
	}else {
		$id_guru 		= $this->uri->segment(3);
		$data['guru'] 	= $this->db->get_where('tabel_guru', array('id_guru'=>$id_guru))->row_array();
		$this->template->load('template', 'guru/edit', $data);
	}
	}

	function delete() {
		$edit = $this->uri->segment(3);
		if (!empty($edit)) {
			$this->db->where('id_guru', $edit);
			$this->db->delete('tabel_guru');
		}
		redirect('guru');
	}


}

