<?php

class FeedbackCtr extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('feedbackManager');
        $this->load->model('suggestionManager');
    }

    function index()
	{   
		//Including validation library
		$this->load->library('form_validation');
                
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		//kayanya ini set_rules('id dari view', 'nama coloumn di db', 'keterangan tambahan')
		
		//Validating Name Field
		$this->form_validation->set_rules('name', 'name', 'required');
		
		//Validating Email Field
		$this->form_validation->set_rules('email', 'email', 'required|valid_email');
		
		//Validating Subject Field
		$this->form_validation->set_rules('subject', 'subject');
		
		//Validating Address Field
		$this->form_validation->set_rules('message', 'message', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('header');
			$this->load->view('formFeedbackUI');
			$this->load->view('footer');
		}
		else
		{
			//Setting values for tabel columns
			$data = array(
                        'name' => $this->input->post('name'),
                        'email' => $this->input->post('email'),
                        'subject' => $this->input->post('subject'),
                        'message' => $this->input->post('message')
                    );
			

					//Transfering data to Model
                   $this->feedbackManager->insert_feedback($data);
                    //Loading View
                $this->load->view('header');
				$this->load->view('formFeedbackUI');
				$this->load->view('footer');
        }
	}

	function sendSuggestion(){
		$this->load->helper('cookie');
		$this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('place_name', 'place_name', 'required');
		$this->form_validation->set_rules('description', 'description', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('header');
			$this->load->view('formFeedbackUI');
			$this->load->view('footer');
		}
		else
		{
			//Setting values for tabel columns
			$data2 = array(
						'username' => get_cookie("username"),
                        'place_name' => $this->input->post('place_name'),
                        'description' => $this->input->post('description')
                    );
			
                $this->suggestionManager->insertSuggestion($data2);
                
                $this->load->view('header');
				$this->load->view('formFeedbackUI');
				$this->load->view('footer');
        }
	}
}

?>