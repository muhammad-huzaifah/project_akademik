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

function checkAksesModule()
{
	$ci = & get_instance();
	// ambil parameter uri segment untuk controller dan method
	$controller = $ci->uri->segment(1);
	$method = $ci->uri->segment(2);

	// check url
	if (empty($method)) {
		$url = $controller;
	} else {
		$url = $controller.'/'.$method;
	}

	//check id menu nya
	$menu = $ci->db->get_where('tabel_menu', array('link'=>$url))->row_array();
	$level_user = $ci->session->userdata('id_level_user');

	if (!empty($level_user)) {
		// check apakah level ini diberikan hak akses atau tidak
		$check = $ci->db->get_where('tabel_user_rule', array('id_level_user'=>$level_user, 'id_menu'=>$menu['id']));
		//cara pertama untuk protec akses menu
		/*	if ($check->num_rows()>0) {
				echo "OK";
			}else {
				echo "Anda tidak boleh akses modul ini";
			}*/

		//cara kedua untuk protec akses menu
		if ($check->num_rows() < 1 and $method!='data' and $method !='add' and $method !='edit' and $method !='delete') {
			echo "ANDA TIDAK BOLEH MENGAKSES MODUL INI";
			die;
		}
		}else {
			redirect('auth');
		}





}
