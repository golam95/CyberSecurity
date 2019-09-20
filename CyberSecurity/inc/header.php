
<?php 
include_once 'lib/Database.php';
include_once 'helpers/Format.php';
include 'lib/Session.php'; 
Session::init();
?>

<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>


             <?php 
			      if (isset($_GET['uid'])) {
			      	$userid= Session::get("id");
			      	Session::destroy();
			      }

			  ?>

<!DOCTYPE HTML>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Curious CyberSecurity </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<link href="css/bootstrap-responsive.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="color/default.css" rel="stylesheet">
	<link rel="shortcut icon" href="img/favicon.ico">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
	
</head>

<body>
	<!-- navbar -->
	<div class="navbar-wrapper">
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<!-- Responsive navbar -->
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
				</a>
					<h1 class="brand"><a style="font-size:24px;" href="index.php">Curious CyberSecurity</a></h1>
					<!-- navigation -->
					<nav class="pull-right nav-collapse collapse">
						<ul id="menu-main" class="nav">
						
						    <li><a title="team" href="index.php">Home</a></li>
							<li><a title="team" href="#services">services</a></li>
							<li><a title="contact" href="#blog">Our Approach</a></li>
							<li><a title="contact" href="#contact">Location</a></li>
							<li><a title="contact" href="#contact">Contact Us</a></li>
							
						<?php
						$login= Session::get("userlogin");
						if ($login==false) {
			           ?>
						
						    <li><a title="blog" href="login.php">Log In</a></li>
							<li><a href="reg.php">Sign Up</a></li>
							
						<?php }else {?>
							
							<li><a href="booking.php">Booking</a></li>
							<li><a href="viewbooking.php">Details</a></li>
							<li>
							
							<div style="background-color:black;" class="dropdown">
							  <a style="color:#FFFFFF;font-weight:bold;" class="btn btn-secondary dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profile
							  </a>
							  
							  
							  <div style="width:30px;background-color:#FFFFFF;" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								<a style="color:black;font-size:14px;font-weight:bold;" class="dropdown-item" href="updateprofile.php?updateInfo_reg=<?php echo(Session::get('id'));?>"><?php echo(Session::get("username"));?></a></br>
								<a style="color:black;font-size:14px;font-weight:bold;" class="dropdown-item" href="?uid=<?php echo(Session::get('id')); ?>"> Logout</a>
							  </div>
					      
   						    </div>
							
							</li>
							
						<?php } ?>
						
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<!-- Header area -->