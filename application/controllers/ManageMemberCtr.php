<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ManageMemberCtr extends CI_Controller {
	

	function __construct() {
        parent::__construct();
       // $this->load->model('MemberManager');
       
    }
    
	function index(){
		
		$this->load->model('memberMod');
		$data['query']= $this->memberMod->showallmember();
		$this->load->view('ManageMemberUI',$data);

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
		$this->load->view('ReviewUI',$data);    
		//echo json_encode($data);
	}
}