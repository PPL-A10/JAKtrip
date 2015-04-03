<?php 
	class searchCont extends CI_Controller
	{
		public function index()
		{
			$this->load->model('searchMod');
			$data['query']= $this->searchMod->showallwisata();
			$data['query1']= $this->searchMod->showallcategory();
			$data['query2']= $this->searchMod->showalllocation();
			$data['query3']= $this->searchMod->showallhalte();
			$this->load->view('searchView',$data);
		}

		public function searchwisataCatLocKey($category_name=NULL, $city=NULL, $place_name=NULL)
		{
			$this->load->library('table');
			$this->load->helper('html'); 
			$this->load->model('searchMod');
			$data['query'] = $this->searchMod->filterModFinal($category_name, $city, $place_name);
			//$this->load->view('searchView',$data);    
			echo json_encode($data);
		}
		
			public function searchwisataCat($category_name=NULL)
		{
			$this->load->library('table');
			$this->load->helper('html'); 
			$this->load->model('searchMod');
			$data['query'] = $this->searchMod->filterMod($category_name);
			//$this->load->view('searchView',$data);    
			echo json_encode($data);
		}
		
			public function searchwisataLoc($city=NULL)
		{
			$this->load->library('table');
			$this->load->helper('html'); 
			$this->load->model('searchMod');
			$data['query'] = $this->searchMod->filterMod2($city);
			//$this->load->view('searchView',$data);    
			echo json_encode($data);
		}
		
			public function searchwisataKey($place_name=NULL)
		{
			$this->load->library('table');
			$this->load->helper('html'); 
			$this->load->model('searchMod');
			$data['query'] = $this->searchMod->filterMod3($place_name);
			//$this->load->view('searchView',$data);    
			echo json_encode($data);
		}
	}	

	
?>