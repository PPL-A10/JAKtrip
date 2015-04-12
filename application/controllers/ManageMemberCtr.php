<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ManageMemberCtr extends CI_Controller {
	

	function __construct() {
        parent::__construct();
       // $this->load->model('MemberManager');
       
    }
    
	function index(){
		
		$this->load->model('memberMod');
		$data['query']= $this->memberMod->showallmember();
		$this->load->view('header');
		$this->load->view('menuadmin');
		$this->load->view('ManageMemberUI',$data);
		$this->load->view('footer');
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
		$this->load->view('header');
		$this->load->view('menuadmin');
		$this->load->view('ManageMemberUI',$data);  
		$this->load->view('footer');  
		//echo json_encode($data);
	}

	public function searchwisataKey($place_name=NULL)
	{
		$this->load->library('table');
		$this->load->helper('html'); 
		$this->load->model('memberMod');
		$data['query'] = $this->memberMod->filterMod3($place_name);
		//$this->load->view('searchView',$data);    
		echo json_encode($data);
	}
	
		public function searchwisataKey2($place_name=NULL)
	{
		$this->load->library('table');
		$this->load->helper('html'); 
		$this->load->model('memberMod');
		$data['query'] = $this->memberMod->filterMod5($place_name);
		//$this->load->view('searchView',$data);    
		echo json_encode($data);
	}
}