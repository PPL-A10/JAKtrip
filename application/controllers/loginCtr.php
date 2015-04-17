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
			if($hasil['query']==false)
			{
				$this->load->view('header');
				$this->load->view('LoginUI');
				$this->load->view('footer');
			}
			else
			{
				setcookie("username",$hasil['query']['username'],time()+3600, '/');
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
		//	setcookie("username",null,time()+3600);
		//	echo $hasil['query']['username'];
		//	header("Location:http://google.com");
		//	echo get_cookie("username");
				header("Location:".base_url('home')."");
			}
			
		}
	}	
?>
