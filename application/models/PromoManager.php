<?php

class PromoManager extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
 	function insertPromo($data){
	 	$this->load->database();
       	$this->db->insert('promo', $data);
    } 

    function showAllPromo(){
		$this->load->database();
		$this->db->select('*');
        $this->db->from('promo');
        $this->db->order_by('end_date desc'); 
		$query = $this->db->get();
		return $query->result();
	}

	function showPromo($title){
		$this->load->database();
		$name = str_replace("%20"," ",$name);
        $query = $this->db->get_where('promo', array('title' => $title));
		return $query->result();
	}

    function showType(){
        $this->load->database();
        $this->db->select('type_name');
        $this->db->from('types');
        $this->db->order_by('type_name asc'); 
        $this->db->distinct();
        $query = $this->db->get();
        return $query->result();
    }

    function getTypes(){
        $this->load->database();
        $query = $this->db->get('types');
        return $query->result();
    }

    function getLastIdPromo(){
        $this->db->select_max('id_promo');
        $query = $this->db->get('promo');
        return $query->result();
    }

    function SaveForm($form_data){
        $this->db->insert('promo', $form_data);
        if ($this->db->affected_rows() == '1'){
            return TRUE;
        }
        return FALSE;
    }

    function SaveFormType($form_type){
        $id_promo = $form_type['id_promo'];
        $type_new = $form_type['type_new'];
        
        foreach($form_type['type_list'] as $selected){
            if($selected != ''){
                $this->db->insert('type_promo', array('type_name'=>$selected, 'id_promo'=>$id_promo));
            }else{
                if($type_new != ''){
                    $this->db->insert('types', array('type_name'=>$type_new));
                    $this->db->insert('type_promo', array('type_name'=>$type_new, 'id_promo'=>$id_promo));
                }
            }
        }
        
        if ($this->db->affected_rows() == '1'){
            return TRUE;
        }
        return FALSE;
    }
	
	function filterpromoloc($city){
		$this->load->database();
		$this->db->select('id_promo, start_date, end_date, p.place_name, photo, title, p.description, tourist_attraction.city');
		$this->db->from('promo as p');
		$this->db->join('tourist_attraction', 'p.place_name = tourist_attraction.place_name', 'left');
		$city= str_replace("%20", " ",$city);
		if((string)$city != ""){
			$this->db->where(array('tourist_attraction.city' => $city));
		} 			
		$query = $this->db->get(); 
		return $query->result(); 
	}
		
	function filterPromoFinal($city, $title){
		$this->load->database();
		$this->db->select('id_promo, start_date, end_date, p.place_name, photo, title, p.description, tourist_attraction.city');
		$this->db->from('promo as p');
		$this->db->join('tourist_attraction', 'p.place_name = tourist_attraction.place_name', 'left');
		$city= str_replace("%20", " ",$city);
		$title= str_replace("%20", " ",$title);
		if((string)$city != ""and $city !="All"){
			$this->db->where(array('tourist_attraction.city' => $city));
		} 
		if((string)$title != ""){
			$this->db->like(array('p.title' => $title));
		} 			
		$query = $this->db->get(); 
        return $query->result_array(); 
	}

    function promo_getall(){
        $this->load->database();
        $query = $this->db->get('promo');
        return $query->result();
    }

    function promo_getType($id_promo){
        $query = $this->db->get_where('type_promo', array('id_promo'=>$id_promo));
        return $query->result();
    }

    function delete($id_promo){
        $this->load->database();
        $this->db->delete('promo', array('id_promo' => $id_promo));
    }

    function promo_get($id_promo){
        $this->load->database();
        
        echo $id_promo;

        $query = $this->db->get_where('promo', array('id_promo'=>$id_promo));
        return $query->row_array();
    }

    function getPromo(){
        $this->load->database();
        $query = $this->db->select("*")->from('promo')->get();
        return $query;
    }

    function edit($id_promo, $form_data, $form_type){
        $this->load->database();
        $this->db->where('id_promo',$id_promo);
        $this->db->update('promo',$form_data);
        $old_type = $form_type['type_old'];
        foreach($old_type as $old){
            $is_exists=FALSE;
            foreach($form_type['type_list'] as $selected){
                if($old->type_name==$selected){
                    $is_exists=TRUE;
                }
            }
            if($is_exists==FALSE){
                $this->db->delete('type_promo', array('id_promo'=>$id_promo, 'type_name'=>$old->type_name));
            }
        }
        
        $type_new = $form_type['type_new'];
        foreach($form_type['type_list'] as $selected){
            if($selected != ''){
                $quer = $this->db->get_where('type_promo', array('id_promo'=>$id_promo, 'type_name'=>$selected));
                if($quer->num_rows==0){
                    $this->db->insert('type_promo', array('id_promo'=>$id_promo, 'type_name'=>$selected));
                }
            }else{
                if($type_new != ''){
                    $this->db->insert('types', array('type_name'=>$type_new));
                    $this->db->insert('type_promo', array('id_promo'=>$id_promo, 'type_name'=>$type_new));
                }   
            }
        }
        return TRUE;
    }
}

?>
