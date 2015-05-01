<?php

	class SpamManager extends CI_Model {

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
		
		function updatespam($id, $spamreason){
		if($spamreason == 'spam'){			
		$data = array(
               'is_spam' => 1
            );}
		if($spamreason == 'false_statement'){			
		$data = array(
               'is_falsestatement' => 1
            );}
		if($spamreason == 'unrelated_content'){			
		$data = array(
               'is_unrelatedcontent' => 1
            );}
		if($spamreason == 'profanity'){			
		$data = array(
               'is_profanity' => 1
            );}
		if($spamreason == 'nudity'){			
		$data = array(
               'is_nudity' => 1
            );}

			$this->db->where('id_rate', $id);
			$this->db->update('rating', $data); 
			// Produces:
			// UPDATE mytable 
			// SET title = '{$title}', name = '{$name}', date = '{$date}'
				// WHERE id = $id
		}
		
	}
?>