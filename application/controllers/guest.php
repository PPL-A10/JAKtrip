<?
class Guest extends CI_Controller{

 	function __construct(){
  		parent::__construct();
 	}
	
	function index(){
		$this->load->model('guest_model');
		$data = $this->guest_model->general();
		$this->load->view('guest_view', $data);

	}
 	function main(){
		$this->load->library('table');
		$this->load->helper('html');
		$this->load->model('guest_model');

		$data = $this->guest_model->general();
		$data['query'] = $this->guest_model->guest_getapproved();

  		$this->load->view('guest_main', $data);
 	}
	/*
	function valid(){
		$this->load->helper('form');
		$this->load->helper('html');
		$this->load->model('guest_model');
		
		$emailErr = $commentErr = "";
		$vemail = $vkomentar = "";
		$validEmail = $validComment = "";
		
		$vnama = $_POST['nama'];
		$vnama = trim($vnama);
		$vnama = stripslashes($vnama);
		$vnama = htmlspecialchars($vnama);

		$vkomentar = $_POST['komentar'];
		$vkomentar = trim($vkomentar);
		$vkomentar = stripslashes($vkomentar);
		$vkomentar = htmlspecialchars($vkomentar);

		$vemail = $_POST['email'];
		$vemail = trim($vemail);
		$vemail = stripslashes($vemail);
		$vemail = htmlspecialchars($vemail);
				
		if(empty($vemail)){
			$emailErr = "Email harus diisi";
			$validEmail = "";
		}
		else{
			if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $vemail)){
				$emailErr = "Format email tidak sesuai!";
				$validEmail = "";
			}
			else{
				$validEmail = "sukses";
			}
		}
		
		if(empty($vkomentar)){
			$commentErr = "Komentar harus diisi";	
			$validComment = "";
			
		}
		else{
			$validComment = "sukses";
			
		}
		
		if(!empty($validEmail) and !empty($validComment))
		{
			//redirect('guest/input');
			header("location:input");
		}

	}	
	

	function test_input($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		echo "hai";
		return $data;
	}
	*/
 	function input($id = 0){
		$this->load->helper('form');
		$this->load->helper('html');
		$this->load->model('guest_model');
		if($this->input->post('mysubmit')){
			$this->guest_model->entry_insert();
		}
	
		$data = $this->guest_model->general();
		$this->load->view('guest_input', $data);
		/*
		if((int)$id > 0){
			$query = $this->guest_model->get($id);
			$data['fid']['value'] = $query['id'];
			$data['fnama']['value'] = $query['nama'];
			$data['femail']['value'] = $query['email'];
			$data['fkomentar']['value'] = $query['komentar'];
		}
		*/
  			
 	}


function myform()
	{			
		$this->load->library('form_validation');
		//$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('guest_model');
		$data = $this->guest_model->general();
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim|callback_check');			
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');			
		$this->form_validation->set_rules('komentar', 'Komentar', 'required|trim');
			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$this->load->view('guest_input', $data);
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			$form_data = array(
					       	'nama' => set_value('nama'),
					       	'email' => set_value('email'),
					       	'komentar' => set_value('komentar'),
							'approve' => 0
						);
					
			// run insert model to write data to db
		
			if ($this->guest_model->SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect('guest/success');   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}
	}
	
	# callback
function check($str)
{

if(ctype_alpha(str_replace(' ','',$str))){
	return true;
}
else{
			$this->form_validation->set_message('check', 'This field may only contains alphabethical characters and whitespace');
			return FALSE;
}

}
	function success()
	{
		redirect('guest/myform');	
	}












	function cekinput(){
		$emailErr = $commentErr = "";
			$vemail = $comment = "";
			$validEmail = $validComment = "";
			//if($_SERVER["REQUEST_METHOD"]=="POST"){
				$nama = $_POST['nama'];
				$nama = trim($nama);
				$nama = stripslashes($nama);
				$nama = htmlspecialchars($nama);
				
				$email = $_POST['email'];
				$email = trim($email);
				$email = stripslashes($email);
				$email = htmlspecialchars($email);

				$komentar = $_POST['komentar'];
				$komentar = trim($komentar);
				$komentar = stripslashes($komentar);
				$komentar = htmlspecialchars($komentar);
				//$vemail = test_input($_POST['email']);
				//$comment = test_input($_POST['komentar']);
		echo $nama;
			/*
				if(empty($email)){
					$emailErr = "Email harus diisi";
					$validEmail = "";
				}
				else{
					if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)){
						$emailErr = "Format email tidak sesuai!";
						$validEmail = "";
					}
					else{
						$validEmail = "sukses";
					}
				}
				if(empty($komentar)){
					$commentErr = "Komentar harus diisi";	
					$validComment = "";
				}
				else{
					$validComment = "sukses";
				}
			}
	

			
		if(!empty($validEmail) and !empty($validComment))
			{
				$this->guest_model->entry_insert();
			}
*/	
		//}
}


	function login(){
		$this->load->helper('form');
		$this->load->helper('html');
		$this->load->model('guest_model');
		
		/*
		if($this->input->post('mylogin')){
			//$this->guest_model->entry_insert();
		}
		*/			
		
		$data = $this->guest_model->general();
		$this->load->view('guest_adminlogin', $data);	
	}

	function ceklogin(){
		
		$emailadmin = $_POST['emailadmin'];
		$password = $_POST['password'];

		if($emailadmin == 'test@gmail.com' and $password == '123123') {
			
			//daftar session email
			//session_register("email");
			session_start();
			$_SESSION['emailadmin'] = $emailadmin;
			//alihkan kehalaman admin
			header("location:goadmin");
		} else {
			
			//jika tidak benar, cetak pesan kesalahan
			echo "Email atau Password Salah!";
		}
	}

	function goadmin(){
		session_start();
		//cek apakah session email terdaftar
		//jika tidak alihkan ke halaman login (uasindex.php)
		if(!isset($_SESSION['emailadmin'])){
			header("location:login");
		}

		$this->load->library('table');
		$this->load->helper('html');
		$this->load->model('guest_model');

		$data = $this->guest_model->general();
		$data['query'] = $this->guest_model->guest_getall();
  		$this->load->view('guest_admin', $data);
	}

	function logout(){
		session_start();
		//hapus session
		session_destroy();
		//alihkan kehalaman login (uasindex.php)
		header("location:login");
	}	
	
	function del($id){
		$this->load->library('table');
		$this->load->helper('html');
		$this->load->model('guest_model');
		
		if((int)$id >0){
			$this->guest_model->delete($id);
		}
		$data = $this->guest_model->general();
		$data['query'] = $this->guest_model->guest_getall();
		$this->load->view('guest_admin', $data);
	}

	function appr($id){
		$this->load->library('table');
		$this->load->helper('html');
		$this->load->model('guest_model');
		
		if((int)$id >0){
			$this->guest_model->approve($id);
		}
		$data = $this->guest_model->general();
		$data['query'] = $this->guest_model->guest_getall();
		$this->load->view('guest_admin', $data);
	}
}
?>