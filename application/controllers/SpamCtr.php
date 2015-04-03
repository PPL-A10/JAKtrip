<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SpamCtr extends CI_Controller {
	

	function __construct() {
        parent::__construct();
        //$this->load->model('SpamManager');
       
    }
    
	function index(){
		
		$this->load->view('spamUI');

	}

}