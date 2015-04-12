<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TourAttrCtr extends CI_Controller {
	
	function index(){
		$this->load->helper('date');

		$this->load->model('TouristAttractionManager');
		//$this->load->model('guest_model');
		//$data = $this->TouristAttractionManager->general();
		//$data['query'] = $this->touristattractionmanager->tourAttr_getall();
		$this->load->helper('form');
		
		 //dropdown list category
		//$dd_cat = array();
		$result = $this->TouristAttractionManager->getCategory();
		//foreach($result->result_array() as $cat){
			//$dd_cat[$cat['category_name']] = $cat['category_name'];
		//}
		$data['cat_name']=$result;
		//dropdown list place_info
		
		$dd_place = array();
		array_push($dd_place, NULL);
		$result2 = $this->TouristAttractionManager->getTouristAttraction();
		foreach($result2->result_array() as $place){
			$dd_place[$place['place_name']] = $place['place_name'];
		}
		$data['place_info']=$dd_place;
		
		//dropdown list halte
		$dd_halte = array();
		$result3 = $this->TouristAttractionManager->getHalte();
		foreach($result3->result_array() as $halte){
			$dd_halte[$halte['halte_code']] = $halte['halte_name'];
		}
		$data['halte_name']=$dd_halte;
		
		$this->load->view('formTourAttrUI',$data);
	}
	
	/*
 	function main(){
		$this->load->library('table');
		$this->load->helper('html');
		//$this->load->model('guest_model');
		$this->load->model('TouristAttractionManager');
		//$data = $this->TouristAttractionManager->general();
		$data['query'] = $this->guest_model->tourAttr_getall();

  		$this->load->view('manageTourAttrUI');
 	}


 	function input($id = 0){
		$this->load->helper('form');
		$this->load->helper('html');
		$this->load->model('TouristAttractionManager');
		//$this->load->model('guest_model');
		if($this->input->post('mysubmit')){
			$this->TouristAttractionManager->entry_insert();
		}
	
		//$data = $this->TouristAttractionManager->general();
		$this->load->view('formTourAttrUI');
		/*
		if((int)$id > 0){
			$query = $this->guest_model->get($id);
			$data['fid']['value'] = $query['id'];
			$data['fnama']['value'] = $query['nama'];
			$data['femail']['value'] = $query['email'];
			$data['fkomentar']['value'] = $query['komentar'];
		}
		
  			
 	}
*/

function myform()
	{			
		$this->load->library('form_validation');
		//$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('date');
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
		//$this->form_validation->set_rules('category_name', 'category_name', 'required|trim');
		$this->form_validation->set_rules('pic', 'pic', 'trim');
		$this->form_validation->set_rules('pic_info', 'pic_info', 'trim');
		$this->form_validation->set_rules('author', 'author', 'trim');
		
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		$image_path = realpath(APPPATH . '../assets/');
		$config['upload_path'] = $image_path;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']='1000';
		$config['max_width']='4096';
		$config['max_height']='4096';
		$this->load->library('upload',$config);
		$this->upload->initialize($config);
		//$upload_data=$this->upload->data();
	
		if(! $this->upload->do_upload()){
		
		}
		else{
			$upload_data=$this->upload->data();
			$file_name = $upload_data['file_name'];
			echo $file_name;
		}

		$place_info = set_value('place_info');
		if($place_info == ''){
			$place_info = NULL;
		}
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			redirect ('tourAttrCtr');
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
							'place_info' => $place_info,
							'halte_code' => set_value('halte_code'),
							'transport_info' => set_value('transport_info'),
							'transport_price' => set_value('transport_price'),	
							'author' => set_value('author'),
							'hits' => 0,
							'last_modified' => mdate("%Y-%m-%d %H:%i:%s", now())
						);

			$form_photo = array(
							'place_name' => set_value('place_name'),
							'pic' => set_value('pic'),
							'pic_info' => set_value('pic_info')
						);		
							
			$form_cat = array(
							'place_name' => set_value('place_name'),
							'category_list' => $this->input->post('category_list'),
							'category_new' => $this->input->post('category_new')
						);							
									
			// run insert model to write data to db
		
			if ($this->TouristAttractionManager->SaveForm($form_data, $form_photo, $form_cat) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect('tourAttrCtr/success');   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}
		

		
	}
	
	# callback
	function check($str)
	{

	if(ctype_alpha(str_replace(' ','',$str))){
		return true;
	}
	else{
				$this->form_validation->set_message('check', 'This field may only contains alphabethical characters and whitespace');
				return FALSE;
	}

	}
	function success()
	{
		redirect('manageTourAttrCtr');	
	}

}