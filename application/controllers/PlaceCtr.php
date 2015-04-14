<?php

class PlaceCtr extends CI_Controller {

    /*function __construct() {
        parent::__construct();
        $this->load->model('TouristAttrManager');
    }*/

    function index($name=null)
	{   
		$this->load->helper('html');
		$this->load->model('DetailMod');
		$this->load->model('ReviewModel');
		$data['query']= $this->DetailMod->showdetail($name);
		$data['query2']= $this->ReviewModel->showreviewtempat($name);
		$this->load->view('header');
		$this->load->view('PlaceUI',$data);
		$this->load->view('footer');
		//echo json_encode($data);
	}
	
	    function getdetail($name)
	{   
		$this->load->model('DetailMod');
		$data['query']= $this->DetailMod->showdetail($name);
		//$this->load->view('DetailUI(backup)',$data);
		echo json_encode($data);
	}
}

?>