<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AddPromoCtr extends CI_Controller {
	
	function index(){
		$this->load->model('TouristAttractionManager');
		$this->load->model('PromoManager');
		$data['place'] = $this->TouristAttractionManager->getTouristAttraction()->result();
		$data['typepromo_name'] = $this->PromoManager->getTypes();;
		
		$this->load->helper('cookie');
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
			$this->load->view('formPromoUI', $data);
			$this->load->view('footer');
		}
		
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
		$this->form_validation->set_rules('place_name', 'place_name', 'trim|required');
		$this->form_validation->set_rules('description', 'description', 'trim');
		$this->form_validation->set_rules('photo', 'photo', 'required|trim');
		$this->form_validation->set_rules('type_name', 'type_name', 'trim');

		// $this->form_validation->set_error_delimiter('<br /><span class="error">', '</span>');

		/*$number_of_files = sizeof($_FILES['photo']['tmp_name']);
		//$files = $_FILES['photo'];
		//$errors = array();

		//for($i=0;$i<$number_of_files;$i++){
		 // if($_FILES['photo']['error'][$i] != 0) $errors[$i][] = 'Couldn\'t upload file '.$_FILES['photo']['name'][$i];
		//}

		if(sizeof($errors)==0){
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
   
			for ($i = 0; $i < $number_of_files; $i++){
				$_FILES['apic']['name'] = $files['name'][$i];
				$_FILES['apic']['type'] = $files['type'][$i];
				$_FILES['apic']['tmp_name'] = $files['tmp_name'][$i];
				$_FILES['apic']['error'] = $files['error'][$i];
				$_FILES['apic']['size'] = $files['size'][$i];
				//now we initialize the upload library
				$this->upload->initialize($config);
				// we retrieve the number of files that were uploaded
				if ($this->upload->do_upload('apic')){
					$data['upload_data'][$i] = $this->upload->data();
					$name = $data['upload_data'][$i]['file_name'];
					array_push($file_name, $name);
				}
				else{
				  //$data['upload_errors'][$i] = $this->upload->display_errors();
				}
			}
		}
	  
		$photo = array();
		foreach($file_name as $name){
		//echo $name;
			array_push($photo, 'http:\\\\localhost\\jaktrip\\assets\\'.$name);
		}*/
		
		$files = $_FILES['photo'];
		$image_path = './assets/upload/';
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']='1000';
			$config['max_width']='4096';
			$config['max_height']='4096';
			$this->load->library('upload',$config);
			$_FILES['apic']['name'] = $files['name'];
				$_FILES['apic']['type'] = $files['type'];
				$_FILES['apic']['tmp_name'] = $files['tmp_name'];
				$_FILES['apic']['error'] = $files['error'];
				$_FILES['apic']['size'] = $files['size'];
				//now we initialize the upload library
				$this->upload->initialize($config);
				
					if ($this->upload->do_upload('apic')){
					$data['upload_data'] = $this->upload->data();
					$name = $data['upload_data']['file_name'];
				}
				else{
				  //$data['upload_errors'][$i] = $this->upload->display_errors();
				}

	// // $place_info = $this->input->post('place_inform');
		// // if($place_info=='0'){
		// // 	$place_info=NULL;	
		// // }
	 // 	// build array for the model
		// $files = $_FILES['photo'];
		$old_startDate = $this->input->post('start_date');
		$o_startDate = strtotime($old_startDate);
		$old_endDate = $this->input->post('end_date');
		$o_endDate = strtotime($old_endDate);
		$form_data = array(
	       	'title' => $this->input->post('title'),
	       	'start_date' => date('m-d-Y', $o_startDate),
	       	'end_date' => date('m-d-Y', $o_endDate),
			'place_name' => $this->input->post('place_name'),
			'photo' => $photo,
			'description' => $this->input->post('description'),
			'photo' => set_value('photo')
		);

		$this->PromoManager->SaveForm($form_data);

		$fak = mysql_fetch_assoc(mysql_query("SELECT MAX(id_promo) FROM promo"));
		$form_type = array(
			'id_promo' => $fak["MAX(id_promo)"],
			'type_list' => $this->input->post('type_list'),
			'type_new' => $this->input->post('type_new')
		);

		$this->PromoManager->SaveFormType($form_type);

		redirect('AddPromoCtr/success');

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