<?php

class Model_jadwal extends CI_Model
{
	function generateJadwal() {
		$id_kurikulum 	= $this->input->post('kurikulum');
		$semester 		= $this->input->post('semester');

		// ambil data berdasarkan kurikulum yang dipilih
		$kurikulum_detail = $this->db->get_where('tabel_kurikulum_detail', array('id_kurikulum'=>$id_kurikulum));

		// ambil tahun akademik aktif
		$tahun_akademik = $this->db->get_where('tabel_tahun_akademik', array('is_aktif'=>'Y'))->row_array();

		foreach ($kurikulum_detail->result() as $row) {
//			print_r($row);

			$data = array(
						'id_tahun_akademik'	=>$tahun_akademik['id_tahun_akademik'],
						'semester' 			=> $semester,
						'hari' 				=> '',
						'kd_jurusan' 		=> $row->kd_jurusan,
						'kd_mapel' 			=> $row->kd_mapel,
						'kelas' 			=> $row->kelas,
						'id_guru' 			=> 0,
						'jam_mulai' 		=> '',
						'jam_selesai' 		=> '',
						'kd_ruangan' 		=> '011');
			$this->db->insert('tabel_jadwal', $data);
		}
	}
}


