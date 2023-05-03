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
