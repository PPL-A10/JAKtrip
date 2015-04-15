<?php

class FaqCtr extends CI_Controller {

    function index()
	{   
		$this->load->view('header');
		$this->load->view('faqUI');
		$this->load->view('footer');
	}
}

?>