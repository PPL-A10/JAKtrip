<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class StatisticCtr extends CI_Controller {
	

	function __construct() {
        parent::__construct();
       
    }
    
	function index(){
		$this->load->view('header');
		$this->load->view('menuadmin');
		$this->load->view('StatisticUI');
		$this->load->view('footer');
	}
}