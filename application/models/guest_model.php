<?
class guest_model extends CI_Model{
	
 	function __construct(){
  		parent::__construct();
  		$this->load->helper('url');				
 	}
 	
	function SaveForm($form_data)
	{
		$myQueryString = "set search_path to '1206277520'";
		$this->db->query($myQueryString);
		$this->db->insert('komentar', $form_data);
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
	}

/*
  function entry_insert(){
    $this->load->database();
	$data = array(
	          'nama'=>$this->input->post('nama'),
			  'email'=>$this->input->post('email'),
			  'komentar'=>$this->input->post('komentar'),
			'approve' => 0,
	        );
	$myQueryString = "set search_path to '1206277520'";
	$this->db->query($myQueryString);
	$this->db->insert('komentar',$data);
  }
*/
	function guest_getall(){
		$this->load->database();
		$myQueryString = "set search_path to '1206277520'";
		$this->db->query($myQueryString);
		$query = $this->db->get('komentar');
		return $query->result();
	}	

	function guest_getapproved(){
		$this->load->database();
		$myQueryString = "set search_path to '1206277520'";
		$this->db->query($myQueryString);
		$q = "select * from komentar where approve=1;";
		$query = $this->db->query($q);
		return $query->result();
	}

	function get($id){
		$this->load->database();
		$query = $this->db->getwhere('komentar', array(('id')=>$id));
		return $query->row_array();
	}

	function delete($id){
		$this->load->database();
		$myQueryString = "set search_path to '1206277520'";
		$this->db->query($myQueryString);
		$this->db->delete('komentar', array('id' => $id));
	}

	function approve($id){
		$this->load->database();
		$myQueryString = "set search_path to '1206277520'";
		$this->db->query($myQueryString);
		$quer = "update komentar set approve = 1 where id = $id;";
		$this->db->query($quer);
	}

	function general(){
  		$this->load->library('WebMenu');
  		$menu = new WebMenu;
		$data['base'] = $this->config->item('base_url');
		$data['css'] = $this->config->item('css');
  		$data['menu'] 		= $menu->show_menu();
  		$data['webtitle']	= 'Halo Tangsel!';
  		$data['websubtitle']= 'Tangsel - Depok. Situs Paguyuban Tangsel di Depok';
  		$data['webfooter']	= 'Copyright © Fakhirah Dianah Ghaisani 120677520 PPW-A';
		
		return $data;
		
		//$data['id'] = 'ID';
		//$data['nama'] = 'Title';
		//$data['email'] = 'Author';
		//$data['komentar']    = 'Summary';  
		//$data['user'] = 'User';
		//$data['password'] = 'Password';

		
		//$data['forminput']  = 'Form Input';
		
		//$data['formlogin']  = 'Form Login';

	/*
	$data['fid']		= array('name'=>'id',
	                            'size'=>30
						  );
	$data['fnama']		= array('name'=>'nama',
	                            'size'=>30
						  );
	$data['femail']	= array('name'=>'email', 'type'=>'email', 'placeholder'=>'yourname@email.com', 'required',
	                            'size'=>30
						  );
	$data['fkomentar']	= array('name'=>'komentar', 'required',
	                            'rows'=>5,
								'cols'=>30
						  );
	*/
	/*		
		$data['fuser']		= array('name'=>'user',
	                            'size'=>30
						  );
	$data['fpassword']	= array('name'=>'password',
	                            'size'=>30
						  );
	*/					  		
 	}
}
?>

