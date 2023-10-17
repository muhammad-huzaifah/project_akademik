<?php

class Nilai extends CI_Controller
{
//    function __construct()
//    {
//        parent::__construct();
//        echo checkAksesModule();
//    }

    function index()
    {
        // load daftar ngajar guru
        $sql = "SELECT tj.id_rombel, tj.id_jadwal, tjr.nama_jurusan, tj.kelas, tm.nama_mapel, tj.jam, tr.nama_ruangan, 
                       tj.hari, tj.semester 
                 FROM tabel_jadwal as tj, tabel_jurusan as tjr, tabel_ruangan as tr, tabel_mapel as tm
				 WHERE tj.kd_jurusan=tjr.kd_jurusan and tj.kd_mapel=tm.kd_mapel and tj.kd_ruangan=tr.kd_ruangan
					  and tj.id_guru=" . $this->session->userdata('id_level_user');
        $data['jadwal'] = $this->db->query($sql);
        $this->template->load('template', 'nilai/list_kelas', $data);
    }

    function rombel()
    {
//        $id_rombel  = $this->uri->segment(3);
        $id_jadwal = $this->uri->segment(3);
        $jadwal = $this->db->get_where('tabel_jadwal', array('id_jadwal' => $id_jadwal))->row_array();
        $id_rombel = $jadwal['id_rombel'];
        $rombel = "SELECT r.nama_rombel, r.kelas, jr.nama_jurusan, m.nama_mapel
                    FROM tabel_jadwal AS j, tabel_jurusan AS jr, tabel_rombel AS r, tabel_mapel AS m
                    WHERE j.kd_jurusan=jr.kd_jurusan AND r.id_rombel=j.id_rombel AND j.kd_mapel=m.kd_mapel AND j.id_jadwal=40=$id_rombel";
        $siswa = "SELECT s.nim, s.nama
                    FROM tabel_history_kelas AS hk, tabel_siswa AS s
                    WHERE hk.nim=s.nim AND hk.id_tahun_akademik=" . get_tahun_akademik_aktif('id_tahun_akademik') . " AND hk.id_rombel=$id_rombel";
        $data['rombel'] = $this->db->query($rombel)->row_array();
        $data['siswa'] = $this->db->query($siswa)->result();
        $this->template->load('template', 'nilai/form_nilai', $data);

    }

    function update_nilai()
    {
        $nim        = $_GET['nim'];
        $id_jadwal  = $_GET['id_jadwal'];
        $nilai      = $_GET['nilai'];

        //parameter
        $params = array('nim'=>$nim, 'id_jadwal'=>$id_jadwal, 'nilai'=>$nilai);

        $validasi = array('nim'=>$nim, 'id_jadwal'=>$id_jadwal);
        $check = $this->db->get_where('tabel_nilai', $validasi);
        if ($check->num_rows()>0) {
            //proses update
            $this->db->where('nim', $nim);
            $this->db->where('id_jadwal', $id_jadwal);
            $this->db->update('tabel_nilai', array('nilai'=>$nilai));
        }else{
            //proses insert
            $this->db->insert('tabel_nilai', $params);
            echo "data sudah masuk";
        }
    }
}
