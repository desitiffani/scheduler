<?php
class Member extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	
	function get($where = NULL, $ord = 'DESC') {
		if($where != NULL){
			$this->db->where($where);
		}
		return $this->db->get('member');
	}

	function get_email($member_id){
		$user = $this->get(array('id_member' => $member_id))->row_array();
		return $user['email'];
	}

	function add($data){
		$this->db->insert('member', $data);
		return $this->db->insert_id();
	}

	function edit($id, $data){
		$this->db->where('id_member', $id);
		return $this->db->update('member', $data);
	}
	
}