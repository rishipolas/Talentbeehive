<?php
session_start();

if(!isset($_SESSION['userid']))		

  header('location:login.php');




require_once "config1.php";
$query = "select * from candidate order by id DESC";		
$data = mysqli_query($DB,$query);
$num=mysqli_num_rows($data);

$query1 = "select count(*) c from candidate";		
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
1<script>
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
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
     
        
        <div class="card-body">
          <div class="table-responsive" style="overflow-x:auto;">   
          <b><u>Total Candidates: (<?php echo $row1['c']; ?> )</u></b> <br><br>               			  
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="20%">		
              <thead>
                <tr>
                <th>Date_Time</th>		
                  <th> Name</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Contact number</th>
                  <th>Location</th>
           <th>Qualification</th>
       <th>Course</th>
       <th>Specialization</th>
          <th>Resume</th>
          <th>video</th>
                  <th>Application</th>
                  <th>Months</th>
                  <th>Year</th>
                  <th>Functional role</th>
                  <th>Marital</th>
				  <th>Email Status</th>
                    <th>video Status</th>
                    <th>Video Remark</th>
                    <th> Action</th>

                </tr>
              </thead>
             
              <tbody>
              <?php for($i=1; $i<=$num; $i++) { 
			  $row=mysqli_fetch_array($data);
			  //$id=$row['id']; 
			  $video_status=$row['video_status']; 		
			  $Status=$row['Status'];
			  ?>
			  
			  
			  
              <tr>
             	<td> <?php echo $row['date_time']; ?> </td>
                <td> <?php echo $row['name']; ?> </td>
                <td> <?php echo $row['email']; ?> </td>
                 <td> <?php echo $row['pass']; ?> </td>
                <td> <?php echo $row['contact']; ?> </td>
                
                <?php 
					     
                         $getstate=mysqli_query($DB,"select statename  from state where id=".$row['state']);
                         $getstatedetails = mysqli_fetch_array($getstate);
                         
                           $getcity=mysqli_query($DB, "select cityname  from city where c_id=".$row['city']);
                         $getcitydetails = mysqli_fetch_array($getcity);
						
		?>
                
                <td> <?php  echo $getstatedetails['statename'];?> , <?php  echo $getcitydetails['cityname']; ?> </td>
                
                <td> <?php 
					     
                         $getqualification=mysqli_query($DB,"select qualification  from qualification where id=".$row['qualification']);
                         $getqualificationdetails = mysqli_fetch_array($getqualification);
						 echo $getqualificationdetails['qualification'];?> 
		</td>
             
           	<td> <?php 
					    
                         $getcourse=mysqli_query($DB, "select course  from course where c_id=".$row['course']);
                         $getcoursedetails = mysqli_fetch_array($getcourse);
						 echo $getcoursedetails['course'];?>
		 </td>
                <td> <?php 
					    
                         $getspecialization=mysqli_query($DB, "select specialization  from specialization where s_id=".$row['specialization']);
                         $getspecializationdetails = mysqli_fetch_array($getspecialization);
						 echo $getspecializationdetails['specialization'];?>
		 </td>
             
                <td> <a href="<?php echo 'resume/'.$row['res']; ?>"><?php echo 'resume/'.$row['res']; ?></a> </td>		
                
              
                
                <td> <video controls controlsList="nodownload" src="<?php echo 'video_upload/'.$row['video'] ?>"  height="200px"  width="200px"/></td>		
                <td> <?php echo $row['application']; ?> </td>
                <td> <?php echo $row['months']; ?> </td>
                <td> <?php echo $row['year']; ?> </td>
                <td> <?php echo $row['role']; ?> </td>
                <td> <?php echo $row['marital']; ?> </td>
                
                
           
                
				<td>
				<?php if(($Status)=='Pending') { ?>
                    <a href="e_status.php?status=<?php echo $row['Status'];?>&id=<?php echo $row['id'];?>" onclick="return confirm('Do You Really want to activate (<?php echo  $row['name']; ?>)');">
                    Email Deactivated </a>
                    <?php } if(($Status)=='Approved') { ?>
                    <a href="e_status.php?status=<?php echo $row['Status'];?>&id=<?php echo $row['id'];?>" onclick="return confirm('Do You Really want to De-activate (<?php echo  $row['name']; ?>)');">
                    Email Activated</a>
                    <?php } ?></td>
				
				
	                
			
                    
                <td>
				<?php if(($video_status)=='0') { ?>
                    <a href="c_status.php?status=<?php echo $row['video_status'];?>&id=<?php echo $row['id'];?>" onclick="return confirm('Do You Really want to approved video of (<?php echo $row['name']; ?>)');">
                    <img src="uploads/deactivate.jpg" 
                    id="view" width="16" height="16" alt="" />Video Not Approved </a>
                    <?php } if(($video_status)=='1') { ?>
                    <a href="c_status.php?status=<?php echo $row['video_status'];?>&id=<?php echo $row['id'];?>" onclick="return confirm('Do You Really want to Not-approved video of (<?php echo $row['name']; ?>)');">
                    <img src="uploads/activate.jpg" width="16" id="view" height="16" alt="" />Video Approved </a>
                    <?php } ?>
					</td>
					
					<td>
					
					
			
					
					<form action="video_remark.php" method="post">
					<input type="hidden" name="id" value="<?php echo $row['id'];?>">
						<input type="hidden" name="email" value="<?php echo $row['email'];?>">
						<input type="hidden" name="name" value="<?php echo $row['name'];?>">
						 <input class="form-control"  pattern="[a-z,A-Z\s]{3,50}" type="text" aria-describedby="emailHelp" placeholder="Enter Remark" name="video_remark">
						 <button class="btn btn-primary btn-block" type="submit" name="btnSubmit" value="insert">Insert</button>
						</form>
						 <?php 
						// echo "hii";
					 echo $row['video_remark'];?> 
							</td>
		
						
							
          <td> <a href="candidate-edit.php?id=<?php echo $row['id']; ?>">edit</a> 
        <a onClick="return confirm('Sure to delete!')" href="deletecandi.php?id=<?php echo $row['id']; ?>">delete</a>
          
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