<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AddPromoCtr extends CI_Controller {
	
	function index(){
		$this->load->model('TouristAttractionManager');
		$data['place'] = $this->TouristAttractionManager->getTouristAttraction()->result();

		$this->load->view('header');
		$this->load->view('menuadmin');
		$this->load->view('formPromoUI', $data);
		$this->load->view('footer');
	}
}