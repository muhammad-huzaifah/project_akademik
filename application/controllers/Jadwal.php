<?php

class Jadwal extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_jadwal');
	}

	function index()
	{
		$infoSekolah = "SELECT js.jumlah_kelas
    				 FROM tabel_jenjang_sekolah as js, table_sekolah_info as si 
    				 WHERE js.id_jenjang=si.id_jenjang_sekolah ";
		$data['info'] = $this->db->query($infoSekolah)->row_array();
		$this->template->load('template', 'jadwal/list', $data);
	}

	function generate_jadwal()
	{
		if (isset($_POST['submit'])) {
			// lakukan proses
			$this->model_jadwal->generateJadwal();
//			die;
		}
		redirect('jadwal');
	}

	function dataJadwal()
	{
		$kd_jurusan = $_GET['jurusan'];
		$kelas = $_GET['kelas'];
		$id_kurikulum = $_GET['id_kurikulum'];

		if ($kelas == 'semua_kelas') {
			$selected_kelas = '';
		} else {
			$selected_kelas = "and tkd.kelas='$kelas'";
		}

		echo "<table id='tabel' class='table table-striped table-bordered dataTable''style='width: 100%' role='grid'>
				<thead>
					<tr>
						<th>NO</th>
						<th>MATA PELAJARAN</th>
						<th>GURU</th>
						<th>RUANGAN</th>
						<th>HARI</th>
						<th>JAM</th>
						<th>AKSI</th>
					</tr>				
				</thead>";
		$sql = "SELECT tj.id_jadwal, tm.nama_mapel, tg.nama_guru, tr.nama_ruangan, tj.hari, 
                tj.jam_mulai, tj.jam_selesai
				FROM tabel_jadwal as tj, tabel_mapel as tm, tabel_ruangan as tr, tabel_guru as tg, tabel_kurikulum_detail as tkd
				WHERE tj.kd_mapel=tm.kd_mapel and tj.kd_ruangan=tr.kd_ruangan and tg.id_guru=tj.id_guru
				and tkd.kelas='$kelas' and tj.kd_jurusan='$kd_jurusan'";
		$jadwal = $this->db->query($sql)->result();
		$no = 1;
		$jam_pelajaran = $this->model_jadwal->getJamPelajaran();
		$hari = array(
			'Senin' => 'Senin',
			'Selasa'=> 'Selasa',
			'Rabu'  => 'Rabu',
			'Kamis' => 'Kamis',
			'Jumat' => 'Jumat',
			'Sabtu' => 'Sabtu'
		);
		foreach ($jadwal as $row) {
			echo "<tr>
					<td>$no</td>
					<td>$row->nama_mapel</td>
					<td>".cmb_dinamis('guru', 'tabel_guru', 'nama_guru', 'id_guru', null, "id='guru".$row->id_jadwal."' onchange='updateGuru(".$row->id_jadwal.")'")."</td>
					<td>".cmb_dinamis('ruangan', 'tabel_ruangan', 'nama_ruangan', 'kd_ruangan')."</td>
					<th>" . form_dropdown('hari', $hari, null, "class='form-control'") . "</th>
					<th>" . form_dropdown('jam', $jam_pelajaran, null, "class='form-control'") . "</th>
					<td>" . anchor('kurikulum/deletedetail/' . $row->id_jadwal, '<i class="fa fa-trash"></i>') . "</td>
				   </tr>";
			$no++;
		}
		echo "</table>";


	}
}
