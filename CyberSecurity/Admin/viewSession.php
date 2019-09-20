
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
                	$delquery="delete from session where s_id='$delid'";
                	$deldmsg=$db->delete($delquery);
                }
           ?>
	
	<section id="blog" class="section">
		
		<div class="container">
		  <h2 style="margin-left:90px;font-size:16px;"><a href="addsession.php">+ Add Session</a></h2>
		  <p style="margin-left:90px;">Show all training session:</p>            
		 
		  <table style="width:90%;margin-left:90px;" class="table table-hover">
			<thead>
			  <tr>
				<th>Session Name</th>
				<th>Description</th>
				<th>Date</th>
				<th>Action</th>
			  </tr>
			</thead>
			
			<?php 
				    $query = "SELECT * FROM session";
					$msg=$db->select($query);
					if ($msg) {
						
						while ($result=$msg->fetch_assoc()) {
						
					 ?>
			
			<tbody>
			  <tr>
				<td><?php echo($result['s_name']);?></td>
				<td><?php echo($result['s_des']);?></td>
				<td><?php echo($result['s_date']);?></td>
				
				<td>
				<a style="font-weight:bold;color:red;" href="?delid=<?php echo($result['s_id']); ?>">Delete</a>
				</td>
				
				 <?php }} ?>
			  </tr>
			  
			</tbody>
		  </table>
		</div>
		

	</section>
	
	
	
<?php include("footer/foot.php"); ?>