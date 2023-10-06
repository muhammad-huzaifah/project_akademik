<?php
class Jadwal extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_jadwal');
	}

	function index()
	{
		/*$infoSekolah = "SELECT js.jumlah_kelas
    				 	FROM tabel_jenjang_sekolah as js, table_sekolah_info as si
    				 	WHERE js.id_jenjang=si.id_jenjang_sekolah ";
		$data['info'] = $this->db->query($infoSekolah)->row_array();
		$this->template->load('template', 'jadwal/list', $data);*/
		if ($this->session->userdata('id_level_user')==3) {
			// load daftar ngajar guru
			$sql = "SELECT tj.id_jadwal, tjr.nama_jurusan, tj.kelas, tm.nama_mapel, tj.jam, tr.nama_ruangan, tj.hari, tj.semester
					FROM tabel_jadwal as tj, tabel_jurusan as tjr, tabel_ruangan as tr, tabel_mapel as tm
					WHERE tj.kd_jurusan=tjr.kd_jurusan and tj.kd_mapel=tm.kd_mapel and tj.kd_ruangan=tr.kd_ruangan and tj.id_guru=".$this->session->userdata('id_level_user');
			$data['jadwal'] = $this->db->query($sql);
			$this->template->load('template', 'jadwal/jadwal_ajar_guru', $data);
		} else {
			$infoSekolah = "SELECT js.jumlah_kelas
    				 	FROM tabel_jenjang_sekolah as js, table_sekolah_info as si 
    				 	WHERE js.id_jenjang=si.id_jenjang_sekolah ";
			$data['info'] = $this->db->query($infoSekolah)->row_array();
			$this->template->load('template', 'jadwal/list', $data);
		}
	}

	function generate_jadwal()
	{
		if (isset($_POST['submit'])) {
			// lakukan proses
			$this->Model_jadwal->generateJadwal();
//			die;
		}
		redirect('jadwal');
	}

	function dataJadwal()
	{
		$kd_jurusan 	= $_GET['jurusan'];
		$kelas 			= $_GET['kelas'];
		$id_kurikulum 	= $_GET['id_kurikulum'];
		$rombel 		= $_GET['rombel'];

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
		$sql = "SELECT tj.hari, tj.id_jadwal, tm.nama_mapel, tg.id_guru, tg.nama_guru, tr.kd_ruangan, tj.hari, tj.jam    
				FROM tabel_jadwal as tj, tabel_mapel as tm, tabel_ruangan as tr, tabel_guru as tg
				WHERE tj.kd_mapel=tm.kd_mapel and tj.kd_ruangan=tr.kd_ruangan and tg.id_guru=tj.id_guru 
				  and tj.kelas='$kelas' and tj.kd_jurusan='$kd_jurusan' and tj.id_rombel='$rombel'";
		$jadwal = $this->db->query($sql)->result();
		$no = 1;
		$jam_pelajaran = $this->Model_jadwal->getJamPelajaran();
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
					<td>".cmb_dinamis('guru', 'tabel_guru', 'nama_guru', 'id_guru',
					     $row->id_guru, "id='guru".$row->id_jadwal."' onchange='updateGuru(".$row->id_jadwal.")'").
					"</td>
					<td>".cmb_dinamis('ruangan', 'tabel_ruangan', 'nama_ruangan', 'kd_ruangan',
					      $row->kd_ruangan, "id='ruangan".$row->id_jadwal."' onchange='updateRuangan					
					      (".$row->id_jadwal.")'").
					"</td>
					<td>" . form_dropdown('hari', $hari, $row->hari, "class='form-control' 
					      id='hari".$row->id_jadwal."' onchange='updateHari(".$row->id_jadwal.")'") . "</td>
					<td>" . form_dropdown('jam', $jam_pelajaran, $row->jam, "class='form-control' 
					        id='jam".$row->id_jadwal."' onchange='updateJam(".$row->id_jadwal.")'") . "</td>
					<td>" . anchor('kurikulum/deletedetail/' . $row->id_jadwal, '<i class="fa fa-trash"></i>') . "</td>
				   </tr>";
			$no++;
		}
		echo "</table>";
	}

	function updateGuru() {
//		print_r($_GET);
		$id_guru 	= $_GET['id_guru'];
		$id_jadwal 	= $_GET['id_jadwal'];
		$this->db->where('id_jadwal', $id_jadwal);
		$this->db->update('tabel_jadwal', array('id_guru'=>$id_guru));
	}

	function updateRuangan() {
		$kd_ruangan 	= $_GET['kd_ruangan'];
		$id_jadwal 		= $_GET['id_jadwal'];
		$this->db->where('id_jadwal', $id_jadwal);
		$this->db->update('tabel_jadwal', array('kd_ruangan'=>$kd_ruangan));
	}

	function updateHari() {
		$hari 		= $_GET['hari'];
		$id_jadwal 	= $_GET['id_jadwal'];
		$this->db->where('id_jadwal', $id_jadwal);
		$this->db->update('tabel_jadwal', array('hari'=>$hari));
	}

	function updateJam() {
		$jam 		= $_GET['jam'];
		$id_jadwal 	= $_GET['id_jadwal'];
		$this->db->where('id_jadwal', $id_jadwal);
		$this->db->update('tabel_jadwal', array('jam'=>$jam));
	}

	function show_rombel() {
//		print_r($where);
//		die;
		echo "<select id='rombel' name='rombel' class='form-control' onchange='loadPelajaran()'>";
			$where 	= array('kd_jurusan'=>$_GET['jurusan'], 'kelas'=>$_GET['kelas']);
			$rombel = $this->db->get_where('tabel_rombel', $where);
			foreach ($rombel->result() as $row) {
				echo "<option value='$row->id_rombel'>$row->nama_rombel</option>";
			}
		echo "</select>";
	}

	function cetak_jadwal(){
//		$rombel = $_POST['rombel'];
		$this->load->library('CFPDF');
		$days = array(
			'Senin' => 'Senin',
			'Selasa'=> 'Selasa',
			'Rabu'  => 'Rabu',
			'Kamis' => 'Kamis',
			'Jumat' => 'Jumat',
			'Sabtu' => 'Sabtu'
		);
		$pdf = new FPDF('L','mm','A4');
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',13);
		$pdf->Cell(10,10,'No',1,0,'L');
		$pdf->Cell(30,10,'Waktu',1,0,'L');
		// foreach di kolom judul
		foreach ($days as $day) {
			$pdf->Cell(30,10, $day,1,0,'L');
		}
		$pdf->Cell(30,10,'',0,1,'L');

 		$jam_ajar = $this->Model_jadwal->getJamPelajaran();
		$no=1;
		foreach ($jam_ajar as $jam) {
			$pdf->Cell(10,10,$no,1,0,'L');
			$pdf->Cell(30,10,$jam,1,0,'L');
			$no++;

			// foreach hari di kolom jadwal
			foreach ($days as $day) {
//				$pdf->Cell(30,10, $this->getPelajaran($jam, $day, $rombel),1,0,'L');
			}
			$pdf->Cell(30,10,'',0,1,'L');
		}
		$pdf->Output();
	}

	function getPelajaran($jam,$day,$rombel) {
//		die;
		$sql = "SELECT tj.*, tm.nama_mapel 
				FROM tabel_jadwal as tj, tabel_mapel as tm
			   	WHERE tj.kd_mapel=tm.kd_mapel and tj.id_rombel='$rombel' and tj.hari='$day' and tj.jam='$jam'";
		$pelajaran = $this->db->query($sql);
		if($pelajaran->num_rows()>0) {
			$row = $pelajaran->row_array();
			return $row['nama_mapel'];
		} else {
			return '-';
		}
	}

}
