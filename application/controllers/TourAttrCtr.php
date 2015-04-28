<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TourAttrCtr extends CI_Controller {
	
	function index(){
		$this->load->helper('date');


		$this->load->model('TouristAttractionManager');
		$this->load->model('HalteManager');
		$this->load->model('searchMod');
		//$this->load->model('guest_model');
		//$data = $this->TouristAttractionManager->general();
		//$data['query'] = $this->touristattractionmanager->tourAttr_getall();
		$this->load->helper('form');
		
		 //dropdown list category
		//$dd_cat = array();
		$result = $this->TouristAttractionManager->getCategory();
		$data['query'] = $this->HalteManager->getAllHalte();
		$data['query2']= $this->searchMod->showalllocation();
		$data['place'] = $this->TouristAttractionManager->getTouristAttraction()->result();
		$data['admin'] = $this->TouristAttractionManager->getAdmin();
		//foreach($result->result_array() as $cat){
			//$dd_cat[$cat['category_name']] = $cat['category_name'];
		//}
		$data['cat_name']=$result;
		//dropdown list place_info
		
		//$dd_place = array();
		//array_push($dd_place, NULL);
		//$result2 = $this->TouristAttractionManager->getTouristAttraction();
		//foreach($result2->result_array() as $place){
		//	$dd_place[$place['place_name']] = $place['place_name'];
		//}
		//$data['place_info']=$dd_place;
		
		//dropdown list halte
		$dd_halte = array();
		$result3 = $this->TouristAttractionManager->getHalte();
		foreach($result3->result_array() as $halte){
			$dd_halte[$halte['halte_code']] = $halte['halte_name'];
		}
		$data['halte_name']=$dd_halte;
		
		$this->load->view('header');
		$this->load->view('menuadmin');
		$this->load->view('formTourAttrUI',$data);
		$this->load->view('footer');
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
		$this->load->helper('cookie');
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
	
		$number_of_files= sizeof($_FILES['pic']['tmp_name']);

		$files = $_FILES['pic'];
		$errors = array();
 
		// first make sure that there is no error in uploading the files
		for($i=0;$i<$number_of_files;$i++)
		{
		  if($_FILES['pic']['error'][$i] != 0) $errors[$i][] = 'Couldn\'t upload file '.$_FILES['pic']['name'][$i];
		}
		if(sizeof($errors)==0)
		{
		  // now, taking into account that there can be more than one file, for each file we will have to do the upload
		  // we first load the upload library
		  //$this->load->library('upload');
		  // next we pass the upload path for the images
		  $image_path = realpath(APPPATH . '../assets/');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']='1000';
			$config['max_width']='4096';
			$config['max_height']='4096';
			$this->load->library('upload',$config);
			//$this->upload->initialize($config);
		  
			$file_name = array();
   
			for ($i = 0; $i < $number_of_files; $i++) {
				$_FILES['apic']['name'] = $files['name'][$i];
				$_FILES['apic']['type'] = $files['type'][$i];
				$_FILES['apic']['tmp_name'] = $files['tmp_name'][$i];
				$_FILES['apic']['error'] = $files['error'][$i];
				$_FILES['apic']['size'] = $files['size'][$i];
				//now we initialize the upload library
				$this->upload->initialize($config);
				// we retrieve the number of files that were uploaded
				if ($this->upload->do_upload('apic'))
				{
				  $data['upload_data'][$i] = $this->upload->data();
				  $name = $data['upload_data'][$i]['file_name'];
				  array_push($file_name, $name);
				}
				else
				{
				  //$data['upload_errors'][$i] = $this->upload->display_errors();
				}
			}
		}
	  
		$photo = array();
		foreach($file_name as $name){
		//echo $name;
			array_push($photo, 'http:\\\\localhost\\jaktrip\\assets\\'.$name);
		}
		
	
			$place_info = $this->input->post('place_inform');
			if($place_info=='0'){

				$place_info=NULL;
			}
		 	// build array for the model
			
			$form_data = array(
					       	'place_name' => $this->input->post('place_name'),
					       	'weekday_price' => $this->input->post('weekday_price'),
					       	'weekend_price' => $this->input->post('weekend_price'),
							'longitude' => $this->input->post('longitude'),
							'lattitude' => $this->input->post('lattitude'),
							'city' => $this->input->post('select_location'),
							'rate_avg' => 0,
							'description' => $this->input->post('description'),
							'place_info' => $place_info,
							//'halte_code' => $this->input->post('halte_code'),
							'halte_code' =>$this->TouristAttractionManager->gethaltekode($this->input->post('select_busstop')),
							'transport_info' => $this->input->post('transport_info'),
							'transport_price' => $this->input->post('transport_price'),	
							'author' => get_cookie("username"),
							//'nearest_bus_stop' => $this->input->post('select_busstop'),
							'hits' => 0,
							'last_modified' => mdate("%Y-%m-%d %H:%i:%s", now())
						);

			$form_photo = array(
							'place_name' => set_value('place_name'),
							//'pic' => set_value('pic'),
							//'pic' => $image_path.'\\'.$file_name,
							'pic' => $photo,
							'pic_info' => set_value('pic_info')
						);		
							
			$form_cat = array(
							'place_name' => $this->input->post('place_name'),
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
		redirect('admin/places');	
	}

}