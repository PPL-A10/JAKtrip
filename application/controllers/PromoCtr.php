<?php

class PromoCtr extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('promoManager');
    }

    function index($title=null)
	{   
		$this->load->helper('cookie');
		$data['query'] = $this->promoManager->showAllPromo($title);
	
		$this->load->helper('html');

		$this->load->view('header');
		$this->load->view('PromoUI',$data);
		$this->load->view('footer');
		//echo json_encode($data);
	}
}

?>