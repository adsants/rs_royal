<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cetak extends CI_Controller {



	public function __construct() {
		parent::__construct();

		$this->load->model('barang_model');
		$this->load->model('satuan_barang_model');

	}

	public function barang(){

		//Load the library
		$this->load->library('html2pdf');

		//Set folder to save PDF to
		$this->html2pdf->folder('./cetak/');

		//Set the filename to save/download as
		$namaFile = 'Barang_'.time().'.pdf';
		$this->html2pdf->filename($namaFile);

		//Set the paper defaults
		$this->html2pdf->paper('a4', 'portrait');

		//Load html view
		$data = array(
			'title' => 'PDF Created',
			'message' => 'Hello World!'
		);

		$this->showData = $this->barang_model->showData("","","nama_barang");
		$this->html2pdf->html($this->load->view('cetak/cetak_barang_view', $data, true));


		//Create the PDF
		$this->html2pdf->create('save');

		redirect(base_url()."cetak/".$namaFile);
	}

}
