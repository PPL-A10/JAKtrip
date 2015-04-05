<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SpamCtr extends CI_Controller 	{
		public function index()
		{
			$this->load->model('SpamMod');
			$data['query']= $this->SpamMod->showspamreview();
			$this->load->view('SpamUI',$data);
		}
		
		public function del($name=NULL)
		{
			$this->load->library('table');
			$this->load->helper('html'); 
			$this->load->model('SpamMod');
			if((string)$name != ""){
			$this->SpamMod->delete($name);
			}
			$data['query'] = $this->SpamMod->showspamreview();
			$this->load->view('SpamUI',$data);    
		}

	}	
