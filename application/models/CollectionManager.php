<?php
class CollectionManager extends CI_Model{
	function saveCollection($data)
	{
		/*@author wildan*/
		$this->load->database();
		$condition = "username = '".$data['username']."' AND place_name = '".$data['place_name']."'";
		$this->db->select('*');
        $query = $this->db->from('collection')->where($condition)->get();
        if($query->num_rows()==0)
        {
        	$this->db->insert('collection', $data);
        }
        		  
	}
}
?>