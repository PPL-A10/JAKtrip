<?php

class PlaceCtr extends CI_Controller {

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
		$data['query3']= $this->DetailMod->showphoto($name);
		$this->load->view('header');
		$this->load->view('PlaceUI',$data);
		$this->load->view('footer',$data);
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
	
function do_upload($place_name)
	{
		$place_name= str_replace("%20", " ",$place_name);
		$this->load->model('PhotoManager');
		//$image_path1 = './assets/upload/'.$place_name;
		$config['upload_path'] = './assets/upload/'.$place_name.'/';
		//$config['upload_path'] = './assets/upload/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1000';
		$config['max_width']  = '4096';
		$config['max_height']  = '4096';
		$this->load->library('upload', $config);
		//$this->upload->initialize($config);
		//$upload_data = $this->upload->data();
		
		 $dir_exist = true; // flag for checking the directory exist or not
		if (!is_dir('./assets/upload/'.$place_name.'/'))
		{
			mkdir('./assets/upload/'.$place_name.'/', 0777, true);
			$dir_exist = false; // dir not exist
		}
		else{

		}
		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			//$this->load->view('HomeUI');
			$this->load->view('upload_form', $error);
		}
		else
		{
			//$data = array('upload_data' => $this->upload->data());
			$upload_data = $this->upload->data();
			$file_name = $upload_data['file_name'];
			//echo $file_name;
			//$this->load->view('upload_success');
			//$this->load->view('upload_form');
			$form_data = array(
					       	'place_name' => $place_name,
					       	'pic' => './assets/upload/'.$place_name.'/'.$file_name,
					       	'pic_info' => './assets/upload/'.$place_name.'/',
							'is_publish' => 0,
							//'author' => get_cookie("username"),
							//'nearest_bus_stop' => $this->input->post('select_busstop'),
							//'last_modified' => mdate("%Y-%m-%d %H:%i:%s", now())
						);
			$this->PhotoManager->SaveForm($form_data);
			
			
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
			$data = array(
						'username' => get_cookie("username"),
						'place_name' => $place_name,
                        'rate' => $this->input->post('rate'),
                        'title' => $this->input->post('title'),
                        'review' => $this->input->post('review')
            );
                    $this->ratingManager->insert_rating($data);
        }
		$this->load->helper('html');
		$this->load->model('DetailMod');
		$this->load->model('ReviewModel');
		$data['query']= $this->DetailMod->showdetail($place_name);
		$data['query2']= $this->ReviewModel->showreviewtempat($place_name);
		$data['query3']= $this->DetailMod->showphoto($name);
		$this->load->view('header');
		$this->load->view('PlaceUI',$data);
		$this->load->view('footer');
		}
	}

}

?>