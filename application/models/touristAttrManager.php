<?php

	class touristAttrManager extends CI_Model {
	
		function getDatabaseWithinBudget($budget)
		{
			$budgetInt = intval($budget);
			$this->load->database();
			$query = $this->db->get_where('tourist_attraction', array('weekday_price <=' => $budgetInt));		
			return $query->result();
		}

		function getDatabaseWithinBudgetandHalteWeekday($data)
		{
			$this->load->database();
			$budgetInt = intval($data['budget']); 
		//	$query = $this->db->get_where('halte', array('halte_name = ' => $data['halte']));
		//	return $query->row_array();
		//	$hasil = $query->row_array();
			$kodehalte= $data['halte_code'];
						
			$condition = "(tourist_attraction.halte_code = '".$data['halte_code']."' AND weekday_price <=  ".$budgetInt.") OR weekday_price <=".($budgetInt+3500)."";
			$query = $this->db->select("*")->from('tourist_attraction')->where($condition);
			$query = $this->db->join('halte', 'halte.halte_code = tourist_attraction.halte_code');
			$query =$this->db->get();
			return $query->result();
			
			
		}

		function getDatabaseWithinBudgetandHalteWeekend($data)
		{
			$this->load->database();
			$budgetInt = intval($data['budget']); 
		//	$query = $this->db->get_where('halte', array('halte_name = ' => $data['halte']));
		//	return $query->row_array();
		//	$hasil = $query->row_array();
			$kodehalte= $data['halte_code'];
						
			$condition = "(tourist_attraction.halte_code = '".$data['halte_code']."' AND weekend_price <=  ".$budgetInt.") OR weekend_price <=".($budgetInt+3500)."";
			$query = $this->db->select("*")->from('tourist_attraction')->where($condition);
			$query = $this->db->join('halte', 'halte.halte_code = tourist_attraction.halte_code');
			$query =$this->db->get();
			return $query->result();
		}
		
	}
?>