<?php

class AllPromosCtr extends CI_Controller {
	/*function __construct() {
        parent::__construct();
        $this->load->model('AllPlacesMod');
    }*/

    function index()
	{   
			$this->load->model('PromoManager');
			$this->load->helper('cookie');
			$data['query']= $this->PromoManager->showAllPromo();
			$data['query1']= $this->PromoManager->showType();

			$this->user = $this->facebook->getUser();
			if($this->user)
			{

				$data['user_profile'] = $this->facebook->api('/me/');
				$first_name = $data['user_profile']['first_name'];
				$foto_facebook = "https://graph.facebook.com/".$data['user_profile']['id']."/picture";
				if(get_cookie('username')!=null)
				{
					$this->load->view('header',$data);
					$this->load->view('allPromosUI',$data);
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
				$this->load->view('header',$data);
				$this->load->view('allPromosUI',$data);
				$this->load->view('footer');
			}
			// $this->load->view('header');
			// $this->load->view('allPromosUI',$data);
			// $this->load->view('footer');
	}
	
	public function searchpromoloc($city=NULL)
	{
			$this->load->library('table');
			$this->load->helper('html'); 
			$this->load->model('PromoManager');
			$data['query'] = $this->PromoManager->filterpromoloc($city);   
			echo json_encode($data);
	}
	
	public function searchpromokey($city=NULL, $title=NULL)
	{
		$this->load->library('table');
		$this->load->helper('html'); 
		$this->load->model('PromoManager');
		$data['query'] = $this->PromoManager->filterPromoFinal($city, $title);
		//$this->load->view('searchView',$data);    
		echo json_encode($data);
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
}

?>