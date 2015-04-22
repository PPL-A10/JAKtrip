<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ManagePromoCtr extends CI_Controller {
	public function index() {
		$this->load->view('header');
		$this->load->view('menuadmin');
		$this->load->view('managePromoUI');
		$this->load->view('footer');
	}
}