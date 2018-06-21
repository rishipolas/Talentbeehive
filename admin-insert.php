<?php

session_start();

if(!isset($_SESSION['userid']))
	header('location:login.php');

require_once "config1.php";	// Configuration file
$msg = "";
if(isset($_REQUEST['btnSubmit'])) {		// submit data into admin table
$name = $_REQUEST['name'];
$userid = $_REQUEST['userid'];
$password = $_REQUEST['password'];

$query = "insert into admin(name,userid,password) values('$name','$userid','$password')";	// query for insert name,userid and password into admin table
if(mysqli_query($DB,$query)){
$msg = "Record Saved!";
header("location:admin-display.php");

} else {
$msg = "Unable to Save!";
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Admin Template</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-2997357690787675",
    enable_page_level_ads: true
  });
</script>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
 <?php
 include("admin_header.php");		// include header file
 ?>
 
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
      <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Admin Insert</div>
      <div class="card-body">
       
       
       
       <!-- form starts here -->
       
        <form method="POST">
		 <div class="form-group">
		 
            <label for="exampleInputName">Name</label>	
            
            <!-- input for 'name' -->	
            
            <input class="form-control" pattern="[a-z,A-Z\s]{3,50}" type="text" aria-describedby="emailHelp" placeholder="Enter Name" name="name">
          </div>
          
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            
            <!-- input for 'email' -->
            
            <input class="form-control" pattern="[a-zA-Z0-9]+\.?[a-zA-Z0-9]+@[A-Za-z0-9.-]+\.[a-z]{2,3}" type="email" aria-describedby="emailHelp" placeholder="Enter email" name="userid">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            
            <!-- input for 'password' -->
            
            <input class="form-control"  type="password" placeholder="Password"  name="password">
          </div>
		 
		
		
          <button class="btn btn-primary btn-block" href=""name="btnSubmit" value="Save">Insert</button>
       
        <?php echo $msg; ?>		<!-- print msg - record insert or not  -->
        </form>
       
      </div>
    </div>
  </div>
      
    </div>
  
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2017</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
   
  
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
   
   
  </div>
</body>

</html>
