<?php
class Template_view extends CI_Controller {
    protected $_ci;

    function __construct(){
        $this->_ci = &get_instance();

    }

    function load_view($content, $data = NULL){

		
		


        $data['header']     = $this->_ci->load->view('template/header_view', $data, TRUE);
        $data['content']    = $this->_ci->load->view($content, $data, TRUE);
        $data['footer']     = $this->_ci->load->view('template/footer_view', $data, TRUE);

        $this->_ci->load->view('template/index_view', $data);

    }

    function nama_menu($string){
       return "Lomeca";

    }

    function getAddButton(){
		if($this->_ci->session->userdata('id_kategori_user')){
			$queryButton = $this->_ci->db->query("
			select
				t_hak_akses.ADD_BUTTON
			from
				m_menu,t_hak_akses
			WHERE
				m_menu.id_menu=t_hak_akses.id_menu
				and t_hak_akses.id_kategori_user= '".$this->_ci->session->userdata('id_kategori_user')."'
				and m_menu.link_menu = '".$this->_ci->uri->segment(1)."'
			");
			$dataButton = $queryButton->row();
			if($dataButton->ADD_BUTTON=='Y'){
				echo "<a href='".base_url().$this->_ci->uri->segment(1)."/add'><span class='btn btn-success'><i class='fa fa-plus'></i> Tambah Data</span></a>
				";
			}
		}

    }
    function getEditButton($urlEdit){
		if($this->_ci->session->userdata('id_kategori_user')){
			$queryButton = $this->_ci->db->query("
			select
				t_hak_akses.EDIT_BUTTON
			from
				m_menu,t_hak_akses
			WHERE
				m_menu.id_menu=t_hak_akses.id_menu
				and t_hak_akses.id_kategori_user= '".$this->_ci->session->userdata('id_kategori_user')."'
				and m_menu.link_menu = '".$this->_ci->uri->segment(1)."'
			");
			$dataButton = $queryButton->row();
			if($dataButton->EDIT_BUTTON=='Y'){

				echo "<a href='".$urlEdit."'><span class='btn btn-warning btn-xs'><i class='fa fa-edit'></i></span></a>";
			}
		}
    }
    function getDeleteButton($msgDelete,$urlDelete){
		if($this->_ci->session->userdata('id_kategori_user')){
			$queryButton = $this->_ci->db->query("
			select
				t_hak_akses.DELETE_BUTTON
			from
				m_menu,t_hak_akses
			WHERE
				m_menu.id_menu=t_hak_akses.id_menu
				and t_hak_akses.id_kategori_user= '".$this->_ci->session->userdata('id_kategori_user')."'
				and m_menu.link_menu = '".$this->_ci->uri->segment(1)."'
			");
			$dataButton = $queryButton->row();
			if($dataButton->DELETE_BUTTON=='Y'){

				$msgDelete = '"'.$msgDelete.'"';
				$urlDelete = '"'.$urlDelete.'"';

				echo	"<span class='btn btn-danger btn-xs' onclick='tampil_pesan_hapus(".$msgDelete.",".$urlDelete.")'><i class='fa fa-trash'></i></span>";
			}
		}
    }

}
