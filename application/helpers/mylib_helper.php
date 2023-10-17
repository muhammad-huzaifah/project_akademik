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
