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

	function publish($id_pic){
		$this->load->model('suggestionManager');
		$this->suggestionManager->publishphoto($id_pic);
		//$data['query'] = $this->suggestionManager->showAllSuggestion();
		$data['query'] = $this->suggestionManager->showAllPhotoSuggestion();
		echo json_encode($data);
		//$this->load->view('header');
		//$this->load->view('menuadmin');
		//$this->load->view('SuggestionUI', $data);
		//$this->load->view('footer');
		
	}
}