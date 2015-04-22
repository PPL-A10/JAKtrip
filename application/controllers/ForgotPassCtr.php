<?php 
	class ForgotPassCtr extends CI_Controller
	{
		
		public function index()
		{
				$this->load->view('header');
				$this->load->view('ForgotPassUI');
				$this->load->view('footer');
			
			
		}
	}	
?>
