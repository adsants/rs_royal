<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {



	public function __construct() {
		parent::__construct();

		$this->load->model('user_model');
		$this->load->model('kategori_user_model');
		$this->load->model('user_model');

	}

	public function index(){

		$like = null;
		$urlSearch = null;
		$order_by ='NAMA_USER';
		$where = "username != ''	";

		if($this->input->get('field')){
			$like = array($_GET['field'] => $_GET['keyword']);
			$urlSearch = "?field=".$_GET['field']."&keyword=".$_GET['keyword'];
		}

		$config['base_url'] 	= base_url().''.$this->uri->segment(1).'/index'.$urlSearch;
		$this->jumlahData 		= $this->user_model->getCount($where,$like);
		$config['total_rows'] 	= $this->jumlahData;
		$config['per_page'] 	= 10;
		$this->showData = $this->user_model->showData($where,$like,$order_by,$config['per_page'],$this->input->get('per_page'));
		$this->pagination->initialize($config);
		$this->template_view->load_view('user/user_view');
	}
	public function add(){
		$order_by = 'nama_kategori_user';
		$this->dataKategoriUser = 	$this->kategori_user_model->showData("","",$order_by);
		$this->template_view->load_view('user/user_add_view');
	}
	public function add_data(){
		$this->form_validation->set_rules('NAMA_USER', '', 'trim|required');
		$this->form_validation->set_rules('PASSWORD', '', 'trim|required');
		$this->form_validation->set_rules('USERNAME', '', 'trim|required');

		if ($this->form_validation->run() == FALSE)	{
			$status = array('status' => FALSE, 'pesan' => 'Gagal menyimpan Data, pastikan telah mengisi semua inputan.');
		}
		else{
			$maxIDCustomer = $this->user_model->getPrimaryKeyMax();
			$newId = $maxIDCustomer->MAX + 1;

			$data = array(
				'ID_USER' => $newId,
				'USERNAME' => $this->input->post('USERNAME'),
				'NAMA_USER' => $this->input->post('NAMA_USER'),
				'ID_KATEGORI_USER' => $this->input->post('ID_KATEGORI_USER'),
				'PASSWORD' => $this->input->post('PASSWORD')	,
				'AKTIF' => $this->input->post('AKTIF')
			);

			$query = $this->user_model->insert($data);
			$status = array('status' => true , 'redirect_link' => base_url()."".$this->uri->segment(1));
		}

		echo(json_encode($status));
	}

	public function edit($IdPrimaryKey){
		$where ="id_USER = '".$IdPrimaryKey."' ";
		$this->oldData = $this->user_model->getData($where);

		$orderBy = " NAMA_KATEGORI_USER";
		$this->dataKategoriUser = 	$this->kategori_user_model->showData("",$orderBy);
		$this->template_view->load_view('user/user_edit_view');
	}
	public function edit_data(){
		$this->form_validation->set_rules('ID_USER', '', 'trim|required');
		$this->form_validation->set_rules('NAMA_USER', '', 'trim|required');
		$this->form_validation->set_rules('PASSWORD', '', 'trim|required');
		$this->form_validation->set_rules('USERNAME', '', 'trim|required');

		if ($this->form_validation->run() == FALSE)	{
			$status = array('status' => FALSE, 'pesan' => 'Gagal menyimpan Data, pastikan telah mengisi semua inputan.');
		}
		else{
			$data = array(
				'USERNAME' => $this->input->post('USERNAME'),
				'ID_KATEGORI_USER' => $this->input->post('ID_KATEGORI_USER'),
				'NAMA_USER' => $this->input->post('NAMA_USER')		,
				'PASSWORD' => $this->input->post('PASSWORD')		,
				'AKTIF' => $this->input->post('AKTIF')
			);

			$query = $this->user_model->update("ID_USER = ".$this->input->post('ID_USER'),$data);
			$status = array('status' => true , 'redirect_link' => base_url()."".$this->uri->segment(1));
		}

		echo(json_encode($status));
	}
	public function delete($IdPrimaryKey){

		$data = array(
			'USERNAME' => '',
			'ID_KATEGORI_USER' => '',
			'PASSWORD' => ''
		);
		$query = $this->user_model->update("ID_USER = ".$IdPrimaryKey,$data);
		redirect(base_url()."".$this->uri->segment(1));

	}

}
