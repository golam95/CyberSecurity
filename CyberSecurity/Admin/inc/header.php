 <?php 
include_once '../lib/Database.php';
include_once '../helpers/Format.php';
include '../lib/Session.php'; 
Session::init();
$db=new Database();
$fm=new Format();

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
	<link href="../css/bootstrap-responsive.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">
	<link href="../color/default.css" rel="stylesheet">
	
	
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
					<h1 class="brand"><a href="index.php">Admin Dashboard</a></h1>
					<!-- navigation -->
					<nav class="pull-right nav-collapse collapse">
						<ul id="menu-main" class="nav">
						
						<?php
						$login= Session::get("adminlogin");
						if ($login==true) {
			           ?>
						
						
						<li><a title="Customer" href="viewcustomerInfo.php">Customer</a></li>
							<li><a title="Booking" href="viewbookingInfo.php">Booking</a></li>
							<li><a title="Training" href="viewSession.php">Training session</a></li>
							<li><a title="contact Info" href="index.php">ContactInfo</a></li>
							
							
							<li><a title="contact Info" href="updateadminprofile.php?updateInfo_reg=<?php echo(Session::get('adminId'));?>"><?php echo(Session::get("adminusername"));?></a></li>
							
							<li><a title="contact Info" href="?uid=<?php echo(Session::get('adminId')); ?>">Logout</a></li>
							
							
						<?php } ?>
							
							
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<!-- Header area -->