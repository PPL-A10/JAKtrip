<?php

class PromoManager extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
 	function insertPromo($data){
	 	$this->load->database();
       	$this->db->insert('promo', $data);
    } 

    function showAllPromo()
	{
		$this->load->database();
		$this->db->select('*');
        $this->db->from('promo');
        $this->db->order_by('end_date desc'); 
		$query = $this->db->get();
		return $query->result();
	}

    function showType()
    {
        $this->load->database();
        $this->db->select('type');
        $this->db->from('promo');
        $this->db->order_by('type asc'); 
        $this->db->distinct();
        $query = $this->db->get();
        return $query->result();
    }
}

?>
