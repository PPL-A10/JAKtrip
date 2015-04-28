<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class RegisterCtr extends CI_Controller {
	
	function index(){
		$this->load->view('header');
		$this->load->view('registerUI');
		$this->load->view('footer');
	}
}