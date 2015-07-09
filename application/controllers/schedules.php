<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schedules extends CI_Controller {
	function __construct() {
		parent::__construct("profils");

		$this->meta 			= array();
		$this->scripts 			= array();
		$this->styles 			= array();
		$this->title 			= "Jadwal";
		$this->login_data		= $this->session->userdata('scheduler_user');
		$this->parts['head'] 	= $this->load->view('partial/head', array('user' => $this->login_data), true);
		$this->load->model('schedule');
	}

	public function index(){
		$data['activities'] = $this->schedule->get_activity(array('id_jadwal' => $this->login_data['id_jadwal']))->result_array();
		$this->load->view('schedule/index', $data);
	}

	public function add(){
		$data['mode'] = 'ADD';
		$this->load->view('schedule/form', $data);
	}

	public function edit($id){
		$data['mode'] = 'EDIT';
		$data['detail'] = $this->schedule->get_activity(array('id_kegiatan' => $id))->row_array();
		$this->load->view('schedule/form', $data);
	}

	public function save(){
		$data_post = array('judul' => $this->input->post('judul'),
						   'jam_mulai' => $this->input->post('jam_mulai'), 
						   'jam_selesai' => $this->input->post('jam_selesai'),
						   'tempat' => $this->input->post('tempat'),
						   'letak_geografis' => $this->input->post('letak_geografis'),
						   'id_jadwal' => $this->login_data['id_jadwal']);

		$mode = $this->input->post('mode');
		if($mode == 'ADD'){
			$status = $this->schedule->add_activity($data_post);
		}else{
			$id = $this->input->post('id_kegiatan');
			$status = $this->schedule->edit_activity($id, $data_post);
		}

		if($status){
			$this->session->set_flashdata('add_activity_msg', 'true');
			redirect(base_url() . "schedules");
		}else{
			$this->session->set_flashdata('add_activity_msg', 'false');
			redirect(base_url() . "schedules");
		}
	}

	public function delete($id){
		if($this->schedule->delete_activity($id)){
			$this->session->set_flashdata('delete_activity_msg', 'true');
			redirect(base_url() . "schedules");
		}else{
			$this->session->set_flashdata('delete_activity_msg', 'false');
			redirect(base_url() . "schedules");
		}
	}

}