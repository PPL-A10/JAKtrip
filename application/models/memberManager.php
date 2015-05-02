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
	}
?>