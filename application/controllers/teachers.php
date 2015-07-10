<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teachers extends CI_Controller {
	function __construct() {
		parent::__construct("profils");

		$this->meta 			= array();
		$this->scripts 			= array();
		$this->styles 			= array();
		$this->title 			= "Dosen";
		$this->login_data		= $this->session->userdata('scheduler_user');
		$this->parts['head'] 	= $this->load->view('partial/head', array('user' => $this->login_data), true);
		$this->load->model('dosen');
		//$this->load->model('schedule');
	}

	public function index(){
		$this->scripts[] = "site/teacher";

		$data['teachers'] = $this->dosen->get_highlight($this->login_data['id_mahasiswa']);

		
		$data['user'] = $this->login_data;
		$this->load->view('teacher/index', $data);
	}

	
}