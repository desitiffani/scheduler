<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Appointments extends CI_Controller {
	function __construct() {
		parent::__construct("profils");

		$this->meta 			= array();
		$this->scripts 			= array();
		$this->styles 			= array();
		$this->title 			= "Janji";
		$this->login_data		= $this->session->userdata('scheduler_user');
		$this->parts['head'] 	= $this->load->view('partial/head', array('user' => $this->login_data), true);
		$this->load->model('appointment');
	}

	public function index(){
		$this->scripts[] = "site/appointment";

		if($this->login_data['role'] == 'dosen'){
			$data['appointments'] = $this->appointment->get_with_student(array('j.id_dosen' => $this->login_data['id_dosen'], 'j.status != ' => 'Rejected'))->result_array();
		}elseif($this->login_data['role'] == 'mahasiswa'){
			/* TO DO MENAMPILKAN JANJI YANG TELAH DIBUAT OLEH MAHASISWA */
		}
		$data['user'] = $this->login_data;
		$this->load->view('appointment/index', $data);
	}

	public function add(){
		$data['mode'] = 'ADD';
		$this->load->view('appointment/form', $data);
	}

	public function save(){
		$data_post = array('judul' => $this->input->post('judul'),
						   'jam_mulai' => $this->input->post('jam_mulai'), 
						   'jam_selesai' => $this->input->post('jam_selesai'),
						   'tempat' => $this->input->post('tempat'),
						   'letak_geografis' => $this->input->post('letak_geografis'),
						   'id_jadwal' => $this->login_data['id_jadwal']);

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

	public function approve($id_mhs, $id_dosen){
		if($this->appointment->edit($id_mhs, $id_dosen, array('status' => 'Approved'))){
			$this->session->set_flashdata('approve_msg', 'true');
			redirect(base_url() . "appointments");
		}else{
			$this->session->set_flashdata('approve_msg', 'false');
			redirect(base_url() . "appointments");
		}
	}

	public function reject(){
		$id_mhs = $this->input->post('id_mahasiswa');
		$id_dosen = $this->input->post('id_dosen');

		if(isset($id_mhs) && isset($id_dosen)){
			if($this->appointment->edit($id_mhs, $id_dosen, array('status' => 'Rejected', 'alasan_reject' => $this->input->post('alasan_reject')))){
				$this->session->set_flashdata('reject_msg', 'true');
				redirect(base_url() . "appointments");
			}else{
				$this->session->set_flashdata('reject_msg', 'false');
				redirect(base_url() . "appointments");
			}
		}
	}

}