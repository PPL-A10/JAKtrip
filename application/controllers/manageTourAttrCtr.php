<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ManageTourAttrCtr extends CI_Controller {
	public function index() {
		$this->load->library('table');
		$this->load->helper('html');
		//$this->load->model('TouristAttractionManager');
		$data['query'] = $this->touristattractionmanager->tourAttr_getall();
		//$data['query2'] = $this->touristattractionmanager->getCategory();
		$this->load->view('manageTourAttrUI', $data);
	}
	

	
	function del($place_name){
		$this->load->library('table');
		$this->load->helper('html');
		$this->load->model('TouristAttractionManager');
		//$this->load->model('guest_model');
		
		$place_name = str_replace("%20", " ", $place_name);
		
		if($place_name != NULL){
			$this->TouristAttractionManager->delete($place_name);
		}
		//$data = $this->guest_model->general();
		//$data['query'] = $this->guest_model->guest_getall();
		$data['query'] = $this->touristattractionmanager->tourAttr_getall();
		$this->load->view('manageTourAttrUI', $data);
	}

	function edit($place_name){
		$this->load->library('table');
		$this->load->helper('html');
		$this->load->helper('form');
		//$this->load->model('guest_model');
		$this->load->model('TouristAttractionManager');
		
		$place_name = str_replace("%20", " ", $place_name);
		
		if($place_name != NULL){
		//	$this->TouristAttractionManager->edit($place_name);
		}
		//$data = $this->guest_model->general();
		//$data['query'] = $this->guest_model->guest_getall();
		$data['query'] = $this->touristattractionmanager->tourAttr_get($place_name);
		$this->load->view('formTourAttrUI2',$data);
	}
}