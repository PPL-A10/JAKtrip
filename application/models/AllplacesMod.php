<?php

	class AllplacesMod extends CI_Model {

		function showallplaces()
		{
			$this->load->database();
			$this->db->select('*');
            $this->db->from('tourist_attraction'); 
			//$this->db->join('rating', 'member.username = rating.username');
			$query = $this->db->get();
			return $query->result();
		}

		function filterMod2($city)
		{
			
			$this->load->database();
			$this->db->select('*');
            $this->db->from('tourist_attraction'); 
			$city= str_replace("%20", " ",$city);
			if((string)$city != ""){
				$this->db->where('city', $city);
			} 			
			$query = $this->db->get(); 
            return $query->result(); 
		}
	}
?>