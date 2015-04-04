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
	//	if($place_name != NULL){
		//	$this->TouristAttractionManager->edit($place_name);
	//	}
		//$data = $this->guest_model->general();
		//$data['query'] = $this->guest_model->guest_getall();
		//$data['query'] = $this->touristattractionmanager->tourAttr_get($place_name);
		$query = $this->touristattractionmanager->tourAttr_get($place_name);	
		$query2 = $this->touristattractionmanager->tourAttr_getCat($place_name);
		$query3 = $this->touristattractionmanager->tourAttr_getPic($place_name);
		$query4 = $this->touristattractionmanager->tourAttr_getHalte($place_name);		
		//$query = $this->books_model->get($id);
		$data['place_name']['value'] = $query['place_name'];
		$data['description']['value'] = $query['description'];
		$data['place_info']['value'] = $query['place_info'];
		$data['weekday_price']['value'] = $query['weekday_price'];	
		$data['weekend_price']['value'] = $query['weekend_price'];	
		$data['category_name']['value'] = $query2['category_name'];	
		$data['city']['value'] = $query['city'];
		if($query3 != NULL){
			$data['pic']['value'] = $query3['pic'];
			$data['pic_info']['value'] = $query3['pic_info'];
		}
		else{
			$data['pic']['value'] = NULL;
			$data['pic_info']['value'] = NULL;
		}
		$data['longitude']['value'] = $query['longitude'];
		$data['lattitude']['value'] = $query['lattitude'];	
		$data['halte_name']['value'] = $query4['halte_name'];	
		$data['transport_info']['value'] = $query['transport_info'];	
		$data['transport_price']['value'] = $query['transport_price'];	
		$data['author']['value'] = $query['author'];			
		
		//dropdown list category
		$dd_cat = array();
		$result = $this->TouristAttractionManager->getCategory();
		foreach($result->result_array() as $cat){
			$dd_cat[$cat['category_name']] = $cat['category_name'];
		}
		$data['cat_name']=$dd_cat;
		//dropdown list place_info
		/*
		$dd_place = array();
		$result2 = $this->TouristAttractionManager->getTouristAttraction();
		foreach($result2->result_array() as $place){
			$dd_place[$place['place_name']] = $cat['place_info'];
		}
		$data['place_info']=$dd_place;
		*/
		//dropdown list halte
		$dd_halte = array();
		$result3 = $this->TouristAttractionManager->getHalte();
		foreach($result3->result_array() as $halte){
			$dd_halte[$halte['halte_name']] = $halte['halte_name'];
		}
		$data['hlt_name']=$dd_halte;
		$this->load->view('formTourAttrUI2',$data);
	}
	
	function success()
	{
		redirect('manageTourAttrCtr');	
	}
	
	
	function myform(){
			
		
//myform		

		$this->load->library('form_validation');
		//$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->model('TouristAttractionManager');
		//$data = $this->TouristAttractionManager->general();

		$this->form_validation->set_rules('place_name', 'place_name', 'required|callback_check|trim');	
		$this->form_validation->set_rules('weekday_price', 'weekday_price', 'required');			
		$this->form_validation->set_rules('weekend_price', 'weekend_price', 'required');
		$this->form_validation->set_rules('longitude', 'longitude', 'required');
		$this->form_validation->set_rules('lattitude', 'lattitude', 'required');
		$this->form_validation->set_rules('city', 'city', 'required');
		$this->form_validation->set_rules('description', 'description', 'required');
		$this->form_validation->set_rules('place_info', 'place_info');
		$this->form_validation->set_rules('halte_name', 'halte_name', 'required');
		$this->form_validation->set_rules('transport_info', 'transport_info', 'required');
		$this->form_validation->set_rules('transport_price', 'transport_price', 'required');
		$this->form_validation->set_rules('category_name', 'category_name', 'required');
		$this->form_validation->set_rules('pic', 'pic');
		$this->form_validation->set_rules('pic_info', 'pic_info');
		$this->form_validation->set_rules('author', 'author', 'trim');
		
		//get halte_code from halte_name
		
		$halte_name = $this->input->post('halte_name');
		echo $halte_name;
		$halte_code = $this->touristattractionmanager->getHalteCode($halte_name);
		$place_info = $this->input->post('place_info');
		if($place_info == ''){
			$place_info = NULL;
		}	
		
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
	
		//if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		//{
			//$this->load->view('formTourAttrUI2');
	//	}
		//else // passed validation proceed to post success logic
		//{
		 	// build array for the model
			if($this->input->post('save')){
			$form_data = array(
					       'place_name' => $this->input->post('place_name'),
					       	'weekday_price' => $this->input->post('weekday_price'),
					       	'weekend_price' => $this->input->post('weekend_price'),
							'longitude' => $this->input->post('longitude'),
							'lattitude' => $this->input->post('lattitude'),
							'city' => $this->input->post('city'),
							//'rate_avg' => 0,
							'description' => $this->input->post('description'),
							//'place_info' => $this->input->post('place_info'),
							'halte_code' => $halte_code['halte_code'],
							'transport_info' => $this->input->post('transport_info'),
							'transport_price' => $this->input->post('transport_price'),
							'author' => $this->input->post('author'),
							'last_modified' => mdate("%Y-%m-%d %H:%i:%s", now())							
						);

			$form_photo = array(
							'place_name' => $this->input->post('place_name'),
							'pic' => $this->input->post('pic'),
							'pic_info' =>$this->input->post('pic_info')
						);		
							
			$form_cat = array(
							'place_name' => $this->input->post('place_name'),
							'category_name' => $this->input->post('category_name')
						);							
									
			// run insert model to write data to db
			
		
		
		
			$place_name = $this->input->post('place_name');
			if ($this->TouristAttractionManager->edit($place_name, $form_data, $form_photo, $form_cat) == TRUE) // the information has therefore been successfully saved in the db
				{

					redirect('manageTourAttrCtr/success');   // or whatever logic needs to occur
				}
				else
				{
				echo 'An error occurred saving your information. Please try again later';
				 //Or whatever error handling is necessary
				}
			}
		//}
	}
	
	
	
}