<?php

class FeedbackCtr extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('feedbackManager');
        $this->load->model('suggestionManager');
    }

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
				$this->load->view('formFeedbackUI');
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
			$this->load->view('formFeedbackUI');
			$this->load->view('footer');
		}
    }

    function submitForm()
	{   
		//Including validation library
		$this->load->library('form_validation');
        $this->load->helper('cookie');        
        $this->load->helper('form');
        
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		//kayanya ini set_rules('id dari view', 'nama coloumn di db', 'keterangan tambahan')
		
		//Validating Name Field
		$this->form_validation->set_rules('name', 'name', 'required');
		
		//Validating Email Field
		$this->form_validation->set_rules('email', 'email', 'required|valid_email');
		
		//Validating Subject Field
		// $this->form_validation->set_rules('subject', 'subject');
		
		//Validating Address Field
		$this->form_validation->set_rules('message', 'message', 'required');

		if ($this->form_validation->run() == FALSE)
		{

			$this->session->set_flashdata('form', array('message' => '<b>Oops!</b> Something went wrong. Please try again.'));

			$this->user = $this->facebook->getUser();
			if($this->user)
			{

				$data['user_profile'] = $this->facebook->api('/me/');
				$first_name = $data['user_profile']['first_name'];
				$foto_facebook = "https://graph.facebook.com/".$data['user_profile']['id']."/picture";
				if(get_cookie('username')!=null)
				{
					$this->load->view('header', $data);
					$this->load->view('formFeedbackUI');
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
				$this->load->view('formFeedbackUI');
				$this->load->view('footer');
			}
			// $this->load->view('header');
			// $this->load->view('formFeedbackUI');
			// $this->load->view('footer');
		}
		else
		{
			//Setting values for tabel columns
			$data = array(
                        'name' => $this->input->post('name'),
                        'email' => $this->input->post('email'),
                        'subject' => $this->input->post('subject'),
                        'message' => $this->input->post('message')
                    );
			

					//Transfering data to Model
                $this->feedbackManager->insert_feedback($data);
				$this->session->set_flashdata('form', array('message' => '<b>Thank you!</b> You successfully submitted your form.'));
        	

                    //Loading View
                $this->user = $this->facebook->getUser();
				if($this->user)
				{

					$data['user_profile'] = $this->facebook->api('/me/');
					$first_name = $data['user_profile']['first_name'];
					$foto_facebook = "https://graph.facebook.com/".$data['user_profile']['id']."/picture";
					if(get_cookie('username')!=null)
					{
						header("Location: ".base_url()."contactus");
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
					header("Location: ".base_url()."contactus");
				}
    //             $this->load->view('header');
				// $this->load->view('formFeedbackUI');
				// $this->load->view('footer');


        }


	}

}

?>