<?php

class FeedbackManager extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
 function insert_feedback($data){
 //Inserting in Table(feedback) of Database(jaktrip) 
 		
 		$this->load->database();
       $this->db->insert('feedback', $data);
    } 
}

?>
