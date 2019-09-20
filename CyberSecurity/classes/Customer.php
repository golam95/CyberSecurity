<?php 
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php'); 
include_once ($filepath.'/../lib/Session.php');
Session::init();
 ?>
 <style>
 .success{color:green;}
 .error{color:red;}
 </style>
<?php 
class Customer{
	private $db;
	private $fm;
	public function __construct(){
		
		$this->db=new Database();
		$this->fm=new Format();	
	}
	
	public function userLogin($email,$password){
		
		$email=$this->fm->validation($email);
		$password=$this->fm->validation($password);
		
		$email=mysqli_real_escape_string($this->db->link,$email);
		$password=mysqli_real_escape_string($this->db->link,$password);
		
		if (empty($email)||empty($password)){
			
			$msg= "<span class='error'> Field must not be empty </span>";
			
		}	
	   $query="select * from regstration where email ='$email' and password ='$password'";
		$result=$this->db->select($query);
		if ($result!=false) {
			
			$value=$result->fetch_assoc();
			Session::set("userlogin",true);
			Session::set("username",$value['r_firstname']);
			Session::set("id",$value['r_id']);
			Session::set("email",$value['email']);
			
			header("Location: index.php");
			
		}else{
			
			$loginmsg= "<span class='error'> Sorry,Invalid Email or password!</span>";
			return $loginmsg;
			
			header("Location: login.php");
			
			
		}

	}

}
 ?>