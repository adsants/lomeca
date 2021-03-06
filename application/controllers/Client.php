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
		$this->form_validation->set_rules('NAMA_CLIENT', '', 'trim|required');
		$this->form_validation->set_rules('PASSWORD', '', 'trim|required');
		$this->form_validation->set_rules('EMAIL_CLIENT', '', 'trim|required');

		if ($this->form_validation->run() == FALSE)	{
			$status = array('status' => FALSE, 'pesan' => 'Gagal menyimpan Data, pastikan telah mengisi semua inputan.');
		}
		else{
			$maxIDCustomer = $this->client_model->getPrimaryKeyMax();
			$newId = $maxIDCustomer->MAX + 1;

			$data = array(
				'ID_CLIENT' => $newId,
				'EMAIL_CLIENT' => $this->input->post('EMAIL_CLIENT'),
				'PASSWORD' => $this->input->post('PASSWORD'),
				'NAMA_CLIENT' => $this->input->post('NAMA_CLIENT'),
				'TELP_CLIENT' => $this->input->post('TELP_CLIENT')	,
				'STATUS' => $this->input->post('STATUS')
			);

			$query = $this->client_model->insert($data);
			$status = array('status' => true , 'redirect_link' => base_url()."".$this->uri->segment(1));
		}

		echo(json_encode($status));
	}

	public function edit($IdPrimaryKey){
		$where ="ID_CLIENT = '".$IdPrimaryKey."' ";
		$this->oldData = $this->client_model->getData($where);
		if(!$this->oldData){
			redirect($this->uri->segment(1));
		}
		
		$this->template_view->load_view('client/client_edit_view');
	}
	public function edit_data(){
		$this->form_validation->set_rules('NAMA_CLIENT', '', 'trim|required');
		$this->form_validation->set_rules('PASSWORD', '', 'trim|required');
		$this->form_validation->set_rules('EMAIL_CLIENT', '', 'trim|required');

		if ($this->form_validation->run() == FALSE)	{
			$status = array('status' => FALSE, 'pesan' => 'Gagal menyimpan Data, pastikan telah mengisi semua inputan.');
		}
		else{
			$data = array(
				'EMAIL_CLIENT' => $this->input->post('EMAIL_CLIENT'),
				'PASSWORD' => $this->input->post('PASSWORD'),
				'NAMA_CLIENT' => $this->input->post('NAMA_CLIENT'),
				'TELP_CLIENT' => $this->input->post('TELP_CLIENT')	,
				'STATUS' => $this->input->post('STATUS')
			);

			$query = $this->client_model->update("ID_CLIENT = ".$this->input->post('ID_CLIENT'),$data);
			$status = array('status' => true , 'redirect_link' => base_url()."".$this->uri->segment(1));
		}

		echo(json_encode($status));
	}

}
