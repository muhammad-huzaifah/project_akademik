<?php

class Walikelas extends CI_Controller
{
	function index() {
		$this->template->load('template', 'walikelas/list');
	}
}
