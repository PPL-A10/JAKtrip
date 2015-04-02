<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ManageTourAttrCtr extends CI_Controller {
	

	function __construct() {
        parent::__construct();
        $this->load->model('TouristAttrManager');
       
    }
    
	function index(){
		
		$this->load->view('manageTourAttrUI');

	}

}