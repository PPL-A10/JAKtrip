<?php

class AllPlacesCtr extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('touristAttrManager');
    }

    function index()
	{   
			$this->load->view('allPlacesUI');
	}
}

?>