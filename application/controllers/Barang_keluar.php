<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Barang_keluar extends CI_Controller {



	public function __construct() {
		parent::__construct();

		$this->load->model('barang_model');
		$this->load->model('satuan_barang_model');
		$this->load->model('t_barang_model');

	}

	public function index(){

		$like = null;
		$urlSearch = null;
		$where = "t_barang.JENIS_TRANSAKSI = 'K'";
		$order_by ='TGL_TRANSAKSI DESC';

		if($this->input->get('field')){
			$like = array($_GET['field'] => $_GET['keyword']);
			$urlSearch = "?field=".$_GET['field']."&keyword=".$_GET['keyword'];
		}

		$config['base_url'] 	= base_url().''.$this->uri->segment(1).'/index'.$urlSearch;
		$this->jumlahData 		= $this->t_barang_model->getCount($where,$like);
		$config['total_rows'] 	= $this->jumlahData;
		$config['per_page'] 	= 10;
		$this->showData = $this->t_barang_model->showData($where,$like,$order_by,$config['per_page'],$this->input->get('per_page'));
		$this->pagination->initialize($config);
		$this->template_view->load_view('transaksi/transaksi_barang_view');
	}
	public function add(){


		$orderBy 								= 	"NAMA_SATUAN_BARANG";
		$this->dataSatuanBarang = 	$this->satuan_barang_model->showData("",$orderBy);
		//var_dump($this->dataSatuanBarang);
		$this->template_view->load_view('transaksi/form_view');
	}
	public function add_data(){
		$this->form_validation->set_rules('ID_BARANG', '', 'trim|required');
		$this->form_validation->set_rules('JUMLAH_TRANSAKSI', '', 'trim|required');

		if ($this->form_validation->run() == FALSE)	{
			$status = array('status' => FALSE, 'pesan' => 'Gagal menyimpan Data, pastikan telah mengisi semua inputan.');
		}
		else{
			$maxIDCustomer = $this->t_barang_model->getPrimaryKeyMax();
			$newId = $maxIDCustomer->MAX + 1;

			$data = array(
				'ID_BARANG' 				=> $this->input->post('ID_BARANG'),
				'ID_USER' 					=> $this->session->userdata('id_user'),
				'JENIS_TRANSAKSI' 	=> 'K',
				'JUMLAH_TRANSAKSI' 	=> $this->input->post('JUMLAH_TRANSAKSI')	,
				'KETERANGAN' 				=> $this->input->post('KETERANGAN')
			);

			$query = $this->t_barang_model->insert($data);


			/// harusnya memakai Trigger Database namun untuk saat ini saya memakai script PHP karena takut tidak jalan
			$where ="ID_BARANG = '".$this->input->post('ID_BARANG')."' ";
			$this->oldData = $this->barang_model->getData($where);
			$jumlahStok	=	$this->oldData->JUMLAH_STOK - $this->input->post('JUMLAH_TRANSAKSI');

			$data = array(
				'JUMLAH_STOK' => 	$jumlahStok
			);
			$query = $this->barang_model->update("ID_BARANG = ".$this->input->post('ID_BARANG'),$data);

			$status = array('status' => true , 'redirect_link' => base_url()."".$this->uri->segment(1));

		}

		echo(json_encode($status));
	}


}
