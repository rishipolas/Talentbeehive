<?php

session_start();

if(!isset($_SESSION['userid']))		
	header('location:login.php');



require_once "config1.php";
$query = "select * from users";			
$data = mysqli_query($DB,$query);
$num=mysqli_num_rows($data);


$query1 = "select count(*) c from users";		
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
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
     
        
        <div class="card-body">
          <div class="table-responsive" style="overflow-x:auto;">
          
          
        <b><u>Total Companies: (<?php echo $row1['c']; ?> )</u></b> <br><br> 
          
          
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
				<tr>
			<th>Date_Time</th>	
                  <th>Company Name</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Logo</th>
                  <th>Information</th>
		  <th>Contact Person Name</th>
                  <th>Website</th>	  
                  <th>Contact Number</th>
		 <th>Landline Number</th>
		<th>Type</th>
		<th>Location</th>
		<th>Email Status</th>
		<th>Job Post Status</th>		  		 
                   <th>Action</th>
                </tr>
              </thead>
              
              <tbody>
						<?php 
						for($i=1; $i<=$num; $i++) {  
						$rows=mysqli_fetch_array($data); 
						$id=$rows['id']; 
						 $jd_status=$rows['jd_status'];
						 $Status=$rows['status']?>
							<tr >
								<td> <?php echo $rows['date_time']; ?> </td>
								<td> <?php echo $rows['cname']; ?> </td>
								<td> <?php echo $rows['email']; ?> </td>
								<td> <?php echo $rows['password']; ?> </td>
								<td> <img src="<?php echo 'uploads/' .$rows['clogo']; ?>" height="50" width="50"> </td>
								<td> <?php echo $rows['cinfo']; ?> </td>
								<td> <?php echo $rows['person']; ?> </td>
								<td> <?php echo $rows['cweb']; ?> </td>
								<td> <?php echo $rows['number']; ?> </td>
								<td> <?php echo $rows['lnumber']; ?> </td>
								<td> <?php echo $rows['type']; ?> </td>
								<?php 
					     
                         $getstate=mysqli_query($DB,"select statename  from state where id=".$rows['state']);
                         $getstatedetails = mysqli_fetch_array($getstate);
                         
                           $getcity=mysqli_query($DB, "select cityname  from city where c_id=".$rows['city']);
                         $getcitydetails = mysqli_fetch_array($getcity);
						
		?>
								
								<td> <?php  echo $getstatedetails['statename'];?> , <?php  echo $getcitydetails['cityname']; ?> </td>

									
									<td>
				<?php if(($Status)=='Pending') { ?>
                    <a href="em_status.php?status=<?php echo $rows['status'];?>&id=<?php echo $rows['id'];?>" onclick="return confirm('Do You Really want to activate (<?php echo  $rows['cname']; ?>)');">
                    Email Deactivated </a>
                    <?php } if(($Status)=='Approved') { ?>
                    <a href="em_status.php?status=<?php echo $rows['status'];?>&id=<?php echo $rows['id'];?>" onclick="return confirm('Do You Really want to De-activate (<?php echo  $rows['cname']; ?>)');">
                    Email Activated</a>
                    <?php } ?>
                    </td>
                  
								<td>
								<?php if(($jd_status)=='0') { ?>
                  <a href="status.php?status=<?php echo $rows['jd_status'];?>&id=<?php echo $rows['id'];?>" onclick="return confirm('Really you activate (<?php echo $rows['cname']; ?>)');">
                  <img src="uploads/deactivate.jpg" 
                  id="view" width="16" height="16" alt="" />Deactivated </a>
                  <?php } if(($jd_status)=='1') { ?>
                  <a href="status.php?status=<?php echo $rows['jd_status'];?>&id=<?php echo $rows['id'];?>" onclick="return confirm('Really you De-activate (<?php echo $rows['cname']; ?>)');">
                  <img src="uploads/activate.jpg" width="16" id="view" height="16" alt="" />Activated</a>
                  <?php } ?>
                  </td>



                  <td> <a href="company-edit.php?id=<?php echo $rows['id']; ?>">edit</a>
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