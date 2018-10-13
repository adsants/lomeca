<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Voucher extends CI_Controller {



	public function __construct() {
		parent::__construct();

		$this->load->model('voucher_model');

	}

	public function index(){

		$like = null;
		$urlSearch = null;
		$order_by ='AKHIR_AKTIF desc,ID_VOUCHER';
		$where		=	"voucher.ID_CLIENT = '".$this->session->userdata('id_client')."'";

		if($this->input->get('field')){
			$like = array($_GET['field'] => $_GET['keyword']);
			$urlSearch = "?field=".$_GET['field']."&keyword=".$_GET['keyword'];
		}

		$config['base_url'] 	= base_url().''.$this->uri->segment(1).'/index'.$urlSearch;
		$this->jumlahData 		= $this->voucher_model->getCount($where,$like);
		$config['total_rows'] 	= $this->jumlahData;
		$config['per_page'] 	= 10;
		$this->showData = $this->voucher_model->showData($where,$like,$order_by,$config['per_page'],$this->input->get('per_page'));
		$this->pagination->initialize($config);
		$this->template_view->load_view('voucher/voucher_view');
	}
	public function add(){
		$this->template_view->load_view('voucher/voucher_add_view');
	}

	public function send_firebase_cloud_messaging($id_client,$isiPesan){
		$dataClient = $this->db->query("select ID_KEY_APP from m_client where id_client='".$id_client."' limit 1");
		$dataClient	=	$dataClient->row();

		define( 'API_ACCESS_KEY', $dataClient->ID_KEY_APP );

			$dataUser = $this->db->query("select ID_PHONE from m_user where id_client='".$id_client."' limit 500");
			//echo $this->db->last_query();
			$dataUserArray	=	$dataUser->result();

			$items = array();
			foreach($dataUserArray as $data) {
			//	var_dump($data);
			 	$items[] = $data->ID_PHONE;
			}

		//	var_dump($items);

			$msg = array
			(
				'body' 	=> $isiPesan,
				'title'	=> 'Promo Terbaru'
			);
			$fields = array
			(
				'registration_ids'		=> $items,
				'notification'	      => $msg
			);


			$headers = array
			(
				'Authorization: key=' . API_ACCESS_KEY,
				'Content-Type: application/json'
			);

		#Send Reponse To FireBase Server
		$ch = curl_init();
		curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
		$result = curl_exec($ch );
		curl_close( $ch );
	}


	public function add_data(){
		$this->form_validation->set_rules('NAMA_VOUCHER', '', 'trim|required');
		$this->form_validation->set_rules('KODE_VOUCHER', '', 'trim|required');

		if ($this->form_validation->run() == FALSE)	{
			$status = array('status' => FALSE, 'pesan' => 'Gagal menyimpan Data, pastikan telah mengisi semua inputan.');
		}
		else{
			$maxIDCustomer = $this->voucher_model->getPrimaryKeyMax();
			$newId = $maxIDCustomer->MAX + 1;


			$akhirAktif		=	explode('-',$this->input->post('AKHIR_AKTIF'));
			$akhirAktif		=	$akhirAktif[2]."-".$akhirAktif[1]."-".$akhirAktif[0];

			$berlakuMulai		=	explode('-',$this->input->post('BERLAKU_MULAI'));
			$berlakuMulai		=	$berlakuMulai[2]."-".$berlakuMulai[1]."-".$berlakuMulai[0];

			$berlakuAkhir		=	explode('-',$this->input->post('BERLAKU_AKHIR'));
			$berlakuAkhir		=	$berlakuAkhir[2]."-".$berlakuAkhir[1]."-".$berlakuAkhir[0];

			$data = array(
				'ID_VOUCHER' 		=> $newId,
				'ID_CLIENT' 		=> $this->session->userdata('id_client'),
				'NAMA_VOUCHER' 		=> $this->input->post('NAMA_VOUCHER'),
				'KODE_VOUCHER' 		=> $this->input->post('KODE_VOUCHER'),
				'KETERANGAN_VOUCHER' 	=> $this->input->post('KETERANGAN_VOUCHER')	,
				'MULAI_AKTIF' 		=>	date('Y-m-d'),
				'AKHIR_AKTIF' 		=>	$akhirAktif,
				'BERLAKU_MULAI' 	=>	$berlakuMulai,
				'BERLAKU_AKHIR' 	=>	$berlakuAkhir
			);

			$query = $this->voucher_model->insert($data);

			$this->send_firebase_cloud_messaging($this->session->userdata('id_client'),$this->input->post('NAMA_VOUCHER'));

			$status = array('status' => true , 'redirect_link' => base_url()."".$this->uri->segment(1));
		}

		echo(json_encode($status));
	}

	public function edit($IdPrimaryKey){
		$where ="ID_VOUCHER = '".$IdPrimaryKey."' ";
		$this->oldData = $this->voucher_model->getData($where);
		if(!$this->oldData){
			redirect($this->uri->segment(1));
		}

		$this->template_view->load_view('voucher/voucher_edit_view');
	}
	public function edit_data(){
		$this->form_validation->set_rules('NAMA_VOUCHER', '', 'trim|required');
		$this->form_validation->set_rules('KODE_VOUCHER', '', 'trim|required');

		if ($this->form_validation->run() == FALSE)	{
			$status = array('status' => FALSE, 'pesan' => 'Gagal menyimpan Data, pastikan telah mengisi semua inputan.');
		}
		else{

			$akhirAktif		=	explode('-',$this->input->post('AKHIR_AKTIF'));
			$akhirAktif		=	$akhirAktif[2]."-".$akhirAktif[1]."-".$akhirAktif[0];

			$berlakuMulai		=	explode('-',$this->input->post('BERLAKU_MULAI'));
			$berlakuMulai		=	$berlakuMulai[2]."-".$berlakuMulai[1]."-".$berlakuMulai[0];

			$berlakuAkhir		=	explode('-',$this->input->post('BERLAKU_AKHIR'));
			$berlakuAkhir		=	$berlakuAkhir[2]."-".$berlakuAkhir[1]."-".$berlakuAkhir[0];

			$data = array(
				'NAMA_VOUCHER' 		=> $this->input->post('NAMA_VOUCHER'),
				'KODE_VOUCHER' 		=> $this->input->post('KODE_VOUCHER'),
				'KETERANGAN_VOUCHER' 	=> $this->input->post('KETERANGAN_VOUCHER')	,
				'AKHIR_AKTIF' 		=>	$akhirAktif,
				'BERLAKU_MULAI' 	=>	$berlakuMulai,
				'BERLAKU_AKHIR' 	=>	$berlakuAkhir
			);

			$query = $this->voucher_model->update("ID_VOUCHER = ".$this->input->post('ID_VOUCHER'),$data);
			$status = array('status' => true , 'redirect_link' => base_url()."".$this->uri->segment(1));
		}

		echo(json_encode($status));
	}

}
