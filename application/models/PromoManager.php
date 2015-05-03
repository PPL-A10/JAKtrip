<?php

class PromoManager extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
 	function insertPromo($data){
	 	$this->load->database();
       	$this->db->insert('promo', $data);
    } 

    function showAllPromo()
	{
		$this->load->database();
		$this->db->select('*');
        $this->db->from('promo');
        $this->db->order_by('end_date desc'); 
		$query = $this->db->get();
		return $query->result();
	}

    function showType()
    {
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
        $idP = (int)implode("", $id_promo);

        foreach($form_type['type_list'] as $selected){
            if($selected != ''){
                $this->db->insert('type_promo', array('type_name'=>$selected, 'id_promo'=>$idP));
            }
            else{
                if($type_new != ''){
                    $this->db->insert('types', array('type_name'=>$type_new));
                    $this->db->insert('type_promo', array('type_name'=>$type_new, 'id_promo'=>$idP));
                }
            }
        }

        $this->db->insert('type_promo', $form_type);
        
        if ($this->db->affected_rows() == '1'){
            return TRUE;
        }
        return FALSE;
    }
}

?>
