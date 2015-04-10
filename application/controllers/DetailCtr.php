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

	function detail($TouristAttr)
	{
		$this->load->model('TouristAttrManager');
		
		$data = array(
				'tourAttr' => urldecode($TouristAttr),
		);
		$data['query'] = $this->TouristAttrManager->getDetail($data);
		echo json_encode($data);
	}
}

?>