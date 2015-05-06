<?php 

	class homeCtr extends CI_Controller
	{
		public function index()
		{
		
			

			$this->load->model('HalteManager');
			$data['query'] = $this->HalteManager->sorthalte();
			$data['kodekoridor'] = $this->HalteManager->haltecode();

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
					$this->load->view('homeUI',$data);
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
				$this->load->view('homeUI',$data);
				$this->load->view('footer');
			}
		}

		public function successLoginFB()
		{
			//	echo "haha";
			// $this->load->helper('form');
			$this->load->model('HalteManager');
			$data['query'] = $this->HalteManager->sorthalte();
			$data['kodekoridor'] = $this->HalteManager->haltecode();
			// $data['query']= $this->tesModel->getDatabase();
			// $this->load->view('FormSearchUI',$data);
		// 	$data['query'] = $this->touristAttrManager->getDatabaseWithinBudget($budget);

			$this->load->view('header',$data);
			$this->load->view('homeUI',$data);
			$this->load->view('footer');
		}

	}	
?>
