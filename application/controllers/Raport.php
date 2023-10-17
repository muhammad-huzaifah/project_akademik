<?php

class Raport extends CI_Controller
{
    //menampilkan list siswa
    function index() {
        $walikelas = $this->db->get_where('tabel_walikelas', array('id_guru'=> $this->session->userdata('id_guru')));                   
        $rombel = "SELECT r.nama_rombel, r.kelas, jr.nama_jurusan, m.nama_mapel
                    FROM tabel_jadwal AS j, tabel_jurusan AS jr, tabel_rombel AS r, tabel_mapel AS m
                    WHERE j.kd_jurusan=jr.kd_jurusan AND r.id_rombel=j.id_rombel AND j.kd_mapel=m.kd_mapel AND j.id_jadwal=40=$id_rombel";
        $data['rombel'] = $this->db->query($rombel)->row_array();
        $this->template->load('template', 'raport/list_siswa');
    }
}