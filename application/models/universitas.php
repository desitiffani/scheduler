<?php
class Universitas extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	
	function get($where = NULL, $ord = 'DESC') {
		if($where != NULL){
			$this->db->where($where);
		}
		return $this->db->get('universitas');
	}

	function add($data){
		$this->db->insert('universitas', $data);
		return $this->db->insert_id();
	}

	function edit($id, $data){
		$this->db->where('id_universitas', $id);
		return $this->db->update('universitas', $data);
	}
	
}