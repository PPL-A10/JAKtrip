<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DelCtr extends CI_Controller 	{
		public function index()
		{
			$this->load->library('table');
			$this->load->helper('html'); 
			$this->load->model('SpamMod');
			//if((string)$name != ""){
			$this->SpamMod->delete();
			//}
			$data['query'] = $this->SpamMod->showspamreview();
			$this->load->view('SpamUI',$data);  
		}
		

	}	
