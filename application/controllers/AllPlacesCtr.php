<?php

class AllPlacesCtr extends CI_Controller {
	/*function __construct() {
        parent::__construct();
        $this->load->model('touristAttrManager');
    }*/

    function index()
	{   
			$this->load->helper('form');
			$this->load->model('AllPlacesMod');
			$data['query']= $this->AllPlacesMod->showallplaces();
			$this->load->helper('form');
			$this->load->model('touristAttractionManager');
			
			$this->load->model('searchMod');
			$data['query4']= $this->searchMod->showallwisata();
			$data['query1']= $this->searchMod->showallcategory();
			$data['query2']= $this->searchMod->showalllocation();
			$data['query3']= $this->searchMod->showallhalte();
			$this->load->view('header');
			$this->load->view('allPlacesUI',$data);
			$this->load->view('footer');
	}
	
	public function searchwisataLoc($city=NULL)
	{
			$this->load->library('table');
			$this->load->helper('html'); 
			$this->load->model('AllplacesMod');
			$data['query'] = $this->AllplacesMod->filterMod2($city);
			//$this->load->view('searchView',$data);    
			echo json_encode($data);

			//$this->load->view('header');
			//$this->load->view('allPlacesUI',$data);
			//$this->load->view('footer');
	}

			public function searchwisataCatLocKey($category_name=NULL, $city=NULL, $place_name=NULL)
		{
			$this->load->library('table');
			$this->load->helper('html'); 
			$this->load->model('AllplacesMod');
			$data['query'] = $this->AllplacesMod->filterModFinal($category_name, $city, $place_name);
			//$this->load->view('searchView',$data);    
			echo json_encode($data);
		}
}

?>