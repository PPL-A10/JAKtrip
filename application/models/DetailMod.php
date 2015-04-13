<?php

	class DetailMod extends CI_Model {

		function showdetail($name)
		{
			$this->load->database();
			$name = str_replace("%20"," ",$name);
            $query = $this->db->get_where('tourist_attraction', array('place_name' => $name));
			//$this->db->join('rating', 'member.username = rating.username');
			return $query->result();
		}
		
		function showjudul($nama)
		{
			$this->load->database();
			$nama= str_replace("%20", " ",$nama);
			$query = $this->db->get_where('rating', array('place_name' => $nama),1);
			return $query->result();
		}
		
	}
?>