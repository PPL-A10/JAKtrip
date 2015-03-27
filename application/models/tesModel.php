<?php

	class tesModel extends CI_Model {
	
		function getDatabase()
		{
			$this->load->database();
			$query = $this->db->get('testabel');
			return $query;                            
		}
		
		function getDatabaseWithinBudget($budget)
		{
			$budgetInt = intval($budget);
			$this->load->database();
			$query = $this->db->get_where('testabel', array('Budget <=' => $budgetInt));		
			return $query->result();
		}
	}
?>