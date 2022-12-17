<?php

class Model_jadwal extends CI_Model
{
	function getJamPelajaran() {
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
			'14.15 - 15.00' => '14.15 - 15.00'
		);
		return $jam_pelajaran;
	}

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


