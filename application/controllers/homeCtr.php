<?php 

	class homeCtr extends CI_Controller
	{
		public function index()
		{
		//	echo "haha";
			// $this->load->helper('form');
			$this->load->model('HalteManager');
			$data['query'] = $this->HalteManager->sorthalte();
			$data['kodekoridor'] = $this->HalteManager->haltecode();
			// $data['query']= $this->tesModel->getDatabase();
			// $this->load->view('FormSearchUI',$data);
		// 	$data['query'] = $this->touristAttrManager->getDatabaseWithinBudget($budget);
			$this->load->view('header');
			$this->load->view('homeUI',$data);
			$this->load->view('footer');
		}

	}	
?>
