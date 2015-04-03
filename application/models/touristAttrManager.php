<?php

	class touristAttrManager extends CI_Model {
	
		function getDatabaseWithinBudget($budget)
		{
			$budgetInt = intval($budget);
			$this->load->database();
			$query = $this->db->get_where('tourist_attraction', array('weekday_price <=' => $budgetInt));		
			return $query->result();
		}
		
	}
?>