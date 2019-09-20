<?php
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Session.php');
Session::init();
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php'); 
 ?>
 
<?php 
class Adminlog extends Session{
	private $db;
	private $fm;

	public function __construct(){
		
		$this->db=new Database();
		$this->fm=new Format();
		
	}
	public function adminLogin($email,$password){
		
		$email=$this->fm->validation($email);
		$password=$this->fm->validation($password);
		$email=mysqli_real_escape_string($this->db->link,$email);
		$password=mysqli_real_escape_string($this->db->link,($password));
		
		if (empty($email)||empty($password)) {
			$logmsg="Field must not empty!!";
			return $logmsg;
		}else{
			$query="select * from admin where a_email ='$email' and a_password ='$password'";
			$result=$this->db->select($query);
			if ($result!=false) {
				$value=$result->fetch_assoc();
				Session::set("adminlogin",true);
				Session::set("adminId",$value['id']);
				Session::set("adminusername",$value['a_name']);
				Session::set("adminemail",$value['a_email']);
				header("Location: index.php");
			}else{
				$loginmsg="Sorry,Not match username and password!";
				return $loginmsg;
					header("Location: login.php");
			}

		   }
        }
}
 ?>