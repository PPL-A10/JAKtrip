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
			if((int)$name != ""){
			$this->reviewMod->delete($name);
			}
			$data = $this->reviewMod->general();
			$data['query'] = $this->reviewMod->index();
			$this->load->view('reviewVi',$data);    
		}

	}	

	
?>
