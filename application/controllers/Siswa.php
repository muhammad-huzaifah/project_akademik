<?php

class Siswa extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		//CheckAksesModule();
		$this->load->library('ssp');
		$this->load->model('Model_siswa');
	}

	function data() {
		// nama tabel
		$table = 'tabel_siswa';
		// nama PK
		$primaryKey = 'nim';
		// List field
		$columns = array(
			array('db' => 'foto',
				  'dt' => 'foto',
				  'formatter' => function($d) {
				 		return "<img width='50px' src='".base_url()."/uploads/".$d."'>";
				  }
			),
			array('db' => 'nim', 			'dt' => 'nim'),
			array('db' => 'nama', 			'dt' => 'nama'),
			array('db' => 'tempat_lahir', 	'dt' => 'tempat_lahir'),
			array('db' => 'tanggal_lahir', 	'dt' => 'tanggal_lahir'),
			array(
				'db' => 'nim',
				'dt' => 'aksi',
				'formatter' => function($d) {
//					return "<a href='edit.php?id=$d'>EDIT</a>";
					return anchor('siswa/edit/'.$d, '<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-warning tooltips" data-placement="top" data-original-title="Edit"').'
					 '.anchor('siswa/delete/'.$d, '<i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger tooltips" data-placement="top" data-original-title="Delete"');
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
		$this->template->load('template', 'siswa/list');
	}

	function add(){
		if (isset($_POST['submit'])) {
			$uploadFoto = $this->uploads_foto_siswa();
//			echo "save";
			$this->Model_siswa->save($uploadFoto);
			redirect('siswa');
		} else {
			$this->template->load('template', 'siswa/add');
		}
	}

	function edit() {
//		$nim 			= $this->uri->segment(3);
//		$data['siswa'] 	= $this->db->get_where('tabel_siswa', array('nim'=>$nim))->row_array();
//		$this->template->load('template', 'siswa/edit', $data);
	if (isset($_POST['submit'])){
		$uploadFoto = $this->uploads_foto_siswa();
		$this->Model_siswa->update($uploadFoto);
		redirect('siswa');
	}else {
		$nim 			= $this->uri->segment(3);
		$data['siswa'] 	= $this->db->get_where('tabel_siswa', array('nim'=>$nim))->row_array();
		$this->template->load('template', 'siswa/edit', $data);
	}
	}

	function delete() {
		$nim = $this->uri->segment(3);
		if (!empty($nim)) {
			// Proses delete data
			$this->db->where('nim', $nim);
			$this->db->delete('tabel_siswa');
		}
		redirect('siswa');
	}

	function uploads_foto_siswa() {
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 5024;
		$this->load->library('upload', $config);
		// proses upload
		$this->upload->do_upload('userfile');
//		$data = array('upload_data' => $this->upload->data());
//		print_r($data);
		$upload = $this->upload->data();
		return $upload['file_name'];
	}

	function siswa_aktif() {
		$this->template->load('template', 'siswa/siswa_aktif');
	}

	function load_data_siswa_by_rombel() {
		$rombel = $_GET['rombel'];

		echo "<table class='table table-bordered'>
					<tr><th style='width: 100px'>NIM</th><th>Nama</th></tr>";
		$this->db->where('id_rombel', $rombel);
		$siswa = $this->db->get('tabel_siswa');
		foreach ($siswa->result() as $row) {
			echo "<tr><td>$row->nim</td><td>$row->nama</td></tr>";
		}
		echo "</table>";
	}

}
