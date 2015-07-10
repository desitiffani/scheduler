<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teachers extends CI_Controller {
	function __construct() {
		parent::__construct("teachers");

		$this->meta 			= array();
		$this->scripts 			= array();
		$this->styles 			= array();
		$this->title 			= "Dosen";
		$this->login_data		= $this->session->userdata('scheduler_user');
		$this->parts['head'] 	= $this->load->view('partial/head', array('user' => $this->login_data), true);
		$this->load->model('dosen');
	}

	public function index(){
		$this->scripts[] = "site/teacher";
		$data['teachers'] = $this->dosen->get_highlight($this->login_data['id_mahasiswa']);
		$data['user'] = $this->login_data;
		$this->load->view('teacher/index', $data);
	}

	/* GET SCHEDULE DETAIL THROUGH AJAX */
	public function get_schedule_detail($id){
		$this->layout = false; //hide layouting

		$this->load->model('schedule');
		echo json_encode($this->schedule->get_activity(array('id_jadwal' => $id))->result_array());
	}

	/* GET TEACHER DETAIL THROUGH AJAX */
	public function get_detail($id){
		$this->layout = false; //hide layouting
		echo json_encode($this->dosen->get(array('id_dosen' => $id))->row_array());
	}

	
}