<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ManagePromoCtr extends CI_Controller {
	public function __construct(){
        parent::__construct();
    }

	function index() {
		$this->load->library('table');
		$this->load->helper('html');
		$this->load->model('PromoManager');
		$this->load->helper('cookie');

		$query = $this->PromoManager->promo_getall();
		$type_list = array();
		
		foreach($query as $id){
			$id_promo = $id->id_promo;
			$query2 = $this->PromoManager->promo_getType($id_promo);
			$type='';
			foreach($query2 as $row){
				if($type==''){
					$type=$type.$row->type_name;
				}
				else{
					$type=$type.', '.$row->type_name;				
				}

			}
			array_push($type_list, $type);
		}

		$data['type_'] = $type_list;
		$data['promo'] = $query;

		$this->user = $this->facebook->getUser();
		if($this->user)
		{

			$data['user_profile'] = $this->facebook->api('/me/');
			$first_name = $data['user_profile']['first_name'];
			$foto_facebook = "https://graph.facebook.com/".$data['user_profile']['id']."/picture";
			setcookie("username",$first_name, time()+3600, '/');
			setcookie("photo_facebook",$foto_facebook,time()+3600, '/');
			header('Location: '.base_url('index.php/homeCtr/successLoginFB'));
		}
		else
		{
			$data['login_url'] = $this->facebook->getLoginUrl();
			$this->load->view('header', $data);
			$this->load->view('menuadmin');
			$this->load->view('ManagePromoUI', $data);
			$this->load->view('footer');
		}
		// $this->load->view('header');
		// $this->load->view('menuadmin');
		// $this->load->view('ManagePromoUI', $data);
		// $this->load->view('footer');
	}

	function del($id_promo){
		$this->load->library('table');
		$this->load->helper('html');
		$this->load->model('PromoManager');
		$this->load->helper('cookie');

		if($id_promo != NULL){
			$this->PromoManager->delete($id_promo);
		}

		$query = $this->PromoManager->promo_getall();
		$type_list = array();
		
		foreach($query as $id){
			$id_promo = $id->id_promo;
			$query2 = $this->PromoManager->promo_getType($id_promo);
			$type='';
			foreach($query2 as $row){
				if($type==''){
					$type=$type.$row->type_name;
				}
				else{
					$type=$type.', '.$row->type_name;				
				}

			}
			array_push($type_list, $type);
		}

		$data['type_'] = $type_list;
		$data['promo'] = $query;
		$data['query'] = $this->PromoManager->promo_getall();


		$this->user = $this->facebook->getUser();
		if($this->user)
		{

			$data['user_profile'] = $this->facebook->api('/me/');
			$first_name = $data['user_profile']['first_name'];
			$foto_facebook = "https://graph.facebook.com/".$data['user_profile']['id']."/picture";
			setcookie("username",$first_name, time()+3600, '/');
			setcookie("photo_facebook",$foto_facebook,time()+3600, '/');
			header('Location: '.base_url('index.php/homeCtr/successLoginFB'));
		}
		else
		{
			$data['login_url'] = $this->facebook->getLoginUrl();
			$this->load->view('header', $data);
			$this->load->view('menuadmin');
			$this->load->view('managePromoUI', $data);
			$this->load->view('footer');
		}
		// $this->load->view('header');
		// $this->load->view('menuadmin');
		// $this->load->view('managePromoUI', $data);
		// $this->load->view('footer');
	}

	function edit($id_promo){
		$this->load->library('table');
		$this->load->helper('html');
		$this->load->helper('form');
		$this->load->helper('cookie');
		$this->load->model('PromoManager');
		$this->load->model('TouristAttractionManager');
		
		$query = $this->PromoManager->promo_get($id_promo);
		//$query2 = $this->PromoManager->promo_getCat($id_promo);
		// $query3 = $this->PromoManager->promo_getPic($id_promo); //ga perlu
		$data['lala'] = $this->TouristAttractionManager->getTouristAttraction()->result();
		// // $this->load->model('searchMod');
		// $data['query2']= $this->searchMod->showalllocation();
		// $this->load->model('HalteManager');
		// $data['query'] = $this->HalteManager->getAllHalte();
		// $data['admin'] = $this->TouristAttractionManager->getAdmin();
		
		$data['title']['value'] = $query['title'];
		$data['start_date']['value'] = $query['start_date'];
		$data['end_date']['value'] = $query['end_date'];
		$data['place_name']['value'] = $query['place_name'];
		// $data['photo']['value'] = $query['photo'];
		$data['description']['value'] = $query['description'];
		if($query['photo'] != NULL){
			$data['photo']['value'] = $query['photo'];
		}
		else{
			$data['photo']['value'] = NULL;
		}

		$result = $this->PromoManager->getTypes();
		
		$type_checked=$this->isType($id_promo);
		
		
		$data['type_nam']=$result;
		$data['type_checked']['value']=$type_checked;
		
		//dropdown list place_info
		
		$dd_place = array();
		array_push($dd_place, NULL);
		$result2 = $this->TouristAttractionManager->getTouristAttraction();
	
		foreach($result2->result_array() as $place){
			$dd_place[$place['place_name']] = $place['place_name'];
		}
		
		$data['place_inf']=$dd_place;

		$this->user = $this->facebook->getUser();
		if($this->user)
		{

			$data['user_profile'] = $this->facebook->api('/me/');
			$first_name = $data['user_profile']['first_name'];
			$foto_facebook = "https://graph.facebook.com/".$data['user_profile']['id']."/picture";
			setcookie("username",$first_name, time()+3600, '/');
			setcookie("photo_facebook",$foto_facebook,time()+3600, '/');
			header('Location: '.base_url('index.php/homeCtr/successLoginFB'));
		}
		else
		{
			$data['login_url'] = $this->facebook->getLoginUrl();
			$this->load->view('header', $data);
			$this->load->view('menuadmin');
			$this->load->view('formPromoUI2',$data);
			$this->load->view('footer');
		}
		// $this->load->view('header');
		// $this->load->view('menuadmin');
		// $this->load->view('formPromoUI2',$data);
		// $this->load->view('footer');
	}

	function isType($id_promo){
		$result = $this->PromoManager->getTypes();
		$result1 = $this->PromoManager->promo_getType($id_promo);
		
		$type_checked=array();
		if($result1==NULL){
			for($i=0; $i<count($result); $i++){
				array_push($type_checked, FALSE);
			}
		}
		else{
			for($i=0; $i<count($result); $i++){
				$is_checked = FALSE;
				foreach($result1 as $row){
					if($row->type_name==$result[$i]->type_name){
						$is_checked = TRUE;
					}
				}
				array_push($type_checked, $is_checked);
			}
		}
		return $type_checked;
	}

	function myForm(){
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
		$id_promo = $this->input->post('key');
		
	   	$title = $this->input->post('title');
	   	$start_date = $this->input->post('start_date');
		$end_date = $this->input->post('end_date');
		$place_name = $this->input->post('place_name');
		// $photo = $this->input->post('photo');
		$description = $this->input->post('description');
		 
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE){ // validation hasn't been passed
			redirect ('ManagePromoCtr/edit/'.$id_promo);
		}
		else{ // passed validation proceed to post success logic
		 	// build array for the model
			$form_data = array(
				'title' => $title,
				'start_date' => $start_date,
				'end_date' => $end_date,
				'place_name' => $place_name,
				'description' => $description,
				'photo' => $this->input->post('photo')						
			);

			// $form_photo = array(
			// 				'place_name' => $place_name,
			// 				'pic' => $this->input->post('pic'),
			// 				'pic_info' =>$this->input->post('pic_info')
			// 			);		
			
			$old_type = $this->PromoManager->promo_getType($id_promo);
			
			$form_type = array(
				'id_promo' => $id_promo,
				'type_list' => $type_list,
				'type_new' => $type_new,
				'type_old' => $old_type
			);							
								
			//$dat['category_list']=$category_list;
			
			// run insert model to write data to db
			
			//echo "TEST ".$category_new;
			
			if ($this->PromoManager->edit($id_promo, $form_data, $form_type) == TRUE){ // the information has therefore been successfully saved in the db
				//$this->load->view('formTourAttrUI', $dat);
				redirect('ManagePromoCtr/success');   // or whatever logic needs to occur
			}
			else{
				echo 'An error occurred saving your information. Please try again later';
				 //Or whatever error handling is necessary
			}
		}
			
		
	}

	function success()
	{
		redirect('ManagePromoCtr');	
	}
	
}