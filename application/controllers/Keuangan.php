<?php

class Keuangan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_keuangan');
    }

    function index()
    {
        $this->template->load('template', 'keuangan/laporan');
    }

    function setup()
    {
        if (isset($_POST['submit'])) {
            //proses simpan
            $this->Model_keuangan->setup();
            redirect('keuangan/setup');
        } else {
            $data['jenis_pembayaran'] = $this->db->get('tabel_jenis_pembayaran');
            $this->template->load('template', 'keuangan/setup', $data);
        }
    }

    function form()
    {
        if (isset($_POST['submit'])) {
            $this->Model_keuangan->pembayaran();
            redirect('keuangan/form');
        } else {
            $this->template->load('template', 'keuangan/form');
        }
    }

    function form_siswa_autocomplete()
    {
        $nis = $_GET['nis'];
        $sqlSiswa = "SELECT ts.nama, ts.nim, tj.nama_jurusan, tr.nama_rombel, tr.kelas
    					FROM tabel_history_kelas AS hk, tabel_siswa AS ts, tabel_rombel AS tr, tabel_jurusan AS tj
						WHERE ts.nim=hk.nim AND tr.id_rombel=ts.id_rombel AND tr.kd_jurusan=tj.kd_jurusan AND hk.nim='$nis' AND hk.id_tahun_akademik=" . get_tahun_akademik_aktif('id_tahun_akademik');
        $siswa = $this->db->query($sqlSiswa)->row_array();
        $data = array(
            'nama' => $siswa['nama'],
            'jurusan' => $siswa['nama_jurusan'],
            'rombel' => $siswa['nama_rombel'],
            'kelas' => $siswa['kelas'],);
        echo json_encode($data);
    }

    function load_data_siswa_by_rombel()
    {
        $rombel = $_GET['rombel'];
        $id_jenis_pembayaran = $_GET['jenis_pembayaran'];
        echo "<table class='table table-bordered'>
					<tr><th style='width: 100px'>NIM</th><th>Nama</th><th>Sudah Dibayarkan</th></tr>";
        $this->db->where('id_rombel', $rombel);
        $siswa = $this->db->get('tabel_siswa');
        foreach ($siswa->result() as $row) {
            echo "<tr>
                    <td>$row->nim</td>
                    <td>$row->nama</td>
                    <td>".$this->__check_jumlah_yang_sudah_dibayar($row->nim, $id_jenis_pembayaran)."</td>
                  </tr>";
        }
        echo "</table>";
    }

    function __check_jumlah_yang_sudah_dibayar($nis, $id_jenis_pembayaran)
    {
        $pembayaran = $this->db->get_where('tabel_pembayaran', array('nis'=>$nis, 'id_jenis_pembayaran'=>$id_jenis_pembayaran));
        if ($pembayaran->num_rows()>0) {
            $row = $pembayaran->row_array();
            return $row['jumlah'];
        } else {
            return 0;
        }
    }

}
