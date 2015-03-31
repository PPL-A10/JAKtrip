<?php

	class tesModel extends CI_Model {
	
		function getDatabase()
		{
			$this->load->database();
			$query = $this->db->select("*")->from('tourist_attraction')->get();
			return $query;                            
		}
		
		function getAllDatabase()
		{
			$this->load->database();
			$query = $this->db->select("*")->from('tourist_attraction')->get();
			return $query->result(); 
		}
		function getDatabaseWithinBudget($budget)
		{
			$budgetInt = intval($budget);
			$this->load->database();
			$query = $this->db->get_where('tourist_attraction', array('weekday_price <=' => $budgetInt));		
			return $query->result();
		}
	}
?>