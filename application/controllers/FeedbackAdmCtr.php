<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class FeedbackAdmCtr extends CI_Controller {
	

	function __construct() {
        parent::__construct();
        //$this->load->model('SpamManager');
       
    }
    
	function index(){
		$this->load->view('header');
		$this->load->view('menuadmin');
		$this->load->view('FeedbackUI');
		$this->load->view('footer');
	}

}