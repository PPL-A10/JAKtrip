<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TourAttrCtr extends CI_Controller {
	
	function index(){
		$this->load->helper('date');
		$this->load->helper('cookie');
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

		
		$this->user = $this->facebook->getUser();
		if($this->user)
		{

			$data['user_profile'] = $this->facebook->api('/me/');
			$first_name = $data['user_profile']['first_name'];
			$foto_facebook = "https://graph.facebook.com/".$data['user_profile']['id']."/picture";
			if(get_cookie('username')!=null)
			{
				$this->load->view('header', $data);
				$this->load->view('menuadmin');
				$this->load->view('formTourAttrUI',$data);
				$this->load->view('footer');
			}
			else
			{
				setcookie("username_facebook", $data['user_profile']['first_name'], time()+3600, '/');
                setcookie("username",$data['user_profile']['id'], time()+3600, '/');
				setcookie("photo_facebook",$foto_facebook,time()+3600, '/');
				setcookie("is_admin",0,time()+3600,'/');
				header('Location: '.base_url('successLoginFB'));
			}
		}
		else
		{
			$data['login_url'] = $this->facebook->getLoginUrl();
			$this->load->view('header', $data);
			$this->load->view('menuadmin');
			$this->load->view('formTourAttrUI',$data);
			$this->load->view('footer');
		}
		// $this->load->view('header');
		// $this->load->view('menuadmin');
		// $this->load->view('formTourAttrUI',$data);
		// $this->load->view('footer');
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

	function myform(){
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
		$this->form_validation->set_rules('source', 'source', 'required|trim');
		$this->form_validation->set_rules('pic', 'pic', 'trim');
		$this->form_validation->set_rules('pic_info', 'pic_info', 'trim');
		//$this->form_validation->set_rules('author', 'author', 'trim');
		
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
		$this->load->helper('cookie');
		$placename = $this->input->post('place_name');
		$user = get_cookie("username");

		$config['upload_path'] = './assets/img/place/'.$placename;
		//$config['upload_path'] = './assets/upload/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1000';
		$config['max_width']  = '4096';
		$config['max_height']  = '4096';
		$this->load->library('upload', $config);
		//$this->upload->initialize($config);
		//$upload_data = $this->upload->data();
		
		$dir_exist = true; // flag for checking the directory exist or not
		if (!is_dir('./assets/img/place/'.$placename))
		{
			mkdir('./assets/img/place/'.$placename, 0777, true);
			$dir_exist = false; // dir not exist
		}
		else{

		}
		if (!$this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			//$this->load->view('HomeUI');
			$this->load->view('FormTourAttrUI', $error);
		}
		else
		{
			//$data = array('upload_data' => $this->upload->data());
			$upload_data = $this->upload->data();
			$file_name = $upload_data['file_name'];
			//echo $file_name;
			//$this->load->view('upload_success');
			//$this->load->view('upload_form');
		}

		$place_info = $this->input->post('place_inform');
		if($place_info=='0'){
			$place_info=NULL;
		}
	 	// build array for the model
			//echo $this->input->post('select_busstop');
			
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
			'visitors' => 0,
			'last_modified' => mdate("%Y-%m-%d %H:%i:%s", now()),
			'link_web' => $this->input->post('source'),
			'pic_thumbnail' => './assets/img/place/'.$placename.'/'.$file_name
		);

		$form_photo = array(
							'place_name' => $this->input->post('place_name'),
					       	'pic' => './assets/img/place/'.$placename.'/'.$file_name,
					       	'pic_info' => 'Uploaded by '.$user,
							'is_publish' => 0,
							'username' => $user
		);		
							
		$form_cat = array(
			'place_name' => $this->input->post('place_name'),
			'category_list' => $this->input->post('category_list'),
			'category_new' => $this->input->post('category_new')
		);							
									
		// run insert model to write data to db
		
		if ($this->TouristAttractionManager->SaveForm($form_data, $form_photo, $form_cat) == TRUE){ // the information has therefore been successfully saved in the db
			redirect('tourAttrCtr/success');   // or whatever logic needs to occur
		}
		else{
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