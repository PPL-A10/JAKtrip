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
		
		function getstatisticrating()
		{
			$this->load->database();
			$this->db->select('place_name,rate_avg');
            $this->db->from('tourist_attraction');
			$query = $this->db->get(); 
			return $query->result();
		}
		
		function getstatisticbudget()
		{
			$this->load->database();
			$this->db->select('place_name,weekday_price');
            $this->db->from('tourist_attraction');
			$query = $this->db->get(); 
			return $query->result();
		}
	}
?>