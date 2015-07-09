<?php
class Dosen extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	
	function get($where = NULL, $ord = 'DESC') {
		if($where != NULL){
			$this->db->where($where);
		}
		return $this->db->get('dosen');
	}

	function add($data){
		$this->db->insert('dosen', $data);
		return $this->db->insert_id();
	}

	function edit($id, $data){
		$this->db->where('id_dosen', $id);
		return $this->db->update('dosen', $data);
	}
	
}