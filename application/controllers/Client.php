<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client extends CI_Controller {



	public function __construct() {
		parent::__construct();

		$this->load->model('client_model');

	}

	public function index(){

		$like = null;
		$urlSearch = null;
		$order_by ='NAMA_CLIENT';

		if($this->input->get('field')){
			$like = array($_GET['field'] => $_GET['keyword']);
			$urlSearch = "?field=".$_GET['field']."&keyword=".$_GET['keyword'];
		}

		$config['base_url'] 	= base_url().''.$this->uri->segment(1).'/index'.$urlSearch;
		$this->jumlahData 		= $this->client_model->getCount("",$like);
		$config['total_rows'] 	= $this->jumlahData;
		$config['per_page'] 	= 10;
		$this->showData = $this->client_model->showData("",$like,$order_by,$config['per_page'],$this->input->get('per_page'));
		$this->pagination->initialize($config);
		$this->template_view->load_view('client/client_view');
	}
	public function add(){
		$this->template_view->load_view('client/client_add_view');
	}
	public function add_data(){
		$this->form_validation->set_rules('NAMA_USER', '', 'trim|required');
		$this->form_validation->set_rules('PASSWORD', '', 'trim|required');
		$this->form_validation->set_rules('USERNAME', '', 'trim|required');

		if ($this->form_validation->run() == FALSE)	{
			$status = array('status' => FALSE, 'pesan' => 'Gagal menyimpan Data, pastikan telah mengisi semua inputan.');
		}
		else{
			$maxIDCustomer = $this->client_model->getPrimaryKeyMax();
			$newId = $maxIDCustomer->MAX + 1;

			$data = array(
				'ID_USER' => $newId,
				'USERNAME' => $this->input->post('USERNAME'),
				'NAMA_USER' => $this->input->post('NAMA_USER'),
				'ID_KATEGORI_USER' => $this->input->post('ID_KATEGORI_USER'),
				'PASSWORD' => $this->input->post('PASSWORD')	,
				'AKTIF' => $this->input->post('AKTIF')
			);

			$query = $this->client_model->insert($data);
			$status = array('status' => true , 'redirect_link' => base_url()."".$this->uri->segment(1));
		}

		echo(json_encode($status));
	}

	public function edit($IdPrimaryKey){
		$where ="id_USER = '".$IdPrimaryKey."' ";
		$this->oldData = $this->client_model->getData($where);
		if(!$this->oldData){
			redirect($this->uri->segment(1));
		}
		$orderBy = " NAMA_KATEGORI_USER";
		$this->dataKategoriUser = 	$this->kategori_client_model->showData("",$orderBy);
		$this->template_view->load_view('client/client_edit_view');
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

			$query = $this->client_model->update("ID_USER = ".$this->input->post('ID_USER'),$data);
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
		$query = $this->client_model->update("ID_USER = ".$IdPrimaryKey,$data);
		redirect(base_url()."".$this->uri->segment(1));

	}

}
