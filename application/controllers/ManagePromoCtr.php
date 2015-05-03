<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ManagePromoCtr extends CI_Controller {
	public function index() {
		$this->load->library('table');
		$this->load->helper('html');
		$this->load->model('PromoManager');
		
		$query = $this->PromoManager->promo_getall();
		$type_list = array();
		
		foreach($query as $id){
			$id_promo = $id->id_promo;
			$query2 = $this->PromoManager->promo_getType($id_promo);
			$type='';
			foreach($query2 as $row){
				if($type==''){
					$type=$type.$row->type_name;
				}
				else{
					$type=$type.', '.$row->type_name;				
				}

			}
			array_push($type_list, $type);
		}

		$data['type_'] = $type_list;
		$data['promo'] = $query;

		$this->load->view('header');
		$this->load->view('menuadmin');
		$this->load->view('ManagePromoUI', $data);
		$this->load->view('footer');
	}

	function del($id_promo){
		$this->load->library('table');
		$this->load->helper('html');
		$this->load->model('PromoManager');
		
		if($id_promo != NULL){
			$this->PromoManager->delete($id_promo);
		}

		$query = $this->PromoManager->promo_getall();
		$type_list = array();
		
		foreach($query as $id){
			$id_promo = $id->id_promo;
			$query2 = $this->PromoManager->promo_getType($id_promo);
			$type='';
			foreach($query2 as $row){
				if($type==''){
					$type=$type.$row->type_name;
				}
				else{
					$type=$type.', '.$row->type_name;				
				}

			}
			array_push($type_list, $type);
		}

		$data['type_'] = $type_list;
		$data['promo'] = $query;
		$data['query'] = $this->PromoManager->promo_getall();
		$this->load->view('header');
		$this->load->view('menuadmin');
		$this->load->view('managePromoUI', $data);
		$this->load->view('footer');
	}
	
}