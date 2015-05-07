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
				if(get_cookie('username')!=null)
				{
					$this->load->view('header',$data);
					$this->load->view('ForgotPassUI');
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
				$this->load->view('header',$data);
				$this->load->view('ForgotPassUI');
				$this->load->view('footer');
			}
				// $this->load->view('header');
				// $this->load->view('ForgotPassUI');
				// $this->load->view('footer');
			
			
		}

		function sendMail()
		{
		    $config = Array(
			  'protocol' => 'smtp',
			  'smtp_host' => 'ssl://smtp.googlemail.com',
			  'smtp_port' => 465,
			  'smtp_user' => 'jaktrip.net@gmail.com', // change it to yours
			  'smtp_pass' => 'ppla10fasilkom', // change it to yours
			  'mailtype' => 'html',
			  'charset' => 'iso-8859-1',
			  'wordwrap' => TRUE
			);

	        $message = 'this is your new password';
	        $this->load->library('email', $config);
	      	$this->email->set_newline("\r\n");
	      	$this->email->from('jaktrip.net@gmail.com'); // change it to yours
	      	$this->email->to('mohammad.syahid.wildan@gmail.com');// change it to yours
	      	$this->email->subject('Your New Password');
	      	$this->email->message($message);
		    
		    if($this->email->send())
		    {
		      echo 'Email sent.';
		    }
		    else
		    {
		     show_error($this->email->print_debugger());
		    }

		}

		function randomPassword() {
		    $length = 8;
		    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		    $password = substr( str_shuffle( $chars ), 0, $length );
		   	print_r($password);
		}
	}	
?>
