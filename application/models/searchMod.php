<?php

	class searchMod extends CI_Model {

/*		function showallwisata()
		{
			$this->load->database();
			$query = $this->db->get('tourist_attraction');
			return $query->result();
		}*/
		
		function showallwisata()
		{
			$this->load->database();
			
			$this->db->select('*');
			$this->db->from('tourist_attraction');
			$this->db->join('photo', 'photo.place_name = tourist_attraction.place_name');
			$query = $this->db->get();
			return $query->result();	
		}
		
		function showallcategory()
		{
			$this->load->database();
			$this->db->select('category_name');
			$this->db->from('tour_category');
			$this->db->distinct();
			$query = $this->db->get();
			return $query->result();
		}
		
		function showalllocation()
		{
			$this->load->database();
			$this->db->select('city');
			$this->db->from('tourist_attraction');
			$this->db->distinct();
			$query = $this->db->get();
			return $query->result();
		}
		
		function showallhalte()
		{
			$this->load->database();
			$this->db->select('halte_name');
			$this->db->from('halte');
			$this->db->order_by("halte_name", "asc"); 
			$query = $this->db->get();
			return $query->result();
		}

		/*function filterMod($category_name, $city_name, $place_name)
		{
			
			$this->load->database();
			$this->db->select('*');
            $this->db->from('tourist_attraction'); 
			$this->db->join('tour_category', 'tour_category.place_name = tourist_attraction.place_name');
            $this->db->join('photo', 'photo.place_name = tour_category.place_name');
			if((string)$category_name != ""){
				$this->db->where('category_name', $category_name);
			} 
			if((string)$city_name != ""){
				$this->db->where('city_name', $city_name);
			} 
			if((string)$place_name != ""){
				$this->db->like('place_name', $place_name);
			} 			
			$query = $this->db->get(); 
            return $query->result_array(); 
		}*/
		
				function filterMod($category_name)
		{
			
			$this->load->database();
			$this->db->select('*');
            $this->db->from('tourist_attraction'); 
			$this->db->join('tour_category', 'tour_category.place_name = tourist_attraction.place_name');
            $this->db->join('photo', 'photo.place_name = tour_category.place_name');
			if((string)$category_name != ""){
				$this->db->where('category_name', $category_name);
			} 			
			$query = $this->db->get(); 
            return $query->result_array(); 
		}
	}
?>