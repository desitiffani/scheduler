<?php
class Mahasiswa extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	
	function get($where = NULL, $ord = 'DESC') {
		if($where != NULL){
			$this->db->where($where);
		}
		return $this->db->get('mahasiswa');
	}

	function add($data){
		$this->db->insert('mahasiswa', $data);
		return $this->db->insert_id();
	}

	function edit($id, $data){
		$this->db->where('id_mahasiswa', $id);
		return $this->db->update('mahasiswa', $data);
	}
	
}