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

	function get_highlight($id_mahasiswa){
		$this->db->select('d.id_dosen, d.nama, j.id_jadwal, j.terakhir_diedit');
		$this->db->from('dosen_highlight as dh');
		$this->db->join('dosen as d', 'd.id_dosen = dh.id_dosen');
		$this->db->join('jadwal as j', 'j.id_dosen = dh.id_dosen');
		$this->db->where('dh.id_mahasiswa', $id_mahasiswa);
		$this->db->where('j.tanggal', date('Y-m-d'));
		return $this->db->get()->result_array();
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