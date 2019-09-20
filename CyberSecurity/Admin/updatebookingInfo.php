	
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
		$query = "SELECT * FROM booking WHERE id ='$id'";
		$getData = $db->select($query)->fetch_assoc();
		$date = date('Y-m-d');
		
		
if ($_SERVER['REQUEST_METHOD']=='POST'&& isset($_POST['bookingInfo'])) {
	
		$Name=mysqli_real_escape_string($db->link,$_POST['name']);
		$SurName=mysqli_real_escape_string($db->link,$_POST['email']);
		$TypeBusiness=mysqli_real_escape_string($db->link,$_POST['s_name']);
		$password=mysqli_real_escape_string($db->link,$_POST['s_des']);
		
		
		
		if ($Name==""||$SurName==""||$TypeBusiness==""||$password=="") {
			
			$error="Field must not be Empty!!!";
		
		 }else{
				$query = "UPDATE bookings
				SET
				name = '$Name',
				email = '$SurName',
				b_name = '$TypeBusiness',
				b_des ='$password'
				WHERE id = $id";
				$update = $db->update($query);
				  if ($update) {  
				   $msg="Update  Booking Information!!" ;  
				  }else {   
				   $error="Opps,Sorry Not Update !!" ;  
				 } 
		   }
      } 
	
	?>
	 
	 
	<section id="blog" class="section">
		<div class="container">
			<h6 style="font-size:25px;margin-left:220px;">Update Booking Info</h6>
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
			  <label for="inputUserName">Name</label>
			  <input style="height:40px;width:700px;" class="form-control1" type="text" name="name" value="<?php echo $getData['name']?>" placeholder="Enter session name"/>
		 </div> 
			
			<div style="margin-left:250px;" class="form-group1">
			  <label for="inputUserName">Email</label>
			  <input style="height:40px;width:700px;" class="form-control1" type="text" name="email" value="<?php echo $getData['email']?>" placeholder="Enter session description"/>
			 </div> 
			 
			 <div style="margin-left:250px;" class="form-group1">
			  <label for="inputUserName">Session Name</label>
			  <input style="height:40px;width:700px;" class="form-control1" type="text" name="s_name" value="<?php echo $getData['b_name']?>" placeholder="Enter session description"/>
			 </div> 
			 
			  <div style="margin-left:250px;" class="form-group1">
			  <label for="inputUserName">Session Description</label>
			  <input style="height:40px;width:700px;" class="form-control1" type="text" name="s_des" value="<?php echo $getData['b_des']?>" placeholder="Enter password"/>
			 </div> 
			 
			 <button style="margin-left:250px;" type="submit" name="bookingInfo" class="btn btn-primary">Update</button>
		  </form>
			
			</div>
		</div>
	</section>
	
	   <?php include("footer/foot.php"); ?>
	
	