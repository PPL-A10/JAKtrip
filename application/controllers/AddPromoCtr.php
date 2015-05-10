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
			setcookie("username_facebook", $data['user_profile']['first_name'], time()+3600, '/');
            setcookie("username",$data['user_profile']['id'], time()+3600, '/');
			setcookie("photo_facebook",$foto_facebook,time()+3600, '/');
			setcookie("is_admin",0,time()+3600,'/');
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

		}
		if (!$this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			//$this->load->view('HomeUI');
			$this->load->view('FormPromoUI', $error);
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