<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Messages extends CI_Controller {
	function __construct() {
		parent::__construct("site");

		$this->meta 			= array();
		$this->scripts 			= array();
		$this->styles 			= array();
		$this->parts['head'] 	= $this->load->view('partial/head', NULL, true);
		$this->title 			= "Messages";

		$this->login_data		= $this->session->userdata('skilaboo_user');
		$this->load->model('message');
	}

	public function index(){
		$this->load->model('member');

		$data['messages'] = $this->message->get_list($this->login_data['id_member']);
		//echo $this->db->last_query();die;
		for($i = 0; $i < count($data['messages']); $i ++){
			$member = $this->member->get(array('id_member' => $data['messages'][$i]['id_pengirim']))->row_array();
			$data['messages'][$i]['nama_member'] = $member['nama'];
		}
		$this->load->view('message/index', $data);
	}

	public function detail($friend_id){
		$this->load->model('teman');

		if($this->message->set_read_status($this->login_data['id_member'], $friend_id)){
			$data['friend'] = $this->teman->get_friend($this->login_data['id_member'], $friend_id);
			$data['login_id'] = $this->login_data['id_member'];
			$data['login_name'] = $this->login_data['nama'];
			$data['messages'] = $this->message->get_conversation($this->login_data['id_member'], $friend_id);
			$this->load->view('message/detail', $data);	
		}else{
			echo 'Terjadi kesalah silakan refresh kembali halaman ini';
		}
		
	}

	public function add(){
		$this->load->model('teman');

		$data['friends'] = $this->teman->get_friends($this->login_data['id_member']);
		$data['login_id'] = $this->login_data['id_member'];
		$this->load->view('message/form', $data);
	}

	public function process_send(){
		$this->layout = false;
		$this->load->model('member');

		$data_add = array('id_pengirim' => $this->login_data['id_member'],
						  'id_penerima' => $this->input->post('friend'),
						  'isi'			=> $this->input->post('message'));

		$receiver = $this->member->get(array('id_member' => $data_add['id_penerima']))->row_array();

		// start send email
		if($msg_id = $this->message->add($data_add) && $receiver['email']){
			$this->load->helper('mail');
			$mail_param 	= array('from'		=> "Skilaboo <" . SKILABOO_ADMIN_MAIL . ">",
									'to' 		=> $receiver['nama'] . " <" . $receiver['email'] . ">",
									'subject' 	=> "Pesan baru dari " . $receiver['nama'],
									'message' 	=> $data_add['isi'] . "<br/> <a href=". base_url() ."messages/detail/". $data_add['id_penerima'] .">Lihat Detail Conversation</a>" . SKILABOO_REGARD_TEXT);
												
			if (mail_send($mail_param, true)) {
				$this->session->set_flashdata('send_message', 'true');
				redirect(base_url() . "messages/detail/" . $data_add['id_penerima']);
			}else{
				$this->session->set_flashdata('send_message', 'false');
				redirect($_SERVER['HTTP_REFERER']);
			}
			
		}else{
			$this->session->set_flashdata('send_message', 'false');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	function get_notification(){
		$this->layout = false;
		echo json_encode($this->message->get(array('id_penerima' => $this->login_data['id_member'], 'status_baca' => MSG_NOT_READ))->num_rows());
	}

	public function delete($id_pesan, $member_type){
		if($member_type == 'sender'){
			$data = array('status_hapus_pengirim' => MSG_DELETED);
		}else{
			$data = array('status_hapus_penerima' => MSG_DELETED);
		}

		if($this->message->delete($id_pesan, $data)) {
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

}