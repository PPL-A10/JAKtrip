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
}

?>