<?php

class AllPlacesCtr extends CI_Controller {
	/*function __construct() {
        parent::__construct();
        $this->load->model('AllPlacesMod');
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
	
	public function searchwisataCatNam($category_name=NULL, $place_name=NULL)
	{
			$this->load->library('table');
			$this->load->helper('html'); 
			$this->load->model('AllplacesMod');
			$data['query'] = $this->AllplacesMod->filterMod1($category_name, $place_name);
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
		
			function popular()
    {
		$data   = array();
		$this->load->model('AllPlacesMod');
		$this->load->helper('url');
		$data1['query'] = $this->AllPlacesMod->getAllTourAttrPopular();
		//$this->load->view('FormSearchUI', $data1);
		echo json_encode($data1);
	}
	
	function highestRate()
    {
		$data   = array();
		$this->load->model('AllPlacesMod');
		$this->load->helper('url');
		$data1['query'] = $this->AllPlacesMod->getAllTourAttrHighestRate();
		//$this->load->view('SearchUI', $data1);
		echo json_encode($data1);
	}
	
	function sortAtoZ($category_name=NULL, $city=NULL, $place_name=NULL)
    {
		$data   = array();
		$this->load->model('AllPlacesMod');
		$this->load->helper('url');
		$data1['query'] = $this->AllPlacesMod->getAllTourAttrSortAtoZ($category_name, $city, $place_name);
		//$this->load->view('FormSearchUI', $data1);
		echo json_encode($data1);
	}
	
	function sortZtoA($category_name=NULL, $city=NULL, $place_name=NULL)
    {
		$data   = array();
		$this->load->model('AllPlacesMod');
		$this->load->helper('url');
		$data2['query'] = $this->AllPlacesMod->getAllTourAttrSortZtoA($category_name, $city, $place_name);
		//$this->load->view('FormSearchUI', $data2);
		echo json_encode($data2);
    }
	
	function LowToHigh()
    {
		$data   = array();
		$this->load->model('AllPlacesMod');
		$this->load->helper('url');
		$data3['query'] = $this->AllPlacesMod->getAllTourAttrSortLowToHigh();
		//$this->load->view('FormSearchUI', $data3);
		echo json_encode($data3);
    }
	
	function HighToLow()
    {
		$data   = array();
		$this->load->model('AllPlacesMod');
		$this->load->helper('url');
		$data4['query'] = $this->AllPlacesMod->getAllTourAttrSortHighToLow();
		//$this->load->view('FormSearchUI', $data4);
		echo json_encode($data4);
    }
}

?>