<?php

class SuggestionManager extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
 	function insertSuggestion($data){
	 	$this->load->database();
       	$this->db->insert('suggestion', $data);
    } 

    function showAllSuggestion()
	{
		$this->load->database();
		$this->db->select('*');
        $this->db->from('suggestion');
        $this->db->order_by('suggest_id desc'); 
		$query = $this->db->get();
		return $query->result();
	}
	
	function showAllPhotoSuggestion()
	{
		$this->load->database();
		$this->db->select('*');
        $this->db->from('photo');
        //$this->db->order_by('suggest_id desc'); 
		$query = $this->db->get();
		return $query->result();
	}
	
	function publishphoto($id_pic){
		$this->db->where('id_pic', $id_pic);
		$this->db->set('is_publish', 1, FALSE);
		$this->db->update('photo');
	}
}

?>
