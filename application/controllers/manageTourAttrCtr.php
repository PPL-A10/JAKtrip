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
		
//myform		
		$this->load->library('form_validation');
		//$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('TouristAttractionManager');
		//$data = $this->TouristAttractionManager->general();
		$this->form_validation->set_rules('place_name', 'place_name', 'required|trim|callback_check');			
		$this->form_validation->set_rules('weekday_price', 'weekday_price', 'required|trim');			
		$this->form_validation->set_rules('weekend_price', 'weekend_price', 'required|trim');
		$this->form_validation->set_rules('longitude', 'longitude', 'required|trim');
		$this->form_validation->set_rules('lattitude', 'lattitude', 'required|trim');
		$this->form_validation->set_rules('city', 'city', 'required|trim');
		$this->form_validation->set_rules('description', 'description', 'required|trim');
		$this->form_validation->set_rules('place_info', 'place_info', 'trim');
		$this->form_validation->set_rules('halte_code', 'halte_code', 'required|trim');
		$this->form_validation->set_rules('transport_info', 'transport_info', 'required|trim');
		$this->form_validation->set_rules('transport_price', 'transport_price', 'required|trim');
		$this->form_validation->set_rules('category_name', 'category_name', 'required|trim');
		$this->form_validation->set_rules('pic', 'pic', 'trim');
		$this->form_validation->set_rules('pic_info', 'pic_info', 'trim');
		
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$this->load->view('formTourAttrUI2');
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			$form_data = array(
					       	'place_name' => set_value('place_name'),
					       	'weekday_price' => set_value('weekday_price'),
					       	'weekend_price' => set_value('weekend_price'),
							'longitude' => set_value('longitude'),
							'lattitude' => set_value('lattitude'),
							'city' => set_value('city'),
							'rate_avg' => 0,
							'description' => set_value('description'),
							'place_info' => set_value('place_info'),
							'halte_code' => set_value('halte_code'),
							'transport_info' => set_value('transport_info'),
							'transport_price' => set_value('transport_price')						
						);

			$form_photo = array(
							'place_name' => set_value('place_name'),
							'pic' => set_value('pic'),
							'pic_info' => set_value('pic_info')
						);		
							
			$form_cat = array(
							'place_name' => set_value('place_name'),
							'category_name' => set_value('category_name')
						);							
									
			// run insert model to write data to db
		
			if ($this->TouristAttractionManager->edit($place_name, $form_data, $form_photo, $form_cat) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect('tourAttrCtr/success');   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}
	
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		if($place_name != NULL){
			$this->TouristAttractionManager->edit($place_name);
		}
		//$data = $this->guest_model->general();
		//$data['query'] = $this->guest_model->guest_getall();
		//$data['query'] = $this->touristattractionmanager->tourAttr_get($place_name);
		$query = $this->touristattractionmanager->tourAttr_get($place_name);	
		$query2 = $this->touristattractionmanager->tourAttr_getCat($place_name);
		$query3 = $this->touristattractionmanager->tourAttr_getPic($place_name);		
		//$query = $this->books_model->get($id);
		$data['place_name']['value'] = $query['place_name'];
		$data['description']['value'] = $query['description'];
		$data['place_info']['value'] = $query['place_info'];
		$data['weekday_price']['value'] = $query['weekday_price'];	
		$data['weekend_price']['value'] = $query['weekend_price'];	
		$data['category_name']['value'] = $query2['category_name'];	
		$data['city']['value'] = $query['city'];
		$data['pic']['value'] = $query3['pic'];
		$data['pic_info']['value'] = $query3['pic_info'];
		$data['longitude']['value'] = $query['longitude'];
		$data['lattitude']['value'] = $query['lattitude'];	
		$data['halte_code']['value'] = $query['halte_code'];	
		$data['transport_info']['value'] = $query['transport_info'];	
		$data['transport_price']['value'] = $query['transport_price'];			
		
		$this->load->view('formTourAttrUI2',$data);
	}
	
	
}