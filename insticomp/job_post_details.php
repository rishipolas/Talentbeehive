<?php

session_start();

if(! isset($_SESSION['email']))
header('location: company-login.php');

 include('config1.php');
$q="select * from users where email='{$_SESSION['email']}'";
$result=mysqli_query($DB,$q);

$q1="select count(*) as maxid from functionality where name='{$_SESSION['name']}'";
$result1=mysqli_query($DB,$q1);
$row = mysqli_fetch_array($result1);
$maxid = $row['maxid'];
echo " ".$maxid;
//$q2="select count(*) as maxid from candidate_job_applied where com_name='{$_SESSION['name']}' and status='applied'  OR status='onhold' OR status='rejected' OR status='Video'";
$q2="select count(*) as maxid from company_jobinstitute where email='{$_SESSION['email']}'";
$result2=mysqli_query($DB,$q2);
$row2 = mysqli_fetch_array($result2);
$maxid2 = $row2['maxid'];
//echo " ".$maxid;



/*$result1=mysqli_query($con,$q1);
while($row1= mysqli_fetch_array($result1))
{
    $options = $options."<option>$row1[1]</option>";
}*/

$num=mysqli_num_rows($result);

 ?>
 
 <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Talent Beehive</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
 <?php
 include("company_header.php");
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
      <!-- Icon Cards-->
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3" >
          <div class="card">
            <div class="card-body">
             
              <div class="mr-5">Candidate </div>
            </div>
            <a class="card-footer text-white clearfix small z-1  bg-info" href="job-post.php">
              <span>Candidate Job Post<span class="badge pull-right"><?php echo $row['maxid'];?></span></span>
             
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card">
            <div class="card-body">
             
              <div class="mr-5">Institute</div>
            </div>
            <a class="card-footer text-white clearfix small z-1 bg-success" href="view_company_jobinst.php">
              <span>Institute Job Post<span class="badge pull-right"><?php echo $row2['maxid'];?></span></span>
             
            </a>
          </div>
        </div>
        
        
        
        
      </div>
   
   
      
      <div class="row">
	   <?php
	    
		if($num>0)
		{
	    $row2 = mysqli_fetch_array($result) 
			?>
			
        <div class="col-lg-9">
          <!-- Example Bar Chart Card-->
         
            
            <div class="card-body">
              
                             
            
           
		  
		  <?php
							  if ( $row2['video'] == "")
							  {
					
							  ?>
		  
		  
			
			
			
					
				    <?php
							  }
							  else
							  {
		                      ?>
            <div class="card-body">
             
              <br>
<?php
							  }
							  ?>			  
            </div>
       </div>
		  <?php 
		}
		?>
   
        
 


    
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright ©talentbeehive.com 2017</small>
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
            <a class="btn btn-primary" href="company-logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
	 <script src="js/edit.js"></script>
  </div>
</body>

</html>