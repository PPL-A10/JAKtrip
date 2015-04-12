<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ManageMemberCtr extends CI_Controller {
	

	function __construct() {
        parent::__construct();
       // $this->load->model('MemberManager');
       
    }
    
	function index(){
		
		$this->load->view('manageMemberUI');

	}

}