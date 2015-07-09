<?php
class Message extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	
	function get($where = NULL, $ord = 'DESC', $grp = NULL) {
		if($where != NULL){
			$this->db->where($where);
		}

		if($grp != NULL){
			$this->db->group_by($grp);
		}
		$this->db->order_by('tgl_dikirim', $ord);
		return $this->db->get('pesan');
	}

	function get_list($id_penerima){
		$this->db->select('m1.*');
		$this->db->from('pesan as m1');
		$this->db->join("pesan as m2", ("m1.id_pengirim = m2.id_pengirim AND m1.id_pesan < m2.id_pesan"), "LEFT");
		$this->db->where('m1.id_penerima', $id_penerima);
		$this->db->where('m1.status_hapus_penerima != ', MSG_DELETED);
		$this->db->where('m2.id_pesan IS NULL');
		$this->db->order_by('m1.tgl_dikirim', 'DESC');
		return $this->db->get()->result_array();
	}

	function get_conversation($member_id, $friend_id){
		return $this->get('(id_pengirim = ' . $member_id . ' AND id_penerima = ' . $friend_id . ' 
			AND status_hapus_pengirim != "'. MSG_DELETED .'") OR (id_pengirim = ' . $friend_id . ' 
			AND id_penerima = ' . $member_id . ' AND status_hapus_penerima != "'. MSG_DELETED .'")', 'ASC')->result_array();
	}

	function add($data){
		$this->db->insert('pesan', $data);
		return $this->db->insert_id();
	}

	function set_read_status($member_id, $friend_id){
		$this->db->where('id_pengirim', $friend_id);
		$this->db->where('id_penerima', $member_id);
		return $this->db->update('pesan', array('status_baca' => MSG_READ));
	}

	function delete($message_id, $data){
		$this->db->where('id_pesan', $message_id);
		return $this->db->update('pesan', $data);
	}
	
}