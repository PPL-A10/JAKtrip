<?php //if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SpamCtr extends CI_Controller 	{
		public function index()
		{
			$this->load->model('SpamMod');
			$data['query']= $this->SpamMod->showspamreview();
			$this->load->view('SpamUI',$data);
		}
		
		public function del($id)
		{
			$this->load->library('table');
			$this->load->helper('html'); 
			$this->load->model('SpamMod');
			if((int)$id != null){
			$this->SpamMod->delete($id);
			}
			$data['query'] = $this->SpamMod->showspamreview();
			//$this->load->view('SpamUI',$data);  
			echo json_encode($data);
		}
		
		public function coba()
		{
			$this->load->library('table');
			$this->load->helper('html'); 
			$this->load->model('SpamMod');
			$data1 = $this->input->post('check_list');
			if (is_array($data1))
			{
			foreach ($data1 as $key => $value)
			{
			$this->SpamMod->delete($value);
			}
			}
			$data['query'] = $this->SpamMod->showspamreview();
			$this->load->view('SpamUI',$data);
		}

	}	
