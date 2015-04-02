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
	
	function sortAtoZ()
    {
		if(isset($_POST["sortAtoZ"])){
			$data   = array();
			$this->load->model('touristAttractionManager');
			$this->load->helper('url');
			$data1['result'] = $this->touristAttractionManager->getAllTourAttrSortAtoZ();
			$this->load->view('listTourAttrUI-sort', $data1);
		}
		else{
			$this->load->view('listTourAttrUI');
		}
    }
	
	function sortZtoA()
    {
		if(isset($_POST["sortZtoA"])){
			$data   = array();
			$this->load->model('touristAttractionManager');
			$this->load->helper('url');
			$data2['result'] = $this->touristAttractionManager->getAllTourAttrSortZtoA();
			$this->load->view('listTourAttrUI-sort', $data2);
		}
		else{
			$this->load->view('listTourAttrUI');
		}
    }
	
	function HighToLow()
    {
		if(isset($_POST["HighToLow"])){
			$data   = array();
			$this->load->model('touristAttractionManager');
			$this->load->helper('url');
			$data3['result'] = $this->touristAttractionManager->getAllTourAttrSortHighToLow();
			$this->load->view('listTourAttrUI-sort', $data3);
		}
		else{
			$this->load->view('listTourAttrUI');
		}
    }
	
	function LowToHigh()
    {
		if(isset($_POST["HighToLow"])){
			$data   = array();
			$this->load->model('touristAttractionManager');
			$this->load->helper('url');
			$data3['result'] = $this->touristAttractionManager->getAllTourAttrSortLowToHigh();
			$this->load->view('listTourAttrUI-sort', $data3);
		}
		else{
			$this->load->view('listTourAttrUI');
		}
    }
}
?>