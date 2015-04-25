<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UsersCtr extends CI_Controller {
	

	function __construct() {
        parent::__construct();
       
    }
    
	function index(){
		$this->load->view('header');
		$this->load->view('UserProfileUI');
		$this->load->view('footer');
	}
}