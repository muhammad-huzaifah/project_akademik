<?php

class Users extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		//CheckAksesModule();
		$this->load->library('ssp');
		$this->load->model('Model_user');
	}

	function data() {
		// nama tabel
		$table = 'v_tabel_user';
		// nama PK
		$primaryKey = 'id_user';
		// List field
		$columns = array(
			array('db' => 'foto','dt' => 'foto'),
			array('db' => 'nama_lengkap','dt' => 'nama_lengkap'),
			array('db' => 'nama_level','dt' => 'nama_level'),
			array(
				'db' => 'id_user',
				'dt' => 'aksi',
				'formatter' => function($d) {
					return anchor('users/edit/'.$d, '<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-warning tooltips" data-placement="top" data-original-title="Edit"').'
					 '.anchor('users/delete/'.$d, '<i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger tooltips" data-placement="top" data-original-title="Delete"');
				}
			)
			);

		$sql_details = array(
			'user' 	=> $this->db->username,
			'pass' 	=> $this->db->password,
			'db' 	=> $this->db->database,
			'host' 	=> $this->db->hostname
		);

		echo json_encode(
			SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
		);
	}

	function index(){
		$this->template->load('template', 'users/list');
	}

	function add(){
		if (isset($_POST['submit'])) {
//			echo "save";
            $uploadFoto = $this->uploads_foto_user();
			$this->Model_user->save($uploadFoto);
			redirect('users');
		} else {
			$this->template->load('template', 'users/add');
		}
	}

	function edit() {
	if (isset($_POST['submit'])){
		$uploadFoto = $this->uploads_foto_user();
		$this->Model_user->update($uploadFoto);
		redirect('users');
	}else {
		$id_user 		= $this->uri->segment(3);
		$data['user'] 	= $this->db->get_where('tabel_user', array('id_user'=>$id_user))->row_array();
		$this->template->load('template', 'users/edit', $data);
	}
	}

	function delete() {
		$id_user = $this->uri->segment(3);
		if (!empty($id_user)) {
			$this->db->where('id_user', $id_user);
			$this->db->delete('tabel_user');
		}
		redirect('users');
	}

    function uploads_foto_user() {
        $config['upload_path']          = './uploads/foto_user/';
        $config['allowed_types']        = 'jpg|png';
        $config['max_size']             = 1024;
        $this->load->library('upload', $config);
        // proses upload
        $this->upload->do_upload('userfile');
//		$data = array('upload_data' => $this->upload->data());
//		print_r($data);
        $upload = $this->upload->data();
        return $upload['file_name'];
    }

	function rule()
	{
		$this->template->load('template', 'users/rule');
	}

	function modul()
	{
		$level_user = $_GET['level_user'];
		echo "<table id='mytable' class='table table-striped table-bordered dataTable' style='width: 100%' role='grid'>
				<thead>
				<tr>
					<th style='width: 10px;'>NO</th>
					<th>NAMA MODUL</th>
					<th>LINK</th>
					<th style='width: 100px'>HAK AKSES</th>
				</tr>";
				
				$menu = $this->db->get('tabel_menu');
				$no=1;
					foreach ($menu->result() as $row) {
						echo "<tr>
								<td>$no</td>
								<td>$row->nama_menu</td>
								<td>$row->link</td>
								<td style='text-align: center'><input type='checkbox'  ";
						$this->check_akses($level_user, $row->id);
						echo " onclick='addRule($row->id)'></td>
							   </tr>";
						$no++;
					}

		echo "</thead>
				</table>";
	}

	function check_akses($level_user, $id_menu) {
		$data = array('id_level_user'=>$level_user, 'id_menu'=>$id_menu);
		$chek = $this->db->get_where('tabel_user_rule', $data);
		if ($chek->num_rows() > 0) {
			echo "Checked";
		}
	}

	function addRule() {
		$level_user = $_GET['level_user'];
		$id_menu = $_GET['id_menu'];
		$data = array('id_level_user'=>$level_user, 'id_menu'=>$id_menu);
//		print_r($data);
//		die();
		$chek = $this->db->get_where('tabel_user_rule', $data);
		if ($chek->num_rows() < 1) {
			$this->db->insert('tabel_user_rule', $data);
//			echo "insert";
		}else{
			$this->db->where('id_menu', $id_menu);
			$this->db->where('id_level_user', $id_menu);
			$this->db->delete('tabel_user_rule');
//			echo "delete";
		}

	}


}

