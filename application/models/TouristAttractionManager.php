<?php
class TouristAttractionManager extends CI_Model{

function __construct(){
  		parent::__construct();
  		$this->load->helper('url');				
 	}
 	
	function SaveForm($form_data, $form_photo, $form_cat)
	{
		//$myQueryString = "set search_path to '1206277520'";
		//$this->db->query($myQueryString);
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
		$query =$this->db->select('*')
                 ->from('tourist_attraction ta')
                 ->join('tour_category tc','ta.place_name = tc.place_name')
                 ->get();

		//$query = $this->db->get('tourist_attraction');
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
		return $query->row_array();
		//return $query->result();
	}

	function delete($place_name){
		$this->load->database();
		//$myQueryString = "set search_path to '1206277520'";
		//$this->db->query($myQueryString);
		$this->db->delete('tourist_attraction', array('place_name' => $place_name));
	}

	function edit($place_name, $form_data, $form_photo, $form_cat){
		$this->load->database();
		
		//$myQueryString = "set search_path to '1206277520'";
		//$this->db->query($myQueryString);
		//$this->db->where($place_name,$this->input->post($place_name));
		echo $place_name;
		$where = $this->db->where('place_name',$place_name);
		$this->db->update('tourist_attraction',$form_data, $where);
		//$this->db->where('place_name',$place_name);
		$this->db->update('photo',$form_photo, $where);	
		//$this->db->where('place_name',$place_name);
		$this->db->update('tour_category',$form_cat, $where);		

		

		//sif ($this->db->affected_rows() == '0')
		//{
			return TRUE;
		//}
		//return FALSE;
	}

	function general(){
  		//$this->load->library('WebMenu');
  		//$menu = new WebMenu;
		//$data['base'] = $this->config->item('base_url');
		//$data['css'] = $this->config->item('css');
  		//$data['menu'] 		= $menu->show_menu();

		return $data;					  		
 	}
	
	function getCategory(){
		return $this->db->get('category');
	}
	function getTouristAttraction(){
		return $this->db->get('tourist_attraction');
	}
	function getHalte(){
		return $this->db->get('halte');
	}
	
	function tourAttr_getCat($place_name){
		//return $this->db->get_where('tour_category');
		$query = $this->db->get_where('tour_category', array('place_name'=>$place_name));
		return $query->row_array();
	}
	
	function tourAttr_getPic($place_name){
		//return $this->db->get_where('tour_category');
		$query = $this->db->get_where('photo', array('place_name'=>$place_name));
		return $query->row_array();
	}
	function tourAttr_getHalte($place_name){
		//return $this->db->get_where('tour_category');
		$code = $this->db->get_where('tourist_attraction', array('place_name'=>$place_name))->row_array();
		$halte = $this->db->get_where('halte', array('halte_code'=>$code['halte_code']));
		return $halte->row_array();
	}
	function getHalteCode($halte_name){
		//return $this->db->get_where('tour_category');
		$halte = $this->db->get_where('halte', array('halte_name'=>$halte_name));
		return $halte->row_array();
	}
	
}
?>