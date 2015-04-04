<?php

class touristAttrManager extends CI_Model{

	public function __construct() 
    {
        parent::__construct(); 
        $this->load->database();
    }
	 
	function getAllTourAttr() {
		
        $query = $this->db->query('select * from tourist_attraction');
        return $result = $query->result();
    }
	
	function getAllTourAttrPopular() {
        $query = $this->db->query('select * from tourist_attraction order by hits ASC');
        return $result = $query->result();
    }
	
	function getAllTourAttrHighestRate() {
        $query = $this->db->query('select * from tourist_attraction order by rate_avg DESC');
        return $result = $query->result();
    }
	
	function getAllTourAttrSortAtoZ() {
        $query = $this->db->query('select * from tourist_attraction order by place_name ASC');
        return $result = $query->result();
    }
	
	function getAllTourAttrSortZtoA() {
       $query = $this->db->query('select * from tourist_attraction order by place_name DESC');
        return $result = $query->result();
    }
	
	function getAllTourAttrSortHighToLow() {
        $query = $this->db->query('select * from tourist_attraction order by weekday_price DESC');
        return $result = $query->result();
    }
	
	function getAllTourAttrSortLowToHigh() {
        $query = $this->db->query('select * from tourist_attraction order by weekday_price ASC');
        return $result = $query->result();
    }
	
	function getAllTourAttrHighetRating() {
        $query = $this->db->query('select * from tourist_attraction order by rate_avg');
        return $result = $query->result();
    }
}
?>