<?php

class T_barang_model extends CI_Model {
	public function __construct() {
		parent::__construct();

		//$this->load->model('log_model');
	}

	function showData($where = null,$like = null,$order_by = null,$limit = null, $fromLimit=null){

		$this->db->select("m_user.NAMA_USER");
		$this->db->select("m_barang.KODE_BARANG");
		$this->db->select("m_barang.NAMA_BARANG");
		$this->db->select("m_satuan_barang.NAMA_SATUAN_BARANG");
		$this->db->select("t_barang.JENIS_TRANSAKSI");
		$this->db->select("t_barang.JUMLAH_TRANSAKSI");
		$this->db->select("t_barang.KETERANGAN");
		$this->db->select("date_format(t_barang.TGL_TRANSAKSI,'%d-%m-%Y %H:%I') as TGL_TRANSAKSI_INDO");
		if($where){
			$this->db->where($where);
		}
		if($like){
			$this->db->like($like);
		}
		if($order_by){
			$this->db->order_by($order_by);
		}

		$this->db->join('m_barang', 'm_barang.id_barang = t_barang.id_barang');
		$this->db->join('m_satuan_barang', 'm_satuan_barang.ID_SATUAN_BARANG = m_barang.ID_SATUAN_BARANG');
		$this->db->join('m_user', 'm_user.id_user = t_barang.id_user');
		return $this->db->get("t_barang",$limit,$fromLimit)->result();
	}


	function getCount($where = null,$like = null,$order_by = null,$limit = null, $fromLimit=null){
		$this->db->select("m_user.NAMA_USER");
		$this->db->select("m_barang.KODE_BARANG");
		$this->db->select("m_barang.NAMA_BARANG");
		$this->db->select("m_satuan_barang.NAMA_SATUAN_BARANG");
		$this->db->select("t_barang.JENIS_TRANSAKSI");
		$this->db->select("t_barang.JUMLAH_TRANSAKSI");
		$this->db->select("t_barang.KETERANGAN");
		$this->db->select("date_format(t_barang.TGL_TRANSAKSI,'%d-%m-%Y %H:%I') as TGL_TRANSAKSI_INDO");
		if($where){
			$this->db->where($where);
		}
		if($like){
			$this->db->like($like);
		}
		if($order_by){
			$this->db->order_by($order_by);
		}

		$this->db->join('m_barang', 'm_barang.id_barang = t_barang.id_barang');
		$this->db->join('m_satuan_barang', 'm_satuan_barang.ID_SATUAN_BARANG = m_barang.ID_SATUAN_BARANG');
		$this->db->join('m_user', 'm_user.id_user = t_barang.id_user');

		return $this->db->get("t_barang",$limit,$fromLimit)->num_rows();
	}

	function getData($where){
		$this->db->select("*");
		$this->db->where($where);
		return $this->db->get("t_barang")->row();
	}


	function getPrimaryKeyMax(){
		$query = $this->db->query('select max(id_t_barang) as MAX from t_barang') ;
		return $query->row();
	}

	function insert($data){
		$this->db->insert('t_barang', $data);
	}
	function update($where,$data){
		$this->db->where($where);
		$this->db->update('t_barang', $data);
	}
	function delete($where){
		$this->db->where($where);
		$this->db->delete('t_barang');
	}


}

?>
