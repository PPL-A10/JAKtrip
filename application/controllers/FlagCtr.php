<?php

class FlagCtr extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('ratingManager');
    }

    function index($name=null)
	{   
		$this->load->library('form_validation');           
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('rate', 'rate', 'required');
		$this->form_validation->set_rules('review', 'review');
		$this->load->helper('cookie');
		if ($this->form_validation->run() == FALSE)
		{
			//$this->load->view('formRatingUI');
		}
		else
		{
			$name= str_replace("%20", " ",$name);
			$data = array(
						'username' => get_cookie("username"),
						'place_name' => $name,
                        'rate' => $this->input->post('rate'),
                        'title' => $this->input->post('title'),
                        'review' => $this->input->post('review')
//						'is_nudity' => $this->input->false,
//						'is_spam' => $this->input->false,
//						'is_FalseStatement' => $this->input->false,
//						'is_unrelatedStatement' => $this->input->false,
//						'is_profanity' => $this->input->false;
            );
					//Transfering data to Model
                    $this->ratingManager->insert_rating($data);
                    //Loading View
					//$this->load->view('formRatingUI');
         }		//Including validation library
		
	
		$this->load->helper('html');
		$this->load->model('DetailMod');
		$this->load->model('ReviewModel');
		$this->load->model('memberManager');
		$place = str_replace("%20", " ",$name);
		$user = get_cookie("username");
		$data['query3'] = $this->memberManager->showCollection($place, $user);
		$data['thisPlace'] = $place;
		$data['thisUser'] = $user;
		$data['query']= $this->DetailMod->showdetail($name);
		$data['query2']= $this->ReviewModel->showreviewtempat($name);

		$this->load->view('header');
		$this->load->view('FlagUI',$data);
		$this->load->view('footer');
		//echo json_encode($data);
	}
	
	    function rating($namatempat)
	{   
		$namatempat= str_replace("%20", " ",$namatempat);
		//Including validation library
		$this->load->library('form_validation');
                
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		//Validating Rating Field
		$this->form_validation->set_rules('rate', 'rate', 'required');
		
		//Validating Review Field
		$this->form_validation->set_rules('review', 'review');

		if ($this->form_validation->run() == FALSE)
		{
			//$this->load->view('AllplacesUI');
		}
		else
		{
			//Setting values for tabel columns
			$data = array(
						'username' => 'memberNo1',
						'place_name' => $namatempat,
                        'rate' => $this->input->post('rate'),
                        'title' => $this->input->post('title'),
                        'review' => $this->input->post('review')
//						'is_nudity' => $this->input->false,
//						'is_spam' => $this->input->false,
//						'is_FalseStatement' => $this->input->false,
//						'is_unrelatedStatement' => $this->input->false,
//						'is_profanity' => $this->input->false;
            );
					//Transfering data to Model
                    $this->ratingManager->insert_rating($data);
                    //Loading View
					//$this->load->view('AllplacesUI');
                   }
	}
	
	function spamreport($id,$name=null)
	{
		$this->load->library('table');
		$this->load->helper('html'); 
		$this->load->model('SpamManager');
		$reason = $_POST['spamreason'];
		foreach ($reason as $spamreason){
		if((int)$id != null){
			$this->SpamManager->updatespam($id,$spamreason);
		}
		/*if($spamreason == 'spam'){$this->SpamManager->updatespam($id);}
		if($spamreason == 'false_statement'){$this->SpamManager->updatespam($id);}
		if($spamreason == 'unrelated_content'){$this->SpamManager->updatespam($id);}
		if($spamreason == 'profanity'){$this->SpamManager->updatespam($id);}
		if($spamreason == 'nudity'){$this->SpamManager->updatespam($id);}*/
		}
		
		$this->load->library('form_validation');           
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('rate', 'rate', 'required');
		$this->form_validation->set_rules('review', 'review');
		$this->load->helper('cookie');
		if ($this->form_validation->run() == FALSE)
		{
			//$this->load->view('formRatingUI');
		}
		else
		{
			$name= str_replace("%20", " ",$name);
			$data = array(
						'username' => get_cookie("username"),
						'place_name' => $name,
                        'rate' => $this->input->post('rate'),
                        'title' => $this->input->post('title'),
                        'review' => $this->input->post('review')
//						'is_nudity' => $this->input->false,
//						'is_spam' => $this->input->false,
//						'is_FalseStatement' => $this->input->false,
//						'is_unrelatedStatement' => $this->input->false,
//						'is_profanity' => $this->input->false;
            );
					//Transfering data to Model
                    $this->ratingManager->insert_rating($data);
                    //Loading View
					//$this->load->view('formRatingUI');
         }		//Including validation library
		
	
		$this->load->helper('html');
		$this->load->model('DetailMod');
		$this->load->model('ReviewModel');
		$data['query']= $this->DetailMod->showdetail($name);
		$data['query2']= $this->ReviewModel->showreviewtempat($name);
		$this->load->view('header');
		$this->load->view('FlagUI',$data);
		$this->load->view('footer');
	}

	function addWishlist($place_name){
		$this->load->model('memberManager');
		$this->load->helper('cookie');
		$place_name= str_replace("%20", " ",$place_name);
		$check = mysql_query("SELECT is_wishlist FROM collection WHERE place_name = '".$place_name."'");

		if(mysql_num_rows($check)==0){
			$data = array(
				       	'place_name' => $place_name,
				       	'username' => get_cookie("username"),
				       	'is_wishlist' => '1'
					);
			$this->memberManager->addToWishlist($data);
		}
		else{
			$data = array(
				       	'is_wishlist' => '1'
					);
			$this->db->where('place_name', $place_name);
			$this->db->where('username', get_cookie("username"));
			$this->memberManager->updateWishlist($data);			
		}
		
		header("Location: ".base_url()."flag/".$place_name."");
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
		header("Location: ".base_url()."flag/".$place_name."");
	}

	function addVisited($place_name){
		$this->load->model('memberManager');
		$this->load->helper('cookie');
		$place_name= str_replace("%20", " ",$place_name);
		$check = mysql_query("SELECT is_visited FROM collection WHERE place_name = '".$place_name."'");

		if(mysql_num_rows($check)==0){
			$data = array(
				       	'place_name' => $place_name,
				       	'username' => get_cookie("username"),
				       	'is_visited' => '1'
					);
			$this->memberManager->addToVisited($data);
		}
		else{
			$data = array(
				       	'is_visited' => '1'
					);
			$this->db->where('place_name', $place_name);
			$this->db->where('username', get_cookie("username"));
			$this->memberManager->updateVisited($data);			
		}
		
		header("Location: ".base_url()."flag/".$place_name."");
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
		header("Location: ".base_url()."flag/".$place_name."");
	}


}

?>