<?php
class Appointment extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	
	function get($where = NULL, $ord = 'DESC') {
		if($where != NULL){
			$this->db->where($where);
		}
		return $this->db->get('janji');
	}

	function get_with_student($where = NULL){
		$this->db->select('m.nama as nama_mhs, j.*');
		$this->db->from('janji as j');
		$this->db->join('mahasiswa as m', 'j.id_mahasiswa = m.id_mahasiswa');
		if($where != NULL){
			$this->db->where($where);
		}
		$this->db->order_by('j.status');
		$this->db->order_by('j.waktu_buat_janji', 'DESC');		
		return $this->db->get();
	}

	function get_with_teacher($where = NULL){
		$this->db->select('d.nama as nama_dosen, j.*');
		$this->db->from('janji as j');
		$this->db->join('dosen as d', 'j.id_dosen = d.id_dosen');
		if($where != NULL){
			$this->db->where($where);
		}
		$this->db->order_by('j.status');
		$this->db->order_by('j.waktu_buat_janji', 'DESC');
		return $this->db->get();
	}

	function add($data){
		return $this->db->insert('janji', $data);
	}

	function edit($id_mhs, $id_dsn, $data){
		$this->db->where('id_mahasiswa', $id_mhs);
		$this->db->where('id_dosen', $id_dsn);
		return $this->db->update('janji', $data);
	}

	function delete($id_mhs, $id_dosen){
		$this->db->where('id_mahasiswa', $id_mhs);
		$this->db->where('id_dosen', $id_dsn);
		return $this->db->delete('janji');
	}
	
}
