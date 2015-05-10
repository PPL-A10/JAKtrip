<?php
class TripManager extends CI_Model{
	function saveTrip($data)
	{
		/*@author wildan*/
		$this->load->database();
		$condition = "username = '".$data['username']."' AND date_trip = '".$data['date_trip']."'";
		$this->db->select('*');
        $query = $this->db->from('trips')->where($condition)->get();
        if($query->num_rows()!=0)
        {
        	$this->db->update('trips', $data, array('username' => $data['username'], 'date_trip'=> $data['date_trip']));
        }
        else
        {
        	$this->db->insert('trips', $data);	
        }		  
	}

	function getDetailTrip($data)
	{
		/*@author wildan*/
		$this->load->database();
		$condition = "username = '".$data."'";
		$this->db->select('*');
		$query = $this->db->from('trips')->where($condition)->get();
		return $query->result_array();
	}
}
?>