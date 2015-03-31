<?php

class touristAttractionManager extends CI_Model{
    
	function getAllTourAttr() {
        $this->db->select('*');
        $this->db->from('tourist_attraction');
        $query = $this->db->get();
        return $result = $query->result();
    }
}
?>