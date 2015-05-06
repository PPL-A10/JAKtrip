<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UsersCtr extends CI_Controller {
	

	function __construct() {
        parent::__construct();
       
    }
    
	function index(){
		$this->load->model('memberManager');
		$this->load->helper('cookie');
		$user = get_cookie("username");
		$data['thisUser'] = $user;
		$data['wishlist'] = $this->memberManager->showWishlist($user);
		$data['visited'] = $this->memberManager->showVisited($user);
		$data['query'] = $this->touristAttractionManager->getTouristAttraction();


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
			$this->load->view('UserProfileUI', $data);
			$this->load->view('footer');
		}
		// $this->load->view('header');
		// $this->load->view('UserProfileUI', $data);
		// $this->load->view('footer');
	}

	function edit(){
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
			$this->load->view('header', $data);
			$this->load->view('EditProfileUI');
			$this->load->view('footer');
		}
		// $this->load->view('header');
		// $this->load->view('EditProfileUI');
		// $this->load->view('footer');
	}

	function removeWishlist($place_name){
		$this->load->model('memberManager');
		$this->load->helper('cookie');
		$place_name= str_replace("%20", " ",$place_name);
		$data = array(
				       	'is_wishlist' => '0'
					);
		$this->db->where('place_name', $place_name);
		$this->db->where('username', get_cookie("username"));
		$this->memberManager->delFromWishlist($data);
		header("Location: ".base_url()."user");
	}

	function removeVisited($place_name){
		$this->load->model('memberManager');
		$this->load->helper('cookie');
		$place_name= str_replace("%20", " ",$place_name);
		$data = array(
				       	'is_visited' => '0'
					);
		$this->db->where('place_name', $place_name);
		$this->db->where('username', get_cookie("username"));
		$this->memberManager->delFromVisited($data);
		header("Location: ".base_url()."user");
	}
	
}