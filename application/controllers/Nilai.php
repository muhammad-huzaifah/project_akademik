<?php

class Nilai extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		echo checkAksesModule();
	}

	function index()
	{
        // load daftar ngajar guru
        $sql = "SELECT tj.id_rombel, tj.id_jadwal, tjr.nama_jurusan, tj.kelas, tm.nama_mapel, tj.jam, tr.nama_ruangan, 
                       tj.hari, tj.semester 
                 FROM tabel_jadwal as tj, tabel_jurusan as tjr, tabel_ruangan as tr, tabel_mapel as tm
				 WHERE tj.kd_jurusan=tjr.kd_jurusan and tj.kd_mapel=tm.kd_mapel and tj.kd_ruangan=tr.kd_ruangan
					  and tj.id_guru=".$this->session->userdata('id_level_user');
        $data['jadwal'] = $this->db->query($sql);
        $this->template->load('template', 'nilai/list_kelas', $data);
	}

    function rombel()
    {
        $id_rombel = $this->uri->segment(3);
        $rombel = "SELECT r.*, j.nama_jurusan
                    FROM tabel_rombel AS r, tabel_jurusan AS j
                    WHERE r.kd_jurusan=j.kd_jurusan
                    AND id_rombel = $id_rombel";
        $data['rombel'] = $this->db->query($rombel);
        $this->template->load('template', 'nilai/form_nilai', $data);

    }
    
	function tambah()
	{
//		echo " Tambah";
	}
}
