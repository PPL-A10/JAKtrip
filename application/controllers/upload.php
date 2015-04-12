<?php

class Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function index()
	{
		$this->load->view('upload_form', array('error' => ' ' ));
	}

	function do_upload()
	{
		$image_path = realpath(APPPATH . '../assets/upload');
		$config['upload_path'] = $image_path;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1000';
		$config['max_width']  = '4096';
		$config['max_height']  = '4096';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		//$upload_data = $this->upload->data();

		if ( ! $this->upload->do_upload())
		{
			//$error = array('error' => $this->upload->display_errors());

			//$this->load->view('upload_form', $error);
		}
		else
		{
			//$data = array('upload_data' => $this->upload->data());
			$upload_data = $this->upload->data();
			$file_name = $upload_data['file_name'];
			echo $file_name;
			//$this->load->view('upload_success', $data);
			$this->load->view('upload_form');
		}
	}
}
?>