<?php

class AllPlacesCtr extends CI_Controller {
	/*function __construct() {
        parent::__construct();
        $this->load->model('touristAttrManager');
    }*/

    function index()
	{   
			$this->load->model('AllPlacesMod');
			$data['query']= $this->AllPlacesMod->showallplaces();
			$this->load->view('allPlacesUI',$data);
	}
	
	public function searchwisataLoc($city=NULL)
	{
			$this->load->library('table');
			$this->load->helper('html'); 
			$this->load->model('AllplacesMod');
			$data['query'] = $this->AllplacesMod->filterMod2($city);
			//$this->load->view('searchView',$data);    
			echo json_encode($data);
	}
}

?>