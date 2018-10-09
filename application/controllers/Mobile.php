<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mobile extends CI_Controller {



	public function __construct() {
		parent::__construct();

		$this->load->model('m_client_model');
		$this->load->model('promo_model');
		$this->load->model('voucher_model');
		$this->load->model('user_model');

	}

	public function home(){
		$whereClient 				=	"id_client='".$this->input->get('id_client')."'";
		$this->dataClient 	= $this->m_client_model->getData($whereClient);
		if(!$this->dataClient){
			redirect("mobile/no_client");
		}

		$whereUser 				=	"id_phone='".$this->input->get('id_phone')."'";
		$this->dataUser 	= $this->user_model->getData($whereUser);
		if(!$this->dataUser){
			redirect("mobile/register?id_client=".$this->input->get('id_client')."&id_phone=".$this->input->get('id_phone'));
		}


		$promo						=	$this->db->query("select * from promo where id_client='".$this->input->get('id_client')."' and MULAI_AKTIF <= '".date('Y-m-d')."' and AKHIR_AKTIF >= '".date('Y-m-d')."'");
		$this->dataPromo 	= $promo->result();
	//	echo $this->db->last_query();

	$voucher						=	$this->db->query("select *,date_format(BERLAKU_MULAI,'%d-%m-%Y') as BERLAKU_MULAI_INDO,date_format(BERLAKU_AKHIR,'%d-%m-%Y') as BERLAKU_AKHIR_INDO from voucher where id_client='".$this->input->get('id_client')."' and MULAI_AKTIF <= '".date('Y-m-d')."' and AKHIR_AKTIF >= '".date('Y-m-d')."'");
	$this->dataVoucher 	= $voucher->result();

		$this->load->view('mobile/home_view');
	}
	public function register(){
		$whereClient 				=	"id_client='".$this->input->get('id_client')."'";
		$this->dataClient 	= $this->m_client_model->getData($whereClient);
		if(!$this->dataClient){
			redirect("mobile/no_client");
		}

		$whereUser				=	"id_phone='".$this->input->get('id_phone')."'";
		$this->dataUser 	= $this->user_model->getData($whereUser);
		if($this->dataUser){
			redirect("mobile/home?id_client=".$this->input->get('id_client')."&id_phone=".$this->input->get('id_phone'));
		}

		$this->load->view('mobile/register_view');
	}

	public function activation(){
		$whereClient 				=	"id_client='".$this->input->get('id_client')."'";
		$this->dataClient 	= $this->m_client_model->getData($whereClient);
		if(!$this->dataClient){
			redirect("mobile/no_client");
		}

		$whereUser				=	"id_phone='".$this->input->get('id_phone')."'";
		$this->dataUser 	= $this->user_model->getData($whereUser);
		if(!$this->dataUser){
			redirect("mobile/register?id_client=".$this->input->get('id_client')."&id_phone=".$this->input->get('id_phone'));
		}

		if($this->dataUser->STATUS == '1'){
			redirect("mobile/home?id_client=".$this->input->get('id_client')."&id_phone=".$this->input->get('id_phone'));
		}

		$this->load->view('mobile/activation_view');
	}

	public function register_data(){
		$this->form_validation->set_rules('ID_CLIENT', '', 'trim|required');
		$this->form_validation->set_rules('ID_PHONE', '', 'trim|required');
		$this->form_validation->set_rules('NAMA_USER', '', 'trim|required');
		$this->form_validation->set_rules('EMAIL_USER', '', 'trim|required');

		if ($this->form_validation->run() == FALSE)	{
			$status = array('status' => FALSE, 'pesan' => 'Failed to save data, please check your input.');
		}
		else{

				$whereUser 				=	"EMAIL_USER='".$this->input->post('EMAIL_USER')."'";
				$this->dataUser 	= $this->user_model->getData($whereUser);
			//	echo $this->db->last_query();
			//	var_dump($this->dataUser );

				if($this->dataUser){

					$status = array('status' => false , 'pesan' => $this->dataUser->EMAIL_USER." is registered, please check your inbox.");
				}
				else{

					$maxIDCustomer = $this->user_model->getPrimaryKeyMax();
					$newId = $maxIDCustomer->MAX + 1;

					$str = 'CD1234AB';
					$shuffled = str_shuffle($str);

					$data = array(
						'ID_USER' 				=> $newId,
						'id_phone' 				=> $this->input->post('ID_PHONE'),
						'id_client' 			=> $this->input->post('ID_CLIENT'),
						'NAMA_USER' 			=> $this->input->post('NAMA_USER'),
						'EMAIL_USER' 			=> $this->input->post('EMAIL_USER'),
						'TLP_USER' 				=> $this->input->post('TLP_USER'),
						'ALAMAT_USER' 		=> $this->input->post('ALAMAT_USER'),
						'JKL_USER' 				=> $this->input->post('JKL_USER'),
						'PASSWORD' 				=> $shuffled,
						'STATUS' 					=> '0'
					);

					$query = $this->user_model->insert($data);
					$status = array('status' => true , 'redirect_link' => base_url()."".$this->uri->segment(1));
				}
		}

		echo(json_encode($status));

	}



}
