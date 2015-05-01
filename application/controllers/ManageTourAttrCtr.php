<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ManageTourAttrCtr extends CI_Controller {
	public function index() {
		$this->load->library('table');
		$this->load->helper('html');
		$this->load->model('TouristAttractionManager');
		$query = $this->TouristAttractionManager->tourAttr_getall();
		//$place_name = $query->place_name;


		//$data['place_name'] = $place_name;
		//$data['author'] = $query->author;
		//$data['last_modified'] = $query->last_modified;
		//$data['hits'] = $query->hits;
		//$data['category'] = '';
		$category_list = array();
		
		foreach($query as $place){
			$place_name = $place->place_name;
			$query2 = $this->TouristAttractionManager->tourAttr_getCat($place_name);
			$category='';
			foreach($query2 as $row){
				if($category==''){
					$category=$category.$row->category_name;
				}
				else{
					$category=$category.', '.$row->category_name;				
				}

			}
			array_push($category_list, $category);
		}
		
		$data['cat'] = $category_list;
		$data['tourattr'] = $query;
		
		
		//$data['query'] = $this->touristattractionmanager->tourAttr_getall();
		//$data['query2'] = $this->touristattractionmanager->getCategory();
		$this->load->view('header');
		$this->load->view('menuadmin');
		$this->load->view('manageTourAttrUI', $data);
		$this->load->view('footer');
	}

	function del($place_name){
		$this->load->library('table');
		$this->load->helper('html');
		$this->load->model('TouristAttractionManager');
		//$this->load->model('guest_model');
		
		$place_name = str_replace("%20", " ", $place_name);
		
		if($place_name != NULL){
			$this->TouristAttractionManager->delete($place_name);
		}
		//$data = $this->guest_model->general();
		//$data['query'] = $this->guest_model->guest_getall();

		$query = $this->TouristAttractionManager->tourAttr_getall();
		$category_list = array();
		
		foreach($query as $place){
			$place_name = $place->place_name;
			$query2 = $this->TouristAttractionManager->tourAttr_getCat($place_name);
			$category='';
			foreach($query2 as $row){
				if($category==''){
					$category=$category.$row->category_name;
				}
				else{
					$category=$category.', '.$row->category_name;				
				}

			}
			array_push($category_list, $category);
		}
		
		$data['cat'] = $category_list;
		$data['tourattr'] = $query;
		$data['query'] = $this->touristAttractionManager->tourAttr_getall();
		$this->load->view('header');
		$this->load->view('menuadmin');
		$this->load->view('manageTourAttrUI', $data);
		$this->load->view('footer');
	}

	function isCategory($place_name){
		$result = $this->TouristAttractionManager->getCategory();
		$result1 = $this->TouristAttractionManager->tourAttr_getCat($place_name);
		
		$cat_checked=array();
		if($result1==NULL){
			for($i=0; $i<count($result); $i++){
				array_push($cat_checked, FALSE);
			}
		}
		else{
			for($i=0; $i<count($result); $i++){
				$is_checked = FALSE;
				foreach($result1 as $row){
					if($row->category_name==$result[$i]->category_name){
						$is_checked = TRUE;
					}
				}
				array_push($cat_checked, $is_checked);
			}
		}
		return $cat_checked;
	}
	
	
	function edit($place_name){
		$this->load->library('table');
		$this->load->helper('html');
		$this->load->helper('form');
		$this->load->model('TouristAttractionManager');
		
		$place_name = str_replace("%20", " ", $place_name);
		
		$query = $this->touristAttractionManager->tourAttr_get($place_name);	
		//$query2 = $this->touristattractionmanager->tourAttr_getCat($place_name);
		$query3 = $this->touristAttractionManager->tourAttr_getPic($place_name);
		$query4 = $this->touristAttractionManager->tourAttr_getHalte($place_name);		
		$data['lala'] = $this->TouristAttractionManager->getTouristAttraction()->result();
		$this->load->model('searchMod');
		$data['query2']= $this->searchMod->showalllocation();
		$this->load->model('HalteManager');
		$data['query'] = $this->HalteManager->getAllHalte();
		$data['admin'] = $this->TouristAttractionManager->getAdmin();
		
		$data['place_name']['value'] = $query['place_name'];
		$data['description']['value'] = $query['description'];
		$data['place_info']['value'] = $query['place_info'];
		$data['weekday_price']['value'] = $query['weekday_price'];	
		$data['weekend_price']['value'] = $query['weekend_price'];	
		//$data['cat_name']['value'] = $query2['category_name'];	
		$data['city']['value'] = $query['city'];
		if($query3 != NULL){
			$data['pic']['value'] = $query3['pic'];
			$data['pic_info']['value'] = $query3['pic_info'];
		}
		else{
			$data['pic']['value'] = NULL;
			$data['pic_info']['value'] = NULL;
		}
		$data['longitude']['value'] = $query['longitude'];
		$data['lattitude']['value'] = $query['lattitude'];	
		$data['halte_name']['value'] = $query4['halte_name'];	
		$data['transport_info']['value'] = $query['transport_info'];	
		$data['transport_price']['value'] = $query['transport_price'];	
		$data['author']['value'] = $query['author'];
		$data['rate_avg']['value'] = $query['rate_avg'];
		$data['hits']['value'] = $query['hits'];		
		
		//dropdown list category
		//$dd_cat = array();
		$result = $this->TouristAttractionManager->getCategory();
		//$result4 = $this->TouristAttractionManager->tourAttr_getCat($place_name);
		//foreach($result->result_array() as $cat){
		//	$dd_cat[$cat['category_name']] = $cat['category_name'];
		//}
		
		
		$cat_checked=$this->isCategory($place_name);
		
		
		$data['cat_name']['value']=$result;
		$data['cat_checked']['value']=$cat_checked;
		
		//dropdown list place_info
		
		$dd_place = array();
		array_push($dd_place, NULL);
		$result2 = $this->TouristAttractionManager->getTouristAttraction();
	
		foreach($result2->result_array() as $place){
			$dd_place[$place['place_name']] = $place['place_name'];
		}
		
		$data['place_inf']=$dd_place;
		
		
		//dropdown list halte
		$dd_halte = array();
		$result3 = $this->TouristAttractionManager->getHalte();
		foreach($result3->result_array() as $halte){
			$dd_halte[$halte['halte_name']] = $halte['halte_name'];
		}
		$data['hlt_name']=$dd_halte;

		$this->load->view('header');
		$this->load->view('menuadmin');
		$this->load->view('formTourAttrUI2',$data);
		$this->load->view('footer');
	}
	
	function success()
	{
		redirect('manageTourAttrCtr');	
	}
	
	function myform(){
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->model('TouristAttractionManager');

		$this->form_validation->set_rules('place_name', 'place_name', 'trim|callback_check');			
		$this->form_validation->set_rules('weekday_price', 'weekday_price', 'trim');			
		$this->form_validation->set_rules('weekend_price', 'weekend_price', 'trim');
		$this->form_validation->set_rules('longitude', 'longitude', 'trim');
		$this->form_validation->set_rules('lattitude', 'lattitude', 'trim');
		$this->form_validation->set_rules('city', 'city', 'trim');
		$this->form_validation->set_rules('description', 'description', 'trim');
		$this->form_validation->set_rules('place_info', 'place_info', 'trim');
		$this->form_validation->set_rules('halte_name', 'halte_name', 'trim');
		$this->form_validation->set_rules('transport_info', 'transport_info', 'trim');
		$this->form_validation->set_rules('transport_price', 'transport_price', 'trim');
		$this->form_validation->set_rules('category_name', 'category_name', 'trim');
		$this->form_validation->set_rules('pic', 'pic', 'trim');
		$this->form_validation->set_rules('pic_info', 'pic_info', 'trim');
		$this->form_validation->set_rules('author', 'author', 'trim');

		$key = $this->input->post('key');
		
	   $place_name = $this->input->post('place_name');
	   $weekday_price = $this->input->post('weekday_price');
		$weekend_price = $this->input->post('weekend_price');
		$longitude = $this->input->post('longitude');
		$lattitude = $this->input->post('lattitude');
		$city = $this->input->post('select_location');
		//'rate_avg' => 0,
		$description = $this->input->post('description');
		//'place_info' => $this->input->post('place_info'),
		$transport_info = $this->input->post('transport_info');
		$transport_price = $this->input->post('transport_price');
		$category_list = $this->input->post('category_list');
		$category_new = $this->input->post('category_new');
		$halte_name = $this->input->post('select_busstop');
		$halte_code = $this->touristAttractionManager->getHalteCode($halte_name);
		$place_info = $this->input->post('place_inform');
		
		
		
		
		if($place_info == '0'){
			$place_info = NULL;
		}	
		 
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
		
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			redirect ('manageTourAttrCtr/edit/'.$key);
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			$form_data = array(
					       'place_name' => $place_name,
					       	'weekday_price' => $weekday_price,
					       	'weekend_price' => $weekend_price,
							'longitude' => $longitude,
							'lattitude' => $lattitude,
							'city' => $city,
							//'rate_avg' => 0,
							'description' => $description,
							'place_info' => $place_info,
							'halte_code' => $halte_code['halte_code'],
							'transport_info' => $transport_info,
							'transport_price' => $transport_price,
							'author' => $this->input->post('select_author'),
							'last_modified' => mdate("%Y-%m-%d %H:%i:%s", now())							
						);

			$form_photo = array(
							'place_name' => $place_name,
							'pic' => $this->input->post('pic'),
							'pic_info' =>$this->input->post('pic_info')
						);		
			
			$old_cat = $this->TouristAttractionManager->tourAttr_getCat($place_name);
			
			$form_cat = array(
							'place_name' => $place_name,
							'category_list' => $category_list,
							'category_new' => $category_new,
							'category_old' => $old_cat
						);							
								
			//$dat['category_list']=$category_list;
			
			// run insert model to write data to db
			
			//echo "TEST ".$category_new;
			
			if ($this->TouristAttractionManager->edit($key, $form_data, $form_photo, $form_cat) == TRUE) // the information has therefore been successfully saved in the db
				{
					//$this->load->view('formTourAttrUI', $dat);
					redirect('manageTourAttrCtr/success');   // or whatever logic needs to occur
				}
				else
				{
				echo 'An error occurred saving your information. Please try again later';
				 //Or whatever error handling is necessary
				}
			}
			
		
	}
	
		public function searchtour($place_name=null)
	{
		$this->load->library('table');
		$this->load->helper('html');
		$this->load->model('TouristAttractionManager');
		$query = $this->TouristAttractionManager->filterMod5($place_name);
		//$place_name = $query->place_name;


		//$data['place_name'] = $place_name;
		//$data['author'] = $query->author;
		//$data['last_modified'] = $query->last_modified;
		//$data['hits'] = $query->hits;
		//$data['category'] = '';
		$category_list = array();
		
		foreach($query as $place){
			$place_name = $place->place_name;
			$query2 = $this->TouristAttractionManager->tourAttr_getCat($place_name);
			$category='';
			foreach($query2 as $row){
				if($category==''){
					$category=$category.$row->category_name;
				}
				else{
					$category=$category.', '.$row->category_name;				
				}

			}
			array_push($category_list, $category);
		}
		
		$data['cat'] = $category_list;
		$data['tourattr'] = $query;
		
		
		//$data['query'] = $this->touristattractionmanager->tourAttr_getall();
		//$data['query2'] = $this->touristattractionmanager->getCategory();
		//$this->load->view('header');
		//$this->load->view('menuadmin');
		//$this->load->view('manageTourAttrUI', $data);
		//$this->load->view('footer');    
		echo json_encode($data);
	}
	
		public function searchkeywordtour($place_name=null)
	{
		$this->load->library('table');
		$this->load->helper('html');
		$this->load->model('TouristAttractionManager');
		$query = $this->TouristAttractionManager->filterMod3($place_name);
		//$place_name = $query->place_name;


		//$data['place_name'] = $place_name;
		//$data['author'] = $query->author;
		//$data['last_modified'] = $query->last_modified;
		//$data['hits'] = $query->hits;
		//$data['category'] = '';
		$category_list = array();
		
		foreach($query as $place){
			$place_name = $place->place_name;
			$query2 = $this->TouristAttractionManager->tourAttr_getCat($place_name);
			$category='';
			foreach($query2 as $row){
				if($category==''){
					$category=$category.$row->category_name;
				}
				else{
					$category=$category.', '.$row->category_name;				
				}

			}
			array_push($category_list, $category);
		}
		
		$data['cat'] = $category_list;
		$data['tourattr'] = $query;
		
		
		//$data['query'] = $this->touristattractionmanager->tourAttr_getall();
		//$data['query2'] = $this->touristattractionmanager->getCategory();
		//$this->load->view('header');
		//$this->load->view('menuadmin');
		//$this->load->view('manageTourAttrUI', $data);
		//$this->load->view('footer');    
		echo json_encode($data);
	}
	
	
}