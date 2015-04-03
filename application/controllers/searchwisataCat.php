<?php 
	class searchwisataCat extends CI_Controller
	{
	
		public function index($category_name)
		{
			$this->load->library('table');
			$this->load->helper('html'); 
			$this->load->model('searchMod');
			$data['query'] = $this->searchMod->filterMod($category_name);
			$this->load->view('searchView',$data);    
			//echo json_encode($data);
		}
	}	

	
?>