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

			function filterModFinal($category_name, $city, $place_name)
		{
			
			$this->load->database();
			$this->db->select('*');
            $this->db->from('tourist_attraction'); 
			$this->db->join('tour_category', 'tour_category.place_name = tourist_attraction.place_name');
            //$this->db->join('photo', 'photo.place_name = tour_category.place_name');
			$category_name = str_replace("%20", " ",$category_name);
			$city= str_replace("%20", " ",$city);
			$place_name= str_replace("%20", " ",$place_name);
			if((string)$category_name != "" and $category_name !="All"){
				$this->db->where('tourist_attraction.category_name', $category_name);
			} 
			if((string)$city != ""and $city !="All"){
				$this->db->where('city', $city);
			} 
			if((string)$place_name != ""){
				$this->db->like('tourist_attraction.place_name', $place_name);
			} 			
			$query = $this->db->get(); 
            return $query->result_array(); 
		}
	}
?>