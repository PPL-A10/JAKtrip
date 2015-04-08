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
			$this->load->helper('form');
		}

		public function searchWithinBudget($budget)
		{
		//	echo "haha";
			// $this->load->helper('form');
			 $this->load->model('touristAttrManager');
			 $this->load->model('HalteManager');
			 $this->load->helper('cookie');
		//	echo "hahaha";
			// $data['query']= $this->tesModel->getDatabase();
			// $this->load->view('FormSearchUI',$data);
			// echo $datechoosen;
			
			$datechoosen = get_cookie('datechoosen');
			$data = array(
				'budget' => $budget,
			);
			
			 
	//		 $data['halte_code'] = $this->HalteManager->getHalteCode($data);
			
			 $day = date('l', strtotime($datechoosen));
			
			
			
			
			// $halte_choosen =  $this->input->post('halte');
			 if($day == "Saturday" OR $day == "Sunday")
			 {
			 	$data['query'] = $this->touristAttrManager->getDatabaseWithinBudgetandHalteWeekend2($data);
			 	$data['isWeekend'] = true;
			 }
			 else
			 {
			 	$data['query'] = $this->touristAttrManager->getDatabaseWithinBudgetandHalteWeekday2($data);	
			 	$data['isWeekend'] = false;
			 }
			 
			 echo json_encode($data);
			// foreach ($data['query'] as $row) {
			// 	# code...
			// 	if($row->halte_code == $data['halte_code'])
			// 	echo "<p>".$row->place_name." ".$row->weekday_price." ".$row->halte_code;
			// }
			
		//	echo $weekday;
		//	echo "<br>";
		//	echo $halte_choosen;
		//	echo "<br>";
		//	echo $data['query']['halte_name'];

		//	$budget = (int) $this->input->post('budget');
		//	$data['query'] = $this->touristAttrManager->getDatabaseWithinBudget($budget);

			
		}
		public function searchWithinBudget1()
		{
		//	echo "haha";
			// $this->load->helper('form');
			$this->load->helper('form');
			$this->load->model('touristAttrManager');
			$this->load->model('HalteManager');
			$this->load->helper('cookie');
			$this->load->helper('form');
			//	echo "hahaha";
			// $data['query']= $this->tesModel->getDatabase();
			// $this->load->view('FormSearchUI',$data);
			// echo $datechoosen;
			
				$datechoosen = get_cookie('datechoosen');
				$data = array(
				'budget' => get_cookie('budget'),
				'halte_name' => get_cookie('halte_name')
				);

						
			 $day = date('l', strtotime($datechoosen));
			//echo $day;
			// $halte_choosen =  $this->input->post('halte');
			 
			 if($day == "Saturday" OR $day == "Sunday")
			 {
			 	$data['query'] = $this->touristAttrManager->getDatabaseWithinBudgetandHalteWeekend($data);
			 	setcookie('isWeekend',"true", time()+3600, '/');
			 }
			 else
			 {
			 	$data['query'] = $this->touristAttrManager->getDatabaseWithinBudgetandHalteWeekday($data);	
			 	setcookie('isWeekend',"false", time()+3600, '/');
			 }
		//	 echo get_cookie('halte_name');
			//echo $this->input->post('halte');
			// foreach ($data['query'] as $row) {
			// 	# code...
			// //	if($row->halte_code == $data['halte_code'])
			// 	if(get_cookie('isWeekend')==true)
			// 	{
			// 		echo "<p>".$row->place_name." ".$row->weekend_price." ".$row->halte_name." ".$row->transport_price." ".$row->transport_info;
			// 	}
			// 	else
			// 	{
			// 		echo "<p>".$row->place_name." ".$row->weekday_price." ".$row->halte_name." ".$row->transport_price." ".$row->transport_info;
			// 	}
			// }
			
		//	echo $weekday;
		//	echo "<br>";
		//	echo $halte_choosen;
		//	echo "<br>";
		//	echo $data['query']['halte_name'];

		//	$budget = (int) $this->input->post('budget');
		//	$data['query'] = $this->touristAttrManager->getDatabaseWithinBudget($budget);
		
			$this->load->view('FormSearchUI',$data);
		}
		public function setInitialVariable()
		{

			$this->load->helper('form');
			$this->load->helper('cookie');
			setcookie("counttrip",0,time()+3600, '/');
			setcookie("datechoosen",$this->input->post('datepicker'),time()+3600, '/');
			setcookie("halte_name",$this->input->post('mydropdown'),time()+3600, '/');
			setcookie("budget",$this->input->post('budget'),time()+3600, '/');
			setcookie("harga_angkot",0,time()+3600, '/');
			setcookie("list_angkot_before","",time()+3600, '/');
			setcookie("list_halte_before","",time()+3600, '/');
			setcookie("list_halte_after","",time()+3600, '/');
			setcookie("list_angkot_after","",time()+3600, '/');
			setcookie("list_tour_attr","",time()+3600, '/');
			header("Location:http://localhost/Jaktrip/index.php/searchCtr/searchWithinBudget1");
		}
		public function setVariable($halte, $budget)
		{
			$this->load->helper('cookie');
		//	setcookie("datechoosen",$this->input->post('datepicker'),time()+3600, '/');
			setcookie("halte_code",$halte,time()+3600, '/');
			setcookie("budget",$budget,time()+3600, '/');
			header("Location:http://localhost/Jaktrip/index.php/searchCtr/searchWithinBudget");
		}
		public function cobaInput()
		{
			$this->load->model('tesModel');
			$data['query'] = $this->tesModel->getAllHalte();
			$this->load->view('cobaInputUI', $data);
		}

		public function logout()
		{
			if(isset($_COOKIE["username"]))
			{
				setcookie("username",null,time()+3600, '/');
				
			}
			header("Location:http://localhost/Jaktrip/index.php/searchCtr/searchWithinBudget1/");
		}
	}	
?>
