<?php

class Sms extends CI_Controller
{
	function index() {
		$this->template->load('template', 'sms/form_sms');
	}
}
