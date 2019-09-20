<?php
	$con=mysqli_connect("localhost", "root", "");
	$query="drop database if exists CyberSecurity";
	$result=(mysqli_query($con,$query));
	
	$query="create database CyberSecurity";
	$result=(mysqli_query($con,$query));
	$con=mysqli_connect("localhost", "root", "","CyberSecurity");
	
	$query = "CREATE TABLE `admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `a_email` varchar(100) DEFAULT NULL,
  `a_password` varchar(100) DEFAULT NULL,
  `a_name` varchar(100) DEFAULT NULL,
   PRIMARY KEY (`id`)
  )";
  
   $result=(mysqli_query($con,$query));
   
   $query="INSERT INTO `admin`(`id`, `a_email`, `a_password`, `a_name`) VALUES (1, 'admin@gmail.com', 1234, 'admin')";
    
   $result=(mysqli_query($con,$query));
   
   $query = "CREATE TABLE `booking` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `b_name` varchar(100) DEFAULT NULL,
  `b_des` varchar(100) DEFAULT NULL,
  `b_date` varchar(100) DEFAULT NULL,
   PRIMARY KEY (`id`)
  )";
  
   $result=(mysqli_query($con,$query));
   
   $query = "CREATE TABLE `contact` (
  `c_id` int(10) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(100) DEFAULT NULL,
  `c_email` varchar(100) DEFAULT NULL,
  `c_subject` varchar(100) DEFAULT NULL,
  `c_message` varchar(100) DEFAULT NULL,
  `c_date` varchar(100) DEFAULT NULL,
   PRIMARY KEY (`c_id`)
  )";
  $result=(mysqli_query($con,$query));
   
   $query = "CREATE TABLE `regstration` (
  `r_id` int(10) NOT NULL AUTO_INCREMENT,
  `r_firstname` varchar(100) DEFAULT NULL,
  `r_surname` varchar(100) DEFAULT NULL,
  `r_businessname` varchar(100) DEFAULT NULL,
  `r_jobtitle` varchar(100) DEFAULT NULL,
  `t_interested` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `r_code` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
   PRIMARY KEY (`r_id`)
  )";
  $result=(mysqli_query($con,$query));
   
    
   $query = "CREATE TABLE `session` (
  `s_id` int(10) NOT NULL AUTO_INCREMENT,
  `s_name` varchar(100) DEFAULT NULL,
  `s_date` varchar(100) DEFAULT NULL,
  `s_des` varchar(100) DEFAULT NULL,
   PRIMARY KEY (`s_id`)
  )";
  $result=(mysqli_query($con,$query));
 

   if($result){
	
	echo "<div id='text' style='padding-left:40%;background-color:orange;'><h1 style='padding-left:10%;'>Congrats</h1><h2>Database has been created successfully!</h2></div>";
			
	}else{
			
	 "Sorry Error Create Database....!!".mysqli_error($con);
		
	}
	
	
?>