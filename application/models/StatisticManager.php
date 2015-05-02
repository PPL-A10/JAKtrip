<?php

	class StatisticManager extends CI_Model {

		function getstatistic()
		{
			$this->load->database();
			$this->db->select('place_name,visitors');
            $this->db->from('tourist_attraction');
			$query = $this->db->get(); 
			return $query->result();
		}
		
	}
?>