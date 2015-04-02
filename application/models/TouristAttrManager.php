<?php
class TouristAttrManager extends CI_Model{

function __construct(){
  		parent::__construct();
  		$this->load->helper('url');				
 	}
 	
	function SaveForm($form_data)
	{
		//$myQueryString = "set search_path to '1206277520'";
		//$this->db->query($myQueryString);
		$this->load->database();
		$this->db->insert('tourist_attraction', $form_data);
		

		$this->db->insert('photo', $form_photo);

		$this->db->insert('tour_category', $form_cat);
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		return FALSE;
	}

	function tourAttr_getall(){
		$this->load->database();
		//$myQueryString = "set search_path to '1206277520'";
		//$this->db->query($myQueryString);
		$query = $this->db->get('tourist_attraction');
		//$query2 = $this->db->get('tour_category');
		return $query->result();
	}	

	function tourAttr_get($place_name){
		$this->load->database();
		
		echo $place_name;
		
		//$quer = "SELECT * FROM tourist_attraction WHERE place_name = $place_name";
		//$query = $this->db->query($quer);
		$query = $this->db->get_where('tourist_attraction', array('place_name'=>$place_name));
		//$query = $this->db->from($this->'tourist_attraction')->where(array(('place_name')=>$place_name))->get();
		//return $query->row_array();
		return $query->result();
	}

	function delete($place_name){
		$this->load->database();
		//$myQueryString = "set search_path to '1206277520'";
		//$this->db->query($myQueryString);
		$this->db->delete('tourist_attraction', array('place_name' => $place_name));
	}

	function edit($place_name){
		$this->load->database();
		//$myQueryString = "set search_path to '1206277520'";
		//$this->db->query($myQueryString);
		$quer = "update komentar set approve = 1 where place_name = $place_name;";
		$this->db->query($quer);
	}

	function general(){
  		//$this->load->library('WebMenu');
  		//$menu = new WebMenu;
		//$data['base'] = $this->config->item('base_url');
		//$data['css'] = $this->config->item('css');
  		//$data['menu'] 		= $menu->show_menu();
  		//$data['webtitle']	= 'Halo Tangsel!';
  		//$data['websubtitle']= 'Tangsel - Depok. Situs Paguyuban Tangsel di Depok';
  		//$data['webfooter']	= 'Copyright © Fakhirah Dianah Ghaisani 120677520 PPW-A';
		
		return $data;					  		
 	}
	
	function getCategory(){
		return $this->db->get('tour_category');
	}
}
?>