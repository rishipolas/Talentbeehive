<?php

session_start();

if(!isset($_SESSION['userid']))		
	header('location:login.php');	

require_once "config1.php";
$query = "select * from candidate_job_applied where status='applied'";		
$data = mysqli_query($DB,$query);
$num=mysqli_num_rows($data);

$query1 = "select count(*) c from candidate_job_applied where status='applied'";		
$data1 = mysqli_query($DB,$query1);
$row1 = mysqli_fetch_assoc($data1);

?>

<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
  
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
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <?php
 include("admin_header.php");		
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
     
        
        <div class="card-body">
          <div class="table-responsive" style="overflow-x:auto;">
          
          <b><u>Applied Candidates: (<?php echo $row1['c']; ?> )</u></b> <br><br> 
          
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">		
              <thead>
                <tr>
                <th>Date</th>
                  <th>Company Name</th>		
                  <th>Candidate Name</th>
                  <th>Candidate Email</th>
		  <th>Candidate Qualification</th>
		  <th>Course</th>
		  <th>Specialization</th>		  		  
		  <th>Role</th>
                  <th>Location</th>
		 <th>Company Id</th>
		 <th>Candidate Id</th>
                 
                  <th>Application_Status</th>
                  <th>Operation</th>
				 
                
                </tr>
              </thead>
           <?php for($i=1; $i<=$num; $i++) {  $row=mysqli_fetch_array($data); ?>
							<tr >
							
							 
							
								<td> <?php echo $row['date']; ?> </td>
								<td> <?php echo $row['com_name']; ?> </td>
								<td> <?php echo $row['can_name']; ?> </td>
                                                                <td> <?php echo $row['can_email']; ?> </td>
								 <?php //echo $row['can_qualification']; ?>
								 
								<td> <?php 
                           //qualification details					     
                         $getqualification=mysqli_query($DB,"select qualification  from qualification where id=".$row['can_qualification']);
                         $getqualificationdetails = mysqli_fetch_array($getqualification);
						 echo $getqualificationdetails['qualification'];?>
						 		</td>
						 		<td> <?php 
						 		
			//course details			 		
					    
                         $getcourse=mysqli_query($DB, "select course  from course where c_id=".$row['can_course']);
                         $getcoursedetails = mysqli_fetch_array($getcourse);
						 echo $getcoursedetails['course'];?>
						 		</td>
						 		<td> <?php 
		         //specialization details	    
                         $getspecialization=mysqli_query($DB, "select specialization  from specialization where s_id=".$row['can_specialization']);
                         $getspecializationdetails = mysqli_fetch_array($getspecialization);
						 echo $getspecializationdetails['specialization'];?>
						 		</td>
						 							 		
								<td> <?php echo $row['role']; ?> </td>
								
								<?php 
					     
                         $getstate=mysqli_query($DB,"select statename  from state where id=".$row['state']);
                         $getstatedetails = mysqli_fetch_array($getstate);
                         
                           $getcity=mysqli_query($DB, "select cityname  from city where c_id=".$row['city']);
                         $getcitydetails = mysqli_fetch_array($getcity);
						
		?>
								<td> <?php  echo $getstatedetails['statename'];?> , <?php  echo $getcitydetails['cityname']; ?> </td>
								
								<td> <?php echo $row['fk_func_id']; ?> </td>
								<td> <?php echo $row['fk_can_id']; ?> </td>
								<td> <?php echo $row['status']; ?> </td>
								 <td>
								 
							 
								 
			  <a onClick="return confirm('Sure to delete!')" href="delcandiapplication.php?id=<?php echo $row['id']; ?>">delete</a>
				 
				  <?php } ?>
				  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
     
      
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright � Your Website 2017</small>
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
              <span aria-hidden="true">�</span>
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
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
   
   
  </div>
</body>

</html>
