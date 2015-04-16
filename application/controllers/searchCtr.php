<?php 

	class searchCtr extends CI_Controller
	{
		public function index()
		{
		//	echo "haha";
			// $this->load->helper('form');
			$this->load->helper('form');
			$this->load->model('touristAttractionManager');

			// $data['query']= $this->tesModel->getDatabase();
			// $this->load->view('FormSearchUI',$data);
		// 	$data['query'] = $this->touristAttractionManager->getDatabaseWithinBudget($budget);
			
			$this->load->model('HalteManager');
			$data['query'] = $this->HalteManager->getAllHalte();
			$this->load->model('searchMod');
			$data['query4']= $this->searchMod->showallwisata();
			$data['query1']= $this->searchMod->showallcategory();
			$data['query2']= $this->searchMod->showalllocation();
			$data['query3']= $this->searchMod->showallhalte();

			$this->load->view('header');
			$this->load->view('FormSearchUI', $data);
			$this->load->view('footer');
		
		}

		public function searchWithinBudget($budget)
		{
		//	echo "haha";
			// $this->load->helper('form');
			 $this->load->model('touristAttractionManager');
			 $this->load->model('HalteManager');
			 $this->load->helper('cookie');
			 $this->load->helper('form');
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
			 	$data['query'] = $this->touristAttractionManager->getDatabaseWithinBudgetandHalteWeekend2($data);
			 	$data['isWeekend'] = true;
			 }
			 else
			 {
			 	$data['query'] = $this->touristAttractionManager->getDatabaseWithinBudgetandHalteWeekday2($data);	
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
		//	$data['query'] = $this->touristAttractionManager->getDatabaseWithinBudget($budget);

			
		}
		public function searchWithinBudget1()
		{
		//	echo "haha";
			// $this->load->helper('form');
		// 	;
			$this->load->model('touristAttractionManager');
			$this->load->model('HalteManager');
			$this->load->helper('cookie');
			$this->load->helper('form');
			//	echo "hahaha";
			// $data['query']= $this->tesModel->getDatabase();
			// $this->load->view('FormSearchUI',$data);
			// echo $datechoosen;
			
				$datechoosen = get_cookie('datechoosen');
				$data = array(
				'halte_name' => get_cookie('halte_name')
				);

						
		 	 $day = date('l', strtotime($datechoosen));
		// 	//echo $day;
		// 	// $halte_choosen =  $this->input->post('halte');
			 
			 if($day == "Saturday" OR $day == "Sunday")
			 {
			 //	$data['query'] = $this->touristAttractionManager->getDatabaseWithinBudgetandHalteWeekend($data);
			 	setcookie('isWeekend',"true", time()+3600, '/');
			 	$data['isWeekend'] = "true";
			 }
			 else
			 {
			// 	$data['query'] = $this->touristAttractionManager->getDatabaseWithinBudgetandHalteWeekday($data);	
			 	setcookie('isWeekend',"false", time()+3600, '/');
			 	$data['isWeekend'] = "false";
			 }

		// //	 echo get_cookie('halte_name');
		// 	//echo $this->input->post('halte');
		// 	// foreach ($data['query'] as $row) {
		// 	// 	# code...
		// 	// //	if($row->halte_code == $data['halte_code'])
		// 	// 	if(get_cookie('isWeekend')==true)
		// 	// 	{
		// 	// 		echo "<p>".$row->place_name." ".$row->weekend_price." ".$row->halte_name." ".$row->transport_price." ".$row->transport_info;
		// 	// 	}
		// 	// 	else
		// 	// 	{
		// 	// 		echo "<p>".$row->place_name." ".$row->weekday_price." ".$row->halte_name." ".$row->transport_price." ".$row->transport_info;
		// 	// 	}
		// 	// }
			
		// //	echo $weekday;
		// //	echo "<br>";
		// //	echo $halte_choosen;
		// //	echo "<br>";
		// //	echo $data['query']['halte_name'];

		// //	$budget = (int) $this->input->post('budget');
		// //	$data['query'] = $this->touristAttractionManager->getDatabaseWithinBudget($budget);
			// if(get_cookie('isWeekend') == "true")
			// {
			// 	$data['isWeekend'] = "true";
			// }
			// else
			// {
			// 	$data['isWeekend'] = "false";
			// }
		//	$data['isWeekend']=get_cookie('isWeekend');
			
			$this->load->model('touristAttractionManager');
			$this->load->helper('cookie');
			$data['nama_halte'] = "Taman Mini Garuda";
			
			$data['query'] = $this->touristAttractionManager->getAllTour1($data);
	//	print_r($data['query']['result']);
			// foreach($data['query'] as $row)
			// {
			// 	echo $row->result->place_name;
			// }
			
			// $data['query']= $this->tesModel->getDatabase();
			// $this->load->view('FormSearchUI',$data);
		// 	$data['query'] = $this->touristAttrManager->getDatabaseWithinBudget($budget);
			setcookie("counterTrip", 0, time()+3600, '/');
			setcookie("placeName", "", time()+3600, '/');
			setcookie("halteName", "", time()+3600, '/');
			setcookie("buswayPrice", "", time()+3600, '/');
			setcookie("angkotPrice", "", time()+3600, '/');
			setcookie("ticketPrice", "", time()+3600, '/');
			setcookie("totalPrice", "", time()+3600, '/');
			setcookie("transportInfo","",time()+3600, '/');
			setcookie("placeInfo", "", time()+3600, '/');
			setcookie("counterTrip", 0, time()+3600, '/');
			setcookie("idxFirstTrip", -1, time()+3600, '/');
			setcookie("idxLastTrip", -1, time()+3600, '/');
			
			$data['isRekomendasi'] = "false"; 
			setcookie("isRekomendasi", $data['isRekomendasi'], time()+3600, '/');

			$this->load->view('header');
			$this->load->view('FormSearchUI', $data);
			$this->load->view('footer');

		}
		public function searchWithinBudget11()
		{
		//	echo "haha";
			// $this->load->helper('form');
		// 	;
			$this->load->model('touristAttractionManager');
			$this->load->model('HalteManager');
			$this->load->helper('cookie');
			$this->load->helper('form');
			//	echo "hahaha";
			// $data['query']= $this->tesModel->getDatabase();
			// $this->load->view('FormSearchUI',$data);
			// echo $datechoosen;
			
				$datechoosen = get_cookie('datechoosen');
				$data = array(
				'budget' => intval(get_cookie('budget')),
				'halte_name' => get_cookie('halte_name')
				);

						
		 	 $day = date('l', strtotime($datechoosen));
		// 	//echo $day;
		// 	// $halte_choosen =  $this->input->post('halte');
			 
			 if($day == "Saturday" OR $day == "Sunday")
			 {
			 //	$data['query'] = $this->touristAttractionManager->getDatabaseWithinBudgetandHalteWeekend($data);
			 	setcookie('isWeekend',"true", time()+3600, '/');
			 	$data['isWeekend'] = "true";
			 }
			 else
			 {
			// 	$data['query'] = $this->touristAttractionManager->getDatabaseWithinBudgetandHalteWeekday($data);	
			 	setcookie('isWeekend',"false", time()+3600, '/');
			 	$data['isWeekend'] = "false";
			 }
		
			
			$this->load->model('touristAttractionManager');
			$this->load->helper('cookie');
			$data['nama_halte'] = "Taman Mini Garuda";
			
			$data['query'] = $this->touristAttractionManager->getAllTour1($data);
		//	echo get_cookie("isWeekend");
	//	print_r($data['query']['result']);
			// foreach($data['query'] as $row)
			// {
			// 	echo $row->result->place_name;
			// }
			
			// $data['query']= $this->tesModel->getDatabase();
			// $this->load->view('FormSearchUI',$data);
		// 	$data['query'] = $this->touristAttrManager->getDatabaseWithinBudget($budget);
			setcookie("counterTrip", 0, time()+3600, '/');
			setcookie("placeName", "", time()+3600, '/');
			setcookie("halteName", "", time()+3600, '/');
			setcookie("buswayPrice", "", time()+3600, '/');
			setcookie("angkotPrice", "", time()+3600, '/');
			setcookie("ticketPrice", "", time()+3600, '/');
			setcookie("totalPrice", "", time()+3600, '/');
			setcookie("transportInfo","",time()+3600, '/');
			setcookie("placeInfo", "", time()+3600, '/');
			setcookie("counterTrip", 0, time()+3600, '/');
			setcookie("idxFirstTrip", -1, time()+3600, '/');
			setcookie("idxLastTrip", -1, time()+3600, '/');
			$data['isRekomendasi'] = "true";
			setcookie("isRekomendasi", $data['isRekomendasi'], time()+3600, '/');
			// $this->load->model('HalteManager');
			// $data['query'] = $this->HalteManager->getAllHalte();
			// $this->load->model('searchMod');
			// $data['query4']= $this->searchMod->showallwisata();
			// $data['query1']= $this->searchMod->showallcategory();
			// $data['query2']= $this->searchMod->showalllocation();
			// $data['query3']= $this->searchMod->showallhalte();

			$this->load->view('header');
			$this->load->view('FormSearchUI', $data);
			$this->load->view('footer');

		}
		public function setInitialVariable1()
		{

				$this->load->model('touristAttractionManager');
				$this->load->helper('cookie');
			//	$this->touristAttractionManager->insertBudget($budget);
				setcookie("counttrip",0,time()+3600, '/');
				setcookie("datechoosen",$this->input->post('datepicker'),time()+3600, '/');
				setcookie("halte_name",$this->input->post('mydropdown'),time()+3600, '/');
				setcookie("budget","kosong",time()+3600, '/');
				setcookie("harga_angkot",0,time()+3600, '/');
				setcookie("list_angkot_before","",time()+3600, '/');
				setcookie("list_halte_before","",time()+3600, '/');
				setcookie("list_halte_after","",time()+3600, '/');
				setcookie("list_angkot_after","",time()+3600, '/');
				setcookie("list_tour_attr","",time()+3600, '/');
				setcookie("halteAwal",$this->input->post('mydropdown'),time()+3600, '/');
			//	echo get_cookie("halteAwal");
			//	echo get_cookie("datechoosen");
				header("Location:".base_url()."trip/owntrip");
				
			//	kalau input salah
			//	header("Location:http://localhost/Jaktrip/index.php/searchCtr/inputSalah");
			
			
			
		}

		public function setInitialVariable11()
		{

			$this->load->helper('form');
			$this->load->helper('cookie');
			$budget=$this->input->post('budget');
			if(ctype_digit($budget))
			{
				$this->load->model('touristAttractionManager');
				$this->touristAttractionManager->insertBudget($budget);
				setcookie("counttrip",0,time()+3600, '/');
				setcookie("datechoosen",$this->input->post('datepicker'),time()+3600, '/');
				setcookie("halte_name",$this->input->post('mydropdown'),time()+3600, '/');
				setcookie("firstBudget",$this->input->post('budget'),time()+3600, '/');
				setcookie("budget",$this->input->post('budget'),time()+3600, '/');
				setcookie("harga_angkot",0,time()+3600, '/');
				setcookie("list_angkot_before","",time()+3600, '/');
				setcookie("list_halte_before","",time()+3600, '/');
				setcookie("list_halte_after","",time()+3600, '/');
				setcookie("list_angkot_after","",time()+3600, '/');
				setcookie("list_tour_attr","",time()+3600, '/');
				setcookie("halteAwal",$this->input->post('mydropdown'),time()+3600, '/');
				header("Location:".base_url()."trip/recommendation");
			}
			else
			{
				//  kalau input salah
					header("Location:".base_url()."searchCtr/inputSalah");
			
			}
			
			
			
		}

		public function inputSalah()
		{
			$this->load->model('HalteManager');
			$data['query'] = $this->HalteManager->getAllHalte();
			// $data['query']= $this->tesModel->getDatabase();
			// $this->load->view('FormSearchUI',$data);
		// 	$data['query'] = $this->touristAttrManager->getDatabaseWithinBudget($budget);
			$this->load->view('header');
			$this->load->view('homeUISalah',$data);
			$this->load->view('footer');
		}
		public function setVariable($halte, $budget)
		{
			$this->load->helper('cookie');
		//	setcookie("datechoosen",$this->input->post('datepicker'),time()+3600, '/');
			setcookie("halte_code",$halte,time()+3600, '/');
			setcookie("budget",$budget,time()+3600, '/');
			header("Location:".base_url()."searchCtr/searchWithinBudget");
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
			//	header("Location:http://google.com");
				setcookie("counterTrip", 0, time()+3600, '/');
				setcookie("placeName", "", time()+3600, '/');
				setcookie("halteName", "", time()+3600, '/');
				setcookie("buswayPrice", "", time()+3600, '/');
				setcookie("angkotPrice", "", time()+3600, '/');
				setcookie("ticketPrice", "", time()+3600, '/');
				setcookie("totalPrice", "", time()+3600, '/');
				setcookie("transportInfo","",time()+3600, '/');
				setcookie("placeInfo", "", time()+3600, '/');
				setcookie("counterTrip", 0, time()+3600, '/');
				setcookie("idxFirstTrip", -1, time()+3600, '/');
				setcookie("idxLastTrip", -1, time()+3600, '/');
			}
			header("Location:".base_url()."homeCtr");
		}

		public function searchwisataCatLocKey($category_name=NULL, $city=NULL, $place_name=NULL)
		{
			$this->load->library('table');
			$this->load->helper('html'); 
			$this->load->model('searchMod');
			$this->load->model('touristAttractionManager');
			$data['query'] = $this->touristAttractionManager->getAllTour1($data);
			$counter = 0;
			// foreach($data['query'] as $row)
			// {
			// 	if($row->category_name == $)
			// }
		//	$data['query'] = $this->searchMod->filterModFinal($category_name, $city, $place_name);
			//$this->load->view('searchView',$data);    
			echo json_encode($data);
		}
		
			public function searchwisataCat($category_name=NULL)
		{
			$this->load->library('table');
			$this->load->helper('html'); 
			$this->load->model('searchMod');
			$data['query'] = $this->searchMod->filterMod($category_name);
			//$this->load->view('searchView',$data);    
			echo json_encode($data);
		}
		
			public function searchwisataLoc($city=NULL)
		{
			$this->load->library('table');
			$this->load->helper('html'); 
			$this->load->model('searchMod');
			$data['query'] = $this->searchMod->filterMod2($city);
			//$this->load->view('searchView',$data);    
			echo json_encode($data);
		}
		
			public function searchwisataKey($place_name=NULL)
		{
			$this->load->library('table');
			$this->load->helper('html'); 
			$this->load->model('searchMod');
			$data['query'] = $this->searchMod->filterMod3($place_name);
			//$this->load->view('searchView',$data);    
			echo json_encode($data);
		}


	}	
?>
