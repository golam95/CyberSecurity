	
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
	 
		$id = $_GET['booked'];
		$db = new database();
		$query = "SELECT * FROM session WHERE s_id ='$id'";
		$getData = $db->select($query)->fetch_assoc();
		$date = date('Y-m-d');
		
		
     if ($_SERVER['REQUEST_METHOD']=='POST'&& isset($_POST['booked'])) {
		 
		$customerName=mysqli_real_escape_string($db->link,$_POST['c_name']);
		$customerEmail=mysqli_real_escape_string($db->link,$_POST['c_email']);
		$sessionName=mysqli_real_escape_string($db->link,$_POST['s_name']);
		$sessionDescription=mysqli_real_escape_string($db->link,$_POST['des']);
		
        if ($customerName==""||$customerEmail==""||$sessionName==""||$sessionDescription=="") {
			  
			  echo '<script language="javascript">';
			  echo 'alert("Sorry,Field must not be empty!")';
			  echo '</script>';
			  
		
		 }else{
			
		  $query = "INSERT INTO booking(name,email,b_name,b_des,b_date)   
           VALUES('$customerName','$customerEmail','$sessionName','$sessionDescription','$date')"; 
          $inserted_rows = $db->insert($query);    
          if ($inserted_rows) {  
		  
              echo '<script language="javascript">';
			  echo 'alert("We will contact with you via email as soon as possible!")';
			  echo '</script>';
		   
          }else {   
		  
              echo '<script language="javascript">';
			  echo 'alert("Sorry,Something wrong!")';
			  echo '</script>';
		  
          }	
			
		  }
      } 
	
	?>
	 
	 
	<section id="blog" class="section">
		<div class="container">
			<h6 style="font-size:25px;margin-left:220px;">Booking the area of cyber security interest</h6>
		  <a style="margin-left:220px;font-size:16px;font-weight:bold;color:green;" href="viewbooking.php">+ View Booking</a>
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
				  <label for="inputUserName">Customer Name</label>
				  <input style="height:40px;width:700px;" class="form-control1" type="text" name="c_name" value="<?php echo(Session::get('username'));?>" placeholder="Enter session name"/>
			 </div> 
			  
			 
			<div style="margin-left:250px;" class="form-group1">
			  <label for="inputUserName">Customer Email</label>
			  <input style="height:40px;width:700px;" class="form-control1" type="text" name="c_email" value="<?php echo(Session::get('email'));?>" placeholder="Enter session description"/>
			 </div> 
			 
			 
			 <div style="margin-left:250px;" class="form-group1">
			  <label for="inputUserName">Session Name</label>
			  <input style="height:40px;width:700px;" class="form-control1" type="text" name="s_name" value="<?php echo $getData['s_name']?>" placeholder="Enter session description"/>
			 </div> 
			 
			
			  <div style="margin-left:250px;" class="form-group1">
			  <label for="inputUserName">Description</label>
			  <input style="height:40px;width:700px;" class="form-control1" type="text" name="des" value="<?php echo $getData['s_des']?>" placeholder="Enter password"/>
			 </div> 
			 
			 <button style="margin-left:250px;" type="submit" name="booked" class="btn btn-primary">Booking Now</button>
		  </form>
			
			</div>
		</div>
	</section>
	
	
	<?php include("footer/foot.php"); ?>
	
	