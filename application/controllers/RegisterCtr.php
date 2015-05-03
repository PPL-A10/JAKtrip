<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class RegisterCtr extends CI_Controller {
	
	function index(){
		$this->load->view('header');
		$this->load->view('registerUI');
		$this->load->view('footer');
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
			'username' => $username,
			'email' => $email,
			'is_admin' => 0,
			'join_date' => $currentTime,
			'last_active' => $currentTime,
			'password' => $password, //di-enkripsi? dulu
			'is_active' => 1
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