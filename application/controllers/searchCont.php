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

		/*public function searchwisataCat($category_name, $city_name, $place_name)
		{
			$this->load->library('table');
			$this->load->helper('html'); 
			$this->load->model('searchMod');
			$data['query'] = $this->searchMod->filterMod($category_name, $city_name, $place_name);
			//$this->load->view('searchView',$data);    
			echo json_encode($data);
		}*/
		
				public function searchwisataCat($category_name)
		{
			$this->load->library('table');
			$this->load->helper('html'); 
			$this->load->model('searchMod');
			$data['query'] = $this->searchMod->filterMod($category_name);
			//$this->load->view('searchView',$data);    
			echo json_encode($data);
		}
	}	

	
?>