<?php

class DetailshareCtr extends CI_Controller {

    /*function __construct() {
        parent::__construct();
        $this->load->model('TouristAttrManager');
    }*/

    function index($name=null)
	{   
		$this->load->model('DetailMod');
		$data['query']= $this->DetailMod->showdetail($name);
		$data['query2']= $this->DetailMod->showjudul($name);
		$this->load->view('DetailUI',$data);
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