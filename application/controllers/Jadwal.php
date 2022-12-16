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
		foreach ($jadwal as $row) {
			echo "<tr>
					<td>$no</td>
					<td>$row->nama_mapel</td>
					<td>$row->nama_guru</td>
					<td>$row->nama_ruangan</td>
					<th>$row->hari</th>
					<th>$row->jam_mulai</th>
					<td>" . anchor('kurikulum/deletedetail/' . $row->id_jadwal, '<i class="fa fa-trash"></i>') . "</td>
				   </tr>";
			$no++;
		}
		echo " 	  </table>";

		$jam_pelajaran = array(
			'07.15 - 08.00' => '07.15 - 08.00',
			'08.00 - 08.45' => '08.15 - 08.45',
			'08.45 - 09.30' => '08.45 - 09.30',
			'09.30 - 10.00' => '09.30 - 10.00',
			'10.00 - 10.45' => '10.00 - 10.45',
			'10.45 - 11.30' => '10.45 - 11.30',
			'11.30 - 12.15' => '11.30 - 12.15',
			'12.15 - 13.00' => '12.15 - 13.00',
			'13.00 - 13.30' => '13.00 - 13.30',
			'13.30 - 14.15' => '13.30 - 14.15',
			'14.15 - 15.00' => '14.15 - 15.0'
		);
	}
}
