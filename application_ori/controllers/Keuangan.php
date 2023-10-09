<?php
class Keuangan extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('Model_keuangan');
    }
    
    function setup(){
        if(isset($_POST['submit'])){
            // proses simpan
            $this->Model_keuangan->setup();
            redirect('keuangan/setup');
        }else{
            $data['jenis_pembayaran'] = $this->db->get('tbl_jenis_pembayaran');
            $this->template->load('template','keuangan/setup',$data);
        }
    }
    
    function form(){
        $data['']="";
        $this->template->load('template','keuangan/form',$data);
    }
    
    function form_siswa_autocomplate(){
        $nis = $_GET['nis'];
        $sqlSiswa = "SELECT ts.nama as nama_siswa,ts.nim,tj.nama_jurusan,tr.nama_rombel,tr.kelas
                    FROM tbl_history_kelas as hk,tbl_siswa as ts,tbl_rombel as tr,tbl_jurusan as tj
                    WHERE ts.nim=hk.nim and tr.id_rombel=ts.id_rombel and tr.kd_jurusan=tj.kd_jurusan 
                    and hk.nim='$nis' and hk.id_tahun_akademik=".  get_tahun_akademik_aktif('id_tahun_akademik');
       $siswa = $this->db->query($sqlSiswa)->row_array();
        $data = array(
                    'nama'      =>  $siswa['nama_siswa'],
                    'jurusan'   =>  $siswa['nama_jurusan'],
                    'rombel'    =>  $siswa['nama_rombel'],
                    'kelas'     =>  $siswa['kelas'],);
         echo json_encode($data);
    }
}