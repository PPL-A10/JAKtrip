<?php 
	class memberCont extends CI_Controller
	{
		public function index()
		{
		//	$this->load->helper('form');
			$this->load->model('memberMod');
			$data['query']= $this->memberMod->showallmember();
			
			$this->load->view('memberView',$data);
		}
		
		public function del($name)
		{
			$this->load->library('table');
			$this->load->helper('html'); 
			$this->load->model('memberMod');
			if((string)$name != ""){
			$this->memberMod->delete($name);
			}
			$data['query'] = $this->memberMod->showallmember();
			$this->load->view('memberView',$data);    
		}
	}	

	
?>
