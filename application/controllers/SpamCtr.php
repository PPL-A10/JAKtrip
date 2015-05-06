<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SpamCtr extends CI_Controller {
	

	function __construct() {
        parent::__construct();
        //$this->load->model('SpamManager');
       
    }
    
	function index(){
		$this->load->model('SpamMod');
		$data['query']= $this->SpamMod->showspamreview();
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
				$this->load->view('menuadmin');
				$this->load->view('spamUI', $data);
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
			$this->load->view('spamUI', $data);
			$this->load->view('footer');
		}
		// $this->load->view('header');
		// $this->load->view('menuadmin');
		// $this->load->view('spamUI', $data);
		// $this->load->view('footer');
	}

	public function del($id)
		{
			$this->load->library('table');
			$this->load->helper('html'); 
			$this->load->helper('cookie');
			$this->load->model('SpamMod');
			if((int)$id != null){
			$this->SpamMod->delete($id);
			}
			$data['query'] = $this->SpamMod->showspamreview();

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
					$this->load->view('SpamUI',$data);    
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
				$this->load->view('SpamUI',$data);    
				$this->load->view('footer');
			}
			// $this->load->view('header');
			// $this->load->view('menuadmin');
			// $this->load->view('SpamUI',$data);    
			// $this->load->view('footer');
		}
		
		public function coba()
		{
			$this->load->library('table');
			$this->load->helper('html'); 
			$this->load->helper('cookie');
			$this->load->model('SpamMod');
			$data1 = $this->input->post('check_list');
			if (is_array($data1))
			{
				foreach ($data1 as $key => $value)
				{
					$this->SpamMod->delete($value);
				}
			}
			$data['query'] = $this->SpamMod->showspamreview();

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
					$this->load->view('SpamUI',$data);
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
				$this->load->view('SpamUI',$data);
				$this->load->view('footer');
			}
			// $this->load->view('header');
			// $this->load->view('menuadmin');
			// $this->load->view('SpamUI',$data);
			// $this->load->view('footer');
		}

}