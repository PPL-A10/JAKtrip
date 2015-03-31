<?php

class RatingManager extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
	function getPosts(){
		$this->db->select("*"); 
		$this->db->from('tourist_attraction');
		$query = $this->db->get();
		return $query->result();
	}
}

?>