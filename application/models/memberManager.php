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

		function getMember($user){
			$this->load->database();
			$this->db->select('*');
            $this->db->from('member');
            $this->db->where('username', $user);
            $query = $this->db->get();
            return $query->result();
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
		}

		function showWishlist($user){
			$this->load->database();
			$this->db->select('*');
            $this->db->from('collection');
            $this->db->where('username', $user);
            $this->db->where('is_wishlist', 1);
            $this->db->join('tourist_attraction', 'tourist_attraction.place_name = collection.place_name');
            $query = $this->db->get();
            return $query->result();
		}

		function showVisited($user){
			$this->load->database();
			$this->db->select('*');
            $this->db->from('collection');
            $this->db->where('username', $user);
            $this->db->where('is_visited', 1);
            $this->db->join('tourist_attraction', 'tourist_attraction.place_name = collection.place_name');
            $query = $this->db->get();
            return $query->result();
		}
		
		// function getMember($username){
		// 	$this->load->database();
		// 	$query = $this->db->get_where('member', array('username'=>$username));
		// 	return $query->row_array();
		// }
		
		function editMember($username, $form_data){
			$this->load->database();
			$this->db->where('username',$username);
			$this->db->update('member',$form_data);
			return TRUE;
		}


		function checkForgotPassword($data)
		{
			/*@author wildan*/
			$this->load->database();
			$condition = "email = '".$data['email']."'";
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

	}
?>