<?php
class Site_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	
	function login($role, $email, $password) {
		$where	= array('email' 		  => $email, 
						'password' 		  => md5($password), 
						'status' => ACTIVE);

		if($role == 'dosen'){
			$query 	= $this->db->get_where('dosen', $where)->row_array();
			$query['id_jadwal'] = $this->create_schedule($query['id_dosen']); //create today schedule
		}else{
			$query 	= $this->db->get_where('mahasiswa', $where)->row_array();
		}
		
		return ($query ? $query : false);
	}

	function create_schedule($id){
		$this->load->model('schedule');

		$last_schedule = $this->schedule->get(array('id_dosen' => $id, 'tanggal' => date('Y-m-d')), 'DESC')->row_array();
		if($last_schedule != NULL){ // schedule not found
			return $last_schedule['id_jadwal'];
		}else{
			$data_schedule = array('tanggal' => date('Y-m-d'), 'id_dosen' => $id);
			print_r($data_schedule);
			return $this->schedule->add($data_schedule);
		}
	}
	
}