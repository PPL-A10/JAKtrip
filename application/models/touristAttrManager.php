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
			$halte_name= $data['halte_name'];
						
			$condition = "(halte_name = '".$data['halte_name']."' AND weekday_price + transport_price <=  ".$budgetInt.") OR weekday_price + transport_price <=".($budgetInt-3500)."";
			$query = $this->db->select("*")->from('tourist_attraction')->join('halte', 'halte.halte_code = tourist_attraction.halte_code')->where($condition);
			$query = $this->db->get();
			return $query->result();	
		}

		function getDatabaseWithinBudgetandHalteWeekend($data)
		{
			$this->load->database();
			$budgetInt = intval($data['budget']); 
		//	$query = $this->db->get_where('halte', array('halte_name = ' => $data['halte']));
		//	return $query->row_array();
		//	$hasil = $query->row_array();
			$halte_name= $data['halte_name'];
						
			$condition = "(halte_name = '".$data['halte_name']."' AND weekend_price + transport_price <=  ".$budgetInt.") OR weekend_price + transport_price <=".($budgetInt-3500)."";
			$query = $this->db->select("*")->from('tourist_attraction')->join('halte', 'halte.halte_code = tourist_attraction.halte_code')->where($condition);
			$query =$this->db->get();
			return $query->result();
		}
		function getDatabaseWithinBudgetandHalteWeekday2($data)
		{
			$this->load->database();
			$budgetInt = intval($data['budget']); 
		//	$query = $this->db->get_where('halte', array('halte_name = ' => $data['halte']));
		//	return $query->row_array();
		//	$hasil = $query->row_array();
			
						
			$condition = "(weekday_price <=  ".$budgetInt.")";
			$query = $this->db->select("*")->from('tourist_attraction')->join('halte', 'halte.halte_code = tourist_attraction.halte_code');
			$query = $this->db->get();
			return $query->result();	
		}
		function getDatabaseWithinBudgetandHalteWeekend2($data)
		{
			$this->load->database();
			$budgetInt = intval($data['budget']); 
		//	$query = $this->db->get_where('halte', array('halte_name = ' => $data['halte']));
		//	return $query->row_array();
		//	$hasil = $query->row_array();
			
						
			$condition = "(weekend_price <=  ".$budgetInt.")";
			$query = $this->db->select("*")->from('tourist_attraction')->join('halte', 'halte.halte_code = tourist_attraction.halte_code')->where($condition);
			$query = $this->db->get();
			return $query->result();
		}

		function getDetail($data)
		{
			$this->load->database();
			$tourAttrChoosen = $data['tourAttr'];

			$condition = "place_name = '".$tourAttrChoosen."'";
			$query = $this->db->select("*")->from('tourist_attraction')->where($condition);
			$query = $this->db->get();
			return $query->result();
		}
	}
?>