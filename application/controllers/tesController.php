<?php 
	class tesController extends CI_Controller
	{
		public function index()
		{
			$this->load->helper('form');
			$this->load->model('tesModel');
			$data['query']= $this->tesModel->getDatabase();
			$this->load->view('tesViews',$data);
		}
		public function getAll()
		{
			$this->load->model('tesModel');

			$data['query']= $this->tesModel->getDatabase();
		//	$data['peta']= $this->load->view('peta', '', true);

			$this->load->view('tesViews',$data);
		}

		public function chooseTouristAttr($budgetString)
		{
		//	echo "<p>aaa</p>";
		//$data = "wkwkwk";
		//	echo $budget;
			$budget = intval($budgetString);
			$this->load->model('tesModel');
		//	$data['query']= $this->tesModel->getDatabase();
		//	$this->load->view('tesViews',$data);
			$data['query'] = $this->tesModel->getDatabaseWithinBudget($budget);
		//	$this->load->view('tesViews',$data);
		//	print_r($data);
			echo json_encode($data);
			
		}

		public function viewPeta()
		{
			$this->load->view('peta');
		}
		public function userDataSubmit() {
			// $data = array(
			// 'username' => $this->input->post('name')
			// );

			// echo json_encode($data);

		//	$data = "a";

		//	echo json_encode($data);

			$data = array(
			'username' => $this->input->post('akb')	
			);
			//alert("a");
			echo json_encode($data);

	//		echo $data;
	//		alert("b");
			//$this->load->view('welcome_message');
		}

		public function gogo() {
			$this->load->view('welcome_message');
		}

	}

	
?>
