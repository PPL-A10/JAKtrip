<?php 
	class ForgotPassCtr extends CI_Controller
	{
		
		public function index()
		{
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
				$this->load->view('header',$data);
				$this->load->view('ForgotPassUI');
				$this->load->view('footer');
			}
				// $this->load->view('header');
				// $this->load->view('ForgotPassUI');
				// $this->load->view('footer');
			
			
		}
	}	
?>
