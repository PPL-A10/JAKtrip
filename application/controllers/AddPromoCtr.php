<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AddPromoCtr extends CI_Controller {
	
	function index(){
		$this->load->model('TouristAttractionManager');
		$this->load->model('PromoManager');
		$data['place'] = $this->TouristAttractionManager->getTouristAttraction()->result();
		$data['typepromo_name'] = $this->PromoManager->getTypes();;
		
		$this->load->view('header');
		$this->load->view('menuadmin');
		$this->load->view('formPromoUI', $data);
		$this->load->view('footer');
	}

	function myForm(){
		$this->load->helper('cookie');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->model('PromoManager');

		$this->form_validation->set_rules('title', 'title', 'required|trim');
		$this->form_validation->set_rules('start_date', 'start_date', 'required|trim|callback_checkDateFormat');
		$this->form_validation->set_rules('end_date', 'end_date', 'required|trim|callback_checkDateFormat');
		$this->form_validation->set_rules('place_name', 'place_name', 'trim');
		$this->form_validation->set_rules('description', 'description', 'trim');
		$this->form_validation->set_rules('type_promo', 'type_promo', '');
		$this->form_validation->set_rules('photo', 'photo', 'trim');

		//$this->form_validation->set_error_delimiter('<br /><span class="error">', '</span>');

		// $number_of_files = sizeof($_FILES['photo']['tmp_name']);
		// $files = $_FILES['photo'];
		// $erors = array();

		// for($i=0;$i<number_of_files;$i++){
		// 	if($_FILES['photo']['error'][$i] != 0){
		// 		$errors[$i][] = 'Couldn\'t upload file '.$_FILES['photo']['name'][$i];
		// 	}
		// }
		// if(sizeof($errors)==0){
		// 	// now, taking into account that there can be more than one file, for each file we will have to do the upload
		//   	// we first load the upload library
		//   	//$this->load->library('upload');
		//   	// next we pass the upload path for the images
		//   	$image_path = realpath(APPPATH . '../assets/');
		// 	$config['upload_path'] = $image_path;
		// 	$config['allowed_types'] = 'gif|jpg|png';
		// 	$config['max_size']='1000';
		// 	$config['max_width']='4096';
		// 	$config['max_height']='4096';
		// 	$this->load->library('upload',$config);
		// 	//$this->upload->initialize($config);

		// 	$file_name = array();
   
		// 	for ($i = 0; $i < $number_of_files; $i++){
		// 		$_FILES['apic']['name'] = $files['name'][$i];
		// 		$_FILES['apic']['type'] = $files['type'][$i];
		// 		$_FILES['apic']['tmp_name'] = $files['tmp_name'][$i];
		// 		$_FILES['apic']['error'] = $files['error'][$i];
		// 		$_FILES['apic']['size'] = $files['size'][$i];
		// 		//now we initialize the upload library
		// 		$this->upload->initialize($config);
		// 		// we retrieve the number of files that were uploaded
		// 		if ($this->upload->do_upload('apic')){
		// 		  	$data['upload_data'][$i] = $this->upload->data();
		// 		  	$name = $data['upload_data'][$i]['file_name'];
		// 		  	array_push($file_name, $name);
		// 		}
		// 		else{
		// 		  //$data['upload_errors'][$i] = $this->upload->display_errors();
		// 		}
		// 	}
		// }

		// // $photo = array();
		// foreach($file_name as $name){
		// 	array_push($photo, 'http:\\\\localhost\\jaktrip\\assets\\'.$name);
		// }

	// // $place_info = $this->input->post('place_inform');
		// // if($place_info=='0'){
		// // 	$place_info=NULL;	
		// // }
	 // 	// build array for the model
		$photo = "belum ada";
		$form_data = array(
	       	'title' => $this->input->post('title'),
	       	'start_date' => $this->input->post('start_date'),
	       	'end_date' => $this->input->post('end_date'),
			'place_name' => $this->input->post('place_name'),
			'photo' => $photo,
			'description' => $this->input->post('description')
		);

		$form_type = array(
			'id_promo' => $this->PromoManager->getLastIdPromo(),
			'type_list' => $this->input->post('type_list'),
			'type_new' => $this->input->post('type_new')
		);

		if($this->PromoManager->SaveForm($form_data) == TRUE){ // the information has therefore been successfully saved in the db
			if($this->PromoManager->SaveFormType($form_type) == TRUE){
				redirect('AddPromoCtr/success');   // or whatever logic needs to occur
			}
			else{
				echo 'An error occurred saving your information. Please try again later';
			}
		}
		else{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
		}

	}

	#callback
	function checkDateFormat($date){
		if (preg_match("/[0-31]{2}\/[0-12]{2}\/[0-9]{4}/", $date)) {
			if(checkdate(substr($date, 3, 2), substr($date, 0, 2), substr($date, 6, 4)))
				return true;
			else
				return false;
		} else{
			return false;
		}
	}

	function success()
	{
		redirect('admin/promo');	
	}
}