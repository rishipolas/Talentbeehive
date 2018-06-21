<?php 
	//session_start();

	// variable declaration
	$cname = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";
   // define('DB_PORT','3306');
	// connect to database
	$db='socialuser';
	$DB = mysqli_connect('localhost', 'roottalent', 'beehive@root', 'socialuser');
	
	
	?>