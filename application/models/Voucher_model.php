<?php

class Voucher_model extends CI_Model {
	public function __construct() {
		parent::__construct();

		//$this->load->model('log_model');
	}

	function showData($where = null,$like = null,$order_by = null,$limit = null, $fromLimit=null){

		$this->db->select("voucher.*");
		$this->db->select("m_client.NAMA_CLIENT");
		$this->db->select("date_format(MULAI_AKTIF,'%d-%m-%Y') as MULAI_AKTIF_INDO");
		$this->db->select("date_format(AKHIR_AKTIF,'%d-%m-%Y') as AKHIR_AKTIF_INDO");
		$this->db->select("date_format(BERLAKU_MULAI,'%d-%m-%Y') as BERLAKU_MULAI_INDO");
		$this->db->select("date_format(BERLAKU_AKHIR,'%d-%m-%Y') as BERLAKU_AKHIR_INDO");
		if($where){
			$this->db->where($where);
		}
		if($like){
			$this->db->like($like);
		}
		if($order_by){
			$this->db->order_by($order_by);
		}
		$this->db->join('m_client','voucher.ID_CLIENT=m_client.ID_CLIENT','left');
		return $this->db->get("voucher",$limit,$fromLimit)->result();
	}


	function getCount($where = null,$like = null,$order_by = null,$limit = null, $fromLimit=null){
		$this->db->select("*");
		if($where){
			$this->db->where($where);
		}
		if($like){
			$this->db->like($like);
		}
		return $this->db->get("voucher",$limit,$fromLimit)->num_rows();
	}

	function getData($where){
		$this->db->select("*");
		$this->db->select("date_format(MULAI_AKTIF,'%d-%m-%Y') as MULAI_AKTIF_INDO");
		$this->db->select("date_format(AKHIR_AKTIF,'%d-%m-%Y') as AKHIR_AKTIF_INDO");
		$this->db->select("date_format(BERLAKU_MULAI,'%d-%m-%Y') as BERLAKU_MULAI_INDO");
		$this->db->select("date_format(BERLAKU_AKHIR,'%d-%m-%Y') as BERLAKU_AKHIR_INDO");

		$this->db->where($where);
		return $this->db->get("voucher")->row();
	}


	function getPrimaryKeyMax(){
		$query = $this->db->query('select max(id_voucher) as MAX from voucher') ;
		return $query->row();
	}

	function insert($data){
		$this->db->insert('voucher', $data);
	}
	function update($where,$data){
		$this->db->where($where);
		$this->db->update('voucher', $data);
	}
	function delete($where){
		$this->db->where($where);
		$this->db->delete('voucher');
	}


}

?>
