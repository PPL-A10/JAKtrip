<?php


    function __construct() {
        parent::__construct();
        $this->load->model('ratingManager');
       
    }

    function index()
	{   
		//Including validation library
		$this->load->library('form_validation');
                
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		//Validating Rating Field
		$this->form_validation->set_rules('rate', 'rate', 'required');
		
		//Validating Review Field
		$this->form_validation->set_rules('review', 'review');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('formRatingUI');
		}
		else
		{
			//Setting values for tabel columns
			$data = array(
						'username' => 'memberNo1',
						'place_name' => 'Kebun Binatang Ragunan',
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
					$this->load->view('formRatingUI');
                   }
	}
}

?>