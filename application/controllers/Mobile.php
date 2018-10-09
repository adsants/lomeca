<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mobile extends CI_Controller {



	public function __construct() {
		parent::__construct();

		$this->load->model('m_client_model');
		$this->load->model('promo_model');
		$this->load->model('voucher_model');

	}

	public function home(){
		$whereClient 				=	"id_client='".$this->input->get('id_client')."'";
		$this->dataClient 	= $this->m_client_model->getData($whereClient);
		if(!$this->dataClient){
			redirect($this->uri->segment(1));
		}

		$promo						=	$this->db->query("select * from promo where id_client='".$this->input->get('id_client')."' and MULAI_AKTIF <= '".date('Y-m-d')."' and AKHIR_AKTIF >= '".date('Y-m-d')."'");
		$this->dataPromo 	= $promo->result();
	//	echo $this->db->last_query();
	
	$voucher						=	$this->db->query("select *,date_format(BERLAKU_MULAI,'%d-%m-%Y') as BERLAKU_MULAI_INDO,date_format(BERLAKU_AKHIR,'%d-%m-%Y') as BERLAKU_AKHIR_INDO from voucher where id_client='".$this->input->get('id_client')."' and MULAI_AKTIF <= '".date('Y-m-d')."' and AKHIR_AKTIF >= '".date('Y-m-d')."'");
	$this->dataVoucher 	= $voucher->result();

		$this->load->view('mobile/home_view');
	}

}
