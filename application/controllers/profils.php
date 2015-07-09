<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profils extends CI_Controller {
	function __construct() {
		parent::__construct("profils");

		$this->meta 			= array();
		$this->scripts 			= array();
		$this->styles 			= array();
		$this->parts['head'] 	= $this->load->view('partial/head', NULL, true);
	}

	public function index($id = NULL){
		$this->title = 'Nama Membernya';
		/*
			KALO ID ($id) NYA KOSONG -> LOAD PROFILE SENDIRI
			KALO ID ($id) NYA GA KOSONG -> LOAD PROFILE SESUAI ID MEMBER TSB
		*/
		$data['detail'] = null;
		$this->load->view('profile/index', $data);
	}

}