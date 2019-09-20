
	 <?php include("inc/header.php"); ?>
	 <?php include("slider/sl.php"); ?>
	
	
	<?php 
	
	$fm=new Format();
	$db=new Database();
	  
	if ($_SERVER['REQUEST_METHOD']=='POST') {
		
		$contactName=$fm->validation($_POST['c_name']);
		$contactEmail=$fm->validation($_POST['c_email']);
		$contactSubject=$fm->validation($_POST['c_subject']);
		$contactMessage=$fm->validation($_POST['c_message']); 
		
		$contactName=mysqli_real_escape_string($db->link,$contactName);
		$contactEmail=mysqli_real_escape_string($db->link,$contactEmail);
		$contactSubject=mysqli_real_escape_string($db->link,$contactSubject);
		$contactMessage=mysqli_real_escape_string($db->link,$contactMessage);
		$date = date('Y-m-d');
		$error="";
		
	 if (empty($contactName)||empty($contactEmail)||empty($contactSubject)||empty($contactMessage)) {
		
		  echo '<script language="javascript">';
		  echo 'alert("Field must not be empty!")';
		  echo '</script>';
	
	}else{
		
		  $query = "INSERT INTO contact(c_name,c_email,c_subject,c_message,c_date)   
           VALUES('$contactName','$contactEmail','$contactSubject','$contactMessage','$date')"; 
          $inserted_rows = $db->insert($query);    
          if ($inserted_rows) { 

			  echo '<script language="javascript">';
			  echo 'alert("We will contact you as soon as possible!")';
			  echo '</script>';		  
		  
          }else {  
		  
			  echo '<script language="javascript">';
			  echo 'alert("Sorry somethig wrong!")';
			  echo '</script>';	
            
          }		
	   }
	 } 
 ?>

	
	<!-- spacer section -->
	<section class="spacer green">
		<div class="container">
			<div class="row">
				<div class="span6 alignright flyLeft">
					<blockquote class="large">
						There's huge space beetween creativity and imagination <cite>Mark Simmons, Nett Media</cite>
					</blockquote>
				</div>
				<div class="span6 aligncenter flyRight">
					<i class="icon-coffee icon-10x"></i>
				</div>
			</div>
		</div>
	</section>
	<!-- end spacer section -->
	<!-- section: team -->
	<section id="about" class="section">
		<div class="container">
			<h4>About Us</h4>
			<div class="row">
				<div class="span4 offset1">
					<div>
						<h2>We live with <strong>creativity</strong></h2>
						<p>
							Cybersecurity is the protection of internet-connected systems, including hardware, software and data, from cyberattacks.

In a computing context, security comprises cybersecurity and physical security -- both are used by enterprises to protect against unauthorized access to data centers and other computerized systems. Information security, which is designed to maintain the confidentiality, integrity and availability of data, is a subset of cybersecurity.

	
						</p>
					</div>
				</div>
				<div class="span6">
					<div class="aligncenter">
						<img src="img/icons/creativity.png" alt="" />
					</div>
				</div>
			</div>
			<div class="row">
				<div class="span2 offset1 flyIn">
					<div class="people">
						<img class="team-thumb img-circle" src="img/team/img-1.jpg" alt="" />
						<h3>John Doe</h3>
						<p>
							Malware Analyst
						</p>
					</div>
				</div>
				<div class="span2 flyIn">
					<div class="people">
						<img class="team-thumb img-circle" src="img/team/img-2.jpg" alt="" />
						<h3>Mike Doe</h3>
						<p>
						   Information Security Analyst
						</p>
					</div>
				</div>
				<div class="span2 flyIn">
					<div class="people">
						<img class="team-thumb img-circle" src="img/team/img-3.jpg" alt="" />
						<h3>Neil Doe</h3>
						<p>
							Incident Responder
						</p>
					</div>
				</div>
				<div class="span2 flyIn">
					<div class="people">
						<img class="team-thumb img-circle" src="img/team/img-4.jpg" alt="" />
						<h3>Mark Joe</h3>
						<p>
							Network Security Engineer
						</p>
					</div>
				</div>
				<div class="span2 flyIn">
					<div class="people">
						<img class="team-thumb img-circle" src="img/team/img-5.jpg" alt="" />
						<h3>Stephen B</h3>
						<p>
							Forensic Analyst
						</p>
					</div>
				</div>
			</div>
		</div>
		<!-- /.container -->
	</section>
	<!-- end section: team -->
	<!-- section: services -->
	<section id="services" class="section orange">
		<div class="container">
			<h4>Services</h4>
			<!-- Four columns -->
			<div class="row">
				<div class="span3 animated-fast flyIn">
					<div class="service-box">
						<img src="img/icons/laptop.png" alt="" />
						<h2>Network Security </h2>
						<p>
							
Network security is any activity designed to protect the usability and integrity of your network and data. 
						</p>
					</div>
				</div>
				<div class="span3 animated flyIn">
					<div class="service-box">
						<img src="img/icons/lab.png" alt="" />
						<h2>Information Security </h2>
						<p>
							Information Security is any activity designed to protect the usability and integrity of your network and data. 
						</p>
					</div>
				</div>
				<div class="span3 animated-fast flyIn">
					<div class="service-box">
						<img src="img/icons/camera.png" alt="" />
						<h2>Incident Responder</h2>
						<p>
							Information Security is any activity designed to protect the usability and integrity of your network and data. 
						</p>
					</div>
				</div>
				<div class="span3 animated-slow flyIn">
					<div class="service-box">
						<img src="img/icons/basket.png" alt="" />
						<h2>Forensic Analyst</h2>
						<p>
							Information Security is any activity designed to protect the usability and integrity of your network and data. 
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end section: services -->
	
	
	<section class="spacer bg3">
		<div class="container">
			<div class="row">
				<div class="span12 aligncenter flyLeft">
					<blockquote class="large">
						We are an established and trusted web Curious CyberSecurity  with a reputation for commitment and high integrity
					</blockquote>
				</div>
				<div class="span12 aligncenter flyRight">
					<i class="icon-rocket icon-10x"></i>
				</div>
			</div>
		</div>
	</section>
	
	
	<section id="blog" class="section">
		<div class="container">
			<h4>Our Approach</h4>
			<!-- Three columns -->
			<div class="row">
				<div class="span3">
					<div class="home-post">
						<div class="post-image">
							<img class="max-img" src="img/blog/img1.jpg" alt="" />
						</div>
						<div class="post-meta">
							<i class="icon-file icon-2x"></i>
							<span class="date">April 27, 2019</span>
							
						</div>
						<div class="entry-content">
							<h5><strong><a href="#">To provide data security</a></strong></h5>
							<p>
								Lorem Ipsum is simply dummy text of the printing and typesetting industry. &hellip;
							</p>
							<a href="#" class="more">Read more</a>
						</div>
					</div>
				</div>
				<div class="span3">
					<div class="home-post">
						<div class="post-image">
							<img class="max-img" src="img/blog/img2.jpg" alt="" />
						</div>
						<div class="post-meta">
							<i class="icon-file icon-2x"></i>
							<span class="date">April 27, 2019</span>
							
						</div>
						<div class="entry-content">
							<h5><strong><a href="#">To provide data security</a></strong></h5>
							<p>
								Lorem Ipsum is simply dummy text of the printing and typesetting industry. &hellip;
							</p>
							<a href="#" class="more">Read more</a>
						</div>
					</div>
				</div>
				<div class="span3">
					<div class="home-post">
						<div class="post-image">
							<img class="max-img" src="img/blog/img3.jpg" alt="" />
						</div>
						<div class="post-meta">
							<i class="icon-file icon-2x"></i>
							<span class="date">April 27, 2019</span>
							
						</div>
						<div class="entry-content">
							<h5><strong><a href="#">To provide data security</a></strong></h5>
							<p>
								Lorem Ipsum is simply dummy text of the printing and typesetting industry. &hellip;
							</p>
							<a href="#" class="more">Read more</a>
						</div>
					</div>
				</div>
				<div class="span3">
					<div class="home-post">
						<div class="post-image">
							<img class="max-img" src="img/blog/img4.jpg" alt="" />
						</div>
						<div class="post-meta">
							<i class="icon-file icon-2x"></i>
							<span class="date">June 27, 2013</span>
						</div>
						<div class="entry-content">
							<h5><strong><a href="#">To provide data security</a></strong></h5>
							<p>
								Lorem Ipsum is simply dummy text of the printing and typesetting industry. &hellip;
							</p>
							<a href="#" class="more">Read more</a>
						</div>
					</div>
				</div>
			</div>
			<div class="blankdivider30"></div>
			<div class="aligncenter">
				<a href="#" class="btn btn-large btn-theme">Read More</a>
			</div>
		</div>
	</section>
	

	<!-- end spacer section -->
	<!-- section: contact -->
	<section id="contact" class="section green">
		<div class="container">
			<h4>Get in Touch</h4>
			<p>
				See Our services and join our cyber security area.That are available
			</p>
			<div class="blankdivider30">
			</div>
			<div class="row">
				<div class="span12">
					<div class="cform" id="contact-form">
						<div id="sendmessage">Your message has been sent. Thank you!</div>
						<div id="errormessage"></div>
						
						<form action="" method="POST" class="contactForm">
						
							<div class="row">
								<div class="span6">
									
									<div class="field your-name form-group">
										<input type="text" class="form-control" name="c_name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
										<div class="validation"></div>
									</div>
									
									
									<div class="field your-email form-group">
										<input type="text" class="form-control" name="c_email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
										<div class="validation"></div>
									</div>
									
									
									<div class="field subject form-group">
										<input type="text" class="form-control" name="c_subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
										<div class="validation"></div>
									</div>
								</div>
								<div class="span6">
									<div class="field message form-group">
										<textarea class="form-control" name="c_message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
										<div class="validation"></div>
									</div>
									<input type="submit" value="Send message" class="btn btn-theme pull-left">
								</div>
								
							</div>
						</form>
					</div>
				</div>
				<!-- ./span12 -->
			</div>
		</div>
		
		<div style="margin-left:100px;" class="alignmentmap">
		
		<iframe style="width:1200px;height:300px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d673607.6340751307!2d-104.44001811743372!3d48.738351336759585!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5321f600f5170943%3A0x94f2e8e71e1dfc7a!2sE+Comertown+Rd%2C+Westby%2C+MT+59275%2C+USA!5e0!3m2!1sen!2sin!4v1467080368135"  allowfullscreen></iframe>
		</div>
		
		
	</section>
	
	
	
	
	
	
	
	
    <?php include("footer/foot.php"); ?>
	

