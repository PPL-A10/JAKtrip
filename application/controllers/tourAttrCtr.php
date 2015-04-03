<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TourAttrCtr extends CI_Controller {
	
	function index(){
		$this->load->model('TouristAttractionManager');
		//$this->load->model('guest_model');
		//$data = $this->TouristAttractionManager->general();
		//$data['query'] = $this->touristattractionmanager->tourAttr_getall();
		$this->load->helper('form');
		
		 //dropdown list category
		$dd_cat = array();
		$result = $this->TouristAttractionManager->getCategory();
		foreach($result->result_array() as $cat){
			$dd_cat[$cat['category_name']] = $cat['category_name'];
		}
		$data['category_name']=$dd_cat;
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
		$this->form_validation->set_rules('author', 'author', 'trim');
		
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$this->load->view('formTourAttrUI');
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
							'transport_price' => set_value('transport_price'),	
							'author' => set_value('author')								
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

	function cekinput(){
		//$emailErr = $commentErr = "";
			//$vemail = $comment = "";
			//$validEmail = $validComment = "";
			//if($_SERVER["REQUEST_METHOD"]=="POST"){

				function test_input($data){	
					$data = trim($data);
					$data = stripslashes($data);
					$data = htmlspecialchars($data);
					return $data;
				}
				
				$place_name = test_input($_POST["place_name"]);
				$weekday_price = test_input($_POST["weekday_price"]);
				$weekend_price = test_input($_POST["weekend_price"]);
				$longitude = test_input($_POST["longitude"]);
				$lattitude = test_input($_POST["lattitude"]);
				$city = test_input($_POST["city"]);
				$description = test_input($_POST["description"]);
				$place_info = test_input($_POST["place_info"]);
				$halte_code = test_input($_POST["halte_code"]);
				$transport_info = test_input($_POST["transport_info"]);
				$transport_price = test_input($_POST["transport_price"]);
				$category_name = test_input($_POST["category_name"]);
				$pic = test_input($_POST["pic"]);
				$pic_info = test_input($_POST["pic_info"]);
				$pic_info = test_input($_POST["author"]);
				
		echo $place_name;
	}


}