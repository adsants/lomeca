<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Save_upload extends CI_Controller {

	public function __construct() {
		parent::__construct();

	}


	public function foto() {

         $config['upload_path']   = 'upload/';
         $config['allowed_types'] = 'jpg';
		 $config['max_size'] = '5000';

         $this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('userfile')) {
			$status = array('status' => false , 'pesan' => $this->upload->display_errors() );
        }
         else {

			$fileUpload = $this->upload->data();

			$final_file_name = time()."_".$fileUpload['raw_name'].''.$fileUpload['file_ext'];
			rename($fileUpload['full_path'],$fileUpload['file_path'].$final_file_name);
			$status = array('status' => true , 'nama_file' => $final_file_name );

        }

		echo(json_encode($status));
    }


	public function promo() {

         $config['upload_path']   	= 'uploads/promo/';
         $config['allowed_types']   = 'gif|jpg|png';
		 $config['max_size'] 		= '1000';

         $this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('userfile')) {
			$status = array('status' => false , 'pesan' => $this->upload->display_errors() );
        }
         else {

			$fileUpload = $this->upload->data();

			$final_file_name = time()."_".$fileUpload['raw_name'].''.$fileUpload['file_ext'];
			rename($fileUpload['full_path'],$fileUpload['file_path'].$final_file_name);
			$status = array('status' => true , 'nama_file' => $final_file_name );

        }

		echo(json_encode($status));
    }

		public function profil() {

	     $config['upload_path']   	= 'uploads/profil/';
	     $config['allowed_types']   = 'gif|jpg|png';
			 $config['max_size'] 		= '1000';

	     $this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('userfile')) {
				$status = array('status' => false , 'pesan' => $this->upload->display_errors() );
	        }
	         else
				 {

				$fileUpload = $this->upload->data();

				$final_file_name = time()."_".$fileUpload['raw_name'].''.$fileUpload['file_ext'];
				rename($fileUpload['full_path'],$fileUpload['file_path'].$final_file_name);
				$status = array('status' => true , 'nama_file' => $final_file_name );

	        }

					echo(json_encode($status));
	    }

}
