<?php

class ViewTripCtr extends CI_Controller {

    function index()
	{   
			$this->load->helper('cookie');
			$this->load->helper('url');
			$data['place_name'] = explode("xx",get_cookie("placeName"));
			$data['halte_awal'] = explode("xx",get_cookie("halteAwal"));
			$data['halte_name'] = explode("xx",get_cookie("halteName"));
			$data['busway_price'] = explode("xx",get_cookie("buswayPrice"));
			$data['angkot_price'] = explode("xx",get_cookie("angkotPrice"));
			$data['ticket_price'] = explode("xx",get_cookie("ticketPrice"));
			$data['total_price'] = explode("xx",get_cookie("totalPrice"));
			$data['transport_info'] = explode("xx",get_cookie("transportInfo"));
			$data['place_info'] = explode("xx",get_cookie("placeInfo"));

			//$place_name = explode("xx",get_cookie("place_name"));

			$this->user = $this->facebook->getUser();
			if($this->user)
			{

				$data['user_profile'] = $this->facebook->api('/me/');
				$first_name = $data['user_profile']['first_name'];
				$foto_facebook = "https://graph.facebook.com/".$data['user_profile']['id']."/picture";
				if(get_cookie('username')!=null)
				{
					$this->load->view('header', $data);
					$this->load->view('viewTripUI',$data);
					$this->load->view('footer');
				}
				else
				{
					setcookie("username_facebook", $data['user_profile']['first_name'], time()+3600, '/');
                	setcookie("username",$data['user_profile']['id'], time()+3600, '/');
					setcookie("photo_facebook",$foto_facebook,time()+3600, '/');
					header('Location: '.base_url('successLoginFB'));
				}
			}
			else
			{
				$data['login_url'] = $this->facebook->getLoginUrl();
				$this->load->view('header', $data);
				$this->load->view('viewTripUI',$data);
				$this->load->view('footer');
			}
			// $this->load->view('header');
			// $this->load->view('viewTripUI',$data);
			// $this->load->view('footer');
	}
}

?>