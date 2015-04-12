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
			$this->load->view('header');
			$this->load->view('allPlacesUI',$data);
			$this->load->view('footer');
	}
	
	public function searchwisataLoc($city=NULL)
	{
			$this->load->library('table');
			$this->load->helper('html'); 
			
			$data['query'] = $this->AllplacesMod->filterMod2($city);
			//$this->load->view('searchView',$data);    
			echo json_encode($data);

			$this->load->view('header');
			$this->load->model('AllplacesMod');
			$this->load->view('footer');
	}
}

?>