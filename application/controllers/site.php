<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {
	function __construct() {
		parent::__construct("site");

		$this->meta 			= array();
		$this->scripts 			= array();
		$this->styles 			= array();
		$this->parts['head'] 	= $this->load->view('partial/head', NULL, true);
		$this->title 			= "Welcome";
		$this->login_data		= $this->session->userdata('skilaboo_user');
	}

	public function index(){
		if($this->login_data == NULL){
			$this->load->view('site/index');
		}else{
			redirect(base_url() . "site/home");
		}
	}

	public function home(){
		$data['user'] = $this->login_data;
		$this->load->view('site/home', $data);	
	}

	function login(){
		$this->layout = false;
		$this->load->model('site_model');
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->site_model->login($email, $password);
		if($user){
			$this->session->set_userdata(array('skilaboo_user' => $user));
			redirect(base_url('site/home'));
		}else{
			$this->session->set_flashdata('login_msg', 'false');
			redirect(base_url('site/index'));
		}
	}

	function signup(){
		$this->layout = false;
		$this->load->model('member');
		
		$nama = $this->input->post('nama');
		$email =  $this->input->post('email');
		$password = $this->input->post('password');
		$no_telp = $this->input->post('no_telp');
		$alamat = $this->input->post('alamat');

		$data = array('nama' => $nama, 'email' => $email, 'password' => md5($password), 'no_telp' => $no_telp, 'alamat' => $alamat);
		if($id_member = $this->member->add($data)){
			$this->load->helper('mail');
			$mail_param   = array('from'		=> "Skilaboo <" . SKILABOO_ADMIN_MAIL . ">",
						    		'to' 		=> $nama . " <" . $email . ">",
									'subject' 	=> "Activation Account",
									'message' 	=> "Klik link ini untuk aktifasi <a href=" . base_url() . "/site/activation/" . $id_member . ">" . base_url() . "/site/activation/" . $id_member . "</a>");
											
			if (mail_send($mail_param, true)) {
				$this->session->set_flashdata('signup_msg', 'true');
				redirect(base_url('site/index'));
			}else{
				$this->session->set_flashdata('signup_msg', 'false');
				redirect(base_url('site/index'));
			}
		}
	}

	function activation($id_member){
		if($this->member->edit($id_member, array('status_aktivasi' => ACTIVE))){
			$this->session->set_flashdata('acivation_msg', 'true');
			redirect(base_url('site/index'));
		}
	}

	function logout(){
		if($this->session->userdata('skilaboo_user')) {
			$this->session->unset_userdata('skilaboo_user');
		}
		redirect(base_url());
	}

}