<?php

	class memberMod extends CI_Model {

		function showallmember()
		{
			$this->load->database();
			$query = $this->db->get('member');
			return $query->result();
		}
	}
?>