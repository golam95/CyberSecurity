	
	<?php 
	include("inc/header.php"); 
	?>
	
	<?php
		$login= Session::get("userlogin");
		$name= Session::get("username");
		if ($login==false) {
		   header("Location:login.php");
		}
     ?>
	 
	      <?php 
		       $db=new Database();
                if (isset($_GET['delid'])) {
                	$delid=$_GET['delid'];
                	$delquery="delete from booking where id='$delid'";
                	$deldmsg=$db->delete($delquery);
                }
           ?>
	 
	
	<section id="blog" class="section">
		<div class="container">
			<h6 style="font-size:25px;margin-left:100px;margin-bottom:40px;">Booking Details</h6>
		   
		   <table style="width:90%;margin-left:90px;margin-bottom:150px;" class="table table-hover">
			<thead>
			  <tr>
				<th>Name</th>
				<th>Email</th>
				<th>Session Name</th>
				<th>Date</th>
				<th>Action</th>
			  </tr>
			</thead>
			
			<?php 
			        $db=new Database();
				    $query = "SELECT * FROM booking where name='$name'";
					$msg=$db->select($query);
					if ($msg) {
						
						while ($result=$msg->fetch_assoc()) {
						
					 ?>
			
			<tbody>
			  <tr>
			  
				<td><?php echo($result['name']);?></td>
				<td><?php echo($result['email']);?></td>
				<td><?php echo($result['b_name']);?></td>
				<td><?php echo($result['b_date']);?></td>
				<td>
				
				<a style="font-weight:bold;color:red;" href="?delid=<?php echo($result['id']); ?>">Delete</a>
				
				
				</td>
				
				 <?php }} ?>
			  </tr>
			  
			</tbody>
		  </table>
		  
			
		</div>
	</section>
	
	
	<?php include("footer/foot.php"); ?>
	
	