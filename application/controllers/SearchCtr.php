<?php

class SearchCtr extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('touristAttrManager');
    }

    function index()
	{   
		$this->load->view('formSearchUI');
	}
	
	function sorting(){
		$sortBy = $this->input->post('sortBy');
		if(strcmp($sortBy,"popular")==0){
			$this->popular();
		}
		else if(strcmp($sortBy,"highestRate")==0){
			$this->highestRate();
		}
		else if(strcmp($sortBy,"sortAtoZ")==0){
			$this->sortAtoZ();
		}
		else if(strcmp($sortBy,"sortZtoA")==0){
			$this->sortZtoA();
		}
		else if(strcmp($sortBy,"LowToHigh")==0){
			$this->LowToHigh();
		}
		else if(strcmp($sortBy,"HighToLow")==0){
			$this->HighToLow();
		}
	}
	
	function popular()
    {
		$data   = array();
		$this->load->model('touristAttractionManager');
		$this->load->helper('url');
		$data1['result'] = $this->touristAttractionManager->getAllTourAttrPopular();
		$this->load->view('FormSearchUI', $data1);
	}
	
	function highestRate()
    {
		$data   = array();
		$this->load->model('touristAttractionManager');
		$this->load->helper('url');
		$data1['result'] = $this->touristAttractionManager->getAllTourAttrHighestRate();
		$this->load->view('FormSearchUI', $data1);
	}
	
	function sortAtoZ()
    {
		$data   = array();
		$this->load->model('touristAttractionManager');
		$this->load->helper('url');
		$data1['result'] = $this->touristAttractionManager->getAllTourAttrSortAtoZ();
		$this->load->view('FormSearchUI', $data1);
	}
	
	function sortZtoA()
    {
		$data   = array();
		$this->load->model('touristAttractionManager');
		$this->load->helper('url');
		$data2['result'] = $this->touristAttractionManager->getAllTourAttrSortZtoA();
		$this->load->view('FormSearchUI', $data2);
    }
	
	function LowToHigh()
    {
		$data   = array();
		$this->load->model('touristAttractionManager');
		$this->load->helper('url');
		$data3['result'] = $this->touristAttractionManager->getAllTourAttrSortLowToHigh();
		$this->load->view('FormSearchUI', $data3);
    }
	
	function HighToLow()
    {
		$data   = array();
		$this->load->model('touristAttractionManager');
		$this->load->helper('url');
		$data4['result'] = $this->touristAttractionManager->getAllTourAttrSortHighToLow();
		$this->load->view('FormSearchUI', $data4);
    }
	
}

?>