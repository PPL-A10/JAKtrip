<?php

	class memberMod extends CI_Model {

		function showallmember()
		{
			$this->load->database();
			$this->db->select('*');
            $this->db->from('member'); 
			$this->db->join('rating', 'member.username = rating.username');
			$query = $this->db->get();
			return $query->result();
		}
	}
?>