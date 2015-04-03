<?php

class DetailCtr extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('TouristAttrManager');
    }

    function index()
	{   
		$this->load->view('detailUI');
	}
}

?>