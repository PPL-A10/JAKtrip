<?php

	class halteManager extends CI_Model {
	
		function getDatabaseWithinBudget($budget)
		{
			$budgetInt = intval($budget);
			$this->load->database();
			$query = $this->db->get_where('tourist_attraction', array('weekday_price <=' => $budgetInt));		
			return $query->result();
		}

		function getHalteCode($data)
		{ 
			$this->load->database();
			$query = $this->db->get_where('halte', array('halte_name = ' => $data['halte']))->row()->halte_code;
			return $query;
			// $hasil = $query->row_array();
			// $kodehalte= $hasil['halte_code'];
						
			// $condition = "(halte_code = '".$kodehalte."' AND weekday_price <=  ".$budgetInt.") OR weekday_price <=".($budgetInt+3500)."";
			// $query = $this->db->select("*")->from('tourist_attraction')->where($condition)->get();
			// return $query->result();
			
			
		}
		
	}
?>