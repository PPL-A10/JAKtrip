<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class RegisterCtr extends CI_Controller {
	
	function index(){
		$this->load->helper('cookie');
		$this->user = $this->facebook->getUser();
		if($this->user)
		{

			$data['user_profile'] = $this->facebook->api('/me/');
			$first_name = $data['user_profile']['first_name'];
			$foto_facebook = "https://graph.facebook.com/".$data['user_profile']['id']."/picture";
			if(get_cookie('username')!=null)
			{
				$this->load->view('header', $data);
				$this->load->view('registerUI');
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
			$this->load->view('registerUI');
			$this->load->view('footer');
		}
		// $this->load->view('header');
		// $this->load->view('registerUI');
		// $this->load->view('footer');
	}
	
	function addMember(){
		$this->load->model('memberMod');
		$this->load->helper('date');
		
		$name = $this->input->post('name');
	  	$username = $this->input->post('username');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$pass_confirm = $this->input->post('pass_confirm');
		$description = $this->input->post('description');
		$currentTime = mdate("%Y-%m-%d %H:%i:%s", now());
		//validation: password=pass_confirm, special char, username alr exist
		//if valid
		
		//name, desc blm ada di kolom database
		$form_data = array(
			'name' => $name,
			'username' => $username,
			'email' => $email,
			'is_admin' => 0,
			'join_date' => $currentTime,
			'last_active' => $currentTime,
			'password' => md5($password), //di-enkripsi? dulu
			'is_active' => 1,
			'bio' => $description,
		);
		
		if ($this->memberMod->create($form_data) == TRUE){ // the information has therefore been successfully saved in the db
			redirect('RegisterCtr/success');   // or whatever logic needs to occur
		}
		else{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
		}
	}
	
	function success()
	{
		redirect('register');	//nanti redirect ke hlm profil dia
	}
}