<?php
class Site_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	
	function login($email, $password) {
		$where	= array('email' 		  => $email, 
						'password' 		  => md5($password), 
						'status_aktivasi' => ACTIVE);
		$query 	= $this->db->get_where('member', $where)->row_array();
		
		return ($query ? $query : false);
	}
	
}