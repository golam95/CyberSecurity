
 <?php include("inc/header.php"); ?>
 <?php
		$login= Session::get("adminlogin");
		if ($login==false) {
		   header("Location:login.php");
		}
     ?>
   
<?php 
	if ($_SERVER['REQUEST_METHOD']=='POST') {
		
		$sessin_Name=$fm->validation($_POST['s_name']);
		$session_Des=$fm->validation($_POST['s_des']);
		
		$sessin_Name=mysqli_real_escape_string($db->link,$sessin_Name);
		$session_Des=mysqli_real_escape_string($db->link,$session_Des);
		$date = date('Y-m-d');
		
		$error="";
		
	 if (empty($sessin_Name)) {
	 	$error="Session name must not be empty";
	 }elseif (!filter_var($sessin_Name,FILTER_SANITIZE_SPECIAL_CHARS)) {
	 	$error="Invalid Session name!";
	 } elseif (empty($session_Des)) {
	 	$error="Session description must not empty!";
	  
	}else{
		$query = "SELECT s_name FROM session WHERE s_name = '$sessin_Name'";
		$check_NID = $db->select($query);
		if($check_NID){
			 $error="Sorry session name is already exit!!!" ; 
		}else{
		    $query = "INSERT INTO session(s_name,s_date,s_des)   
           VALUES('$sessin_Name','$date','$session_Des')"; 
          $inserted_rows = $db->insert($query);    
          if ($inserted_rows) {  
           $msg="Add a New Position!!" ;  
          }else {   
          $error="Not Add a New Position!!" ;  
          }		
		}
	 }
	 } 
 ?>
	
	
	<section id="blog" class="section">
		
		<div class="container">
		
		<h6 style="margin-left:220px;">Add Information</h6></br>
		
		 <div class="row">
  
	     <form action="" method="POST">
		 
		 
		  <div class="form-group">
	       <?php 
				if (isset($error)) {
					
					echo("<span style='color: red;margin-left:250px;font-weight:bold;'>$error</span>");
				}
				if (isset($msg)) {
					
					echo("<span style='color: green;margin-left:230px;font-weight:bold;'>$msg</span>");
				}
			  ?>
	   </div>
		   
			 
			<div style="margin-left:250px;" class="form-group1">
			  <label for="inputUserName">Session Name</label>
			  <input style="height:40px;width:700px;" class="form-control1" type="text" name="s_name" placeholder="Enter session name"/>
			 </div> 
			 
			 
			<div style="margin-left:250px;" class="form-group1">
			  <label for="inputUserName">Description</label>
			  <input style="height:40px;width:700px;" class="form-control1" type="text" name="s_des" placeholder="Enter session description"/>
			 </div> 
			 
			 <button style="margin-left:250px;" type="submit" name="addsession" class="btn btn-primary">Add Session</button>
		  </form>
	 
   </div> 
		
		      
			</div>
	
	</section>
	   <?php include("footer/foot.php"); ?>