<?php

class testServerCtr extends CI_Controller {

  

    function index($nama=null)
	{   
		$this->load->view('welcome_message');
	}
	
	 
}

?>