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
			$view = 'appointment/index';
		}elseif($this->login_data['role'] == 'mahasiswa'){
			$data['appointments'] = $this->appointment->get_with_teacher(array('j.id_mahasiswa' => $this->login_data['id_mahasiswa']))->result_array();
			$view = 'appointment/index_mhs';
		}
		$data['user'] = $this->login_data;
		$this->load->view($view, $data);
	}

	public function add(){
		$this->load->model('dosen');

		$data['teachers'] = $this->dosen->get_highlight($this->login_data['id_mahasiswa']);
		$this->load->view('appointment/form', $data);
	}

	public function save(){
		$data_post = array('id_mahasiswa' => $this->login_data['id_mahasiswa'],
						   'id_dosen' => $this->input->post('id_dosen'), 
						   'keterangan' => $this->input->post('keterangan'),
						   'waktu_janji' => $this->input->post('waktu_janji'));

		$success = $this->appointment->add($data_post);
		
		if($success){
			$this->session->set_flashdata('add_appointment_msg', 'true');
			redirect(base_url() . "appointments");
		}else{
			$this->session->set_flashdata('add_appointment_msg', 'false');
			redirect(base_url() . "appointments");
		}
	}

	public function delete($id_mhs, $id_dosen){
		if($this->appointment->delete($id_mhs, $id_dosen)){
			$this->session->set_flashdata('delete_appointment_msg', 'true');
			redirect(base_url() . "appointments");
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