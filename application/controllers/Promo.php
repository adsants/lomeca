<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Promo extends CI_Controller {



	public function __construct() {
		parent::__construct();

		$this->load->model('promo_model');

	}

	public function index(){

		$like = null;
		$urlSearch = null;
		$order_by ='AKHIR_AKTIF desc, ID_PROMO';
		$where		=	"promo.ID_CLIENT = '".$this->session->userdata('id_client')."'";

		if($this->input->get('field')){
			$like = array($_GET['field'] => $_GET['keyword']);
			$urlSearch = "?field=".$_GET['field']."&keyword=".$_GET['keyword'];
		}

		$config['base_url'] 	= base_url().''.$this->uri->segment(1).'/index'.$urlSearch;
		$this->jumlahData 		= $this->promo_model->getCount($where,$like);
		$config['total_rows'] 	= $this->jumlahData;
		$config['per_page'] 	= 10;
		$this->showData = $this->promo_model->showData($where,$like,$order_by,$config['per_page'],$this->input->get('per_page'));
		$this->pagination->initialize($config);
		$this->template_view->load_view('promo/promo_view');
	}
	public function add(){
		$this->template_view->load_view('promo/promo_add_view');
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
				'notification'	=> $msg
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
		$this->form_validation->set_rules('NAMA_PROMO', '', 'trim|required');
		$this->form_validation->set_rules('AKHIR_AKTIF', '', 'trim|required');

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


				$akhirAktif		=	explode('-',$this->input->post('AKHIR_AKTIF'));
				$akhirAktif		=	$akhirAktif[2]."-".$akhirAktif[1]."-".$akhirAktif[0];


				$data = array(
					'ID_PROMO' 		=> $newId,
					'ID_CLIENT' 		=> $this->session->userdata('id_client'),
					'NAMA_PROMO' 		=> $this->input->post('NAMA_PROMO'),
					'KETERANGAN_PROMO' 	=> $this->input->post('KETERANGAN_PROMO'),
					'IMAGE_PROMO' 		=> $this->input->post('IMAGE_PROMO')	,
					'MULAI_AKTIF' 		=>	date('Y-m-d'),
					'AKHIR_AKTIF' 		=>	$akhirAktif
				);

				$query = $this->promo_model->insert($data);



				$this->send_firebase_cloud_messaging($this->session->userdata('id_client'),$this->input->post('NAMA_PROMO'));

				$status = array('status' => true , 'redirect_link' => base_url()."".$this->uri->segment(1));
			}
		}

		echo(json_encode($status));
	}

	public function edit($IdPrimaryKey){
		$where ="promo.ID_PROMO = '".$IdPrimaryKey."' ";
		$this->oldData = $this->promo_model->getData($where);
		if(!$this->oldData){
			redirect($this->uri->segment(1));
		}

		$this->template_view->load_view('promo/promo_edit_view');
	}
	public function edit_data(){
		$this->form_validation->set_rules('NAMA_PROMO', '', 'trim|required');
		$this->form_validation->set_rules('AKHIR_AKTIF', '', 'trim|required');

		if ($this->form_validation->run() == FALSE)	{
			$status = array('status' => FALSE, 'pesan' => 'Gagal menyimpan Data, pastikan telah mengisi semua inputan.');
		}
		else{
			if($this->input->post('IMAGE_PROMO') == ''){
				$status = array('status' => FALSE, 'pesan' => 'Gagal menyimpan Data, silahkan Upload Image Promo terlebih dahulu.');
			}
			else{

				$akhirAktif		=	explode('-',$this->input->post('AKHIR_AKTIF'));
				$akhirAktif		=	$akhirAktif[2]."-".$akhirAktif[1]."-".$akhirAktif[0];

				$data = array(
					'NAMA_PROMO' 		=> $this->input->post('NAMA_PROMO'),
					'KETERANGAN_PROMO' 	=> $this->input->post('KETERANGAN_PROMO'),
					'IMAGE_PROMO' 		=> $this->input->post('IMAGE_PROMO'),
					'AKHIR_AKTIF' 		=>	$akhirAktif
				);

				$query = $this->promo_model->update("ID_PROMO = ".$this->input->post('ID_PROMO'),$data);
				$status = array('status' => true , 'redirect_link' => base_url()."".$this->uri->segment(1));
			}
		}

		echo(json_encode($status));
	}

}
