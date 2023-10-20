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
        $this->load->library('CFPDF');
        $pdf = new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(8,5,'NO',1,0,'L');
        $pdf->Cell(40,5,'Mata Pelajaran',1,0,'L');
        $pdf->Cell(10,5,'KKM',1,0,'L');
        $pdf->Cell(12,5,'Angka',1,0,'L');
        $pdf->Cell(12,5,'Huruf',1,0,'L');
        $pdf->Cell(45,5,'Ketercapaian Kompetensi',1,0,'L');
        $pdf->Cell(25,5,'Rata-rata Kelas',1,0,'L');


        $pdf->Output();


    }
}