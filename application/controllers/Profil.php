<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profil extends CI_Controller {



	public function __construct() {
		parent::__construct();

		$this->load->model('client_model');

	}

	public function index(){
		redirect('profil/edit');
	}

	public function edit(){
		$IdPrimaryKey	=	$this->session->userdata('id_client');

		$where ="ID_client = '".$IdPrimaryKey."' ";
		$this->oldData = $this->client_model->getData($where);
		if(!$this->oldData){
			redirect($this->uri->segment(1));
		}

		$this->template_view->load_view('client/client_profil_view');
	}
	public function edit_data(){
		$this->form_validation->set_rules('NAMA_CLIENT', '', 'trim|required');
		$this->form_validation->set_rules('IMAGE_CLIENT', '', 'trim|required');

		if ($this->form_validation->run() == FALSE)	{
			$status = array('status' => FALSE, 'pesan' => 'Gagal menyimpan Data, pastikan telah mengisi semua inputan.');
		}
		else{
			if($this->input->post('IMAGE_CLIENT') == ''){
				$status = array('status' => FALSE, 'pesan' => 'Gagal menyimpan Data, silahkan Upload Image Profil terlebih dahulu.');
			}
			else{


				$data = array(
					'NAMA_CLIENT' 		=> $this->input->post('NAMA_CLIENT'),
					'EMAIL_CLIENT' 	=> $this->input->post('EMAIL_CLIENT'),
					'IMAGE_CLIENT' 		=> $this->input->post('IMAGE_CLIENT'),
					'PASSWORD' 		=> $this->input->post('PASSWORD'),
					'TELP_CLIENT' 		=> $this->input->post('TELP_CLIENT')
				);

				$query = $this->client_model->update("ID_CLIENT = ".$this->session->userdata('id_client'),$data);
				$status = array('status' => true , 'redirect_link' => base_url()."".$this->uri->segment(1));
			}
		}

		echo(json_encode($status));
	}

}
