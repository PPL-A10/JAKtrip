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
	}	

	
?>
