<?php

class DetailCtr extends CI_Controller {

    /*function __construct() {
        parent::__construct();
        $this->load->model('TouristAttrManager');
    }*/

    function index($name)
	{   
		$this->load->model('DetailMod');
		$data['query']= $this->DetailMod->showdetail($name);
		$this->load->view('DetailUI',$data);
	}
}

?>