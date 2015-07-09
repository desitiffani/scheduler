<?php
class Site_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	
	function login($role, $email, $password) {
		$where	= array('email' 		  => $email, 
						'password' 		  => md5($password), 
						'status' => ACTIVE);

		if($role == 'mahasiswa'){
			$query 	= $this->db->get_where('mahasiswa', $where)->row_array();
		}else{
			$query 	= $this->db->get_where('dosen', $where)->row_array();
		}
		
		return ($query ? $query : false);
	}
	
}