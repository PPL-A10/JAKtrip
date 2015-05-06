<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ManageMemberCtr extends CI_Controller {
	

	function __construct() {
        parent::__construct();
       // $this->load->model('MemberManager');
       
    }
    
	function index(){
		
		$this->load->model('memberMod');
		$this->load->helper('cookie');
		$data['query']= $this->memberMod->showallmember();

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
			$this->load->view('header', $data);
			$this->load->view('menuadmin');
			$this->load->view('ManageMemberUI',$data);
			$this->load->view('footer');
		}
		// $this->load->view('header');
		// $this->load->view('menuadmin');
		// $this->load->view('ManageMemberUI',$data);
		// $this->load->view('footer');
	}

	public function del($name)
	{
		$this->load->library('table');
		$this->load->helper('html'); 
		$this->load->helper('cookie');
		$this->load->model('memberMod');
		if((string)$name != ""){
		$this->memberMod->delete($name);
		}
		$data['query'] = $this->memberMod->showallmember();

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
			$this->load->view('header', $data);
			$this->load->view('menuadmin');
			$this->load->view('ManageMemberUI',$data);  
			$this->load->view('footer');  
		}
		// $this->load->view('header');
		// $this->load->view('menuadmin');
		// $this->load->view('ManageMemberUI',$data);  
		// $this->load->view('footer');  
		//echo json_encode($data);
	}

	public function searchwisataKey($place_name=NULL)
	{
		$this->load->library('table');
		$this->load->helper('html'); 
		$this->load->model('memberMod');
		$data['query'] = $this->memberMod->filterMod3($place_name);
		//$this->load->view('searchView',$data);    
		echo json_encode($data);
	}
	
		public function searchwisataKey2($place_name=NULL)
	{
		$this->load->library('table');
		$this->load->helper('html'); 
		$this->load->model('memberMod');
		$data['query'] = $this->memberMod->filterMod5($place_name);
		//$this->load->view('searchView',$data);    
		echo json_encode($data);
	}
}