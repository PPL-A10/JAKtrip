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
			if(get_cookie('username')!=null)
			{
				$this->load->view('header', $data);
				$this->load->view('menuadmin');
				$this->load->view('ManagePromoUI', $data);
				$this->load->view('footer');
			}
			else
			{
				setcookie("username",$first_name, time()+3600, '/');
				setcookie("photo_facebook",$foto_facebook,time()+3600, '/');
				header('Location: '.base_url('successLoginFB'));
			}
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
			if(get_cookie('username')!=null)
			{
				$this->load->view('header', $data);
				$this->load->view('menuadmin');
				$this->load->view('managePromoUI', $data);
				$this->load->view('footer');
			}
			else
			{
				setcookie("username",$first_name, time()+3600, '/');
				setcookie("photo_facebook",$foto_facebook,time()+3600, '/');
				header('Location: '.base_url('successLoginFB'));
			}
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
		
		$data['id_promo'] = $query['id_promo'];
		$data['title'] = $query['title'];
		$data['start_date'] = $query['start_date'];
		$data['end_date'] = $query['end_date'];
		$data['place_name'] = $query['place_name'];
		// $data['photo']['value'] = $query['photo'];
		$data['description'] = $query['description'];
		if($query['photo'] != NULL){
			$data['photo'] = $query['photo'];
		}
		else{
			$data['photo'] = NULL;
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
			if(get_cookie('username')!=null)
			{
				$this->load->view('header', $data);
				$this->load->view('menuadmin');
				$this->load->view('formPromoUI2',$data);
				$this->load->view('footer');
			}
			else
			{
				setcookie("username",$first_name, time()+3600, '/');
				setcookie("photo_facebook",$foto_facebook,time()+3600, '/');
				header('Location: '.base_url('successLoginFB'));
			}
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
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->model('PromoManager');

		$this->form_validation->set_rules('title', 'title', 'required|trim');
		$this->form_validation->set_rules('start_date', 'start_date', 'required|trim|callback_checkDateFormat');
		$this->form_validation->set_rules('end_date', 'end_date', 'required|trim|callback_checkDateFormat');
		$this->form_validation->set_rules('place_name', 'place_name', 'trim');
		$this->form_validation->set_rules('description', 'description', 'trim');
		$this->form_validation->set_rules('photo', 'photo', 'trim');
		$this->form_validation->set_rules('type_name', 'type_name', 'trim');
		
		$id_promo = $this->input->post('key');
		
		$config['upload_path'] = './assets/img/promo/';
		//$config['upload_path'] = './assets/upload/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1000';
		$config['max_width']  = '4096';
		$config['max_height']  = '4096';
		$this->load->library('upload', $config);
		//$this->upload->initialize($config);
		//$upload_data = $this->upload->data();
		
		$dir_exist = true; // flag for checking the directory exist or not
		if (!is_dir('./assets/img/promo/'))
		{
			mkdir('./assets/img/promo/', 0777, true);
			$dir_exist = false; // dir not exist
		}
		else{
			//do nothing
		}
		if (!$this->upload->do_upload()){
			$error = array('error' => $this->upload->display_errors());
			//$this->load->view('HomeUI');
			$this->load->view('FormPromoUI2', $error);
		}
		else{
			//$data = array('upload_data' => $this->upload->data());
			$upload_data = $this->upload->data();
			$file_name = $upload_data['file_name'];
			//echo $file_name;
			//$this->load->view('upload_success');
			//$this->load->view('upload_form');
		}

		$old_startDate = $this->input->post('start_date');
		$o_startDate = strtotime($old_startDate);
		$s_date = date('Y-m-d', $o_startDate);
		$old_endDate = $this->input->post('end_date');
		$o_endDate = strtotime($old_endDate);
		$e_date = date('Y-m-d', $o_endDate);
		$form_data = array(
	       	'title' => $this->input->post('title'),
	       	'start_date' => $s_date,
	       	'end_date' => $e_date,
			'place_name' => $this->input->post('place_name'),
			'photo' => './assets/img/promo/'.$file_name,
			'description' => $this->input->post('description'),
		);

		// $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE){ // validation hasn't been passed
			echo ""
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

		$this->PromoManager->SaveForm($form_data);

		// $fak = mysql_fetch_assoc(mysql_query("SELECT MAX(id_promo) FROM promo"));
		$form_type = array(
			// 'id_promo' => $fak["MAX(id_promo)"],
			'id_promo' => $id_promo,
			'type_list' => $this->input->post('type_list'),
			'type_new' => $this->input->post('type_new')
		);

		$this->PromoManager->SaveFormType($form_type);

		redirect('AddPromoCtr/success');

			$old_type = $this->PromoManager->promo_getType($id_promo);
			
			$form_type = array(
				'id_promo' => $id_promo,
				'type_list' => $type_list,
				'type_new' => $type_new,
				'type_old' => $old_type
			);
		}
			
		
	}

	function success()
	{
		redirect('ManagePromoCtr');	
	}
	
}