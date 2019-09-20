	
	<?php 
	include("inc/header.php"); 
	?>
	
	<?php
		$login= Session::get("userlogin");
		if ($login==false) {
		   header("Location:login.php");
		}
     ?>
	 
	 <?php 
	 
		$id = $_GET['updateInfo_reg'];
		$db = new database();
		$query = "SELECT * FROM regstration WHERE r_id ='$id'";
		$getData = $db->select($query)->fetch_assoc();
		$date = date('Y-m-d');
		
		
if ($_SERVER['REQUEST_METHOD']=='POST'&& isset($_POST['updateprofile'])) {
	
		$Name=mysqli_real_escape_string($db->link,$_POST['r_name']);
		$SurName=mysqli_real_escape_string($db->link,$_POST['r_sur']);
		$TypeBusiness=mysqli_real_escape_string($db->link,$_POST['r_typebisness']);
		$password=mysqli_real_escape_string($db->link,$_POST['cuspassword']);
		

		if ($Name==""||$SurName==""||$TypeBusiness==""||$password=="") {
			
			$error="Field must not be Empty!!!";
		
		 }else{
				$query = "UPDATE regstration
				SET
				r_firstname = '$Name',
				r_surname = '$SurName',
				r_businessname = '$TypeBusiness',
				password ='$password'
				WHERE r_id = $id";
				$update = $db->update($query);
				  if ($update) {  
				   $msg="Update  Information!!" ;  
				  }else {   
				   $error="Opps,Sorry Not Update !!" ;  
				 } 
		   }
      } 
	
	?>
	 
	 
	<section id="blog" class="section">
		<div class="container">
			<h6 style="font-size:25px;margin-left:220px;">Update profile</h6>
		    <p style="font-size:15px;margin-left:220px;"><?php echo $getData['email']?></p>
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
			  <label for="inputUserName">First Name</label>
			  <input style="height:40px;width:700px;" class="form-control1" type="text" name="r_name" value="<?php echo $getData['r_firstname']?>" placeholder="Enter session name"/>
		 </div> 
			 
			<div style="margin-left:250px;" class="form-group1">
			  <label for="inputUserName">Sur Name</label>
			  <input style="height:40px;width:700px;" class="form-control1" type="text" name="r_sur" value="<?php echo $getData['r_surname']?>" placeholder="Enter session description"/>
			 </div> 
			 
			 <div style="margin-left:250px;" class="form-group1">
			  <label for="inputUserName">Type Business</label>
			  <input style="height:40px;width:700px;" class="form-control1" type="text" name="r_typebisness" value="<?php echo $getData['r_businessname']?>" placeholder="Enter session description"/>
			 </div> 
			 
			  <div style="margin-left:250px;" class="form-group1">
			  <label for="inputUserName">Password</label>
			  <input style="height:40px;width:700px;" class="form-control1" type="password" name="cuspassword" value="<?php echo $getData['password']?>" placeholder="Enter password"/>
			 </div> 
			 
			 <button style="margin-left:250px;" type="submit" name="updateprofile" class="btn btn-primary">Update profile</button>
		  </form>
			
			</div>
		</div>
	</section>
	
	
	<?php include("footer/foot.php"); ?>
	
	