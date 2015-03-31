<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class listTourAttrCtr extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }

    function index()
    {
		
		if(isset($_POST["tombolGetAllTourAttr"])){
			$data   = array();
			$this->load->model('touristAttractionManager');
			$this->load->helper('url');
			$data['result'] = $this->touristAttractionManager->getAllTourAttr();
			$this->load->view('listTourAttrUI', $data);
		}
		else{
			$this->load->view('homeUI');
		}
    }
}
?>