<?php

class PromoManager extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
 	function insertPromo($data){
	 	$this->load->database();
       	$this->db->insert('promo', $data);
    } 

    function showAllPromo()
	{
		$this->load->database();
		$this->db->select('*');
        $this->db->from('promo');
        $this->db->order_by('end_date desc'); 
		$query = $this->db->get();
		return $query->result();
	}

    function showType()
    {
        $this->load->database();
        $this->db->select('type');
        $this->db->from('promo');
        $this->db->order_by('type asc'); 
        $this->db->distinct();
        $query = $this->db->get();
        return $query->result();
    }
	
	function filterpromoloc($city)
	{
			
		$this->load->database();
		$this->db->select('*');
		$this->db->from('promo');
		$this->db->join('tourist_attraction', 'promo.place_name = tourist_attraction.place_name', 'left');
		$city= str_replace("%20", " ",$city);
		if((string)$city != ""){
			$this->db->where(array('tourist_attraction.city' => $city));
		} 			
		$query = $this->db->get(); 
		return $query->result(); 
		}
		
	function filterPromoFinal($city, $title)
		{
			
			$this->load->database();
			$this->db->select('*');
			$this->db->from('promo');
			$this->db->join('tourist_attraction', 'promo.place_name = tourist_attraction.place_name', 'left');
			$city= str_replace("%20", " ",$city);
			$title= str_replace("%20", " ",$title);
			if((string)$city != ""and $city !="All"){
				$this->db->where(array('tourist_attraction.city' => $city));
			} 
			if((string)$title != ""){
				$this->db->like(array('promo.title' => $title));
			} 			
			$query = $this->db->get(); 
            return $query->result_array(); 
		}
}

?>
