	
	<?php include("inc/header.php"); ?>
	
	<?php
		$login= Session::get("adminlogin");
		if ($login==false) {
		   header("Location:login.php");
		}
     ?>
	 
	 <?php 
	 
		$id = $_GET['updateInfo_reg'];
		$db = new database();
		$query = "SELECT * FROM admin WHERE id ='$id'";
		$getData = $db->select($query)->fetch_assoc();
		$date = date('Y-m-d');
		
		
if ($_SERVER['REQUEST_METHOD']=='POST'&& isset($_POST['updateadmin'])) {
	
	
		$Name=mysqli_real_escape_string($db->link,$_POST['a_name']);
		$password=mysqli_real_escape_string($db->link,$_POST['apassword']);
		

		if ($Name==""||$password=="") {
			
			$error="Field must not be Empty!!!";
		
		 }else{
				$query = "UPDATE admin
				SET
				a_password = '$password',
				a_name = '$Name'
				WHERE id = $id";
				$update = $db->update($query);
				  if ($update) {  
				   $msg="Update  Admin Information!!" ;  
				  }else {   
				   $error="Opps,Sorry Not Update !!" ;  
				 } 
		   }
      } 
	
	?>
	 
	 
	<section id="blog" class="section">
		<div class="container">
			<h6 style="font-size:25px;margin-left:220px;">Update profile</h6>
		    <p style="font-size:15px;margin-left:220px;"><?php echo $getData['a_email']?></p>
			<div class="row">
				
	   <form action="" method="POST">
	   
	   
	   <div class="form-group">
	       <?php 
				if (isset($error)) {
					
					echo("<span style='color: red;margin-left:250px;font-weight:bold;'>$error</span>");
				}
				if (isset($msg)) {
					
					echo("<span style='color: green;margin-left:250px;font-weight:bold;'>$msg</span>");
				}
			  ?>
	       </div>
		 
		 <div style="margin-left:250px;" class="form-group1">
			  <label for="inputUserName">Name</label>
			  <input style="height:40px;width:700px;" class="form-control1" type="text" name="a_name" value="<?php echo $getData['a_name']?>" placeholder="Enter session name"/>
		 </div> 
			 
			 <div style="margin-left:250px;" class="form-group1">
			  <label for="inputUserName">Password</label>
			  <input style="height:40px;width:700px;" class="form-control1" type="password" name="apassword" value="<?php echo $getData['a_password']?>" placeholder="Enter password"/>
			 </div> 
			 
			 <button style="margin-left:250px;" type="submit" name="updateadmin" class="btn btn-primary">Update</button>
		  </form>
			
			</div>
		</div>
	</section>
	
	
	   <?php include("footer/foot.php"); ?>
	
	