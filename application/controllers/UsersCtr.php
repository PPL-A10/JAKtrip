<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UsersCtr extends CI_Controller {
	

	function __construct() {
        parent::__construct();
       
    }
    
	function index(){
		$this->load->model('memberManager');
		$this->load->model('ratingManager');
		$this->load->helper('cookie');
		$user = get_cookie("username");
		$data['thisUser'] = $user;
		$data['wishlist'] = $this->memberManager->showWishlist($user);
		$data['visited'] = $this->memberManager->showVisited($user);
		$data['review'] = $this->ratingManager->showReview($user);
		$data['query'] = $this->touristAttractionManager->getTouristAttraction();
		$data['member'] = $this->memberManager->getMember($user);

		$this->load->helper('url');
		$this->load->model('touristAttractionManager');
		$this->load->model('TripManager');
		$data['query_trip'] = $this->TripManager->getDetailTrip($user);

		$this->user = $this->facebook->getUser();
		if($this->user)
		{

			$data['user_profile'] = $this->facebook->api('/me/');
			$first_name = $data['user_profile']['first_name'];
			$foto_facebook = "https://graph.facebook.com/".$data['user_profile']['id']."/picture";
			if(get_cookie('username')!=null)
			{
				$this->load->view('header', $data);
				$this->load->view('UserProfileUI', $data);
				$this->load->view('footer');
			}
			else
			{
				setcookie("username_facebook", $data['user_profile']['first_name'], time()+3600, '/');
                setcookie("username",$data['user_profile']['id'], time()+3600, '/');
				setcookie("photo_facebook",$foto_facebook,time()+3600, '/');
				header('Location: '.base_url('successLoginFB'));
			}
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

		$this->load->model('memberManager');
		$this->load->helper('cookie');
		$this->load->helper('security');
		$username = get_cookie("username");
		$member = $this->memberManager->getMember($username);
		$data['username'] = $username;
		$data['name'] = $member[0]->name;
		$data['email'] = $member[0]->email;
		$data['password'] = $member[0]->password;
		$data['description'] = $member[0]->bio;
		
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
				$this->load->view('EditProfileUI');
				$this->load->view('footer');
			}
			else
			{
				setcookie("username_facebook", $data['user_profile']['first_name'], time()+3600, '/');
				setcookie("username",$data['user_profile']['id'], time()+3600, '/');
				setcookie("photo_facebook",$foto_facebook,time()+3600, '/');
				header('Location: '.base_url('successLoginFB'));
			}
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

		
		// $this->load->view('header');
		// $this->load->view('EditProfileUI', $data);
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

	function remWishlist($id){
		$this->load->model('memberManager');
		$this->load->helper('cookie');
		$data = array(
				       	'is_wishlist' => '0'
					);
		$this->db->where('id_collect', $id);
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
	
	function remVisited($id){
		$this->load->model('memberManager');
		$this->load->helper('cookie');
		$data = array(
				       	'is_visited' => '0'
					);
		$this->db->where('id_collect', $id);
		$this->memberManager->delFromVisited($data);
		header("Location: ".base_url()."user");
	}

	function editMember(){
		$this->load->helper('cookie');
		$this->load->model('memberManager');
		$this->load->helper('date');
		
		if($this->input->post('form_profile')=='edit'){	
			$username = $this->input->post('username');
			$old_password = $this->input->post('old_password'); 
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$password = $this->input->post('new_password');
			$pass_confirm = $this->input->post('pass_confirm');
			$description = $this->input->post('description');
			$currentTime = mdate("%Y-%m-%d %H:%i:%s", now());
			//validation: password=pass_confirm, special char, username alr exist
			//if valid
			 
			if($password==''){
				$password=$old_password;
			}
			else{
				$password=md5($password);
			}
			
			//name, desc blm ada di kolom database
			$form_data = array(
				'name' => $name,
				'username' => $username,
				'email' => $email,
				'last_active' => $currentTime,
				'password' => $password,
				'is_active' => 1,
				'bio' => $description
			);
			
			if ($this->memberManager->editMember($username, $form_data) == TRUE){ // the information has therefore been successfully saved in the db
				redirect('UsersCtr/success/');   // or whatever logic needs to occur
			}
			else{
				echo 'An error occurred saving your information. Please try again later';
				// Or whatever error handling is necessary
			}
		}
		else{
			redirect('UsersCtr/deleteMember/');
		}
		
	}
	
	function success()
	{
		redirect('user/');	//nanti redirect ke hlm profil dia
	}
	
	public function deleteMember()
	{
		//kalau bukan akun facebook
		$this->load->helper('cookie');
		$this->load->model('memberMod');
		$name=get_cookie("username");
		if((string)$name != ""){
			$this->memberMod->delete($name);
		}
		redirect('searchCtr/logout');
		// $this->load->view('header');
		// $this->load->view('menuadmin');
		// $this->load->view('ManageMemberUI',$data);  
		// $this->load->view('footer');  
		//echo json_encode($data);
	}
	
}