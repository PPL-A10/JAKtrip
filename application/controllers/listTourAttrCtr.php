<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class listTourAttrCtr extends CI_Controller {
    function __construct() {
        parent::__construct();
		$this->load->database(); // load database
        $this->load->model('touristAttractionManager');
    }

    function index() {
	   $this->data['query'] = $this->touristAttractionManager->getAllTourAttr();
	   $this->load->view('listTourAttrUI', $this->data); // load the view file , we are passing $data array to view file
 }
}

?>