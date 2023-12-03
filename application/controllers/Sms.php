<?php

class Sms extends CI_Controller
{
	function index()
	{
		$this->template->load('template', 'sms/form_sms');
	}

	function send()
	{
		if (isset($_POST['submit'])) {
			$group = $this->input->post('group');
			$pesan = $this->input->post('pesan');
			$phonebooks = $this->db->get_where('tabel_phonebook', array('id_group' => $group));
			foreach ($phonebooks->result() as $phonebook) {
//				echo $phonebook->no_hp;
//				echo $this->input->post('pesan');
				sendsms($phonebook->no_hp, $pesan);
			}
			redirect('sms');
		} else {
			redirect('sms');
		}
	}
}
