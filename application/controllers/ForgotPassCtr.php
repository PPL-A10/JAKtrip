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

		function processForgotPassword()
		{
			/*@author wildan*/
			$this->load->model('memberManager');
			$this->load->helper('security');
			$this->load->helper('text');
			$this->load->helper('cookie');
			$data = array(
				'email' => $this->input->post('email')
			);
			$hasil['query'] = $this->memberManager->checkForgotPassword($data);	
			if($hasil['query']==false)
			{
				$this->user = $this->facebook->getUser();
				if($this->user)
				{

					$data['user_profile'] = $this->facebook->api('/me/');
					$first_name = $data['user_profile']['first_name'];
					$foto_facebook = "https://graph.facebook.com/".$data['user_profile']['id']."/picture";
					if(get_cookie('username')!=null)
					{
						$this->load->view('header',$data);
						$this->load->view('ForgotPassFailUI');
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
					$this->load->view('ForgotPassFailUI');
					$this->load->view('footer');
				}
			}
			else
			{
				
				//----------------set time---------------
			    $this->load->helper('date');
				date_default_timezone_set('Asia/Jakarta');
				$format = 'DATE_RFC850';
				$time = time();

				$date = standard_date($format, $time);
				$arrayDate = explode(" ", $date);
				
				//---------------end of set time---------------------

				//-----------------set email--------------------------
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

				//------------set password-----------
		    	$length = 8;
			    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
			    $password = substr( str_shuffle( $chars ), 0, $length );
			    $data['new_password'] = do_hash($password,'md5');

				//------------end of set password-------------
			    $this->memberManager->resetPassword($data);	

				$jam = intval($arrayDate[2]);
				$message = "";
				if($jam >= 18 || $jam < 6)
					$message = $message."Good evening";
				else if($jam >= 11)
					$message = $message."Good afternoon";
				else
					$message = $message."Good morning";

				$this->load->library('email', $config);
		      	$this->email->set_newline("\r\n");
		        $message = $message."\n\n Your password has been reset to ".$password;
		        $message = $message."\n Please change your password to keep you remembering your password";
		        $message = $message."\nThank you \n\nSincerelly, \n\n\n JAKtrip.net admin";
		        $message=(nl2br($message));
		      	$this->email->from('jaktrip.net@gmail.com'); // change it to yours
		      	$this->email->to('mohammad.syahid.wildan@gmail.com');// change it to yours
		      	$this->email->subject('Your New Password');
		      	$this->email->message($message);
		   
		   
			    if($this->email->send())
			    {
			      	$this->user = $this->facebook->getUser();
					if($this->user)
					{

						$data['user_profile'] = $this->facebook->api('/me/');
						$first_name = $data['user_profile']['first_name'];
						$foto_facebook = "https://graph.facebook.com/".$data['user_profile']['id']."/picture";
						if(get_cookie('username')!=null)
						{
							$this->load->view('header',$data);
							$this->load->view('ForgotPassSuccessUI');
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
						$this->load->view('ForgotPassSuccessUI');
						$this->load->view('footer');
					}
			    }
			    else
			    {
			     show_error($this->email->print_debugger());
			    }
			    //-----------------end of set email-------------------
				}
		}
		
	}	
?>
