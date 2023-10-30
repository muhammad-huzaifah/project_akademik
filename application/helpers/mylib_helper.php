<?php
function cmb_dinamis($name, $table, $field, $pk, $selected=null, $extra=null) {
	$ci = & get_instance();
	$cmb = "<select name='$name' class='form-control' $extra>";
	$data = $ci->db->get($table)->result();
	foreach ($data as $row) {
		$cmb .="<option value='".$row->$pk."'";
		$cmb .= $selected==$row->$pk?'selected':'';
		$cmb .=">".$row->$field."</option>";
	}
	$cmb .= "</select>";
	return $cmb;
}

function get_tahun_akademik_aktif($field) {
	$ci = & get_instance();
	$ci->db->where('is_aktif', 'y');
	$tahun = $ci->db->get('tabel_tahun_akademik')->row_array();
	return $tahun[$field];
}

function check_komponen_biaya($id_jenis_pembayaran){
    $ci = & get_instance();
    $where = array(
        'id_jenis_pembayaran'   =>$id_jenis_pembayaran,
        'id_tahun_akademik'    =>get_tahun_akademik_aktif('id_tahun_akademik')
    );
    $biaya =    $ci->db->get_where('tabel_biaya_sekolah', $where);
    if ($biaya->num_rows()>0){
        $row = $biaya->row_array();
        return $row['jumlah_biaya'];
    }else {
        return 0;
    }
}

function check_nilai ($nim, $id_jadwal) {
    $ci = & get_instance();
    $nilai = $ci->db->get_where('tabel_nilai', array('nim'=>$nim, 'id_jadwal'=>$id_jadwal));
    if ($nilai->num_rows()>0) {
        $row = $nilai->row_array();
        return $row['nilai'];
    } else {
        return 0;
    }
}

function checkAksesModule()
{
	$ci = & get_instance();
	$controller = $ci->uri->segment(1);
	$method = $ci->uri->segment(2);

	if (empty($method)) {
		$url = $controller;
	} else {
		$url = $controller.'/'.$method;
	}
	//check id menu nya

	$menu = $ci->db->get_where('tabel_menu', array('link'=>$url))->row_array();
	$level_user = $ci->session->userdata('id_level_user');

	$check = $ci->db->get_where('tabel_user_rule', array('id_level_user'=>$level_user, 'id_menu'=>$menu['id']));
	//cara pertama untuk protec akses menu
/*	if ($check->num_rows()>0) {
		echo "OK";
	}else {
		echo "Anda tidak boleh akses modul ini";
	}*/

	//cara kedua untuk protec akses menu
//	if ($check->num_rows()<1) {
//		echo "ANDA TIDAK BOLEH MENGAKSES MODUL INI";
//	}else {
////		echo "ok";
//	}

//	return $url;

}

function Terbilang($x) {
	$abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
	if ($x < 12)
		return " " . $abil[$x];
	elseif ($x < 20)
		return Terbilang($x - 10) . "belas";
	elseif ($x < 100)
		return Terbilang($x / 10) . " puluh" . Terbilang($x % 10);
	elseif ($x < 200)
		return " seratus" . Terbilang($x - 100);
	elseif ($x < 1000)
		return Terbilang($x / 100) . " ratus" . Terbilang($x % 100);
	elseif ($x < 2000)
		return " seribu" . Terbilang($x - 1000);
	elseif ($x < 1000000)
		return Terbilang($x / 1000) . " ribu" . Terbilang($x % 1000);
	elseif ($x < 100000000)
		return Terbilang($x / 1000000) . " juta" . Terbilang($x % 1000000);
}
