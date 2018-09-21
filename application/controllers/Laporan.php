<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller {



	public function __construct() {
		parent::__construct();

		$this->load->model('barang_model');
		$this->load->model('satuan_barang_model');

	}

	public function index(){

		$like = null;
		$urlSearch = null;
		$order_by ='NAMA_BARANG';

		if($this->input->get('field')){
			$like = array($_GET['field'] => $_GET['keyword']);
			$urlSearch = "?field=".$_GET['field']."&keyword=".$_GET['keyword'];
		}

		$config['base_url'] 	= base_url().''.$this->uri->segment(1).'/index'.$urlSearch;
		$this->jumlahData 		= $this->barang_model->getCount("",$like);
		$config['total_rows'] 	= $this->jumlahData;
		$config['per_page'] 	= 10;
		$this->showData = $this->barang_model->showData("",$like,$order_by,$config['per_page'],$this->input->get('per_page'));
		$this->pagination->initialize($config);
		$this->template_view->load_view('barang/barang_view');
	}
	public function add(){


		$orderBy 								= 	"NAMA_SATUAN_BARANG";
		$this->dataSatuanBarang = 	$this->satuan_barang_model->showData("",$orderBy);
		//var_dump($this->dataSatuanBarang);
		$this->template_view->load_view('barang/barang_add_view');
	}
	public function add_data(){
		$this->form_validation->set_rules('ID_SATUAN_BARANG', '', 'trim|required');
		$this->form_validation->set_rules('NAMA_BARANG', '', 'trim|required');
		$this->form_validation->set_rules('KODE_BARANG', '', 'trim|required');
		$this->form_validation->set_rules('JUMLAH_STOK', '', 'trim|required');

		if ($this->form_validation->run() == FALSE)	{
			$status = array('status' => FALSE, 'pesan' => 'Gagal menyimpan Data, pastikan telah mengisi semua inputan.');
		}
		else{
			$maxIDCustomer = $this->barang_model->getPrimaryKeyMax();
			$newId = $maxIDCustomer->MAX + 1;

			$data = array(
				'ID_BARANG' => $newId,
				'ID_SATUAN_BARANG' => $this->input->post('ID_SATUAN_BARANG'),
				'JUMLAH_STOK' => $this->input->post('JUMLAH_STOK'),
				'NAMA_BARANG' => $this->input->post('NAMA_BARANG'),
				'KODE_BARANG' => $this->input->post('KODE_BARANG')	,
				'KETERANGAN_BARANG' => $this->input->post('KETERANGAN_BARANG')
			);

			$query = $this->barang_model->insert($data);
			$status = array('status' => true , 'redirect_link' => base_url()."".$this->uri->segment(1));
		}

		echo(json_encode($status));
	}

	public function edit($IdPrimaryKey){
		$where ="ID_BARANG = '".$IdPrimaryKey."' ";
		$this->oldData = $this->barang_model->getData($where);


		$orderBy 								= 	"NAMA_SATUAN_BARANG";
		$this->dataSatuanBarang = 	$this->satuan_barang_model->showData("",$orderBy);

		$this->template_view->load_view('barang/barang_edit_view');
	}
	public function edit_data(){
		$this->form_validation->set_rules('ID_BARANG', '', 'trim|required');
		$this->form_validation->set_rules('ID_SATUAN_BARANG', '', 'trim|required');
		$this->form_validation->set_rules('NAMA_BARANG', '', 'trim|required');
		$this->form_validation->set_rules('KODE_BARANG', '', 'trim|required');
		$this->form_validation->set_rules('JUMLAH_STOK', '', 'trim|required');

		if ($this->form_validation->run() == FALSE)	{
			$status = array('status' => FALSE, 'pesan' => 'Gagal menyimpan Data, pastikan telah mengisi semua inputan.');
		}
		else{
			$data = array(
				'JUMLAH_STOK' => $this->input->post('JUMLAH_STOK'),
				'ID_SATUAN_BARANG' => $this->input->post('ID_SATUAN_BARANG')		,
				'NAMA_BARANG' => $this->input->post('NAMA_BARANG')		,
				'KODE_BARANG' => $this->input->post('KODE_BARANG')		,
				'KETERANGAN_BARANG' => $this->input->post('KETERANGAN_BARANG')
			);

			$query = $this->barang_model->update("ID_BARANG = ".$this->input->post('ID_BARANG'),$data);
			$status = array('status' => true , 'redirect_link' => base_url()."".$this->uri->segment(1));
		}

		echo(json_encode($status));
	}
	public function delete($IdPrimaryKey){
		$query = $this->barang_model->delete("ID_BARANG = ".$IdPrimaryKey);
		redirect(base_url()."".$this->uri->segment(1));

	}

	public function search_barang(){
		$where 			= "m_barang.nama_barang like '%".$this->input->get('term')."%' or m_barang.KODE_BARANG like '%".$this->input->get('term')."%'";

		//$like = array('m_barang.nama_barang' => $this->input->get('term'),'m_barang.KODE_BARANG' => $this->input->get('term') ) ;
		$dataBarang = $this->barang_model->showData($where,"","m_barang.nama_barang");
//echo $this->db->last_query();
//var_dump($dataBarang);

		echo '[';
		$i=1;
		foreach($dataBarang as $data){

			if($i > 1){echo ",";}
			echo '{ "label":"'.$data->NAMA_BARANG.'","nama_satuan_barang":"'.$data->NAMA_SATUAN_BARANG.'","id_barang":"'.$data->ID_BARANG.'","kode_barang":"'.$data->KODE_BARANG.'","stok":"'.$data->JUMLAH_STOK.'"} ';
			$i++;
		}
		echo ']';
	}

}
