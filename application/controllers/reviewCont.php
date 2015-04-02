<?php 
	class reviewCont extends CI_Controller
	{
		public function index()
		{
			$this->load->model('reviewMod');
			$data['query']= $this->reviewMod->showallreview();
			$this->load->view('reviewVi',$data);
		}
		
		public function del($name)
		{
			$this->load->library('table');
			$this->load->helper('html'); 
			$this->load->model('reviewMod');
			if((string)$name != ""){
			$this->reviewMod->delete($name);
			}
			$data['query'] = $this->reviewMod->showallreview();
			$this->load->view('reviewVi',$data);    
		}

	}	

	
?>
