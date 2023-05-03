<?php

class Model_walikelas extends CI_Model
{
	function setup_walikelas() {
		$rombel = $this->db->get('tabel_rombel');
		foreach ($rombel->result() as $row) {
			$walikelas = array(
				'id_guru' => '2',
				'id_tahun_akademik'=> get_tahun_akademik_aktif('id_tahun_akademik'),
				'id_rombel' => $row->id_rombel
			);
			$this->db->insert('tabel_walikelas', $walikelas);
		}
	}
}
