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

	function detail() {
		$infoSekolah = "SELECT js.jumlah_kelas
    					FROM tabel_jenjang_sekolah as js, table_sekolah_info as si WHERE js.id_jenjang=si.id_jenjang_sekolah ";
		$data['info'] = $this->db->query($infoSekolah)->row_array();
		$this->template->load('template', 'kurikulum/detail', $data);
	}

	function dataKurikulumDetail() {

		$kd_jurusan = $_GET['jurusan'];
		$kelas = $_GET['kelas'];
		if ($kelas == 'semua_kelas') {
			$selected_kelas = '';
		} else {
			$selected_kelas = "and tkd.kelas='$kelas'";
		}

		echo "<table id='tabel' class='table table-striped table-bordered dataTable''style='width: 100%' role='grid'>
				<thead>
					<tr>
						<th>NO</th>
						<th>KODE MAPEL</th>
						<th>NAMA MATA PELAJARAN</th>
						<th>KELAS</th>
						<th>AKSI</th>
					</tr>				
				</thead>";
		$sql = "SELECT tj.nama_jurusan, tm.kd_mapel, tm.nama_mapel, tkd.kelas, tkd.id_kurikulum_detail, tkd.id_kurikulum 
    			FROM tabel_kurikulum_detail as tkd, tabel_kurikulum as tk, tabel_mapel as tm , tabel_jurusan as tj WHERE tkd.id_kurikulum=tk.id_kurikulum and tkd.kd_mapel=tm.kd_mapel and tkd.kd_jurusan=tj.kd_jurusan $selected_kelas and tkd.kd_jurusan='$kd_jurusan'";
		$kurikulum = $this->db->query($sql)->result();
		$no = 1;
		foreach ($kurikulum as $row) {
			echo "<tr><td>$no</td><td>$row->kd_mapel</td><td>$row->nama_mapel</td><td>$row->kelas</td><td>".anchor('kurikulum/deletedetail/'.$row->id_kurikulum_detail.'/'. $row->id_kurikulum,'<i class="fa fa-trash"></i>')."</td></tr>";
			$no++;
		}
		echo" 	  </table>";
	}

	function deletedetail() {
		$id_kurikulum_detail = $this->uri->segment(3);
		$id_kurikulum        = $this->uri->segment(4);
		if (!empty($id_kurikulum_detail)) {
			$this->db->where('id_kurikulum_detail', $id_kurikulum_detail);
			$this->db->delete('tabel_kurikulum_detail');
		}
		redirect('kurikulum/detail/'.$id_kurikulum);
	}


}

