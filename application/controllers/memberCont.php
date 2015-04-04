<?php 
	class memberCont extends CI_Controller
	{
		public function index()
		{
		//	$this->load->helper('form');
			$this->load->model('tes123');
			$data['query']= $this->tes123->showallmember();
			
			$this->load->view('memberView',$data);
		}
	}	

	
?>
