<?php

class customError extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$this->output->set_header_status('404');
		$data['content'] = 'error_404'; // View name 
        $this->load->view('index',$data);//loading in my template
	}
}

?>