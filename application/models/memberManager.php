<?php

	class memberManager extends CI_Model {
	
		function validasiLogin($data)
		{
			$this->load->database();
			$condition = "(username = '".$data['nameORemail']."' OR email = '".$data['nameORemail']."') AND password= '".$data['password']."'";
			$query = $this->db->select("*")->from('member')->where($condition)->get();

			if($query->num_rows() == 1)
			{
				return $query->row_array();
			}
			else
			{
				return false;
			}
		}

		function getPassword($data)
		{
			$this->load->database();
			$condition = "(username = '".$data['nameORemail']."' OR email = '".$data['nameORemail']."')";
			$query = $this->db->select("*")->from('member')->where($condition)->get();

			return $query->row_array();
		}

		function addToWishlist($data){
			$this->load->database();
			$this->db->insert('collection', $data);
		}

		function updateWishlist($data){
			$this->load->database();
			$this->db->update('collection', $data);
		}

		function delFromWishlist($data){
			$this->load->database();
			$this->db->update('collection', $data);
		}

		function addToVisited($data){
			$this->load->database();
			$this->db->insert('collection', $data);
		}

		function updateVisited($data){
			$this->load->database();
			$this->db->update('collection', $data);
		}

		function delFromVisited($data){
			$this->load->database();
			$this->db->update('collection', $data);
		}

		function showCollection($place, $user){
			$this->load->database();
			$this->db->select('*');
            $this->db->from('collection');
            $this->db->where('username', $user);
            $this->db->where('place_name', $place);
            $query = $this->db->get();
            return $query->result();
            // $this->db->where('place_name', $place);
		}

	}
?>