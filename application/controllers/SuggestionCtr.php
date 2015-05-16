<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SuggestionCtr extends CI_Controller {
	

	function __construct() {
        parent::__construct();
       
    }
    
	function index(){
		$this->load->model('suggestionManager');
		$this->load->helper('cookie');
		$data['query'] = $this->suggestionManager->showAllSuggestion();
		$tempQueryPhotoSuggestion = $this->suggestionManager->showAllPhotoSuggestion();
		$data['query2'] = $tempQueryPhotoSuggestion['dataResult'];
		$data['count_all'] = $tempQueryPhotoSuggestion['count'];
		$data['query3'] = $this->suggestionManager->getAllId();

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
				$this->load->view('SuggestionUI', $data);
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
			$this->load->view('menuadmin');
			$this->load->view('SuggestionUI', $data);
			$this->load->view('footer');
		}
		// $this->load->view('header');
		// $this->load->view('menuadmin');
		// $this->load->view('SuggestionUI', $data);
		// $this->load->view('footer');

	}

	function publish($id_pic){
		$this->load->model('suggestionManager');
		$this->suggestionManager->publishphoto($id_pic);
		//$data['query'] = $this->suggestionManager->showAllSuggestion();
		$data['query'] = $this->suggestionManager->showAllPhotoSuggestion();
		echo json_encode($data);
		//$this->load->view('header');
		//$this->load->view('menuadmin');
		//$this->load->view('SuggestionUI', $data);
		//$this->load->view('footer');
		
	}

	function suggestionPhotoPage($page)
	{
		$this->load->model('suggestionManager');
		$this->load->helper('cookie');
		$data['offset'] = ($page-1);
		$tempQueryPhotoSuggestion = $this->suggestionManager->showPhotoSuggestionPage($data);
		$data['query2'] = $tempQueryPhotoSuggestion['dataResult'];
		$data['count_all'] = $tempQueryPhotoSuggestion['count'];

		echo json_encode($data);
	}
}