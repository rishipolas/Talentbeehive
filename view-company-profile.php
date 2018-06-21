<?php

session_start();

if(! isset($_SESSION['email']))
   header('location: candidate-login.php');

	
	 
	  include('config1.php');
	   $cname=$_GET['cname'];
	 
	 $q="SELECT * FROM users where cname='".$cname."'";  
	 //$q="SELECT * FROM users where cname=".$cname;  
	
	
	 
$result=mysqli_query($DB,$q);
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
 include("candidate_header.php");
 ?>
  <div class="content-wrapper">
  		 <?php
		// echo "hellooo";
		 
			if($num==1)
	         {
			 
		$row=mysqli_fetch_array($result);
		
	?>	
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
    
                    
      
      <div class="row">
        <div class="col-lg-9">
          <!-- Example Bar Chart Card-->
          <div class="card mb-3 yellow-border">
            
			<h4 style="background-color:#FFC107; color:#000;padding:10px; border-bottom:2px solid #000; " >Company Profile</h4>
			
            <div class="card-body">
              <div class="row">
			   <div class="col-lg-2">
			     <div class="post-logo">
                                       <img src="<?php echo 'uploads/'.$row['clogo'] ?>"  height="70px" width="70px" alt="Company-logo">
									 
                                    </div>
			   </div>
			  <div class="col-lg-10">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                                <tbody >
								
                                <tr>
                                  
                                  <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Company Name </strong></td>
                                  <td width="52%" align="left" valign="top" style="line-height:30px"><?php echo $row['cname']; ?></td>
                                 
                                </tr>
                              
                                   <tr>
                                  
                                  <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Industry Type</strong></td>
                                  <td width="52%" align="left" valign="top" style="line-height:30px"><?php echo $row['type']; ?></td>
                                 
                                </tr>
								<tr>
                                  
                                  <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Contact Email</strong></td>
                                  <td width="52%" align="left" valign="top" style="line-height:30px"><?php echo $row['email'];?></td>
                                 
                                </tr>
							
								<tr>
                                  
                                  <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Contact Person </strong></td>
                                  <td width="52%" align="left" valign="top" style="line-height:30px"><?php echo $row['person'];?></td>
                                 
                                </tr>
								
								<tr>
                                  
                                  <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Contact Number</strong></td>
                                  <td width="52%" align="left" valign="top" style="line-height:30px"><?php echo $row['number'];?></td>
                                 
                                </tr>
									<tr>
                                  
                                  <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Website </strong></td>
                                  <td width="52%" align="left" valign="top" style="line-height:30px"><a href="<?php echo $row['cweb'];?>"><?php echo $row['cweb'];?></a></td>
                                 
                                </tr>
                               <tr>
                                  
                                  <td width="20%" align="left" valign="top" style="line-height:30px"><strong>Location </strong></td>
                                  <td width="52%" align="left" valign="top" style="line-height:30px">   
                                  <?php 
					     
                         $getstate=mysqli_query($DB,"select statename  from state where id=".$row['state']);
                         $getstatedetails = mysqli_fetch_array($getstate);
                         
                           $getcity=mysqli_query($DB, "select cityname  from city where c_id=".$row['city']);
                         $getcitydetails = mysqli_fetch_array($getcity);
			 echo $getstatedetails['statename'];			
		?> , <?php echo $getcitydetails['cityname']; ?></td>
                                 
                                </tr>
                              
                            
                                
                              </tbody>
							  </table>
						
							  </div>
              </div>
            </div>
           
          </div>
   
          </div>
		  
      </div>
	  
	  <div class="row">
	       <div class="col-lg-9">
          <!-- Example Bar Chart Card-->
          <div class="card mb-3 yellow-border">
            
			<h4 style="background-color:#FFC107; color:#000;padding:10px; border-bottom:2px solid #000; " >Company Information</h4>
			<p>
			<?php echo $row['cinfo'];?>
			</p>
            </div>
			
			</div>
			</div>
      
    </div>
	<?php
	}
	/*else
	{
		echo "no company found";
	}*/
	?>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
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
            <a class="btn btn-primary" href="candidate-logout.php">Logout</a>
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
