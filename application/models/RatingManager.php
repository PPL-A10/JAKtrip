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
   
}

?>
