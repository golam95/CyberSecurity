
	 <?php include("inc/header.php"); ?>
	 <?php
		$login= Session::get("adminlogin");
		if ($login==false) {
		   header("Location:login.php");
		}
     ?>
	 
	      <?php 
                if (isset($_GET['delid'])) {
                	$delid=$_GET['delid'];
                	$delquery="delete from regstration where r_id='$delid'";
                	$deldmsg=$db->delete($delquery);
                }
           ?>
	
	<section id="blog" class="section">
		
		<div class="container">
		  
		  <p style="margin-left:90px;">Show all Contact Info:</p>            
		 
		  <table style="width:90%;margin-left:90px;margin-bottom:320px;" class="table table-hover">
			<thead>
			  <tr>
				<th>Name</th>
				<th>Email</th>
				<th>Subject</th>
				<th>Message</th>
				<th>Date</th>
				<th>Action</th>
			  </tr>
			</thead>
			
			<?php 
				    $query = "SELECT * FROM regstration";
					$msg=$db->select($query);
					if ($msg) {
						while ($result=$msg->fetch_assoc()) {
					 ?>
			
			<tbody>
			  <tr>
				<td><?php echo($result['r_firstname']);?></td>
				<td><?php echo($result['r_surname']);?></td>
				<td><?php echo($result['r_businessname']);?></td>
				<td><?php echo($result['r_jobtitle']);?></td>
				<td><?php echo($result['t_interested']);?></td>
				<td><?php echo($result['email']);?></td>
				<td><?php echo($result['date']);?></td>
				
				<td>
				
				<a style="font-weight:bold;color:red;" href="?delid=<?php echo($result['r_id']); ?>">Delete</a>
				<a style="font-weight:bold;color:green;" href="updatecustomerInfo.php?updateid=<?php echo($result['r_id']); ?>">Update</a>
				</td>
				
				 <?php }}?>
				  
			  </tr>
			  
			</tbody>
		  </table>
		   
		</div>
		

	</section>
	
	
	
<?php include("footer/foot.php"); ?>