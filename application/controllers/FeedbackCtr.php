<?php

class FeedbackCtr extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('feedbackManager');
       
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
}

?>