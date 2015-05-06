<?php

class AllPlacesCtr extends CI_Controller {
	/*function __construct() {
        parent::__construct();
        $this->load->model('AllPlacesMod');
    }*/

    function index()
	{   
			$this->load->helper('form');
			$this->load->model('AllPlacesMod');
			$this->load->helper('cookie');
			$data['query']= $this->AllPlacesMod->showallplaces();
			$this->load->helper('form');
			$this->load->model('touristAttractionManager');

			
			$this->load->model('searchMod');
			$data['query4']= $this->searchMod->showallwisata();
			$data['query1']= $this->searchMod->showallcategory();
			$data['query2']= $this->searchMod->showalllocation();
			$data['query3']= $this->searchMod->showallhalte();

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
				$this->load->view('allPlacesUI',$data);
				$this->load->view('footer');
			}
			// $this->load->view('header');
			// $this->load->view('allPlacesUI',$data);
			// $this->load->view('footer');
	}
	
	public function searchwisataLoc($city=NULL)
	{
			$this->load->library('table');
			$this->load->helper('html'); 
			$this->load->model('AllplacesMod');
			$data['query'] = $this->AllplacesMod->filterMod2($city);
			//$this->load->view('searchView',$data);    
			echo json_encode($data);

			//$this->load->view('header');
			//$this->load->view('allPlacesUI',$data);
			//$this->load->view('footer');
	}
	
	public function searchwisataCatNam($category_name=NULL, $place_name=NULL)
	{
			$this->load->library('table');
			$this->load->helper('html'); 
			$this->load->model('AllplacesMod');
			$data['query'] = $this->AllplacesMod->filterMod1($category_name, $place_name);
			//$this->load->view('searchView',$data);    
			echo json_encode($data);

			//$this->load->view('header');
			//$this->load->view('allPlacesUI',$data);
			//$this->load->view('footer');
	}

			public function searchwisataCatLocKey($category_name=NULL, $city=NULL, $place_name=NULL)
		{
			$this->load->library('table');
			$this->load->helper('html'); 
			$this->load->model('AllplacesMod');
			$data['query'] = $this->AllplacesMod->filterModFinal($category_name, $city, $place_name);
			//$this->load->view('searchView',$data);    
			echo json_encode($data);
		}
		
			function popular($category_name=NULL, $city=NULL, $place_name=NULL)
    {
		$data   = array();
		$this->load->model('AllPlacesMod');
		$this->load->helper('url');
		$data1['query'] = $this->AllPlacesMod->getAllTourAttrPopular($category_name, $city, $place_name);
		//$this->load->view('FormSearchUI', $data1);
		echo json_encode($data1);
	}
	
	function highestRate($category_name=NULL, $city=NULL, $place_name=NULL)
    {
		$data   = array();
		$this->load->model('AllPlacesMod');
		$this->load->helper('url');
		$data1['query'] = $this->AllPlacesMod->getAllTourAttrHighestRate($category_name, $city, $place_name);
		//$this->load->view('SearchUI', $data1);
		echo json_encode($data1);
	}
	
	function sortAtoZ($category_name=NULL, $city=NULL, $place_name=NULL)
    {
		$data   = array();
		$this->load->model('AllPlacesMod');
		$this->load->helper('url');
		$data1['query'] = $this->AllPlacesMod->getAllTourAttrSortAtoZ($category_name, $city, $place_name);
		//$this->load->view('FormSearchUI', $data1);
		echo json_encode($data1);
	}
	
	function sortZtoA($category_name=NULL, $city=NULL, $place_name=NULL)
    {
		$data   = array();
		$this->load->model('AllPlacesMod');
		$this->load->helper('url');
		$data2['query'] = $this->AllPlacesMod->getAllTourAttrSortZtoA($category_name, $city, $place_name);
		//$this->load->view('FormSearchUI', $data2);
		echo json_encode($data2);
    }
	
	function LowToHigh($category_name=NULL, $city=NULL, $place_name=NULL)
    {
		$data   = array();
		$this->load->model('AllPlacesMod');
		$this->load->helper('url');
		$data3['query'] = $this->AllPlacesMod->getAllTourAttrSortLowToHigh($category_name, $city, $place_name);
		//$this->load->view('FormSearchUI', $data3);
		echo json_encode($data3);
    }
	
	function HighToLow($category_name=NULL, $city=NULL, $place_name=NULL)
    {
		$data   = array();
		$this->load->model('AllPlacesMod');
		$this->load->helper('url');
		$data4['query'] = $this->AllPlacesMod->getAllTourAttrSortHighToLow($category_name, $city, $place_name);
		//$this->load->view('FormSearchUI', $data4);
		echo json_encode($data4);
    }
	
	public function searchwisataprice($min, $max)
		{
			$this->load->library('table');
			$this->load->helper('html'); 
			$this->load->model('AllPlacesMod');
			$data['query'] = $this->AllPlacesMod->filterSliderMod($min, $max);
			//$this->load->view('searchView',$data);    
			echo json_encode($data);
		}

	function sendSuggestion(){
		$this->load->model('suggestionManager');
		$this->load->helper('cookie');
		$this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('place_name', 'place_name', 'required');
		$this->form_validation->set_rules('description', 'description', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			header("Location: ".base_url()."allplaces");
		}
		else
		{
			//Setting values for tabel columns
			$data2 = array(
						'username' => get_cookie("username"),
                        'place_name' => $this->input->post('place_name'),
                        'description' => $this->input->post('description')
                    );
			
                $this->suggestionManager->insertSuggestion($data2);
                
                header("Location: ".base_url()."allplaces");
        }
	}
}

?>