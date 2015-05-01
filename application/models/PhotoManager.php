<?php
class PhotoManager extends CI_Model{

function __construct(){
  		parent::__construct();
  		$this->load->helper('url');		
  		$this->load->database();		
 	}
 	
function SaveForm($form_data)
	{
	$this->db->insert('photo', $form_data);

	}

}
	
	?>