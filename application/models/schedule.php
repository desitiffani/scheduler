<?php
class Schedule extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	
	function get($where = NULL, $ord = 'DESC') {
		if($where != NULL){
			$this->db->where($where);
		}
		return $this->db->get('jadwal');
	}

	function add($data){
		$this->db->insert('jadwal', $data);
		return $this->db->insert_id();
	}

	function edit($id, $data){
		$this->db->where('id_jadwal', $id);
		return $this->db->update('jadwal', $data);
	}

	function delete($id){
		$this->db->where('id_jadwal', $id);
		return $this->db->delete('jadwal');
	}

	/* 'kegiatan' TABLE */
	function get_activity($where = NULL){
		if($where != NULL){
			$this->db->where($where);
		}
		return $this->db->get('kegiatan');
	}

	function add_activity($data){
		$this->db->insert('kegiatan', $data);
		return $this->db->insert_id();
	}

	function edit_activity($id, $data){
		$this->db->where('id_kegiatan', $id);
		return $this->db->update('kegiatan', $data);
	}

	function delete_activity($id){
		$this->db->where('id_kegiatan', $id);
		return $this->db->delete('kegiatan');
	}
	
}