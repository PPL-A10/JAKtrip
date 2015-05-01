<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SuggestionCtr extends CI_Controller {
	

	function __construct() {
        parent::__construct();
       
    }
    
	function index(){
		$this->load->model('suggestionManager');
		$data['query'] = $this->suggestionManager->showAllSuggestion();
		$data['query2'] = $this->suggestionManager->showAllPhotoSuggestion();

		$this->load->view('header');
		$this->load->view('menuadmin');
		$this->load->view('SuggestionUI', $data);
		$this->load->view('footer');

	}


}