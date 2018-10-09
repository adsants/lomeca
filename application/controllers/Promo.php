<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Promo extends CI_Controller {



	public function __construct() {
		parent::__construct();

		$this->load->model('promo_model');

	}

	public function index(){

		$like = null;
		$urlSearch = null;
		$order_by ='AKHIR_AKTIF desc';
		$where		=	"ID_CLIENT = '".$this->session->userdata('id_client')."'";

		if($this->input->get('field')){
			$like = array($_GET['field'] => $_GET['keyword']);
			$urlSearch = "?field=".$_GET['field']."&keyword=".$_GET['keyword'];
		}

		$config['base_url'] 	= base_url().''.$this->uri->segment(1).'/index'.$urlSearch;
		$this->jumlahData 		= $this->promo_model->getCount("",$like);
		$config['total_rows'] 	= $this->jumlahData;
		$config['per_page'] 	= 10;
		$this->showData = $this->promo_model->showData("",$like,$order_by,$config['per_page'],$this->input->get('per_page'));
		$this->pagination->initialize($config);
		$this->template_view->load_view('promo/promo_view');
	}
	public function add(){
		$this->template_view->load_view('promo/promo_add_view');
	}
	public function add_data(){
		$this->form_validation->set_rules('NAMA_PROMO', '', 'trim|required');
		$this->form_validation->set_rules('MULAI_AKTIF', '', 'trim|required');

		if ($this->form_validation->run() == FALSE)	{
			$status = array('status' => FALSE, 'pesan' => 'Gagal menyimpan Data, pastikan telah mengisi semua inputan.');
		}
		else{

			if($this->input->post('IMAGE_PROMO') == ''){
				$status = array('status' => FALSE, 'pesan' => 'Gagal menyimpan Data, silahkan Upload Image Promo terlebih dahulu.');
			}
			else{

				$maxIDCustomer = $this->promo_model->getPrimaryKeyMax();
				$newId = $maxIDCustomer->MAX + 1;

				$mulaiAktif		=	explode('-',$this->input->post('MULAI_AKTIF'));
				$mulaiAktif		=	$mulaiAktif[2]."-".$mulaiAktif[1]."-".$mulaiAktif[0];

				$akhirAktif		=	explode('-',$this->input->post('AKHIR_AKTIF'));
				$akhirAktif		=	$akhirAktif[2]."-".$akhirAktif[1]."-".$akhirAktif[0];


				$data = array(
					'ID_PROMO' 		=> $newId,
					'ID_CLIENT' 		=> $this->session->userdata('id_client'),
					'NAMA_PROMO' 		=> $this->input->post('NAMA_PROMO'),
					'KETERANGAN_PROMO' 	=> $this->input->post('KETERANGAN_PROMO'),
					'IMAGE_PROMO' 		=> $this->input->post('IMAGE_PROMO')	,
					'MULAI_AKTIF' 		=>	$mulaiAktif,
					'AKHIR_AKTIF' 		=>	$akhirAktif
				);

				$query = $this->promo_model->insert($data);
				$status = array('status' => true , 'redirect_link' => base_url()."".$this->uri->segment(1));
			}
		}

		echo(json_encode($status));
	}

	public function edit($IdPrimaryKey){
		$where ="ID_PROMO = '".$IdPrimaryKey."' ";
		$this->oldData = $this->promo_model->getData($where);
		if(!$this->oldData){
			redirect($this->uri->segment(1));
		}

		$this->template_view->load_view('promo/promo_edit_view');
	}
	public function edit_data(){
		$this->form_validation->set_rules('NAMA_PROMO', '', 'trim|required');
		$this->form_validation->set_rules('MULAI_AKTIF', '', 'trim|required');

		if ($this->form_validation->run() == FALSE)	{
			$status = array('status' => FALSE, 'pesan' => 'Gagal menyimpan Data, pastikan telah mengisi semua inputan.');
		}
		else{
			if($this->input->post('IMAGE_PROMO') == ''){
				$status = array('status' => FALSE, 'pesan' => 'Gagal menyimpan Data, silahkan Upload Image Promo terlebih dahulu.');
			}
			else{

				$mulaiAktif		=	explode('-',$this->input->post('MULAI_AKTIF'));
				$mulaiAktif		=	$mulaiAktif[2]."-".$mulaiAktif[1]."-".$mulaiAktif[0];

				$akhirAktif		=	explode('-',$this->input->post('AKHIR_AKTIF'));
				$akhirAktif		=	$akhirAktif[2]."-".$akhirAktif[1]."-".$akhirAktif[0];

				$data = array(
					'NAMA_PROMO' 		=> $this->input->post('NAMA_PROMO'),
					'KETERANGAN_PROMO' 	=> $this->input->post('KETERANGAN_PROMO'),
					'IMAGE_PROMO' 		=> $this->input->post('IMAGE_PROMO')	,
					'MULAI_AKTIF' 		=>	$mulaiAktif,
					'AKHIR_AKTIF' 		=>	$akhirAktif
				);

				$query = $this->promo_model->update("ID_PROMO = ".$this->input->post('ID_PROMO'),$data);
				$status = array('status' => true , 'redirect_link' => base_url()."".$this->uri->segment(1));
			}
		}

		echo(json_encode($status));
	}

}
