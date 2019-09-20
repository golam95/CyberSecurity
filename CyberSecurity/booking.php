	
	<?php 
	include("inc/header.php"); 
	?>
	
	<?php
		$login= Session::get("userlogin");
		if ($login==false) {
		   header("Location:login.php");
		}
     ?>
	 
	 
	<section id="blog" class="section">
		<div class="container">
			<h4>Our Training Session</h4>
			<!-- Three columns -->
			
			<form action="" method="POST">
			
			<div class="row">
			
			<?php 
			      $db=new Database();
				    $query = "SELECT * FROM session";
					$msg=$db->select($query);
					if ($msg) {
						
						while ($result=$msg->fetch_assoc()) {
						
					 ?>
			
			
				<div class="span3">
					<div class="home-post">
						
						<div class="post-meta">
							<i class="icon-file icon-2x"></i>
							<span class="date"><?php echo($result['s_date']);?></span>
							<span class="tags"><a href="#">Take</a>, <a href="#">Course</a></span>
						</div>
						<div class="entry-content">
							<h5><strong><a href="#"><?php echo($result['s_name']);?></a></strong></h5>
							<p>
								<?php echo($result['s_des']);?>
							</p>
							<a href="bookingsubmit.php?booked=<?php echo($result['s_id']);?>" style="color:red;font-weight:bold;font-size:14px;" class="more">Booking</a>
						</div>
					</div>
				</div>
				<?php } }?>
			</div>
		</form>
		</div>
	</section>
	
	
	<?php include("footer/foot.php"); ?>
	
	
	
	
	
	
	
	
	
	
	
	
	

	
	
	
	