<?php

session_start();

if(!isset($_SESSION['userid']))		
	header('location:login.php');

$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "0";

require_once "config1.php";
$query = "select * from student_registration where institute_id=".$id;			
$data = mysqli_query($DB,$query);
$num=mysqli_num_rows($data);


$query1 = "select count(*) c from student_registration where institute_id=".$id;		
$data1 = mysqli_query($DB,$query1);
$row1 = mysqli_fetch_assoc($data1);

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
 include("admin_header.php");		
 ?>
 
 
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="admin_instit_student_display.php">View Instututes</a>
        </li>
        <li class="breadcrumb-item active">Student List</li>
      </ol>
     
        
        <div class="card-body">
          <div class="table-responsive" style="overflow-x:auto;">
          
          
        <b><u>Total Students: (<?php echo $row1['c']; ?> )</u></b> <br><br> 
          
          
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
				<tr>
			<th>Date_Time</th>	
                  <th>Student Name</th>
                  <th>Gender</th>
                  <th>Email</th>
                  <th>contact number</th>
                  <th>birth date</th>
                  <th>Location</th>
                  <th>ssc %</th>
                   <th>hsc %</th>
                   <th>Qualification</th>                 
		  <th>course</th>  
		 <th>specialization</th> 
		       <th>language</th>       	                		
		<th>student profile</th>
		<th>student photo</th>
		<th>student video</th>						  		 
                   <th>Action</th>
                </tr>
              </thead>
              
              <tbody>
						<?php 
						for($i=1; $i<=$num; $i++) {  
						$rows=mysqli_fetch_array($data); 
						$id=$rows['id']; 
						 $jd_status=$rows['jd_status'];
						 $status=$rows['status']?>
							<tr >
								<td> <?php echo $rows['date_time']; ?> </td>
								<td> <?php echo $rows['student_name']; ?> </td>
								<td> <?php echo $rows['gender']; ?> </td>
								<td> <?php echo $rows['email']; ?> </td>
								<td> <?php echo $rows['contact_number']; ?> </td>
								<td> <?php echo $rows['birth_date']; ?> </td>
								<?php 
					     
                         $getstate=mysqli_query($DB,"select statename  from state where id=".$rows['state']);
                         $getstatedetails = mysqli_fetch_array($getstate);
                         
                           $getcity=mysqli_query($DB, "select cityname  from city where c_id=".$rows['city']);
                         $getcitydetails = mysqli_fetch_array($getcity);
						
		?>
								
								<td> <?php  echo $getstatedetails['statename'];?> , <?php  echo $getcitydetails['cityname']; ?> </td>																											
								<td> <?php echo $rows['ssc']; ?> </td>
								<td> <?php echo $rows['hsc']; ?> </td>
								<td>  <?php 
					     
                         $getqualification=mysqli_query($DB,"select qualification  from qualification where id=".$rows['qualification']);
                         $getqualificationdetails = mysqli_fetch_array($getqualification);
						 echo $getqualificationdetails['qualification'];?>  
		</td>
								 
								<td> <?php 
					    
                         $getcourse=mysqli_query($DB, "select course from course where c_id=".$rows['course']);
                         $getcoursedetails = mysqli_fetch_array($getcourse);
						 echo $getcoursedetails['course'];?>
								 </td>
								
								<td> <?php 
					    
                         $getspecialization=mysqli_query($DB, "select specialization  from specialization where s_id=".$rows['specialization']);
                         $getspecializationdetails = mysqli_fetch_array($getspecialization);
						 echo $getspecializationdetails['specialization'];?>
								 </td>
								 <td> <?php echo $rows['language']; ?> </td>
								<td> <img src="<?php echo 'institute/institutelogo/' .$rows['student_profile']; ?>" height="50" width="50"> </td>								
								<td> <img src="<?php echo 'institute/institutelogo/' .$rows['student_photo']; ?>" height="50" width="50"> </td>																	
								<td> <video controls controlsList="nodownload" src="<?php echo 'institute/institutevideo/'.$rows['student_video'] ?>"  height="200px"  width="200px"/>					</td>																											                  								
                  						<td> <!--<a href="company-edit.php?id=<?php //echo $rows['id']; ?>">edit</a>-->
                 							<a onClick="return confirm('Sure to delete!')" href="deletecomp.php?id=<?php echo $rows['id']; ?>">delete</a> </td>
								<?php } ?>
				  
                </tr>
              </tbody>
            </table>
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