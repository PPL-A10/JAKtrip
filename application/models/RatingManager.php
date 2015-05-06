<?php

class RatingManager extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
	 function insert_rating($data){
	 //Inserting in Table(rating) of Database(jaktrip) 
 		$this->load->database();
       $this->db->insert('rating', $data);
    }

    function showReview($user){
    	$this->load->database();
    	$this->db->select('*');
        $this->db->from('rating');
        $this->db->where('username', $user);
        $this->db->order_by('id_rate desc');
        $query = $this->db->get();
        return $query->result();
    }
   
}

?>
