<?php

	class SpamMod extends CI_Model {

		function showspamreview()
		{
			$this->load->database();
			$this->db->select('*');
            $this->db->from('rating');
			$this->db->where('is_nudity >', 0);
			$this->db->or_where('is_spam >', 0); 
			$this->db->or_where('is_falsestatement >', 0);
			$this->db->or_where('is_unrelatedcontent >', 0); 
			$this->db->or_where('is_profanity >', 0); 			
			$query = $this->db->get();
			return $query->result();
		}
		
		function delete($name){
			$this ->load->database();
			$this->db->delete('feedback', array('name' => $name));
		}
	}
?>