
 <?php include("inc/head.php"); ?>
 <?php 
 $db=new Database();
 $fm=new Format();
 ?>
 
 <?php 
	if ($_SERVER['REQUEST_METHOD']=='POST') {
		
		$reg_firstname=$fm->validation($_POST['firstname']);
		$reg_surname=$fm->validation($_POST['surname']);
		$reg_bussinessname=$fm->validation($_POST['bussinessname']);
		$reg_jobtitle=$fm->validation($_POST['jobtitle']);
		$reg_email=$fm->validation($_POST['email']);
		$reg_interested=$fm->validation($_POST['interested']);
		$reg_accept=$fm->validation($_POST['accept']);
		$reg_password=$fm->validation($_POST['password']);
		
		
		$reg_firstname=mysqli_real_escape_string($db->link,$reg_firstname);
		$reg_surname=mysqli_real_escape_string($db->link,$reg_surname);
		$reg_bussinessname=mysqli_real_escape_string($db->link,$reg_bussinessname);
		$reg_jobtitle=mysqli_real_escape_string($db->link,$reg_jobtitle);
		$reg_email=mysqli_real_escape_string($db->link,$reg_email);
		$reg_interested=mysqli_real_escape_string($db->link,$reg_interested);
		$reg_accept=mysqli_real_escape_string($db->link,$reg_accept);
		$reg_password=mysqli_real_escape_string($db->link,$reg_password);
		$date = date('Y-m-d');
		$error="";
		
	 if (empty($reg_firstname)||empty($reg_surname)||empty($reg_bussinessname)||empty($reg_jobtitle)||empty($reg_email)||empty($reg_interested)||empty($reg_password)) {
	 	$error="Sorry,Empity field found!!";
	
	 } elseif (empty($reg_accept)) {
	 	$error="Please check accept the aggrement options";
	  
	}else{
		
		    $text=substr($reg_email,0,3);
			$rand=rand(100,999);
			$newpass="$text$rand";
			$code=($newpass);
		
		$query = "SELECT email FROM regstration WHERE email = '$reg_email'";
		$check_NID = $db->select($query);
		if($check_NID){
			 $error="Sorry email address is alredy exit!!!" ; 
		}else{
		  $query = "INSERT INTO regstration(r_firstname,r_surname,r_businessname 
          ,r_jobtitle,t_interested,email,date,r_code,password)   
           VALUES('$reg_firstname','$reg_surname','$reg_bussinessname','$reg_jobtitle','$reg_interested','$reg_email','$date','$code','$reg_password')"; 
          $inserted_rows = $db->insert($query);    
          if ($inserted_rows) {  
           $msg="Registration is successful!!" ;  
          }else {   
            $error="Sorry,Something wrong!!" ;  
			
          }		
		}
	   }
	 } 
 ?>


	 
<body>
<div class="signup-form">

    <form action="" method="POST">
		<h2>Sign Up</h2>
		<p>Please fill in this form to create an account!</p>
		<hr>
		
		
		 <div class="form-group">
	       <?php 
				if (isset($error)) {
					
					echo("<span style='color: red;margin-left:50px;font-weight:bold;'>$error</span>");
				}
				if (isset($msg)) {
					
					echo("<span style='color: green;margin-left:50px;font-weight:bold;'>$msg</span>");
				}
			  ?>
	       </div>
		   
		
        <div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user"></i></span>
				<input type="text" class="form-control" name="firstname" placeholder="First Name" required="required">
			</div>
        </div>
		
		
        <div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-paper-plane"></i></span>
				<input type="text" class="form-control" name="surname" placeholder="SurName " required="required">
			</div>
        </div>
		
		
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-lock"></i></span>
				<input type="text" class="form-control" name="bussinessname" placeholder="BusinessName" required="required">
			</div>
        </div>
		
		
		
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon">
					<i class="fa fa-lock"></i>
					<i class="fa fa-check"></i>
				</span>
				<input type="text" class="form-control" name="jobtitle" placeholder="Job Title " required="required">
			</div>
        </div>
		
		
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon">
					<i class="fa fa-lock"></i>
					<i class="fa fa-check"></i>
				</span>
				<input type="email" class="form-control" name="email" placeholder="Enter Email Address " required="required">
			</div>
        </div>
		
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon">
					<i class="fa fa-lock"></i>
					<i class="fa fa-check"></i>
				</span>
				<input type="password" class="form-control" name="password" placeholder="Enter password" required="required">
			</div>
        </div>
		
		
		
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon">
					<i class="fa fa-lock"></i>
					<i class="fa fa-check"></i>
				</span>
				 <select class="form-control" name="interested">
				 
				    <option>--/--</option>
					
					
					<?php 
                           $query = "SELECT * FROM session";
					      $msg=$db->select($query);
					      if ($msg) {
						    while ($result=$msg->fetch_assoc()) {
                         ?>
					<option><?php echo($result['s_name']) ?></option>
					
						  <?php } }?>
							 
				  </select>
			</div>
        </div>
		
        <div class="form-group">
			<label class="checkbox-inline"><input type="checkbox" name="accept" required="required"> I accept the <a href="terms.php">Terms of Use</a> &amp; <a href="terms.php">Privacy Policy</a></label>
		</div>
	
		<div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg">Sign Up</button>
        </div>
    </form>
	<div class="text-center">Already have an account? <a href="login.php">Login here</a><a style="margin-left:10px;" href="index.php">Home</a></div>
</div>
</body>
</html>                            