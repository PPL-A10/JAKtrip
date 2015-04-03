<?php 

	class searchCtr extends CI_Controller
	{
		public function index()
		{
		//	echo "haha";
			// $this->load->helper('form');
			 $this->load->model('touristAttrManager');
			// $data['query']= $this->tesModel->getDatabase();
			// $this->load->view('FormSearchUI',$data);
		// 	$data['query'] = $this->touristAttrManager->getDatabaseWithinBudget($budget);
			$this->load->view('FormSearchUI');
		}

		public function searchWithinBudget($budget)
		{
		//	echo "haha";
			// $this->load->helper('form');
			 $this->load->model('touristAttrManager');
			// $data['query']= $this->tesModel->getDatabase();
			// $this->load->view('FormSearchUI',$data);
			$budget = (int) $budget;
			$data['query'] = $this->touristAttrManager->getDatabaseWithinBudget($budget);
		//	echo $data['query']['place_name'];
			$this->load->view('FormSearchUI',$data);
		}
		public function searchWithinBudget1()
		{
		//	echo "haha";
			// $this->load->helper('form');
			 $this->load->model('touristAttrManager');
		//	echo "hahaha";
			// $data['query']= $this->tesModel->getDatabase();
			// $this->load->view('FormSearchUI',$data);
			 $datechoosen =  $this->input->post('datepicker');
			// echo $datechoosen;
			 $weekday = date('l', strtotime($datechoosen));

			echo $weekday;
		//	$budget = (int) $this->input->post('budget');
		//	$data['query'] = $this->touristAttrManager->getDatabaseWithinBudget($budget);
		
		///	$this->load->view('FormSearchUI',$data);
		}
		public function cobaInput()
		{
			$this->load->view('cobaInputUI');
		}
		public function logout()
		{
			if(isset($_COOKIE["username"]))
			{
				setcookie("username",null,time()+3600, '/');
				
			}
			header("Location:http://localhost/Jaktrip/index.php/searchCtr/");
		}
	}	
?>
