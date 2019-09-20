	
	<?php include("inc/header.php"); ?>
	
	<?php
		$login= Session::get("adminlogin");
		if ($login==false) {
		   header("Location:login.php");
		}
     ?>
	 
	 <?php 
	 
		$id = $_GET['updateid'];
		$db = new database();
		$query = "SELECT * FROM contact WHERE c_id ='$id'";
		$getData = $db->select($query)->fetch_assoc();
		$date = date('Y-m-d');
		
		
if ($_SERVER['REQUEST_METHOD']=='POST'&& isset($_POST['updatecontactInfo'])) {
	
		$Name=mysqli_real_escape_string($db->link,$_POST['c_name']);
		$SurName=mysqli_real_escape_string($db->link,$_POST['c_email']);
		$TypeBusiness=mysqli_real_escape_string($db->link,$_POST['c_subject']);
		$password=mysqli_real_escape_string($db->link,$_POST['c_message']);
		
		if ($Name==""||$SurName==""||$TypeBusiness==""||$password=="") {
			
			$error="Field must not be Empty!!!";
		
		 }else{
				$query = "UPDATE contact
				SET
				c_name = '$Name',
				c_email = '$SurName',
				c_subject = '$TypeBusiness',
				c_message ='$password'
				WHERE c_id = $id";
				$update = $db->update($query);
				  if ($update) {  
				   $msg="Update  Contact Information!!" ;  
				  }else {   
				   $error="Opps,Sorry Not Update !!" ;  
				 } 
		   }
      } 
	
	?>
	 
	 
	<section id="blog" class="section">
		<div class="container">
			<h6 style="font-size:25px;margin-left:220px;">Update Booking Info</h6>
		    <p style="font-size:15px;margin-left:220px;"><?php echo $getData['c_email']?></p>
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
			  <input style="height:40px;width:700px;" class="form-control1" type="text" name="c_name" value="<?php echo $getData['c_name']?>" placeholder="Enter session name"/>
		 </div> 
		
			<div style="margin-left:250px;" class="form-group1">
			  <label for="inputUserName">Email</label>
			  <input style="height:40px;width:700px;" class="form-control1" type="text" name="c_email" value="<?php echo $getData['c_email']?>" placeholder="Enter session description"/>
			 </div> 
			
			 <div style="margin-left:250px;" class="form-group1">
			  <label for="inputUserName">Subject</label>
			  <input style="height:40px;width:700px;" class="form-control1" type="text" name="c_subject" value="<?php echo $getData['c_subject']?>" placeholder="Enter session description"/>
			 </div> 
			 
			  <div style="margin-left:250px;" class="form-group1">
			  <label for="inputUserName">Message</label>
			  <input style="height:40px;width:700px;" class="form-control1" type="text" name="c_message" value="<?php echo $getData['c_message']?>" placeholder="Enter password"/>
			 </div> 
			 
			 <button style="margin-left:250px;" type="submit" name="updatecontactInfo" class="btn btn-primary">Update</button>
		  </form>
			
			</div>
		</div>
	</section>
	
	   <?php include("footer/foot.php"); ?>
	
	