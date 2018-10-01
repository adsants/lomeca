<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {



	public function __construct() {
		parent::__construct();

		$this->load->model('m_client_model');
		$this->load->model('kategori_user_model');

	}

	public function index(){

		$this->load->view('template/login_view');
	}

	public function login_data(){
		$this->form_validation->set_rules('USERNAME_LOGIN', '', 'trim|required');
		$this->form_validation->set_rules('PASSWORD_LOGIN', '', 'trim|required');

		if ($this->form_validation->run() == FALSE)	{
			$status = array('status' => FALSE, 'pesan' => 'Gagal Login, pastikan telah mengisi semua inputan.');
		}
		else{
			
			if($this->input->post('USERNAME_LOGIN')=='lomeca' && $this->input->post('PASSWORD_LOGIN')=='datadigi'){
				$sess_array = array(
					'nama_user' => 'Admin Lomeca Datadigi', 'id_user' => '0'
				);
				$this->session->set_userdata($sess_array);
				$status = array('status' => true,'redirect_link' => base_url()."dashboard");
			}
			else{
				$dataUser = $this->m_client_model->getData("email_client = '".$this->input->post('USERNAME_LOGIN') ."' and password='".$this->input->post('PASSWORD_LOGIN')."'");
								
				if($dataUser){
					
					
					
					
					
					$sess_array = array(
						'nama_user' => $dataUser->NAMA_CLIENT, 'id_user' => $dataUser->ID_CLIENT
					);
					
					$this->session->set_userdata($sess_array);
					$status = array('status' => true,'redirect_link' => base_url()."dashboard");				
						
				}
				else{
					$status = array('status' => false,'pesan' => 'Login gagal, pastikan Username dan Password anda benar.');
				}
			}

			
			
		}

		echo(json_encode($status));
	}


}
