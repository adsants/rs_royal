<?php

class User_model extends CI_Model {
	public function __construct() {
		parent::__construct();

		//$this->load->model('log_model');
	}

	function showData($where = null,$like = null,$order_by = null,$limit = null, $fromLimit=null){

		$this->db->select("m_user.*");
		$this->db->select("m_kategori_user.NAMA_KATEGORI_USER");
		if($where){
			$this->db->where($where);
		}
		if($like){
			$this->db->like($like);
		}
		if($order_by){
			$this->db->order_by($order_by);
		}
		$this->db->join('m_kategori_user', 'm_kategori_user.id_kategori_user = m_user.id_kategori_user');
		return $this->db->get("m_user",$limit,$fromLimit)->result();
	}


	function getCount($where = null,$like = null,$order_by = null,$limit = null, $fromLimit=null){
		$this->db->select("*");
		if($where){
			$this->db->where($where);
		}
		if($like){
			$this->db->like($like);
		}
		return $this->db->get("m_user",$limit,$fromLimit)->num_rows();
	}

	function getData($where){
		$this->db->select("*");
		$this->db->where($where);
		return $this->db->get("m_user")->row();
	}


	function getPrimaryKeyMax(){
		$query = $this->db->query('select max(id_USER) as MAX from m_user') ;
		return $query->row();
	}

	function insert($data){
		$this->db->insert('m_user', $data);
	}
	function update($where,$data){
		$this->db->where($where);
		$this->db->update('m_user', $data);
	}
	function delete($where){
		$this->db->where($where);
		$this->db->delete('m_user');
	}


}

?>
