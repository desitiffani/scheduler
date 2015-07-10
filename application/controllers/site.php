<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {
	function __construct() {
		parent::__construct("site");

		$this->meta 			= array();
		$this->scripts 			= array();
		$this->styles 			= array();
		$this->login_data		= $this->session->userdata('scheduler_user');
		$this->parts['head'] 	= $this->load->view('partial/head', array('user' => $this->login_data), true);
		$this->title 			= "Scheduler";
	}

	public function index(){
		if($this->login_data == NULL){
			$this->parts['head'] = null;
			$this->scripts[] = "site/landing_page";

			$this->load->model('universitas');
			$data['perguruan_tinggi'] = $this->universitas->get()->result_array();
			$this->load->view('site/index', $data);
		}else{
			redirect(base_url() . "site/home");
		}
	}

	public function home(){
		$data['user'] = $this->login_data;
		$this->load->view('site/home', $data);	
	}

	function login(){
		$this->parts['head'] = null;

		if(isset($_POST['login'])){
			$this->load->model('site_model');

			$role = $this->input->post('role');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$user = $this->site_model->login($role, $email, $password);
			if($user){
				$user['role'] = $role;
				$this->session->set_userdata(array('scheduler_user' => $user));
				redirect(base_url('site/home'));
			}else{
				$this->session->set_flashdata('login_msg', 'false');
				redirect(base_url('site/login'));
			}
		}
		$this->load->view('site/login');
	}

	function signup(){
		$this->layout = false;
		$role = $this->input->post('role');

		if($role == 'mhs'){ //daftar sbg mahasiswa
			$this->load->model('mahasiswa');
			$data_post = array('email' => $this->input->post('email'), 
							   'nama' => $this->input->post('nama'),
							   'password' => md5($this->input->post('password')),
							   'jurusan' => $this->input->post('jurusan'),
							   'id_universitas' => $this->input->post('perguruan_tinggi'));

			$id_mhs = $this->mahasiswa->add($data_post);
			if($id_mhs){
				$this->load->helper('mail');
				$mail_param   = array('from'		=> "Scheduler <" . SKILABOO_ADMIN_MAIL . ">",
							    	  'to' 			=> $data_post['nama'] . " <" . $data_post['email'] . ">",
									  'subject' 	=> "Activation Account",
									  'message' 	=> "Klik link ini untuk aktifasi 
									  					<a href=" . base_url() . "/site/activation/mahasiswa/" . $id_mhs . ">" . 
									  					base_url() . "/site/activation/" . $id_mhs . "</a>");
												
				if (mail_send($mail_param, true)) {
					$this->session->set_flashdata('signup_msg', 'true');
					redirect(base_url('site/index'));
				}else{
					$this->session->set_flashdata('signup_msg', 'false');
					redirect(base_url('site/index'));
				}
			}
		}elseif($role == 'dsn'){ //daftar sbg dosen
			$this->load->model('dosen');
			$data_post = array('email' => $this->input->post('email'), 
							   'nama' => $this->input->post('nama'),
							   'password' => md5($this->input->post('password')),
							   'keterangan' => $this->input->post('keterangan'));

			$id_dosen = $this->dosen->add($data_post);
			if($id_dosen){
				$this->load->helper('mail');
				$mail_param   = array('from'		=> "Scheduler <" . SKILABOO_ADMIN_MAIL . ">",
							    	  'to' 			=> $data_post['nama'] . " <" . $data_post['email'] . ">",
									  'subject' 	=> "Activation Account",
									  'message' 	=> "Klik link ini untuk aktifasi 
									  					<a href=" . base_url() . "/site/activation/dosen/" . $id_dosen . ">" . 
									  					base_url() . "/site/activation/" . $id_dosen . "</a>");
												
				if (mail_send($mail_param, true)) {
					$this->session->set_flashdata('signup_msg', 'true');
					redirect(base_url('site/index'));
				}else{
					$this->session->set_flashdata('signup_msg', 'false');
					redirect(base_url('site/index'));
				}
			}
		}
	}

	function activation($role, $id){
		if($role == 'mahasiswa'){
			$this->load->model('mahasiswa');

			if($this->mahasiswa->edit($id, array('status' => ACTIVE))){
				$this->session->set_flashdata('activation_msg', 'true');
				redirect(base_url('site/index'));
			}
		}elseif($role == 'dosen'){
			$this->load->model('dosen');

			if($this->dosen->edit($id, array('status' => ACTIVE))){
				$this->session->set_flashdata('activation_msg', 'true');
				redirect(base_url('site/index'));
			}
		}
	}

	function edit_profile(){
		if($this->login_data['role'] == 'mahasiswa'){
			$this->load->model('mahasiswa');
			$data['role'] = "mahasiswa";
			$data['detail'] = $this->mahasiswa->get(array('id_mahasiswa' => $this->login_data['id_mahasiswa']))->row_array();
			$data['id'] = $data['detail']['id_mahasiswa'];
		}else if($this->login_data['role'] == 'dosen'){
			$this->load->model('dosen');
			$data['detail'] = $this->dosen->get(array('id_dosen' => $this->login_data['id_dosen']))->row_array();
			$data['role'] = "dosen";
			$data['id'] = $data['detail']['id_dosen'];
		}
		$this->load->view('site/edit_profile', $data);
	}

	function save_profile(){
		$role = $this->input->post('role');
		$id = $this->input->post('id');
		$data_post = array('nama' => $this->input->post('nama'), 
						   'no_telp' => $this->input->post('no_telp'),
						   'alamat' => $this->input->post('alamat'));

		$password = $this->input->post('password');
		if(!empty($password)){
			$data_post['password'] = $password;
		}

		if($role == 'mahasiswa'){
			$data_post['thn_masuk'] = $this->input->post('tahun_masuk');
			$data_post['jurusan'] = $this->input->post('jurusan');

			$this->load->model('mahasiswa');
			$success = $this->mahasiswa->edit($id, $data_post);
		}else{
			$data_post['keterangan'] = $this->input->post('keterangan');
			$data_post['facebook'] = $this->input->post('facebook');
			$data_post['twitter'] = $this->input->post('twitter');

			$this->load->model('dosen');
			$success = $this->dosen->edit($id, $data_post);
		}

		if($success){
			$this->session->set_flashdata('profile_msg', 'true');
			redirect($_SERVER['HTTP_REFERER']);
		}else{
			$this->session->set_flashdata('profile_msg', 'false');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	function logout(){
		if($this->session->userdata('scheduler_user')) {
			$this->session->unset_userdata('scheduler_user');
		}
		redirect(base_url());
	}

}