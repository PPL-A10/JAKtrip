<?php

	class reviewMod extends CI_Model {

		function showallreview()
		{
			$this->load->database();
			$query = $this->db->get('feedback');
			return $query->result();
		}
		
		function delete($name){
			$this ->load->database();
			$this->db->delete('feedback', array('name' => $name));
		}
	}
?>