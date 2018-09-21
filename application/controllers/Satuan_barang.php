<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Satuan_barang extends CI_Controller {



	public function __construct() {
		parent::__construct();

		$this->load->model('satuan_barang_model');

	}

	public function index(){

		$like = null;
		$urlSearch = null;
		$order_by ='NAMA_SATUAN_BARANG';

		if($this->input->get('field')){
			$like = array($_GET['field'] => $_GET['keyword']);
			$urlSearch = "?field=".$_GET['field']."&keyword=".$_GET['keyword'];
		}

		$config['base_url'] 	= base_url().''.$this->uri->segment(1).'/index'.$urlSearch;
		$this->jumlahData 		= $this->satuan_barang_model->getCount("",$like);
		$config['total_rows'] 	= $this->jumlahData;
		$config['per_page'] 	= 10;
		$this->showData = $this->satuan_barang_model->showData("",$like,$order_by,$config['per_page'],$this->input->get('per_page'));
		$this->pagination->initialize($config);
		$this->template_view->load_view('satuan_barang/satuan_barang_view');
	}
	public function add(){
		$this->template_view->load_view('satuan_barang/satuan_barang_add_view');
	}
	public function add_data(){
		$this->form_validation->set_rules('NAMA_SATUAN_BARANG', '', 'trim|required');

		if ($this->form_validation->run() == FALSE)	{
			$status = array('status' => FALSE, 'pesan' => 'Gagal menyimpan Data, pastikan telah mengisi semua inputan.');
		}
		else{
			$maxIDCustomer = $this->satuan_barang_model->getPrimaryKeyMax();
			$newId = $maxIDCustomer->MAX + 1;

			$data = array(
				'NAMA_SATUAN_BARANG' => $this->input->post('NAMA_SATUAN_BARANG')
			);

			$query = $this->satuan_barang_model->insert($data);
			$status = array('status' => true , 'redirect_link' => base_url()."".$this->uri->segment(1));
		}

		echo(json_encode($status));
	}

	public function edit($IdPrimaryKey){
		$where ="ID_SATUAN_BARANG = '".$IdPrimaryKey."' ";
		$this->oldData = $this->satuan_barang_model->getData($where);

		$this->template_view->load_view('satuan_barang/satuan_barang_edit_view');
	}
	public function edit_data(){
		$this->form_validation->set_rules('ID_SATUAN_BARANG', '', 'trim|required');
		$this->form_validation->set_rules('NAMA_SATUAN_BARANG', '', 'trim|required');

		if ($this->form_validation->run() == FALSE)	{
			$status = array('status' => FALSE, 'pesan' => 'Gagal menyimpan Data, pastikan telah mengisi semua inputan.');
		}
		else{
			$data = array(
				'NAMA_SATUAN_BARANG' => $this->input->post('NAMA_SATUAN_BARANG')
			);

			$query = $this->satuan_barang_model->update("ID_SATUAN_BARANG = ".$this->input->post('ID_SATUAN_BARANG'),$data);
			$status = array('status' => true , 'redirect_link' => base_url()."".$this->uri->segment(1));
		}

		echo(json_encode($status));
	}
	public function delete($IdPrimaryKey){
		$query = $this->satuan_barang_model->delete("ID_SATUAN_BARANG = ".$IdPrimaryKey);
		redirect(base_url()."".$this->uri->segment(1));

	}

}
