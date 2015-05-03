<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ManagePromoCtr extends CI_Controller {
	public function index() {
		$this->load->model('promoManager');
		$data['query']= $this->promoManager->showAllPromo();

		$this->load->view('header');
		$this->load->view('menuadmin');
		$this->load->view('managePromoUI', $data);
		$this->load->view('footer');
	}
	
}