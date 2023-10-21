<?php

class Raport extends CI_Controller
{
    //menampilkan list siswa
    function index() {
        $walikelas = $this->db->get_where('tabel_walikelas', array('id_guru'=> $this->session->userdata('id_guru')))->row_array();
        $rombel = "SELECT r.nama_rombel, r.kelas, jr.nama_jurusan, m.nama_mapel
                    FROM tabel_jadwal AS j, tabel_jurusan AS jr, tabel_rombel AS r, tabel_mapel AS m
                    WHERE j.kd_jurusan=jr.kd_jurusan AND r.id_rombel=j.id_rombel AND m.kd_mapel=j.kd_mapel AND j.id_rombel='1".$walikelas['id_rombel']."'";
        $siswa = "SELECT s.nim, s.nama
                    FROM tabel_history_kelas AS hk, tabel_siswa AS s
                    WHERE hk.nim=s.nim AND hk.id_rombel=1
                      AND hk.id_tahun_akademik=1";
        $data['rombel'] = $this->db->query($rombel)->row_array();
        $data['siswa'] = $this->db->query($siswa);
        $this->template->load('template', 'raport/list_siswa',$data);
    }

    function nilai_semester() {
		//block info siswa
		$nim = $this->uri->segment(3);
		$sqlSiswa = "SELECT ts.nama, ts.nim, tj.nama_jurusan, tr.nama_rombel, tr.kelas
    					FROM tabel_history_kelas AS hk, tabel_siswa AS ts, tabel_rombel AS tr, tabel_jurusan AS tj
						WHERE ts.nim=hk.nim AND tr.id_rombel=ts.id_rombel AND tr.kd_jurusan=tj.kd_jurusan AND hk.nim='$nim' AND hk.id_tahun_akademik=". get_tahun_akademik_aktif('id_tahun_akademik');
		$siswa = $this->db->query($sqlSiswa)->row_array();

        $this->load->library('CFPDF');
        $pdf = new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',9);

		$pdf->Cell(30,5,'NIS',0,0,'L');
		$pdf->Cell(90,5,': '.$siswa['nim'],0,0,'L');
		$pdf->Cell(33,5,'KELAS',0,0,'L');
		$pdf->Cell(43,5,': '.$siswa['kelas'],0,1,'L');

		$pdf->Cell(30,5,'NAMA',0,0,'L');
		$pdf->Cell(90,5,': '.$siswa['nama'],0,0,'L');
		$pdf->Cell(33,5,'TAHUN AJARAN',0,0,'L');
		$pdf->Cell(43,5,': '. get_tahun_akademik_aktif('tahun_akademik'),0,1,'L');

		$pdf->Cell(30,5,'JURUSAN',0,0,'L');
		$pdf->Cell(90,5,': '.$siswa['nama_jurusan'],0,0,'L');
		$pdf->Cell(33,5,'SEMESTER',0,0,'L');
		$pdf->Cell(43,5,': '.get_tahun_akademik_aktif('semester_aktif'),0,1,'L');

		$pdf->Cell(1,10,'',0,1);


        $pdf->Cell(8,5,'NO',1,0,'L');
        $pdf->Cell(40,5,'Mata Pelajaran',1,0,'L');
        $pdf->Cell(10,5,'KKM',1,0,'L');
        $pdf->Cell(12,5,'Angka',1,0,'L');
        $pdf->Cell(50,5,'Huruf',1,0,'L');
        $pdf->Cell(50,5,'Ketercapaian Kompetensi',1,0,'L');
        $pdf->Cell(26,5,'Rata-Rata Kelas',1,0,'L');


        $pdf->Output();


    }
}
