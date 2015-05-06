<?php

class PromoCtr extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('promoManager');
    }

    function index($title=null)
	{   
		$this->load->helper('cookie');
		$data['query'] = $this->promoManager->showAllPromo($title);
	
		$this->load->helper('html');


		$this->user = $this->facebook->getUser();
		if($this->user)
		{

			$data['user_profile'] = $this->facebook->api('/me/');
			$first_name = $data['user_profile']['first_name'];
			$foto_facebook = "https://graph.facebook.com/".$data['user_profile']['id']."/picture";
			if(get_cookie('username')!=null)
			{
				$this->load->view('header', $data);
				$this->load->view('PromoUI',$data);
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
			$this->load->view('PromoUI',$data);
			$this->load->view('footer');
		}
		// $this->load->view('header');
		// $this->load->view('PromoUI',$data);
		// $this->load->view('footer');
		//echo json_encode($data);
	}
}

?>