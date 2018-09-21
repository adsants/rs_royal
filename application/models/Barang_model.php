<?php

class Barang_model extends CI_Model {
	public function __construct() {
		parent::__construct();

		//$this->load->model('log_model');
	}

	function showData($where = null,$like = null,$order_by = null,$limit = null, $fromLimit=null){

		$this->db->select("m_barang.*");
		$this->db->select("m_satuan_barang.NAMA_SATUAN_BARANG");
		if($where){
			$this->db->where($where);
		}
		if($like){
			$this->db->like($like);
		}
		if($order_by){
			$this->db->order_by($order_by);
		}

		$this->db->join('m_satuan_barang', 'm_satuan_barang.ID_SATUAN_BARANG = m_barang.ID_SATUAN_BARANG');
		return $this->db->get("m_barang",$limit,$fromLimit)->result();
	}


	function getCount($where = null,$like = null,$order_by = null,$limit = null, $fromLimit=null){
		$this->db->select("*");
		if($where){
			$this->db->where($where);
		}
		if($like){
			$this->db->like($like);
		}
		return $this->db->get("m_barang",$limit,$fromLimit)->num_rows();
	}

	function getData($where){
		$this->db->select("*");
		$this->db->where($where);
		return $this->db->get("m_barang")->row();
	}


	function getPrimaryKeyMax(){
		$query = $this->db->query('select max(id_barang) as MAX from m_barang') ;
		return $query->row();
	}

	function insert($data){
		$this->db->insert('m_barang', $data);
	}
	function update($where,$data){
		$this->db->where($where);
		$this->db->update('m_barang', $data);
	}
	function delete($where){
		$this->db->where($where);
		$this->db->delete('m_barang');
	}


}

?>
