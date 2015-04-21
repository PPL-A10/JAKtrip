<?php

class FlagCtr extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('ratingManager');
    }

    function index($name=null)
	{   
		$this->load->library('form_validation');           
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('rate', 'rate', 'required');
		$this->form_validation->set_rules('review', 'review');
		$this->load->helper('cookie');
		if ($this->form_validation->run() == FALSE)
		{
			//$this->load->view('formRatingUI');
		}
		else
		{
			$name= str_replace("%20", " ",$name);
			$data = array(
						'username' => get_cookie("username"),
						'place_name' => $name,
                        'rate' => $this->input->post('rate'),
                        'title' => $this->input->post('title'),
                        'review' => $this->input->post('review')
//						'is_nudity' => $this->input->false,
//						'is_spam' => $this->input->false,
//						'is_FalseStatement' => $this->input->false,
//						'is_unrelatedStatement' => $this->input->false,
//						'is_profanity' => $this->input->false;
            );
					//Transfering data to Model
                    $this->ratingManager->insert_rating($data);
                    //Loading View
					//$this->load->view('formRatingUI');
         }		//Including validation library
		
	
		$this->load->helper('html');
		$this->load->model('DetailMod');
		$this->load->model('ReviewModel');
		$data['query']= $this->DetailMod->showdetail($name);
		$data['query2']= $this->ReviewModel->showreviewtempat($name);
		$this->load->view('header');
		$this->load->view('FlagUI',$data);
		$this->load->view('footer');
		//echo json_encode($data);
	}
	
	    function rating($namatempat)
	{   
		$namatempat= str_replace("%20", " ",$namatempat);
		//Including validation library
		$this->load->library('form_validation');
                
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		//Validating Rating Field
		$this->form_validation->set_rules('rate', 'rate', 'required');
		
		//Validating Review Field
		$this->form_validation->set_rules('review', 'review');

		if ($this->form_validation->run() == FALSE)
		{
			//$this->load->view('AllplacesUI');
		}
		else
		{
			//Setting values for tabel columns
			$data = array(
						'username' => 'memberNo1',
						'place_name' => $namatempat,
                        'rate' => $this->input->post('rate'),
                        'title' => $this->input->post('title'),
                        'review' => $this->input->post('review')
//						'is_nudity' => $this->input->false,
//						'is_spam' => $this->input->false,
//						'is_FalseStatement' => $this->input->false,
//						'is_unrelatedStatement' => $this->input->false,
//						'is_profanity' => $this->input->false;
            );
					//Transfering data to Model
                    $this->ratingManager->insert_rating($data);
                    //Loading View
					//$this->load->view('AllplacesUI');
                   }
	}

}

?>