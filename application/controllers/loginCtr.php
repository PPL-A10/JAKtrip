<?php 
	class loginCtr extends CI_Controller
	{
		
		public function checkLogin()
		{
			$this->load->model('memberManager');
			$this->load->helper('security');
			$this->load->helper('text');
			$this->load->helper('cookie');
			$str = substr(do_hash(($this->input->post('password')),'md5'),0,30);
			$data = array(
				'nameORemail' => $this->input->post('username'),
				'password' => $str
			);
			$hasil['query'] = $this->memberManager->validasiLogin($data);	
			//echo json_encode($hasil);
			setcookie("username",$hasil['query']['username'],time()+3600, '/');
		//	setcookie("username",null,time()+3600);
		//	echo $hasil['query']['username'];
			header("Location:http://localhost/Jaktrip/index.php/searchCtr/searchWithinBudget1/");
		}
	}	
?>
